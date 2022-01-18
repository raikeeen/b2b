<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {

        $details = [
            'name' => 'Prieiga prie B2B sistemos',
            'email' => $request->replyEmail,
            'phone' => $request->phone,
            'message' => $request->message,
        ];
        Mail::to('info@rm-autodalys.eu')->send(new RegisterMail($details));

        return redirect()->route('register')->with('success_message', 'Ačiū!');
    }
}
