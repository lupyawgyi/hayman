<?php

namespace App\Http\Controllers;

use App\Mail\SuccessfulCreateAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send()
    {
        Mail::to('myominhtun65@gmail.com')->send(new SuccessfulCreateAccount());
        return 'Done';
    }
}
