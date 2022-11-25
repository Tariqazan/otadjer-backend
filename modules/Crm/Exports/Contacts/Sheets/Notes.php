<?php

namespace Modules\Crm\Exports\Contacts\Sheets;

use App\Abstracts\Export;
use Modules\Crm\Models\Contact;
use Modules\Crm\Models\Note as Model;

class Notes extends Export
{
    public function collection()
    {
        $model = Model::where('noteable_type', 'Modules\Crm\Models\Contact')->usingSearchString(request('search'));

        if (!empty($this->ids)) {
            $model->whereIn('id', (array) $this->ids);
        }

        return $model->cursor();
    }

    public function map($model): array
    {
        $contact = Contact::where('id', $model->noteable_id)->first();

        if (!empty($contact)) {
            $model->noteable_name = $contact->name;
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
