<?php

namespace App\Http\Controllers;

use App\Models\AsetBmn;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AsetBmnController extends Controller
{
    public function index()
    {
        $aset = AsetBmn::latest()->paginate(10);

        return view('aset_bmn.index', compact('aset'));
    }

    public function create()
    {
        return view('aset_bmn.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_aset' => 'required|unique:aset_bmns,kode_aset',
            'nama_barang' => 'required',
            'kategori_barang' => 'required|in:Mebel,Elektronik,Kendaraan',
            'lokasi_ruangan' => 'required',
            'tahun_perolehan' => 'required|integer|digits:4',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
        ]);

        AsetBmn::create($validated);

        return redirect()
            ->route('aset-bmn.index')
            ->with('success', 'Data aset BMN berhasil ditambahkan.');
    }

    public function show(AsetBmn $aset_bmn)
    {
        return view('aset_bmn.show', compact('aset_bmn'));
    }

    public function edit(AsetBmn $aset_bmn)
    {
        return view('aset_bmn.edit', compact('aset_bmn'));
    }

    public function update(Request $request, AsetBmn $aset_bmn)
    {
        $validated = $request->validate([
            'kode_aset' => [
                'required',
                Rule::unique('aset_bmns', 'kode_aset')->ignore($aset_bmn->id),
            ],
            'nama_barang' => 'required',
            'kategori_barang' => 'required|in:Mebel,Elektronik,Kendaraan',
            'lokasi_ruangan' => 'required',
            'tahun_perolehan' => 'required|integer|digits:4',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
        ]);

        $aset_bmn->update($validated);

        return redirect()
            ->route('aset-bmn.index')
            ->with('success', 'Data aset BMN berhasil diperbarui.');
    }

    public function destroy(AsetBmn $aset_bmn)
    {
        $aset_bmn->delete();

        return redirect()
            ->route('aset-bmn.index')
            ->with('success', 'Data aset BMN berhasil dihapus.');
    }
}