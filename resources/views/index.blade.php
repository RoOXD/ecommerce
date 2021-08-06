<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
      integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
            font-family: Calibri;
        }

        .column {
            float: left;
            width: 25%;
            padding: 5px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .alert {
            position: fixed;
            bottom: 0;
            right: 5px;
            background: #3c3cff;
            color: white;
            border-radius: 25px;
        }

        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            padding-bottom: 20px;
        }

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
</head>
<body>

<x-nav-component></x-nav-component>

<h2>Pagina Produse</h2>

@if(session()->has('success'))
    <div x-data="{show:true}"
         x-init="setTimeout(()=>show=false,4000)"
         x-show="show"
         class="alert">
        <p>{{session('success')}}</p>
    </div>
@endif
<div class="row">
    @foreach($products as $product)
        <div class="column" style="background-color:lightgray; margin: 5px; border-radius: 25px;">
            <h2 align="center"><a href="\detail\{{$product->id}}">{{$product->name}}</a></h2>
            <img src="https://nayemdevs.com/wp-content/uploads/2020/03/default-product-image.png" width="150"
                 height="150">
            <p align="center">{{$product->price}} RON</p>
            <div class="center">
                <a href="{{route('product.addToCart',['id'=>$product->id])}}">
                    <button class="btn btn-primary">Adauga in cos</button>
                </a>
            </div>
        </div>

    @endforeach
</div>

</body>
</html>
