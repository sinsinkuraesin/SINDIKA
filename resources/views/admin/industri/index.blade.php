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
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="{{ route('industri.create') }}"
                            class="btn btn-primary d-flex align-items-center justify-content-center"
                            style="gap: 6px; padding-left: 20px; padding-right: 20px;">
                                <i class="mdi mdi-plus" style="font-size: 18px;"></i>
                                <span>Tambah Data</span>
                            </a>
                        </div>
                        <form action="/cariin" method="GET" style="max-width: 350px;">
                            @csrf
                            <div class="input-group mb-3 position-relative">
                                <input type="text" name="kata"
                                    class="form-control bg-light"
                                    placeholder="Cari Jenis Industri?" required
                                    style="border-color: #0d2fb8;"
                                    value="{{ request('kata') }}">

                                <button class="btn btn-primary d-flex align-items-center" type="submit" style="border-top-left-radius: 0; border-bottom-left-radius: 0;">
                                    <i class="mdi mdi-magnify" style="font-size: 18px;"></i>
                                    Cari
                                </button>
                                @if(request('kata'))
                                <a href="{{ route('industri.index') }}" class="btn btn-transparent position-absolute" style="right: 80px; top: 6px; z-index: 2; padding: 0 10px; height: 32px; display: flex; align-items: center; border: none; box-shadow: none; background: transparent; border-radius: 50%;">
                                    <i class="mdi mdi-close" style="font-size: 18px;"></i>
                                </a>
                                @endif
                            </div>
                        </form>
                        @if ($message = Session::get('success'))
                            <div class=" m-2 alert alert-primary">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="bg-primary text-white text-center bold">
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

