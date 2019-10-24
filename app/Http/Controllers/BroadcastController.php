<?php
/**
 * Created by PhpStorm.
 * User: kieutrang
 * Date: 9/26/2019
 * Time: 11:07 PM
 */

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Broadcast;
class BroadcastController extends Controller
{

    public function authenticate(UserRequest $request)
    {
        return Broadcast::auth($request);
    }
}