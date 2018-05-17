@extends('layouts.app2')

@php
use Illuminate\Support\Facades\Auth;
$userType = auth::user()->type;
@endphp

@if($userType=="Admin")
@section('header')

@endsection

@section('content')

    {!! Form::open(['method'=>'POST','action'=>'ItemsController@store','class'=>'form-horizontal']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <fieldset>
                <legend class="heading">Add Item</legend>
            <div class="form-group">
                <label class="control-label col-sm-2" for="category">Category</label>
                <div class="col-sm-4">
                    <select class="form-control" id="category_id" name="category_id"  required="required">
                        <option value="">--Select any category--</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

                <div class="form-group">
                <label class="control-label col-sm-2" for="title">Title:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="title" name="title"  required="required">
                </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="model">Model:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="model" name="model"  required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="company">Company:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="company" name="company"  required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="description">Description:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="description" name="description"  required="required">
                    </div>
                </div>

                <input type="hidden" name="date" value="{{\Carbon\Carbon::today()->setTimezone('Asia/Dacca')->toDateString()}}">

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-12">
                        <button type="submit" id="submit" name="submit" class="btn btn-lg btn-primary" style="margin-left: 25.5%;font-weight:bold;">Add</button>
                    </div>
                </div>

                @if($success==2)
                    <br>
                    <label id="successLabel" style="margin-left: 23%">{{$msg}}</label>
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