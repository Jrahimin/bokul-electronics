@extends('layouts.app2')
@section('header')

@endsection
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        table{
            font-family: arial, sans-serif;
            font-size: 16px;
            border-collapse: collapse;
            width: 90%;
            height: auto;
            margin: 2% auto;
            table-layout:fixed;
            word-wrap: break-word;
        }
        table td, th{
            border: none;
            text-align: center;
            vertical-align: middle;
            padding: 1%;
        }
        table th{
            background-color: goldenrod;
            color: whitesmoke;
        }
        tr:nth-child(even) {
            background-color: honeydew;
        }
        .container{
            margin: 0;
            padding: 0;
        }
    </style>

@section('content')

    <?php
    $count = 0;
    ?>
    <div class="search">
        <fieldset>
            <legend class="heading">Search Result </legend>

            <table>
                <thead>
                <tr>
                    <th style="text-align: center">Serial No</th>
                    <th style="text-align: center">Category</th>
                    <th style="text-align: center">Product</th>
                    <th style="text-align: center">Quantity</th>
                    @if($userType=="Admin")
                    <th style="text-align: center">Unit Price</th>
                    @endif
                    <th style="text-align: center">Stock Date</th>
                    <th style="text-align: center">Stocked By</th>
                </tr>
                </thead>
                <tbody>
                @foreach($stocks as $stock)
                    <?php
                    $count++;
                    ?>
                    <tr>
                        <td>{{$count}}</td>
                        <td>{{$stock->item->category->name}}</td>
                        <td>{{$stock->item->company}} {{$stock->item->title}} {{$stock->item->model}}</td>
                        <td>{{$stock->numberOfItems-$stock->sold}}</td>
                        @if($userType=="Admin")
                        <td>{{$stock->price}}/-</td>
                        @endif
                        <td>{{$stock->date}}</td>
                        <td>{{$stock->user->name}}</td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </fieldset>
    </div>
@endsection