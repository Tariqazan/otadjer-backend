<?php

namespace Modules\Estimates\Notifications;

use App\Abstracts\Notification;
use App\Events\Document\DocumentPrinting;
use App\Models\Common\EmailTemplate;
use App\Traits\Documents;
use Illuminate\Support\Facades\URL;
use Modules\Estimates\Models\Estimate as Model;

class Estimate extends Notification
{
    use Documents;

    /**
     * Should attach pdf or not.
     *
     * @var bool
     */
    private $attach_pdf;

    /**
     * The estimate model.
     *
     * @var Model
     */
    public $estimate;

    /**
     * The email template.
     *
     * @var string
     */
    public $template;

    public function __construct(Model $estimate = null, string $template_alias = null, bool $attach_pdf = false)
    {
        parent::__construct();

        $this->estimate   = $estimate;
        $this->template   = EmailTemplate::alias($template_alias)->first();
        $this->attach_pdf = $attach_pdf;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $message = $this->initMessage();

        // Attach the PDF file
        if ($this->attach_pdf) {
            $this->estimate->template_path = 'estimates::estimates.print_' . setting('estimates.estimate.template');
            $message->attach($this->storeDocumentPdfAndGetPath($this->estimate), ['mime' => 'application/pdf']);
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
            'estimate_id' => $this->estimate->id,
            'amount'      => $this->estimate->amount,
        ];
    }

    public function getTags()
    {
        return [
            '{estimate_number}',
            '{estimate_total}',
            '{estimate_expiry_date}',
            '{estimate_status}',
            '{estimate_guest_link}',
            '{estimate_admin_link}',
            '{estimate_portal_link}',
            '{customer_name}',
            '{company_name}',
        ];
    }

    public function getTagsReplacement()
    {
        return [
            $this->estimate->document_number,
            money($this->estimate->amount, $this->estimate->currency_code, true),
            company_date($this->estimate->extra_param->expire_at),
            trans('estimates::general.statuses.' . $this->estimate->status),
            URL::signedRoute(
                'signed.estimates.estimates.show',
                [$this->estimate->id, 'company_id' => $this->estimate->company_id]
            ),
            route('estimates.estimates.show', $this->estimate->id),
            route('portal.estimates.estimates.show', $this->estimate->id),
            $this->estimate->contact_name,
            $this->estimate->company->name,
        ];
    }
}
