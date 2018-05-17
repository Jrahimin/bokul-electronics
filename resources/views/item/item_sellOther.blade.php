@extends('layouts.app2')

@section('header')

@endsection

@section('content')

    {!! Form::open(['method'=>'POST','action'=>'ItemsController@sellStoreOther','class'=>'form-horizontal']) !!}
    {{csrf_field()}}
    <fieldset>
        <legend class="heading">Sell Item</legend>
        <div class="form-group">
            <label class="control-label col-sm-2" for="item_id">Product Id</label>
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
            <label class="control-label col-sm-2" for="stock_id">Stock</label>
            <div class="col-sm-4">
                <select class="form-control" id="stock_id" name="stock_id"  required="required">

                </select>
            </div>
        </div>

        <input type="text" id="stock_no" name="stock_no" style="display: none;">

        <div class="form-group">
            <label class="control-label col-sm-2" for="no_item">Number of Item</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="no_item" name="no_item"  required="required">
            </div>
            <label class="control-label" style="color:darkred">{{$remainingMsg}}</label>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="sell_price">Price</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="sell_price" name="sell_price"  required="required">
            </div>
        </div>

        <div class="form-group"  id="serial_no">
            <label class="control-label col-sm-2" for="serial_no">Serial No</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="serial_no" name="serial_no">
            </div>
        </div>

        <input type="hidden" name="sell_type" id="sell_type" value="Installment">
        <input type="hidden" name="instal_id" id="instal_id" value="{{$lastInstall->id}}">
        <input type="hidden" name="cust_id" id="cust_id" value="{{$lastInstall->cust_id}}">
        <input type="hidden" name="user_id" id="user_id" value="{{$userId}}">
		<input type="hidden" id="date" name="date" value="{{\Carbon\Carbon::now('asia/dacca')->toDateString()}}">

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-12">
                <button type="submit" id="submitSell" name="submitSell" value="submitSell" class="btn btn-lg btn-primary" style="margin-left: 25.5%;font-weight:bold;">Sell</button>
            </div>
        </div>

        @if($success==2)
            <br>
            <label id="successLabel" style="margin-left: 20%">{{$msg}}</label>
        @endif

        @if($success==1)
            <label id="failedLabel" style="margin-left: 34%">{{$msg}}</label>
        @endif


    @if($load!=0)
            <fieldset>
                <legend>Payment</legend>
                <?php
                $amountSum = 0.0;
                $amount = 0.0;
                ?>
                @foreach($allSells as $sell)
                    <?php
                    $amount = $sell->no_item*$sell->sell_price;
                    $amountSum = $amountSum+$amount;
                    ?>
                @endforeach
                <div class="form-group">
                    <label class="control-label col-sm-4">Total Bill (Including Interest): {{$amountSum*1.04}}/-</label>
                    <input type="hidden" name="total" id="total" value="{{$amountSum*1.04}}">
                </div>
                @endif


            @if(count($errors)>0)
                <div class="alert alert-danger">

                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>

                        @endforeach
                    </ul>

                </div>
            @endif
    </fieldset>
    <br>
</form>

        <div class="InstallmentDiv">
            {!! Form::open(['method'=>'GET','action'=>'ItemsController@installmentStore','class'=>'form-horizontal']) !!}

            <div class="form-group">
                <label class="control-label col-sm-2" for="no_of_inst">Number of Installment</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="no_of_inst" name="no_of_inst">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="paid">Down Payment</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="paid" name="paid"  required="required">
                </div>
            </div>

            <input type="hidden" name="instal_id" id="instal_id" value="{{$lastInstall->id}}">
            <input type="hidden" name="cust_id" id="cust_id" value="{{$lastInstall->cust_id}}">

            <div class="col-sm-offset-2 col-sm-12">
                <button type="submit" id="submitPay" name="submitPay" value="submitPay" onClick="check(event)" class="btn btn-lg btn-primary" style="margin-top: 1%; margin-left: 11%;font-weight:bold;">Create Installment</button>
            </div>
            <label id="successLabel" style="margin-left: 25%;">{{$msgPay}}</label>
        </div>
            </form>

    <div class="memo" style="margin-bottom: 10%;">
        {!! Form::open(['method'=>'GET','action'=>'ItemsController@create_memo','class'=>'form-horizontal']) !!}

                <input type="hidden" name="instal_id" id="instal_id" value="{{$lastInstall->id}}">
                <input type="hidden" name="cust_id" id="cust_id" value="{{$lastInstall->cust_id}}">
                <input type="hidden" name="user_id" id="user_id" value="{{$userId}}">

                <div class="col-sm-offset-2 col-sm-12">
                    <button type="submit" id="submitMemoOther" name="submitMemoOther" value="submitMemoOther" class="btn btn-lg btn-primary" formtarget="_blank" style="margin-top: 1%; margin-left: 16%;font-weight:bold;">Create Memo</button>
                </div>

            </form>
    </div>
    </fieldset>

    <script>

        $('#item_id').on('change',function (e) {

            console.log(e);
            var item_id=e.target.value;
            var option=' ';
            $('#stock_id').empty();
            $.ajax({

                type: "GET",
                url : "{{url('ajax-stocks')}}",
                data : {'item_id':item_id},
                success : function(data){
                    //console.log('success');
                    //console.log(data);
                    option+='<option value="0" selected disabled>Select a stock </option>';
                    for(var i=0;i<data.length;i++)
                    {
                        var remaining=data[i].numberOfItems-data[i].sold;
                        option+='<option value="'+data[i].id+'">Stock Id: '+data[i].id+'; Remaining Items: '+remaining+'</option>';
                    }

                    $('#stock_id').append(option);
                    $('#stock_no').val(remaining);
                },
                error:function()
                {

                }

            });
        });

    </script>

@endsection

@section('footer')

@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
    function showInstall(payType)
    {
        if(payType=="Installment")
        {
            document.getElementById("no_of_inst_div").style.display="block";
            document.getElementById("no_of_inst").setAttribute("required", "required");
        }
        else
        {
            document.getElementById("no_of_inst_div").style.display="none";
            document.getElementById("no_of_inst").removeAttribute("required");
        }
    }

    function check(event) {
        var $total = document.getElementById("total").value;
        var $paid = document.getElementById("paid").value;
        $total = parseFloat($total);
        $paid = parseFloat($paid);
        console.log($total);
        console.log($paid);
        if($paid>$total){
            alert("Please check the paid amount");
            event.preventDefault();
        }
    }

    $(document).ready(function() {
        $("#item_id").select2({
            allowClear:true,
            placeholder:"Select a model",
            width:'100%'
        })
    });
</script>


