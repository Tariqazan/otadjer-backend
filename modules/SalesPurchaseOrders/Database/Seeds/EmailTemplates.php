<?php

namespace Modules\SalesPurchaseOrders\Database\Seeds;

use App\Abstracts\Model;
use App\Models\Common\EmailTemplate;
use Illuminate\Database\Seeder;
use Modules\SalesPurchaseOrders\Notifications\SalesOrder;
use Modules\SalesPurchaseOrders\Notifications\PurchaseOrder;

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
                'alias' => 'sales_order_new_customer',
                'class' => SalesOrder::class,
                'name'  => 'sales-purchase-orders::settings.sales_order.new_customer',
            ],
            [
                'alias' => 'purchase_order_new_vendor',
                'class' => PurchaseOrder::class,
                'name'  => 'sales-purchase-orders::settings.purchase_order.new_vendor',
            ],
        ];

        foreach ($templates as $template) {
            EmailTemplate::create(
                [
                    'company_id' => $company_id,
                    'alias'      => $template['alias'],
                    'class'      => $template['class'],
                    'name'       => $template['name'],
                    'subject'    => trans('sales-purchase-orders::email_templates.' . $template['alias'] . '.subject'),
                    'body'       => trans('sales-purchase-orders::email_templates.' . $template['alias'] . '.body'),
                ]
            );
        }
    }
}
