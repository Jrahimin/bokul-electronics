@extends('layouts.app2')

@section('header')

@endsection

@section('content')

    {!! Form::open(['method'=>'POST','action'=>'CustomersController@detailsStore','class'=>'form-horizontal']) !!}
    {{csrf_field()}}
    <fieldset>
        <legend class="heading"><b>কিস্তিতে পণ্য ক্রয়ের আবেদনপত্র</b></legend>

        <div class="form-group">
            <label class="control-label col-sm-2" for="cust_id">আবেদনকারী</label>
            <div class="col-sm-4">
                <select class="form-control" id="cust_id" name="cust_id"  required="required">
                    <option value="">--আবেদনকারী--</option>
                    @foreach($customers as $customer)
                        {
                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                        }
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">

            <label class="control-label col-sm-2" for="name">আবেদনকারীর নাম</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="name" name="name"  required="required">
            </div>

            <label class="control-label col-sm-2" for="nickName">ডাকনাম</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="nickName" name="nickName"  required="required">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="fatherName">পিতা/স্বামীর নাম</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="fatherName" name="fatherName"  required="required">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="presentAddress">বর্তমান বাসস্থানের ঠিকানা</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="presentAddress" name="presentAddress"  required="required">
            </div>

            <label class="control-label col-sm-2" for="presentAddPhone">টেলিফোন নং</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="presentAddPhone" name="presentAddPhone"  required="required">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="homeWay">বাসস্থান চেনার সহজ উপায়</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="homeWay" name="homeWay"  required="required">
            </div>
        </div>

        <div class="form-group">

            <label class="control-label col-sm-2" for="OwnOrRent">বাসস্থানটি নিজস্ব/ভাড়া</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="OwnOrRent" name="OwnOrRent"  required="required">
            </div>

            <label class="control-label col-sm-2" for="timeLiving">বসবাসের সময়কাল</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="timeLiving" name="timeLiving"  required="required">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="familyMemberNo">পরিবারের সদস্য সংখ্যা</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="familyMemberNo" name="familyMemberNo"  required="required">
            </div>
        </div>

        <div class="form-group">

            <label class="control-label col-sm-2" for="permanentAddress">স্থায়ী ঠিকানা</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="permanentAddress" name="permanentAddress"  required="required">
            </div>

            <label class="control-label col-sm-2" for="permanentAddPhone">টেলিফোন নং</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="permanentAddPhone" name="permanentAddPhone"  required="required">
            </div>
        </div>

        <div class="form-group">

            <label class="control-label col-sm-2" for="occupation">পেশা</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="occupation" name="occupation"  required="required">
            </div>

            <label class="control-label col-sm-2" for="monthlyIncome">মাসিক আয়</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="monthlyIncome" name="monthlyIncome"  required="required">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="age">বয়স</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="age" name="age"  required="required">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="maritalStatus">বৈবাহিক অবস্থা</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="maritalStatus" name="maritalStatus"  required="required">
            </div>
        </div>
<br>
        <b>ক্রয় ইচ্ছুক পণ্যের বিবরণঃ</b>
        <div class="form-group">
            <label class="control-label col-sm-2" for="product">পণ্যের নাম</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="product" name="product"  required="required">
            </div>
        </div>

        <div class="form-group">

            <label class="control-label col-sm-2" for="cashPrice">নগদ মূল্য</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="cashPrice" name="cashPrice"  required="required">
            </div>

            <label class="control-label col-sm-2" for="InstallmentPrice">কিস্তি মূল্য</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="InstallmentPrice" name="InstallmentPrice"  required="required">
            </div>
        </div>

        <div class="form-group">

            <label class="control-label col-sm-2" for="downPayment">প্রারম্ভিক জমা</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="downPayment" name="downPayment"  required="required">
            </div>

            <label class="control-label col-sm-2" for="monthlyInstallment">মাসিক কিস্তি</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="monthlyInstallment" name="monthlyInstallment"  required="required">
            </div>
        </div>

<br>
        <b>দুইজন ব্যক্তির নাম ও ঠিকানা যাহারা গ্যারান্টি/জামিনদার হইতে সম্মত হইয়াছেনঃ</b>

        <div class="form-group">
            <label class="control-label col-sm-2" for="firstPersonName">প্রথম জামিনদারের নাম</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="firstPersonName" name="firstPersonName"  required="required">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="firstPersonFatherName">পিতা/স্বামীর নাম</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="firstPersonFatherName" name="firstPersonFatherName"  required="required">
            </div>
        </div>

        <div class="form-group">

            <label class="control-label col-sm-2" for="firstPersonPresent">বর্তমান ঠিকানা</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="firstPersonPresent" name="firstPersonPresent"  required="required">
            </div>

            <label class="control-label col-sm-2" for="firstPersonPresentPhone">টেলিফোন নং</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="firstPersonPresentPhone" name="firstPersonPresentPhone"  required="required">
            </div>
        </div>

        <div class="form-group">

            <label class="control-label col-sm-2" for="firstPersonJob">কর্মস্থলের ঠিকানা</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="firstPersonJob" name="firstPersonJob"  required="required">
            </div>

            <label class="control-label col-sm-2" for="firstPersonJobPhone">টেলিফোন নং</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="firstPersonJobPhone" name="firstPersonJobPhone"  required="required">
            </div>
        </div>

        <br>

        <div class="form-group">
            <label class="control-label col-sm-2" for="secondPersonName">দ্বিতীয় জামিনদারের নাম</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="secondPersonName" name="secondPersonName"  required="required">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="secondPersonFatherName">পিতা/স্বামীর নাম</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="secondPersonFatherName" name="secondPersonFatherName"  required="required">
            </div>
        </div>

        <div class="form-group">

            <label class="control-label col-sm-2" for="secondPersonPresent">বর্তমান ঠিকানা</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="secondPersonPresent" name="secondPersonPresent"  required="required">
            </div>

            <label class="control-label col-sm-2" for="secondPersonPresentPhone">টেলিফোন নং</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="secondPersonPresentPhone" name="secondPersonPresentPhone"  required="required">
            </div>
        </div>

        <div class="form-group">

            <label class="control-label col-sm-2" for="secondPersonJob">কর্মস্থলের ঠিকানা</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="secondPersonJob" name="secondPersonJob"  required="required">
            </div>

            <label class="control-label col-sm-2" for="secondPersonJobPhone">টেলিফোন নং</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="secondPersonJobPhone" name="secondPersonJobPhone"  required="required">
            </div>
        </div>
<br>
        <div class="col-sm-offset-2 col-sm-12">
            <button type="submit" name="submit" class="btn btn-lg btn-primary" style=" width: 20%; margin-top: 1%; margin-left: 20.3%;font-weight:bold;">আবেদন</button>
        </div>

        </form>

        @if($success==2)
            <br>
            <label id="successLabel" style="margin-left: 26%">{{$msg}}</label>
        @endif

        @if($success==1)
            <label id="failedLabel" style="margin-left: 34%">{{$msg}}</label>
        @endif

    </fieldset>

    {!! Form::open(['method'=>'POST','action'=>'CustomersController@details_result','class'=>'form-horizontal']) !!}

    @if($detail!=0)
        <input type="hidden" name="detail_id" id="detail_id" value="{{$detail->id}}">
    @endif

    <div class="col-sm-offset-2 col-sm-12">
        <button type="submit" name="submit" class="btn btn-lg btn-primary" style=" width: 20%; margin-top: 1%; margin-left: 20.3%;font-weight:bold;">প্রিন্ট ফর্ম</button>
    </div>
    </form>
    <br>
    @endsection

@section('footer')

@endsection
