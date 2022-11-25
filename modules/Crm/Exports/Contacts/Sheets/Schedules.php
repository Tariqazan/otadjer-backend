<?php

namespace Modules\Crm\Exports\Contacts\Sheets;

use App\Abstracts\Export;
use Modules\Crm\Models\Contact;
use Modules\Crm\Models\Schedule as Model;

class Schedules extends Export
{
    public function collection()
    {
        $model = Model::where('scheduleable_type', 'Modules\Crm\Models\Contact')->usingSearchString(request('search'));

        if (!empty($this->ids)) {
            $model->whereIn('id', (array) $this->ids);
        }

        return $model->cursor();
    }

    public function map($model): array
    {
        $contact = Contact::where('id', $model->scheduleable_id)->first();

        if (!empty($contact)) {
            $model->scheduleable_name = $contact->name;
        }

        $model->created_by = $model->createdby->name;
        $model->user_name = $model->user->name;

        return parent::map($model);
    }

    public function fields(): array
    {
        return [
            'created_by',
            'scheduleable_name',
            'scheduleable_type',
            'type',
            'name',
            'description',
            'started_at',
            'started_time_at',
            'ended_at',
            'ended_time_at',
            'user_name'
        ];
    }
}
