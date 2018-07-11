<?php

namespace App\Http\Controllers;

use App\pengguna;
use Session;
use File;
use App\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
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
        $pengguna = User::all();

        return view('pengguna.index',compact('pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengguna.create');
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
            'nama' => 'required|',
            'email' => 'required|',
            'judul' => 'required|',
            'isi' => 'required|',
            'tgl_post' => 'required|',
            'gambar' => 'required|'
        ]);
        $pengguna = new pengguna;
        $pengguna->nama = $request->nama;
        $pengguna->email = $request->email;
        $pengguna->judul = $request->judul;
        $pengguna->isi = $request->isi;
        $pengguna->tgl_post = $request->tgl_post;
        $pengguna->gambar = $request->gambar;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $destinationPath = public_path().'/assets/images/avatar/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $pengguna->gambar = $filename;
        }
        $pengguna->save();
        return redirect()->route('pengguna.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function show(pengguna $pengguna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengguna = pengguna::findOrFail($id);
        return view('pengguna.edit',compact('pengguna'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'nama' => 'required|',
            'email' => 'required|',
            'judul' => 'required|',
            'isi' => 'required|',
            'tgl_post' => 'required|',
            'gambar' => 'required|'
        ]);
        $pengguna = pengguna::findOrFail($id);
        $pengguna->nama = $request->nama;
        $pengguna->email = $request->email;
        $pengguna->judul = $request->judul;
        $pengguna->isi = $request->isi;
        $pengguna->tgl_post = $request->tgl_post;
        $pengguna->gambar = $request->gambar;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $destinationPath = public_path().'/assets/images/avatar/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
        
        if ($pengguna->gambar) {
        $old_foto = $pengguna->gambar;
        $filepath = public_path() . DIRECTORY_SEPARATOR . '/assets/images/avatar'
        . DIRECTORY_SEPARATOR . $pengguna->gambar;
            try {
            File::delete($filepath);
            } catch (FileNotFoundException $e) {
        // File sudah dihapus/tidak ada
            }
        }
        $pengguna->gambar = $filename;
}
        $pengguna->save();
        return redirect()->route('pengguna.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengguna = pengguna::findOrFail($id);
        $pengguna->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('pengguna.index');
    }
}
