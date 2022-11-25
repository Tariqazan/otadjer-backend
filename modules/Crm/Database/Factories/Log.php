<?php

namespace Modules\Crm\Database\Factories;

use App\Abstracts\Factory;
use Modules\Crm\Traits\Main;
use Modules\Crm\Models\Contact;
use Modules\Crm\Jobs\CreateContact;
use Modules\Crm\Models\Log as Model;

class Log extends Factory
{
    use Main;

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    public function definition()
    {
        $contact = $this->dispatch(new CreateContact(Contact::factory()->enabled()->raw()));

        $log_types = $this->getLogTypes();

        return [
            'company_id' => $this->company->id,
            'created_by' => 1,
            'id' => $contact->id,
            'type' => 'contacts',
            'date' => $this->faker->date(),
            'subject' => $this->faker->name(),
            'description' => $this->faker->text(),
            'time' => $this->faker->time('H:i', 'now'),
            'log_type' => $this->faker->randomElement($log_types),
        ];
    }
}

