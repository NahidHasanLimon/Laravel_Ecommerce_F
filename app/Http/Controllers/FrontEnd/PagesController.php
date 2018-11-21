<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;


class PagesController extends Controller
{
  public function index()
  {
    return view('FrontEnd.pages.index');
  }

  public function contact()
  {
    return view('FrontEnd.pages.contact');
  }

}
