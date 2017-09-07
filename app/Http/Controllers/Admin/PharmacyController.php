<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\DoctorPrescription;
use App\PharmistRequest;
use App\Http\Requests;
use Auth;
use App\Http\Controllers\Controller;

class PharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = Auth::user();

        $prescription_list = DoctorPrescription::where('to_pharmist', $auth->id)->get()->load('doctor');
    

        return view('admin.user.prescription.index', compact('prescription_list'));   
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
        $prescription_seen = DoctorPrescription::find($id);
        $prescription_seen->seen = 'Seen';
        $prescription_seen->save();

        $prescription_detail = DoctorPrescription::where('id', $id)->first()->load('doctor');

        return view('admin.user.prescription.show', compact('prescription_detail'));
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

            $this->validate($request, [
                'alternate_prescription'     => 'required',
            ]);

            $pharmistRequest = DoctorPrescription::find($id);

            $pharmistRequest->alternate_prescription = $request['alternate_prescription'];

            $pharmistRequest->save();

            return redirect()->route('admin.pharmist_setting.index')->with('status', 'Alternate Prescription send successfully');

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
