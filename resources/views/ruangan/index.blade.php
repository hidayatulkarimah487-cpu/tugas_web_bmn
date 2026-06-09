@extends('layouts.app')
@section('content')
<div class="container">
    <h2>
        Master Ruangan
    </h2>

    <a
        href="{{ route('ruangan.create') }}"
        class="btn btn-success mb-3">
        Tambah
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Ruangan</th>
                <th>Gedung</th>
                <th>Penanggung Jawab</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($ruangan as $item)
            <tr>
                <td>
                    {{ $loop->iteration }}
                </td>
                <td>
                    {{ $item->nama_ruangan }}
                </td>
                <td>
                    {{ $item->gedung }}
                </td>
                <td>
                    {{ $item->penanggung_jawab }}
                </td>

                <td>
                    <a
                        href="{{ route('ruangan.edit',$item->id) }}"
                        class="btn btn-warning">
                        Edit
                    </a>

                    <form
                        action="{{ route('ruangan.destroy',$item->id) }}"
                        method="POST"
                        style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button
                            class="btn btn-danger">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection