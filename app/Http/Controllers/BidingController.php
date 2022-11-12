<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Biding;
use Illuminate\Support\Str;
use DB;
use DateTime;
use Auth;
class BidingController extends Controller
{
    public function allbid(){
        $allbids=DB::table('products')->get(); 
        //dd($allbids);
        return view('backend.superadmin.bid.bid',compact('allbids')); 
    }

    public function Delevered(Request $request, $id){
        $Biding = Biding::find($id);
        $Biding->winner_status = 1;
        $done = $Biding->save();

        if ($done) {
            $notification = array(
                'message' => 'Winner Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Winner Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function ViewBid($id){
        $allbids =DB::table('bidings')
        ->join('products','bidings.product_id','products.id')
        ->join('users','bidings.user_id','users.id')
        ->select('bidings.*','products.product_name','products.regular_price',
        'products.starting_bidding_amount','products.bidding_end_date','users.name')
        ->where('product_id',$id)
        ->get();
        $count_winter =DB::table('bidings')
        ->join('products','bidings.product_id','products.id')
        ->join('users','bidings.user_id','users.id')
        ->select('bidings.*','products.product_name','products.regular_price',
        'products.starting_bidding_amount','products.bidding_end_date','users.name')
        ->where('product_id',$id)
        ->where('winner_status',1)
        ->count();
        return view('backend.superadmin.bid.viewbid',compact('allbids','count_winter')); 
       
    }
    public function DeleteBid($id){
        $product = Product::find($id);
        $product->status = '';
        $product->user_id = '';
        $product->bidding_amount = 0;
        $done = $product->save();
        if ($done) {
            $notification = array(
                'message' => 'Bid Delete Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Bid Delete Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }
    }
}
