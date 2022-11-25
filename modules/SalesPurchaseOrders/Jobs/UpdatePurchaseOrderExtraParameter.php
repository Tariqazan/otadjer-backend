<?php

namespace Modules\SalesPurchaseOrders\Jobs;

use App\Abstracts\Job;
use App\Models\Document\Document;

class UpdatePurchaseOrderExtraParameter extends Job
{
    protected $document;

    protected $request;

    public function __construct(Document $document, $request)
    {
        $this->document = $document;
        $this->request  = $this->getRequestInstance($request);
    }

    public function handle(): bool
    {
        if (null === $this->document->extra_param->expected_delivery_date
            && $this->request->get('expected_delivery_date', false)) {
            $this->dispatch(new CreatePurchaseOrderExtraParameter($this->document, $this->request));
            return true;
        }

        return $this->document->extra_param->update($this->request->all());
    }
}
