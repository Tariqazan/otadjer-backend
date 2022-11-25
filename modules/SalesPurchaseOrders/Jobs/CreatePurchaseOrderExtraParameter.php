<?php

namespace Modules\SalesPurchaseOrders\Jobs;

use App\Abstracts\Job;
use App\Models\Document\Document;
use Modules\SalesPurchaseOrders\Models\PurchaseOrder\ExtraParameter;

class CreatePurchaseOrderExtraParameter extends Job
{
    protected $document;

    protected $request;

    public function __construct(Document $document, $request)
    {
        $this->document = $document;
        $this->request  = $this->getRequestInstance($request);
    }

    public function handle(): ExtraParameter
    {
        return ExtraParameter::create(
            [
                'company_id'             => $this->document->company_id,
                'document_id'            => $this->document->id,
                'expected_delivery_date' => $this->request->get('expected_delivery_date'),
            ]
        );
    }
}
