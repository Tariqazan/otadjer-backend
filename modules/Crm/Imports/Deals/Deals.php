<?php

namespace Modules\Crm\Imports\Deals;

use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Modules\Crm\Imports\Deals\Sheets\DealActivities;
use Modules\Crm\Imports\Deals\Sheets\Agents;
use Modules\Crm\Imports\Deals\Sheets\Contacts;
use Modules\Crm\Imports\Deals\Sheets\Companies;
use Modules\Crm\Imports\Deals\Sheets\Competitors;
use Modules\Crm\Imports\Deals\Sheets\Deals as BaseDeals;
use Modules\Crm\Imports\Deals\Sheets\Emails;
use Modules\Crm\Imports\Deals\Sheets\Notes;

class Deals implements ShouldQueue, WithChunkReading, WithMultipleSheets
{
    use Importable;

    public function sheets(): array
    {
        return [
            'contacts' => new Contacts(),
            'companies' => new Companies(),
            'deals' => new BaseDeals(),
            'notes' => new Notes(),
            'emails' => new Emails(),
            'competitors' => new Competitors(),
            'agents' => new Agents(),
            'deal_activities' => new DealActivities(),
        ];
    }

    public function chunkSize(): int
    {
        return 100;
    }
}
