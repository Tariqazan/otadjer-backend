<?php

namespace Modules\CreditDebitNotes\Http\ViewComposers\Invoice;

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Modules\CreditDebitNotes\Services\Credits;

class AdjustAmountDueInDetails
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
        if (!$route_name = Route::currentRouteName()) {
            return;
        }

        $routes = [
            'invoices.show',
            'signed.invoices.show',
            'portal.invoices.show',
        ];

        if (!in_array($route_name, $routes)) {
            return;
        }

        $view_data = $view->getData();

        $invoice = $view_data['document'];

        $applied_credits = $this->credits->getAppliedCredits($invoice);

        $view->with(['hideHeaderAmount' => true])
            ->getFactory()
            ->startPush(
                'header_amount_start',
                view(
                    'credit-debit-notes::partials.invoice.amount_due',
                    array_merge($view_data, ['amount_due' => $invoice->amount_due - $applied_credits])
                )
            );
    }
}
