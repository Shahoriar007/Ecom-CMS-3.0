<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use App\Models\Logo;
use App\Models\Navbar;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Socialmedia;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $navigation = Navbar::all();
        $socialMedia = Socialmedia::all();
        $logo = Logo::get()->last();
        $slider = Slider::all();
        $catagories = Catagory::all();
        $latest = Product::where('latest_product',0)->get();
        $top = Product::where('top_rated',1)->get();
        return view('welcome',compact('navigation', 'socialMedia','logo','slider','latest','top','catagories'));
    }
}
