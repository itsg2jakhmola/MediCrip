@extends('layouts.admin')

@section('content')
    <h3 class="page-title">Medical Detail</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            View
            @include('includes.flash')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Patient Name</th>
                            <td>{{ ucfirst($appointment_detail['users']->name)}}</td>
                        </tr>
                        <tr>
                            <th>Description/Notes</th>
                            <td>{{ $appointment_detail->notes }}</td>
                        </tr>
                        <tr>
                            <th>Patient Email</th>
                            <td> {{ $appointment_detail['users']->email }}</td> 
                        </tr>
                        <tr>
                            <th>Appointment Date/Time</th>
                            <td>{{ $appointment_detail->appointment_time }}</td>
                        </tr>

                        <tr>
                            <th>Message from Pharmyst</th>
                            <td>{{ $appointment_detail->message_from_pharmist }}</td>
                        </tr>
                        
                        <tr>
                              <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ route('admin.docappoint_setting.store') }}">
                                {{ csrf_field() }}
                                <th>Add Prescription</th>
                                <td><textarea name="prescription" class="form-control" placeholder="Write Prescription for patient.."></textarea>
                                <input type="hidden" value="{{$appointment_detail['users']->id}}" name="to_patient">

                                <input type="hidden" value="{{$appointment_detail['users']->name}}" name="patient_name">

                                <input type="hidden" value="{{$appointment_detail['users']->email}}" name="patient_email">

                                <input type="hidden" value="{{$appointment_detail->appointment_id}}" name="appoint_id">
                                <br>
                                <button type="submit" class="btn btn-success">Submit</button>
                                </form>
                                </td>
                                <tr>
                                
                                <th>See Medical History</th>
                                <td>
                                {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'route' => ['admin.docappoint_setting.format'])) !!}
                                  
                                    @if ($auth->seen == 'Seen')
                                        <button type="submit" disabled class="btn btn-xs btn-danger" title="showHistory"><i class="mdi mdi-delete">Show medical History</i></button>
                                    @else
                                        <button type="submit" class="btn btn-xs btn-danger" title="Delete"><i class="mdi mdi-delete">Show medical History </i></button>
                                    @endif  

                                    
                                     {!! Form::close() !!} 
                                </td>
                                </tr>
                                
                        </tr>
                        
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.docappoint_setting.index') }}" class="btn btn-default">Back to List</a>
        </div>
    </div>
@stop
