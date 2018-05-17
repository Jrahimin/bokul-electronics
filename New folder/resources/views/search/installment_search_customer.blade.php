<!DOCTYPE html>
<html>
<head>
    <title>Report</title>

    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 210mm;
            min-height: 875px;
        }
        .text0{
            position: absolute;
            margin-left: 20px;
            margin-top: -78px;
            font-weight: bold;
            font-family: "Century Gothic";
            font-size: 14px;
            color: black;
            float: left;
        }
        .footer{
            background-color: burlywood;
            height: 40px;
            width: 210mm;
            text-align: center;
            line-height: 40px;
        }
        .sing_pro h4{
            color: red;
            margin-left: 150px;
        }
        .sing_pro h5{
            margin-left: 210px;
            margin-top: -5px;
        }
        .memo_body table{
            font-family: arial, sans-serif;
            font-size: 16px;
            border-collapse: collapse;
            width: 700px;
            margin: 0 auto;
            table-layout:fixed;
            word-wrap: break-word;
        }
        td, th {
            border: none;
            text-align: center;
            vertical-align: middle;
            padding: 8px;
        }
        th{
            background-color: goldenrod;
            color: whitesmoke;
        }
        tr:nth-child(even) {
            background-color: honeydew;
        }
        .head{
            background-color: burlywood;
            height: 120px;
        }
        .memo_body{
            margin: 50px auto 0;
            width: 750px;
        }
        .text1{
            font-size: 13px;
            margin-top: -70px;
        }
        .text2{
            font-size: 13px;
            margin-left: 76px;
        }
        .text3{
            font-size: 12px;
        }
        .total p{
            font-size: 15px;
        }
        #watermark{
            position: absolute;
            margin-top: 50px;
            margin-left: 50px;
            opacity: 0.1;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="head">
        <img src="{{asset('logo.png')}}" style=" width: 120px; height: 120px; position: relative; margin-left: 350px;"/>
        <p class="text0" style="margin-top: -100px;"><span style="color: darkred; font-size: 22px;">Bokul Electronics</span><br>College Market, Ranisonkail, Thakurgaon</p>
        <div class="sing_pro" style="margin-top: -50px;">
            <h4>SINGER <span style="color: blue;">Pro</span></h4>
            <h5>Exclusive dealer</h5>
        </div>
    </div>
    <?php
    $custCount = 0;
    $count = 0;
    ?>
    <div class="memo_upper" style="margin-left: 610px;">
        <p class="text1">Contact No: 01723087831</p>
        <p class="text2">01911001211</p>
        <p class="text3">email: mrbokul@gmail.com</p>
    </div>

    <div class="memo_body">
    <div class="customerInfo">
        <fieldset style="padding: 6px;">
        <legend><b>Customer Info</b></legend>
        <label><b>Customer Name:</b> {{$customer->name}}</label><br/>
        <label><b>Contact No:</b> {{$customer->phone}}</label><br/>
        <label><b>Address:</b> {{$customer->address}}</label><br/>
        </fieldset>
    </div>
<br>
    @foreach($customer->installments as $installment)
        <?php
        $sells = $installment->sells;
        $ifAnyInstallPay = $installment->installment_payments;
        ?>
        <label><b>Product:</b> @foreach($sells as $sell) {{$sell->item->company}} {{$sell->item->title}} {{$sell->item->model}} @endforeach </label><br/>
            <label><b>Sell Date:</b> {{$installment->date}}</label>
            <label><b>Installment Amount Due:</b> {{$installment->amount}}</label>
        <br><br>

        <table>
            <thead>
            <tr>
                <th>Installment Info</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($installment->installment_payments as $install_pay)
                <tr>
                    <td>{{$install_pay->w_month}} Installment, paid: {{$install_pay->amount}}/-</td>
                    <td>{{$install_pay->date}}</td>
                </tr>
            @endforeach
            @if(!$installment->installment_payments->first())
                <tr>
                    <td>No Installment Paid yet</td>
                </tr>
            @endif
            </tbody>

        </table>

        <br><hr><br><br>

    @endforeach
</div>
</div>
    <button type="submit" name="pdf" id="pdf" onclick="prints();" style="margin-left: 678px;">Create Pdf</button>
    <br><br>

<div class="footer">
    <h5>&copy; Developed by skyhigh.com</h5>
</div>

</body>

<script type="text/javascript">
    function prints() {
        document.getElementById("pdf").style.display="none";
        window.print();
    }
</script>