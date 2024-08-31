<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Message;

class MessageNotificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
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

        return $this->markdown('emails.message-notification')
                    ->subject('WebCraft Shop Message Notification | You Have Received Message from Visitor')
                    ->to($to)
                    ->from($fromAddress, $fromName);
    }
}
