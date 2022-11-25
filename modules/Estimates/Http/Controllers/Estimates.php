<?php

namespace Modules\Estimates\Http\Controllers;

use App\Abstracts\Http\Controller;
use App\Events\Document\DocumentPrinting;
use App\Events\Document\DocumentSent;
use App\Http\Requests\Common\Import as ImportRequest;
use Modules\Estimates\Http\Requests\Estimate as Request;
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
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Modules\Estimates\Events\Approved;
use Modules\Estimates\Events\Refused;
use Modules\Estimates\Exports\Estimates as Export;
use Modules\Estimates\Imports\Estimates as Import;
use Modules\Estimates\Models\Estimate as Document;
use Modules\Estimates\Notifications\Estimate as Notification;
use Modules\SalesPurchaseOrders\Models\SalesOrder\Model as SalesOrder;
use PhpOffice\PhpSpreadsheet\Exception as SpreadsheetException;
use PhpOffice\PhpSpreadsheet\Writer\Exception as SpreadsheetWriterException;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Throwable;

class Estimates extends Controller
{
    use Currencies, DateTime, Documents;

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $estimates = Document::estimate()->with('contact', 'transactions')->collect(['document_number' => 'desc']);

        return view('estimates::estimates.index', compact('estimates'));
    }

    /**
     * Show the form for viewing the specified resource.
     *
     * @param Document $estimate
     *
     * @return Factory|View
     */
    public function show(Document $estimate)
    {
        $currency = Currency::where('code', $estimate->currency_code)->first();

        // Get Estimate Totals
        foreach ($estimate->totals_sorted as $estimate_total) {
            $estimate->{$estimate_total->code} = $estimate_total->amount;
        }

        $total = money($estimate->total, $currency->code, true)->format();

        $estimate->grand_total = money($total, $currency->code)->getAmount();

        return view('estimates::estimates.show', compact('estimate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('estimates::estimates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $response = $this->ajaxDispatch(new CreateDocument($request));

        if ($response['success']) {
            $response['redirect'] = route('estimates.estimates.show', $response['data']->id);

            $message = trans('messages.success.added', ['type' => trans_choice('estimates::general.estimates', 1)]);

            flash($message)->success();
        } else {
            $response['redirect'] = route('estimates.estimates.create');

            $message = $response['message'];

            flash($message)->error();
        }

        return response()->json($response);
    }

    /**
     * Duplicate the specified resource.
     *
     * @param Document $estimate
     *
     * @return RedirectResponse
     * @todo check extra params
     *       Duplicate the specified resource.
     *
     */
    public function duplicate(Document $estimate)
    {
        $clone = $this->dispatch(new DuplicateDocument($estimate));

        $message = trans('messages.success.duplicated', ['type' => trans_choice('estimates::general.estimates', 1)]);

        flash($message)->success();

        return redirect()->route('estimates.estimates.edit', $clone->id);
    }

    /**
     * Import the specified resource.
     *
     * @param ImportRequest $request
     *
     * @return RedirectResponse
     */
    public function import(ImportRequest $request)
    {
        $response = $this->importExcel(new Import, $request, trans_choice('estimates::general.estimates', 2));

        if ($response['success']) {
            $response['redirect'] = route('estimates.estimates.index');

            flash($response['message'])->success();
        } else {
            $response['redirect'] = route('import.create', ['sales', 'estimates']);

            flash($response['message'])->error()->important();
        }

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Document $estimate
     *
     * @return Factory|View
     */
    public function edit(Document $estimate)
    {
        return view('estimates::estimates.edit', compact('estimate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Document $estimate
     * @param Request  $request
     *
     * @return JsonResponse
     */
    public function update(Document $estimate, Request $request)
    {
        $response = $this->ajaxDispatch(new UpdateDocument($estimate, $request));

        if ($response['success']) {
            $response['redirect'] = route('estimates.estimates.index');

            $message = trans('messages.success.updated', ['type' => trans_choice('estimates::general.estimates', 1)]);

            flash($message)->success();
        } else {
            $response['redirect'] = route('estimates.estimates.edit', $estimate->id);

            $message = $response['message'];

            flash($message)->error();
        }

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Document $estimate
     *
     * @return JsonResponse
     */
    public function destroy(Document $estimate)
    {
        $response = $this->ajaxDispatch(new DeleteDocument($estimate));

        $response['redirect'] = route('estimates.estimates.index');

        if ($response['success']) {
            $message = trans('messages.success.deleted', ['type' => trans_choice('estimates::general.estimates', 1)]);

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
     * @throws SpreadsheetException
     * @throws SpreadsheetWriterException
     */
    public function export()
    {
        return $this->exportExcel(new Export, trans_choice('estimates::general.estimates', 2));
    }

    /**
     * Mark the estimate as sent.
     *
     * @param Document $estimate
     *
     * @return RedirectResponse
     */
    public function markSent(Document $estimate)
    {
        event(new DocumentSent($estimate));

        $message = trans('documents.messages.marked_sent', ['type' => trans_choice('estimates::general.estimates', 1)]);

        flash($message)->success();

        return redirect()->back();
    }

    /**
     * Mark the estimate as approved.
     *
     * @param Document $estimate
     *
     * @return RedirectResponse
     */
    public function markApproved(Document $estimate)
    {
        event(new Approved($estimate));

        $message = trans(
            'documents.messages.marked_as',
            [
                'type'   => trans_choice('estimates::general.estimates', 1),
                'status' => Str::lower(trans('documents.statuses.approved')),
            ]
        );

        flash($message)->success();

        return redirect()->back();
    }

    /**
     * Mark the estimate as refused.
     *
     * @param Document $estimate
     *
     * @return RedirectResponse
     */
    public function markRefused(Document $estimate)
    {
        event(new Refused($estimate));

        $message = trans(
            'documents.messages.marked_as',
            [
                'type'   => trans_choice('estimates::general.estimates', 1),
                'status' => Str::lower(trans('documents.statuses.refused')),
            ]
        );

        flash($message)->success();

        return redirect()->back();
    }

    /**
     * Download the PDF file of estimate.
     *
     * @param Document $estimate
     *
     * @return RedirectResponse
     * @throws Throwable
     */
    public function emailEstimate(Document $estimate)
    {
        if (empty($estimate->contact_email)) {
            return redirect()->back();
        }

        // Notify the customer
        $estimate->contact->notify(new Notification($estimate, 'estimate_new_customer', true));

        event(new DocumentSent($estimate));

        flash(
            trans('documents.messages.email_sent', ['type' => trans_choice('estimates::general.estimates', 1)])
        )->success();

        return redirect()->back();
    }

    /**
     * Print the estimate.
     *
     * @param Document $estimate
     *
     * @return array|false|View|string|string[]
     */
    public function printEstimate(Document $estimate)
    {
        $estimate = $this->prepareEstimate($estimate);

        $view = view($estimate->template_path, ['document' => $estimate]);

        return mb_convert_encoding($view, 'HTML-ENTITIES', 'UTF-8');
    }

    /**
     * Download the PDF file of estimate.
     *
     * @param Document $estimate
     *
     * @return Response
     * @throws Throwable
     */
    public function pdfEstimate(Document $estimate)
    {
        $estimate = $this->prepareEstimate($estimate);

        $view = view($estimate->template_path, ['document' => $estimate, 'currency_style' => true])->render();
        $html = mb_convert_encoding($view, 'HTML-ENTITIES', 'UTF-8');

        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML($html);

        //$pdf->setPaper('A4', 'portrait');

        return $pdf->download($this->getDocumentFileName($estimate));
    }

    /**
     * @param Document $estimate
     *
     * @return RedirectResponse
     */
    public function convertToInvoice(Document $estimate)
    {
        // Redirect to invoice create page with input
        $data = $estimate->toArray();

        unset($data['amount']);

        $data['document_number'] = $this->getNextDocumentNumber(Document::INVOICE_TYPE);
        $data['status']          = 'draft';
        $data['issued_at']       = Date::now()->format('Y-m-d');
        $data['due_at']          = Date::now()->format('Y-m-d');
        $data['contact']         = $estimate->contact;
        $data['type']            = Document::INVOICE_TYPE;

        $i = 0;
        foreach ($estimate->items as $item) {
            $data['items'][$i] = $item;
            $data['item_id']   = $item->item_id;
            $i++;
        }

        return redirect()->route('invoices.create', ['document_id' => $estimate->id])->withInput($data);
    }

    /**
     * @param Document $estimate
     *
     * @return RedirectResponse
     */
    public function convertToSalesOrder(Document $estimate)
    {
        // Redirect to invoice create page with input
        $data = $estimate->toArray();

        unset($data['amount']);

        $data['document_number'] = $this->getNextDocumentNumber(SalesOrder::TYPE);
        $data['status']          = 'draft';
        $data['issued_at']       = Date::now()->format('Y-m-d');
        $data['due_at']          = Date::now()->format('Y-m-d');
        $data['contact']         = $estimate->contact;
        $data['type']            = SalesOrder::TYPE;
        $data['order_number']    = $estimate->document_number;

        $i = 0;
        foreach ($estimate->items as $item) {
            $data['items'][$i] = $item;
            $data['item_id']   = $item->item_id;
            $i++;
        }

        return redirect()->route('sales-purchase-orders.sales-orders.create', ['document_id' => $estimate->id])->withInput($data);
    }

    protected function prepareEstimate(Document $estimate)
    {
        $estimate->template_path = 'estimates::estimates.print_' . setting('estimates.estimate.template');

        event(new DocumentPrinting($estimate));

        return $estimate;
    }
}
