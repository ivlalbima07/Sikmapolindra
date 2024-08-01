@extends('layouts.header')

<style>
    .text-danger {
        color: red;
    }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">


@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold mb-4"><span class="text-muted fw-light">Invoice /</span>ISI DATA TENAGA PENDIDIK/TENAGA AHLI DARI DUNIA KERJA (TENAGA PENDIDIK TAMU)</h4>
<button class="btn btn-secondary mb-3" onclick="window.history.back()"> <i data-feather='arrow-left'></i>Kembali</button>
    <!-- Invoice List Table -->
    <div class="card p-2">
        <div class="card-datatables table-responsive">
            <div class="d-flex justify-content-end mb-2">
                <button id="btn-tambah" class="btn btn-success rounded-pill">
                    <i class="bx bx-plus-circle"></i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5.5 0 0 1 0 1h-3v3a.5.5.5 0 0 1-1 0v-3h-3a.5.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                    </svg> Tambah
                </button>
            </div>
            <table class="datatables table table-borderless table-striped dt-advanced-search table">
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
                                <button class="btn btn-primary btn-sm editButton" data-id="{{ $dosenTamu->id }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit data">
                                    <i data-feather="edit"></i>
                                </button>
                                <a href="{{ route('dosentamu.show', $dosenTamu->id) }}" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Show data">
                                    <i data-feather="eye"></i>
                                </a>
                                <a href="{{ route('dosentamu.destroy', $dosenTamu->id) }}" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus data" onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus data ini?')){document.getElementById('delete-form-{{ $dosenTamu->id }}').submit();}">
                                    <i data-feather="trash-2"></i>
                                </a>
                                <form id="delete-form-{{ $dosenTamu->id }}" action="{{ route('dosentamu.destroy', $dosenTamu->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
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

<div class="modal fade" id="modalToggle" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalToggleLabel">Form Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="dosenTamuForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="formMethod" name="_method" value="POST">
                    <input type="hidden" name="item_kerjasama_id" value="{{ $itemKerjasamaId }}">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Dosen dari DUDI</label>
                            <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" name="nama" />
                            <span class="text-danger" id="error-nama"></span>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control invoice-edit-input date-picker" name="tanggal_mulai" />
                            <span class="text-danger" id="error-tanggal_mulai"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                            <input type="date" class="form-control invoice-edit-input date-picker" name="tanggal_selesai" />
                            <span class="text-danger" id="error-tanggal_selesai"></span>
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
                                <span class="text-danger" id="error-nominal_biaya_dunia_kerja"></span>
                            </div>
                            <label class="mb-1" for=""> Nominal Biaya dari Satuan Pendidikan</label>
                            <div class="input-group input-group-merge mb-2">
                                <span class="input-group-text">RP.</span>
                                <input type="number" class="form-control" placeholder="100" aria-label="Amount (to the nearest dollar)" name="nominal_biaya_satuan_pendidikan" />
                                <span class="input-group-text">.00</span>
                                <span class="text-danger" id="error-nominal_biaya_satuan_pendidikan"></span>
                            </div>
                            <label class="mb-1" for=""> Nominal Biaya dari Pemerintah Daerah</label>
                            <div class="input-group input-group-merge mb-2">
                                <span class="input-group-text">RP.</span>
                                <input type="number" class="form-control" placeholder="100" aria-label="Amount (to the nearest dollar)" name="nominal_biaya_pemerintah_daerah" />
                                <span class="input-group-text">.00</span>
                                <span class="text-danger" id="error-nominal_biaya_pemerintah_daerah"></span>
                            </div>
                            <label class="mb-1" for=""> Nominal Biaya dari Pemerintah Pusat</label>
                            <div class="input-group input-group-merge mb-2">
                                <span class="input-group-text">RP.</span>
                                <input type="number" class="form-control" placeholder="100" aria-label="Amount (to the nearest dollar)" name="nominal_biaya_pemerintah_pusat" />
                                <span class="input-group-text">.00</span>
                                <span class="text-danger" id="error-nominal_biaya_pemerintah_pusat"></span>
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
                                            <span class="text-danger" id="error-mata_kuliah-nama"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-12">
                                        <div class="mb-1">
                                            <label for="nameBasic" class="form-label">Foto/dokumen (.pdf/.jpg/.png/.jpeg)</label>
                                            <input class="form-control" type="file" id="formFile" name="mata_kuliah[][foto_dokumen]" />
                                            <span class="text-danger" id="error-mata_kuliah-foto_dokumen"></span>
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
                                            <span class="text-danger" id="error-mata_kuliah-jumlah_jpl"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="fp-default">Honorarium Per Jam</label>
                                            <input type="number" class="form-control" id="itemname" aria-describedby="itemname" placeholder="Masukan Nama" name="mata_kuliah[][honorarium_per_jam]" />
                                            <span class="text-danger" id="error-mata_kuliah-honorarium_per_jam"></span>
                                        </div>
                                    </div>
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
                                            <span class="text-danger" id="error-dosen_penanggung_jawab-nama"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="itemcost">NIDN</label>
                                            <input type="number" class="form-control" id="itemcost" aria-describedby="itemcost" placeholder="32" name="dosen_penanggung_jawab[][nidn]" />
                                            <span class="text-danger" id="error-dosen_penanggung_jawab-nidn"></span>
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
                                            <span class="text-danger" id="error-dosen_penanggung_jawab-prodi"></span>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function() {
    const table = $('.datatables').DataTable({});
});

