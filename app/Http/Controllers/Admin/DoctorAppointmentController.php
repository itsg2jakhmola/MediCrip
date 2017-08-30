<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;
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
        $doctorPrescription = new DoctorPrescription;
        $doctorPrescription->to_patient = $request['to_patient'];
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
        $appointment_seen->seen = 'Yes';
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
