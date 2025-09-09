<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Container\Attributes\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    public function product()
    {


//        if(\Illuminate\Support\Facades\Cache::has('allProducts')) // if exists cache allProducts
//        {
//            $products = \Illuminate\Support\Facades\Cache::get('allProducts');  // Give me allProducts
//        }
//        else
//        {
//            $products = Products::latest()->take(9)->get();   //  Take 9 last products
//            \Illuminate\Support\Facades\Cache::put('allProducts', $products, 300);
//        }
                // this is same like if else                               // fn() is same like  return Products::latest()->take(9)->get();
        $products = \Illuminate\Support\Facades\Cache::remember('allProducts', 300, fn() => Products::latest()->take(9)->get());

        return view('welcome',
            [
                'products' => $products
            ]);
    }


}
