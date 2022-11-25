<?php

namespace Modules\Crm\Database\Factories;

use App\Abstracts\Factory;
use Modules\Crm\Models\DealPipeline;
use Modules\Crm\Jobs\CreateDealPipeline;
use Modules\Crm\Models\DealPipelineStage as Model;

class DealPipelineStage extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    public function definition()
    {
        $pipeline = $this->dispatch(new CreateDealPipeline(DealPipeline::factory()->raw()));;

        $life_stage = ['not_change', 'customer', 'lead', 'subscriber', 'opportunity'];

        return [
            'company_id' => company_id(),
            'created_by' => $this->user->id,
            'name' => $this->faker->name,
            'pipeline_id' => $pipeline->id,
            'life_stage' => $this->faker->randomElement($life_stage),
        ];
    }
}
