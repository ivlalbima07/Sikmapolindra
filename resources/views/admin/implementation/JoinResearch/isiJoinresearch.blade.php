@extends('layouts.header')
@section('content')
    <style>
        .hidden {
            display: none;
        }
    </style>



    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold mb-4"><span class="text-muted fw-light">Sikma |</span>ISI DATA JOINT RESEARCH - PT. SANG BAREKSA
            AGRAPANA
            DAERAH INDRAMAYU</h4>

        <!-- Invoice List Table -->
        <div class="card p-2">
            <div class="card-datatables table-responsive">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#modalToggle" type="button">
                        <i class="bx bx-plus-circle"></i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                        </svg>
                        Tambah
                    </button>
                </div>
                <table class="datatables table table-borderles table-striped dt-advanced-search table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Joint Research</th>
                            <th>Durasi</th>
                            <th>Jumlah Partisipan Peserta</th>
                            <th>Jumlah Partisipan Dosen</th>
                            <th>Nominal Biaya Luar Negeri</th>
                            <th>Nominal Biaya APBN</th>
                            <th>Jumlah Total Biaya</th>
                            <th>Dokumen</th>
                            <th>Bidang Riset</th>
                            <th>Produk Riset</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($joinResets as $index => $joinReset)
                        <tr>
                            <th class="align-top">{{ $index + 1 }}</th>
                            <td class="align-top">{{ $joinReset->nama_joint_research }}</td>
                            <td class="align-top">{{ \Carbon\Carbon::parse($joinReset->tanggal_mulai)->diffInDays(\Carbon\Carbon::parse($joinReset->tanggal_selesai)) }} hari</td>
                            <td class="align-top">{{ $joinReset->mahasiswa_count }}</td> <!-- Menampilkan jumlah mahasiswa -->
                        <td class="align-top">{{ $joinReset->dosen_count }}</td> <!-- Menampilkan jumlah dosen -->
                            <td class="align-top">{{ $joinReset->nominal_biaya_luar_negeri }}</td>
                            <td class="align-top">{{ $joinReset->nominal_biaya_apbn }}</td>
                            <td class="align-top">
                                {{ $joinReset->nominal_biaya_luar_negeri + $joinReset->nominal_biaya_apbn }}
                            </td>
                            <td class="align-top">{{ $joinReset->dokumen }}</td>
                            <td class="align-top">{{ $joinReset->bidang_riset }}</td>
                            <td class="align-top">{{ $joinReset->produk_riset }}</td>
                            <td class="align-top">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('isi-join-research.show', $joinReset->id) }}" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Show data">
                                        <i data-feather="eye"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="{{ $joinReset->id }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete data">
                                        <i data-feather="trash-2"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
             
    </div>




    <div class="modal fade" id="modalToggle" aria-labelledby="modalToggleLabel" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalToggleLabel">Form Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="joinResearchForm" action="{{ route('isi-join-research.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- @dd($itemKerjasamaId) --}}
                        <input type="hidden" name="item_kerjasama_id" value="{{ $itemKerjasamaId }}">
                        <div class="modal-body">
                            <!-- Nama Joint Research -->
                            <div class="col mb-3">
                                <label for="nama_joint_research" class="form-label">Nama Joint Research</label>
                                <input type="text" class="form-control" id="nama_joint_research" name="nama_joint_research" required>
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
                                <select class="form-select" id="bidang_riset" name="bidang_riset" required>
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
                            <!-- Produk Riset -->
                            <div class="col mb-3">
                                <label for="produk_riset" class="form-label">Produk Riset</label>
                                <input type="text" class="form-control" id="produk_riset" name="produk_riset">
                            </div>
                            <!-- Dokumen -->
                            <div class="col mb-3">
                                <label for="dokumen" class="form-label">Dokumen</label>
                                <input class="form-control" type="file" id="dokumen" name="dokumen" />
                            </div>
                            <!-- Sumber Biaya -->
                            <div class="col mb-3">
                                <label for="sumber_biaya" class="form-label">Sumber Biaya</label>
                                <select class="form-select" id="sumber_biaya" name="sumber_biaya" onchange="showHideNominalInputs()" required>
                                    <option value="" hidden>Pilih</option>
                                    <option value="Luar Negeri">Luar Negeri</option>
                                    <option value="APBN">Anggaran Pendapatan dan Belanja Negara</option>
                                    <option value="Sharing Cost">Sharing Cost</option>
                                </select>
                            </div>
                            <div class="col mb-3 hidden" id="nominal_biaya_luar_negeri_wrapper">
                                <label for="nominal_biaya_luar_negeri" class="form-label">Nominal Biaya dari Luar Negeri</label>
                                <div class="input-group">
                                    <span class="input-group-text">RP.</span>
                                    <input type="number" class="form-control" id="nominal_biaya_luar_negeri" name="nominal_biaya_luar_negeri" placeholder="100">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                            <div class="col mb-3 hidden" id="nominal_biaya_apbn_wrapper">
                                <label for="nominal_biaya_apbn" class="form-label">Nominal Biaya dari APBN</label>
                                <div class="input-group">
                                    <span class="input-group-text">RP.</span>
                                    <input type="number" class="form-control" id="nominal_biaya_apbn" name="nominal_biaya_apbn" placeholder="100">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- Mahasiswa Join Reset -->
                        <h4 class="mt-2 text-center">Mahasiswa</h4>
                        <hr>
                        <div class="card-body invoice-repeater">
                            <div data-repeater-list="mahasiswa">
                                <div data-repeater-item>
                                    <div class="row d-flex align-items-end">
                                        <div class="col-md-5 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="mahasiswaNama">Nama</label>
                                                <input type="text" name="mahasiswa[][nama]" class="form-control" placeholder="Masukan Nama" />
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="mahasiswaNim">NIM</label>
                                                <input type="text" name="mahasiswa[][nim]" class="form-control" placeholder="32" />
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
                                                <input type="text" name="mahasiswa[][tempat_lahir]" class="form-control" placeholder="Masukan Nama" />
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="mahasiswaTanggalLahir">Tanggal Lahir</label>
                                                <input type="date" name="mahasiswa[][tanggal_lahir]" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12 mb-50"></div>
                                    </div>
                                    <div class="row d-flex align-items-end">
                                        <div class="col-md-5 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="mahasiswaGender">Jenis Kelamin</label>
                                                <select name="mahasiswa[][jenis_kelamin]" class="form-select">
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
                        <!-- Dosen Join Reset -->
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
                        <!-- Penanggung Jawab Join Reset -->
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
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection





@section('scripts')
    <script>
 function showHideNominalInputs() {
    var sumberBiaya = document.getElementById("sumber_biaya").value;
    var luarNegeriWrapper = document.getElementById("nominal_biaya_luar_negeri_wrapper");
    var apbnWrapper = document.getElementById("nominal_biaya_apbn_wrapper");
    var luarNegeriInput = document.getElementById("nominal_biaya_luar_negeri");
    var apbnInput = document.getElementById("nominal_biaya_apbn");

    luarNegeriWrapper.classList.add('hidden');
    apbnWrapper.classList.add('hidden');
    luarNegeriInput.value = '';
    apbnInput.value = '';

    if (sumberBiaya === 'Luar Negeri') {
        luarNegeriWrapper.classList.remove('hidden');
    } else if (sumberBiaya === 'APBN') {
        apbnWrapper.classList.remove('hidden');
    } else if (sumberBiaya === 'Sharing Cost') {
        luarNegeriWrapper.classList.remove('hidden');
        apbnWrapper.classList.remove('hidden');
    }
}

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
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

    $('.btn-delete').on('click', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var url = `{{ route('isi-join-research.destroy', ':id') }}`.replace(':id', id);

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            customClass: {
                confirmButton: 'btn btn-danger',
                cancelButton: 'btn btn-secondary'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: response.success,
                                customClass: {
                                    confirmButton: 'btn btn-success'
                                },
                                buttonsStyling: false
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'Failed to delete the data.',
                                customClass: {
                                    confirmButton: 'btn btn-danger'
                                },
                                buttonsStyling: false
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: xhr.responseJSON.error || 'Failed to delete the data.',
                            customClass: {
                                confirmButton: 'btn btn-danger'
                            },
                            buttonsStyling: false
                        });
                    }
                });
            }
        });
    });


        $(function() {
            const table = $('.datatables').DataTable({

            })
        });
    </script>
@endsection
