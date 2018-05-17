@extends('layouts.app2')

@php
use Illuminate\Support\Facades\Auth;
$userType = auth::user()->type;
@endphp

@if($userType=="Admin")
@section('header')

@endsection

@section('content')

    {!! Form::open(['method'=>'POST','action'=>'ItemsController@category_store','class'=>'form-horizontal']) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <fieldset>
        <legend class="heading">Add Item Category</legend>

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Category:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="name" name="name"  required="required">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-12">
                <button type="submit" id="submit" name="submit" class="btn btn-lg btn-primary" style="margin-left: 18%;font-weight:bold;">Add Category</button>
            </div>
        </div>

        @if($success==2)
            <br>
            <label id="successLabel" style="margin-left: 27%">{{$msg}}</label>
        @endif
        @if($success==1)
            <label id="failedLabel" style="margin-left: 23%">{{$msg}}</label>
        @endif

    </fieldset>
    </form>

@endsection

@else
@section('content')
    <h3 style="color: darkred; margin: 1%">Log in as Admin to access this page</h3>
@endsection
@endif