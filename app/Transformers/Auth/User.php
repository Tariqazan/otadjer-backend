<?php

namespace App\Transformers\Auth;

use App\Transformers\Common\Company;
use App\Transformers\Common\Warehouse;
use App\Models\Auth\User as Model;
use League\Fractal\TransformerAbstract;

class User extends TransformerAbstract
{
    /**
     * @var array
     */
    protected $defaultIncludes = ['companies', 'roles','warehouses'];

    /**
     * @param Model $model
     * @return array
     */
    public function transform(Model $model)
    {
        return [
            'id' => $model->id,
            'name' => $model->name,
            'email' => $model->email,
            'locale' => $model->locale,
            'created_at' => $model->created_at ? $model->created_at->toIso8601String() : '',
            'updated_at' => $model->updated_at ? $model->updated_at->toIso8601String() : '',
        ];
    }

    /**
     * @param Model $model
     * @return \League\Fractal\Resource\Collection
     */
    public function includeCompanies(Model $model)
    {
        return $this->collection($model->companies, new Company());
    }

    public function includeWarehouses(Model $model)
    {
       
        return $this->collection($model->warehouses, new Warehouse());
    }

    /**
     * @param Model $model
     * @return \League\Fractal\Resource\Collection
     */
    public function includeRoles(Model $model)
    {
        return $this->collection($model->roles, new Role());
    }
}
