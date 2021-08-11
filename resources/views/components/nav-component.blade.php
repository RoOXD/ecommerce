<style>
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
<div class="topnav">
    <a href="/">Pagina principala</a>
    <div class="topnav-right">

        @if(Auth::check())
            <a href="/user/profile">Contul meu</a>
            <a href="/user/logout">Deconectare</a>
        @else
            <a href="/signup">Inregistrare</a>
            <a href="/signin">Autentificare</a>
        @endif
        <a href="{{route('product.shoppingCart')}}">
            Cos de cumparaturi
            <span class="badge badge-secondary">{{Session::has('cart') ? Session::get('cart')->totalQty:''}}</span>
        </a>
    </div>
</div>
