<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index()
    {
        $ruangan = Ruangan::latest()->paginate(10);

        return view(
            'ruangan.index',
            compact('ruangan')
        );
    }

    public function create()
    {
        return view('ruangan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ruangan' => 'required',
            'gedung' => 'required',
            'penanggung_jawab' => 'required',
        ]);
        Ruangan::create([
            'nama_ruangan' => $request->nama_ruangan,
            'gedung' => $request->gedung,
            'penanggung_jawab' => $request->penanggung_jawab,

        ]);

        return redirect()
            ->route('ruangan.index')
            ->with(
                'success',
                'Ruangan berhasil ditambahkan'
            );
    }

    public function show(Ruangan $ruangan)
    {
        return view(
            'ruangan.show',
            compact('ruangan')
        );
    }

    public function edit(Ruangan $ruangan)
    {
        return view(
            'ruangan.edit',
            compact('ruangan')
        );
    }

    public function update(
        Request $request,
        Ruangan $ruangan
    ) {
        $request->validate([
            'nama_ruangan' => 'required',
            'gedung' => 'required',
            'penanggung_jawab' => 'required',
        ]);
        $ruangan->update([
            'nama_ruangan' => $request->nama_ruangan,
            'gedung' => $request->gedung,
            'penanggung_jawab' => $request->penanggung_jawab,
        ]);

        return redirect()
            ->route('ruangan.index')
            ->with(
                'success',
                'Ruangan berhasil diupdate'
            );
    }

    public function destroy(
        Ruangan $ruangan
    ) {
        $ruangan->delete();
        return redirect()
            ->route('ruangan.index')
            ->with(
                'success',
                'Ruangan berhasil dihapus'
            );
    }
}