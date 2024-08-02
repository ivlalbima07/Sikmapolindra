@extends('layouts.header')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold mb-4"><span class="text-muted fw-light">Sikma</span> PKL Dosen</h4>

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
                            <th>Nama Rombel</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Dokumen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pkldosens as $pkldosen)
                            <tr>
                                <th class="align-top">{{ $loop->iteration }}</th>
                                <td class="align-top">{{ $pkldosen->nama_rombel }}</td>
                                <td class="align-top">{{ $pkldosen->tanggal_mulai }}</td>
                                <td class="align-top">{{ $pkldosen->tanggal_selesai }}</td>
                                <td class="align-top">
                                    @if($pkldosen->file)
                                        <a href="{{ asset('uploads/' . $pkldosen->file) }}" target="_blank">Lihat Dokumen</a>
                                    @else
                                        Tidak ada dokumen
                                    @endif
                                </td>
                                <td class="align-top">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('pkldosen.show', $pkldosen->id) }}" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Show data">
                                            <i data-feather="eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="{{ $pkldosen->id }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete data">
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

    <!-- Modal 1-->
    <div class="modal fade" id="modalToggle" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalToggleLabel">Form Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="joinResearchForm" action="{{ route('pkldosen.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="item_kerjasama_id" value="{{ $itemKerjasama->id }}">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label">Nama Rombel</label>
                                <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" name="nama_rombel" />
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="tanggalMulai" class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control invoice-edit-input date-picker" name="tanggal_mulai" />
                            </div>
                            <div class="col mb-0">
                                <label for="tanggalSelesai" class="form-label">Tanggal Selesai</label>
                                <div class="input-group input-group-merge">
                                    <input type="date" class="form-control invoice-edit-input date-picker" name="tanggal_selesai" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="file" class="form-label">Foto/dokumen (.pdf/.jpg/.png/.jpeg)</label>
                                <input class="form-control" type="file" id="file" name="file" />
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label class="form-label" for="biayaPerDosen">Biaya Per Dosen</label>
                                <input type="number" class="form-control numeral-mask" placeholder="10,000" id="biayaPerDosen" name="biaya_per_dosen" />
                            </div>
                            <div class="col mb-0"></div>
                        </div>
                        <div class="card-body">
                            <label for=""> Sumber Biaya </label>
                            <hr>
                            <div class="card body p-2">
                                <label class="mb-1" for="biayaDariDuniaKerja"> Nominal Biaya dari Dunia Kerja</label>
                                <div class="input-group input-group-merge mb-2">
                                    <span class="input-group-text">RP.</span>
                                    <input type="number" class="form-control" placeholder="100" aria-label="Amount (to the nearest dollar)" name="biaya_dari_dunia_kerja" />
                                    <span class="input-group-text">.00</span>
                                </div>
                                <label class="mb-1" for="biayaDariSatuanPendidikan"> Nominal Biaya dari Satuan Pendidikan</label>
                                <div class="input-group input-group-merge mb-2">
                                    <span class="input-group-text">RP.</span>
                                    <input type="number" class="form-control" placeholder="100" aria-label="Amount (to the nearest dollar)" name="biaya_dari_satuan_pendidikan" />
                                    <span class="input-group-text">.00</span>
                                </div>
                                <label class="mb-1" for="biayaDariPemerintahDaerah"> Nominal Biaya dari Pemerintah Daerah</label>
                                <div class="input-group input-group-merge mb-2">
                                    <span class="input-group-text">RP.</span>
                                    <input type="number" class="form-control" placeholder="100" aria-label="Amount (to the nearest dollar)" name="biaya_dari_pemerintah_daerah" />
                                    <span class="input-group-text">.00</span>
                                </div>
                                <label class="mb-1" for="biayaDariPemerintahPusat"> Nominal Biaya dari Pemerintah Pusat</label>
                                <div class="input-group input-group-merge mb-2">
                                    <span class="input-group-text">RP.</span>
                                    <input type="number" class="form-control" placeholder="100" aria-label="Amount (to the nearest dollar)" name="biaya_dari_pemerintah_pusat" />
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                        <h4 class="mt-2 text-center">Pilih Peserta</h4>
                        <hr>
                        <p class="text-center">Tambah Dosen</p>
                        <hr>
                        <div class="card-body invoice-repeater">
                            <div data-repeater-list="pkldosentambah">
                                <div data-repeater-item>
                                    <div class="row d-flex align-items-end">
                                        <div class="col-md-5 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="dosenNama">Nama</label>
                                                <input type="text" class="form-control" aria-describedby="dosenNama" placeholder="Masukan Nama" name="pkldosentambah[0][nama]" />
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="dosenNidn">NIDN</label>
                                                <input type="number" class="form-control" aria-describedby="dosenNidn" placeholder="32" name="pkldosentambah[0][nidn]" />
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
                                                <input type="text" class="form-control" aria-describedby="dosenTempatLahir" placeholder="Masukan Tempat Lahir" name="pkldosentambah[0][tempat_lahir]" />
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="dosenTanggalLahir">Tanggal Lahir</label>
                                                <input type="date" class="form-control invoice-edit-input date-picker" name="pkldosentambah[0][tanggal_lahir]" />
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12 mb-50">
                                            <div class="mb-1"></div>
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-end">
                                        <div class="col-md-5 col-12">
                                            <div class="mb-1">
                                                <label class="d-block form-label">Jenis Kelamin</label>
                                                <div class="form-check my-50">
                                                    <input type="radio" id="validationRadiojq1" name="pkldosentambah[0][jenis_kelamin]" class="form-check-input" value="Male" />
                                                    <label class="form-check-label" for="validationRadiojq1">Male</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" id="validationRadiojq2" name="pkldosentambah[0][jenis_kelamin]" class="form-check-input" value="Female" />
                                                    <label class="form-check-label" for="validationRadiojq2">Female</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-12"></div>
                                        <div class="col-md-2 col-12 mb-50">
                                            <div class="mb-1"></div>
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
                        <p class="text-center">Tambah Instruktur</p>
                        <hr>
                        <div class="card-body invoice-repeater">
                            <div data-repeater-list="pkldoseninstruktur">
                                <div data-repeater-item>
                                    <div class="row d-flex align-items-end">
                                        <div class="col-md-5 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="instrukturNoId">No.ID</label>
                                                <input type="number" class="form-control" aria-describedby="instrukturNoId" placeholder="32" name="pkldoseninstruktur[0][no_id]" />
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="instrukturNama">Nama</label>
                                                <input type="text" class="form-control" aria-describedby="instrukturNama" placeholder="Masukan Nama" name="pkldoseninstruktur[0][nama]" />
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
                                                <label class="form-label" for="instrukturJabatan">Jabatan</label>
                                                <input type="text" class="form-control" aria-describedby="instrukturJabatan" placeholder="Masukan Jabatan" name="pkldoseninstruktur[0][jabatan]" />
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="instrukturNoTelepon">No. Telepon</label>
                                                <input type="number" class="form-control invoice-edit-input date-picker" name="pkldoseninstruktur[0][no_telepon]" />
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12 mb-50"></div>
                                    </div>
                                    <div class="row d-flex align-items-end">
                                        <div class="col-md-5 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="instrukturEmail">Email</label>
                                                <input type="email" class="form-control" aria-describedby="instrukturEmail" placeholder="Masukan Email" name="pkldoseninstruktur[0][email]" />
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-12"></div>
                                        <div class="col-md-2 col-12 mb-50">
                                            <div class="mb-1"></div>
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
                        <p class="text-center">Tambah Penanggung Jawab</p>
                        <hr>
                        <div class="card-body invoice-repeater">
                            <div data-repeater-list="pkldosenpj">
                                <div data-repeater-item>
                                    <div class="row d-flex align-items-end">
                                        <div class="col-md-5 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="penanggungJawabNama">Nama</label>
                                                <input type="text" class="form-control" aria-describedby="penanggungJawabNama" placeholder="Masukan Nama" name="pkldosenpj[0][nama]" />
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="penanggungJawabNidn">NIDN</label>
                                                <input type="number" class="form-control" aria-describedby="penanggungJawabNidn" placeholder="32" name="pkldosenpj[0][nidn]" />
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
                                                <input type="text" class="form-control" aria-describedby="penanggungJawabProdi" placeholder="Masukan Prodi" name="pkldosenpj[0][prodi]" />
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-12"></div>
                                        <div class="col-md-2 col-12 mb-50">
                                            <div class="mb-1"></div>
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


    $(document).ready(function() {
    // CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#joinResearchForm').on('submit', function(e) {
        e.preventDefault();
        let form = $(this);
        let actionUrl = form.attr('action');
        let method = form.find('input[name="_method"]').val() || 'POST';

        // Clear previous errors
        $('.text-danger').html('');

        $.ajax({
            type: method,
            url: actionUrl,
            data: new FormData(this),
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log(response); // Tambahkan ini untuk melihat respons di konsol
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: response.message,
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
                        text: response.message,
                        customClass: {
                            confirmButton: 'btn btn-danger'
                        },
                        buttonsStyling: false
                    });
                }
            },
            error: function(xhr) {
                console.log(xhr); // Tambahkan ini untuk melihat kesalahan di konsol
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    for (let key in errors) {
                        if (errors.hasOwnProperty(key)) {
                            let errorField = key.replace(/\./g, '-');
                            $('#error-' + errorField).html(errors[key][0]);
                        }
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Terjadi kesalahan saat mengirim data.',
                        customClass: {
                            confirmButton: 'btn btn-danger'
                        },
                        buttonsStyling: false
                    });
                }
            }
        });
    });

    $('.btn-delete').on('click', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    var url = `{{ route('pkldosen.destroy', ':id') }}`.replace(':id', id);

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



    });

</script>
@endsection
