<?php

namespace Modules\Crm\Exports\Contacts\Sheets;

use App\Abstracts\Export;
use Modules\Crm\Models\CompanyContact as Model;

class CompanyContacts extends Export
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

        return parent::map($model);
    }

    public function fields(): array
    {
        return [
            'company_name',
            'contact_name',
            'created_by'
        ];
    }
}
