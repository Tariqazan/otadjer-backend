<?php

namespace Modules\CreditDebitNotes\Database\Factories;

use App\Models\Common\Contact;
use Modules\CreditDebitNotes\Models\DebitNote as Model;
use App\Traits\Documents;
use Database\Factories\Document;
use Illuminate\Database\Eloquent\Factories\Factory;

class DebitNote extends Document
{
    use Documents;

    protected $model = Model::class;

    public function definition(): array
    {
        $contact = Contact::vendor()->enabled()->inRandomOrder()->first();
        if (!$contact) {
            $contact = Contact::factory()->vendor()->enabled()->create();
        }

        $statuses = ['draft', 'sent', 'viewed', 'cancelled'];

        return array_merge(parent::definition(), [
            'type'               => 'debit-note',
            'document_number'    => $this->getNextDocumentNumber('debit-note'),
            'category_id'        => $this->company->categories()->expense()->inRandomOrder()->pluck('id')->first(),
            'contact_id'         => $contact->id,
            'contact_name'       => $contact->name,
            'contact_email'      => $contact->email,
            'contact_tax_number' => $contact->tax_number,
            'contact_phone'      => $contact->phone,
            'contact_address'    => $contact->address,
            'status'             => $this->faker->randomElement($statuses),
        ]);
    }
}
