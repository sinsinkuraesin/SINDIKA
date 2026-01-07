@extends('admin.layout')

@section('content')

<div class="card ikm-index-card" style="max-width:900px;margin:auto;">

    {{-- HEADER --}}
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
        <h5 class="mb-0 font-weight-normal">
            Tambah Data IKM – Step 2 (Data Usaha)
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

        <form action="{{ route('ikm.store.usaha') }}" method="POST">
            @csrf

            {{-- NAMA USAHA --}}
            <div class="row mb-3 align-items-center">
                <div class="col-md-4 font-weight-bold">Nama Merek / Perusahaan</div>
                <div class="col-md-8">
                    <input type="text" name="nm_perusahaan_"
                           class="form-control"
                           value="{{ old('nm_perusahaan_', session('ikm_usaha.nm_perusahaan_')) }}"
                           required>
                </div>
            </div>

            {{-- ALAMAT --}}
            <div class="row mb-3 align-items-start">
                <div class="col-md-4 font-weight-bold">Alamat Usaha</div>
                <div class="col-md-8">
                    <textarea name="alamatpr" rows="2"
                              class="form-control"
                              required>{{ old('alamatpr', session('ikm_usaha.alamatpr')) }}</textarea>
                </div>
            </div>

            {{-- PRODUK --}}
            <div class="row mb-3 align-items-center">
                <div class="col-md-4 font-weight-bold">Jenis Produk</div>
                <div class="col-md-8">
                    <input type="text" name="produk"
                           class="form-control"
                           value="{{ old('produk', session('ikm_usaha.produk')) }}">
                </div>
            </div>

            {{-- INDUSTRI --}}
            <div class="row mb-3 align-items-center">
                <div class="col-md-4 font-weight-bold">Kategori Industri</div>
                <div class="col-md-8">
                    <select name="industri_id"
                            class="form-control select-required"
                            required>
                        <option value="" disabled selected hidden>-- Pilih Industri --</option>
                        @foreach($industris as $ind)
                            <option value="{{ $ind->id }}"
                                {{ old('industri_id', session('ikm_usaha.industri_id')) == $ind->id ? 'selected' : '' }}>
                                {{ $ind->nama_industri }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- SKALA --}}
            <div class="row mb-3 align-items-center">
                <div class="col-md-4 font-weight-bold">Skala Usaha</div>
                <div class="col-md-8">
                    <select name="skala"
                            class="form-control select-required"
                            required>
                        <option value="" disabled selected hidden>-- Pilih Skala --</option>
                        <option value="kecil" {{ old('skala', session('ikm_usaha.skala')) == 'kecil' ? 'selected' : '' }}>Kecil</option>
                        <option value="menengah" {{ old('skala', session('ikm_usaha.skala')) == 'menengah' ? 'selected' : '' }}>Menengah</option>
                        <option value="besar" {{ old('skala', session('ikm_usaha.skala')) == 'besar' ? 'selected' : '' }}>Besar</option>
                    </select>
                </div>
            </div>

            {{-- BADAN HUKUM --}}
            <div class="row mb-3 align-items-center">
                <div class="col-md-4 font-weight-bold">Badan Hukum</div>
                <div class="col-md-8">
                    <select name="usaha_id"
                            class="form-control select-required"
                            required>
                        <option value="" disabled selected hidden>-- Pilih Usaha --</option>
                        @foreach($usahas as $u)
                            <option value="{{ $u->id }}"
                                {{ old('usaha_id', session('ikm_usaha.usaha_id')) == $u->id ? 'selected' : '' }}>
                                {{ $u->nama_usaha }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- TENAGA KERJA --}}
            <div class="row mb-4 align-items-center">
                <div class="col-md-4 font-weight-bold">Jumlah Tenaga Kerja</div>
                <div class="col-md-8">
                    <input type="number" name="jml_tk"
                           class="form-control"
                           min="1"
                           value="{{ old('jml_tk', session('ikm_usaha.jml_tk')) }}"
                           required>
                </div>
            </div>

            {{-- ACTION --}}
            <div class="d-flex justify-content-between">
                <a href="{{ route('ikm.form.personal') }}"
                   class="btn btn-secondary px-4">
                    Kembali
                </a>

                <button type="submit"
                        class="btn btn-primary px-5">
                    Lanjut
                </button>
            </div>

        </form>

    </div>
</div>

{{-- STYLE --}}
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

/* SELECT STATE */
select.form-control {
    color: #6c757d;
    -webkit-text-fill-color: #6c757d;
    background-color: #fff;
}

select.form-control.has-value {
    color: #212529 !important;
    -webkit-text-fill-color: #212529 !important;
}

/* HEADER */
.card-header h5 {
    font-size: 16px;
}
</style>
@endpush

{{-- SCRIPT --}}
@push('scripts')
<script>
document.querySelectorAll('.select-required').forEach(select => {
    if (select.value) select.classList.add('has-value');

    select.addEventListener('change', function () {
        this.classList.toggle('has-value', !!this.value);
    });
});
</script>
@endpush

@endsection
