<?php

namespace Modules\Crm\Exports\Deals\Sheets;

use App\Abstracts\Export;
use App\Models\Auth\User;
use Modules\Crm\Models\Deal;
use Modules\Crm\Models\DealActivity as Model;

class DealActivities extends Export
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
        $deal = Deal::where('id', $model->deal_id)->first();
        if (!empty($deal)) {
            $model->deal_name = $deal->name;
        }

        $assigned = User::where('id', $model->assigned_id)->first();
        if (!empty($assigned)) {
            $model->assigned = $assigned->name;
        }

        $model->created_by = $model->createdby->name;
        $model->activity_type = $model->activitytype->name;

        return parent::map($model);
    }

    public function fields(): array
    {
        return [
            'name',
            'deal_name',
            'activity_type',
            'date',
            'time',
            'duration',
            'assigned',
            'note',
            'done',
            'created_by',
        ];
    }
}
