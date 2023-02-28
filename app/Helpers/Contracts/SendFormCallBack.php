<?php

namespace App\Helpers\Contracts;

use App\Http\Requests\ContactFormRequest;

interface SendFormCallBack
{

	public static function sendFormToAdmin(ContactFormRequest $message);
}
