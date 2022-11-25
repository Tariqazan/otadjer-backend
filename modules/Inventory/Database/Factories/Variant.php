<?php

namespace Modules\Inventory\Database\Factories;

use App\Abstracts\Factory;
use Modules\Inventory\Models\Variant as Model;

class Variant extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $items[0] = [
            'name' => $this->faker->text(5)
        ];

        return [
            'company_id'    => $this->company->id,
            'name'          => $this->faker->text(5),
            'enabled'       => $this->faker->boolean ? 1 : 0,
            'items'         => $items,
            'created_from'  => 'inventory::factory',
        ];
    }

    /**
     * Indicate that the model is enabled.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function enabled()
    {
        return $this->state([
            'enabled' => 1,
        ]);
    }

    /**
     * Indicate that the model is disabled.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function disabled()
    {
        return $this->state([
            'enabled' => 0,
        ]);
    }
}
