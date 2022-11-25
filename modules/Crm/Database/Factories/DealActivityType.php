<?php

namespace Modules\Crm\Database\Factories;

use App\Abstracts\Factory;
use Modules\Crm\Models\DealActivityType as Model;

class DealActivityType extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    public function definition()
    {
        return [
            'company_id' => company_id(),
            'created_by' => $this->user->id,
            'name' => $this->faker->name,
        ];
    }
}

