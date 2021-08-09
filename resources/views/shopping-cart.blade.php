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
    @if(Session::has('cart') and $totalQty!=0)
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach($products as $product)
                        @if($product['qty']>0)
                            <li class="list-group-item">
                                <strong>{{$product['item']['name']}}</strong>

                                <a type="button" class="btn btn-info"
                                   href="{{route('product.addToCart',['id'=>$product['item']['id']])}}">+
                                </a>

                                <span class="badge-pill">{{$product['qty']}} x buc</span>

                                <a type="button" class="btn btn-info" name="dec-btn"
                                   href="{{route('product.removeFromCart',['id'=>$product['item']['id']])}}">-
                                </a>

                                <span class="label label-success">{{$product['price']}} RON</span>

                                <a type="button" class="btn btn-info" name="del-btn"
                                        href="{{route('product.removeAllFromCart',['id'=>$product['item']['id']])}}">Sterge
                                </a>

                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total: {{$totalPrice}} RON</strong>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total produse: {{$totalQty}} Buc</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">

{{--                <a type="button" class="btn btn-success" href="{{route('checkout')}}">Checkout</a>--}}

            </div>
        </div>
    @elseif(!Session::has('cart') or $totalQty==0)
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>Nu exista produse in cos!</h2>
            </div>
        </div>
    @endif
@endsection
