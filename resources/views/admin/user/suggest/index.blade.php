@extends('layouts.admin')

@section('content')

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">

                            @include('includes.flash')


                                <h4 class="title">Find Doctor</h4>
                               
                            </div>
                            <div class="content table-responsive table-full-width">

                              <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ route('admin.find_user.updateCreate', ['id'=> $userInfo->id]) }}">

                                {{ csrf_field() }}

                                <div class="input-group">
                                    
                                    <input type="text" id="skills" class="form-control" placeholder="Write doctor's email address" name="doctoremail" style="margin-bottom: 7px;">
                                   

                                    <input type="text" id="phones" class="form-control" placeholder="Write doctor's phone number" name="doctorphone">


                                    <span class="input-group-btn find-doctor">

                                    <button type="submit" class="btn btn-success">Send Request</button>

                                    </span>
                                </div>

                            </form>

                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>

@endsection

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript">
    $(function() {
        $( "#skills" ).autocomplete({
            source: '{{Request::root()}}/api/user/suggestion/email'
        });

         $( "#phones" ).autocomplete({
            source: '{{Request::root()}}/api/user/suggestion/phone'
    });
});
</script>