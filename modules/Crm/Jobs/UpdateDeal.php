<?php

namespace Modules\Crm\Jobs;

use App\Abstracts\Job;
use App\Models\Common\Contact;
use App\Models\Setting\Category;
use App\Models\Setting\Currency;
use App\Models\Document\Document;
use App\Jobs\Document\CreateDocument as BaseCreateDocument;
use App\Http\Requests\Document\Document as Request;
use App\Traits\Documents;
use Modules\Crm\Models\Contact as CrmContact;
use Modules\Crm\Models\Deal;
use Date;

class UpdateDeal extends Job
{
    use Documents;

    protected $deal;
    protected $request;

    /**
     * Create a new job instance.
     *
     * @param  $deal
     * @param  $request
     */
    public function __construct($deal, $request)
    {
        $this->deal = $deal;
        $this->request = $this->getRequestInstance($request);
    }

    /**
     * Execute the job.
     *
     * @return Deal
     */
    public function handle()
    {
        $this->authorize();

        $this->deal->update($this->request->all());

        if ($this->deal->status == "won"){
            $crm_contact = CrmContact::where('id', $this->deal->crm_contact_id)->first();
            $contact = Contact::where('id',  $crm_contact->contact_id)->first();
            $currency = Currency::where('code', setting('default.currency'))->first();

            $date = Date::now()->toDateTimeString();

            $amount = str_replace(",", "", $this->deal->amount);

            $items =[[
                'name' => $this->deal->name,
                'price' => $amount,
                'quantity' => 1,
                'currency' => $currency->code,
                'description' => '',
            ]];

            $invoice_data =  [
                'company_id' => company_id(),
                'contact_id' => $contact->id,
                'issued_at' => $date,
                'due_at' => $this->deal->closed_at,
                'type' => Document::INVOICE_TYPE,
                'document_number' => $this->getNextDocumentNumber(Document::INVOICE_TYPE),
                'items' => $items,
                'currency_code' => $currency->code,
                'currency_rate' => $currency->rate,
                'category_id' => Category::income()->pluck('id')->first(),
                'contact_name' =>  $contact->name,
                'contact_email' => $contact->email,
                'contact_tax_number' => $contact->tax_number,
                'contact_phone' =>  $contact->phone,
                'contact_address' =>  $contact->address,
                'status' => 'draft',
            ];

            $invoice_request = new Request();
            $invoice_request->merge($invoice_data);

            $invoice = $this->dispatch(new BaseCreateDocument($invoice_data));

            $this->deal->invoice_id = $invoice->id;

            event(new \App\Events\Document\DocumentSent($invoice));
        }

        return($this->deal);
    }

    /**
     * Determine if this action is applicable.
     *
     * @return void
     */
    public function authorize()
    {
        if (($this->request['enabled'] == 0) && ($relationships = $this->getRelationships())) {
            $message = trans('messages.warning.disabled', ['name' => $this->deal->name, 'text' => implode(', ', $relationships)]);

            throw new \Exception($message);
        }
    }

    public function getRelationships()
    {
        $rels = [];

        return $this->countRelationships($this->deal, $rels);
    }
}
