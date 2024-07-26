@extends('layouts.header')
@section('content')
    <style>
        #otherOrganizer {
            display: none;
        }

        #otherOrganizer2 {
            display: none;
        }
    </style>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold mb-4"><span class="text-muted fw-light">Sertifikasi /</span> Isi Sertifikasi</h4>
        <div class="card p-2">
            <div class="card-datatables table-responsive">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#modalToggle" type="button">
                        <i class="bx bx-plus-circle"></i> Tambah
                    </button>
                </div>
                <table class="datatables table table-borderless table-striped dt-advanced-search table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($certifications as $certification)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $certification->nama }}</td>
                            <td>{{ $certification->nim }}</td>
                            <td>{{ $certification->tempat_lahir }}</td>
                            <td>{{ $certification->tanggal_lahir }}</td>
                            <td>{{ $certification->jenis_kelamin }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" title="Update data">
                                        <i data-feather='edit'></i>
                                    </button>
                                    <form action="{{ route('Sertifikasi.destroy', $certification->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title="Hapus data">
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
    <div class="modal fade" id="modalToggle" aria-labelledby="modalToggleLabel" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalToggleLabel">Form Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('Sertifikasi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="startDate" class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control" name="tanggal_mulai" required>
                            </div>
                            <div class="col mb-0">
                                <label for="endDate" class="form-label">Tanggal Selesai</label>
                                <input type="date" class="form-control" name="tanggal_selesai" required>
                            </div>
                        </div>
                        <div class="my-1">
                            <label for="organizer" class="form-label">Penyelenggara</label>
                            <input type="text" class="form-control" name="penyelenggara" required>
                        </div>
                        <div class="my-1">
                            <label for="validityPeriod" class="form-label">Masa Berlaku</label>
                            <input type="text" class="form-control" name="masa_berlaku" required>
                        </div>
                        <div class="my-1">
                            <label for="startValidity" class="form-label">Tanggal Mulai Berlaku</label>
                            <input type="date" class="form-control" name="tanggal_mulai_berlaku" required>
                        </div>
                        <div class="my-1">
                            <label for="certificationCost" class="form-label">Biaya Sertifikasi Peserta</label>
                            <input type="number" class="form-control" name="biaya_sertifikasi_peserta" placeholder="10,000">
                        </div>
                        <div class="card-body">
                            <label for="">Sumber Biaya</label>
                            <hr>
                            <div class="card body p-2">
                                <label for="workCost" class="mb-1">Nominal Biaya dari Dunia Kerja</label>
                                <div class="input-group input-group-merge mb-2">
                                    <span class="input-group-text">RP.</span>
                                    <input type="number" class="form-control" name="nominal_biaya_dunia_kerja" placeholder="100">
                                    <span class="input-group-text">.00</span>
                                </div>
                                <label for="educationUnitCost" class="mb-1">Nominal Biaya dari Satuan Pendidikan</label>
                                <div class="input-group input-group-merge mb-2">
                                    <span class="input-group-text">RP.</span>
                                    <input type="number" class="form-control" name="nominal_biaya_satuan_pendidikan" placeholder="100">
                                    <span class="input-group-text">.00</span>
                                </div>
                                <label for="localGovCost" class="mb-1">Nominal Biaya dari Pemerintah Daerah</label>
                                <div class="input-group input-group-merge mb-2">
                                    <span class="input-group-text">RP.</span>
                                    <input type="number" class="form-control" name="nominal_biaya_pemerintah_daerah" placeholder="100">
                                    <span class="input-group-text">.00</span>
                                </div>
                                <label for="centralGovCost" class="mb-1">Nominal Biaya dari Pemerintah Pusat</label>
                                <div class="input-group input-group-merge mb-2">
                                    <span class="input-group-text">RP.</span>
                                    <input type="number" class="form-control" name="nominal_biaya_pemerintah_pusat" placeholder="100">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <label class="form-label" for="exampleFormControlTextarea1">Kompetensi</label>
                            <textarea class="form-control" name="kompetensi" id="exampleFormControlTextarea1" rows="3"
                                placeholder="Isikan Kompentensi Sertifikasi..."></textarea>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="lampiran_bukti" class="form-label">Lampiran Bukti</label>
                                <input class="form-control" type="file" name="lampiran_bukti" id="formFile" />
                            </div>
                        </div>
                        <h4 class="text-center">Data Mahasiswa</h4>
                        <hr>
                        <div class="card-body invoice-repeater">
                            <div data-repeater-list="certificationmhs">
                                <div data-repeater-item>
                                    <div class="row d-flex align-items-end">
                                        <div class="col-md-5 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="itemname">Nama</label>
                                                <input type="text" class="form-control" name="certificationmhs[][nama]" placeholder="Masukan Nama" required>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="itemcost">NIM</label>
                                                <input type="text" class="form-control" name="certificationmhs[][nim]" placeholder="Masukan NIM" required>
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
                                                <label class="form-label" for="itemname">Tempat Lahir</label>
                                                <input type="text" class="form-control" name="certificationmhs[][tempat_lahir]" placeholder="Masukan Tempat Lahir">
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="fp-default">Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="certificationmhs[][tanggal_lahir]">
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12 mb-50">
                                            <div class="mb-1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-end">
                                        <div class="col-md-5 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="mahasiswaGender">Jenis Kelamin</label>
                                                <select name="certificationmhs[][jenis_kelamin]" class="form-select">
                                                    <option value="" hidden>Pilih Jenis Kelamin</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
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
                        <h4 class="text-center">Data Dosen</h4>
                        <hr>
                        <div class="card-body invoice-repeater">
                            <div data-repeater-list="certificationdosens">
                                <div data-repeater-item>
                                    <div class="row d-flex align-items-end">
                                        <div class="col-md-5 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="itemname">Nama</label>
                                                <input type="text" class="form-control" name="certificationdosens[][nama]" placeholder="Masukan Nama" required>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="itemcost">NIDN</label>
                                                <input type="text" class="form-control" name="certificationdosens[][nidn]" placeholder="Masukan NIDN" required>
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
                                                <label class="form-label" for="itemname">Tempat Lahir</label>
                                                <input type="text" class="form-control" name="certificationdosens[][tempat_lahir]" placeholder="Masukan Tempat Lahir">
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="fp-default">Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="certificationdosens[][tanggal_lahir]">
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12 mb-50">
                                            <div class="mb-1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-end">
                                        <div class="col-md-5 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="dosenGender">Jenis Kelamin</label>
                                                <select name="certificationdosens[][jenis_kelamin]" class="form-select">
                                                    <option value="" hidden>Pilih Jenis Kelamin</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
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
                        <h4 class="text-center">Penanggung Jawab</h4>
                        <hr>
                        <div class="card-body invoice-repeater">
                            <div data-repeater-list="certificationpjs">
                                <div data-repeater-item>
                                    <div class="row d-flex align-items-end">
                                        <div class="col-md-5 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="itemname">Nama</label>
                                                <input type="text" class="form-control" name="certificationpjs[][nama]" placeholder="Masukan Nama" required>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="itemcost">NIDN</label>
                                                <input type="text" class="form-control" name="certificationpjs[][nidn]" placeholder="Masukan NIDN" required>
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
                                                <input type="text" class="form-control" name="certificationpjs[][prodi]" placeholder="Masukan Prodi">
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
        const table = $('.datatables').DataTable();
    });
</script>
@endsection
