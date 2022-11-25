<?php

namespace Modules\CreditDebitNotes\Http\ViewComposers\Invoice;

use App\Models\Document\DocumentTotal;
use Illuminate\View\View;
use Modules\CreditDebitNotes\Services\Credits;

class ShowAppliedCredits
{
    /**
     * @var Credits
     */
    private $credits;

    public function __construct(Credits $credits)
    {
        $this->credits = $credits;
    }

    public function compose(View $view)
    {
        $invoice = $view->getData()['invoice'];

        $applied_credits = $this->credits->getAppliedCredits($invoice);

        if (!$applied_credits) {
            return;
        }

        $invoice->totals_sorted = $invoice->totals_sorted->reject(function ($total) {
            return $total->code === 'total';
        });

        $invoice->totals_sorted->push(new DocumentTotal([
            'code'   => 'applied_credits',
            'name'   => trans_choice('credit-debit-notes::invoices.credits', 2),
            'amount' => -$applied_credits,
        ]));

        $invoice->totals_sorted->push(new DocumentTotal([
            'code'   => 'total_without_applied_credits',
            'name'   => trans('invoices.total'),
            'amount' => $invoice->amount_due - $applied_credits,
        ]));

        $view->with('invoice', $invoice);
    }
}
