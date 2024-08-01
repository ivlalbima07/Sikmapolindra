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
        <h4 class="fw-bold mb-4"><span class="text-muted fw-light">Sikma |</span>ISI DATA RISET TERAPAN - RUMAH SAKIT UMUM
            DAERAH INDRAMAYU</h4>

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
                            <th>Nama Mahasiswa</th>
                            <th>Status Serapan</th>
                            <th>Gaji</th>
                            <th>Jabatan</th>
                            <th>Tanggal Mulai Kerja</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penyerapan as $index => $item)
                            @foreach ($item->mahasiswa as $mahasiswa)
                            <tr>
                                <th class="align-top">{{ $index + 1 }}</th>
                                <td class="align-top">{{ $mahasiswa->nama }}</td>
                                <td class="align-top">{{ $item->status_serapan }}</td>
                                <td class="align-top">{{ $item->gaji }}</td>
                                <td class="align-top">{{ $item->jabatan }}</td>
                                <td class="align-top">{{ $item->tanggal_mulai_kerja }}</td>
                                <td class="align-top">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Update data">
                                            <i data-feather='edit'></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus data">
                                            <i data-feather='trash-2'></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
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
                    <h5 class="modal-title" id="modalToggleLabel">Form Tambah Data Penyerapan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="joinResearchForm" action="{{ route('isiPenyerapan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="item_kerjasama_id" value="{{ $itemKerjasamaId }}">
                        <div class="modal-body">
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
                            <!-- Status Serapan dan Gaji -->
                            <div class="row g-2 mb-3">
                                <div class="col mb-0">
                                    <label class="form-label" for="status_serapan">Status Serapan</label>
                                    <select class="form-select" name="status_serapan" required>
                                        <option value="" hidden>Pilih Status Serapan</option>
                                        <option value="Tetap">Tenaga Kerja Tetap</option>
                                        <option value="Tidak Tetap">Tenaga Kerja Tidak Tetap</option>
                                    </select>
                                </div>
                                <div class="col mb-0">
                                    <label class="form-label" for="gaji">Gaji</label>
                                    <select class="form-select" name="gaji" required>
                                        <option value="" hidden>Pilih Gaji</option>
                                        <option value="Gaji 1">Gaji 1</option>
                                        <option value="Gaji 2">Gaji 2</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Jabatan dan Tanggal Mulai Bekerja -->
                            <div class="row g-2 mb-3">
                                <div class="col mb-0">
                                    <label class="form-label" for="jabatan">Jabatan</label>
                                    <select class="form-select" name="jabatan" required>
                                        <option value="" hidden>Pilih Jabatan</option>
                                        <option value="CFO">Chief Financial Officer (CFO)</option>
                                        <option value="CIO">Chief Information Officer (CIO)</option>
                                        <option value="CMO">Chief Marketing Officer (CMO)</option>
                                        <option value="COO">Chief Operations Officer (COO)</option>
                                        <option value="HRD">Manager Sumber Daya Manusia (HRD)</option>
                                        <option value="TI">Manager Teknologi Informasi (TI)</option>
                                        <option value="Manajer Pemasaran">Manajer Pemasaran</option>
                                        <option value="Manajer Produk">Manajer Produk</option>
                                        <option value="Manajer Penjualan">Manajer Penjualan</option>
                                        <option value="Staff">Staff</option>
                                        <option value="Karyawan">Karyawan</option>
                                    </select>
                                </div>
                                <div class="col mb-0">
                                    <label for="tanggal_mulai_kerja" class="form-label">Tanggal Mulai Bekerja</label>
                                    <input type="date" name="tanggal_mulai_kerja" class="form-control" required>
                                </div>
                            </div>
                            <hr>
                            <!-- Mahasiswa -->
                            <h4 class="mt-2 text-center">Mahasiswa</h4>
                            <hr>
                            <div class="card-body invoice-repeater">
                                <div data-repeater-list="penyerapan_mahasiswa">
                                    <div data-repeater-item>
                                        <div class="row d-flex align-items-end">
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="mahasiswaNama">Nama</label>
                                                    <input type="text" name="penyerapan_mahasiswa[][nama]" class="form-control" placeholder="Masukan Nama" required />
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="mahasiswaNim">NIM</label>
                                                    <input type="text" name="penyerapan_mahasiswa[][nim]" class="form-control" placeholder="Masukan NIM" required />
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
                                                    <input type="text" name="penyerapan_mahasiswa[][tempat_lahir]" class="form-control" placeholder="Masukan Tempat Lahir" required />
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="mahasiswaTanggalLahir">Tanggal Lahir</label>
                                                    <input type="date" name="penyerapan_mahasiswa[][tanggal_lahir]" class="form-control" required />
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-12 mb-50"></div>
                                        </div>
                                        <div class="row d-flex align-items-end">
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="mahasiswaGender">Jenis Kelamin</label>
                                                    <select name="penyerapan_mahasiswa[][jenis_kelamin]" class="form-select" required>
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
                                <div data-repeater-list="penyerapan_dosen">
                                    <div data-repeater-item>
                                        <div class="row d-flex align-items-end">
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="dosenNama">Nama</label>
                                                    <input type="text" name="penyerapan_dosen[][nama]" class="form-control" placeholder="Masukan Nama" required />
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="dosenNidn">NIDN</label>
                                                    <input type="text" name="penyerapan_dosen[][nidn]" class="form-control" placeholder="Masukan NIDN" required />
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
                                                    <input type="text" name="penyerapan_dosen[][tempat_lahir]" class="form-control" placeholder="Masukan Tempat Lahir" required />
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="dosenTanggalLahir">Tanggal Lahir</label>
                                                    <input type="date" name="penyerapan_dosen[][tanggal_lahir]" class="form-control" required />
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-12 mb-50"></div>
                                        </div>
                                        <div class="row d-flex align-items-end">
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="dosenGender">Jenis Kelamin</label>
                                                    <select name="penyerapan_dosen[][jenis_kelamin]" class="form-select" required>
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
                                <div data-repeater-list="penyerapan_penanggung_jawab">
                                    <div data-repeater-item>
                                        <div class="row d-flex align-items-end">
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="penanggungJawabNama">Nama</label>
                                                    <input type="text" name="penyerapan_penanggung_jawab[][nama]" class="form-control" placeholder="Masukan Nama" required />
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="penanggungJawabNidn">NIDN</label>
                                                    <input type="text" name="penyerapan_penanggung_jawab[][nidn]" class="form-control" placeholder="Masukan NIDN" required />
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
                                                    <input type="text" name="penyerapan_penanggung_jawab[][prodi]" class="form-control" placeholder="Masukan Prodi" required />
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

@section('scripts')
    <script>
        $(function() {
            const table = $('.datatables').DataTable({

            })
        });

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
