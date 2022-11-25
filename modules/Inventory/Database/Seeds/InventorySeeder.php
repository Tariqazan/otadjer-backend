<?php

namespace Modules\Inventory\Database\Seeds;

use App\Traits\Jobs;
use App\Abstracts\Model;
use Illuminate\Database\Seeder;
use Modules\Inventory\Models\Item;
use Modules\Inventory\Models\Variant;
use Modules\Inventory\Jobs\Items\CreateItem;
use Modules\Inventory\Models\ItemGroup;
use Modules\Inventory\Models\Warehouse;
use Modules\Inventory\Jobs\Variants\CreateVariant;
use Modules\Inventory\Jobs\ItemGroups\CreateItemGroup;
use Modules\Inventory\Models\TransferOrder;
use Modules\Inventory\Jobs\TransferOrders\CreateTransferOrder;

class InventorySeeder extends Seeder
{
    use Jobs;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::reguard();

        $company_id = (int) $this->command->arguments()['company'];

        $count = (int) $this->command->option('count');
        $small_count = ($count <= 10) ? $count : 10;

        $this->command->info('Creating inventory sample data...');

        $bar = $this->command->getOutput()->createProgressBar(7);
        $bar->setFormat('verbose');

        $bar->start();

        $items = Item::factory()->count($small_count)->enabled()->raw(['company_id' => $company_id]);
        foreach ($items as $item) {
            $this->dispatch(new CreateItem($item));
        }
        $bar->advance();

        $item_groups = ItemGroup::factory()->count($small_count)->enabled()->raw(['company_id' => $company_id]);
        foreach ($item_groups as $item_group) {
            $this->dispatch(new CreateItemGroup($item_group));
        }
        $bar->advance();

        // $transfer_orders = TransferOrder::factory()->count($small_count)->enabled()->raw(['company_id' => $company_id]);
        // foreach ($transfer_orders as $transfer_order) {
        //     $this->dispatch(new CreateTransferOrder($transfer_order));
        // }
        // $bar->advance();

        $variants = Variant::factory()->count($small_count)->enabled()->raw(['company_id' => $company_id]);
        foreach ($variants as $variant) {
            $this->dispatch(new CreateVariant($variant));
        }
        $bar->advance();

        Warehouse::factory()->count($small_count)->enabled()->create(['company_id' => $company_id]);
        $bar->advance();

        $bar->finish();

        $this->command->info('');
        $this->command->info('Inventory sample data created.');

        Model::unguard();
    }
}
