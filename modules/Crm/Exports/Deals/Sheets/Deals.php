<?php

namespace Modules\Crm\Exports\Deals\Sheets;

use App\Abstracts\Export;
use Modules\Crm\Models\Deal as Model;
use Modules\Crm\Models\DealPipelineStage;

class Deals extends Export
{
    public function collection()
    {
        $model = Model::usingSearchString(request('search'));

        if (!empty($this->ids)) {
            $model->whereIn('id', (array) $this->ids);
        }

        return $model->cursor();
    }

    public function map($model): array
    {
        $model->company_name = $model->company->name;
        $model->contact_name = $model->contact->name;
        $model->created_by = $model->createdby->name;
        $model->pipeline = $model->pipeline->name;
        $model->owner = $model->owner->name;

        $stage = DealPipelineStage::where('pipeline_id', $model->pipeline_id)->where('id', $model->stage_id)->first();

        $model->stage = $stage->name;

        return parent::map($model);
    }

    public function fields(): array
    {
        return [
            'name',
            'amount',
            'company_name',
            'contact_name',
            'closed_at',
            'status',
            'created_by',
            'color',
            'pipeline',
            'owner',
            'stage',
        ];
    }
}
