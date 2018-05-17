<!DOCTYPE html>
<html>
<head>
    <title>Installment Due Report</title>

    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 210mm;
            min-height: 286mm;
        }
        .text0{
            position: absolute;
            margin-left: 160px;
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
            margin-left: 320px;
        }
        .sing_pro h5{
            margin-left: 380px;
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
        .headingLine{
            font-size: 18px;
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
            color: darkred;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="head">
        <img src="{{asset('logo.png')}}"style=" width: 120px; height: 120px; position: relative; margin-left: 30px;"/>
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
        <p class="headingLine">Due Installments</p>
        <div class="sells">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Product</th>
                        <th>Sale Date</th>
                        <th>Last Payment Date</th>
                        <th>Installment Amount Due</th>
                        <th>Sold By</th>
                        <?php
                        $sell_date=" ";
                        $sold_by=" ";
                        ?>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($installments as $installment)
                        <?php
                            $install_pays = $installment->installment_payments;
                            $install_payDate = "No payment yet"
                        ?>
                            @foreach($install_pays as $install_pay)
                                <?php
                                    $install_payDate = $install_pay->date;
                                ?>
                            @endforeach

                        <tr>
                            <td>{{$installment->customer->name}}</td>
                            <td>{{$installment->customer->phone}}</td>
                            <td>{{$installment->customer->address}}</td>
                            <td>
                                @foreach($installment->sells as $sell )
                                    {{$sell->item->title}} @if($sell->serial_no!=null)({{$sell->serial_no}})@endif
                                @endforeach
                            </td>
                                <?php
                                    $sell_date=$sell->date;
                                    $sold_by=$sell->user->name;
                                ?>

                            <td>{{$sell_date}}</td>
                            <td>{{$install_payDate}}</td>
                            <td>{{$installment->amount}}</td>
                            <td>{{$sold_by}}</td>
                       </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    <br>
    <button type="submit" name="pdf" id="pdf" onclick="prints();" style="margin-left: 678px;">Create Pdf</button>

    <br>

</div>

<div class="footer">
    <h5>&copy; Developed by <span style="color: darkgreen">BanglaSoftTech</span></h5>
</div>

</body>

<script type="text/javascript">
    function prints() {
        document.getElementById("pdf").style.display="none";
        window.print();
    }
</script>

