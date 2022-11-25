<?php

namespace Modules\Estimates\Console\Commands;

use App\Models\Common\Company;
use App\Models\Module\Module;
use Date;
use Illuminate\Console\Command;
use Modules\Estimates\Models\Estimate;
use Modules\Estimates\Notifications\Estimate as Notification;

class EstimateReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'estimates:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminders for estimates';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Disable model cache
        config(['laravel-model-caching.enabled' => false]);

        // Get all companies
        $company_ids = Module::allCompanies()->alias('estimates')->enabled()->pluck('company_id');

        foreach ($company_ids as $company_id) {
            $company = Company::find($company_id);

            if (null === $company) {
                continue;
            }

            $this->info('Sending estimate reminders for ' . $company->name . ' company.');

            // Set company
            $company->makeCurrent();

            // Don't send reminders if disabled
            if (false === (bool) setting('estimates.schedule.send_estimate_reminder')) {
                $this->info('estimate reminders disabled by ' . $company->name . '.');

                continue;
            }

            $days = explode(',', setting('estimates.schedule.estimate_days'));

            foreach ($days as $day) {
                $day = (int)trim($day);

                $this->remind($day, $company);
            }
        }

        Company::forgetCurrent();
    }

    protected function remind($day, $company)
    {
        // Get due date
        $date = Date::today()->addDays($day)->toDateString();

        // Get upcoming estimates
        $estimates = Estimate::with('contact')->estimate()->accrued()->notInvoiced()->expire($date)->cursor();

        foreach ($estimates as $estimate) {
            // Notify the customer
            if ($estimate->contact && !empty($estimate->contact_email)) {
                $estimate->contact->notify(new Notification($estimate, 'estimate_remind_customer'));
            }

            // Notify all users assigned to this company
            foreach ($company->users as $user) {
                if (!$user->can('read-notifications')) {
                    continue;
                }

                $user->notify(new Notification($estimate, 'estimate_remind_admin'));
            }
        }
    }
}
