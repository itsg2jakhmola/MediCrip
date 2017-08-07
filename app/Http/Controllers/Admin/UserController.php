<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;
use App\Usertype;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
    	$user = Auth::user();
    	$userType = Usertype::find($user->id);
    	return view('admin.user.index', compact('user', 'userType'));
    }

    public function update()
    {
    	
    }
}
