<?php

namespace Modules\Crm\Imports\Contacts;

use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Modules\Crm\Imports\Contacts\Sheets\Contacts as BaseContacts;
use Modules\Crm\Imports\Contacts\Sheets\CompanyContacts;
use Modules\Crm\Imports\Contacts\Sheets\Emails;
use Modules\Crm\Imports\Contacts\Sheets\Notes;
use Modules\Crm\Imports\Contacts\Sheets\Schedules;
use Modules\Crm\Imports\Contacts\Sheets\Logs;
use Modules\Crm\Imports\Contacts\Sheets\Tasks;

class Contacts implements ShouldQueue, WithChunkReading, WithMultipleSheets
{
    use Importable;

    public function sheets(): array
    {
        return [
            'contacts' => new BaseContacts(),
            'company_contacts' => new CompanyContacts(),
            'emails' => new Emails(),
            'notes' => new Notes(),
            'schedules' => new Schedules(),
            'logs' => new Logs(),
            'tasks' => new Tasks(),
        ];
    }

    public function chunkSize(): int
    {
        return 100;
    }
}
