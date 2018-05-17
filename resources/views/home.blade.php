@extends('layouts.app')
@section('header')

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <p style="color: forestgreen; font-weight: bold; font-size: large">{{\Illuminate\Support\Facades\Auth::user()->name}} is logged in!</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
