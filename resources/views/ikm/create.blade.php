@extends('ikm.layout')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Form Input Data IKM Kota Cirebon</h3>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Validasi error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong><br>
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ikm.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Tanggal Input</label>
                <input type="date" name="tgl_input" class="form-control" required>
            </div>

            <div class="col-md-4 mb-3">
                <label>Badan Usaha</label>
                <input type="text" name="badan_usaha" class="form-control" placeholder="CV, UD, PT, dsb">
            </div>

            <div class="col-md-4 mb-3">
                <label>Nama Perusahaan</label>
                <input type="text" name="nm_perusahaan" class="form-control" required>
            </div>

            <div class="col-md-4 mb-3">
                <label>Nama Pemilik (IKM)</label>
                <input type="text" name="nm_ikm" class="form-control" required>
            </div>

            <div class="col-md-8 mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" rows="2"></textarea>
            </div>

            <div class="col-md-4 mb-3">
                <label>NIB</label>
                <input type="text" name="nib" class="form-control">
            </div>

            <div class="col-md-4 mb-3">
                <label>NPWP</label>
                <input type="text" name="npwp" class="form-control">
            </div>

            <div class="col-md-4 mb-3">
                <label>KBLI</label>
                <input type="text" name="npwp" class="form-control">
            </div>
