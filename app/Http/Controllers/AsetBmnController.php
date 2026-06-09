<?php

namespace App\Http\Controllers;

use App\Models\AsetBmn;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AsetBmnController extends Controller
{
    /**
     * Menampilkan daftar aset
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $kategori = $request->kategori_barang;
        $kondisi = $request->kondisi;

        $aset = AsetBmn::with('ruangan')
            ->when($search, function ($query) use ($search) {
                $query->where('kode_aset', 'like', "%{$search}%")
                    ->orWhere('nama_barang', 'like', "%{$search}%")
                    ->orWhereHas('ruangan', function ($q) use ($search) {
                        $q->where('nama_ruangan', 'like', "%{$search}%");
                    });
            })
            ->when($kategori, function ($query) use ($kategori) {
                $query->where('kategori_barang', $kategori);
            })
            ->when($kondisi, function ($query) use ($kondisi) {
                $query->where('kondisi', $kondisi);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $totalAset = AsetBmn::count();
        $asetBaik = AsetBmn::where('kondisi', 'Baik')->count();
        $asetRusakRingan = AsetBmn::where('kondisi', 'Rusak Ringan')->count();
        $asetRusakBerat = AsetBmn::where('kondisi', 'Rusak Berat')->count();

        return view('aset_bmn.index', compact(
            'aset',
            'totalAset',
            'asetBaik',
            'asetRusakRingan',
            'asetRusakBerat'
        ));
    }

    /**
     * Form tambah aset
     */
    public function create()
    {
        $ruangan = Ruangan::all();

        return view('aset_bmn.create', compact('ruangan'));
    }

    /**
     * Simpan data aset
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_aset' => 'required|unique:aset_bmns,kode_aset',
            'nama_barang' => 'required',
            'kategori_barang' => 'required|in:Mebel,Elektronik,Kendaraan',
            'ruangan_id' => 'required',
            'tahun_perolehan' => 'required|integer|digits:4',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'foto_aset' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto_aset')) {
            $validated['foto_aset'] = $request->file('foto_aset')
                ->store('aset', 'public');
        }

        AsetBmn::create($validated);

        return redirect()
            ->route('aset-bmn.index')
            ->with('success', 'Data aset berhasil ditambahkan.');
    }

    /**
     * Detail aset
     */
    public function show(AsetBmn $aset_bmn)
    {
        return view('aset_bmn.show', compact('aset_bmn'));
    }

    /**
     * Form edit
     */
    public function edit(AsetBmn $aset_bmn)
    {
        $ruangan = Ruangan::all();

        return view(
            'aset_bmn.edit',
            compact('aset_bmn', 'ruangan')
        );
    }

    /**
     * Update aset
     */
    public function update(Request $request, AsetBmn $aset_bmn)
    {
        $validated = $request->validate([
            'kode_aset' => [
                'required',
                Rule::unique('aset_bmns', 'kode_aset')->ignore($aset_bmn->id),
            ],
            'nama_barang' => 'required',
            'kategori_barang' => 'required|in:Mebel,Elektronik,Kendaraan',
            'ruangan_id' => 'required',
            'tahun_perolehan' => 'required|integer|digits:4',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'foto_aset' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto_aset')) {

            if (
                $aset_bmn->foto_aset &&
                Storage::disk('public')->exists($aset_bmn->foto_aset)
            ) {
                Storage::disk('public')->delete($aset_bmn->foto_aset);
            }

            $validated['foto_aset'] = $request->file('foto_aset')
                ->store('aset', 'public');
        }

        $aset_bmn->update($validated);

        return redirect()
            ->route('aset-bmn.index')
            ->with('success', 'Data aset berhasil diperbarui.');
    }

    /**
     * Hapus aset
     */
    public function destroy(AsetBmn $aset_bmn)
    {
        if (
            $aset_bmn->foto_aset &&
            Storage::disk('public')->exists($aset_bmn->foto_aset)
        ) {
            Storage::disk('public')->delete($aset_bmn->foto_aset);
        }

        $aset_bmn->delete();

        return redirect()
            ->route('aset-bmn.index')
            ->with('success', 'Data aset berhasil dihapus.');
    }
}