@extends('admin.layout')

@section('content')

            <div class="card ikm-index-card">

                {{-- HEADER --}}
                <div class="card-header bg-primary text-white text-center py-3">
                    <h5 class="mb-0 font-weight-normal">Data IKM</h5>
                </div>

                <div class="card-body">

                    {{-- FILTER --}}
                    <form method="GET">
                        {{-- PENJAGA STATE PER PAGE --}}
                        <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">
                        <div class="row mb-4">

                            {{-- KIRI --}}
                            <div class="col-lg-8">

                                {{-- BARIS 1 --}}
                                <div class="d-flex mb-3" style="gap:10px;">
                                    <select class="form-control form-control-sm"
                                        style="width:150px;border:1px solid #000;color:#000;"
                                        onchange="changePerPage(this.value)">
                                        <option value="10" {{ request('per_page',10)==10 ? 'selected' : '' }}>
                                            Tampilkan : 10
                                        </option>
                                        <option value="50" {{ request('per_page')==50 ? 'selected' : '' }}>
                                            Tampilkan : 50
                                        </option>
                                        <option value="90" {{ request('per_page')==90 ? 'selected' : '' }}>
                                            Tampilkan : 90
                                        </option>
                                    </select>

                                    <select id="filterSelector" class="form-control form-control-sm"
                                        style="width:220px;border:1px solid #000;color:#000;">
                                        <option value="">Cari berdasarkan</option>
                                        <option value="tgl_input">Tanggal Input</option>
                                        <option value="nm_pemilik">Nama Pemilik</option>
                                        <option value="nm_perusahaan_">Nama Perusahaan</option>
                                        <option value="industri_id">Jenis Industri</option>
                                        <option value="nib">NIB</option>
                                    </select>
                                </div>

                                {{-- FILTER AKTIF --}}
                                <div id="filterContainer"></div>

                                {{-- BUTTON --}}
                                <div class="mt-2">
                                    <button class="btn btn-sm btn-outline-primary px-4">Cari</button>
                                    <a href="{{ route('ikm.index', ['per_page' => request('per_page',10)]) }}"
                                        class="btn btn-sm px-4 ml-1"
                                        style="border:1px solid #000;color:#000;">
                                        Reset
                                    </a>
                                </div>

                            </div>

                            {{-- KANAN --}}
                            <div class="col-lg-4 d-flex flex-column align-items-end">
                                <div class="mb-2" style="font-size:13px;">
                                    Total Data: <strong>{{ $ikms->total() }}</strong>
                                </div>

                                <a href="{{ route('ikm.form.personal') }}" class="btn btn-primary btn-sm px-4">
                                    + Tambah Data
                                </a>
                            </div>

                        </div>
                    </form>

                    {{-- TABLE --}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="bg-primary text-white text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Input</th>
                                    <th>Nama Pemilik</th>
                                    <th>Nama Perusahaan</th>
                                    <th style="width:30%;">Jenis Industri</th>
                                    <th>NIB</th>
                                    <th width="150">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($ikms as $i)
                                    <tr>
                                        <td>
                                            {{ ($ikms->currentPage() - 1) * $ikms->perPage() + $loop->iteration }}
                                        </td>
                                        <td>{{ $i->tgl_input }}</td>
                                        <td>{{ $i->nm_pemilik }}</td>
                                        <td>{{ $i->nm_perusahaan_ }}</td>
                                        <td style="white-space:normal;">
                                            <div style="
                                                white-space:normal;
                                                word-break:break-word;
                                                overflow-wrap:break-word;
                                                line-height:1.6;
                                            ">
                                                {{ $i->industri->nama_industri ?? '-' }}
                                            </div>
                                        </td>
                                        <td>{{ $i->nib }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('ikm.show', $i->id) }}" class="btn btn-success btn-sm">
                                                <i class="mdi mdi-eye"></i>
                                            </a>
                                            <form action="{{ route('ikm.destroy', $i->id) }}"
                                                method="POST"
                                                class="d-inline form-delete"
                                                data-confirm="Yakin ingin menghapus data IKM &quot;{{ $i->nm_perusahaan_ }}&quot; ?">
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
                                        <td colspan="7" class="text-center text-muted">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{-- PAGINATION --}}
                    @if ($ikms->hasPages())
                    <div class="mt-3 d-flex justify-content-between align-items-center">

                        <div style="font-size:13px;color:#555;">
                            Menampilkan
                            {{ $ikms->firstItem() }} –
                            {{ $ikms->lastItem() }}
                            dari
                            {{ $ikms->total() }}
                            data
                        </div>

                        <div>
                            {{ $ikms->links('pagination::bootstrap-4') }}
                        </div>

                    </div>
                    @endif
                </div>
    </div>

    {{-- SCRIPT --}}
    <script>
        const selector = document.getElementById('filterSelector');
        const container = document.getElementById('filterContainer');
        const added = new Set();

        selector.addEventListener('change', function() {
            const type = this.value;
            if (!type || added.has(type)) return;
            added.add(type);

            const labels = {
                tgl_input: 'Tanggal Input',
                nm_pemilik: 'Nama Pemilik',
                nm_perusahaan_: 'Nama Perusahaan',
                industri_id: 'Jenis Industri',
                nib: 'NIB'
            };

            let input = '';

            if (type === 'tgl_input') {
                input = `
            <input type="date" name="tgl_input_from"
                   class="form-control form-control-sm mb-1"
                   style="width:220px;border:1px solid #000;">
            <input type="date" name="tgl_input_to"
                   class="form-control form-control-sm"
                   style="width:220px;border:1px solid #000;">
        `;
            }

            if (type === 'nm_pemilik')
                input = `<input type="text" name="nm_pemilik"
                 class="form-control form-control-sm"
                 style="width:220px;border:1px solid #000;">`;

            if (type === 'nm_perusahaan_')
                input = `<input type="text" name="nm_perusahaan_"
                 class="form-control form-control-sm"
                 style="width:220px;border:1px solid #000;">`;

            if (type === 'nib')
                input = `<input type="text" name="nib"
                 class="form-control form-control-sm"
                 style="width:220px;border:1px solid #000;">`;

            if (type === 'industri_id')
                input = `
            <select name="industri_id"
                    class="form-control form-control-sm"
                    style="width:220px;border:1px solid #000;">
                <option value="">Pilih Industri</option>
                @foreach ($industris as $ind)
                    <option value="{{ $ind->id }}">{{ $ind->nama_industri }}</option>
                @endforeach
            </select>
        `;

            container.insertAdjacentHTML('beforeend', `
            <div class="d-flex align-items-center mb-2 filter-item" style="gap:10px;">
                <div style="width:150px;font-size:14px;">
                    ${labels[type]}
                </div>

                <div class="filter-input-wrapper">
                    ${input}
                </div>

                <button type="button" class="btn btn-sm btn-filter-remove">✕</button>
            </div>
    `);

            selector.value = '';
        });

        container.addEventListener('click', function(e) {
            if (e.target.tagName === 'BUTTON') {
                const row = e.target.closest('.filter-item');
                added.delete(row.dataset.type);
                row.remove();
            }
        });

        function changePerPage(value) {
            const form = document.querySelector('form');
            form.querySelector('input[name="per_page"]').value = value;
            form.submit();
        }
    </script>
    <style>
        /* Pagination - biru sama dengan header tabel */
        .pagination .page-link {
            color: #0033b7;
            background-color: #fff;
            border: 1px solid #0033b7;
            margin: 0 2px;
            font-size: 13px;
        }

        .pagination .page-item.active .page-link {
            background-color: #0033b7;
            border-color: #0033b7;
            color: #fff;
        }

        .pagination .page-link:hover {
            background-color: #0033b7;
            border-color: #0033b7;
            color: #fff;
        }

        .pagination .page-item.disabled .page-link {
            color: #aaa;
            background-color: #f5f5f5;
            border-color: #ccc;
        }

        .filter-input-wrapper {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .btn-filter-remove {
            width: 28px;
            height: 28px;
            padding: 0;
            line-height: 1;
            border: 1px solid #000;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-filter-remove:hover {
            background: #dc3545;
            color: #fff;
            border-color: #dc3545;
        }

    </style>

@endsection
