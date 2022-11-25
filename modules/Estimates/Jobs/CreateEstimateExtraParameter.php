<?php

namespace Modules\Estimates\Jobs;

use App\Abstracts\Job;
use App\Models\Document\Document;
use Modules\Estimates\Models\EstimateExtraParameter;

class CreateEstimateExtraParameter extends Job
{
    protected $document;

    protected $request;

    public function __construct(Document $document, $request)
    {
        $this->document = $document;
        $this->request  = $this->getRequestInstance($request);
    }

    public function handle(): EstimateExtraParameter
    {
        return EstimateExtraParameter::create(
            [
                'company_id'  => $this->document->company_id,
                'document_id' => $this->document->id,
                'expire_at'   => $this->request->get('expire_at'),
            ]
        );
    }
}
