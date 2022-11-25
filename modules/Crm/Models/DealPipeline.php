<?php

namespace Modules\Crm\Models;

use App\Abstracts\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Crm\Database\Factories\DealPipeline as PipelineFactory;

class DealPipeline extends Model
{
    use HasFactory;

    protected $table = 'crm_deal_pipelines';

    protected $fillable = [
        'company_id',
        'created_by',
        'name',
    ];

    public function createdBy()
    {
        return $this->belongsTo('App\Models\Auth\User', 'created_by', 'id');
    }

    public function stages()
    {
        return $this->hasMany('Modules\Crm\Models\DealPipelineStage', 'pipeline_id', 'id');
    }

    public function deals()
    {

        return $this->hasMany('Modules\Crm\Models\Deal', 'pipeline_id', 'id');
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return PipelineFactory::new();
    }
}
