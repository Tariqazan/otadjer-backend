<?php

namespace Modules\Estimates\BulkActions;

use App\Abstracts\BulkAction;
use App\Events\Document\DocumentCreated;
use App\Events\Document\DocumentSent;
use App\Jobs\Document\DeleteDocument;
use Modules\Estimates\Events\Approved;
use Modules\Estimates\Events\Refused;
use Modules\Estimates\Exports\Estimates as Export;
use Modules\Estimates\Models\Estimate;

class Estimates extends BulkAction
{
    public $model = Estimate::class;

    public $actions = [
        'sent'     => [
            'name'       => 'estimates::general.mark_sent',
            'message'    => 'estimates::bulk_actions.sent',
            'permission' => 'update-estimates-estimates',
        ],
        'approved' => [
            'name'       => 'estimates::general.mark_approved',
            'message'    => 'estimates::bulk_actions.approved',
            'permission' => 'update-estimates-estimates',
        ],
        'refused'  => [
            'name'       => 'estimates::general.mark_refused',
            'message'    => 'estimates::bulk_actions.refused',
            'permission' => 'update-estimates-estimates',
        ],
        'delete'   => [
            'name'       => 'general.delete',
            'message'    => 'bulk_actions.message.delete',
            'permission' => 'delete-estimates-estimates',
        ],
        'export'   => [
            'name'    => 'general.export',
            'message' => 'bulk_actions.message.export',
        ],
    ];

    public function sent($request)
    {
        $estimates = $this->getSelectedRecords($request);

        foreach ($estimates as $estimate) {
            event(new DocumentSent($estimate));
        }
    }

    public function approved($request)
    {
        $estimates = $this->getSelectedRecords($request);

        foreach ($estimates as $estimate) {
            event(new Approved($estimate));
        }
    }

    public function refused($request)
    {
        $estimates = $this->getSelectedRecords($request);

        foreach ($estimates as $estimate) {
            event(new Refused($estimate));
        }
    }

    public function duplicate($request)
    {
        $estimates = $this->getSelectedRecords($request);

        foreach ($estimates as $estimate) {
            $clone = $estimate->duplicate();

            event(new DocumentCreated($clone, $request));
        }
    }

    public function delete($request)
    {
        $this->destroy($request);
    }

    public function destroy($request)
    {
        $estimates = $this->getSelectedRecords($request);

        foreach ($estimates as $estimate) {
            try {
                $this->dispatch(new DeleteDocument($estimate));
            } catch (\Exception $e) {
                flash($e->getMessage())->error();
            }
        }
    }

    public function export($request)
    {
        $selected = $this->getSelectedInput($request);

        return \Excel::download(new Export($selected), \Str::filename(trans_choice('estimates::general.estimates', 2)) . '.xlsx');
    }
}
