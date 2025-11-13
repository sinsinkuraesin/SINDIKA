@extends('admin.layout')

@section('content')
<div class="main-panel">
    <div class="content-wrapper pb-0">
        <div class="page-header flex-wrap">
            <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                <div class="d-flex align-items-center">
                    <a href="#">
                        <p class="m-0 pr-3"> Data Jenis Usaha</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('usaha.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_usaha" class="form-label">Jenis Usaha</label>
                                <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Tambahkan pembeda visual antar baris dan header */
    .table th {
        background-color: #007bff !important;
        color: white !important;
        font-weight: 600;
        border: 1px solid #dee2e6;
        vertical-align: middle !important;
    }

    .table td {
        border: 1px solid #dee2e6;
        vertical-align: middle !important;
    }

    .table tbody tr:hover {
        background-color: #f5f5f5;
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        $('.table').DataTable({
            scrollX: true,
            pageLength: 20,
            ordering: true,
            searching: true
        });
    });
</script>
@endpush
