<?php

namespace Modules\CreditDebitNotes\Http\ViewComposers\Bill;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use Modules\CreditDebitNotes\Models\DebitNote;

class ShowCreateDebitNoteButton
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $bill = $view->getData()['bill'];

        $debit_notes_total_amount = DebitNote::where('status', 'sent')
            ->whereHas('details', function (Builder $query) use ($bill) {
                $query->where('bill_id', $bill->id);
            })
            ->sum('amount');

        $amount_exceeded = bccomp($debit_notes_total_amount, $bill->amount_due) !== -1;

        $view->getFactory()->startPush(
            'add_new_button_start',
            view('credit-debit-notes::partials.bill.create_debit_note_button', compact('bill', 'amount_exceeded'))
        );
    }

}
