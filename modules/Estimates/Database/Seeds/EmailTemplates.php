<?php

namespace Modules\Estimates\Database\Seeds;

use App\Abstracts\Model;
use App\Models\Common\EmailTemplate;
use Illuminate\Database\Seeder;
use Modules\Estimates\Notifications\Estimate;

class EmailTemplates extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->create();

        Model::reguard();
    }

    private function create()
    {
        $company_id = $this->command->argument('company');

        $templates = [
            [
                'alias' => 'estimate_new_customer',
                'class' => Estimate::class,
                'name'  => 'estimates::settings.estimate.new_customer',
            ],
            [
                'alias' => 'estimate_remind_customer',
                'class' => Estimate::class,
                'name'  => 'estimates::settings.estimate.remind_customer',
            ],
            [
                'alias' => 'estimate_remind_admin',
                'class' => Estimate::class,
                'name'  => 'estimates::settings.estimate.remind_admin',
            ],
            [
                'alias' => 'estimate_approved_admin',
                'class' => Estimate::class,
                'name'  => 'estimates::settings.estimate.approved_admin',
            ],
            [
                'alias' => 'estimate_refused_admin',
                'class' => Estimate::class,
                'name'  => 'estimates::settings.estimate.refused_admin',
            ]
        ];

        foreach ($templates as $template) {
            EmailTemplate::create(
                [
                    'company_id' => $company_id,
                    'alias'      => $template['alias'],
                    'class'      => $template['class'],
                    'name'       => $template['name'],
                    'subject'    => trans('estimates::email_templates.' . $template['alias'] . '.subject'),
                    'body'       => trans('estimates::email_templates.' . $template['alias'] . '.body'),
                ]
            );
        }
    }
}
