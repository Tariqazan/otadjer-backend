<?php

namespace Modules\Inventory\Database\Factories;

use App\Abstracts\Factory;
use Modules\Inventory\Models\Item;
use Modules\Inventory\Models\Warehouse;
use Modules\Inventory\Models\Adjustment as Model;
use Modules\Inventory\Traits\Inventory as AdjustmentNumber;

class Adjustment extends Factory
{
    use AdjustmentNumber;

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
        $source_warehouse = Warehouse::create([
            'company_id'                => $this->company->id,
            'name'                      => $this->faker->text(5),
            'email'                     => $this->faker->email,
            'enabled'                   => $this->faker->boolean ? 1 : 0,
            'default_warehouse'         => true,
            'created_from'              => 'inventory::factory',
        ]);

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

        $item_data = [
            [
                'company_id'                => $this->company->id,
                'item_id'                   => $this->faker->randomNumber(),
                'sku'                       => $this->faker->text(5),
                'unit'                      => $this->faker->randomElement($units),
                'opening_stock'             => $this->faker->randomNumber(),
                'opening_stock_value'       => $this->faker->randomNumber(),
                'reoder_level'              => $this->faker->randomNumber(),
                'warehouse_id'              => $source_warehouse->id,
                'created_from'              => 'inventory::factory',
            ],
            [
                'company_id'                => $this->company->id,
                'item_id'                   => $this->faker->randomNumber(),
                'sku'                       => $this->faker->text(5),
                'unit'                      => $this->faker->randomElement($units),
                'opening_stock'             => $this->faker->randomNumber(),
                'opening_stock_value'       => $this->faker->randomNumber(),
                'reoder_level'              => $this->faker->randomNumber(),
                'warehouse_id'              => $source_warehouse->id,
                'created_from'              => 'inventory::factory',
            ]
        ];

        foreach ($item_data as $data) {
            $item_models[] = Item::create($data);
        }

        foreach ($item_models as $item) {
            $items[] = [
                'item_quantity'             => $item->opening_stock,
                'adjusted_quantity'         => round($item->opening_stock / 2),
                'new_quantity'              => $item->opening_stock - round($item->opening_stock / 2),
                'item_id'                   => $item->item_id,
            ];
        }

        $reason = [
            'stock_on_fire' => trans('inventory::adjustments.reason.stock_on_fire'),
            'stolen_items'  => trans('inventory::adjustments.reason.stolen_items'),
            'damaged_items' => trans('inventory::adjustments.reason.damaged_items'),
            'other'         => trans('inventory::adjustments.reason.other'),
        ];

        return [
            'company_id'                => $this->company->id,
            'date'                      => $this->faker->date(),
            'adjustment_number'         => $this->getNextAdjustmentNumber(),
            'warehouse_id'              => $source_warehouse->id,
            'reason'                    => $this->faker->randomElement($reason),
            'description'               => $this->faker->text(5),
            'items'                     => $items,
            'created_from'              => 'inventory::factory',
        ];
    }
}
