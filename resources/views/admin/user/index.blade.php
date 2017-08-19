@extends('layouts.admin')

@section('content')

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                                
                                @if ($message = Session::get('success'))

                                    <div class="alert alert-success">

                                        <p>{{ $message }}</p>

                                    </div>

                                @endif

                            <div class="content">

                            <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.user.update', ['user/update' => $user->id]) }}">
                            
                            {{ csrf_field() }}


                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Accont (disabled)</label>
                                                <input type="text" class="form-control" disabled placeholder="Company" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Date of Birth</label>
                                                <input type="text" class="form-control" placeholder="Date of Birth" value="{{$user->dob}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" value="{{$user->email}}" class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" placeholder="Name" value="{{$user->name}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Medical Number</label>
                                                <input type="text" class="form-control" placeholder="Medical Number" value="{{$user->medical_number}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" placeholder="Home Address" value="{{$user->address}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="text" class="form-control" placeholder="Phone Number" value="{{$user->phone_number}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Insurance Company</label>
                                                <input type="text" class="form-control" placeholder="Insurance Company" value="{{$user->insurance_company}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Insurance Number</label>
                                                <input type="text" value="{{$user->insurance_number}}" class="form-control" placeholder="Insurance Number">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="5" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                    
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar border-gray" src="assets/img/faces/face-3.jpg" alt="..."/>

                                      <h4 class="title">Mike Andrew<br />
                                         <small>michael24</small>
                                      </h4>
                                    </a>
                                </div>
                                <p class="description text-center"> "Lamborghini Mercy <br>
                                                    Your chick she so thirsty <br>
                                                    I'm in that two seat Lambo"
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                            </div>
                        </div>
                    </div> -->

                </div>
            </div>
        </div>

@endsection