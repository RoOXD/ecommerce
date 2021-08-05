<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

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
        return redirect('/');
    }

    function show()
    {
        $data = Product::all();
        return view('index', ['products' => $data]);
    }

    public function getProduct($id)
    {
        $product = Product::find($id);
        return view('detail', ['product' => $product]);
    }
}
