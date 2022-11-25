<?php

namespace Modules\Inventory\Database\Factories;

use App\Abstracts\Factory;
use Modules\Inventory\Models\Variant;
use Modules\Inventory\Models\ItemGroup;
use Modules\Inventory\Jobs\Variants\CreateVariant;

class ItemGroups extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ItemGroup::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $first_variant = $this->dispatch(new CreateVariant(Variant::factory()->enabled()->raw()));

        $second_variant = $this->dispatch(new CreateVariant(Variant::factory()->enabled()->raw()));

        $variant_ids = [$first_variant->id, $second_variant->id];

        $variant_value_ids = [$first_variant->values[0]->id, $second_variant->values[0]->id];

        $variants = [
            [
                'variant_id' => $first_variant->id,
                'variant_values' => [$first_variant->values[0]->id],
            ],
            [
                'variant_id' => $second_variant->id,
                'variant_values' => [$second_variant->values[0]->id],
            ],
        ];

        $units = [
            'box'       => trans('inventory::items.unit.box'),
            'dozen'     => trans('inventory::items.unit.dozen'),
            'grams'     => trans('inventory::items.unit.grams'),
            'kilograms' => trans('inventory::items.unit.kilograms'),
            'meters'    => trans('inventory::items.unit.meters'),
            'units'     => trans('inventory::items.unit.units'),
            'pairs'     => trans('inventory::items.unit.pairs'),
            'pieces'    => trans('inventory::items.unit.pieces'),
            'tablets'   => trans('inventory::items.unit.tablets')
        ];

        $items[0] = [
            'name'              => $this->faker->text(5),
            'sku'               => $this->faker->text(5),
            'barcode'           => '',
            'variant_value_id'  => $variant_value_ids,
            'variant_id'        => $variant_ids,
            'opening_stock'     => $this->faker->randomNumber(),
            'sale_price'        => $this->faker->randomNumber(),
            'purchase_price'    => $this->faker->randomNumber(),
            'reorder_level'     => $this->faker->randomNumber(),
            'unit'              => $this->faker->randomElement($units),
            'created_from'      => 'inventory::factory',
            'warehouse_id'      => $this->faker->randomNumber(),
        ];

        return [
            'company_id'    => $this->company->id,
            'name'          => $this->faker->text(5),
            'variants'      => $variants,
            'enabled'       => $this->faker->boolean ? 1 : 0,
            'items'         => $items,
            'unit'          => $this->faker->randomElement($units),
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
