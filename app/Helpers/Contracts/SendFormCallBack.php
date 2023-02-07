<?php

namespace App\Helpers\Contracts;

use App\Notifications\CallbackMessage;

interface SendFormCallBack
{

	public function sendFormToAdmin(CallbackMessage $message);
}
