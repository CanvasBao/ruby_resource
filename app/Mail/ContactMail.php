<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    private $admin_flag = false;
    public $company = '◯◯◯◯';
    public $company_postcode = '◯◯◯-◯◯◯◯';
    public $company_address = '◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯';
    public $company_tel = '◯◯◯-◯◯◯-◯◯◯◯';

    public $user_name;
    public $user_company;
    public $user_mail;
    public $user_phone;
    public $subject;
    public $content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content_param, $admin_flag = false)
    {
        $this->admin_flag = $admin_flag;
        $this->user_name = nl2br(htmlentities($content_param['name']));
        $this->user_company = nl2br(htmlentities($content_param['company']));
        $this->user_mail = nl2br(htmlentities($content_param['email']));
        $this->user_phone = nl2br(htmlentities($content_param['phone']));
        $this->subject = nl2br(htmlentities($content_param['subject']));
        $this->content = nl2br(htmlentities($content_param['content']));
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->admin_flag) {
            $markdown = 'mail.contact.ContactAdminContent';
            $subject = "[".$this->user_name."][".$this->user_company."]".$this->subject;
        } else {
            $markdown = 'mail.contact.ContactUserContent';
            $subject = "[".$this->company."] Cảm ơn quý khách đã liên hệ với chúng tôi";
        }

        return $this->markdown($markdown)
            ->text('mail.contact.textContent')
            ->subject($subject);
    }
}
