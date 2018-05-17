<?php
    $userType = \Illuminate\Support\Facades\Auth::user()->type;
?>
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
            min-height: 867px;
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

<div class="container" style="margin: 0; padding: 0;">
    <div class="head">
        <img src="{{asset('logo.jpg')}}"style=" width: 120px; height: 120px; position: relative; margin-left: 350px;"/>
        <p class="text0" style="margin-top: -100px;"><span style="color: darkred; font-size: 22px;">Bokul Electronics</span><br>College Market, Ranisonkail, Thakurgaon</p>
        <div class="sing_pro" style="margin-top: -50px;">
            <h4>SINGER Pro</h4>
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

    <div class="memo_body">
        <div id="watermark">
            <img src="{{asset('logo.jpg')}}" style="width: 600px; height: 600px;"/>
        </div>

        <table>
            <thead>
            <tr>
                <th>Serial No</th>
                <th>Payment Due</th>
                <th>Installment Pay</th>
                <th>Product</th>
                <th>Sell Price </th>
                @if($userType=="Admin")
                <th>Stock Price </th>
                @endif
                <th>Sale Date</th>




            </tr>
            </thead>
            <tbody>
            <?php
            $totalProfit = 0;
            $totalSellPrice=0;
            $totalStockPrice=0;
            $totalInstallmentPay=0;
            $totalInstalmentDue=0;

            ?>
            @foreach($installments as $installment)
              <?php
              $count++ ;
              $installmentPay=0;
              $inst_payments = $installment->installment_payments;
              ?>
              @foreach($inst_payments as $inst_payment)
                  <?php
                  $installmentPay = $installmentPay + $inst_payment->amount;
                  ?>
              @endforeach
              <?php
              $totalInstallmentPay = $totalInstallmentPay+$installmentPay;
              $totalInstalmentDue=$totalInstalmentDue+$installment->amount;
              $sellPrice=0;
              $stockPrice=0;
              $sellDate=" ";
              ?>
                <tr>
                    <td>{{$count}} </td>
                    <td>{{$installment->amount}}</td>
                    <td>{{$installmentPay}}</td>


                            <td>

                                @foreach($newSells as $sell)
                                    @if($sell->instal_id==$installment->id)

                                                <?php

                                                $sellPrice=$sellPrice+$sell->sell_price;
                                                $stockPrice=$stockPrice+$sell->stock->price;
                                                $sellDate=$sell->date;

                                                $totalStockPrice=$totalStockPrice+$sell->stock->price;
                                                $totalSellPrice=$totalSellPrice+$sell->sell_price;
                                                ?>


                                        {{$sell->item->title}},


                                                @endif

                                   @endforeach

                            </td>

                    <td>{{$sellPrice}}</td>
                    @if($userType=="Admin")
                    <td>{{$stockPrice}}</td>
                    @endif
                    <td>{{$sellDate}}</td>

                    </tr>
               @endforeach

            <?php
            $totalProfit=$totalSellPrice-$totalStockPrice;
            ?>

        </table>
        <hr>
        <div class="total">
            <table>
                <thead>
                <tr>
                    <td></td>
                    <td><b>Total Due</b></td>
                    <td><b>Total Paid</b></td>
                    <td></td>
                    <td><b>Total Sell</b></td>
                    <td><b>Total Stock</b></td>
                    <td><b>Total Profit/Loss</b></td>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td></td>
                    <td>{{$totalInstalmentDue}}/-</td>
                    <td>{{$totalInstallmentPay}}/-</td>
                    <td></td>
                    <td>{{$totalSellPrice}}/-</td>
                    <td>{{$totalStockPrice}}/-</td>
                    <td>{{$totalProfit}}/-</td>
                </tr>
                </tbody>
            </table>

        </div>
        <hr>
        <button type="submit" name="pdf" id="pdf" onclick="prints();" style="margin-left: 630px;">Create Pdf</button>
    </div>

    <br>
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