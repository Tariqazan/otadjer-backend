<?php

namespace Modules\CompositeItems\Jobs;

use App\Abstracts\Job;
use App\Models\Common\Item as CoreItem;
use Modules\CompositeItems\Models\Item;
use Modules\CompositeItems\Models\CompositeItem;

class DeleteCompositeItem extends Job
{
    protected $composite_item;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($composite_item)
    {
        $this->composite_item = $composite_item;
    }

    /**
     * Execute the job.
     *
     * @return CompositeItem
     */
    public function handle()
    {
        \DB::transaction(function () {
            CoreItem::where('id', $this->composite_item->item_id)->delete();

            Item::where('composite_item_id', $this->composite_item->id)->delete();

            $this->composite_item->delete();
        });

        return true;
    }
}
