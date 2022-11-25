<?php

namespace Modules\Inventory\Jobs\Items;

use App\Abstracts\Job;
use App\Interfaces\Job\HasOwner;
use App\Interfaces\Job\HasSource;
use App\Interfaces\Job\ShouldCreate;
use Modules\Inventory\Models\DocumentItem;

class CreateInventoryDocumentItem extends Job implements HasOwner, HasSource, ShouldCreate
{
    public function handle(): DocumentItem
    {
        $this->model = DocumentItem::create($this->request->all());

        return $this->model;
    }
}
