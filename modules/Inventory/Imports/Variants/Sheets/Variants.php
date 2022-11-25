<?php

namespace Modules\Inventory\Imports\Variants\Sheets;

use App\Abstracts\Import;
use Modules\Inventory\Http\Requests\Variant as Request;

use Modules\Inventory\Models\Variant as Model;

class Variants extends Import
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
