<?php

namespace Modules\Crm\Imports\Activities\Sheets;

use App\Abstracts\Import;
use Modules\Crm\Http\Requests\Imports\Schedule as Request;
use Modules\Crm\Models\Schedule as Model;

class Schedule extends Import
{
    public function model(array $row)
    {
        return new Model($row);
    }

    public function map($row): array
    {
        $row = parent::map($row);

        return $row;
    }

    public function rules(): array
    {
        return (new Request())->rules();
    }
}
