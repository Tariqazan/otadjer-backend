<?php

namespace Modules\Crm\Exports\Activities;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Modules\Crm\Exports\Activities\Sheets\DealActivity;
use Modules\Crm\Exports\Activities\Sheets\Email;
use Modules\Crm\Exports\Activities\Sheets\Log;
use Modules\Crm\Exports\Activities\Sheets\Note;
use Modules\Crm\Exports\Activities\Sheets\Schedule;
use Modules\Crm\Exports\Activities\Sheets\Task;

class Activities implements WithMultipleSheets
{
    use Exportable;

    public $ids;

    public function __construct($ids = null)
    {
        $this->ids = $ids;
    }

    public function sheets(): array
    {
        return [
            new DealActivity($this->ids),
            new Email($this->ids),
            new Log($this->ids),
            new Note($this->ids),
            new Schedule($this->ids),
            new Task($this->ids),
        ];
    }
}
