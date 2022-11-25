<?php

namespace Modules\Crm\Database\Factories;

use App\Utilities\Date;
use App\Abstracts\Factory;
use Modules\Crm\Models\Company;
use Modules\Crm\Models\Contact;
use Modules\Crm\Models\DealPipeline;
use Modules\Crm\Models\Deal as Model;

class Deal extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    public function definition()
    {
        $crm_contact = Contact::create(Contact::factory()->enabled()->raw());
        $crm_company = Company::create(Company::factory()->enabled()->raw());

        $deal_pipeline = DealPipeline::find(1)->first();

        $contacted_at = $this->faker->dateTimeBetween(now()->startOfYear(), now()->endOfYear())->format('Y-m-d');
        $closed_at = Date::parse($contacted_at)->addDays(10)->format('Y-m-d');

        return [
            'name' => $this->faker->name,
            'company_id' => $this->company->id,
            'created_by' => $crm_contact->created_by,
            'closed_at' =>  $closed_at,
            'stage_id' => $deal_pipeline->stages()->first()->id,
            'owner_id' => $crm_contact->owner_id,
            'currency_code' => setting('default.currency'),
            'crm_contact_id' => $crm_contact->id,
            'crm_company_id' => $crm_company->id,
            'pipeline_id' => $deal_pipeline->id,
            'amount'=> $this->faker->randomFloat(2, 10, 20),
            'color' => '#6da252',
            'status' => 'open',
        ];
    }
}

