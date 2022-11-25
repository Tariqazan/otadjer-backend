<?php

namespace Modules\Crm\Imports\Companies;

use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Modules\Crm\Imports\Companies\Sheets\Companies as BaseCompanies;
use Modules\Crm\Imports\Companies\Sheets\CompanyContacts;
use Modules\Crm\Imports\Companies\Sheets\Emails;
use Modules\Crm\Imports\Companies\Sheets\Notes;
use Modules\Crm\Imports\Companies\Sheets\Schedules;
use Modules\Crm\Imports\Companies\Sheets\Logs;
use Modules\Crm\Imports\Companies\Sheets\Tasks;

class Companies implements ShouldQueue, WithChunkReading, WithMultipleSheets
{
    use Importable;

    public function sheets(): array
    {
        return [
            'companies' => new BaseCompanies(),
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
