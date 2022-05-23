<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Education;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $education = Education::all();
        return response()->json(['education'=>$education]);
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
            'group'=>'required',
            'board'=>'required',
            'result'=>'required',
            'year'=>'required',
        ]);
        $education = new Education;
        $education->name = $request->name;
        $education->group = $request->group;
        $education->slug = Str::slug($request->name);
        $education->board = $request->board;
        $education->result = $request->result;
        $education->year = $request->year;
        $education->save();
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
        $education = Education::where('slug',$slug)->first();
        return response()->json(['education'=>$education]);
  
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
        $education = Education::find($request->id);
        $education->name = $request->name;
        $education->group = $request->group;
        $education->slug = Str::slug($request->name);
        $education->board = $request->board;
        $education->result = $request->result;
        $education->year = $request->year;
        $education->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $education = Education::where('slug',$slug)->first();
        $education->delete();
    }
}
