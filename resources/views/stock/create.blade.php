@extends('layouts.app2')

@php
use Illuminate\Support\Facades\Auth;
$userType = auth::user()->type;
@endphp

@if($userType=="Admin")
@section('content')

    <fieldset>
        <legend>Add Products to Stock</legend>

    {!! Form::open(['method'=>'POST','action'=>'StockController@store','class'=>'form-horizontal']) !!}

    <div class="form-group">
        {!! Form::label('productId','Product',['class'=>'control-label col-sm-2']) !!}
        <div class="col-sm-4">
            <select class="form-control" id="item_id" name="item_id"  required="required">
                <option value="">--Select an item--</option>
                @foreach($items as $item)
                    {
                    <option value="{{$item->id}}">id: {{$item->id}} &nbsp; {{$item->company}} &nbsp; {{$item->title}} &nbsp; {{$item->model}}</option>
                    }
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('numberOfItems','Number of products',['class'=>'control-label col-sm-2']) !!}
        <div class="col-sm-4">
            {!! Form::text('numberOfItems',null,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group">

        {!! Form::label('price','Price',['class'=>'control-label col-sm-2']) !!}
        <div class="col-sm-4">
            {!! Form::text('price',null,['class'=>'form-control']) !!}
        </div>
    </div>

    <input type="hidden" name="user_id" id="user_id" value="{{$userId}}">
    <input type="hidden" id="date" name="date" value="{{\Carbon\Carbon::today()->setTimezone('Asia/Dacca')->toDateString()}}">

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-12">
            <button type="submit" id="submit" name="submit" class="btn btn-lg btn-primary" style="margin-left: 25.2%;font-weight:bold;">Add</button>
        </div>
    </div>

        @if($success==2)
            <br>
            <label id="successLabel" style="margin-left: 15%">{{$msg}}</label>
        @endif
        @if($success==1)
            <label id="failedLabel" style="margin-left: 20%">{{$msg}}</label>
            @endif

    </form>
    </fieldset>

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

@section('footer')

    @endsection

@else
@section('content')
    <h3 style="color: darkred; margin: 1%">Log in as Admin to access this page</h3>
@endsection
@endif

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#item_id").select2({
            allowClear:true,
            placeholder:"Select a model",
            width:'100%'
        })
    });
</script>