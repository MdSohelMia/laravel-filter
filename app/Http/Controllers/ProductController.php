<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products=Product::with('category')->orderByDesc('id')->take('5')->get();

        return view('products.index',compact('products'));
    }
}
