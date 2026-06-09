@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Detail Ruangan</h2>
    <table class="table table-bordered">
        <tr>
            <th width="250">
                Nama Ruangan
            </th>
            <td>
                {{ $ruangan->nama_ruangan }}
            </td>
        </tr>
        <tr>
            <th>
                Gedung
            </th>
            <td>
                {{ $ruangan->gedung }}
            </td>
        </tr>
        <tr>
            <th>
                Penanggung Jawab
            </th>
            <td>
                {{ $ruangan->penanggung_jawab }}
            </td>
        </tr>
    </table>
    <a
        href="{{ route('ruangan.index') }}"
        class="btn btn-primary">
        Kembali
    </a>
</div>
@endsection