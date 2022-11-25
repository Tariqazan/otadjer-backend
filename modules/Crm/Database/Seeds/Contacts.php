<?php

namespace Modules\Crm\Database\Seeds;

use App\Abstracts\Model;
use App\Traits\Contacts as ContactTrait;
use Illuminate\Database\Seeder;

class Contacts extends Seeder
{
    use ContactTrait;

    public function run()
    {
        Model::unguard();

        $this->create();

        Model::reguard();
    }

    private function create()
    {
        $company_id = $this->command->argument('company');

        $this->addCustomerType('crm_contact');
        $this->addCustomerType('crm_company');
    }
}
