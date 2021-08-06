<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
      integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
<style>
    div {
        padding-left: 20px;
    }
</style>
<body>
<div class="container">
    <div class="blog-header">
        <h1 class="blog-title">Adaugare Produs.</h1>
    </div>
</div>

<form method="post">
    @csrf
    <div class="form-group">
        <label>Nume produs
            <input type="text" name="name" required class="form-control" value="{{old('name')}}"
                   placeholder="Numele produsului">
        </label><br>

        @error('name')
        <p style="color:red">{{$message}}</p>
        @enderror

        <label>Descriere
            <textarea name="description" required class="form-control" rows="5"
                      placeholder="Adaugati o descriere produsului">{{old('description')}}</textarea>
        </label><br>

        @error('description')
        <p style="color:red">{{$message}}</p>
        @enderror

        <label>Pret
            <input type="number" step="0.01" name="price" required class="form-control" min="0"
                   value="{{old('price')}}" placeholder="RON">
        </label><br>

        @error('price')
        <p style="color:red">{{$message}}</p>
        @enderror

        <input type="submit" name="submit" value="Adauga" class="btn btn-primary">
    </div>
</form>
</body>
</html>
