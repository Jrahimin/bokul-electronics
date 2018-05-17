@extends('layouts.app2')

@section('header')

@endsection

@section('content')

    {!! Form::open(['method'=>'POST','action'=>'ItemsController@sellStore','class'=>'form-horizontal']) !!}
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

        <input type="hidden" name="sell_type" id="sell_type" value="Instant">

        <div class="form-group" style="display: none" id="no_of_inst_div">
            <label class="control-label col-sm-2" for="no_of_inst">Number of Installment</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="no_of_inst" name="no_of_inst">
            </div>
        </div>

        <div class="form-group">
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

        <input type="hidden" name="user_id" id="user_id" value="{{$userId}}">

        <input type="hidden" id="date" name="date" value="{{\Carbon\Carbon::today()->setTimezone('Asia/Dacca')->toDateString()}}">

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-12">
                <button type="submit" id="submitSell" name="submitSell" value="submitSell" class="btn btn-lg btn-primary" style="margin-left: 25.5%;font-weight:bold;">Sell</button>
            </div>
        </div>

        @if($success==2)
            <br>
            <label id="successLabel" style="margin-left: 24%">{{$msg}}</label>
        @endif

        @if($success==1)
            <label id="failedLabel" style="margin-left: 34%">{{$msg}}</label>
        @endif

        </form>
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

    @if($load!=0)
        <div class="memo" style="margin-bottom: 10%;">
        {!! Form::open(['method'=>'GET','action'=>'ItemsController@create_memo','class'=>'form-horizontal']) !!}
                <fieldset>
                    <legend>Create Memo</legend>
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
                    <label class="control-label col-sm-2">Total Bill: {{$amountSum}}</label>
                    <input id="total" type="text" style="display: none;" value={{$amountSum}}>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="paid">Bill Paid</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="paid" name="paid"  required="required">
                    </div>
                </div>

                    <input type="hidden" name="sell_id" id="sell_id" value="{{$sellId}}">
        <div class="col-sm-offset-2 col-sm-12">
            <button type="submit" id="submitMemo" name="submitMemo" value="submitMemo" onClick="check(event)" class="btn btn-lg btn-primary" formtarget="_blank" style="margin-top: 1%; margin-left: 18.3%;font-weight:bold;">Create Memo</button>
        </div>
                </fieldset>
        </form>
</div>
    @endif


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


