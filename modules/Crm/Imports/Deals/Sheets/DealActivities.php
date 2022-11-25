<?php

namespace Modules\Crm\Imports\Deals\Sheets;

use App\Abstracts\Import;
use Modules\Crm\Models\Deal;
use App\Models\Auth\User;
use Modules\Crm\Models\DealActivity as Model;
use Modules\Crm\Models\DealActivityType;
use Modules\Crm\Http\Requests\DealActivity as Request;

class DealActivities extends Import
{
    public function model(array $row)
    {
        return new Model($row);
    }

    public function map($row): array
    {
        $row = parent::map($row);

        $activity_type = DealActivityType::firstOrCreate([
            'name'              => $row['activity_type'],
        ], [
            'company_id'      => company_id(),
            'created_by'      => user()->id,
            'rank'            => 0,
        ]);

        $deal = Deal::where('name', $row['deal_name'])->first();
        if (!empty($deal)) {
            $row['deal_id'] = $deal->id;
        }

        $assigned = User::where('name', $row['assigned'])->first();

        if (empty($assigned)) {
            $assigned = user();
        }

        $created_by = User::where('name', $row['created_by'])->first();

        if (empty($created_by)) {
            $created_by = user();
        }

        $row['activity_type'] = $activity_type->id;
        $row['created_by'] = $created_by->id;
        $row['assigned'] = $assigned->id;

        return $row;
    }

    public function rules(): array
    {
        return (new Request())->rules();
    }
}
