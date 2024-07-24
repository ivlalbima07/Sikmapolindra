@extends('layouts.header')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold mb-4"><span class="text-muted fw-light">Invoice /</span>ISI DATA TENAGA PENDIDIK/TENAGA AHLI DARI DUNIA KERJA (TENAGA PENDIDIK TAMU)</h4>
<button class="btn btn-secondary mb-3" onclick="window.history.back()"> <i data-feather='arrow-left'></i>Kembali</button>
    <!-- Invoice List Table -->
    <div class="card p-2">
        <div class="card-datatables table-responsive">
            <div class="d-flex justify-content-end">
                <button class="btn btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#modalToggle" type="submit">
                    <i class="bx bx-plus-circle"></i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                    </svg> Tambah
                </button>
            </div>
<table class="datatables table table-borderles table-striped dt-advanced-search table">
    <thead>
        <tr>
            <th>NO</th>
            <th>Nama</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Jumlah Pembelajaran</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dosenTamus as $dosenTamu)
        <tr>
            <th class="align-top">{{ $loop->iteration }}</th>
            <td class="align-top">{{ $dosenTamu->nama }}</td>
            <td class="align-top">{{ $dosenTamu->tanggal_mulai }}</td>
            <td class="align-top">{{ $dosenTamu->tanggal_selesai }}</td>
            <td class="align-top">{{ $dosenTamu->mataKuliah->count() }}</td>
            <td class="align-top">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button onclick="location.href='{{ route('dosentamu.show', $dosenTamu->id) }}'" type="button" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Update data">
                        <i data-feather='edit'></i>
                    </button>
                    <form action="{{ route('dosentamu.destroy', $dosenTamu->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="hapus data">
                            <i data-feather='trash-2'></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


        </div>
    </div>
</div>

<!-- Modal 1-->
<div class="modal fade" id="modalToggle" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalToggleLabel">Form Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dosentamu.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="item_kerjasama_id" value="{{ $itemKerjasamaId }}">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Dosen dari DUDI</label>
                            <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" name="nama" />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control invoice-edit-input date-picker" name="tanggal_mulai" />
                        </div>
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Tanggal Selesai</label>
                            <div class="input-group input-group-merge">
                                <input type="date" class="form-control invoice-edit-input date-picker" name="tanggal_selesai" />
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <label for=""> Sumber Biaya </label>
                        <hr>
                        <div class="card body p-2">
                                 <label class="mb-1" for=""> Nominal Biaya dari Dunia Kerja</label>
                             <div class="input-group input-group-merge mb-2">
                                    <span class="input-group-text">RP.</span>
                                    <input type="number" class="form-control" placeholder="100" aria-label="Amount (to the nearest dollar)" name="nominal_biaya_dunia_kerja" />
                                    <span class="input-group-text">.00</span>
                                </div>
                                 <label class="mb-1" for=""> Nominal Biaya dari Satuan Pendidikan</label>
                                <div class="input-group input-group-merge mb-2">
                                    <span class="input-group-text">RP.</span>
                                    <input type="number" class="form-control" placeholder="100" aria-label="Amount (to the nearest dollar)" name="nominal_biaya_satuan_pendidikan" />
                                    <span class="input-group-text">.00</span>
                                </div>
                                
                                <label class="mb-1" for=""> Nominal Biaya dari Pemerintah Daerah</label>
                                <div class="input-group input-group-merge mb-2">
                                    <span class="input-group-text">RP.</span>
                                    <input type="number" class="form-control" placeholder="100" aria-label="Amount (to the nearest dollar)" name="nominal_biaya_pemerintah_daerah" />
                                    <span class="input-group-text">.00</span>
                                </div>
                                <label class="mb-1" for=""> Nominal Biaya dari Pemerintah Pusat</label>
                                <div class="input-group input-group-merge mb-2">
                                    <span class="input-group-text">RP.</span>
                                    <input type="number" class="form-control" placeholder="100" aria-label="Amount (to the nearest dollar)" name="nominal_biaya_pemerintah_pusat" />
                                    <span class="input-group-text">.00</span>
                                </div>

                        </div>

                    </div>

                    <h4 class="text-center" style="text-decoration: underline;">Data Pembelajaran</h4>
                    <hr>

                    <div class="card-body invoice-repeater">
                        <div data-repeater-list="mata_kuliah">
                            <div data-repeater-item>
                                <div class="row d-flex align-items-end">
                                    <div class="col-md-5 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="itemname">Mata Kuliah </label>
                                            <input type="text" class="form-control" id="itemname" aria-describedby="itemname" placeholder="Masukan Nama" name="mata_kuliah[][nama]" />
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-12">
                                        <div class="mb-1">
                                            <label for="nameBasic" class="form-label">Foto/dokumen (.pdf/.jpg/.png/.jpeg)</label>
                                            <input class="form-control" type="file" id="formFile" name="mata_kuliah[][foto_dokumen]" />
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12 mb-50">
                                        <div class="mb-1">
                                            <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                                <i data-feather="x" class="me-25"></i>
                                                <span>Delete</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-end">
                                    <div class="col-md-5 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="itemname">Jumlah JPL</label>
                                            <input type="number" class="form-control" id="itemname" aria-describedby="itemname" placeholder="Masukan Nama" name="mata_kuliah[][jumlah_jpl]" />
                                        </div>
                                    </div>

                                    <div class="col-md-5 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="fp-default">Honorarium Per Jam</label>
                                            <input type="number" class="form-control" id="itemname" aria-describedby="itemname" placeholder="Masukan Nama" name="mata_kuliah[][honorarium_per_jam]" />
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-12 mb-50">
                                        <div class="mb-1">

                                        </div>
                                    </div>
                                </div>
                                <hr />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                    <i data-feather="plus" class="me-25"></i>
                                    <span>Add New</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4 class="mt-2 text-center">Dosen Penanggung Jawab</h4>
                    <hr>
                    <div class="card-body invoice-repeater">
                        <div data-repeater-list="dosen_penanggung_jawab">
                            <div data-repeater-item>
                                <div class="row d-flex align-items-end">
                                    <div class="col-md-5 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="itemname">Nama</label>
                                            <input type="text" class="form-control" id="itemname" aria-describedby="itemname" placeholder="Masukan Nama" name="dosen_penanggung_jawab[][nama]" />
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="itemcost">NIDN</label>
                                            <input type="number" class="form-control" id="itemcost" aria-describedby="itemcost" placeholder="32" name="dosen_penanggung_jawab[][nidn]" />
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12 mb-50">
                                        <div class="mb-1">
                                            <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                                <i data-feather="x" class="me-25"></i>
                                                <span>Delete</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-end">
                                    <div class="col-md-5 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="itemname">Prodi</label>
                                            <input type="text" class="form-control" id="itemname" aria-describedby="itemname" placeholder="Masukan Nama" name="dosen_penanggung_jawab[][prodi]" />
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-12">
                                    </div>
                                    <div class="col-md-2 col-12 mb-50">
                                        <div class="mb-1">
                                        </div>
                                    </div>
                                </div>
                                <hr />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                    <i data-feather="plus" class="me-25"></i>
                                    <span>Add New</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function() {
        const table = $('.datatables').DataTable({

        })
    });
</script>
@endsection
