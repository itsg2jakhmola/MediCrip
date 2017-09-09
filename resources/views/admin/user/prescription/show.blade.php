@extends('layouts.admin')

@section('content')

    <link rel="stylesheet" href="http://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.css">

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
                            <td>
                                {{ $prescription_detail['doctor']->name }}
                                @if(Auth::user()->id == 3)
                                <a href="javascript:void(0);" onclick="showReply(event);" class="replydoctor" id="reply-doctor">
                                  <i class="fa fa-reply" aria-hidden="true"></i>
                                </a>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>Doctor Address</th>
                            <td>{{ $prescription_detail['doctor']->address }}</td>
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
                        
                         @if(Auth::user()->user_type == 1)
                            <tr>
                            <th>Pharmacy Phone</th>
                            <td>{{ $prescription_detail['pharmist']->phone_number }}</td>
                        </tr>

                        <tr>
                            <th>Pharmacy Email</th>
                            <td>

                             <a href="mailto:{{$prescription_detail['pharmist']->email}}">{{$prescription_detail['pharmist']->email}}</a>

                            </td>
                        </tr>

                        <tr>
                            <th>Pickup Date</th>
                            <td>{{ ($prescription_detail['tracking']->packed_date) ? $prescription_detail['tracking']->packed_date : 'Not Yet Ready' }}</td>
                        </tr>

                        <tr>
                            <th>Pickup Time</th>
                            <td>{{ ($prescription_detail['tracking']->pack_time) ? $prescription_detail['tracking']->pack_time : 'Not yet Ready' }}</td>
                        </tr>

                        <tr>
                            <th>Pharmacy Address</th>
                            <td>{{ $prescription_detail['pharmist']->address }}</td>
                        </tr>
                         @endif   

                        <tr>
                        @if(Auth::user()->user_type == 3)
                            <form class="form-horizontal" enctype="multipart/form-data" role="form" method="post" action="{{ route('admin.pharmist_setting.store')}}">
                            {{ csrf_field() }}
                            
                            <td>
                            <div class="row smpad">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Amount</label>
                                                
                            </td>
                            
                            <td class="input-append date form_datetime">
                                    <input type="text" id="amount" class="form-control" name="amount" placeholder="Input Amount" value="{{old('amount')}}">
                                </div>
                                    <span class="add-on"><i class="icon-th"></i></span>
                            </div>
                         </div>
                            
                            </td>
                            <tr>
                            <th>Pickup Date</th>
                            <td>

                                <input type="hidden" value="{{ $prescription_detail->appointment_id }}" name="appointment_id">

                                <input type="hidden" value="{{  $prescription_detail['doctor']->id }}" name="doctor_id">

                                <input type="hidden" value="{{  $prescription_detail['patient']->id }}" name="patient_id">

                                <input type="hidden" value="{{  $user->name }}" name="pharma_name">

                               <input type="text" id="pickup_date" class="form-control" name="packed_date" placeholder="Input Pickup Date" value="{{old('pickup_date')}}"> 
                            </td>
                            <tr>
                            <th>Pickup Time</th>
                            <td>

                            <input type="text" id="input-a" class="form-control" name="pack_time" placeholder="Input Pickup Date" value="{{old('pickup_date')}}" data-default="20:48"> 

                            </td>
                            </tr>
                        </tr>
                        <tr>
                        <td>

                            <button type="submit" class="btn btn-success">Submit</button>
                            </td>
                            </form>
                            @endif

                        
                    </table>
                    <table class="table table-bordered table-striped">
                        <tr class="replydoctorSetting" style="display:none;">
                        
                            {!! Form::model( $prescription_detail, ['route' => ['admin.pharmist_setting.update', $prescription_detail->id], 'method' => 'PATCH', 'files'=>true]) !!}

                                {{ csrf_field() }}
                            
                             
                                <th >Alternative Prescription Request</th>
                                <td><textarea name="alternate_prescription" class="form-control" placeholder="Write Alternate Prescription for patient.."></textarea>
                                <input type="hidden" value="{{$prescription_detail['doctor']->id}}" name="to_doctor">

                                <input type="hidden" value="{{$prescription_detail['doctor']->name}}" name="doctor_name">

                                <input type="hidden" value="{{$prescription_detail['doctor']->email}}" name="doctor_email">

                                <input type="hidden" value="{{$prescription_detail->appointment_id}}" name="appoint_id">
                                <br>
                                <button type="submit" class="btn btn-success">Submit</button>
                               </td>
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

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>


<script src="http://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.js"></script>

<script type="text/javascript">
    jQuery(function($) {
    var input = $('#input-a');
            input.clockpicker({
                autoclose: true
        });
    
});
</script>