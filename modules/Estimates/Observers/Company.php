<?php

namespace Modules\Estimates\Observers;

use App\Abstracts\Observer;
use App\Models\Common\Company as Model;
use Modules\Estimates\Models\Estimate;
use Modules\Estimates\Models\EstimateDocument;

class Company extends Observer
{
    /**
     * Listen to the deleted event.
     *
     * @param Model $company
     *
     * @return void
     */
    public function deleted(Model $company)
    {
        $items = Estimate::estimate()->where('company_id', $company->id)->get();

        foreach ($items as $item) {
            $estimateInvoices = EstimateDocument::allCompanies()->where('document_id', $item->id)->get();

            foreach ($estimateInvoices as $estimateInvoice) {
                $estimateInvoice->delete();
            }

            $item->delete();
            $item->extra_param()->delete();
        }
    }
}
