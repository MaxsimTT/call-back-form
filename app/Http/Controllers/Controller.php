<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     description="This web application is designed to test interesting features of Laravel
 ",
 *     version="1.0.0",
 *     title="Test web application",
 *     termsOfService="http://swagger.io/terms/",
 *     @OA\Contact(
 *         email="egorovcotmax@gmail.com"
 *     ),
 * )
 * @OA\Server(
 *     description="API test this application",
 *     url="http://127.0.0.1:8000"
 * )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
