<?php

namespace Modules\Crm\Exports\Deals\Sheets;

use App\Abstracts\Export;
use Modules\Crm\Models\Deal;
use Modules\Crm\Models\Email as Model;

class Emails extends Export
{
    public function collection()
    {
        $model = Model::where('emailable_type', 'Modules\Crm\Models\Deal')->usingSearchString(request('search'));

        if (!empty($this->ids)) {
            $model->whereIn('id', (array) $this->ids);
        }

        return $model->cursor();
    }

    public function map($model): array
    {
        $deal = Deal::where('id', $model->emailable_id)->first();

        if (!empty($deal)) {
            $model->emailable_name = $deal->name;
        }

        $model->created_by = $model->createdBy->name;

        return parent::map($model);
    }

    public function fields(): array
    {
        return [
            'created_by',
            'emailable_name',
            'emailable_type',
            'from',
            'to',
            'subject',
            'body'
        ];
    }
}
