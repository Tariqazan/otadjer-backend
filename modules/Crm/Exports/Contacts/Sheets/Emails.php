<?php

namespace Modules\Crm\Exports\Contacts\Sheets;

use App\Abstracts\Export;
use Modules\Crm\Models\Contact;
use Modules\Crm\Models\Email as Model;

class Emails extends Export
{
    public function collection()
    {
        $model = Model::where('emailable_type', 'Modules\Crm\Models\Contact')->usingSearchString(request('search'));

        if (!empty($this->ids)) {
            $model->whereIn('id', (array) $this->ids);
        }

        return $model->cursor();
    }

    public function map($model): array
    {
        $contact = Contact::where('id', $model->emailable_id)->first();

        if (!empty($contact)) {
            $model->emailable_name = $contact->name;
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
