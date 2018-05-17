@extends('layouts.app2')

@section('header')

@endsection

@section('content')

    {!! Form::open(['method'=>'POST','action'=>'ItemsController@install_payStore','class'=>'form-horizontal']) !!}
    {{csrf_field()}}

    <fieldset>
        <legend class="heading">Installment Pay</legend>

        <div class="form-group">
            <label class="control-label col-sm-2" for="phone">Phone No</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="phone" name="phone"  required="required">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-12">
                <button type="submit" id="submitSearch" name="submitSearch" value="submitSearch" class="btn btn-lg btn-primary" style="margin-left: 14.5%;font-weight:bold;">Search Installment</button>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="instal_id">Installment</label>
            <div class="col-sm-4">
                <select class="form-control" id="instal_id" name="instal_id" value="" required="required">

                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-12">
                <button type="submit" id="submitInstall" name="submitInstall" value="submitInstall" class="btn btn-lg btn-primary" style="margin-left: 14.5%;font-weight:bold;">Submit Installment</button>
            </div>
        </div>

    </fieldset>
    </form>
@endsection

@section('footer')

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

    $(document).ready(function() {
        $("#submitSearch").click(function () {
            event.preventDefault();
            var phone = $('#phone').val();
            var option = ' ';
            $('#instal_id').empty();
            $.ajax({
                type: "GET",
                url: "{{url('ajax-install')}}",
                data: {'phone': phone},
                success: function (json) {
                    //console.log('success');
                    console.log(json);
                    option += '<option value="">Select an Installment </option>';
                    for (var i = 0; i < json.length; i++) {
                        var remaining = json[i].no_of_inst-json[i].inst_paid;
                        option += '<option value="' + json[i].id + '">Id: ' + json[i].id + '; Date: '+ json[i].date +'; Remaining: '+ remaining +'</option>';
                    }
                    $('#instal_id').append(option);
                },
                error: function () {
                }
            });
        });
    });
</script>