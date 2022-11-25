<?php

namespace Modules\Crm\BulkActions;

use App\Abstracts\BulkAction;
use App\Models\Common\Contact;
use App\Jobs\Common\DeleteContact;

class Companies extends BulkAction
{
    public $model = Contact::class;

    public $actions = [
        'enable' => [
            'name' => 'general.enable',
            'message' => 'bulk_actions.message.enable',
            'permission' => 'update-crm-companies',
        ],
        'disable' => [
            'name' => 'general.disable',
            'message' => 'bulk_actions.message.disable',
            'permission' => 'update-crm-companies',
        ],
        'delete' => [
            'name' => 'general.delete',
            'message' => 'bulk_actions.message.delete',
            'permission' => 'delete-crm-companies',
        ],
    ];

    public function destroy($request)
    {
        $companies = $this->getSelectedRecords($request);
        foreach ($companies as $company) {
            try {
                $this->dispatch(new DeleteContact($company));
            } catch (\Exception $e) {
                flash($e->getMessage())->error()->important();
            }
        }
    }
}
