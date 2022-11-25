<?php

namespace Modules\Crm\Imports\Deals\Sheets;

use App\Abstracts\Import;
use App\Models\Auth\User;
use Modules\Crm\Models\Deal;
use Modules\Crm\Models\DealAgent as Model;
use Modules\Crm\Http\Requests\DealAgent as Request;

class Agents extends Import
{
    public function model(array $row)
    {
        return new Model($row);
    }

    public function map($row): array
    {
        $row = parent::map($row);

        $deal = Deal::where('name', $row['deal_name'])->first();
        if (!empty($deal)) {
            $row['deal_id'] = $deal->id;
        }

        $created_by = User::where('name', $row['created_by'])->first();

        if (empty($created_by)) {
            $created_by = user();
        }

        $user = User::where('name', $row['user_name'])->first();

        if (empty($user)) {
            $user = user();
        }

        $row['created_by'] = $created_by->id;
        $row['user_id'] = $user->id;

        return $row;
    }

    public function rules(): array
    {
        return (new Request())->rules();
    }
}
