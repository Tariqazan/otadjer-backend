<?php

namespace Modules\Estimates\Http\ViewComposers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\View\View;
use Modules\Estimates\Models\Estimate;

class AddEstimatesStatistics
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
        if (false === user()->can('read-estimates-estimates')) {
            return;
        }

        $limit     = request('limit', setting('default.list_limit', '25'));
        $viewData  = $view->getData();
        $customer  = $viewData['customer'];
        $estimates = Estimate::estimate()->with('transactions')->contact($customer->id)->get();
        $estimates = $this->paginate($estimates->sortByDesc('issued_at'), $limit);


        $view->getFactory()->startPush(
            'customer_invoices_count_start',
            view('estimates::partials.customer.estimates_count', ['estimates_count' => $estimates->total()])
        );
        $view->getFactory()->startPush(
            'customer_invoices_tab_start',
            view('estimates::partials.customer.estimates_tab')
        );
        $view->getFactory()->startPush(
            'customer_invoices_content_start',
            view(
                'estimates::partials.customer.estimates_content',
                [
                    'estimates' => $estimates,
                    'limits'    => ['10' => '10', '25' => '25', '50' => '50', '100' => '100'],
                ]
            )
        );
    }

    /**
     * Generate a pagination collection.
     *
     * @param array|Collection $items
     * @param int $perPage
     * @param int $page
     * @param array $options
     *
     * @return LengthAwarePaginator
     */
    public function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $perPage = $perPage ?: (int) request('limit', setting('default.list_limit', '25'));

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
