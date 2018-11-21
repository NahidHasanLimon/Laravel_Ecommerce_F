<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductsController extends Controller
{
  public function index()
  {
    $products=Product::orderBy('id','desc')->get();
    return view('FrontEnd.pages.product.index')->with('products',$products);
  }
  public function show($slug)
  {
    // $products=Product::orderBy('id','desc')->get();
    // return view('pages.product.index')->with('products',$products);
  }
}
