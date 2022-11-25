<?php

namespace Modules\Crm\Database\Factories;

use App\Abstracts\Factory;
use App\Models\Common\Contact;
use App\Utilities\Date;
use Modules\Crm\Models\Company as Model;

class Company extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $contact_id = Contact::enabled()->inRandomOrder()->pluck('id')->first();

        if (!$contact_id) {
            $contact_id = Contact::factory()->enabled()->create(['type' => 'crm_company'])->id;
        }

        $contact_at = $this->faker->dateTimeBetween(now()->startOfYear(), now()->endOfYear())->format('Y-m-d');

        $born_at = Date::parse($contact_at)->addDays(10)->format('Y-m-d');

        $stage  = ['customer', 'lead', 'opportunity', 'subscriber'];

        $source = [
            'advert', 'chat', 'contact_form', 'employee_referral',
            'external_referral', 'marketing_campaign', 'newsletter', 'online_store',
            'optin_form', 'partner', 'phone', 'public_relations',
            'sales_mail_alias', 'search_engine', 'seminar_internal', 'seminar_partner',
            'social_media', 'trade_show', 'web_download', 'web_research'
        ];

        return [
            'company_id'    => $this->company->id,
            'created_by'    => 1,
            'contact_id'    => $contact_id,
            'stage'         => $this->faker->randomElement($stage),
            'owner_id'      => 1,
            'mobile'        => $this->faker->phoneNumber,
            'fax_number'    => $this->faker->phoneNumber,
            'source'        => $this->faker->randomElement($source),
            'note'          => $this->faker->text(5),
        ];
    }

    /**
     * Indicate that the model is enabled.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function enabled()
    {
        return $this->state([
            'enabled' => 1,
        ]);
    }

    /**
     * Indicate that the model is disabled.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function disabled()
    {
        return $this->state([
            'enabled' => 0,
        ]);
    }
}
