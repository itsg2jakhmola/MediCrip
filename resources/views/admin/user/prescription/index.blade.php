@extends('layouts.admin')

@section('content')

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">

                                <h4 class="title">Prescription written by doctor</h4>
                                <p class="category">Here is the list of prescription</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Appointment ID</th>
                                    	<th>Doctor Name</th>
                                    	<th>Prescription</th>
                                    	<th>Written At</th>
                                    	<th>Action</th>
                                    </thead>
                                    <tbody>
                            @if (count($prescription_list) > 0)

                                @foreach ($prescription_list as $info)
                                 <tr data-entry-id="{{ $info->id }}">
                                    <td> #{{ $info->appointment_id }} </td>
                                    <td> {{ ucfirst($info['doctor']->name) }} </td>
                                    <td> {{ ucfirst($info->prescription) }} </td>
                                    
                                    <td>
                                        <span style="display:none;">                                            
                                            {{ \Carbon\Carbon::parse($info->created_at)->format('Y/m/d')}}
                                        </span>
                                        {{ $info->created_at }}                                         
                                    </td>
                                     <td>
                                        <!--<a href="{{ route('admin.medical_history.show',[$info->id]) }}" class="btn btn-xs btn-primary" title="View"><i class="mdi mdi-magnify"></i>View</a>-->
                                        <a href="{{ route('admin.pharmist_setting.show',[$info->id]) }}" class="btn btn-xs btn-primary" title="View"><i class="mdi mdi-magnify"></i>View</a>
                                        <!-- <a href="{{ route('admin.medical_history.edit',[$info->id]) }}" class="btn btn-xs btn-info" title="Edit">Edit<i class="mdi mdi-pencil"></i></a>
                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("Are you Sure ?")."');",
                                        'route' => ['admin.medical_history.destroy', $info->id])) !!}
                                        <button type="submit" class="btn btn-xs btn-danger" title="Delete"><i class="mdi mdi-delete">Delete</i></button>
                                        {!! Form::close() !!}    -->                                     
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>

@endsection