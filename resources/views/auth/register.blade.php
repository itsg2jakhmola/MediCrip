@extends('layouts.auth')

@section('content')
  <aside class="rights register">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
      {{ csrf_field() }}
      
      <div class="radio">
        <label>
          <input type="radio" name="o5" value="">
          <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
          <span>Patients</span>
        </label>
        <label>
          <input type="radio" name="o5" value="">
          <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
          <span>Doctor</span>
        </label>
        <label>
          <input type="radio" name="o5" value="">
          <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
          <span>Pharmacies</span>
        </label>
      </div>
      <div class="form-group">
        <input type="text" name="name" class="form-control" placeholder="Name">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="Email">
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group">
        <input type="number" class="form-control" placeholder="Date of Birth">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Medical Number">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Address">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Phone Number">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Insurance Company">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Insurance Number">
      </div>
      <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="Password">
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group">
        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
        @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group">
        <button class="btn btn-info col-md-12">Register</button>
      </div>
    </form>
  </aside>
{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
