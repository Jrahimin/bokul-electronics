@extends('layouts.app2')

@section('header')

@endsection

@section('content')

   {!! Form::open(['method'=>'POST','action'=>'CustomersController@store','class'=>'form-horizontal']) !!}
   {{ csrf_field() }}
   <fieldset>
       <legend class="heading">Insert Customer Info</legend>
    <div class="form-group">
   {!! Form::label('name','Name',['class'=>'control-label col-sm-2']) !!}
     <div class="col-sm-4">
    {!! Form::text('name',null,['class'=>'form-control']) !!}
     </div>
    </div>

    <input type="hidden" name="type" id="type" value="installment_cust">

    <div class="form-group">
        {!! Form::label('address','Address',['class'=>'control-label col-sm-2']) !!}
     <div class="col-sm-4">
        {!! Form::text('address',null,['class'=>'form-control']) !!}
     </div>

    </div>
    <div class="form-group">

        {!! Form::label('phone','Phone Number ',['class'=>'control-label col-sm-2']) !!}
     <div class="col-sm-4">
        {!! Form::text('phone',null,['class'=>'form-control']) !!}
     </div>

    </div>

    <div class="form-group">

        {!! Form::label('email','Email ',['class'=>'control-label col-sm-2']) !!}
     <div class="col-sm-4">
        {!! Form::text('email',null,['class'=>'form-control']) !!}
     </div>
    </div>
    <div class="form-group">

        {!! Form::label('nationalId','National Id ',['class'=>'control-label col-sm-2']) !!}
     <div class="col-sm-4">
        {!! Form::text('nationalId',null,['class'=>'form-control']) !!}
     </div>
    </div>
    <div class="form-group">

        {!! Form::label('dateOfBirth','Date Of Birth ',['class'=>'control-label col-sm-2']) !!}
     <div class="col-sm-4">
        {!! Form::text('dateOfBirth',null,['class'=>'form-control']) !!}
     </div>
    </div>

       <input type="hidden" id="date" name="date" value="{{\Carbon\Carbon::today()->setTimezone('Asia/Dacca')->toDateString()}}">

   <div class="form-group">
       <div class="col-sm-offset-2 col-sm-12">
           <button type="submit" id="submit" name="submit" class="btn btn-lg btn-primary" style="margin-left: 25.5%;font-weight:bold;">Add</button>
       </div>
   </div>

       @if($success==2)
           <br>
       <label id="successLabel" style="margin-left: 18%">{{$msg}}</label>
       @endif
           @if($success==1)
           <label id="failedLabel" style="margin-left: 18%">{{$msg}}</label>
       @endif

    </fieldset>
   </form>
   @if(count($errors)>0)
       <div class="alert alert-danger">

           <ul>
               @foreach($errors->all() as $error)
                   <li>{{$error}}</li>

               @endforeach
           </ul>

       </div>
   @endif
    @endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dateOfBirth').datepicker({
            format: "yyyy-mm-dd",

            todayBtn: "linked",
            autoclose: true,
            todayHighlight: true,
        }).on('changeDate', function (e) {
            $('#dateOfBirth').formValidation('revalidateField', 'your_textbox_datepicker_id');
        });
    });
</script>