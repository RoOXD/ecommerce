@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>
                Pagina de inregistrare.
            </h1>
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('user.signup') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Nume</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Adresa e-mail</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Parola</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary">Inregistrare</button>
            </form>
        </div>
    </div>
@endsection
