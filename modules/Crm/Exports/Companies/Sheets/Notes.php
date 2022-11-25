<?php

namespace Modules\Crm\Exports\Companies\Sheets;

use App\Abstracts\Export;
use Modules\Crm\Models\Company;
use Modules\Crm\Models\Note as Model;

class Notes extends Export
{
    public function collection()
    {
        $model = Model::where('noteable_type', 'Modules\Crm\Models\Company')->usingSearchString(request('search'));

        if (!empty($this->ids)) {
            $model->whereIn('id', (array) $this->ids);
        }

        return $model->cursor();
    }

    public function map($model): array
    {
        $company = Company::where('id', $model->noteable_id)->first();

        if (!empty($company)) {
            $model->noteable_name = $company->name;
        }

        $model->created_by = $model->createdby->name;

        return parent::map($model);
    }

    public function fields(): array
    {
        return [
            'created_by',
            'noteable_name',
            'noteable_type',
            'message'
        ];
    }
}
