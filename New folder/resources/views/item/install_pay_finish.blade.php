@extends('layouts.app2')
<style>
    table{
        font-family: arial, sans-serif;
        font-size: 16px;
        border-collapse: collapse;
        margin: 0 auto;
        table-layout:fixed;
        word-wrap: break-word;
    }
    table td{
        border: none;
        text-align: center;
        vertical-align: middle;
        padding: 8px;
    }
    table th{
        border: none;
        text-align: center;
        vertical-align: middle;
        padding: 8px;
        background-color: beige;
    }
</style>
@section('header')

@endsection

@section('content')

<?php
    $RemainingInstall = $installInfo->no_of_inst - $installInfo->inst_paid;
    $perInstallment = $installInfo->amount/$RemainingInstall;
    $perInstallment = number_format((float)$perInstallment, 2, '.', '');
?>

<table class="InstallTable">
    <thead>
    <tr>
        <th style="width: 30%">Product</th>
        <th>Total Installments</th>
        <th>Remaining Installments</th>
        <th>Amount to be paid</th>
        <th>Amount per Installment</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>

        <tr>
            <td>
                @foreach($sells as $sell)
                {{$sell->item->company}} {{$sell->item->title}} {{$sell->item->model}}<br>
                @endforeach
            </td>
            <td>{{$installInfo->no_of_inst}}</td>
            <td>{{$RemainingInstall}}</td>
            <td>{{$installInfo->amount}}</td>
            <td>{{$perInstallment}}/-</td>
            <td>{{$installInfo->date}}</td>
        </tr>

    </tbody>

</table>
<br><br>
{!! Form::open(['method'=>'POST','action'=>'ItemsController@install_payStore','class'=>'form-horizontal']) !!}

        <fieldset>
            <legend>Installment Payment</legend>

            <div class="form-group">
                <label class="control-label col-sm-2" for="w_month">Installment Month</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="w_month" name="w_month"  required="required">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="ifInterest">Interest Rate</label>
                <div class="col-sm-4">
                    <select class="form-control" id="ifInterest" name="ifInterest"  required="required" onchange="getInterest(this.value);">
                        <option value="">--Select Interest Rate--</option>
                        <option value="0">No interest</option>
                        <option value="1">Add Interest</option>
                    </select>
                </div>
            </div>

            <div class="form-group" id="interestDiv" style="display: none">
                <label class="control-label col-sm-2" for="interest">Interset (%)</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="interest" name="interest"  required="required" value="0">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="amount">Paying amount</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="amount" name="amount"  required="required">
                </div>
            </div>

            <input type="hidden" id="instal_id" name="instal_id" value="{{$installInfo->id}}">
            <input type="hidden" id="date" name="date" value="{{\Carbon\Carbon::today()->setTimezone('Asia/Dacca')->toDateString()}}">

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-12">
                    <button type="submit" id="submitPayInstall" name="submitPayInstall" value="submitPayInstall" class="btn btn-lg btn-primary" style="margin-left: 17%;font-weight:bold;">Pay Installment</button>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-12">
                    <button type="submit" id="submitMemoInstallPay" name="submitMemoInstallPay" value="submitMemoInstallPay" formtarget="_blank" onclick="getMemo();" class="btn btn-lg btn-primary" style="margin-left: 17%;font-weight:bold;">Create Memo</button>
                </div>
            </div>

            @if($success==2)
                <br>
                <label id="successLabel" style="margin-left: 22%">{{$msg}}</label>
            @endif

            @if($success==1)
                <label id="failedLabel" style="margin-left: 34%">{{$msg}}</label>
            @endif
        </fieldset>

</form>

@endsection

@section('footer')

@endsection

<script>
    function getInterest(ifInterest) {
        if(ifInterest==0)
        {
            document.getElementById("interestDiv").style.display = "none";
        }
        else if(ifInterest==1)
        {
            document.getElementById("interestDiv").style.display="block";
            document.getElementById("interest").value = "";
        }
    }
    
    function getMemo() {
        document.getElementById("w_month").removeAttribute("required");
        document.getElementById("ifInterest").removeAttribute("required");
        document.getElementById("interest").removeAttribute("required");
        document.getElementById("amount").removeAttribute("required");
    }
</script>