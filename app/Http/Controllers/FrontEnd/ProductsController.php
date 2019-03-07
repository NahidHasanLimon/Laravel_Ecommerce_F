<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;

class ProductsController extends Controller
{
  public function index()
  {
    $products=Product::orderBy('id','desc')->paginate(12);
    return view('FrontEnd.pages.product.index')->with('products',$products);
  }
  public function show($slug)
  {

    $product=Product::where('slug',$slug)->first();
    if (!is_null($product)) {
      return view('FrontEnd.pages.product.show',compact('product'));
    }
    else {
    session()->flash('errors','Sorry!! This Product Unavailable');
      return redirect()->route('products');
    }
  }
}
