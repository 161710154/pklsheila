<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\artikel;
use Session;
use File;
use App\Role;
use Auth;
use App\komentar;
class ArtikelController extends Controller
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
        $user = Auth::user();
        if($user->hasRole('admin')){
            $artikel = Artikel::all();
        }elseif($user->hasRole('member')){
            $artikel = Auth::user()->Artikel;
        }
        return view('artikel.index',compact('artikel'));
        //$artikel = artikel::with('pengguna')->get();
        //return view('artikel.index',compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $komentar = komentar::all();
        return view('artikel.create',compact('komentar'));
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
            'judul' => 'required|',
            'isi' => 'required|',
            'gambar' => 'required|',
            'tgl_post' => 'required|',
            'status' => 'required|'
        ]);
        $artikel = new artikel;
        $artikel->judul = $request->judul;
        $artikel->isi = $request->isi;
        $artikel->gambar = $request->gambar;
        $artikel->tgl_post = $request->tgl_post;
        $artikel->status = $request->status;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $destinationPath = public_path().'/assets/images/avatar/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $artikel->gambar = $filename;
        }
        $artikel->save();
        return redirect()->route('artikel.index');
    }

    public function publish($id)
    {
        $artikel = artikel::find($id);

        if ($artikel->status === 1) {
            $artikel->status = 0;
        } else {
            $artikel->status= 1;
        }

        $artikel->save();
        return redirect()->route('artikel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $artikel = artikel::findOrFail($id);
        $selected = $artikel->kategori->pluck('id')->toArray();
        
        // dd($selected);
        return view('artikel.edit',compact('artikel','selected'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'judul' => 'required|',
            'isi' => 'required|',
            'gambar' => 'required|',
            'tgl_post' => 'required|',
            'status' => 'required|'
        ]);
        $artikel = artikel::findOrFail($id);
        $artikel->judul = $request->judul;
        $artikel->isi = $request->isi;
        $artikel->gambar = $request->gambar;
        $artikel->tgl_post = $request->tgl_post;
        $artikel->status = $request->status;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $destinationPath = public_path().'/assets/images/avatar/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
        
        if ($artikel->gambar) {
        $old_foto = $artikel->gambar;
        $filepath = public_path() . DIRECTORY_SEPARATOR . '/assets/images/avatar'
        . DIRECTORY_SEPARATOR . $artikel->gambar;
            try {
            File::delete($filepath);
            } catch (FileNotFoundException $e) {
        // File sudah dihapus/tidak ada
            }
        }
        $artikel->gambar = $filename;
}
        $artikel->save();
        return redirect()->route('artikel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $artikel)
    {
        $artikel = Artikel::findOrFail($artikel->id);
        if ($artikel->gambar) {
            $old_gambar = $artikel->gambar;
            $filepath = public_path() . DIRECTORY_SEPARATOR . 'assets/images/avatar/'
            . DIRECTORY_SEPARATOR . $artikel->gambar;
            try {
            File::delete($filepath);
            } catch (FileNotFoundException $e) {
            // File sudah dihapus/tidak ada
            }
            }
            $artikel->delete();
        return redirect()->route('artikel.index');
    }
}
    