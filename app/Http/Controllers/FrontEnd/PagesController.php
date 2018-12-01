<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;


class PagesController extends Controller
{
  public function index()
  {
    $products=Product::orderBy('id','desc')->paginate(6);
    return view('FrontEnd.pages.index',compact('products'));
  }

  public function contact()
  {
    return view('FrontEnd.pages.contact');
  }
  //Search
  public function search(Request $request)
  {
    $search=$request->search;
    $products=Product::orWhere('title','like','%'.$search.'%')
    ->orWhere('desscription','like','%'.$search.'%')
    ->orWhere('price','like','%'.$search.'%')
    ->orWhere('quantity','like','%'.$search.'%')
    ->orWhere('slug','like','%'.$search.'%')
    ->paginate(6);
    return view('FrontEnd.pages.product.search',compact('search','products'));
  }

}
