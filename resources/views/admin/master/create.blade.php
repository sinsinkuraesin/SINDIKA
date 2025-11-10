@extends('admin.layout')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Tambah Data IKM</h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('ikm.index') }}">Data IKM</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
        </ol>
      </nav>
    </div>

    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <form action="{{ route('ikm.store') }}" method="POST">
              @csrf
              <div class="form-group">
                <label>Nama Perusahaan</label>
                <input type="text" name="nm_perusahaan" class="form-control" required>
              </div>

              <div class="form-group">
                <label>Nama Pemilik</label>
                <input type="text" name="nm_ikm" class="form-control" required>
              </div>

              <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" rows="3"></textarea>
              </div>

              <div class="form-group">
                <label>Jenis Produk</label>
                <input type="text" name="jenis_produk" class="form-control">
              </div>

              <div class="form-group">
                <label>Skala Usaha</label>
                <select name="skala_usaha" class="form-control">
                  <option value="Mikro">Mikro</option>
                  <option value="Kecil">Kecil</option>
                  <option value="Menengah">Menengah</option>
                </select>
              </div>

              <div class="form-group">
                <label>Jumlah Tenaga Kerja</label>
                <input type="number" name="jml_tenaga_kerja" class="form-control">
              </div>

              <button type="submit" class="btn btn-success">Simpan</button>
              <a href="{{ route('ikm.index') }}" class="btn btn-secondary">Batal</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
