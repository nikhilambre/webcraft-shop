<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Enquir;

class EnquiryNotificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $enquir;

    public function __construct(Enquir $enquir)
    {
        $this->enquir = $enquir;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $fromAddress = $_ENV['MAIL_FROM_ADDRESS'];
        $fromName = $_ENV['MAIL_FROM_NAME'];

        $to = $_ENV['MAIL_TO_ADDRESS'];

        return $this->markdown('emails.enquiry-notification')
                    ->subject('WebCraft Shop Enquiry Notification | You Have Received Message from Visitor')
                    ->to($to)
                    ->from($fromAddress, $fromName);
    }
}
