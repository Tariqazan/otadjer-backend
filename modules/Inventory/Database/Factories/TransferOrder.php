<?php

namespace Modules\Inventory\Database\Factories;

use App\Abstracts\Factory;
use Modules\Inventory\Models\Item;
use Modules\Inventory\Models\Warehouse;
use Modules\Inventory\Models\TransferOrder as Model;
use Modules\Inventory\Traits\Inventory as TOrder;

class TransferOrder extends Factory
{
    use TOrder;

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

        $destination_warehouse = Warehouse::create([
            'company_id'                => $this->company->id,
            'name'                      => $this->faker->text(5),
            'email'                     => $this->faker->email,
            'enabled'                   => $this->faker->boolean ? 1 : 0,
            'default_warehouse'         => false,
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
                'transfer_quantity'         => round($item->opening_stock / 2),
                'item_id'                   => $item->item_id,
                'created_from'              => 'inventory::factory',
            ];
        }

        return [
            'company_id'                => $this->company->id,
            'transfer_order'            => $this->faker->text(5),
            'transfer_order_number'     => $this->getNextTransferOrderNumber(),
            'reason'                    => $this->faker->text(5),
            'items'                     => $items,
            'date'                      => $this->faker->date(),
            'source_warehouse_id'       => $source_warehouse->id,
            'destination_warehouse_id'  => $destination_warehouse->id,
            'created_from'              => 'inventory::factory',
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
