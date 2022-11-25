<?php

namespace Modules\CompositeItems\Jobs;

use App\Abstracts\Job;
use App\Traits\Modules;
use App\Models\Common\Item;
use App\Models\Common\Company;
use App\Interfaces\Job\HasOwner;
use App\Interfaces\Job\HasSource;
use App\Interfaces\Job\ShouldCreate;
use App\Jobs\Common\CreateItem as CoreCreateItem;
use Modules\Inventory\Jobs\Histories\CreateHistory;
use Modules\CompositeItems\Jobs\CreateCompositeItem;
use Modules\Inventory\Jobs\Items\CreateInventoryItem;
use Modules\CompositeItems\Jobs\CreateCompositeItemItem;

class CreateItem extends Job implements HasOwner, HasSource, ShouldCreate
{
    use Modules;

    public function handle(): Item
    {
        \DB::transaction(function () {
            $this->model = $this->dispatch(new CoreCreateItem($this->request));

            if ($this->moduleIsEnabled('inventory') && $this->request->track_inventory == true) {
                $this->createInventoryItem();
            } else {
                $composite_item_request = [
                    'company_id'    => $this->model->company_id,
                    'item_id'       => $this->model->id,
                ];
        
                $composite_item = $this->dispatch(new CreateCompositeItem($composite_item_request, $this->request->items));

                foreach ($this->request->items as $item) {
                    $composite_item_item_request = [
                        'company_id'        => $this->model->company_id,
                        'item_id'           => $item['item_id'],
                        'quantity'          => $item['quantity'],
                        'composite_item_id' => $composite_item->id,
                    ];
        
                    $this->dispatch(new CreateCompositeItemItem($composite_item_item_request));
                }
            }
        });

        return $this->model;
    }

    public function createInventoryItem()
    {
        if (isset($this->request->returnable) && $this->request->returnable == 'true') {
            $returnable = 1;
        } else {
            $returnable = 0;
        }

        if (isset($this->request->track_inventory) && $this->request->track_inventory == 'true') {
            $track_inventory = 1;
        } else {
            $track_inventory = 0;
        }

        $composite_item_request = [
            'company_id'        => $this->model->company_id,
            'item_id'           => $this->model->id,
            'sku'               => $this->request->sku,
            'unit'              => $this->request->unit ?? '',
            'returnable'        => $returnable,
            'barcode'           => $this->request->barcode ?? '',
            'track_inventory'   => $track_inventory,
        ];

        $composite_item = $this->dispatch(new CreateCompositeItem($composite_item_request, $this->request->items));

        $user = user();

        if (empty($user)) {
            $company = Company::find($this->model->company_id);
            $user = $company->users()->first();
        }

        $estimate_stock = $this->estimateStock();

        $inventory_item_request = [
            'company_id'            => $this->model->company_id,
            'item_id'               => $this->model->id,
            'opening_stock'         => $estimate_stock ?? 0,
            'opening_stock_value'   => $estimate_stock ?? 0,
            'warehouse_id'          => $this->request->items[0]['warehouse_id'],
            'default_warehouse'     => 1,
            'sku'                   => $this->request->sku,
            'unit'                  => $this->request->unit,
            'returnable'            => $this->request->returnable ?? null,
            'barcode'               => $this->request->barcode ?? '',
        ];

        $this->dispatch(new CreateInventoryItem($inventory_item_request));

        $history_request = [
            'company_id'    => $this->model->company_id,
            'user_id'       => $user->id,
            'item_id'       => $this->model->id,
            'type_id'       => $this->model->id,
            'type_type'     => get_class($this->model),
            'warehouse_id'  => $this->request->items[0]['warehouse_id'],
            'quantity'      => $estimate_stock ?? 0,
        ];

        $this->dispatch(new CreateHistory($history_request));

        // $this->setBarcode($this->model, $this->request->barcode);

        foreach ($this->request->items as $item) {

            $composite_item_item_request = [
                'company_id'        => $this->model->company_id,
                'item_id'           => $item['item_id'],
                'quantity'          => $item['quantity'],
                'composite_item_id' => $composite_item->id,
                'warehouse_id'      => $item['warehouse_id'] ?? '',
            ];

            $this->dispatch(new CreateCompositeItemItem($composite_item_item_request));
        }

        return;
    }

    public function estimateStock()
    {
        $stock = null;

        foreach ($this->request->items as $item) {
            $core_item = Item::find($item['item_id']);

            if (! $core_item) {
                continue;
            }

            $item_stock = $core_item->inventory()->where('warehouse_id', $item['warehouse_id'])->value('opening_stock');
            
            $estimate_stock = $item_stock / $item['quantity'];

            if ($stock == null || $stock > $estimate_stock) {
                $stock = $estimate_stock;
            }
        }

        return $stock;
    }
}
