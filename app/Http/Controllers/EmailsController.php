<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\WelcomeMail;

class EmailsController extends Controller
{
    public function email(){
        $mailData = [
            'image_path' => public_path('img/image.jpeg')
        ];

        mail::to('to@example.com')->send(new WelcomeMail($mailData));
    }
}
