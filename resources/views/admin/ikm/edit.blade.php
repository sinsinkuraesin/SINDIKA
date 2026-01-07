@extends('admin.layout')

@section('content')

<style>
    /* GRID */
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
    @media(max-width:1100px){
        .grid-main { grid-template-columns: repeat(2,1fr); }
        .grid-doc { grid-template-columns: repeat(2,1fr); }
    }
    @media(max-width:700px){
        .grid-main, .grid-doc { grid-template-columns: 1fr; }
    }

    /* BOX */
    .edit-box {
        background:#f2f3f5;
        padding:12px;
        border-radius:8px;
        border:1px solid #e3e3e3;
    }
    .edit-box label {
        font-size:13px;
        color:#0033b7;
        font-weight:600;
        margin-bottom:4px;
        display:block;
    }
</style>

<div class="card ikm-index-card" style="max-width:1100px;margin:auto;">

    {{-- HEADER --}}
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
        <h5 class="mb-0 font-weight-normal">Edit Data IKM</h5>

        <a href="#"
           data-confirm="Batalkan edit data IKM?"
           data-redirect="{{ route('ikm.show', $ikm->id) }}"
           style="color:#fff;font-size:20px;">
            <i class="mdi mdi-close"></i>
        </a>
    </div>

    <div class="card-body">

        {{-- INFO BAR --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div style="font-weight:700;font-size:16px;">No. {{ $ikm->id }}</div>
            <div style="font-weight:700;font-size:16px;">
                Tanggal Input:
                {{ \Carbon\Carbon::parse($ikm->tgl_input)->format('d-m-Y') }}
            </div>
        </div>

        <form method="POST" action="{{ route('ikm.update', $ikm->id) }}">
            @csrf
            @method('PUT')

            {{-- DATA UTAMA --}}
            <div class="grid-main">

                <div class="edit-box">
                    <label>Tanggal Input</label>
                    <input type="date" name="tgl_input" class="form-control"
                           value="{{ $ikm->tgl_input }}" required>
                </div>

                <div class="edit-box">
                    <label>Nama IKM/Pemilik</label>
                    <input type="text" name="nm_pemilik" class="form-control"
                           value="{{ $ikm->nm_pemilik }}" required>
                </div>

                <div class="edit-box">
                    <label>Alamat Domisili</label>
                    <textarea name="alamatpm" rows="2"
                              class="form-control" required>{{ $ikm->alamatpm }}</textarea>
                </div>

                <div class="edit-box">
                    <label>No. Telepon</label>
                    <input type="text" name="telp" class="form-control"
                           value="{{ $ikm->telp }}" required>
                </div>

                <div class="edit-box">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control"
                           value="{{ $ikm->email }}">
                </div>

                <div class="edit-box">
                    <label>Nama Merek/Perusahaan</label>
                    <input type="text" name="nm_perusahaan_" class="form-control"
                           value="{{ $ikm->nm_perusahaan_ }}" required>
                </div>

                <div class="edit-box">
                    <label>Alamat Usaha</label>
                    <textarea name="alamatpr" rows="2"
                              class="form-control" required>{{ $ikm->alamatpr }}</textarea>
                </div>

                <div class="edit-box">
                    <label>Jenis Produk</label>
                    <input type="text" name="produk" class="form-control"
                           value="{{ $ikm->produk }}">
                </div>

                <div class="edit-box">
                    <label>Kategori Industri</label>
                    <select name="industri_id" class="form-control" required>
                        @foreach(\App\Models\Industri::all() as $ind)
                            <option value="{{ $ind->id }}"
                                {{ $ikm->industri_id == $ind->id ? 'selected' : '' }}>
                                {{ $ind->nama_industri }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="edit-box">
                    <label>Skala Usaha</label>
                    <select name="skala" class="form-control" required>
                        <option value="kecil" {{ $ikm->skala=='kecil'?'selected':'' }}>Kecil</option>
                        <option value="menengah" {{ $ikm->skala=='menengah'?'selected':'' }}>Menengah</option>
                        <option value="besar" {{ $ikm->skala=='besar'?'selected':'' }}>Besar</option>
                    </select>
                </div>

                <div class="edit-box">
                    <label>Badan Hukum</label>
                    <select name="usaha_id" class="form-control" required>
                        @foreach(\App\Models\Usaha::all() as $u)
                            <option value="{{ $u->id }}"
                                {{ $ikm->usaha_id == $u->id ? 'selected' : '' }}>
                                {{ $u->nama_usaha }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="edit-box">
                    <label>Jumlah Tenaga Kerja</label>
                    <input type="number" name="jml_tk" min="1"
                           class="form-control"
                           value="{{ $ikm->jml_tk }}" required>
                </div>

            </div>

            {{-- LEGALITAS --}}
            <h5 class="mt-5 mb-3 font-weight-bold">No. Dokumen Pendukung</h5>

            @php
                $docs = [
                    'nib'=>'NIB','npwp'=>'NPWP','kbli'=>'KBLI',
                    'merk'=>'Sertifikat Merek','halal'=>'Sertifikat Halal',
                    'sni'=>'SNI','sppirt'=>'SPPIRT'
                ];
            @endphp

            <div class="grid-doc">
                @foreach($docs as $key=>$label)
                <div class="edit-box">
                    <label>
                        <input type="checkbox"
                               class="doc-check"
                               data-target="{{ $key }}"
                               {{ $ikm->{$key} ? 'checked' : '' }}>
                        {{ $label }}
                    </label>

                    <input type="text"
                           name="{{ $key }}"
                           class="form-control mt-2 {{ $key }}-input"
                           value="{{ $ikm->{$key} }}"
                           {{ $ikm->{$key} ? '' : 'disabled' }}>
                </div>
                @endforeach
            </div>

            {{-- ACTION --}}
            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-primary px-5">
                    Simpan Perubahan
                </button>
            </div>

        </form>
    </div>
</div>

<script>
document.querySelectorAll('.doc-check').forEach(chk => {
    chk.addEventListener('change', function () {
        const input = document.querySelector('.' + this.dataset.target + '-input');
        input.disabled = !this.checked;
        if (!this.checked) input.value = '';
    });
});
</script>

@endsection
