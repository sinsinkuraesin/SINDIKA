<style>
  .table thead th {
    background-color: #1e4de6;
    color: #fff;
    font-weight: bold;
    border-color: #1e4de6;
  }
</style>

@extends('admin.layout')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Data Master IKM</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data IKM</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title">Daftar IKM</h4>
                            <button type="button" class="btn btn-primary">
                                <i class="mdi mdi-plus"></i> Tambah Data
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Badan Usaha</th>
                                        <th>Perusahaan</th>
                                        <th>Nama Pemilik</th>
                                        <th>Alamat</th>
                                        <th>Desa</th>
                                        <th>Kecamatan</th>
                                        <th>No. Telepon</th>
                                        <th>Email</th>
                                        <th>NIB</th>
                                        <th>NPWP</th>
                                        <th>KBLI</th>
                                        <th>Jenis Produk</th>
                                        <th>Skala</th>
                                        <th>Label Industri</th>
                                        <th>Jumlah TK</th>
                                        <th>SPPIRT</th>
                                        <th>Halal</th>
                                        <th>Merk</th>
                                        <th>SNI</th>
                                        <th>Detail</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>2023-11-06</td>
                                        <td>PT</td>
                                        <td>Nama Perusahaan</td>
                                        <td>John Doe</td>
                                        <td>Jl. Contoh No. 123</td>
                                        <td>Desa Contoh</td>
                                        <td>Kec. Contoh</td>
                                        <td>08123456789</td>
                                        <td>email@example.com</td>
                                        <td>1234567890</td>
                                        <td>12.345.678.9-012.000</td>
                                        <td>10510</td>
                                        <td>Produk A</td>
                                        <td>Menengah</td>
                                        <td>Label A</td>
                                        <td>50</td>
                                        <td>Ya</td>
                                        <td>Ya</td>
                                        <td>Merk A</td>
                                        <td>Ya</td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm">
                                                <i class="mdi mdi-eye"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-success btn-sm">
                                                    <i class="mdi mdi-pencil"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm">
                                                    <i class="mdi mdi-delete"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
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

@push('scripts')
<script>
    $(document).ready(function() {
        // Initialize datatable
        $('.table').DataTable({
            scrollX: true,
            pageLength: 10,
            ordering: true,
            searching: true
        });
    });
</script>
@endpush
