<?php

namespace Modules\Estimates\Jobs;

use App\Abstracts\Http\FormRequest;
use App\Abstracts\Job;
use Modules\Estimates\Models\Estimate;

class UpdateEstimateExtraParameter extends Job
{
    protected $document;

    protected $request;

    /**
     * UpdateSalesOrderExtraParameter constructor.
     *
     * @param Estimate       $document
     * @param FormRequest $request
     */
    public function __construct($document, $request)
    {
        $this->document = $document;
        $this->request  = $this->getRequestInstance($request);
    }

    public function handle(): bool
    {
        if (null === $this->document->extra_param->expire_at && $this->request->get('expire_at', false))
        {
            $this->dispatch(new CreateEstimateExtraParameter($this->document, $this->request));
            return true;
        }

        return $this->document->extra_param->update($this->request->all());
    }
}
