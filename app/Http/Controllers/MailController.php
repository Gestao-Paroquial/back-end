<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function casamentoMail(Request $request) {
        $data = ['name' => $request->input('name')];

        Mail::send(['html'=>'email/casamento'], $data, function($message) {
            $message->to('mileo.iago@gmail.com', 'Tutorials Point')->subject
               ('Laravel Basic Testing Mail');
            $message->from('mileo.iago@gmail.com', 'Virat Gandhi');
         });
         echo "Basic Email Sent. Check your inbox.";
    }
}
