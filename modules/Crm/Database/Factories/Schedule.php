<?php

namespace Modules\Crm\Database\Factories;

use Date;
use App\Abstracts\Factory;
use Modules\Crm\Traits\Main;
use Modules\Crm\Models\Contact;
use Modules\Crm\Jobs\CreateContact;
use Modules\Crm\Models\Schedule as Model;

class Schedule extends Factory
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

        $schedule_types = $this->getScheduleTypes();

        return [
            'company_id' => $this->company->id,
            'created_by' => 1,
            'id' => $contact->id,
            'type' => 'contacts',
            'name' => $this->faker->name,
            'schedule_type' => $this->faker->randomElement($schedule_types),
            'started_time_at' => $this->faker->time('H:i', 'now'),
            'started_at' => Date::now()->toDateString(),
            'ended_at' => Date::now()->toDateString(),
            'ended_time_at' => $this->faker->time('H:i', 'now'),
            'description' => $this->faker->text(),
            'user_id' => $this->user->id,
        ];
    }
}

