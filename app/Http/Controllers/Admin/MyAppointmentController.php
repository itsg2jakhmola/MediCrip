<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\Appointment;
use App\AppointmentRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MyAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointment_list = Appointment::with('appointment_request')->get();
        //dd($appointment_list);
        
        return view('admin.user.appointment.appointment', compact('appointment_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $users = user::where('user_type', '2')->get();

         return view('admin.user.appointment.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $latitude = $user->lat;
        $longitude = $user->lng;
        
        $nearBy = DB::select(
               "SELECT *,  ( 3959 * acos( cos( radians('$latitude') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('$longitude') ) + sin( radians('$latitude') ) * sin( radians( lat ) ) ) ) AS distance FROM users where user_type = 2 ORDER BY distance LIMIT 0 , 1
            ");

        $fixappointment = Appointment::create($request->all());
        if($fixappointment){
            $appointment = new AppointmentRequest;
            $appointment->user_id = $user->id;
            $appointment->appointment_id = $fixappointment->id;
            $appointment->assign_to = $nearBy[0]->id;
            $appointment->assigned_name = $nearBy[0]->name;
            $appointment->lat = $nearBy[0]->lat;
            $appointment->lng = $nearBy[0]->lng;
            $appointment->distance = $nearBy[0]->distance;
            $appointment->speciality = $nearBy[0]->doctor_practice;
            $appointment->notes = $fixappointment->notes;
            $appointment->save();
        }
        return redirect()->route('admin.appointment_setting.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointment_detail = Appointment::with('prescriptions')->where('id', $id)->first();
        return view('admin.user.appointment.show', compact('appointment_detail'));
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
