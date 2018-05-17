@extends('layouts.app2')

@section('header')

@endsection

@section('content')

    {!! Form::open(['method'=>'GET','action'=>'SearchController@customer_search_process','class'=>'form-horizontal']) !!}
    {{csrf_field()}}
    <fieldset>
        <legend class="heading"> Customer Search </legend>

        <div class="form-group">
            <label class="control-label col-sm-2" for="customer_type">Type of Customer</label>
            <div class="col-sm-4">
                <select class="form-control" id="customer_type" name="customer_type" onchange="showOthers(this.value);">
                    <option value="">--Select a type of search--</option>
                    <option value="general_cust">General Customer</option>
                    <option value="installment_cust">Installment Paying Customer</option>

                </select>
            </div>
        </div>

        <div class="form-group" style="display: none" id="general_cust">
            <label class="control-label col-sm-2" for="phone_number">Phone Number </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="phone_number" name="phone_number">
            </div>
        </div>

        <div class="form-group" style="display: none" id="installment_cust">
            <label class="control-label col-sm-2" for="phone">Phone Number </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
        </div>
</form>

        {!! Form::open(['method'=>'POST','action'=>'CustomersController@details_result','class'=>'form-horizontal']) !!}

        <div class="form-group" id="detailDiv" style="display: none;">
            <label class="control-label col-sm-2" for="detail_id">Customer Detail</label>
            <div class="col-sm-4">
                <select class="form-control" id="detail_id" name="detail_id" onchange="showSearch(this.value);">
                    <option value="">--Select a Detail id--</option>
                    @foreach($allDetails as $detail)
                        <option value="{{$detail->id}}">{{$detail->id}} {{$detail->product}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-12" id="detailSearchDiv" style="display: none;">
                <button type="submit" name="submit" class="btn btn-lg btn-primary" style=" width: 20%; margin-top: 1%; margin-left: 11.5%;font-weight:bold;">Details Search</button>
            </div>
        </div>
        </form>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-12" style="margin-left: 14.5%;">
                <button type="submit" id="submit" name="submit" value="submit" class="btn btn-lg btn-primary" formtarget="_blank" style="margin-left: 25%;font-weight:bold;">Search</button>
            </div>
        </div>

        @if($userType=="Admin")
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-12" style="margin-left: 14.5%;">
                    <button type="submit" id="submitAllNo" name="submitAllNo" value="submitAllNo" class="btn btn-lg btn-primary" formtarget="_blank" style="margin-left: 20.5%;font-weight:bold;">All Numbers</button>
                </div>
            </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-12" style="margin-left: 14.5%;">
                <button type="submit" id="submitAll" name="submitAll" value="submitAll" class="btn btn-lg btn-primary" formtarget="_blank" style="margin-left: 19%;font-weight:bold;">All Customers</button>
            </div>
        </div>

        @endif

    </fieldset>
    </form>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
    function showOthers(customerType) {
        if (customerType == "general_cust") {
            document.getElementById("general_cust").style.display = "block";
            document.getElementById("installment_cust").style.display = "none";
            document.getElementById("detailDiv").style.display = "none";
        }
        else if (customerType == "installment_cust") {
            document.getElementById("installment_cust").style.display = "block";
            document.getElementById("general_cust").style.display = "none";
            document.getElementById("detailDiv").style.display = "block";
        }
        else{
            document.getElementById("installment_cust").style.display = "none";
            document.getElementById("general_cust").style.display = "none";
        }

    };

    function showSearch(value) {
        if(value!="")
        {
            document.getElementById("detailSearchDiv").style.display = "block";
        }
        else
            document.getElementById("detailSearchDiv").style.display = "none";
    }
</script>