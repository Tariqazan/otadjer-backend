<?php

namespace Modules\Estimates\Console\Commands;

use App\Models\Common\Company;
use App\Models\Module\Module;
use Carbon\Carbon;
use Date;
use Illuminate\Console\Command;
use Modules\Estimates\Models\Estimate;

class EstimateExpiry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'estimates:check_estimate_expiry';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check expire date for estimates';

    /**
     * The current day.
     *
     * @var Carbon
     */
    protected $today;

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get all companies
        $company_ids = Module::allCompanies()->alias('estimates')->enabled()->pluck('company_id');

        foreach ($company_ids as $company_id) {
            $company = Company::with('estimates')->find($company_id);

            if (null === $company) {
                continue;
            }

            $this->info('Checking estimate expiry date for ' . $company->name . ' company.');

            // Set company
            $company->makeCurrent();

            $this->today = Date::today();

            foreach ($company->estimates()->notInvoiced()->get() as $estimate) {
                $this->checkExpiry($estimate);
            }
        }

        Company::forgetCurrent();
    }

    /**
     * @param Estimate $estimate
     */
    protected function checkExpiry($estimate)
    {
        $expire_at = Date::parse(optional($estimate->extra_param->expire_at)->format('Y-m-d'));

        if ($this->today->lte($expire_at)) {
            return;
        }

        $estimate->status = 'expired';
        $estimate->save();
    }
}
