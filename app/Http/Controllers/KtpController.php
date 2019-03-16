<?php

namespace App\Http\Controllers;

use App\kegiatan;
use App\Ktp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KtpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $ktps = Ktp::paginate(5);
//
//
//        return view('frontend.index.index', [
//            'nama'=>'List Ktp',
//            'ktps'=> $ktps,
//        ]);
        $ktps = Ktp::paginate(5);

        return view('frontend.index.index', compact('ktps'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.index.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:4',
            'nik' => 'required|min:16',
            'alamat' => 'required|min:2'
        ]);

        $ktp = new Ktp;

        $ktp->user_id = auth()->id();
        $ktp->nama = $request->nama;
        $ktp->nik = $request->nik;
        $ktp->alamat = $request->alamat;

        $ktp->save();

        return redirect()->route('ktp.index')->with('success','Data disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ktp  $ktp
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $cari = $request->get('search');
        $ktps = Ktp::where('nama','LIKE','%'.$cari.'%')->paginate(5);
        return redirect(compact('ktps'))->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ktp  $ktp
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ktp = Ktp::where('id', $id)->first();
        return view ('frontend.index.edit', [
            'user_id' => $ktp . $id,
            'nik'=> $ktp
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ktp  $ktp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|min:4',
            'nik' => 'required|min:16',
            'alamat' => 'required|min:5'
        ]);

        $ktp = Ktp::find($id);

        $ktp->user_id = auth()->id();
        $ktp->nama = $request->nama;
        $ktp->nik = $request->nik;
        $ktp->alamat = $request->alamat;

        $ktp->save();

        return redirect()->route('ktp.index')->with('success','Data disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ktp  $ktp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ktp = Ktp::find($id);

        $ktp->delete();

        return redirect()->back()->with('danger', 'Data dihapus');
    }


}
