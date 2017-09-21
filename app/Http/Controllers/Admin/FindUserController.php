<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\DefaultUser;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FindUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userInfo = Auth::user();
        return view('admin.user.suggest.index', compact('userInfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function updateCreate(Request $request, $id=0)
    {

         $user = User::where('email', $request->doctoremail)
                        ->orWhere('phone_number', $request->doctorphone)
                        ->first();

            $checkUser = DefaultUser::firstOrNew([
                'user_id' => Auth::user()->id
            ]);

         $checkUser->user_id = Auth::user()->id;
         $checkUser->assign_to = $user->id;
         $checkUser->save();

         return redirect()->back()->with('status', 'Your default doctor ' . $user->name . ' is saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
