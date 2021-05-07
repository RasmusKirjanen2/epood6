<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {

        // below is the existing response
        // replace this with your own code
        // the user can be located with Auth facade

        return $request->wantsJson()
            ? response()->json(['two_factor' => false])
            : redirect('/'); // : redirect('/products');  // lisa see kood eesoleva asemel kui tahad minna products.blade.php lehele peale sisse logimist
    }

}
