<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use DB;
use DateTime;
use Auth;
class BidingController extends Controller
{
    public function allbid(){
        $allbids=DB::table('products')
        ->join('users','products.user_id','users.id')
        ->where('products.active',1)
        ->where('products.status',1)
        ->orWhere('products.status',2)
        ->select('products.*','users.name','users.email')
        ->get(); 
        //dd($allbids);
        return view('backend.superadmin.bid.bid',compact('allbids')); 
    }

    public function Delevered(Request $request, $id){
        $product = Product::find($id);
        $product->status = 2;
        $done = $product->save();

        if ($done) {
            $notification = array(
                'message' => 'Bid Complete Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Bid Complete Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }

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
