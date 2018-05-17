@extends('layouts.app2')

@section('header')

@endsection

@section('content')
    {!! Form::open(['method'=>'GET','action'=>'ItemsController@installmentStore','class'=>'form-horizontal']) !!}

    <div class="form-group" style="margin-top: 7%;">
        <label class="control-label col-sm-2" for="cust_id">Customer Id</label>
        <div class="col-sm-4">
            <select class="form-control" id="cust_id" name="cust_id"  required="required">
                <option value="">--Select a Customer--</option>
                @foreach($customers as $customer)
                    {
                    <option value="{{$customer->id}}">id: {{$customer->id}} &nbsp; {{$customer->name}}</option>
                    }
                @endforeach
            </select>
        </div>
    </div>

    <input type="hidden" id="date" name="date" value="{{\Carbon\Carbon::today()->setTimezone('Asia/Dacca')->toDateString()}}">
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-12">
                <button type="submit" id="submitInstall" name="submitInstall" value="submitInstall" class="btn btn-lg btn-primary" style="margin-left: 12.5%;font-weight:bold;">Submit Installmet</button>
            </div>
        </div>

    <label style="color:darkred; margin-left: 32%">{{$msg}}</label>

    </form>
@endsection