@extends('admin.layout')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Data Master IKM</h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
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
                                    @foreach ($masters as $master)

                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $master->tgl }}</td>
                                        <td>{{ $master->bdn_usaha }}</td>
                                        <td>{{ $master->perusahaan }}</td>
                                        <td>{{ $master->nm_pemilik }}</td>
                                        <td>{{ $master->jln }}</td>
                                        <td>{{ $master->desa }}</td>
                                        <td>{{ $master->kec}}</td>
                                        <td>{{ $master->no_telp}}</td>
                                        <td>{{ $master->email}}</td>
                                        <td>{{ $master->nib}}</td>
                                        <td>{{ $master->npwp}}</td>
                                        <td>{{ $master->kbli}}</td>
                                        <td>{{ $master->jns_produk}}</td>
                                        <td>{{ $master->skala}}</td>
                                        <td>{{ $master->label_industri}}</td>
                                        <td>{{ $master->jml_tk}} Orang</td>
                                        <td>{{ $master->sppirt}}</td>
                                        <td>{{ $master->halal}}</td>
                                        <td>{{ $master->merk}}</td>
                                        <td>{{ $master->sni}}</td>
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

@push('scripts')
<script>
    $(document).ready(function() {
        // Initialize datatable
        $('.table').DataTable({
            scrollX: true,
            pageLength: 20,
            ordering: true,
            searching: true
        });
    });
</script>
@endpush
