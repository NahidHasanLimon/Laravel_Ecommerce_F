<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;


class PagesController extends Controller
{
  public function index()
  {
    $products=Product::orderBy('id','desc')->paginate(2);
    return view('FrontEnd.pages.index',compact('products'));
  }

  public function contact()
  {
    return view('FrontEnd.pages.contact');
  }

}
