<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\artikel;

class FrontendController extends Controller
{
    public function blog()
    {
        $artikel = artikel::paginate(6);
        return view('frontend.blog.index',compact('artikel'));
    }

    public function singleblog($id) 
    {
        $artikel = artikel::findOrFail($id);
        return view('frontend.blog.single',compact('artikel'));
    }
}
