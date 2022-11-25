<?php

namespace Modules\Crm\Imports\Activities;

use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Modules\Crm\Imports\Activities\Sheets\DealActivity;
use Modules\Crm\Imports\Activities\Sheets\Email;
use Modules\Crm\Imports\Activities\Sheets\Log;
use Modules\Crm\Imports\Activities\Sheets\Note;
use Modules\Crm\Imports\Activities\Sheets\Schedule;
use Modules\Crm\Imports\Activities\Sheets\Task;

class Activities implements ShouldQueue, WithChunkReading, WithMultipleSheets
{
    use Importable;

    public function sheets(): array
    {
        return [
            'deal_activity' => new DealActivity(),
            'email' => new Email(),
            'log' => new Log(),
            'note' => new Note(),
            'schedule' => new Schedule(),
            'task' => new Task(),
        ];
    }

    public function chunkSize(): int
    {
        return 100;
    }
}
