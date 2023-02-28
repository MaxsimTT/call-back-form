<?php

namespace App\Helpers;

use App\Helpers\Contracts\SendFormCallBack;
use App\Notifications\CallbackMessage;
use App\Http\Requests\ContactFormRequest;
use Notification;
use App;

class Smtp implements SendFormCallBack
{

	public static function sendFormToAdmin(ContactFormRequest $message)
	{
		Notification::route('mail', config('admin.email'))->notify(App::make(CallbackMessage::class, ['message' => $message]));
	}
}