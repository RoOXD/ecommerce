@extends('layouts.master')
@section('title')
    Cosul dumneavoastra de cumparaturi
@endsection

<style>
    .topnav {
        overflow: hidden;
        background-color: lightgray;
    }

    .topnav a {
        float: left;
        color: black;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }

    .topnav a:hover {
        background-color: dodgerblue;
        color: white;
    }

    .topnav a.active {
        background-color: dodgerblue;
        color: white;
    }

    .topnav-right {
        float: right;
    }
</style>
@section('content')

    <div class="topnav">
        <a href="/">Continuati cumparaturile</a>
    </div>

    <h1 class="card-title">Cos de cumparaturi</h1>
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item">
                            <strong>{{$product['item']['name']}}</strong>
                            <button type="button" class="btn btn-info" name="inc-btn">+</button>
                            <span class="badge-pill">{{$product['qty']}} x buc</span>
                            <button type="button" class="btn btn-info" name="dec-btn">-</button>
                            <span class="label label-success">{{$product['price']}} RON</span>
                            <button type="button" class="btn btn-info" name="del-btn">Sterge</button>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total: {{$totalPrice}} RON</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <button type="button" class="btn btn-success">Checkout</button>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>Nu exista produse in cos!</h2>
            </div>
        </div>
    @endif
@endsection
