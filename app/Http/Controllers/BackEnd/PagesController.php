<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Image;
use App\Productimage;

class PagesController extends Controller
{
  public function index()
  {
   return view('BackEnd.pages.index');
  }


}
