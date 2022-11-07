<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Service;
use DB;
class CompanyAccountController extends Controller
{
    public function index()
    {

        $companys=DB::table('users')->where('role',4) ->get();
        return view('backend.superadmin.company.manage',compact('companys'));
    }

    public function CompanyAcountStatus(Request $request){
        //dd($request->all());
        if($request->mode == 'true'){
            $status = DB::table('users')->where('id',$request->id)->update(['active'=>1]);
        }else{
            $status = DB::table('users')->where('id',$request->id)->update(['active'=>0]);
        }
    }
    public function CompanyVendorStatus(Request $request){
        //dd($request->all());
        if($request->mode == 'true'){
            $status = DB::table('users')->where('id',$request->id)->update(['multi_vendor'=>1]);
        }else{
            $status = DB::table('users')->where('id',$request->id)->update(['multi_vendor'=>0]);
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
        $user = new User(); 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->active = 1;
        $user->role = 4;
        $user->multi_vendor = 1;
        $done = $user->save();

        if ($done) {
            $notification = array(
                'message' => 'Company Account Added Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Company Added Unuccessfully',
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
        $user = User::find($id);
        if($user){
            $user->name = $request->name;
            $user->active = $request->active;
            $user->phone = $request->phone;
            $user->role = 4;
            $user->multi_vendor = 1;
            $done = $user->save();
            if ($done) {
                $notification = array(
                    'message' => 'Company Account Update Successfully.',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }else{
                $notification = array(
                    'message' => 'Company Update Unuccessfully',
                    'alert-type' => 'danger'
                );
                return redirect()->back()->with($notification);
            }
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
        $user = User::find($id);
        if($user){
            $status = $user->delete();
            if ($status) {
                $notification = array(
                    'message' => 'Company Account Delete Successfully.',
                    'alert-type' => 'success'
                );
                return redirect()->route('company_account.index')->with($notification);
            }
        }else{
            $notification = array(
                'message' => 'Company Delete Unsuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }
    }
}
