@extends('layouts.header')
@section('content')
    <style>
        #otherOrganizer {
            display: none;
        }

        #otherOrganizer2 {
            display: none;
        }

        .modal-dialog-scrollable .modal-body {
            max-height: calc(100vh - 200px);
            overflow-y: auto;
        }

    </style>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold mb-4"><span class="text-muted fw-light">Sikma |</span>ISI DATA RISET TERAPAN - RUMAH SAKIT UMUM
            DAERAH INDRAMAYU</h4>

        <!-- Invoice List Table -->
        <div class="card p-2">
            <div class="card-datatables table-responsive">
                <div class="d-flex justify-content-end"> <button class="btn btn-success rounded-pill "data-bs-toggle="modal"
                        data-bs-target="#modalToggle" type="submit"><i class="bx bx-plus-circle"></i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                        </svg> Tambah
                    </button> </div>
                    <table class="datatables table table-borderles table-striped dt-advanced-search table">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Judul Riset</th>
                                <th>Bidang Riset</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Jumlah Mahasiswa</th>
                                <th>Jumlah Dosen</th>
                                <th>Nama Peserta Lain</th>
                                <th>Luaran</th>
                                <th>Tahun Pembiayaan</th>
                                <th>Sumber Dana</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($researches as $index => $research)
                            <tr>
                                <td class="align-top">{{ $index + 1 }}</td>
                                <td class="align-top">{{ $research->judul_riset }}</td>
                                <td class="align-top">{{ $research->bidang_riset }}</td>
                                <td class="align-top">{{ $research->tanggal_mulai }}</td>
                                <td class="align-top">{{ $research->tanggal_selesai }}</td>
                                <td class="align-top">{{ $research->mahasiswa_count }}</td>
                                <td class="align-top">{{ $research->dosen_count }}</td>
                                <td class="align-top">{{ $research->nama_peserta_lain }}</td>
                                <td class="align-top">{{ implode(', ', json_decode($research->luaran, true)) }}</td>
                                <td class="align-top">{{ $research->tahun_pembiayaan }}</td>
                                <td class="align-top">
                                    Dunia Kerja: {{ $research->nominal_biaya_dunia_kerja }}<br>
                                    Satuan Pendidikan: {{ $research->nominal_biaya_satuan_pendidikan }}<br>
                                    Pemerintah Daerah: {{ $research->nominal_biaya_pemerintah_daerah }}<br>
                                    Pemerintah Pusat: {{ $research->nominal_biaya_pemerintah_pusat }}
                                </td>
                                <td class="align-top">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Update data"><i data-feather='edit'></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Hapus data"><i data-feather='trash-2'></i></button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>                    
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalToggle" aria-labelledby="modalToggleLabel" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalToggleLabel">Form Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="joinResearchForm" action="{{ route('isiRisetTerapan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="item_kerjasama_id" value="{{ $itemKerjasamaId }}">
                        <div class="modal-body">
                            <!-- Judul Riset -->
                            <div class="col mb-3">
                                <label for="judul_riset" class="form-label">Judul Riset</label>
                                <input type="text" id="judul_riset" name="judul_riset" class="form-control" placeholder="Enter Judul Riset" required>
                            </div>
                            <!-- Tanggal Mulai dan Tanggal Selesai -->
                            <div class="row g-2 mb-3">
                                <div class="col mb-0">
                                    <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                                    <input type="date" name="tanggal_mulai" class="form-control" required>
                                </div>
                                <div class="col mb-0">
                                    <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                                    <input type="date" name="tanggal_selesai" class="form-control" required>
                                </div>
                            </div>
                            <!-- Bidang Riset -->
                            <div class="col mb-3">
                                <label for="bidang_riset" class="form-label">Bidang Riset</label>
                                <select class="form-select" name="bidang_riset" required>
                                    <option value="" hidden>Pilih bidang riset</option>
                                    <option value="Pangan">Pangan</option>
                                    <option value="Kesehatan">Kesehatan</option>
                                    <option value="Energi">Energi</option>
                                    <option value="Pertahanan dan Keamanan">Pertahanan dan Keamanan</option>
                                    <option value="Teknologi Informasi dan Komunikasi">Teknologi Informasi dan Komunikasi</option>
                                    <option value="Kemaritiman">Kemaritiman</option>
                                    <option value="Kebencanaan">Kebencanaan</option>
                                    <option value="Transportasi">Transportasi</option>
                                    <option value="Material Maju">Material Maju</option>
                                    <option value="Sosial Humaniora, Pendidikan Seni, dan Budaya">Sosial Humaniora, Pendidikan Seni, dan Budaya</option>
                                </select>
                            </div>
                            <!-- Nama Peserta Lain -->
                            <div class="col mb-3">
                                <label for="nama_peserta_lain" class="form-label">Nama Peserta Lain</label>
                                <textarea class="form-control" name="nama_peserta_lain"></textarea>
                            </div>
                            <!-- Luaran -->
                            <div class="col mb-3">
                                <label for="luaran" class="form-label">Luaran</label>
                                <select class="select2 form-select" name="luaran[]" multiple>
                                    <option value="Publikasi Ilmiah Jurnal Internasional">Publikasi Ilmiah Jurnal Internasional</option>
                                    <option value="Publikasi Ilmiah Jurnal Nasional Terakreditasi">Publikasi Ilmiah Jurnal Nasional Terakreditasi</option>
                                    <option value="Prosiding">Prosiding</option>
                                    <option value="Buku Hasil Penelitian ber-ISBN">Buku Hasil Penelitian ber-ISBN</option>
                                    <option value="Book Chapter">Book Chapter</option>
                                    <option value="Metode">Metode</option>
                                    <option value="Blue Print">Blue Print</option>
                                    <option value="Sistem">Sistem</option>
                                    <option value="Modal">Modal</option>
                                    <option value="Naskah Kebijakan">Naskah Kebijakan</option>
                                    <option value="Teknologi Tepat Guna (TTG)">Teknologi Tepat Guna (TTG)</option>
                                    <option value="Paten">Paten</option>
                                    <option value="Prototipe R&D">Prototipe R&D</option>
                                    <option value="Prototipe laik Industri">Prototipe laik Industri</option>
                                </select>
                            </div>
                            <!-- Tahun Pembiayaan -->
                            <div class="col mb-3">
                                <label for="tahun_pembiayaan" class="form-label">Tahun Pembiayaan</label>
                                <select name="tahun_pembiayaan" class="form-select">
                                    <option value="" hidden>Pilih Tahun Pembiayaan</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                </select>
                            </div>
                            <!-- Sumber Biaya -->
                            <div class="card-body">
                                <label for="">Sumber Biaya</label>
                                <hr>
                                <div class="col mb-3">
                                    <label for="nominal_biaya_dunia_kerja" class="form-label">Nominal Biaya dari Dunia Kerja</label>
                                    <div class="input-group">
                                        <span class="input-group-text">RP.</span>
                                        <input type="number" class="form-control" name="nominal_biaya_dunia_kerja" placeholder="100">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <label for="nominal_biaya_satuan_pendidikan" class="form-label">Nominal Biaya dari Satuan Pendidikan</label>
                                    <div class="input-group">
                                        <span class="input-group-text">RP.</span>
                                        <input type="number" class="form-control" name="nominal_biaya_satuan_pendidikan" placeholder="100">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <label for="nominal_biaya_pemerintah_daerah" class="form-label">Nominal Biaya dari Pemerintah Daerah</label>
                                    <div class="input-group">
                                        <span class="input-group-text">RP.</span>
                                        <input type="number" class="form-control" name="nominal_biaya_pemerintah_daerah" placeholder="100">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <label for="nominal_biaya_pemerintah_pusat" class="form-label">Nominal Biaya dari Pemerintah Pusat</label>
                                    <div class="input-group">
                                        <span class="input-group-text">RP.</span>
                                        <input type="number" class="form-control" name="nominal_biaya_pemerintah_pusat" placeholder="100">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Mahasiswa -->
                            <h4 class="mt-2 text-center">Mahasiswa</h4>
                            <hr>
                            <div class="card-body invoice-repeater">
                                <div data-repeater-list="mahasiswa_riset">
                                    <div data-repeater-item>
                                        <div class="row d-flex align-items-end">
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="mahasiswaNama">Nama</label>
                                                    <input type="text" name="mahasiswa_riset[][nama]" class="form-control" placeholder="Masukan Nama" />
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="mahasiswaNim">NIM</label>
                                                    <input type="text" name="mahasiswa_riset[][nim]" class="form-control" placeholder="32" />
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
                                                    <label class="form-label" for="mahasiswaTempatLahir">Tempat Lahir</label>
                                                    <input type="text" name="mahasiswa_riset[][tempat_lahir]" class="form-control" placeholder="Masukan Nama" />
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="mahasiswaTanggalLahir">Tanggal Lahir</label>
                                                    <input type="date" name="mahasiswa_riset[][tanggal_lahir]" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-12 mb-50"></div>
                                        </div>
                                        <div class="row d-flex align-items-end">
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="mahasiswaGender">Jenis Kelamin</label>
                                                    <select name="mahasiswa_riset[][jenis_kelamin]" class="form-select">
                                                        <option value="" hidden>Pilih Jenis Kelamin</option>
                                                        <option value="Laki-Laki">Laki-Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-12"></div>
                                            <div class="col-md-2 col-12 mb-50"></div>
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
                            <!-- Dosen -->
                            <h4 class="mt-2 text-center">Dosen</h4>
                            <hr>
                            <div class="card-body invoice-repeater">
                                <div data-repeater-list="dosen">
                                    <div data-repeater-item>
                                        <div class="row d-flex align-items-end">
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="dosenNama">Nama</label>
                                                    <input type="text" name="dosen[][nama]" class="form-control" placeholder="Masukan Nama" />
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="dosenNidn">NIDN</label>
                                                    <input type="text" name="dosen[][nidn]" class="form-control" placeholder="32" />
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
                                                    <label class="form-label" for="dosenTempatLahir">Tempat Lahir</label>
                                                    <input type="text" name="dosen[][tempat_lahir]" class="form-control" placeholder="Masukan Nama" />
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="dosenTanggalLahir">Tanggal Lahir</label>
                                                    <input type="date" name="dosen[][tanggal_lahir]" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-12 mb-50"></div>
                                        </div>
                                        <div class="row d-flex align-items-end">
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="dosenGender">Jenis Kelamin</label>
                                                    <select name="dosen[][jenis_kelamin]" class="form-select">
                                                        <option value="" hidden>Pilih Jenis Kelamin</option>
                                                        <option value="Laki-Laki">Laki-Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-12"></div>
                                            <div class="col-md-2 col-12 mb-50"></div>
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
                            <!-- Penanggung Jawab -->
                            <h4 class="mt-2 text-center">Penanggung Jawab</h4>
                            <hr>
                            <div class="card-body invoice-repeater">
                                <div data-repeater-list="penanggung_jawab">
                                    <div data-repeater-item>
                                        <div class="row d-flex align-items-end">
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="penanggungJawabNama">Nama</label>
                                                    <input type="text" name="penanggung_jawab[][nama]" class="form-control" placeholder="Masukan Nama" />
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="penanggungJawabNidn">NIDN</label>
                                                    <input type="text" name="penanggung_jawab[][nidn]" class="form-control" placeholder="32" />
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
                                                    <label class="form-label" for="penanggungJawabProdi">Prodi</label>
                                                    <input type="text" name="penanggung_jawab[][prodi]" class="form-control" placeholder="Masukan Prodi" />
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-12"></div>
                                            <div class="col-md-2 col-12 mb-50"></div>
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
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    



@endsection

{{-- lainya penyelenggara --}}

@section('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('joinResearchForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission
        let form = this;
        let formData = new FormData(form);

        fetch(form.action, {
            method: form.method,
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    title: 'Success',
                    text: data.success,
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    // Close the modal
                    $('#modalToggle').modal('hide');
                    // Optionally, refresh the page or redirect
                    window.location.reload();
                });
            } else {
                Swal.fire({
                    title: 'Error',
                    text: data.error,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        })
        .catch(error => {
            Swal.fire({
                title: 'Error',
                text: 'An error occurred while saving data.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        });
    });    
</script>
@endsection
