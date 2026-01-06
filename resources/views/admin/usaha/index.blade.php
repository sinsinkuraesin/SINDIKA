@extends('admin.layout')

@section('content')

<div class="card ikm-index-card">

    {{-- HEADER --}}
    <div class="card-header bg-primary text-white text-center py-3">
        <h5 class="mb-0 font-weight-normal">Data Jenis Badan Hukum</h5>
    </div>

    <div class="card-body">

        {{-- KONTROL ATAS --}}
        <div class="row mb-4 align-items-end">

            {{-- KIRI : SEARCH --}}
            <div class="col-lg-8">
                <form action="{{ route('usaha.index') }}" method="GET" style="max-width:350px;">
                    <div class="input-group position-relative">

                        <input type="text"
                               name="kata"
                               class="form-control form-control-sm bg-light pr-4"
                               placeholder="Cari Badan Hukum?"
                               value="{{ request('kata') }}">

                        {{-- TOMBOL CLEAR --}}
                        @if(request('kata'))
                            <a href="{{ route('usaha.index') }}"
                               class="position-absolute text-dark"
                               style="right:55px;top:50%;transform:translateY(-50%);z-index:10;">
                                <i class="mdi mdi-close"></i>
                            </a>
                        @endif

                        <button class="btn btn-primary btn-sm" type="submit">
                            <i class="mdi mdi-magnify"></i>
                        </button>

                    </div>
                </form>
            </div>

            {{-- KANAN : INFO & TAMBAH --}}
            <div class="col-lg-4 d-flex flex-column align-items-end">
                <div class="mb-2" style="font-size:13px;">
                    Total Data: <strong>{{ $usahas->count() }}</strong>
                </div>

                <a href="{{ route('usaha.create') }}"
                   class="btn btn-primary btn-sm px-4">
                    + Tambah Data
                </a>
            </div>

        </div>

        {{-- ALERT --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        @endif

        {{-- TABLE --}}
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">

                <thead class="bg-primary text-white text-center">
                    <tr>
                        <th width="60">No</th>
                        <th>Nama Badan Hukum</th>
                        <th width="140">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($usahas as $usaha)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $usaha->nama_usaha }}</td>
                            <td class="text-center">

                                <a href="{{ route('usaha.edit', $usaha->id) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="mdi mdi-pencil"></i>
                                </a>

                                <form action="{{ route('usaha.destroy', $usaha->id) }}"
                                    method="POST"
                                    class="d-inline form-delete"
                                    data-confirm="Yakin ingin menghapus data &quot;{{ $usaha->nama_usaha }}&quot; ?">
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

        {{-- PAGINATION --}}
        @if(method_exists($usahas, 'hasPages') && $usahas->hasPages())
            <div class="mt-3 d-flex justify-content-between align-items-center">
                <div style="font-size:13px;color:#555;">
                    Menampilkan {{ $usahas->firstItem() }} –
                    {{ $usahas->lastItem() }} dari
                    {{ $usahas->total() }} data
                </div>
                <div>
                    {{ $usahas->links('pagination::bootstrap-4') }}
                </div>
            </div>
        @endif

    </div>
</div>

{{-- STYLE --}}
@push('styles')
<style>
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

.ikm-index-card {
    border-radius: 6px;
    overflow: hidden;
}

.form-control-sm {
    border: 1px solid #000;
}

.table th,
.table td {
    vertical-align: middle;
}
</style>
@endpush

@endsection
