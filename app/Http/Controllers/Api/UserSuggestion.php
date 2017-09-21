<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserSuggestion extends Controller
{
    public function findUser(Request $request)
    {

		$searchTerm = $_GET['term'];
	    
	    $data = User::where('email', 'like', '%' . $searchTerm . '%')->first();
		    
	    return \Response::json([
	    	'success' => true,
	    	'message' => $data->email
	    ]);
     }

     public function findUserByPhone(Request $request)
    {

		$searchTermd = $_GET['term'];
	    
	    $result = User::where('phone_number', 'like', '%' . $searchTermd . '%')->first();
		   
	    return \Response::json([
	    	'success' => true,
	    	'data' => (string) $result->phone_number
	    ]);
     }

     
}
