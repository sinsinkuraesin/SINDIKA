@extends('admin.layout')

@section('content')

<div class="card ikm-index-card" style="max-width:900px;margin:auto;">

    {{-- HEADER --}}
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
        <h5 class="mb-0 font-weight-normal">
            Tambah Data Industri
        </h5>

        <a href="#"
            data-confirm="Batalkan tambah data industri?"
            data-redirect="{{ route('industri.index') }}"
            style="color:#fff;font-size:20px;">
            <i class="mdi mdi-close"></i>
        </a>
    </div>

    <div class="card-body">

        <form action="{{ route('industri.store') }}" method="POST">
            @csrf

            {{-- NAMA INDUSTRI --}}
            <div class="row mb-4 align-items-center">
                <div class="col-md-4 font-weight-bold">
                    Nama Industri
                </div>
                <div class="col-md-8">
                    <input type="text"
                           name="nama_industri"
                           class="form-control"
                           required>
                </div>
            </div>

            {{-- ACTION --}}
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary px-5">
                    Simpan
                </button>
            </div>

        </form>

    </div>
</div>

{{-- STYLE KONSISTEN DENGAN IKM --}}
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
