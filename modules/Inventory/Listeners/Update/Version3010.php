<?php

namespace Modules\Inventory\Listeners\Update;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished;
use Illuminate\Support\Facades\File;

class Version3010 extends Listener
{
    const ALIAS = 'inventory';

    const VERSION = '3.0.10';

    /**
     * Handle the event.
     *
     * @param  $event
     * @return void
     */
    public function handle(UpdateFinished $event)
    {
        if ($this->skipThisUpdate($event)) {
            return;
        }

        $this->deleteOldFiles();
    }

    protected function deleteOldFiles()
    {
        $files = [
            'BulkActions/Options.php',
            'Database/Factories/Option.php',
            'Http/Controllers/Options.php',
            'Http/Request/Option.php',
            'Http/Request/ItemGroupOptionAdd.php',
            'Http/Request/ItemGroupOptionValues.php',
            'Http/Request/Imports/OptionValue.php',
            'Imports/Options.php',
            'Imports/Options/Options.php',
            'Imports/Options/Sheets/Options.php',
            'Imports/Options/Sheets/OptionValues.php',
            'Imports/Warehouses.php',
            'Imports/Manufacturers.php',
            'Imports/ItemGroups.php',
            'Exports/ItemGroups/Sheets/ItemGroupOptionValues.php',
            'Exports/ItemGroups/Sheets/ItemGroupOptions.php',
            'Exports/Options.php',
            'Exports/Options/Options.php',
            'Exports/Options/Sheets/Options.php',
            'Exports/Options/Sheets/OptionValues.php',
            'Exports/Warehouses.php',
            'Exports/Manufacturers.php',
            'Exports/ItemGroups.php',
            'Jobs/CreateHistory.php',
            'Jobs/CreateItem.php',
            'Jobs/CreateItemGroup.php',
            'Jobs/CreateItemGroupItem.php',
            'Jobs/CreateItemGroupOption.php',
            'Jobs/CreateItemGroupOptionValue.php',
            'Jobs/CreateManufacturer.php',
            'Jobs/CreateManufacturerVendor.php',
            'Jobs/CreateOption.php',
            'Jobs/CreateOptionValue.php',
            'Jobs/CreateTransferOrder.php',
            'Jobs/CreateWarehouse.php',
            'Jobs/CreateWarehouseItem.php',
            'Jobs/DeleteHistory.php',
            'Jobs/DeleteItem.php',
            'Jobs/DeleteItemGroup.php',
            'Jobs/DeleteItemGroupOption.php',
            'Jobs/DeleteItemGroupOptionItem.php',
            'Jobs/DeleteItemGroupOptionValue.php',
            'Jobs/DeleteManufacturer.php',
            'Jobs/DeleteOption.php',
            'Jobs/DeleteTransferOrder.php',
            'Jobs/DeleteWarehouse.php',
            'Jobs/DeleteWarehouseItem.php',
            'Jobs/UpdateHistory.php',
            'Jobs/UpdateItem.php',
            'Jobs/UpdateItemGroup.php',
            'Jobs/UpdateItemGroupItem.php',
            'Jobs/UpdateItemGroupOption.php',
            'Jobs/UpdateOption.php',
            'Jobs/UpdateOptionValue.php',
            'Jobs/UpdateManufacturerVendor.php',
            'Jobs/UpdateTransferOrder.php',
            'Jobs/UpdateWarehouse.php',
            'Jobs/UpdateWarehouseItem.php',
            'Models/Option.php',
            'Models/OptionValue.php',
            'Resources/assets/js/options.min.js',
            'Resources/assets/options.xlsx',
            'Resources/views/options',
        ];

        foreach ($files as $file) {
            File::delete(base_path('modules/Inventory/' . $file));
        }
    }
}
