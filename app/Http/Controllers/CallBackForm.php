<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use App\Notifications\CallbackMessage;
use Notification;
use App;
use App\Helpers\Contracts\SendFormCallBack;

class CallBackForm extends Controller
{

    /**
     * @OA\Post(
     *     path="/api/contact",
     *     tags={"call back form"},
     *     summary="Sending call back form to admin email",
     *     operationId="sendingCallBackForm",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="name",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="email",
     *                     type="email"
     *                 ),
     *                 @OA\Property(
     *                     property="message",
     *                     type="text"
     *                 ),
     *                 @OA\Property(
     *                     property="phone",
     *                     oneOf={
     *                         @OA\Schema(type="string"),
     *                         @OA\Schema(type="integer"),
     *                     }
     *                 ),
     *                 example={"name": "Jessica Smith", "email": "example@qwe.com", "messsage": "Hello, World", "phone": 12345678}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="forbidden",
     *     ),
     * )
     *
     */
    
    public function mailToAdmin(ContactFormRequest $message, SendFormCallBack $obj) {

        if ($message->isMethod('POST')) {

            $obj->sendFormToAdmin($message);
            return response()->json('Success', 201);
        }

        return response()->json('Forbidden', 403);
    }
}
