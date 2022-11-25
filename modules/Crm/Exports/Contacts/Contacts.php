<?php

namespace Modules\Crm\Exports\Contacts;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Modules\Crm\Exports\Contacts\Sheets\Contacts as BaseContacts;
use Modules\Crm\Exports\Contacts\Sheets\CompanyContacts;
use Modules\Crm\Exports\Contacts\Sheets\Emails;
use Modules\Crm\Exports\Contacts\Sheets\Notes;
use Modules\Crm\Exports\Contacts\Sheets\Schedules;
use Modules\Crm\Exports\Contacts\Sheets\Logs;
use Modules\Crm\Exports\Contacts\Sheets\Tasks;

class Contacts implements WithMultipleSheets
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
            new BaseContacts($this->ids),
            new CompanyContacts($this->ids),
            new Emails($this->ids),
            new Notes($this->ids),
            new Schedules($this->ids),
            new Logs($this->ids),
            new Tasks($this->ids),
        ];
    }
}
