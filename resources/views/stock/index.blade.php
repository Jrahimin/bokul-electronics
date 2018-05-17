@extends('layouts.app2')


@section('content')
    <fieldset>
        <legend>Check Products in Stock</legend>

        {!! Form::open(['method'=>'GET','action'=>'StockController@search_result','class'=>'form-horizontal']) !!}

        <div class="form-group">
            {!! Form::label('category_id','Category',['class'=>'control-label col-sm-2']) !!}
            <div class="col-sm-4">
                <select class="form-control" id="category_id" name="category_id">
                    <option value="">--Select a category--</option>
                    @foreach($categories as $category)
                        {
                        <option value="{{$category->id}}"> {{$category->name}} </option>
                        }
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('item_id','Item',['class'=>'control-label col-sm-2']) !!}
            <div class="col-sm-4">
                <select class="form-control" id="item_id" name="item_id">



                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-12">
                <button type="submit" id="submit" name="submit" value="submit" class="btn btn-lg btn-primary" style="margin-left: 22.7%;font-weight:bold;">Search</button>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-12">
                <button type="submit" id="allSubmit" name="allSubmit" value="allSubmit" class="btn btn-lg btn-primary" style="margin-left: 13.7%;font-weight:bold;">Search All Stocks</button>
            </div>
        </div>

    </form>
    </fieldset>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>


            $('#category_id').on('change',function (e) {

            console.log(e);
            var category_id=e.target.value;
            var option=' ';
            $('#item_id').empty();
           $.ajax({

               type: "GET",
               url : "{{url('ajax-items')}}",
               data : {'category_id':category_id},
               success : function(data){
                //  console.log('success');
                //  console.log(data);
                   option+='<option value="" selected disabled>Select item </option>';
                   for(var i=0;i<data.length;i++)
                   {
                       option+='<option value="'+data[i].id+'">'+data[i].company+' '+data[i].title+' '+data[i].model+'</option>';
                   }

                   $('#item_id').append(option);
           },
               error:function()
                {

                }

                });
        });

            $(document).ready(function() {
                $("#item_id").select2({
                    allowClear:true,
                    placeholder:"Select a model",
                    width:'100%'
                })
            });
    </script>

@endsection

@section('footer')

@endsection