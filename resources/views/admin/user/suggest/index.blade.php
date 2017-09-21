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
                                <div class="input-group">
                                    <input type="text" id="skills" class="form-control" placeholder="Write doctor's email address" name="doctoremail">
                                   
                                    <input type="text" id="phones" class="form-control" placeholder="Write doctor's phone number" name="doctorphone">
                                    <span class="input-group-btn">
                                    <button class="btn btn-success" type="button">Send Request</button>
                                    </span>
                                  </div>

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