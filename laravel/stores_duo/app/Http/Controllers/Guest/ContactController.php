<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Mail;
use App\Message;
use App\Mail\MessageNotificationEmail;

class ContactController extends Controller
{
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('guest.contact');
    }

    public function postContactPage(Request $request)
    {
        $this->validate($request, [
            'g-recaptcha-response' => 'required|captcha',
            'messageName' => 'required|max:100',
            'messageEmail' => 'required|max:100',
            'messageContact' => 'required|number',
            'messageText' => 'required|max:1600',
        ]);

        $message = new Message();

        $message->messageName = $request->input('messageName');
        $message->messageEmail = $request->input('messageEmail');
        $message->messageContact = $request->input('messageContact');
        $message->messageFlag = 'UNREAD';
        $message->messageText = $request->input('messageText');

        $message->save();

        Mail::send(new MessageNotificationEmail($message));
        return redirect()->back();
    }
}
