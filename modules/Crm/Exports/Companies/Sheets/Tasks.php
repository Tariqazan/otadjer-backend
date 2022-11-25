<?php

namespace Modules\Crm\Exports\Companies\Sheets;

use App\Abstracts\Export;
use Modules\Crm\Models\Company;
use Modules\Crm\Models\Task as Model;

class Tasks extends Export
{
    public function collection()
    {
        $model = Model::where('taskable_type', 'Modules\Crm\Models\Company')->usingSearchString(request('search'));

        if (!empty($this->ids)) {
            $model->whereIn('id', (array) $this->ids);
        }

        return $model->cursor();
    }

    public function map($model): array
    {
        $company = Company::where('id', $model->taskable_id)->first();

        if (!empty($company)) {
            $model->taskable_name = $company->name;
        }

        $model->created_by = $model->createdby->name;
        $model->user_name = $model->user->name;

        return parent::map($model);
    }

    public function fields(): array
    {
        return [
            'created_by',
            'taskable_name',
            'taskable_type',
            'name',
            'description',
            'user_name',
            'started_at',
            'started_time_at',
        ];
    }
}
