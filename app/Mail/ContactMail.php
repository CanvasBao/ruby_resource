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

    public $first_name;
    public $last_name;
    public $first_name_kana;
    public $last_name_kana;
    public $user_mail;
    public $user_phone;
    public $content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content_param, $admin_flag = false)
    {
        $this->admin_flag = $admin_flag;
        $this->first_name = nl2br(htmlentities($content_param['first_name']));
        $this->last_name = nl2br(htmlentities($content_param['last_name']));
        $this->first_name_kana = nl2br(htmlentities($content_param['first_name_kana']));
        $this->last_name_kana = nl2br(htmlentities($content_param['last_name_kana']));
        $this->user_mail = nl2br(htmlentities($content_param['email']));
        $this->user_phone = nl2br(htmlentities($content_param['tel']));
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
            $subject = "【" . $this->last_name . " " . $this->first_name . "様より】お問い合わせ受信";
        } else {
            $markdown = 'mail.contact.ContactUserContent';
            $subject = "【" . $this->last_name . " " . $this->first_name . "様】お問い合わせありがとうございます";
        }

        return $this->markdown($markdown)
            ->text('mail.contact.textContent')
            ->subject($subject);
    }
}
