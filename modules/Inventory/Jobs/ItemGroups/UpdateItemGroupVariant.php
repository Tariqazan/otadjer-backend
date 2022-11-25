<?php

namespace Modules\Inventory\Jobs\ItemGroups;

use App\Abstracts\Job;
use App\Interfaces\Job\ShouldUpdate;
use Modules\Inventory\Models\ItemGroupVariant;
use Modules\Inventory\Models\ItemGroupVariantValue;

class UpdateItemGroupVariant extends Job implements ShouldUpdate
{
    protected $request;

    protected $item_group;

    /**
     * Create a new job instance.
     *
     * @param  $request
     * @param  $item_group
     */
    public function __construct($request, $item_group)
    {
        $this->request = $this->getRequestInstance($request);
        $this->item_group = $item_group;

        parent::__construct($item_group, $request);
    }

    /**
     * Execute the job.
     *
     * @return ItemGroupVariant
     */
    public function handle()
    {
        $item_group_variant = ItemGroupVariant::where('id', $this->item_group->id)
            ->update([
                'company_id' => $this->item_group->company_id,
                'item_group_id' => $this->request->item_group_id,
                'variant_id' => $this->request->variant_id,
            ]);

        return $item_group_variant;
    }
}
