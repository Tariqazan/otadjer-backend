<?php

namespace Modules\Crm\Imports\Contacts\Sheets;

use App\Abstracts\Import;
use App\Models\Auth\User;
use App\Models\Common\Contact;
use Modules\Crm\Http\Requests\Contact as Request;
use Modules\Crm\Models\Contact as Model;

class Contacts extends Import
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
            'type'            => 'crm_contact',
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

        $created_by = User::where('name', $row['created_by'])->first();

        if (empty($created_by)) {
            $created_by = user();
        }

        $row['contact_id'] = $contact->id;
        $row['owner_id'] = $owner->id;
        $row['created_by'] = $created_by->id;
        $row['type'] = 'crm_contact';
        $row['phone'] = (string)$row['phone'];

        return $row;
    }

    public function rules(): array
    {
        return (new Request())->rules();
    }
}
