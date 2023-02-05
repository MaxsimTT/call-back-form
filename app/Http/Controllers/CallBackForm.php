<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use App\Notifications\CallbackMessage;
use Notification;

class CallBackForm extends Controller
{
    
    public function mailToAdmin(ContactFormRequest $message) {

        if ($message->isMethod('POST')) {

            Notification::route('mail', config('admin.email'))->notify(new CallbackMessage($message->validated()));
            return response()->json('Success', 200);
        }
    }
}
