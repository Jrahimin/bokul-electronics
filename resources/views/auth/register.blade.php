@extends('layouts.app2')
<style>
    .containerReq{
        min-height: 800px;
    }
</style>
@php
use Illuminate\Support\Facades\Auth;
$userType = auth::user()->type;
@endphp

@section('header')
@endsection


@if($userType=="Admin")
@section('content')
    <div class="containerReq">
    <fieldset>
        <legend>Add User</legend>
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            {!! Form::label('name','Name',['class'=>'control-label col-sm-2',]) !!}
                            <div class="col-sm-4">
                                {!! Form::text('name',null,['class'=>'form-control']) !!}
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="type">Type</label>
                            <div class="col-sm-4">
                                <select class="form-control" id="type" name="type"  required="required">
                                    <option value="">--Select a type--</option>
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-2 control-label">Password</label>

                            <div class="col-md-4">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-2 control-label">Confirm Password</label>

                            <div class="col-md-4">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

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

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="margin-left: 14.5%;">
                                    Register
                                </button>
                            </div>
                        </div>

                        @if(count($errors)>0)
                            <div class="alert alert-danger">

                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>

                                    @endforeach
                                </ul>

                            </div>
                        @endif
                    </form>
    </fieldset>
    </div>
@endsection

@section('footer')
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

@else
    @section('content')
    <h3 style="color: darkred; margin: 1%">Log in as Admin to access this page</h3>
    @endsection
@endif

