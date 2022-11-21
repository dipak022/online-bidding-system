<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use DB;
use DateTime;
use Auth;
use App\Models\User;
use App\Models\Biding;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
class IndexController extends Controller
{
    public function AuctionDetails($id)
    {
        $categorys =DB::table('categories')->where('active',1)->get();
        $products=DB::table('products')->where('id',$id)->where('active',1)->first();            
        return view('frontend.auction_details',compact('products','categorys'));
    }

    public function Biding(Request $request, $id){
        date_default_timezone_set('Asia/Dhaka');
        $check_price=Biding::where('product_id',$id)->where('status',1)->max('amount');
        if($check_price < $request->amount ){
            $biding = new Biding(); 
            $biding->user_id = auth()->user()->id;
            $biding->product_id = $id;
            $biding->amount = $request->amount;
            $biding->date_time = date('Y-m-d H:i:s');
            $biding->status = 1;
            $done = $biding->save();
            if ($done) {
                $notification = array(
                    'message' => 'Biding Successfully.',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }else{
                $notification = array(
                    'message' => 'Biding Unuccessfully',
                    'alert-type' => 'danger'
                );
                return redirect()->back()->with($notification);
            }
        }else{
            $notification = array(
                'message' => 'Try again biding, with more amount,Thank you ,now height beding amount :'.$check_price.'Tk',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        

    }


    // public function Biding(Request $request, $id){
    //     $check_price=DB::table('products')->where('id',$id)->where('active',1)->first();
    //     $product = Product::find($id);
    //     if($product){
    //         $product->bidding_amount = $request->bidding_amount;
    //         $product->user_id = auth()->user()->id;
    //         $product->status = 1;
    //         if($check_price->starting_bidding_amount < $request->bidding_amount && $check_price->bidding_amount < $request->bidding_amount){
    //             $done = $product->save();
    //             if ($done) {
    //                 $notification = array(
    //                     'message' => 'Bid Successfully Submited.',
    //                     'alert-type' => 'success'
    //                 );
    //                 return redirect()->back()->with($notification);
    //             }else{
    //                 $notification = array(
    //                     'message' => 'Bid Unuccessfully',
    //                     'alert-type' => 'danger'
    //                 );
    //                 return redirect()->back()->with($notification);
    //             }
    //         }else{
    //             $notification = array(
    //                 'message' => 'Bid Unuccessfully !! Please Try again !! Thank You.',
    //                 'alert-type' => 'error'
    //             );
    //             return redirect()->back()->with($notification);
    //         }
 
    //     }     

    // }

    public function Profile(){
        
        $categorys =DB::table('categories')->where('active',1)->get();
        $allbids=DB::table('products')
        ->join('users','products.user_id','users.id')
        ->where('products.active',1)
        ->where('products.status',1)
        ->orWhere('products.status',2)
        ->select('products.*','users.name','users.email')
        ->get();  
        //dd($allbids);
        return view('user.index',compact('allbids','categorys')); 
      // return view('user.index');
    }

    public function CategoryWiseShow($id){
        $categorys =DB::table('categories')->where('active',1)->get();
        $categoryproducts= Product::where('category_id',$id)
                                    ->where('active',1)
                                    ->get();
                                    $categorys =DB::table('categories')->where('active',1)->get();
        $products=DB::table('products')->where('active',1)->get();            
        return view('frontend.auction',compact('products','categorys'));
        return view('frontend.product',compact('categoryproducts','categorys'));

    }

    public function AccountUpdate(Request $request, $id){
        $check_image= $request->file('image');
        if($check_image){
            $oldImage = $request->oldimage;
            if(file_exists($oldImage)){
                unlink($oldImage);
            }
            $imageName = $request->file('image');
            $image = $imageName->getClientOriginalName();
            $directory = 'images/profile/';
            $imgUrl = $directory.$image;
            $imageName->move($directory,$image);

            $user = User::find($id);
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->role = 3;
            $user->image = $imgUrl;
            $done = $user->save();
        }else{
            $user = User::find($id);
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->role = 3;
            $done = $user->save();
        }
        if ($done) {
            $notification = array(
                'message' => 'Account Update Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Account Update Unuccessfully',    
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }
    }
    
    public function ChangePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
       $done= User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        if ($done) {
            $notification = array(
                'message' => 'Password change successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Password change unsuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function UserBidDelete($id){
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


    public function AuctionShow(){
        $categorys =DB::table('categories')->where('active',1)->get();
        $products=DB::table('products')->where('active',1)->get();            
        return view('frontend.auction',compact('products','categorys'));
    }
    public function AboutUs(){
        $categorys =DB::table('categories')->where('active',1)->get();
        $products=DB::table('products')->where('active',1)->get();            
        return view('frontend.aboutUs',compact('products','categorys'));
    }
    public function Faqs(){
        $categorys =DB::table('categories')->where('active',1)->get();
        $products=DB::table('products')->where('active',1)->get();            
        return view('frontend.faqs',compact('products','categorys'));
    }
    public function Contact(){
        $categorys =DB::table('categories')->where('active',1)->get();
        $products=DB::table('products')->where('active',1)->get();            
        return view('frontend.contact',compact('products','categorys'));
    }
    public function Mybid(){
        $bids =DB::table('bidings')
        ->join('products','bidings.product_id','products.id')
        ->select('bidings.*','products.product_name')
        ->where('bidings.user_id',auth()->user()->id)
        ->where('bidings.status',1)
        ->get();
        $categorys =DB::table('categories')->where('active',1)->get();
        $products=DB::table('products')->where('active',1)->get();            
        return view('frontend.mybid',compact('products','categorys','bids'));
    }
    public function Winningbid(){
        $bids =DB::table('bidings')
        ->join('products','bidings.product_id','products.id')
        ->select('bidings.*','products.product_name')
        ->where('bidings.user_id',auth()->user()->id)
        ->where('bidings.status',1)
        ->where('winner_status',1)
        ->get();
        $categorys =DB::table('categories')->where('active',1)->get();
        $products=DB::table('products')->where('active',1)->get();            
        return view('frontend.winningbid',compact('products','categorys','bids'));
    }
}
