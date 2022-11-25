<?php

namespace Modules\CreditDebitNotes\Http\ViewComposers\Invoice;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use Modules\CreditDebitNotes\Models\CreditNote;

class ShowCreateCreditNoteButton
{

    /**
     * Bind data to the view.
     *
     * @param View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $invoice = $view->getData()['invoice'];

        $credit_notes_total_amount = CreditNote::where('status', 'sent')
            ->whereHas('details', function (Builder $query) use ($invoice) {
                $query->where('invoice_id', $invoice->id);
            })
            ->sum('amount');

        $amount_exceeded = bccomp($credit_notes_total_amount, $invoice->amount_due) !== -1;

        $view->getFactory()->startPush(
            'add_new_button_start',
            view(
                'credit-debit-notes::partials.invoice.create_credit_note_button',
                compact('invoice', 'amount_exceeded')
            )
        );
    }

}
