@extends('admin.layout')

@section('content')
<div class="main-panel">
    <div class="content-wrapper pb-0">
        <div class="page-header flex-wrap">
            <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                <div class="d-flex align-items-center">
                    <a href="#">
                        <p class="m-0 pr-3">Data Industri</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <a href="{{ route('industri.create') }}" class="btn btn-primary">
                                <i class="mdi mdi-plus"></i> Tambah Data
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-primary text-center bold">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Industri</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($industris as $industri)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $industri->nama_industri}}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('industri.edit', $industri->id) }}" class="btn btn-success btn-sm">
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>
                                                <form action="{{ route('industri.destroy', $industri->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <div>
                                Menampilkan 1-10 dari 100 data
                            </div>
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

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
