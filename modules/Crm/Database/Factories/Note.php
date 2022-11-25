<?php

namespace Modules\Crm\Database\Factories;

use App\Abstracts\Factory;
use Modules\Crm\Models\Contact;
use Modules\Crm\Jobs\CreateContact;
use Modules\Crm\Models\Note as Model;

class Note extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    public function definition()
    {
        $contact = $this->dispatch(new CreateContact(Contact::factory()->enabled()->raw()));

        return [
            'company_id' => $this->company->id,
            'created_by' => 1,
            'id' => $contact->id,
            'type' => 'contacts',
            'message' => $this->faker->text(),
        ];
    }
}

