<?php

namespace Modules\Crm\Imports\Deals\Sheets;

use App\Abstracts\Import;
use App\Models\Common\Contact;
use App\Models\Auth\User;
use Modules\Crm\Http\Requests\Deal as Request;
use Modules\Crm\Models\Contact as CrmContact;
use Modules\Crm\Models\Company;
use Modules\Crm\Models\Deal as Model;
use Modules\Crm\Models\DealPipeline;
use Modules\Crm\Models\DealPipelineStage;

class Deals extends Import
{
    public function model(array $row)
    {
        return new Model($row);
    }

    public function map($row): array
    {
        $row = parent::map($row);

        $pipeline = DealPipeline::firstOrCreate([
            'name'              => $row['pipeline'],
        ], [
            'company_id'      => company_id(),
            'created_by'      => user()->id,
        ]);

        $pipeline_stage = DealPipelineStage::firstOrCreate([
            'name'              => $row['stage'],
        ], [
            'company_id'        => company_id(),
            'pipeline_id'       => $pipeline->id,
            'life_stage'        => 'not_change',
            'created_by'        => user()->id,
        ]);

        $contact = Contact::where('name', $row['contact_name'])->first();
        $crm_contact = CrmContact::where('contact_id', $contact->id)->first();
        $row['crm_contact_id'] = $crm_contact->id;

        $contact = Contact::where('name', $row['company_name'])->first();
        $crm_company = Company::where('contact_id', $contact->id)->first();
        $row['crm_company_id'] = $crm_company->id;

        $owner = User::where('name', $row['owner'])->first();

        if (empty($owner)) {
            $owner = user();
        }

        $created_by = User::where('name', $row['created_by'])->first();

        if (empty($created_by)) {
            $created_by = user();
        }
        $amount = str_replace(',', '',  $row['amount']);

        $row['amount'] = $amount;
        $row['owner_id'] = $owner->id;
        $row['created_by'] = $created_by->id;
        $row['pipeline_id'] = $pipeline->id;
        $row['stage_id'] = $pipeline_stage->id;

        return $row;
    }

    public function rules(): array
    {
        return (new Request())->rules();
    }
}
