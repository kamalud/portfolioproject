<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Str;

class ContatctController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::all();
        return response()->json(['contact'=>$contact]);
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
            'first_name'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
            'email'=>'required|unique:contacts,email',
            'comment'=>'required',
        ]);

        $contact = new Contact;
        $contact->first_name = $request->first_name;
        $contact->slug =Str::slug( $request->first_name);
        $contact->last_name = $request->last_name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->comment = $request->comment;
        $contact->save();
        return redirect('/')->with("success","you are successfully registration");
    }


    public function destroy($slug)
    {
        $contact = Contact::where('slug',$slug)->first();
        $contact->delete();
    }
}
