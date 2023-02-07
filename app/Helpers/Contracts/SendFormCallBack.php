<?php

namespace App\Helpers\Contracts;

use App\Http\Requests\ContactFormRequest;

interface SendFormCallBack
{

	public function sendFormToAdmin(ContactFormRequest $message);
}
