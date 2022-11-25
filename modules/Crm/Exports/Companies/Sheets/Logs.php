<?php

namespace Modules\Crm\Exports\Companies\Sheets;

use App\Abstracts\Export;
use Modules\Crm\Models\Company;
use Modules\Crm\Models\Log as Model;

class Logs extends Export
{
    public function collection()
    {
        $model = Model::where('logable_type', 'Modules\Crm\Models\Company')->usingSearchString(request('search'));

        if (!empty($this->ids)) {
            $model->whereIn('id', (array) $this->ids);
        }

        return $model->cursor();
    }

    public function map($model): array
    {
        $company = Company::where('id', $model->logable_id)->first();

        if (!empty($company)) {
            $model->logable_name = $company->name;
        }

        $model->created_by = $model->createdby->name;

        return parent::map($model);
    }

    public function fields(): array
    {
        return [
            'created_by',
            'logable_name',
            'logable_type',
            'type',
            'date',
            'time',
            'subject',
            'description',
        ];
    }
}
