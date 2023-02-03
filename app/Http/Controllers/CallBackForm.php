<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use App\Models\Admin;

class CallBackForm extends Controller
{
    
    public function mailToAdmin(ContactFormRequest $request, Admin $admin) {
        
        $validated = $request->validated();

        $admin_model = new \ReflectionClass(Admin::class);

        print_r($admin_model->getMethods());

        return $validated;
    }
}
