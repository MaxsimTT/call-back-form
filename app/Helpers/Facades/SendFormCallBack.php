<?php

namespace App\Helpers\Facades;

use Illuminate\Support\Facades\Facade;

class SendFormCallBack extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'sendformcallback';
	}
}
