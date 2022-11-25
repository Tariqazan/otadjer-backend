<?php

namespace Modules\SalesPurchaseOrders\Console\Commands;

use Modules\SalesPurchaseOrders\Database\Seeds\SampleData as SampleDataSeeder;
use Illuminate\Console\Command;

class SampleData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sales-purchase-orders-sample-data:seed  {--count=100 : total records for each item}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed for sample data';

    /**
     * Create a new command instance.
     *
     * @return void
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
        $class = $this->laravel->make(SampleDataSeeder::class);

        $seeder = $class->setContainer($this->laravel)->setCommand($this);

        $seeder->__invoke();
    }
}
