<?php

namespace Modules\Crm\Imports\Companies\Sheets;

use App\Abstracts\Import;
use App\Models\Common\Contact;
use App\Models\Auth\User;
use Modules\Crm\Models\Contact as BaseContact;
use Modules\Crm\Models\Company;
use Modules\Crm\Http\Requests\Imports\CompanyContact as Request;
use Modules\Crm\Models\CompanyContact as Model;

class CompanyContacts extends Import
{
    public function model(array $row)
    {
        return new Model($row);
    }

    public function map($row): array
    {
        $row = parent::map($row);

        $company_contact = Contact::where('name', $row['company_name'])->first();
        $crm_company = Company::where('contact_id', $company_contact->id)->first();

        $created_by = User::where('name', $row['created_by'])->first();

        if (empty($created_by)) {
            $created_by = user();
        }

        $contact_contact = Contact::where('name', $row['contact_name'])->first();

        if (!empty($contact_contact)) {
            $crm_contact = BaseContact::where('contact_id', $contact_contact->id)->first();
        } else {
            $contact = Contact::create([
                'company_id'    => company_id(),
                'name'          => $row['contact_name'],
                'type'          => 'crm_contact',
                'currency_code' => setting('default.currency'),
                'enabled'       => true,
            ]);

            $crm_contact = BaseContact::create([
                'company_id'    => company_id(),
                'contact_id'    => $contact->id,
                'owner'         => $created_by->id,
                'created_by'    => $created_by->id,
                'stage'         => 'customer',
                'source'        => 'chat',
            ]);
        }

        $row['created_by'] = $created_by->id;
        $row['crm_contact_id'] = $crm_contact->id;
        $row['crm_company_id'] = $crm_company->id;

        return $row;
    }

    public function rules(): array
    {
        return (new Request())->rules();
    }
}
