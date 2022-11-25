<?php

namespace Modules\SalesPurchaseOrders\Http\Controllers;

use App\Abstracts\Http\Controller;
use App\Events\Document\DocumentCancelled;
use App\Events\Document\DocumentPrinting;
use App\Events\Document\DocumentSent;
use App\Http\Requests\Common\Import as ImportRequest;
use App\Http\Requests\Document\Document as Request;
use App\Jobs\Document\CreateDocument;
use App\Jobs\Document\DeleteDocument;
use App\Jobs\Document\DuplicateDocument;
use App\Jobs\Document\UpdateDocument;
use App\Models\Common\Item;
use App\Models\Setting\Currency;
use App\Traits\Currencies;
use App\Traits\DateTime;
use App\Traits\Documents;
use App\Utilities\Date;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Modules\SalesPurchaseOrders\Events\Confirmed;
use Modules\SalesPurchaseOrders\Exports\SalesPurchaseOrders as Export;
use Modules\SalesPurchaseOrders\Imports\SalesPurchaseOrder as Import;
use Modules\SalesPurchaseOrders\Models\PurchaseOrder\Model as PurchaseOrder;
use Modules\SalesPurchaseOrders\Models\SalesOrder\Model as Document;
use Modules\SalesPurchaseOrders\Notifications\SalesOrder as Notification;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class SalesOrders extends Controller
{
    use Currencies, DateTime, Documents;

    /**
     * @var string
     */
    public $type = Document::TYPE;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $salesOrders = Document::sales()->with('contact', 'transactions')->collect(['document_number' => 'desc']);

        return $this->response('sales-purchase-orders::sales_orders.index', compact('salesOrders'));
    }

    /**
     * Show the form for viewing the specified resource.
     *
     * @param Document $salesOrder
     *
     * @return View|Factory
     */
    public function show(Document $salesOrder)
    {
        $currency = Currency::where('code', $salesOrder->currency_code)->first();

        // Get Sales Order Totals
        foreach ($salesOrder->totals_sorted as $document_total) {
            $salesOrder->{$document_total->code} = $document_total->amount;
        }

        $total = money($salesOrder->total, $currency->code, true)->format();

        $salesOrder->grand_total = money($total, $currency->code)->getAmount();

        if (!empty($salesOrder->paid)) {
            $salesOrder->grand_total = round($salesOrder->total - $salesOrder->paid, $currency->precision);
        }

        return view('sales-purchase-orders::sales_orders.show', compact('salesOrder'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View|Factory
     */
    public function create()
    {
        return view('sales-purchase-orders::sales_orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $response = $this->ajaxDispatch(new CreateDocument($request));

        if ($response['success']) {
            $response['redirect'] = route('sales-purchase-orders.sales-orders.show', $response['data']->id);

            $message = trans(
                'messages.success.added',
                ['type' => trans_choice('sales-purchase-orders::general.sales_orders', 1)]
            );

            flash($message)->success();
        } else {
            $response['redirect'] = route('sales-purchase-orders.sales-orders.create');

            $message = $response['message'];

            flash($message)->error();
        }

        return response()->json($response);
    }

    /**
     * @param Document $salesOrder
     *
     * @return RedirectResponse
     */
    public function duplicate(Document $salesOrder): RedirectResponse
    {
        $clone = $this->dispatch(new DuplicateDocument($salesOrder));

        $message = trans(
            'messages.success.duplicated',
            ['type' => trans_choice('sales-purchase-orders::general.sales_orders', 1)]
        );

        flash($message)->success();

        return redirect()->route('sales-purchase-orders.sales-orders.edit', $clone->id);
    }

    /**
     * Import the specified resource.
     *
     * @param ImportRequest $request
     *
     * @return JsonResponse
     */
    public function import(ImportRequest $request): JsonResponse
    {
        $response = $this->importExcel(new Import(Document::TYPE), $request, trans_choice('sales-purchase-orders::general.sales_orders', 2));

        if ($response['success']) {
            $response['redirect'] = route('sales-purchase-orders.sales-orders.index');

            flash($response['message'])->success();
        } else {
            $response['redirect'] = route('import.create', ['sales-purchase-orders', 'sales-orders']);

            flash($response['message'])->error()->important();
        }

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Document $salesOrder
     *
     * @return Factory|View
     */
    public function edit(Document $salesOrder)
    {
        return view('sales-purchase-orders::sales_orders.edit', compact('salesOrder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Document $salesOrder
     * @param Request  $request
     *
     * @return JsonResponse
     */
    public function update(Document $salesOrder, Request $request): JsonResponse
    {
        $response = $this->ajaxDispatch(new UpdateDocument($salesOrder, $request));

        if ($response['success']) {
            $response['redirect'] = route('sales-purchase-orders.sales-orders.show', $response['data']->id);

            $message = trans(
                'messages.success.updated',
                ['type' => trans_choice('sales-purchase-orders::general.sales_orders', 1)]
            );

            flash($message)->success();
        } else {
            $response['redirect'] = route('sales-purchase-orders.sales-orders.edit', $salesOrder->id);

            $message = $response['message'];

            flash($message)->error();
        }

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Document $salesOrder
     *
     * @return JsonResponse
     */
    public function destroy(Document $salesOrder): JsonResponse
    {
        $response = $this->ajaxDispatch(new DeleteDocument($salesOrder));

        $response['redirect'] = route('sales-purchase-orders.sales-orders.index');

        if ($response['success']) {
            $message = trans(
                'messages.success.deleted',
                ['type' => trans_choice('sales-purchase-orders::general.sales_orders', 1)]
            );

            flash($message)->success();
        } else {
            $message = $response['message'];

            flash($message)->error();
        }

        return response()->json($response);
    }

    /**
     * Export the specified resource.
     *
     * @return BinaryFileResponse
     */
    public function export()
    {
        return $this->exportExcel(new Export(null, Document::TYPE), trans_choice('sales-purchase-orders::general.sales_orders', 2));
    }

    /**
     * Mark the sales order as sent.
     *
     * @param Document $salesOrder
     *
     * @return RedirectResponse
     */
    public function markSent(Document $salesOrder): RedirectResponse
    {
        event(new DocumentSent($salesOrder));

        $message =
            trans('documents.messages.marked_sent', ['type' => trans('sales-purchase-orders::general.sales_orders')]);

        flash($message)->success();

        return redirect()->back();
    }

    /**
     * Mark the sales order as confirmed.
     *
     * @param Document $salesOrder
     *
     * @return RedirectResponse
     */
    public function markConfirmed(Document $salesOrder): RedirectResponse
    {
        event(new Confirmed($salesOrder));

        $message = trans(
            'documents.messages.marked_as',
            [
                'type'   => trans_choice('sales-purchase-orders::general.sales_orders', 1),
                'status' => Str::lower(trans('sales-purchase-orders::sales_orders.statuses.confirmed')),
            ]
        );

        flash($message)->success();

        return redirect()->back();
    }

    /**
     * @param Document $salesOrder
     *
     * @return RedirectResponse
     */
    public function convertToInvoice(Document $salesOrder): RedirectResponse
    {
        // Redirect to invoice create page with input
        $data = $salesOrder->toArray();

        unset($data['amount']);

        $data['document_number'] = $this->getNextDocumentNumber(Document::INVOICE_TYPE);
        $data['status']          = 'draft';
        $data['issued_at']       = Date::now()->format('Y-m-d');
        $data['due_at']          = Date::now()->format('Y-m-d');
        $data['order_number']    = $salesOrder->document_number;
        $data['contact']         = $salesOrder->contact;
        $data['type']            = Document::INVOICE_TYPE;

        $i = 0;
        foreach ($salesOrder->items as $item) {
            $data['items'][$i] = $item;
            $data['item_id']   = $item->item_id;
            $i++;
        }

        return redirect()->route('invoices.create', ['document_id' => $salesOrder->id])->withInput($data);
    }

    /**
     * @param Document $salesOrder
     *
     * @return RedirectResponse
     */
    public function convertToPurchaseOrder(Document $salesOrder): RedirectResponse
    {
        // Redirect to invoice create page with input
        $data = $salesOrder->toArray();

        unset($data['amount'], $data['amount_without_tax'], $data['contact_id'], $data['contact_email']);

        $data['document_number'] = $this->getNextDocumentNumber(PurchaseOrder::TYPE);
        $data['status']          = 'draft';
        $data['issued_at']       = Date::now()->format('Y-m-d');
        $data['due_at']          = Date::now()->format('Y-m-d');
        $data['order_number']    = $salesOrder->document_number;
        $data['type']            = PurchaseOrder::TYPE;

        $i = 0;
        foreach ($salesOrder->items as $documentItem) {
            $item = Item::find($documentItem->item_id);

            if ($item->sale_price === $documentItem->price) {
                $documentItem->price = $item->purchase_price;
            }

            $data['items'][$i] = $documentItem;
            $data['item_id']   = $documentItem->item_id;
            $i++;
        }

        return redirect()
            ->route('sales-purchase-orders.purchase-orders.create', ['document_id' => $salesOrder->id])
            ->withInput($data);
    }

    /**
     * Mark the sales order as cancelled.
     *
     * @param Document $salesOrder
     *
     * @return RedirectResponse
     */
    public function markCancelled(Document $salesOrder): RedirectResponse
    {
        event(new DocumentCancelled($salesOrder));

        $message = trans(
            'documents.messages.marked_cancelled',
            ['type' => trans_choice('sales-purchase-orders::general.sales_orders', 1)]
        );

        flash($message)->success();

        return redirect()->back();
    }

    /**
     * Download the PDF file of sales order.
     *
     * @param Document $salesOrder
     *
     * @return RedirectResponse
     */
    public function emailSalesOrder(Document $salesOrder): RedirectResponse
    {
        if (empty($salesOrder->contact_email)) {
            return redirect()->back();
        }

        // Notify the customer
        $salesOrder->contact->notify(new Notification($salesOrder, 'sales_order_new_customer', true));

        event(new DocumentSent($salesOrder));

        flash(
            trans(
                'documents.messages.email_sent',
                ['type' => trans_choice('sales-purchase-orders::general.sales_orders', 1)]
            )
        )->success();

        return redirect()->back();
    }

    /**
     * Print the sales order.
     *
     * @param Document $salesOrder
     *
     * @return false|Response|string|string[]
     */
    public function printSalesOrder(Document $salesOrder)
    {
        $salesOrder = $this->prepareSalesOrder($salesOrder);

        $view = view($salesOrder->template_path, ['document' => $salesOrder]);

        return mb_convert_encoding($view, 'HTML-ENTITIES', 'UTF-8');
    }

    /**
     * Download the PDF file of sales order.
     *
     * @param Document $salesOrder
     *
     * @return Response
     */
    public function pdfSalesOrder(Document $salesOrder): Response
    {
        $salesOrder = $this->prepareSalesOrder($salesOrder);

        $view = view($salesOrder->template_path, ['document' => $salesOrder, 'currency_style' => true])->render();
        $html = mb_convert_encoding($view, 'HTML-ENTITIES', 'UTF-8');

        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML($html);

        //$pdf->setPaper('A4', 'portrait');

        $file_name = $this->getDocumentFileName($salesOrder);

        return $pdf->download($file_name);
    }

    protected function prepareSalesOrder(Document $salesOrder): Document
    {
        $salesOrder->template_path =
            'sales-purchase-orders::sales_orders.print_' . setting('sales-purchase-orders.sales_order.template');

        event(new DocumentPrinting($salesOrder));

        return $salesOrder;
    }
}
