<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\AppointmentRequest;
use App\DoctorPrescription;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DoctorAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = Auth::user();

        $appointment_list = AppointmentRequest::where('assign_to', $auth->id)->get()->load('users');
        

        return view('admin.user.doctor_appointment.index', compact('appointment_list'));
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

        $auth = Auth::user();
        $latitude = $auth->lat;
        $longitude = $auth->lng;
        
        $nearBy = DB::select(
               "SELECT *,  ( 3959 * acos( cos( radians('$latitude') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('$longitude') ) + sin( radians('$latitude') ) * sin( radians( lat ) ) ) ) AS distance FROM users where user_type = 3 ORDER BY distance LIMIT 0 , 1
            ");


        $doctorPrescription = new DoctorPrescription;
        $doctorPrescription->for_patient = $request['to_patient'];
        $doctorPrescription->to_pharmist = $nearBy[0]->id;
        $doctorPrescription->lat = $nearBy[0]->lat;
        $doctorPrescription->lng = $nearBy[0]->lng;
        $doctorPrescription->distance = $nearBy[0]->distance;
        $doctorPrescription->appointment_id = $request['appoint_id'];
        $doctorPrescription->from_doctor = $auth->id;
        $doctorPrescription->prescription = $request['prescription'];
        $doctorPrescription->save();

        return redirect()->route('admin.docappoint_setting.index')->with('status', 'Prescription send successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointment_seen = AppointmentRequest::find($id);
        $appointment_seen->seen = 'Seen';
        $appointment_seen->save();

        $appointment_detail = AppointmentRequest::where('id', $id)->first()->load('users');

        return view('admin.user.doctor_appointment.show', compact('appointment_detail'));
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
