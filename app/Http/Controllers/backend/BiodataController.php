<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Biodata;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biodatas = Biodata::all();
        return response()->json(['biodatas'=>$biodatas]);
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'mobile' => 'required',
            'birthday' => 'required',
            'nationality' => 'required',
            'relisgim' => 'required',
        ]);
        $biodatas = new BioData;
        $biodatas->name = $request->name;
        $biodatas->slug = Str::slug($request->name);
        $biodatas->email = $request->email;
        $biodatas->address = $request->address;
        $biodatas->gender = $request->gender;
        $biodatas->mobile = $request->mobile;
        $biodatas->birthday = $request->birthday;
        $biodatas->nationality = $request->nationality;
        $biodatas->relisgim = $request->relisgim;
        $biodatas->save();
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
       $biodata = BioData::where('slug',$slug)->first();
       return response()->json(['biodata'=>$biodata]);
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
        $biodata = BioData::find($request->id);
        $biodata->name = $request->name;
        $biodata->slug = Str::slug($request->name);
        $biodata->email = $request->email;
        $biodata->address = $request->address;
        $biodata->gender = $request->gender;
        $biodata->mobile = $request->mobile;
        $biodata->birthday = $request->birthday;
        $biodata->nationality = $request->nationality;
        $biodata->relisgim = $request->relisgim;
        $biodata->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
       $biodata = BioData::where('slug',$slug)->first();
        $biodata->delete();
    }
}
