<?php

namespace Modules\Crm\Listeners;

use App\Events\Common\GlobalSearched as Event;
use Modules\Crm\Models\Deal;
use Modules\Crm\Models\Company;
use Modules\Crm\Models\Contact;

class GlobalSearched
{
    /**
     * Handle the event.
     *
     * @param Event $event
     * @return void
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function handle(Event $event)
    {
        $this->user = user();
        $this->keyword = $event->search->keyword;
        $this->results = $event->search->results;

        $this->searchOnContacts($event);
        $this->searchOnCompanies($event);
        $this->searchOnDeals($event);

        return view('livewire.common.search');
    }


    /**
     * Searching on Banking Contacts with given keyword.
     *
     * @return void
     */
    public function searchOnContacts($event)
    {
        if (!$this->user->can('read-crm-contacts')) {
            return;
        }

        $contacts = Contact::enabled()
            ->usingSearchString($this->keyword)
            ->take(setting('default.select_limit'))
            ->get();

        if ($contacts->isEmpty()) {
            return;
        }

        foreach ($contacts as $contact) {
            $event->search->results[] = (object) [
                'id' => $contact->id,
                'name' => $contact->name,
                'type' => 'CRM '. trans_choice('general.contacts', 1),
                'color' => '#55588b',
                'href' => route('crm.contacts.edit', $contact->id),
            ];
        }
    }

    /**
     * Searching on Banking Companies with given keyword.
     *
     * @return void
     */
    public function searchOnCompanies($event)
    {
        if (!$this->user->can('read-crm-companies')) {
            return;
        }

        $Companies = Company::enabled()
            ->usingSearchString($this->keyword)
            ->take(setting('default.select_limit'))
            ->get();

        if ($Companies->isEmpty()) {
            return;
        }

        foreach ($Companies as $Company) {
            $event->search->results[] = (object) [
                'id' => $Company->id,
                'name' => $Company->name,
                'type' => 'CRM '. trans_choice('general.companies', 1),
                'color' => '#55588b',
                'href' => route('crm.companies.edit', $Company->id),
            ];
        }
    }

    /**
     * Searching on Banking Deals with given keyword.
     *
     * @return void
     */
    public function searchOnDeals($event)
    {
        if (!$this->user->can('read-crm-deals')) {
            return;
        }

        $Deals = Deal::where('name', 'like', '%'. $this->keyword . '%')
            ->take(setting('default.select_limit'))
            ->get();

        if ($Deals->isEmpty()) {
            return;
        }

        foreach ($Deals as $Deal) {
            $event->search->results[] = (object) [
                'id' => $Deal->id,
                'name' => $Deal->name,
                'type' => 'CRM '. trans_choice('crm::general.deals', 1),
                'color' => '#55588b',
                'href' => route('crm.deals.edit', $Deal->id),
            ];
        }
    }
}