@extends('admin.layout')

@section('content')

<style>
    .grid-main {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 12px;
    }
    .grid-doc {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 12px;
    }
    @media(max-width: 1100px) {
        .grid-main { grid-template-columns: repeat(2, 1fr); }
        .grid-doc { grid-template-columns: repeat(2, 1fr); }
    }
    @media(max-width: 700px) {
        .grid-main { grid-template-columns: 1fr; }
        .grid-doc { grid-template-columns: 1fr; }
    }
</style>

<div class="card ikm-index-card" style="max-width:1100px;margin:auto;">

    {{-- HEADER --}}
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
        <h5 class="mb-0 font-weight-normal">
            Detail Data IKM
        </h5>

        <a href="{{ route('ikm.index') }}"
           style="color:#fff;font-size:20px;">
            <i class="mdi mdi-close"></i>
        </a>
    </div>

    {{-- BODY --}}
    <div class="card-body">

        {{-- INFO BAR --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div style="font-weight:700;font-size:16px;">
                No. {{ $ikm->id }}
            </div>

            <div style="font-weight:700;font-size:16px;">
                Tanggal Input:
                {{ \Carbon\Carbon::parse($ikm->tgl_input)->format('d-m-Y') }}
            </div>
        </div>

        {{-- 🔽 ISI ASLI TIDAK DIUBAH --}}
        @php
            function box($label, $value) {
                return '
                    <div style="
                        background:#f2f3f5;
                        padding:12px;
                        border-radius:8px;
                        border:1px solid #e3e3e3;
                    ">
                        <div style="font-size:13px;color:#0033b7;font-weight:600;">'.$label.'</div>
                        <div style="font-size:15px;margin-top:4px;">'.($value ?? '-').'</div>
                    </div>
                ';
            }
        @endphp

        <div class="grid-main">
            {!! box('Nama IKM/Pemilik', $ikm->nm_pemilik) !!}
            {!! box('Alamat Domisili', $ikm->alamatpm) !!}
            {!! box('No. Telpon', $ikm->telp) !!}
            {!! box('Email', $ikm->email) !!}
            {!! box('Nama Merek/Perusahaan', $ikm->nm_perusahaan_) !!}
            {!! box('Alamat Usaha', $ikm->alamatpr) !!}
            {!! box('Jenis Produk', $ikm->produk) !!}
            {!! box('Kategori Industri', $ikm->industri->nama_industri ?? '-') !!}
            {!! box('Skala Usaha', ucfirst($ikm->skala)) !!}
            {!! box('Badan Hukum', $ikm->usaha->nama_usaha ?? '-') !!}
            {!! box('Jumlah Tenaga Kerja', $ikm->jml_tk . ' Orang') !!}
        </div>

        <h5 style="margin-top:35px;margin-bottom:15px;font-weight:700;">
            No. Dokumen Pendukung
        </h5>

        <div class="grid-doc">
            {!! box('NIB', $ikm->nib) !!}
            {!! box('NPWP', $ikm->npwp) !!}
            {!! box('KBLI', $ikm->kbli) !!}
            {!! box('Sertifikat Merek', $ikm->merk) !!}
            {!! box('Sertifikat Halal', $ikm->halal) !!}
            {!! box('Sertifikat SNI', $ikm->sni) !!}
            {!! box('Sertifikat SPPIRT', $ikm->sppirt) !!}
        </div>

        <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('ikm.edit', $ikm->id) }}"
               class="btn btn-warning px-4 d-inline-flex align-items-center"
               style="font-weight:500;color:#fff;">
                <i class="mdi mdi-pencil mr-2"></i>
                Edit
            </a>
        </div>

    </div>
</div>

@endsection
