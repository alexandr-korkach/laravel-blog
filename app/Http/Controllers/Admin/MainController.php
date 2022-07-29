<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainBanner;
use Illuminate\Http\Request;

class MainController extends Controller
{
   public function index(){

       $bannerItems = MainBanner::getItems();
       return view('admin.index', compact('bannerItems'));
   }
}
