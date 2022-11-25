<?php

namespace Modules\Crm\Imports\Contacts\Sheets;

use App\Abstracts\Import;
use App\Models\Auth\User;
use App\Models\Common\Contact;
use Modules\Crm\Models\Contact as BaseContact;
use Modules\Crm\Http\Requests\Task as Request;
use Modules\Crm\Models\Task as Model;

class Tasks extends Import
{
    public function model(array $row)
    {
        return new Model($row);
    }

    public function map($row): array
    {
        $row = parent::map($row);

        $contact_contact = Contact::where('name', $row['taskable_name'])->first();

        $crm_contact = BaseContact::where('contact_id', $contact_contact->id)->first();

        $user = User::where('name', $row['user_name'])->first();
        if (empty($user)) {
            $user = user();
        }

        $created_by = User::where('name', $row['created_by'])->first();
        if (empty($created_by)) {
            $created_by = user();
        }

        $row['created_by'] = $created_by->id;
        $row['taskable_id'] = $crm_contact->id;
        $row['user_id'] = $user->id;

        return $row;
    }

    public function rules(): array
    {
        return (new Request())->rules();
    }
}
