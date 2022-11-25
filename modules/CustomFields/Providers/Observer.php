<?php

namespace Modules\CustomFields\Providers;

use App\Models\Banking\Account;
use App\Models\Banking\Transaction;
use App\Models\Banking\Transfer;
use App\Models\Common\Company;
use App\Models\Common\Contact;
use App\Models\Common\Item;
use App\Models\Document\Document;
use App\Models\Document\DocumentItem;
use Illuminate\Support\ServiceProvider;

class Observer extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        Company::observe('Modules\CustomFields\Observers\Common\Company');

        Item::observe('Modules\CustomFields\Observers\Common\Item');

        Contact::observe('Modules\CustomFields\Observers\Common\Contact');

        Document::observe('Modules\CustomFields\Observers\Document\Document');
        DocumentItem::observe('Modules\CustomFields\Observers\Document\DocumentItem');

        Account::observe('Modules\CustomFields\Observers\Banking\Account');
        Transfer::observe('Modules\CustomFields\Observers\Banking\Transfer');
        Transaction::observe('Modules\CustomFields\Observers\Banking\Transaction');
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
