<!DOCTYPE html>
<html>
<head>
<title>Memo</title>

    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .container{
            height: 297mm;
            width: 210mm;
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
            margin: 79px auto 0;
            width: 750px;
            height: 777px;
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
        .customerInfo{
            float: left;
            margin-left: 50px;
            margin-top: 50px;
            font-family: Helvetica;
        }
        .total p{
            font-size: 14px;
        }
        #watermark{
            position: absolute;
            margin-top: 50px;
            margin-left: 50px;
            opacity: 0.1;
        }
        .bangla{
            margin-bottom: 20px;
            text-align: center;
            font-family: "Lipi Ekushey";
            font-weight: bold;
            color: navy;
        }
    </style>
</head>

<body>

    <div class="container" style="margin: 0; padding: 0;">
        <div class="head">
            <img src="{{asset('logo.jpg')}}"style=" width: 120px; height: 120px; position: relative; margin-left: 350px;"/>
            <p class="text0" style="margin-top: -100px;"><span style="color: darkred; font-size: 22px;">Bokul Electronics</span><br>College Market, Ranisonkail, Thakurgaon</p>
            <div class="sing_pro" style="margin-top: -50px;">
                <h4>SINGER <span style="color: blue;">Pro</span></h4>
                <h5>Exclusive dealer</h5>
            </div>
        </div>
        <?php
        $amountSum = 0.0;
        $count = 0;
        ?>
        <div class="memo_upper" style="margin-left: 610px;">
            <p class="text1">Contact No: 01723087831</p>
            <p class="text2">01911001211</p>
            <p class="text3">email: mrbokul@gmail.com</p>
        </div>

        <div class="customerInfo">
            <table>
                <tr>
                        <label><b>Customer Name:</b> {{$customer->name}}</label><br/><br/>
                </tr>

                <tr>
                        <label><b>Payment Type:</b> {{$sells->first()->sell_type}}</label><br/><br/>
                </tr>

                <tr>
                        <label><b>Contact No:</b> {{$customer->phone}}</label><br/><br/>
                </tr>
            </table>
        </div>
        <div class="date" style="margin-top: 20px; margin-left: 610px;">
            <label style="font-weight: bold">Date: {{\Carbon\Carbon::today()->setTimezone('Asia/Dacca')->toDateString()}}</label>
        </div>
        <div class="memo_body">
            <div id="watermark">
                <img src="{{asset('logo.jpg')}}" style="width: 600px; height: 600px;"/>
            </div>

            <table>
                <thead>
                <tr>
                    <th>Serial No</th>
                    <th style="width:200px;">Product</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Amount</th>
                    <th>Remarks</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sells as $sell)
                    <?php
                    $count++;
                    $amount = $sell->no_item*$sell->sell_price;
                    $amountSum = $amountSum+$amount;
                    ?>
                    <tr>
                        <td>{{$count}}</td>
                        <td style="width: 200px;">{{$sell->item->company}} {{$sell->item->title}} {{$sell->item->model}}</td>
                        <td>{{$sell->no_item}}</td>
                        <td>{{$sell->sell_price}}</td>
                        <td>{{$amount}}/-</td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            <br>
            <hr>
        <div class="total" style="margin-left: 470px;">
            @if($submit==0)
            <p><b>Sub Total:</b> {{$amountSum}}/-</p>
            <p><b>Vat:</b></p>
            <p><b>Total:</b></p>
            <p><b>Paid:</b> {{$paid}}</p>
                <p><b>Due:</b> {{$amountSum-$paid}}</p>
            <p><b>Sold by:</b> {{$sells->first()->user->name}}</p>
            @endif

            @if($submit==1)
                <?php
                    $perInstallment = $installment->amount/$installment->no_of_inst;
                    $perInstallment = number_format((float)$perInstallment, 2, '.', '');
                ?>
                    <p><b>Sub Total:</b> {{$amountSum}}/-</p>
                    <p><b>Vat:</b></p>
                    <p><b>Total:</b></p>
                    <p><b>Down Payment:</b> {{$amountSum-$installment->amount}}/-</p>
                    <p><b>Due:</b> {{$installment->amount}}/-</p>
                    <p><b>No Of Installments:</b> {{$installment->no_of_inst}}</p>
                    <p><b>Per Installment:</b> {{$perInstallment}}/-</p>
                    <p><b>Sold by:</b> {{$sells->first()->user->name}}</p>
            @endif

                @if($submit==2)
                    <?php
                    $perInstallment = $installment->amount/($installment->no_of_inst - $installment->inst_paid);
                    $perInstallment = number_format((float)$perInstallment, 2, '.', '');
                    ?>
                    <p><b>Sub Total:</b> {{$amountSum}}/-</p>
                    <p><b>Vat:</b></p>
                    <p><b>Total:</b></p>
                    <p><b>Interest Payment:</b> {{$install_pay->amount}}/-</p>
                    <p><b>Due:</b> {{$installment->amount}}/-</p>
                    <p><b>Installment No:</b> {{$installment->inst_paid}}</p>
                    <p><b>Per Installment:</b> {{$perInstallment}}/-</p>
                    <p><b>Sold by:</b> {{$sells->first()->user->name}}</p>
                @endif

        </div>
            <hr>
            <button type="submit" name="pdf" id="pdf" onclick="prints();" style="margin-left: 630px;">Create Pdf</button>
            </div>

        <div class="bangla"">
            <p>ধন্যবাদ আবার আসবেন। বিক্রয়কৃত মাল ফেরত হয়না।</p>
            <p>এখানে সব ধরনের ইলেকট্রিক ও ইলেকট্রনিক্স পণ্য  খুচরা ও পাইকারি বিক্রয় করা হয়</p>
        </div>

        <div class="footer">
            <h5>&copy; Developed by <span style="color: darkgreen">BanglaSoftTech</span></h5>
        </div>

    </div>
</body>

<script type="text/javascript">
    function prints() {
        document.getElementById("pdf").style.display="none";
        window.print();
    }
</script>