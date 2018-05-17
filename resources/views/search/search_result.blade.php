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
            margin: 8mm auto;
            width: 220mm;
            min-height: 867px;
        }
        .text1{
            font-size: 0.9em;
            margin-top: -70px;
        }
        .text2{
            font-size: 0.9em;
            margin-left: 84px;
        }
        .text3{
            font-size: 0.85em;

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
        <img src="{{asset('logo.png')}}"style=" width: 120px; height: 120px; position: relative; margin-left: 30px;"/>
        <p class="text0" style="margin-top: -100px;"><span style="color: darkred; font-size: 22px;">Bokul Electronics</span><br>College Market, Ranisonkail, Thakurgaon</p>
        <div class="sing_pro" style="margin-top: -50px;">
            <h4>SINGER <span style="color: blue;">Pro</span></h4>
            <h5>Exclusive dealer</h5>
        </div>
    </div>

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
                <th>Category</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Unit Stock Price</th>
                <th>Unit Sale Price</th>
                <th>Amount</th>
                <th>Sale Date</th>
                <th>Sold By</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count = 0;
            $amountSum = 0;
            $stockSum = 0;
            $totalProfit = 0;
            ?>

            @foreach($newSells as $sell)
                <?php
                $count++;
                $amount = $sell->no_item*$sell->sell_price;
                $amountSum = $amountSum+$amount;
                $stockSum = $stockSum + $sell->stock->price*$sell->no_item;

                $profit = $sell->sell_price - $sell->stock->price;
                $profit = $profit*$sell->no_item;
                $totalProfit = $totalProfit + $profit;
                ?>
                <tr>
                    <td>{{$count}}</td>
                    <td>{{$sell->item->category->name}}</td>
                    <td>{{$sell->item->title}} {{$sell->item->model}}<br> @if($sell->serial_no!=null)({{$sell->serial_no}})@endif
                    <td>{{$sell->no_item}}</td>
                    <td>{{$sell->stock->price}}</td>
                    <td>{{$sell->sell_price}}/-</td>
                    <td>{{$amount}}/-</td>
                    <td>{{$sell->date}}</td>
                    <td>{{$sell->user->name}}</td>
                </tr>
            @endforeach
            </tbody>

        </table>
        <hr>
        <div class="total" style="margin-left: 100px;">
            <table style="width: 340px;">
                <thead>
                <tr>
                    <td><b>Total Stock</b></td>
                    <td><b>Total Sale</b></td>
                    <td><b>Total Profit/Loss</b></td>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>{{$stockSum}}/-</td>
                    <td>{{$amountSum}}/-</td>
                    <td>{{$amountSum - $stockSum}}/-</td>
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