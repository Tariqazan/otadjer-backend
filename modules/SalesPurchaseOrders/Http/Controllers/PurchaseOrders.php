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
use Modules\SalesPurchaseOrders\Events\Issued;
use Modules\SalesPurchaseOrders\Exports\SalesPurchaseOrders as Export;
use Modules\SalesPurchaseOrders\Imports\SalesPurchaseOrder as Import;
use Modules\SalesPurchaseOrders\Models\PurchaseOrder\Model as Document;
use Modules\SalesPurchaseOrders\Notifications\PurchaseOrder as Notification;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PurchaseOrders extends Controller
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
        $purchaseOrders = Document::purchase()->with('contact', 'transactions')->collect(['document_number' => 'desc']);

        return $this->response('sales-purchase-orders::purchase_orders.index', compact('purchaseOrders'));
    }

    /**
     * Show the form for viewing the specified resource.
     *
     * @param Document $purchaseOrder
     *
     * @return View|Factory
     */
    public function show(Document $purchaseOrder)
    {
        $currency = Currency::where('code', $purchaseOrder->currency_code)->first();

        // Get Sales Order Totals
        foreach ($purchaseOrder->totals_sorted as $document_total) {
            $purchaseOrder->{$document_total->code} = $document_total->amount;
        }

        $total = money($purchaseOrder->total, $currency->code, true)->format();

        $purchaseOrder->grand_total = money($total, $currency->code)->getAmount();

        if (!empty($purchaseOrder->paid)) {
            $purchaseOrder->grand_total = round($purchaseOrder->total - $purchaseOrder->paid, $currency->precision);
        }

        return view('sales-purchase-orders::purchase_orders.show', compact('purchaseOrder'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View|Factory
     */
    public function create()
    {
        return view('sales-purchase-orders::purchase_orders.create');
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
            $response['redirect'] = route('sales-purchase-orders.purchase-orders.show', $response['data']->id);

            $message = trans(
                'messages.success.added',
                ['type' => trans_choice('sales-purchase-orders::general.purchase_orders', 1)]
            );

            flash($message)->success();
        } else {
            $response['redirect'] = route('sales-purchase-orders.purchase-orders.create');

            $message = $response['message'];

            flash($message)->error();
        }

        return response()->json($response);
    }

    /**
     * @param Document $purchaseOrder
     *
     * @return RedirectResponse
     */
    public function duplicate(Document $purchaseOrder): RedirectResponse
    {
        $clone = $this->dispatch(new DuplicateDocument($purchaseOrder));

        $message = trans(
            'messages.success.duplicated',
            ['type' => trans_choice('sales-purchase-orders::general.purchase_orders', 1)]
        );

        flash($message)->success();

        return redirect()->route('sales-purchase-orders.purchase-orders.edit', $clone->id);
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
        $response = $this->importExcel(new Import(Document::TYPE), $request, trans_choice('sales-purchase-orders::general.purchase_orders', 2));

        if ($response['success']) {
            $response['redirect'] = route('sales-purchase-orders.purchase-orders.index');

            flash($response['message'])->success();
        } else {
            $response['redirect'] = route('import.create', ['sales-purchase-orders', 'purchase-orders']);

            flash($response['message'])->error()->important();
        }

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Document $purchaseOrder
     *
     * @return Factory|View
     */
    public function edit(Document $purchaseOrder)
    {
        return view('sales-purchase-orders::purchase_orders.edit', compact('purchaseOrder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Document $purchaseOrder
     * @param Request  $request
     *
     * @return JsonResponse
     */
    public function update(Document $purchaseOrder, Request $request): JsonResponse
    {
        $response = $this->ajaxDispatch(new UpdateDocument($purchaseOrder, $request));

        if ($response['success']) {
            $response['redirect'] = route('sales-purchase-orders.purchase-orders.show', $response['data']->id);

            $message = trans(
                'messages.success.updated',
                ['type' => trans_choice('sales-purchase-orders::general.purchase_orders', 1)]
            );

            flash($message)->success();
        } else {
            $response['redirect'] = route('sales-purchase-orders.purchase-orders.edit', $purchaseOrder->id);

            $message = $response['message'];

            flash($message)->error();
        }

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Document $purchaseOrder
     *
     * @return JsonResponse
     */
    public function destroy(Document $purchaseOrder): JsonResponse
    {
        $response = $this->ajaxDispatch(new DeleteDocument($purchaseOrder));

        $response['redirect'] = route('sales-purchase-orders.purchase-orders.index');

        if ($response['success']) {
            $message = trans(
                'messages.success.deleted',
                ['type' => trans_choice('sales-purchase-orders::general.purchase_orders', 1)]
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
        return $this->exportExcel(new Export(null, Document::TYPE), trans_choice('sales-purchase-orders::general.purchase_orders', 2));
    }

    /**
     * Mark the sales order as sent.
     *
     * @param Document $purchaseOrder
     *
     * @return RedirectResponse
     */
    public function markSent(Document $purchaseOrder): RedirectResponse
    {
        event(new DocumentSent($purchaseOrder));

        $message =
            trans(
                'documents.messages.marked_sent',
                ['type' => trans('sales-purchase-orders::general.purchase_orders')]
            );

        flash($message)->success();

        return redirect()->back();
    }

    /**
     * Mark the purchase order as issued.
     *
     * @param Document $purchaseOrder
     *
     * @return RedirectResponse
     */
    public function markIssued(Document $purchaseOrder): RedirectResponse
    {
        event(new Issued($purchaseOrder));

        $message = trans(
            'documents.messages.marked_as',
            [
                'type'   => trans_choice('sales-purchase-orders::general.purchase_orders', 1),
                'status' => Str::lower(trans('sales-purchase-orders::purchase_orders.statuses.issued')),
            ]
        );

        flash($message)->success();

        return redirect()->back();
    }

    /**
     * @param Document $purchaseOrder
     *
     * @return RedirectResponse
     */
    public function convertToBill(Document $purchaseOrder): RedirectResponse
    {
        // Redirect to bill create page with input
        $data = $purchaseOrder->toArray();

        unset($data['amount']);

        $data['document_number'] = $this->getNextDocumentNumber(Document::BILL_TYPE);
        $data['status']          = 'draft';
        $data['issued_at']       = Date::now()->format('Y-m-d');
        $data['due_at']          = Date::now()->format('Y-m-d');
        $data['order_number']    = $purchaseOrder->document_number;
        $data['contact']         = $purchaseOrder->contact;
        $data['type']            = Document::BILL_TYPE;

        $i = 0;
        foreach ($purchaseOrder->items as $item) {
            $data['items'][$i] = $item;
            $data['item_id']   = $item->item_id;
            $i++;
        }

        return redirect()->route('bills.create', ['document_id' => $purchaseOrder->id])->withInput($data);
    }

    /**
     * Mark the purchase order as cancelled.
     *
     * @param Document $purchaseOrder
     *
     * @return RedirectResponse
     */
    public function markCancelled(Document $purchaseOrder): RedirectResponse
    {
        event(new DocumentCancelled($purchaseOrder));

        $message = trans(
            'documents.messages.marked_cancelled',
            ['type' => trans_choice('sales-purchase-orders::general.purchase_orders', 1)]
        );

        flash($message)->success();

        return redirect()->back();
    }

    /**
     * Download the PDF file of sales order.
     *
     * @param Document $purchaseOrder
     *
     * @return RedirectResponse
     */
    public function emailPurchaseOrder(Document $purchaseOrder): RedirectResponse
    {
        if (empty($purchaseOrder->contact_email)) {
            return redirect()->back();
        }

        // Notify the customer
        $purchaseOrder->contact->notify(new Notification($purchaseOrder, 'purchase_order_new_vendor', true));

        event(new DocumentSent($purchaseOrder));

        flash(
            trans(
                'documents.messages.email_sent',
                ['type' => trans_choice('sales-purchase-orders::general.purchase_orders', 1)]
            )
        )->success();

        return redirect()->back();
    }

    /**
     * Print the sales order.
     *
     * @param Document $purchaseOrder
     *
     * @return false|Response|string|string[]
     */
    public function printPurchaseOrder(Document $purchaseOrder)
    {
        $purchaseOrder = $this->preparePurchaseOrder($purchaseOrder);

        $view = view($purchaseOrder->template_path, ['document' => $purchaseOrder]);

        return mb_convert_encoding($view, 'HTML-ENTITIES', 'UTF-8');
    }

    /**
     * Download the PDF file of sales order.
     *
     * @param Document $purchaseOrder
     *
     * @return Response
     */
    public function pdfPurchaseOrder(Document $purchaseOrder): Response
    {
        $purchaseOrder = $this->preparePurchaseOrder($purchaseOrder);

        $view = view($purchaseOrder->template_path, ['document' => $purchaseOrder, 'currency_style' => true])->render();
        $html = mb_convert_encoding($view, 'HTML-ENTITIES', 'UTF-8');

        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML($html);

        //$pdf->setPaper('A4', 'portrait');

        $file_name = $this->getDocumentFileName($purchaseOrder);

        return $pdf->download($file_name);
    }

    protected function preparePurchaseOrder(Document $purchaseOrder): Document
    {
        $purchaseOrder->template_path =
            'sales-purchase-orders::purchase_orders.print_' . setting('sales-purchase-orders.purchase_order.template');

        event(new DocumentPrinting($purchaseOrder));

        return $purchaseOrder;
    }
}
