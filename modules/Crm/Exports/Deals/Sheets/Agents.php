<?php

namespace Modules\Crm\Exports\Deals\Sheets;

use App\Abstracts\Export;
use Modules\Crm\Models\Deal;
use Modules\Crm\Models\DealAgent as Model;

class Agents extends Export
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

        $model->created_by = $model->createdby->name;
        $model->user_name = $model->user->name;

        return parent::map($model);
    }

    public function fields(): array
    {
        return [
            'deal_name',
            'user_name',
            'created_by',
        ];
    }
}
