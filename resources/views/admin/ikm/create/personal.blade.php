@extends('admin.layout')

@section('content')

<div class="card ikm-index-card" style="max-width:900px;margin:auto;">

    {{-- HEADER --}}
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
        <h5 class="mb-0 font-weight-normal">
            Tambah Data IKM – Step 1 (Data Personal)
        </h5>

        {{-- ICON BATAL --}}
        <a href="#"
            data-confirm="Yakin ingin membatalkan pengisian data?"
            data-redirect="{{ route('ikm.index', ['cancel_wizard' => 1]) }}"
            style="color:#fff;font-size:20px;">
            <i class="mdi mdi-close"></i>
        </a>
    </div>

    <div class="card-body">

        <form action="{{ route('ikm.store.personal') }}" method="POST">
            @csrf

            <div class="row mb-3 align-items-center">
                <div class="col-md-4 font-weight-bold">Tanggal Input</div>
                <div class="col-md-8">
                    <input type="date" name="tgl_input"
                           class="form-control"
                           value="{{ old('tgl_input', session('ikm_personal.tgl_input') ?? date('Y-m-d')) }}"
                           required>
                </div>
            </div>

            <div class="row mb-3 align-items-center">
                <div class="col-md-4 font-weight-bold">Nama IKM / Pemilik</div>
                <div class="col-md-8">
                    <input type="text" name="nm_pemilik"
                           class="form-control"
                           value="{{ old('nm_pemilik', session('ikm_personal.nm_pemilik') ?? '') }}"
                           required>
                </div>
            </div>

            <div class="row mb-3 align-items-start">
                <div class="col-md-4 font-weight-bold">Alamat Domisili</div>
                <div class="col-md-8">
                    <textarea name="alamatpm" rows="2"
                              class="form-control"
                              required>{{ old('alamatpm', session('ikm_personal.alamatpm') ?? '') }}</textarea>
                </div>
            </div>

            <div class="row mb-3 align-items-center">
                <div class="col-md-4 font-weight-bold">No. Telepon</div>
                <div class="col-md-8">
                    <input type="text" name="telp"
                           class="form-control"
                           value="{{ old('telp', session('ikm_personal.telp') ?? '') }}"
                           required>
                </div>
            </div>

            <div class="row mb-4 align-items-center">
                <div class="col-md-4 font-weight-bold">Email</div>
                <div class="col-md-8">
                    <input type="email" name="email"
                           class="form-control"
                           value="{{ old('email', session('ikm_personal.email') ?? '') }}">
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit"
                        class="btn btn-primary px-5">
                    Lanjut
                </button>
            </div>

        </form>

    </div>
</div>

{{-- STYLE KONSISTEN --}}
@push('styles')
<style>
/* CARD */
.ikm-index-card {
    border-radius: 6px;
    overflow: hidden;
}

/* FONT */
.card-body,
.form-control,
.btn {
    font-size: 14px;
}

/* LABEL */
.font-weight-bold {
    font-weight: 600;
}

/* INPUT */
.form-control {
    border: 1px solid #000;
}

/* HEADER */
.card-header h5 {
    font-size: 16px;
}
</style>
@endpush

@endsection
