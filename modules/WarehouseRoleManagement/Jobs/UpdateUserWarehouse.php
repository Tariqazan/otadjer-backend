<?php

namespace Modules\WarehouseRoleManagement\Jobs;

use App\Abstracts\Job;
use Modules\WarehouseRoleManagement\Models\UserWarehouse;

class UpdateUserWarehouse extends Job
{
    protected $warehouse;

    protected $request;

    public function __construct($warehouse, $request)
    {
        $this->warehouse = $warehouse;
        $this->request  = $this->getRequestInstance($request);
    }

    public function handle()
    {
        UserWarehouse::where('warehouse_id', $this->warehouse->id)->forceDelete();

        foreach ($this->request->users as $user) {
            $this->request->merge([
                'user_id'       => $user,
                'warehouse_id'  => $this->warehouse->id
            ]);

            $this->model = UserWarehouse::create($this->request->all());
        }

        return $this->model;
    }
}
