<?php

namespace Modules\Crm\Exports\Deals;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Modules\Crm\Exports\Deals\Sheets\DealActivities;
use Modules\Crm\Exports\Deals\Sheets\Agents;
use Modules\Crm\Exports\Deals\Sheets\Contacts;
use Modules\Crm\Exports\Deals\Sheets\Companies;
use Modules\Crm\Exports\Deals\Sheets\Competitors;
use Modules\Crm\Exports\Deals\Sheets\Deals as BaseDeals;
use Modules\Crm\Exports\Deals\Sheets\Emails;
use Modules\Crm\Exports\Deals\Sheets\Notes;

class Deals implements WithMultipleSheets
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
            new BaseDeals($this->ids),
            new Contacts($this->ids),
            new Companies($this->ids),
            new DealActivities($this->ids),
            new Notes($this->ids),
            new Emails($this->ids),
            new Competitors($this->ids),
            new Agents($this->ids),
        ];
    }
}
