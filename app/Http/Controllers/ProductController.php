<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

class ProductController extends Controller
{
    public function store()
    {
        $params = request()->validate([
            'name' => 'required|max:255|unique:products',
            'description' => 'required',
            'price' => 'required|numeric|gt:0'
        ]);

        Product::create($params);
        return redirect('/')->with('success', 'Produsul a fost adaugat cu succes!');
    }

    public function show()
    {
        $data = Product::all();
        return view('index', ['products' => $data]);
    }

    public function getProduct($id)
    {
        $product = Product::find($id);
        return view('detail', ['product' => $product]);
    }

    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        return Redirect::back()->with('message', 'Adaugat!');
    }

    public function getRemoveFromCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->remove($product, $product->id);
        $request->session()->put('cart', $cart);
        return Redirect::back()->with('message', 'Sters!');
    }

    public function getRemoveAllFromCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeAll($product, $product->id);
        $request->session()->put('cart', $cart);
        return Redirect::back()->with('message', 'Sters!');
    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQty' => $cart->totalQty]);
    }

    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return view('shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('checkout', ['total' => $total]);
    }

    public function postCheckout(Request $request)
    {
        if (!Session::has('cart')) {
            return redirect('/');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $order = new Order();
        $order->name = $request->input('name');
        $order->cart = serialize($cart);
        $order->address = $request->input('address');

        $params = $order->toArray();

        Order::create($params);

        Session::forget('cart');

        return redirect('/')->with('success', 'Comanda plasata cu succes!');
    }
}
