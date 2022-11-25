<?php

namespace Modules\Inventory\Imports\Warehouses;

use App\Abstracts\Import;
use Modules\Inventory\Http\Requests\Warehouse as Request;
use Modules\Inventory\Models\Warehouse as Model;

class Warehouses extends Import
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
