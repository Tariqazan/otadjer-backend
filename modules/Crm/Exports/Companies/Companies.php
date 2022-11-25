<?php

namespace Modules\Crm\Exports\Companies;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Modules\Crm\Exports\Companies\Sheets\Companies as BaseCompanies;
use Modules\Crm\Exports\Companies\Sheets\CompanyContacts;
use Modules\Crm\Exports\Companies\Sheets\Emails;
use Modules\Crm\Exports\Companies\Sheets\Notes;
use Modules\Crm\Exports\Companies\Sheets\Schedules;
use Modules\Crm\Exports\Companies\Sheets\Logs;
use Modules\Crm\Exports\Companies\Sheets\Tasks;

class Companies implements WithMultipleSheets
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
            new BaseCompanies($this->ids),
            new CompanyContacts($this->ids),
            new Emails($this->ids),
            new Notes($this->ids),
            new Schedules($this->ids),
            new Logs($this->ids),
            new Tasks($this->ids),
        ];
    }
}
