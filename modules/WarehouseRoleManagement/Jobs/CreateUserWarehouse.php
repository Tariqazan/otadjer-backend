<?php

namespace Modules\WarehouseRoleManagement\Jobs;

use App\Abstracts\Job;
use Modules\WarehouseRoleManagement\Models\UserWarehouse;

class CreateUserWarehouse extends Job
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
        if (is_string($this->request->users)) {
            $this->request->merge([
                'user_id'       => $this->request->users,
                'warehouse_id'  => $this->warehouse->id
            ]);

            $this->model = UserWarehouse::create($this->request->all());
        } else {
            foreach ($this->request->users as $user) {
                $this->request->merge([
                    'user_id'       => $user,
                    'warehouse_id'  => $this->warehouse->id
                ]);
    
                $this->model = UserWarehouse::create($this->request->all());
            }
        }

        return $this->model;
    }
}
