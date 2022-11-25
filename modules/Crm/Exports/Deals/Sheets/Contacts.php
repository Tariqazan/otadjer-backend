<?php

namespace Modules\Crm\Exports\Deals\Sheets;

use App\Abstracts\Export;
use App\Models\Common\Contact;
use Modules\Crm\Models\Contact as Model;

class Contacts extends Export
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
        $model->name = $model->contact->name;
        $model->email = $model->contact->email;
        $model->tax_number = $model->contact->tax_number;
        $model->phone = $model->contact->phone;
        $model->address = $model->contact->address;
        $model->website = $model->contact->website;
        $model->created_by = $model->createdby->name;
        $model->owner_name = $model->owner->name;
        $model->currency_code = $model->contact->currency_code;
        $model->reference = $model->contact->reference;
        $model->enabled = $model->contact->enabled;

        return parent::map($model);
    }

    public function fields(): array
    {
        return [
            'name',
            'email',
            'stage',
            'source',
            'tax_number',
            'phone',
            'born_at',
            'address',
            'website',
            'note',
            'created_by',
            'owner_name',
            'currency_code',
            'reference',
            'enabled'
        ];
    }
}
