<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;

class CallBackForm extends Controller
{
    
    public function mailToAdmin(ContactFormRequest $request) {
        
        $validated = $request->validated();

        return $validated;
    }
}
