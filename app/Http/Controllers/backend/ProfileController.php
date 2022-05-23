<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id =Auth()->user()->id; 
        $profile = User::find($id);
        return response()->json(['profile'=>$profile]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $id =Auth()->user()->id; 
        $profile = User::find($id);
        return response()->json(['profile'=>$profile]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id =Auth()->user()->id;
        $file = explode(';',$request->image);
        $file = explode('/',$file[0]);
        $file_ex = end($file);
        $name = $request->name;
        $file_name = $name.'.'.$file_ex;

        $profile = User::find($id);
        $profile->name = $name;
        $profile->email = $request->email;
        $profile->mobile = $request->mobile;
        $profile->gender = $request->gender;
        $profile->address = $request->address;
        $profile->image = $file_name;
        
        $save = $profile->save();
        if($save){
            Image::make($request->image)->save('uploads/profile/'.$file_name);
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
        if($request->hasfile('image')){
            $unlink = 'uploads/profile/'.$profile->image;
            if(File::exists($unlink)){
                File::delete($unlink);
            };
            $file = $request->hasfile('image');
            $extension = $file->getClientOriginalExtension();
            $fileName =  time().'.'.$extension;
            $file->move('uploads/profile/',$fileName);
            $profile->image = $fileName; 
        };
    }
    
    
    
    public function password_change(Request $request)
    {
       $this->validate($request,[
           'old_password'=>'required',
           'password' => ['required', 'string', 'min:8', 'confirmed'],
           'password_confirmation'=>'required',
       ]);
       $user = User::find(auth()->id());
       if(Hash::check($request->old_password ,$user->password)){
         $user->update([
             'password'=>Hash::make($request->password)
         ]);
         return response()->json(['message'=>'password update successfully']);
       }else{
        return response()->json(['error'=>'Old password dosenot mach']);
       }
    }
}
 