<?php

namespace Modules\Inventory\Console;

use App\Models\Common\Company;
use App\Models\Module\Module;
use Date;
use Illuminate\Console\Command;
use App\Models\Common\Item;
use Modules\Inventory\Notifications\ItemReorderLevel as Notification;

class ItemReorderLevel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inventory:reorder_level';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send item reorder level for inventory';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Disable model cache
        config(['laravel-model-caching.enabled' => false]);

        // Get all companies
        $company_ids = Module::withoutGlobalScopes()->alias('inventory')->enabled()->pluck('company_id');

        foreach ($company_ids as $company_id) {
            $company = Company::find($company_id);

            if (null === $company) {
                continue;
            }

            $this->info('Sending inventory item reorder level for ' . $company->name . ' company.');

            // Set company
            $company->makeCurrent();

            //Don't send notification if disabled
            if (false === (bool) setting('inventory.reorder_level_notification')) {
                $this->info('Sending inventory item reorder level notification disabled by ' . $company->name . '.');

                continue;
            }

            $this->remind($company);
        }

        Company::forgetCurrent();
    }

    protected function remind($company)
    {
        $items = Item::cursor();

        foreach ($items as $item) {
            $inventory_items = $item->inventory()->get();

            if (empty($inventory_items)) {
                continue;
            }

            foreach ($inventory_items as $inventory_item) {
                if ($inventory_item->opening_stock <= $inventory_item->reorder_level) {
                    try {
                        foreach ($company->users as $user) {
                            if (!$user->can('read-notifications')) {
                                continue;
                            }

                            $reads = $user->Notifications;

                            $dublicate = false;

                            foreach ($reads as $read) {
                                $data = $read->getAttribute('data');

                                if (isset($data['inventory_item_ids']) == false){
                                    continue;
                                }

                                if ($data['inventory_item_id'] == $inventory_item->id) {
                                    $dublicate = true;
                                }
                            }

                            if ($dublicate == true) {
                                continue;
                            }

                            $user->notify(new Notification($inventory_item));
                        }
                    } catch (\Throwable $e) {
                        $this->error($e->getMessage());

                        report($e);
                    }
                }
            }
        }
    }
}
