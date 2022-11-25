<?php

namespace Modules\Crm\Notifications;

use App\Abstracts\Notification;
use App\Models\Common\EmailTemplate;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;

class Email extends Notification
{
    /**
     * The email model.
     *
     * @var object
     */
    public $email;

    /**
     * The email template.
     *
     * @var string
     */
    public $template;

    /**
     * Create a notification instance.
     *
     * @param  object  $email
     * @param  object  $template
     */
    public function __construct($email = null, $template = null)
    {
        parent::__construct();

        $this->email = $email;
        $this->template = $template;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $body = json_encode($this->email->body);
        $body = str_replace('\n', "<br>", $body);
        $body = str_replace('"', "", $body);
        $json_characters = array("\u00fc","\u011f","\u0131","\u015f","\u00e7","\u00f6","\u00dc","\u011e","\u0130","\u015e","\u00c7","\u00d6");
        $foreign_characters = array("ü","ğ","ı","ş","ç","ö","Ü","Ğ","İ","Ş","Ç","Ö");
        $body = str_replace($json_characters, $foreign_characters, $body);

        $message = (new MailMessage)
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->subject($this->email->subject)
            ->view('crm::partials.email.body', ['body' => $body]);

        return $message;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [];
    }
}
