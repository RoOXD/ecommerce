@extends('layouts.master')
@section('title')
    Checkout
@endsection

<style>

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

</style>
@section('content')

    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
            <h1>Finalizati comanda!</h1>
            <form action="{{route('checkout')}}" method="post" id="checkout-form">
                @csrf
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="name">Nume</label>
                            <input type="text" id="name" class="form-control" required name="name">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="address">Adresa</label>
                            <input type="text" id="address" class="form-control" required name="address">
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="card-name">Nume detinator card</label>
                                <input type="text" id="card-name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="card-number">Numar card</label>
                                {{--                                <input type="text" id="card-number" class="form-control" required>--}}
                                <input id="card-number" type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}"
                                       autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx"
                                       class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="exp-date">Data expirarii</label>
                                {{--                                <input type="text" id="exp-date" class="form-control" required>--}}
                                <input type="text" name="month" placeholder="MM" maxlength="2" size="2"
                                       class="form-control" required/>
                                <span>/</span>
                                <input type="text" name="year" placeholder="YY" maxlength="2" size="2"
                                       class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="cvc">CVC</label>
                                <input type="text" id="cvc" class="form-control" required placeholder="YYY"
                                       maxlength="3" size="3">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div>
                    <h5>Total de plata: {{$total}} RON</h5>
                </div>
                <hr>
                <button type="submit" class="btn btn-success">Comanda</button>
            </form>
        </div>
    </div>
@endsection
