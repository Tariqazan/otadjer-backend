<?php

namespace Modules\Crm\Imports\Companies\Sheets;

use App\Abstracts\Import;
use App\Models\Auth\User;
use App\Models\Common\Contact;
use Modules\Crm\Http\Requests\Company as Request;
use Modules\Crm\Models\Company as Model;

class Companies extends Import
{
    public function model(array $row)
    {
        return new Model($row);
    }

    public function map($row): array
    {
        $row = parent::map($row);

        $contact = Contact::firstOrCreate([
            'name'              => $row['name'],
        ], [
            'company_id'      => company_id(),
            'type'            => 'crm_company',
            'email'           => $row['email'],
            'tax_number'      => $row['tax_number'],
            'phone'           => $row['phone'],
            'address'         => $row['address'],
            'website'         => $row['website'],
            'currency_code'   => $row['currency_code'],
            'reference'       => $row['reference'],
            'enabled'         => $row['enabled'],
        ]);

        $owner = User::where('name', $row['owner_name'])->first();

        if (empty($owner)) {
            $owner = user();
        }

        $row['contact_id'] = $contact->id;
        $row['owner_id'] = $owner->id;
        $row['created_by'] = $owner->id;
        $row['phone'] = (string)$row['phone'];
        $row['type'] = 'crm_company';

        return $row;
    }

    public function rules(): array
    {
        return (new Request())->rules();
    }
}
