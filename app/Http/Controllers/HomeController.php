<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Seting;
use App\Models\Product;
use Illuminate\Support\Str;
use DB;
use DateTime;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $date = Carbon::now();
        //$categorys = Category::where('active',1)->get();
        $categorys =DB::table('categories')->where('active',1)->get();
        //dd($categorys);
        $seting=Seting::orderBy('id','DESC')->first();
        $banners=DB::table('banners')->where('active',1)->orderBy('id','DESC')->first();
        $allproducts= Product::where('bidding_end_date', '>=', $date)->where('active',1)->orderBy('id','DESC')->limit(3)->get();   
        $newproducts= Product::where('bidding_end_date', '>=', $date)->where('active',1)->where('new',1)->orderBy('id','DESC')->get(); 
        $featuredproducts= Product::where('bidding_end_date', '>=', $date)->where('active',1)->where('featured',1)->orderBy('id','DESC')->get(); 
        //dd($categorys);
        return view('frontend.index',compact('seting','banners','allproducts','newproducts','featuredproducts','categorys'));
    }

    public function index()
    {
        $date = Carbon::now();
        $seting=Seting::orderBy('id','DESC')->first();
        $categorys =DB::table('categories')->where('active',1)->get();
        $banners=DB::table('banners')->where('active',1)->orderBy('id','DESC')->first();
        $allproducts= Product::where('bidding_end_date', '>=', $date)->where('active',1)->orderBy('id','DESC')->get();   
        $newproducts= Product::where('bidding_end_date', '>=', $date)->where('active',1)->where('new',1)->orderBy('id','DESC')->get(); 
        $featuredproducts= Product::where('bidding_end_date', '>=', $date)->where('active',1)->where('featured',1)->orderBy('id','DESC')->get(); 
        return view('frontend.index',compact('seting','banners','allproducts','newproducts','featuredproducts','categorys'));
    }
}
