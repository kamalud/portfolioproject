<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Setting;
use Image;
use Auth;
class SettinController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $setting = Setting::all();
        return response()->json(['setting'=>$setting]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'image'=>'required',
        ]);
//   Image==============      
        $file = explode(';',$request->image);
        $file = explode('/',$file[0]);
        $file_ex = end($file);
        $file_name = time().'.'.$file_ex;


        $setting = new Setting;
        $setting->name = $request->name;
        $setting->slug = Str::slug($request->name);   ;
        $setting->image = $file_name;

        $save = $setting->save();

        if($save){
            Image::make($request->image)->resize(400,200)->save(public_path('uploads/setting/'). $file_name);
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
    public function edit($slug)
    {
        $setting = Setting::where('slug',$slug)->first();
        return response()->json(['setting'=>$setting]);

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
        $setting = Setting::find($request->id);
        $setting->name = $request->name;
        $setting->slug = Str::slug($request->name);

        if($request->image !== $setting->image){
            $file = explode(';',$request->image);
            $file = explode('/',$file[0]);
            $file_ex = end($file);
            $file_name = time().'.'.$file_ex;
            $setting->image = $file_name;
            Image::make($request->image)->resize(400,200)->save(public_path('uploads/setting/'). $file_name);
        }

        $setting->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $setting = Setting::where('slug',$slug)->first();
        $file_name = $setting->image;
        if(file_exists(public_path('uploads/setting/'.$file_name))){
           unlink(public_path('uploads/setting/'.$file_name));
        };
       $setting->delete();
    }
}
