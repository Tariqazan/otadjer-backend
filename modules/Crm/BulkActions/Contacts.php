<?php

namespace Modules\Crm\BulkActions;

use App\Abstracts\BulkAction;
use App\Models\Common\Contact;
use App\Jobs\Common\DeleteContact;
class Contacts extends BulkAction
{
    public $model = Contact::class;

    public $actions = [
        'enable' => [
            'name' => 'general.enable',
            'message' => 'bulk_actions.message.enable',
            'permission' => 'update-crm-contacts',
        ],
        'disable' => [
            'name' => 'general.disable',
            'message' => 'bulk_actions.message.disable',
            'permission' => 'update-crm-contacts',
        ],
        'delete' => [
            'name' => 'general.delete',
            'message' => 'bulk_actions.message.delete',
            'permission' => 'delete-crm-contacts',
        ],
    ];

    public function destroy($request)
    {
        $contacts = $this->getSelectedRecords($request);
        foreach ($contacts as $contact) {
            try {
                $this->dispatch(new DeleteContact($contact));
            } catch (\Exception $e) {
                flash($e->getMessage())->error()->important();
            }
        }
    }
}
