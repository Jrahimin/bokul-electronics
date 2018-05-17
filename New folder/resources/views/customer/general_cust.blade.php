@extends('layouts.app2')

@section('header')

@endsection

@section('content')

    {!! Form::open(['method'=>'POST','action'=>'CustomersController@store','class'=>'form-horizontal']) !!}
    {{ csrf_field() }}
    <fieldset>
        <legend class="heading">Insert General Customer Info</legend>
        <div class="form-group">
            {!! Form::label('name','Name',['class'=>'control-label col-sm-2']) !!}

            <div class="col-sm-4">
                <input type="text" class="form-control" name="name" id="name" required="required">
            </div>

        </div>

        <div class="form-group">

            {!! Form::label('phone','Phone Number ',['class'=>'control-label col-sm-2']) !!}
            <div class="col-sm-4">
                <input type="text" class="form-control" name="phone" id="phone">
            </div>

        </div>

        <div class="form-group">
            {!! Form::label('address','Address',['class'=>'control-label col-sm-2']) !!}
            <div class="col-sm-4">
                {!! Form::text('address',null,['class'=>'form-control']) !!}
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
@endsection