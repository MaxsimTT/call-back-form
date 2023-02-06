<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use App\Notifications\CallbackMessage;
use Notification;

class CallBackForm extends Controller
{

     /**
     * @OA\Post(
     *     path="/api/contact",
     *     summary="Send call back form to email admin",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="message",
     *                     type="object"
     *                 ),
     *                 @OA\Property(
     *                     property="email",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="phone",
     *                     oneOf={
     *                         @OA\Schema(type="string"),
     *                         @OA\Schema(type="integer"),
     *                     }
     *                 ),
     *                 @OA\Property(
     *                     property="message",
     *                     type="text"
     *                 ),
     *                 example={"name": "User", "email": "example@mail.com", "phone": 12345678, "message": "Hello, World"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="OK",
     *         @OA\JsonContent(
     *             oneOf={
     *                 @OA\Schema(ref="#/components/schemas/Result"),
     *                 @OA\Schema(type="boolean")
     *             },
     *             @OA\Examples(example="result", value={"success": true}, summary="An result object."),
     *         )
     *     )
     * )
     */

    public function mailToAdmin(ContactFormRequest $message) {

        if ($message->isMethod('POST')) {

            Notification::route('mail', config('admin.email'))->notify(new CallbackMessage($message->validated()));
            return response()->json('Success', 201);
        }

        return response()->json('Forbidden', 403);
    }
}
