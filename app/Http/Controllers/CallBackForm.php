<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use App\Models\Admin;
use App\Notifications\CallbackMessage;
use Notification;

class CallBackForm extends Controller
{
    
    public function mailToAdmin(ContactFormRequest $message, Admin $admin) {
        
        $validated = $message->validated();

        // var_dump($message instanceof ContactFormRequest);

        // $admin_model = new \ReflectionClass(Admin::class);
        // print_r($admin_model->getMethods());

        $result = Notification::send($admin, new CallbackMessage($message));
        return $result;
    }
}
