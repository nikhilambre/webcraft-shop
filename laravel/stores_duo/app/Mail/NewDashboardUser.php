<?php

namespace App\Mail;
use App\User;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewDashboardUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The user instance.
     *
     * @var User
     */
     public $user;

     
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $from = $_ENV['MAIL_FROM_ADDRESS'];

        return $this->markdown('emails.new-dashboard-user')
                    ->subject('Dashboard User Login')
                    ->from($from);
    }
}
