<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
      integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
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
    </style>
</head>
<body>

<h2>Pagina Produse</h2>

<div class="row">
    @foreach($products as $product)
        <div class="column" style="background-color:lightgray; margin: 5px; border-radius: 25px;">
            <h2 align="center"><a href="\detail\{{$product->id}}">{{$product->name}}</a></h2>
            <img src="https://nayemdevs.com/wp-content/uploads/2020/03/default-product-image.png" width="150"
                 height="150">
            <p align="center">{{$product->price}} RON</p>
        </div>
    @endforeach
</div>


</body>
</html>
