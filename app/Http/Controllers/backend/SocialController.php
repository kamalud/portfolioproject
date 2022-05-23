<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Social;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $social = Social::all();
        return response()->json(['social'=>$social]);
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
        $this->validate($request,[
            'name'=>'required',
            'facebook'=>'required',
            'github'=>'required',
            'youtube'=>'required',
            'linkedin'=>'required',
            'whatsapp'=>'required',
            'instragram'=>'required',
        ]);
        $social =  new Social;
        $social->name = $request->name;
        $social->slug = Str::slug($request->name);
        $social->facebook = $request->facebook;
        $social->github = $request->github;
        $social->youtube = $request->youtube;
        $social->linkedin = $request->linkedin;
        $social->whatsapp = $request->whatsapp;
        $social->instragram = $request->instragram;
        $social->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $social = Social::where('slug',$slug)->first();
        return response()->json(['social'=>$social]);
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
        $social = Social::find($request->id);
        $social->name = $request->name;
        $social->slug = Str::slug($request->name);
        $social->facebook = $request->facebook;
        $social->github = $request->github;
        $social->youtube = $request->youtube;
        $social->linkedin = $request->linkedin;
        $social->whatsapp = $request->whatsapp;
        $social->instragram = $request->instragram;
        $social->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $social = Social::where('slug',$slug)->first();
        $social->delete();
    }
}
