<?php

namespace Modules\CustomFields\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class ViewComposer extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        View::composer([
            'common.companies.create',
            'common.companies.edit',
            'common.items.create',
            'common.items.edit',
            'sales.invoices.create',
            'sales.invoices.edit',
            'sales.revenues.create',
            'sales.revenues.edit',
            'sales.customers.create',
            'sales.customers.edit',
            'purchases.bills.create',
            'purchases.bills.edit',
            'purchases.payments.create',
            'purchases.payments.edit',
            'purchases.vendors.create',
            'purchases.vendors.edit',
            'banking.accounts.create',
            'banking.accounts.edit',
            'banking.transfers.create',
            'banking.transfers.edit',
            'modals.customers.create',
            'modals.customers.edit',
            'modals.vendors.create',
            'modals.vendors.edit',
            'modals.items.create',
            'modals.accounts.create',
            'modals.documents.payment',
            'employees::employees.create',
            'employees::employees.edit',
            'employees::positions.create',
            'employees::positions.edit',
            'assets::assets.create',
            'assets::assets.edit',
            'expenses::expense_claims.create',
            'expenses::expense_claims.edit',
        ], 'Modules\CustomFields\Http\ViewComposers\Field');

        View::composer([
            'sales.customers.show',
            'purchases.vendors.show',
            'inventory::items.show',
            'components.documents.template.classic',
            'components.documents.template.default',
            'components.documents.template.modern',
            'components.documents.template.line-item',
            'components.transactions.template.default',
        ], 'Modules\CustomFields\Http\ViewComposers\FieldShow');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
