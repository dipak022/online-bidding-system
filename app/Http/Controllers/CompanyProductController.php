<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use DB;
use DateTime;
use auth;

class CompanyProductController extends Controller
{
    public function index()
    {
        $categorys=Category::where('active',1)->get(); 
        $products=DB::table('products')
            ->join('categories','products.category_id','categories.id')
            ->select('products.*','categories.category_name')
            ->where('auth_id',auth()->user()->id)->get();
        return view('company.product.manage',compact('categorys','products'));
    }

    public function ProductStatus(Request $request){
        //dd($request->all());
        if($request->mode == 'true'){
            $status = DB::table('products')->where('id',$request->id)->update(['active'=>1]);
        }else{
            $status = DB::table('products')->where('id',$request->id)->update(['active'=>0]);
        }
    }

    public function NewStatus(Request $request){
        //dd($request->all());
        if($request->mode == 'true'){
            $status = DB::table('products')->where('id',$request->id)->update(['new'=>1]);
        }else{
            $status = DB::table('products')->where('id',$request->id)->update(['new'=>0]);
        }
    }
    public function FeaturedStatus(Request $request){
        //dd($request->all());
        if($request->mode == 'true'){
            $status = DB::table('products')->where('id',$request->id)->update(['featured'=>1]);
        }else{
            $status = DB::table('products')->where('id',$request->id)->update(['featured'=>0]);
        }
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imageName = $request->file('image');
        $image = $imageName->getClientOriginalName();
        $directory = 'images/banner/';
        $imgUrl = $directory.$image;
        $imageName->move($directory,$image);

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->details = $request->details;
        $product->regular_price = $request->regular_price;
        $product->starting_bidding_amount = $request->starting_bidding_amount;
        $product->bidding_end_date = strtotime($request->bidding_end_date) ? (new DateTime($request->bidding_end_date))->format('Y-m-d') : null;
        $product->image = $imgUrl;
        $product->new = $request->new;
        $product->featured = $request->featured;
        $product->active = $request->active;
        $product->auth_id = auth()->user()->id;
        $done = $product->save();

        if ($done) {
            $notification = array(
                'message' => 'Post Added Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Post Added Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $check_image= $request->file('image');
        if($check_image){
            $oldImage = $request->oldimage;
            if(file_exists($oldImage)){
                unlink($oldImage);
            }
            $product = Product::find($id);
            $imageName = $request->file('image');
            $image = $imageName->getClientOriginalName();
            $directory = 'images/banner/';
            $imgUrl = $directory.$image;
            $imageName->move($directory,$image);
            


            $product->product_name = $request->product_name;
            $product->category_id = $request->category_id;
            $product->details = $request->details;
            $product->regular_price = $request->regular_price;
            $product->starting_bidding_amount = $request->starting_bidding_amount;
            $product->bidding_end_date = strtotime($request->bidding_end_date) ? (new DateTime($request->bidding_end_date))->format('Y-m-d') : null;
            $product->image = $imgUrl;
            $product->new = $request->new;
            $product->featured = $request->featured;
            $product->active = $request->active;
            $done = $product->save();
            

        }else{
            $product = Product::find($id);
            $product->product_name = $request->product_name;
            $product->category_id = $request->category_id;
            $product->details = $request->details;
            $product->regular_price = $request->regular_price;
            $product->starting_bidding_amount = $request->starting_bidding_amount;
            $product->bidding_end_date = strtotime($request->bidding_end_date) ? (new DateTime($request->bidding_end_date))->format('Y-m-d') : null;
            $product->new = $request->new;
            $product->featured = $request->featured;
            $product->active = $request->active;
            $done = $product->save();

        }
        


        if ($done) {
            $notification = array(
                'message' => 'Post Update Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Post Update Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $done = $product->delete();
        if ($done) {
            $notification = array(
                'message' => 'Post Delete Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Post Delete Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }
    }
}
