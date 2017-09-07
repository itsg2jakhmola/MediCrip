@extends('layouts.admin')

@section('content')
    <h3 class="page-title">Medical Detail</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            View
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Appointment Id</th>
                            <td>{{ $prescription_detail->appointment_id }}</td>
                        </tr>
                        <tr>
                            <th>From Doctor</th>
                            <td>{{ $prescription_detail['doctor']->name }}</td>
                        </tr>
                        <!-- <tr>
                            <th>Nearby Doctor</th>
                            <td>{{ $prescription_detail->nearby_doctor }}</td>
                        </tr> -->
                        <tr>
                            <th>Prescription</th>
                            <td>{{ $prescription_detail->prescription }}</td>
                        </tr>
                        
                        
                        <tr>
                            <th>Doctor Name</th>
                            <td>{{ $prescription_detail['doctor']->name }}</td>
                        </tr>

                        <tr>
                            <th>Doctor Email</th>
                            <td>
                            <a href="mailto:{{$prescription_detail['doctor']->email}}">{{$prescription_detail['doctor']->email}}</a>
                            </td>
                            
                        </tr>

                        <tr>
                            <th>Doctor Phone</th>
                            <td>{{ $prescription_detail['doctor']->phone_number }}</td>
                        </tr>

                        <tr>
                           <!--  <form class="form-horizontal" enctype="multipart/form-data" role="form" method="PATCH" action="{{ route('admin.pharmist_setting.update', ['id' => $prescription_detail->id]) }}"> -->

                            {!! Form::model( $prescription_detail, ['route' => ['admin.pharmist_setting.update', $prescription_detail->id], 'method' => 'PATCH', 'files'=>true]) !!}

                                {{ csrf_field() }}
                                <th>Alternative Prescription Request</th>
                                <td><textarea name="alternate_prescription" class="form-control" placeholder="Write Alternate Prescription for patient.."></textarea>
                                <input type="hidden" value="{{$prescription_detail['doctor']->id}}" name="to_doctor">

                                <input type="hidden" value="{{$prescription_detail['doctor']->name}}" name="doctor_name">

                                <input type="hidden" value="{{$prescription_detail['doctor']->email}}" name="doctor_email">

                                <input type="hidden" value="{{$prescription_detail->appointment_id}}" name="appoint_id">
                                <br>
                                <button type="submit" class="btn btn-success">Submit</button>
                                <!-- </form> -->
                                {!! Form::close() !!}
                        </tr>
                        
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.pharmist_setting.index') }}" class="btn btn-default">Back to List</a>
        </div>
    </div>
@stop
