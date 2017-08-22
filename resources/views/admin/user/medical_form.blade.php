@extends('layouts.admin')

@section('content')

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">

                                <h4 class="title">Medical History</h4>
                                <p class="category">Register your medical info</p>
                            </div>
                            <div class="content table-responsive table-full-width">

                     <div class="content">
                         <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.medical_history.store') }}">
                                {{ csrf_field() }}

                                    <div class="row smpad">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control" placeholder="Input Name.." value="{{old('name')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row smpad">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <input type="text" name="description" class="form-control" placeholder="Input Description.." value="{{old('description')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row smpad">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Upload File</label>
                                                <input type="file" name="medical_scan" class="form-control" placeholder="Upload Scan Copy">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row smpad">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date</label>
                                                <input type="text" id="scan_dt" class="form-control" name="scan_dt" placeholder="Input Scan Date" value="{{old('scan_dt')}}">
                                            </div>
                                        </div>
                                    
                                    <div class="row smpad"> 
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                    </div>

                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        
                    </form>

                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>

@endsection