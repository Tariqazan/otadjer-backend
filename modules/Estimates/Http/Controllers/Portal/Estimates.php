<?php

namespace Modules\Estimates\Http\Controllers\Portal;

use App\Abstracts\Http\Controller;
use App\Events\Document\DocumentPrinting;
use App\Events\Document\DocumentViewed;
use App\Models\Setting\Category;
use App\Traits\Currencies;
use App\Traits\DateTime;
use App\Traits\Documents;
use App\Traits\Uploads;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Modules\Estimates\Events\Approved;
use Modules\Estimates\Events\Refused;
use Modules\Estimates\Models\Estimate as Document;

class Estimates extends Controller
{
    use DateTime, Currencies, Uploads, Documents;

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $estimates = Document::estimate()->with('contact', 'items', 'histories')
                             ->accrued()->where('contact_id', user()->contact->id)
                             ->collect(['document_number' => 'desc']);

        return view('estimates::portal.estimates.index', compact('estimates'));
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
        event(new DocumentViewed($estimate));

        return view('estimates::portal.estimates.show', compact('estimate'));
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
     * Show the form for viewing the specified resource.
     *
     * @param Document $estimate
     *
     * @return Factory|View
     */
    public function printEstimate(Document $estimate)
    {
        $estimate = $this->prepareEstimate($estimate);

        return view($estimate->template_path, ['document' => $estimate]);
    }

    /**
     * Show the form for viewing the specified resource.
     *
     * @param Document $estimate
     *
     * @return Response
     */
    public function pdfEstimate(Document $estimate)
    {
        $estimate = $this->prepareEstimate($estimate);

        $view = view($estimate->template_path, ['document' => $estimate, 'currency_style' => true])->render();
        $html = mb_convert_encoding($view, 'HTML-ENTITIES');

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($html);

        //$pdf->setPaper('A4', 'portrait');

        $file_name = 'estimate_' . time() . '.pdf';

        return $pdf->download($file_name);
    }

    protected function prepareEstimate(Document $estimate)
    {
        $estimate->template_path = 'estimates::estimates.print_' . setting('estimates.estimate.template');

        event(new DocumentPrinting($estimate));

        return $estimate;
    }

    public function signed(Document $estimate)
    {
        if (empty($estimate)) {
            redirect()->route('login');
        }

        $printAction   = URL::signedroute(
            'signed.estimates.estimates.print',
            [$estimate->id, 'company_id' => company_id()]
        );
        $pdfAction     = URL::signedroute(
            'signed.estimates.estimates.pdf',
            [$estimate->id, 'company_id' => company_id()]
        );

        $approveAction = URL::signedroute(
            'signed.estimates.estimates.approve',
            [$estimate->id, 'company_id' => company_id()]
        );

        $refuseAction  = URL::signedroute(
            'signed.estimates.estimates.refuse',
            [$estimate->id, 'company_id' => company_id()]
        );

        event(new DocumentViewed($estimate));

        return view(
            'estimates::portal.estimates.signed',
            compact(
                'estimate',
                'printAction',
                'pdfAction',
                'approveAction',
                'refuseAction'
            )
        );
    }
}
