@extends('layouts.app2')

@php
    use Illuminate\Support\Facades\Auth;
    $userType = auth::user()->type;
@endphp

@section('header')

@endsection

@if($userType=="Admin")
@section('content')

    {!! Form::open(['method'=>'POST','action'=>'SearchController@installment_search_process','class'=>'form-horizontal']) !!}
    {{csrf_field()}}
    <fieldset>
        <legend class="heading">Search </legend>

        <div class="form-group">
            <label class="control-label col-sm-2" for="search_type">Search</label>
            <div class="col-sm-4">
                <select class="form-control" id="search_type" name="search_type"  required="required" onchange="showOthers(this.value);">
                    <option value="">--Select a type of search--</option>
                    <option value="all_search">Search All Sale Info</option>
                    <option value="by_category">Search by Category</option>
                    <option value="by_model">Search by Model</option>
                </select>
            </div>
        </div>

        <div class="form-group" style="display: none" id="by_category">
            <label class="control-label col-sm-2" for="category">Category</label>
            <div class="col-sm-4">
                <select class="form-control" id="category_id" name="category_id">
                    <option value="">--Select any category--</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group" style="display: none" id="by_model">
            <label class="control-label col-sm-2" for="model">Model</label>
            <div class="col-sm-4">
                <select class="form-control" id="model" name="model">
                    <option value=""> </option>

                    @foreach($items as $item)
                        {
                        <option value="{{$item->model}}">{{$item->title}} &nbsp; model : {{$item->model}} </option>
                        }
                    @endforeach

                </select>
            </div>
        </div>

        <div class="form-group" id="by_date">
            <label class="control-label col-sm-2" for="from">From</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="from" name="from">
            </div>

            <label class="control-label col-sm-2" for="to">To</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="to" name="to">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-12" style="margin-left: 14.5%;">
                <button type="submit" id="submit" name="submit" value="submit" class="btn btn-lg btn-primary" style="margin-left: 25.5%;font-weight:bold;" formtarget="_blank">Search</button>
            </div>
        </div>
</form>
        {!! Form::open(['method'=>'POST','action'=>'SearchController@installment_search_process','class'=>'form-horizontal']) !!}
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-12" style="margin-left: 14.5%;">
                <button type="submit" id="installment_search" name="installment_search" value="installment_search" class="btn btn-lg btn-primary" style="margin-left: 13.5%;font-weight:bold;" formtarget="_blank">Search Installment Due</button>
            </div>
        </div>


    </fieldset>
    </form>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<script type="text/javascript">
    function showOthers(searchType)
    {
        if(searchType=="by_category")
        {
            document.getElementById("by_category").style.display="block";
            document.getElementById("by_model").style.display="none";
        }
        else if(searchType=="by_model")
        {
            document.getElementById("by_model").style.display="block";
            document.getElementById("by_category").style.display="none";
        }
        else if(searchType=="by_user")
        {
            document.getElementById("by_user").style.display="block";
            document.getElementById("by_category").style.display="none";
            document.getElementById("by_model").style.display="none";
        }
        else
        {
            document.getElementById("by_model").style.display="none";
            document.getElementById("by_category").style.display="none";
            document.getElementById("by_user").style.display="none";
        }
    }
    $(document).ready(function() {
        $("#model").select2({
            allowClear:true,
            placeholder:"Select a model",
            width:'100%'
        })

        $('#from').datepicker({
            format: "yyyy-mm-dd",

            todayBtn: "linked",
            autoclose: true,
            todayHighlight: true,
        }).on('changeDate', function(e) {
            $('#form').formValidation('revalidateField', 'your_textbox_datepicker_id');
        });

        $('#to').datepicker({
            format: "yyyy-mm-dd",

            todayBtn: "linked",
            autoclose: true,
            todayHighlight: true,
        }).on('changeDate', function(e) {
            $('#form').formValidation('revalidateField', 'your_textbox_datepicker_id');
        });

    });
</script>

@else
@section('content')
    <h3 style="color: darkred; margin: 1%">Log in as Admin to access this page</h3>
@endsection
@endif