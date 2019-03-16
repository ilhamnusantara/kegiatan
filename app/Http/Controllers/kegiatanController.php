<?php

namespace App\Http\Controllers;

use App\kegiatan;
use App\Ktp;
use Illuminate\Http\Request;

class kegiatanController extends Controller
{
    public function index ()
    {
        $keg=kegiatan::all();
        return view('frontend.kegiatan', compact('keg'));
    }

    public function lock(Request $request)
    {
        $ktps = Ktp::paginate(10);
        $ambil=$request->exampleRadios;
        return view('frontend.index.index', compact('ktps','ambil'));
    }


    public function simpan(Request $request, $id)
    {
        $ktp = Ktp::find($id);

        $ktp->user_id = auth()->id();
        $ktp->kegiatan = $request->tambah;
        $ktp->save();

        return redirect()->back();

    }

    public function batal($id)
    {
        $ktp = Ktp::find($id);

        $ktp->user_id = auth()->id();
        $ktp->kegiatan = null;
        $ktp->save();

        return redirect()->back();

    }


}
