<?php

namespace Modules\Estimates\Database\Factories;

use App\Abstracts\Factory;
use App\Events\Document\DocumentCancelled;
use App\Events\Document\DocumentCreated;
use App\Events\Document\DocumentReceived;
use App\Events\Document\DocumentSent;
use App\Events\Document\DocumentViewed;
use App\Jobs\Document\UpdateDocument;
use App\Models\Common\Contact;
use App\Models\Common\Item;
use App\Models\Document\Document;
use App\Models\Setting\Tax;
use App\Utilities\Date;
use App\Utilities\Overrider;
use Database\Factories\Document as DocumentFactory;
use Modules\Estimates\Events\Approved;
use Modules\Estimates\Events\Refused;
use Modules\Estimates\Models\Estimate as Model;

class Estimate extends DocumentFactory
{
    /**
     * Indicate that the model type is estimate.
     */
    public function estimate(): Factory
    {
        return $this->state(
            function (array $attributes): array {
                $contacts = Contact::customer()->enabled()->get();

                if ($contacts->count()) {
                    $contact = $contacts->random(1)->first();
                } else {
                    $contact = Contact::factory()->customer()->enabled()->create();
                }

                $expire_at = Date::parse($attributes['issued_at'])
                                 ->addDays($this->faker->randomNumber(3))
                                 ->format('Y-m-d');

                $statuses = ['draft', 'sent', 'viewed', 'cancelled', 'approved', 'refused', 'expired', 'invoiced'];

                return [
                    'type'               => Model::TYPE,
                    'document_number'    => setting('estimates.estimate.number_prefix') .
                                            $this->faker->randomNumber(setting('estimates.estimate.number_digit')),
                    'category_id'        => $this->company->categories()
                                                          ->income()
                                                          ->get()
                                                          ->random(1)
                                                          ->pluck('id')
                                                          ->first(),
                    'contact_id'         => $contact->id,
                    'contact_name'       => $contact->name,
                    'contact_email'      => $contact->email,
                    'contact_tax_number' => $contact->tax_number,
                    'contact_phone'      => $contact->phone,
                    'contact_address'    => $contact->address,
                    'expire_at'          => $expire_at,
                    'status'             => $this->faker->randomElement($statuses),
                ];
            }
        );
    }

    public function approved()
    {
        return $this->state(
            function (array $attributes) {
                return ['status' => 'approved'];
            }
        );
    }

    public function refused()
    {
        return $this->state(
            function (array $attributes) {
                return ['status' => 'refused'];
            }
        );
    }

    public function invoiced()
    {
        return $this->state(
            function (array $attributes) {
                return ['status' => 'invoiced'];
            }
        );
    }

    public function expired()
    {
        return $this->state(
            function (array $attributes) {
                return ['status' => 'expired'];
            }
        );
    }

    public function configure()
    {
        return $this->afterCreating(function (Document $document) {
            Overrider::load('currencies');

            $init_status = $document->status;

            $document->status = 'draft';
            event(new DocumentCreated($document, request()));
            $document->status = $init_status;

            $amount = $this->faker->randomFloat(2, 1, 1000);

            $taxes = Tax::enabled()->get();

            if ($taxes->count()) {
                $tax = $taxes->random(1)->first();
            } else {
                $tax = Tax::factory()->enabled()->create();
            }

            $items = Item::enabled()->get();

            if ($items->count()) {
                $item = $items->random(1)->first();
            } else {
                $item = Item::factory()->enabled()->create();
            }

            $items = [
                [
                    'name' => $item->name,
                    'description' => $this->faker->text,
                    'item_id' => $item->id,
                    'tax_ids' => [$tax->id],
                    'quantity' => '1',
                    'price' => $amount,
                    'currency' => $document->currency_code,
                ]
            ];

            $request = [
                'items' => $items,
                'recurring_frequency' => 'no',
            ];

            $document = Model::find($document->id);

            $updated_document = $this->dispatch(new UpdateDocument($document, $request));

            $statuses = ['draft', 'sent', 'viewed', 'cancelled', 'approved', 'refused', 'expired', 'invoiced'];

            switch ($init_status) {
                case 'received':
                    event(new DocumentReceived($updated_document));

                    break;
                case 'sent':
                    event(new DocumentSent($updated_document));

                    break;
                case 'viewed':
                    $updated_document->status = 'sent';
                    event(new DocumentViewed($updated_document));
                    $updated_document->status = $init_status;

                    break;
                case 'approved':
                    $document->status = 'sent';
                    event(new Approved($document));
                    $document->status = $init_status;

                    break;
                case 'refused':
                    $document->status = 'sent';
                    event(new Refused($document));
                    $document->status = $init_status;

                    break;
                case 'cancelled':
                    event(new DocumentCancelled($updated_document));

                    break;
            }
        });
    }
}
