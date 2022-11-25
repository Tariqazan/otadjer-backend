<?php

namespace Modules\Crm\Imports\Contacts\Sheets;

use App\Abstracts\Import;
use App\Models\Auth\User;
use App\Models\Common\Contact;
use Modules\Crm\Models\Contact as BaseContact;
use Modules\Crm\Http\Requests\Log as Request;
use Modules\Crm\Models\Log as Model;

class Logs extends Import
{
    public function model(array $row)
    {
        return new Model($row);
    }

    public function map($row): array
    {
        $row = parent::map($row);

        $contact_contact = Contact::where('name', $row['logable_name'])->first();

        $crm_contact = BaseContact::where('contact_id', $contact_contact->id)->first();

        $created_by = User::where('name', $row['created_by'])->first();

        if (empty($created_by)) {
            $created_by = user();
        }
        $row['created_by'] = $created_by->id;
        $row['logable_id'] = $crm_contact->id;
        $row['log_type'] = $row['type'];

        return $row;
    }

    public function rules(): array
    {
        return (new Request())->rules();
    }
}
