<?php

namespace App\Http\Controllers;

use App\Models\AsetBmn;
use Illuminate\Http\Request;

class AsetBmnController extends Controller
{
    public function index()
    {
        $asetBmns = AsetBmn::all();

        return view('aset_bmn.index', compact('asetBmns'));
    }

    public function create()
    {
        return view('aset_bmn.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_aset' => 'required',
            'nama_barang' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
            'tahun_perolehan' => 'required',
            'kondisi' => 'required',
        ], [
            'kode_aset.required' => 'Kode aset wajib diisi.',
            'nama_barang.required' => 'Nama barang wajib diisi.',
            'kategori.required' => 'Kategori wajib dipilih.',
            'lokasi.required' => 'Lokasi wajib diisi.',
            'tahun_perolehan.required' => 'Tahun perolehan wajib diisi.',
            'kondisi.required' => 'Kondisi wajib dipilih.',
        ]);

        return redirect('/');
    }
}