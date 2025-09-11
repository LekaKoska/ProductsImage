<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function create(ProductRequest $request)
    {


     Products::create($request->validated());

        Cache::forget('allProducts');

        return redirect()->route('home');
    }

    public function flush()
    {
        Cache::forget('allProducts');
        return redirect()->route('home');
    }

    public function permalink(Products $id): View
    {
        Cache::put('permalinkProduct', $id);

        return view('permalink', ['permalink' => $id]);

    }
}
