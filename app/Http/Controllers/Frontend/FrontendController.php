<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Biodata;
use App\Models\User;
use App\Models\About;
use App\Models\Education;
use App\Models\Social;
use App\Models\Portfolio;
use App\Models\Skill;

class FrontendController extends Controller
{
    
    public function index()
    {
        $data['biodata'] = Biodata::first();
        $data['user'] = User::first();
        $data['about'] = About::first();
        $data['abouts'] = About::all();
        $data['social'] = Social::all();
        $data['educations'] = Education::all();
        $data['skills'] = Skill::all();
        $data['Portfolios'] =  Portfolio::orderBy('id')->with('category')->get();
        $data['Portfolio'] = Portfolio::select('category_id')->groupBy('category_id')->get();
        
        return view('Frontend.home',$data);
    }
}