$(document).ready(function() {
    function resetForm() {
        $('#dosenTamuForm')[0].reset();
        $('.text-danger').html('');
        $('#dosenTamuForm').attr('action', '{{ route('dosentamu.store') }}');
        $('#formMethod').val('POST');
    }

    $('#btn-tambah').click(function() {
        resetForm();
        $('#modalToggleLabel').text('Tambah Data');
        $('#modalToggle').modal('show');
    });

    $('.editButton').on('click', function() {
        var id = $(this).data('id');
        var url = `{{ route('dosentamu.edit', ':id') }}`.replace(':id', id);

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                resetForm();
                $('#modalToggleLabel').text('Edit Data');
                $('#dosenTamuForm').attr('action', `{{ route('dosentamu.update', ':id') }}`.replace(':id', id));
                $('#formMethod').val('PUT');

                // Isi form dengan data yang didapat dari server
                $('input[name="nama"]').val(data.nama);
                $('input[name="tanggal_mulai"]').val(data.tanggal_mulai);
                $('input[name="tanggal_selesai"]').val(data.tanggal_selesai);
                $('input[name="nominal_biaya_dunia_kerja"]').val(data.nominal_biaya_dunia_kerja);
                $('input[name="nominal_biaya_satuan_pendidikan"]').val(data.nominal_biaya_satuan_pendidikan);
                $('input[name="nominal_biaya_pemerintah_daerah"]').val(data.nominal_biaya_pemerintah_daerah);
                $('input[name="nominal_biaya_pemerintah_pusat"]').val(data.nominal_biaya_pemerintah_pusat);

                // Kosongkan data lama
                $('[data-repeater-list="mata_kuliah"]').html('');
                $('[data-repeater-list="dosen_penanggung_jawab"]').html('');

                data.mata_kuliah.forEach(function(mk) {
                    var mataKuliahItem = `
                        <div data-repeater-item>
                            <div class="row d-flex align-items-end">
                                <div class="col-md-5 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="itemname">Mata Kuliah </label>
                                        <input type="text" class="form-control" id="itemname" name="mata_kuliah[][nama]" value="${mk.nama}" />
                                        <span class="text-danger" id="error-mata_kuliah-nama"></span>
                                    </div>
                                </div>
                                <div class="col-md-5 col-12">
                                    <div class="mb-1">
                                        <label for="nameBasic" class="form-label">Foto/dokumen (.pdf/.jpg/.png/.jpeg)</label>
                                        <input class="form-control" type="file" id="formFile" name="mata_kuliah[][foto_dokumen]" />
                                        <span class="text-danger" id="error-mata_kuliah-foto_dokumen"></span>
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
                                        <input type="number" class="form-control" id="itemname" name="mata_kuliah[][jumlah_jpl]" value="${mk.jumlah_jpl}" />
                                        <span class="text-danger" id="error-mata_kuliah-jumlah_jpl"></span>
                                    </div>
                                </div>
                                <div class="col-md-5 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="fp-default">Honorarium Per Jam</label>
                                        <input type="number" class="form-control" id="itemname" name="mata_kuliah[][honorarium_per_jam]" value="${mk.honorarium_per_jam}" />
                                        <span class="text-danger" id="error-mata_kuliah-honorarium_per_jam"></span>
                                    </div>
                                </div>
                                <div class="col-md-2 col-12 mb-50">
                                    <div class="mb-1"></div>
                                </div>
                            </div>
                            <hr />
                        </div>
                    `;
                    $('[data-repeater-list="mata_kuliah"]').append(mataKuliahItem);
                });

                data.dosen_penanggung_jawab.forEach(function(dpj) {
                    var dosenPenanggungJawabItem = `
                        <div data-repeater-item>
                            <div class="row d-flex align-items-end">
                                <div class="col-md-5 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="itemname">Nama</label>
                                        <input type="text" class="form-control" id="itemname" name="dosen_penanggung_jawab[][nama]" value="${dpj.nama}" />
                                        <span class="text-danger" id="error-dosen_penanggung_jawab-nama"></span>
                                    </div>
                                </div>
                                <div class="col-md-5 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="itemcost">NIDN</label>
                                        <input type="number" class="form-control" id="itemcost" name="dosen_penanggung_jawab[][nidn]" value="${dpj.nidn}" />
                                        <span class="text-danger" id="error-dosen_penanggung_jawab-nidn"></span>
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
                                        <input type="text" class="form-control" id="itemname" name="dosen_penanggung_jawab[][prodi]" value="${dpj.prodi}" />
                                        <span class="text-danger" id="error-dosen_penanggung_jawab-prodi"></span>
                                    </div>
                                </div>
                                <div class="col-md-5 col-12"></div>
                                <div class="col-md-2 col-12 mb-50">
                                    <div class="mb-1"></div>
                                </div>
                            </div>
                            <hr />
                        </div>
                    `;
                    $('[data-repeater-list="dosen_penanggung_jawab"]').append(dosenPenanggungJawabItem);
                });

                feather.replace();
                $('#modalToggle').modal('show');
            },
            error: function() {
                alert('Failed to fetch data.');
            }
        });
    });

    $('#dosenTamuForm').on('submit', function(e) {
        e.preventDefault();
        let form = $(this);
        let actionUrl = form.attr('action');
        let method = $('#formMethod').val();

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
                }
            },
            error: function(xhr) {
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
});


    </script>
    

@endsection
