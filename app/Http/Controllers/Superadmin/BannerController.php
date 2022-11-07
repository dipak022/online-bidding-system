<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Str;
use DB;
class BannerController extends Controller
{
    public function index()
    {
        $banners=Banner::orderBy('id','DESC')->get(); 
        return view('backend.superadmin.banner.manage',compact('banners'));
    }

    public function BannerStatus(Request $request){
        //dd($request->all());
        if($request->mode == 'true'){
            $status = DB::table('banners')->where('id',$request->id)->update(['active'=>1]);
        }else{
            $status = DB::table('banners')->where('id',$request->id)->update(['active'=>0]);
        }
        if ($status) {
            $notification = array(
                'message' => 'Branch Delete Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
        else{
            $notification = array(
                'message' => 'Status Change Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
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
        // image one 
        $imageName = $request->file('image');
        $image = $imageName->getClientOriginalName();
        $directory = 'images/banner/';
        $imgUrl = $directory.$image;
        $imageName->move($directory,$image);
        // image two
        // $imageTwo = $request->file('image_two');
        // $imagetwo = $imageTwo->getClientOriginalName();
        // $directorytwo = 'images/banner/';
        // $imgUrlTwo = $directorytwo.$imagetwo;
        // $imageTwo->move($directorytwo,$imagetwo);
        //image three 
        // $imageThree = $request->file('image_three');
        // $imagethree = $imageThree->getClientOriginalName();
        // $directorythree = 'images/banner/';
        // $imgUrlThree = $directorythree.$imagethree;
        // $imageThree->move($directorythree,$imagethree);
        // image four 
        // $imageFour = $request->file('image_four');
        // $imagefour = $imageFour->getClientOriginalName();
        // $directoryfour = 'images/banner/';
        // $imgUrlFour = $directoryfour.$imagefour;
        // $imageFour->move($directoryfour,$imagefour);



        $banner = new Banner();
        $banner->title = $request->title;
        $banner->description = $request->description;
        $banner->image = $imgUrl;
        // $banner->image_two = $imgUrlTwo;
        // $banner->image_three = $imgUrlThree;
        // $banner->image_four = $imgUrlFour;
        $banner->active = $request->active;
        $done = $banner->save();

        if ($done) {
            $notification = array(
                'message' => 'Banner Added Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Banner Added Unuccessfully',
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
        // $check_imagetwo= $request->file('image_two');
        // $check_imagethree= $request->file('image_three');
        // $check_imagefour= $request->file('image_four');
        //if($check_image && $check_imagetwo && $check_imagethree && $check_imagefour){
        if($check_image){
            $oldImage = $request->oldimage;
            // $oldImageTwo = $request->oldimagetwo;
            // $oldImageThree = $request->oldimagethree;
            // $oldImageFour = $request->oldimagefour;
            //if(file_exists($oldImage && $oldImageTwo && $oldImageThree && $oldImageFour)){
            if(file_exists($oldImage)){
                unlink($oldImage);
                // unlink($oldImageTwo);
                // unlink($oldImageThree);
                // unlink($oldImageFour);
            }

            $banner = Banner::find($id);
             // image one 
            $imageName = $request->file('image');
            $image = $imageName->getClientOriginalName();
            $directory = 'images/banner/';
            $imgUrl = $directory.$image;
            $imageName->move($directory,$image);
            // image two
            // $imageTwo = $request->file('image_two');
            // $imagetwo = $imageTwo->getClientOriginalName();
            // $directorytwo = 'images/banner/';
            // $imgUrlTwo = $directorytwo.$imagetwo;
            // $imageTwo->move($directorytwo,$imagetwo);
            //image three 
            // $imageThree = $request->file('image_three');
            // $imagethree = $imageThree->getClientOriginalName();
            // $directorythree = 'images/banner/';
            // $imgUrlThree = $directorythree.$imagethree;
            // $imageThree->move($directorythree,$imagethree);
            //image four 
            // $imageFour = $request->file('image_four');
            // $imagefour = $imageFour->getClientOriginalName();
            // $directoryfour = 'images/banner/';
            // $imgUrlFour = $directoryfour.$imagefour;
            // $imageFour->move($directoryfour,$imagefour);


            $banner->title = $request->title;
            $banner->description = $request->description;
            $banner->active = $request->active;
            $banner->image = $imgUrl;
            // $banner->image_two = $imgUrlTwo;
            // $banner->image_three = $imgUrlThree;
            // $banner->image_four = $imgUrlFour;
            $done = $banner->save();
            

        }else{
            $banner = Banner::find($id);
            $banner->title = $request->title;
            $banner->description = $request->description;
            $banner->active = $request->active;
            $done = $banner->save();

        }
        


        if ($done) {
            $notification = array(
                'message' => 'Banner Update Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Banner Update Unuccessfully',
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
        $banner = Banner::find($id);
        $done = $banner->delete();
        if ($done) {
            $notification = array(
                'message' => 'Banner Delete Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Banner Delete Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }
    }
}
