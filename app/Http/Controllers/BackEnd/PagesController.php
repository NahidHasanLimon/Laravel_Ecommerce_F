<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Image;
use Auth;
use App\Productimage;

class PagesController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }
  public function index()
  {
   return view('BackEnd.pages.index');
  }


}
