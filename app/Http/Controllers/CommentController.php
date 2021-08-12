<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Product $prod)
    {
        //validation
        request()->validate([
            'body' => 'required'
        ]);

        $prod->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);
        return back();
    }
}
