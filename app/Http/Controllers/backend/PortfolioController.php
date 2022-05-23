<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Str;
use Image;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolio = Portfolio::orderBy('id','ASC')->with('category')->get();
        return response()->json(['portfolio'=>$portfolio]);
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
            'image'=>'required',
            'category_id'=>'required',
        ]);
        $file = explode(';',$request->image);
        $file = explode('/',$file[0]);
        $file_ex = end($file);
        $file_name = time().'.'.$file_ex;

        $portfolio = new Portfolio;
        $portfolio->name = $request->name;
        $portfolio->category_id = $request->category_id;
        $portfolio->slug = Str::slug($request->name);
        $portfolio->image = $file_name;
        
        $save = $portfolio->save();
        if($save){
            Image::make($request->image)->resize(400,200)->save(public_path('uploads/portfolio/'). $file_name);
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
        $portfolio = Portfolio::where('slug',$slug)->first();
        return response()->json(['portfolio'=>$portfolio]);

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
        $portfolio = Portfolio::find($request->id);
        
        $portfolio->name = $request->name;
        $portfolio->category_id = $request->category_id;
        $portfolio->slug = Str::slug($request->name);

        if($request->image !== $portfolio->image){
            $file = explode(';',$request->image);
            $file = explode('/',$file[0]);
            $file_ex = end($file);
            $file_name = time().'.'.$file_ex;
            $portfolio->image = $file_name;
            Image::make($request->image)->resize(400,200)->save(public_path('uploads/portfolio/'). $file_name);
        }

        $portfolio->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $portfolio = Portfolio::where('slug',$slug)->first();
        $file_name = $portfolio->image;
        if(file_exists(public_path('uploads/portfolio/'.$file_name))){
           unlink(public_path('uploads/portfolio/'.$file_name));
        };
       $portfolio->delete();
    }
}
