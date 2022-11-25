<?php

namespace Modules\SalesPurchaseOrders\Notifications;

use App\Abstracts\Notification;
use App\Models\Common\EmailTemplate;
use App\Traits\Documents;
use Illuminate\Notifications\Messages\MailMessage;
use Modules\SalesPurchaseOrders\Models\SalesOrder\Model;

class SalesOrder extends Notification
{
    use Documents;

    /**
     * Should attach pdf or not.
     *
     * @var bool
     */
    private $attach_pdf;

    public $salesOrder;

    /**
     * The email template.
     *
     * @var string
     */
    public $template;

    public function __construct(Model $salesOrder = null, string $template_alias = null, bool $attach_pdf = false)
    {
        parent::__construct();

        $this->salesOrder = $salesOrder;
        $this->template   = EmailTemplate::alias($template_alias)->first();
        $this->attach_pdf = $attach_pdf;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        $message = $this->initMessage();

        // Attach the PDF file
        if ($this->attach_pdf) {
            $this->salesOrder->template_path = 'sales-purchase-orders::sales_orders.print_'
                                               . setting('sales-purchase-orders.sales_order.template');
            $message->attach($this->storeDocumentPdfAndGetPath($this->salesOrder), ['mime' => 'application/pdf']);
        }

        return $message;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'sales_order_id' => $this->salesOrder->id,
            'amount'         => $this->salesOrder->amount,
        ];
    }

    public function getTags()
    {
        return [
            '{sales_order_number}',
            '{sales_order_total}',
            '{sales_order_issued_at}',
            '{sales_order_expected_shipment_date}',
            '{customer_name}',
            '{company_name}',
            '{company_email}',
            '{company_tax_number}',
            '{company_phone}',
            '{company_address}',
        ];
    }

    public function getTagsReplacement()
    {
        return [
            $this->salesOrder->document_number,
            money($this->salesOrder->amount, $this->salesOrder->currency_code, true),
            company_date($this->salesOrder->issued_at),
            company_date($this->salesOrder->extra_param->expected_shipment_date),
            $this->salesOrder->contact_name,
            $this->salesOrder->company->name,
            $this->salesOrder->company->email,
            $this->salesOrder->company->tax_number,
            $this->salesOrder->company->phone,
            nl2br(trim($this->salesOrder->company->address)),
        ];
    }
}
