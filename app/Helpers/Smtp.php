<?php

namespace App\Helpers;

use App\Helpers\Contracts\SendFormCallBack;
use App\Notifications\CallbackMessage;
use Notification;

class Smtp implements SendFormCallBack
{

	public function sendFormToAdmin(CallbackMessage $message)
	{
		Notification::route('mail', config('admin.email'))->notify($message);
	}
}