@extends('admin.layout')

@section('content')

<div class="card ikm-index-card">

    {{-- HEADER --}}
    <div class="card-header bg-primary text-white text-center py-3">
        <h5 class="mb-0 font-weight-normal">Data Industri</h5>
    </div>

    <div class="card-body">

        {{-- KONTROL ATAS --}}
        <div class="row mb-4 align-items-end">

            {{-- KIRI --}}
            <div class="col-lg-8">

                <form action="/cariin" method="GET" style="max-width:320px;">
                    <div class="input-group position-relative">
                        <input type="text"
                               name="kata"
                               class="form-control form-control-sm bg-light"
                               placeholder="Cari Jenis Industri?"
                               value="{{ request('kata') }}"
                               required>

                        <button class="btn btn-primary btn-sm" type="submit">
                            <i class="mdi mdi-magnify"></i>
                        </button>

                        @if(request('kata'))
                            <a href="{{ route('industri.index') }}"
                               class="btn btn-transparent position-absolute"
                               style="right:40px;top:5px;padding:5px;">
                                <i class="mdi mdi-close"></i>
                            </a>
                        @endif
                    </div>
                </form>

            </div>

            {{-- KANAN --}}
            <div class="col-lg-4 d-flex flex-column align-items-end">
                <div class="mb-2" style="font-size:13px;">
                    Total Data: <strong>{{ $industris->count() }}</strong>
                </div>

                <a href="{{ route('industri.create') }}"
                   class="btn btn-primary btn-sm px-4">
                    + Tambah Data
                </a>
            </div>

        </div>

        {{-- ALERT --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-primary">{{ $message }}</div>
        @endif

        {{-- TABLE --}}
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">

                <thead class="bg-primary text-white text-center">
                    <tr>
                        <th width="60">No</th>
                        <th>Nama Industri</th>
                        <th width="140">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($industris as $industri)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>

                            <td style="white-space:normal;">
                                <div style="
                                    white-space:normal;
                                    word-break:break-word;
                                    overflow-wrap:break-word;
                                    line-height:1.6;
                                ">
                                    {{ $industri->nama_industri }}
                                </div>
                            </td>

                            <td class="text-center">
                                <a href="{{ route('industri.edit', $industri->id) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="mdi mdi-pencil"></i>
                                </a>

                                <form action="{{ route('industri.destroy', $industri->id) }}"
                                    method="POST"
                                    class="d-inline form-delete"
                                    data-confirm="Yakin ingin menghapus data &quot;{{ $industri->nama_industri }}&quot; ?">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">
                                Tidak ada data
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>
</div>

{{-- STYLE KONSISTEN --}}
@push('styles')
<style>
/* FONT KONSISTEN */
.card-body,
table,
.form-control,
.btn,
td,
th {
    font-size: 14px;
    font-weight: 400;
}

h5 {
    font-size: 16px;
}

/* CARD */
.ikm-index-card {
    border-radius: 6px;
    overflow: hidden;
}

/* INPUT */
.form-control-sm {
    border: 1px solid #000;
}

/* TABLE */
.table th,
.table td {
    vertical-align: middle;
}
</style>
@endpush

@endsection
