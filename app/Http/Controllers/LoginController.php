<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class LoginController extends Controller
{

	use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected function credentials(Request $request)
	{

	    $credentials = $request->only($this->username(), 'password');
	    $credentials['user_type'] = '3';

	    return $credentials;

	}
}
