<?php

namespace Modules\Inventory\Jobs\Items;

use App\Abstracts\Job;
use App\Models\Common\Item;
use App\Models\Common\Company;
use App\Interfaces\Job\HasOwner;
use App\Interfaces\Job\HasSource;
use App\Interfaces\Job\ShouldCreate;
use App\Jobs\Common\CreateItem as CoreCreateItem;
use Modules\Inventory\Traits\Barcode;
use Modules\Inventory\Jobs\Histories\CreateHistory;
use Modules\Inventory\Jobs\Items\CreateInventoryItem;

class CreateItem extends Job implements HasOwner, HasSource, ShouldCreate
{
    use Barcode;

    public function handle(): Item
    {
        \DB::transaction(function () {
            if (!strstr($this->request->created_from, 'inventory')) {
                $this->request->merge(['created_from' => source_name('inventory')]);
            };

            $this->model = $this->dispatch(new CoreCreateItem($this->request));

            if ($this->request->has('track_inventory')) {
                if (empty($this->request->get('track_inventory')) || $this->request->get('track_inventory') == 'false') {
                    return;
                }
            } else {
                if (setting('inventory.track_inventory') == false) {
                    return;
                }
            }

            $user = user();

            if (empty($user)) {
                $company = Company::find($this->model->company_id);
                $user = $company->users()->first();
            }

            foreach ($this->request->items as $item) {
                if ($item['default_warehouse'] == 'true') {
                    $item['default_warehouse'] = 1;
                } else if ($item['default_warehouse'] == 'false') {
                    $item['default_warehouse'] = 0;
                }

                $inventory_item_request = [
                    'company_id' => $this->model->company_id,
                    'item_id' => $this->model->id,
                    'opening_stock' => $item['opening_stock'],
                    'opening_stock_value' => $item['opening_stock'],
                    'reorder_level' => $item['reorder_level'],
                    'warehouse_id' => $item['warehouse_id'],
                    'default_warehouse' => $item['default_warehouse'],
                    'sku' => $this->request->sku,
                    'unit' => $this->request->unit,
                    'returnable' => $this->request->returnable,
                    'barcode' => $this->request->barcode,
                ];

                $this->dispatch(new CreateInventoryItem($inventory_item_request));

                $history_request =[
                    'company_id' => company_id(),
                    'user_id' => $user->id,
                    'item_id' => $this->model->id,
                    'type_id' => $this->model->id,
                    'type_type' => get_class($this->model),
                    'warehouse_id' => $item['warehouse_id'],
                    'quantity' => $item['opening_stock'],
                ];

                $this->dispatch(new CreateHistory($history_request));
            }

            $this->setBarcode($this->model, $this->request->barcode);
        });

        return $this->model;
    }
}
