<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CallBackForm extends Controller
{
    
    public function mailToAdmin(Request $request) {
        return $request->all();
    }
}
