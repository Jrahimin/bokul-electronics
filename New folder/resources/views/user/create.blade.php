@extends('layouts.app2')


@section('content')

    {!! Form::open(['method'=>'POST','action'=>'UserController@store','class'=>'form-horizontal']) !!}
    <fieldset>
        <legend class="heading">Insert User Info</legend>
        <div class="form-group">
            {!! Form::label('name','Name',['class'=>'control-label col-sm-2']) !!}
            <div class="col-sm-4">
            {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>

        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="type">Category</label>
            <div class="col-sm-4">
                <select class="form-control" id="type" name="type"  required="required">
                    <option value="">--Select a type--</option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('password','Password',['class'=>'control-label col-sm-2']) !!}
            <div class="col-sm-4">
            {!! Form::password('password',null,['class'=>'form-control']) !!}
            </div>

        </div>

        <div class="form-group">
            {!! Form::label('address','Address',['class'=>'control-label col-sm-2']) !!}
            <div class="col-sm-4">
            {!! Form::text('address',null,['class'=>'form-control']) !!}
            </div>

        </div>
        <div class="form-group">

            {!! Form::label('phone','Phone Number ',['class'=>'control-label col-sm-2']) !!}
            <div class="col-sm-4">
            {!! Form::text('phone',null,['class'=>'form-control']) !!}
            </div>

        </div>

        <div class="form-group">

            {!! Form::label('email','Email ',['class'=>'control-label col-sm-2']) !!}
            <div class="col-sm-4">
            {!! Form::text('email',null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group">

            {!! Form::label('nationalId','National Id ',['class'=>'control-label col-sm-2']) !!}
            <div class="col-sm-4">
            {!! Form::text('nationalId',null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group">

            {!! Form::label('dateOfBirth','Date Of Birth ',['class'=>'control-label col-sm-2']) !!}
            <div class="col-sm-4">
            {!! Form::date('dateOfBirth',null,['class'=>'form-control']) !!}
            </div>
        </div>


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-12">
            <button type="submit" id="submit" name="submit" class="btn btn-lg btn-primary" style="margin-left: 25%;font-weight:bold;">Add</button>
        </div>
    </div>
        </div>
    </fieldset>
    </form>
@endsection

@section('footer')

    @endforeach