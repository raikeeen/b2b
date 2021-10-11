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
            'email' => $request->replyEmail,
            'phone' => $request->phone,
            'message' => $request->message,
        ];
        Mail::to('nikita.skrobov.dev@gmail.com')->send(new RegisterMail($details));

        return redirect()->route('register')->with('success_message', 'we got your email.');
    }
}
