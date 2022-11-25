<?php

namespace Modules\Crm\Imports\Deals\Sheets;

use App\Abstracts\Import;
use App\Models\Auth\User;
use Modules\Crm\Models\Deal;
use Modules\Crm\Http\Requests\Email as Request;
use Modules\Crm\Models\Email as Model;

class Emails extends Import
{
    public function model(array $row)
    {
        return new Model($row);
    }

    public function map($row): array
    {
        $row = parent::map($row);

        $deal = Deal::where('name', $row['emailable_name'])->first();
        if (!empty($deal)) {
            $row['emailable_id'] = $deal->id;
        }

        $created_by = User::where('name', $row['created_by'])->first();
        if (empty($created_by)) {
            $created_by = user();
        }

        $row['created_by'] = $created_by->id;

        return $row;
    }

    public function rules(): array
    {
        return (new Request())->rules();
    }
}
