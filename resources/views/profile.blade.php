@extends('layouts.master')
@section('content')
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

        .badge {
            display: inline-block;
            padding: .35em .65em;
            font-size: .75em;
            font-weight: 700;
            line-height: 1;
            color: white;
            background: #3c3cff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
        }
    </style>
    <x-nav-component></x-nav-component>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>
                Contul meu.
            </h1>

        </div>
    </div>
@endsection
