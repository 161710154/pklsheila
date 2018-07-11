<?php

namespace App\Http\Controllers;

use App\kategori;
use App\artikel;
use Session;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kategori = kategori::with('artikel')->get();
        return view('kategori.index',compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artikel = artikel::all();
        return view('kategori.create',compact('artikel'));
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
            'news' => 'required|',
            'populer' => 'required|',
            'fashion' => 'required|',
            'kpop' => 'required|',
            'infotainment' => 'required|',
            'food' => 'required|',
            'artikel_id' => 'required'
        ]);
        $kategori = new kategori;
        $kategori->news = $request->news;
        $kategori->populer = $request->populer;
        $kategori->fashion = $request->fashion;
        $kategori->kpop = $request->kpop;
        $kategori->infotainment = $request->infotainment;
        $kategori->food = $request->food;
        $kategori->artikel_id = $request->artikel_id;
        $kategori->save();
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = kategori::findOrFail($id);
        $artikel = artikel::all();
        $selectedartikel = kategori::findOrFail($id)->artikel_id;
        return view('kategori.edit',compact('artikel','kategori','selectedartikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kategori $kategori)
    {
        $this->validate($request,[
            'news' => 'required|',
            'populer' => 'required|',
            'fashion' => 'required|',
            'kpop' => 'required|',
            'infotainment' => 'required|',
            'food' => 'required|',
            'artikel_id' => 'required'
        ]);
        $kategori = new kategori;
        $kategori->news = $request->news;
        $kategori->populer = $request->populer;
        $kategori->fashion = $request->fashion;
        $kategori->kpop = $request->kpop;
        $kategori->infotainment = $request->infotainment;
        $kategori->food = $request->food;
        $kategori->artikel_id = $request->artikel_id;
        $kategori->save();
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $a = kategori::findOrFail($id);
        $a->delete();
        return redirect()->route('kategori.index');
    }
}
