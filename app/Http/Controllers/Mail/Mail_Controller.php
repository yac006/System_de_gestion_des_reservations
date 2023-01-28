<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\validate_reject_dmnd_mail;


class Mail_Controller extends Controller
{

    
    public function send_Mail(Request $request)
    {
        $details = [
            'title' => $request->title ,
            'body' => $request->body 
        ];

        Mail::to($request->user_email)->send(new validate_reject_dmnd_mail($details));

        return redirect()->route( 'broadcastNbrNotifusers', ['title' => $request->title]) ;
    }
}
