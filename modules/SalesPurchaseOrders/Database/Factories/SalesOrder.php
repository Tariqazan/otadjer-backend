<?php

namespace Modules\SalesPurchaseOrders\Database\Factories;

use App\Events\Document\DocumentCancelled;
use App\Events\Document\DocumentCreated;
use App\Events\Document\DocumentSent;
use App\Jobs\Document\UpdateDocument;
use App\Models\Common\Contact;
use App\Models\Common\Item;
use App\Models\Document\Document;
use App\Models\Setting\Tax;
use App\Utilities\Overrider;
use Modules\SalesPurchaseOrders\Events\Confirmed;
use Modules\SalesPurchaseOrders\Models\SalesOrder\Model;
use Database\Factories\Document as DocumentFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalesOrder extends DocumentFactory
{
    /**
     * Indicate that the model type is invoice.
     */
    public function sales(): Factory
    {
        return $this->state(function (array $attributes): array {
            $contacts = Contact::customer()->enabled()->get();

            if ($contacts->count()) {
                $contact = $contacts->random(1)->first();
            } else {
                $contact = Contact::factory()->customer()->enabled()->create();
            }

            $statuses = ['draft', 'sent', 'cancelled', 'confirmed', 'invoiced'];

            return [
                'type' => Model::TYPE,
                'document_number' => setting('sales-purchase-orders.sales_order.number_prefix') . $this->faker->randomNumber(setting('sales-purchase-orders.sales_order.number_digit')),
                'category_id' => $this->company->categories()->income()->get()->random(1)->pluck('id')->first(),
                'contact_id' => $contact->id,
                'contact_name' => $contact->name,
                'contact_email' => $contact->email,
                'contact_tax_number' => $contact->tax_number,
                'contact_phone' => $contact->phone,
                'contact_address' => $contact->address,
                'status' => $this->faker->randomElement($statuses),
            ];
        });
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

            switch ($init_status) {
                case 'sent':
                    event(new DocumentSent($updated_document));

                    break;
                case 'confirmed':
                    event(new Confirmed($updated_document));

                    break;
                case 'cancelled':
                    event(new DocumentCancelled($updated_document));

                    break;
            }
        });
    }
}
