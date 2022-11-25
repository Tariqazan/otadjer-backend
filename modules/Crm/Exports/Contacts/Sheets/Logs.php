<?php

namespace Modules\Crm\Exports\Contacts\Sheets;

use App\Abstracts\Export;
use Modules\Crm\Models\Contact;
use Modules\Crm\Models\Log as Model;

class Logs extends Export
{
    public function collection()
    {
        $model = Model::where('logable_type', 'Modules\Crm\Models\Contact')->usingSearchString(request('search'));

        if (!empty($this->ids)) {
            $model->whereIn('id', (array) $this->ids);
        }

        return $model->cursor();
    }

    public function map($model): array
    {
        $contact = Contact::where('id', $model->logable_id)->first();

        if (!empty($contact)) {
            $model->logable_name = $contact->name;
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
