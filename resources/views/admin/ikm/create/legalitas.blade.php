@extends('admin.layout')

@section('content')

<div class="card ikm-index-card" style="max-width:900px;margin:auto;">

    {{-- HEADER --}}
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
        <h5 class="mb-0 font-weight-normal">
            Tambah Data IKM – Step 3 (Legalitas)
        </h5>

        <a href="#"
            data-confirm="Yakin ingin membatalkan pengisian data?"
            data-redirect="{{ route('ikm.index', ['cancel_wizard' => 1]) }}"
            style="color:#fff;font-size:20px;">
            <i class="mdi mdi-close"></i>
        </a>
    </div>

    <div class="card-body">

        <p class="mb-4" style="font-size:14px;">
            Centang dan isi sesuai data yang Anda miliki:
        </p>

        <form action="{{ route('ikm.store.legalitas') }}" method="POST">
            @csrf

            @php
                $items = [
                    'nib' => 'NIB',
                    'npwp' => 'NPWP',
                    'kbli' => 'KBLI',
                    'merk' => 'Merek',
                    'halal' => 'Halal',
                    'sni' => 'SNI',
                    'sppirt' => 'SPPIRT'
                ];
            @endphp

            @foreach ($items as $key => $label)
            <div class="row mb-3 align-items-center legal-row">

                {{-- CHECKBOX + LABEL (SATU BLOK) --}}
                <div class="col-md-4 legal-left">
                    <input type="checkbox"
                        name="{{ $key }}_check"
                        class="toggle-check"
                        data-target="{{ $key }}">

                    <span class="font-weight-bold">{{ $label }}</span>
                </div>

                {{-- INPUT --}}
                <div class="col-md-8 legal-right">
                    <input type="text"
                        name="{{ $key }}"
                        class="form-control {{ $key }}-input"
                        placeholder="Isi jika memiliki {{ $label }}"
                        disabled>
                </div>

            </div>
            @endforeach

            {{-- ACTION --}}
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('ikm.form.usaha') }}" class="btn btn-secondary px-4">
                    Kembali
                </a>

                <button type="submit" class="btn btn-primary px-5">
                    Simpan Data IKM
                </button>
            </div>

        </form>

    </div>
</div>

{{-- JS (TETAP) --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.toggle-check').forEach(chk => {
        chk.addEventListener('change', function () {
            const target = document.querySelector(`.${this.dataset.target}-input`);
            target.disabled = !this.checked;

            if (!this.checked) target.value = '';
        });
    });
});
</script>

{{-- STYLE (DISESUAIKAN STEP 2) --}}
@push('styles')
<style>
/* CARD */
.ikm-index-card {
    border-radius: 6px;
    overflow: hidden;
}

/* FONT GLOBAL */
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

/* BLOK CHECKBOX + LABEL */
.legal-left {
    display: flex;
    align-items: center;
    gap: 10px;
}

/* CHECKBOX */
.legal-left input[type="checkbox"] {
    width: 16px;
    height: 16px;
    cursor: pointer;
}

/* RESPONSIVE MOBILE */
@media (max-width: 576px) {
    .legal-row {
        align-items: flex-start;
    }

    .legal-left {
        margin-bottom: 6px;
    }
}
</style>
@endpush

@endsection
