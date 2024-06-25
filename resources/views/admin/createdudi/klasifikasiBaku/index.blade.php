@extends('admin.app')
@section('content')
    <div class="card p-2">
        <h4>Klasifikasi Baku Lapangan Usaha (KBLI)</h4>
        <div class="d-flex justify-content-end">
            <button class="btn btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#KBLI" type="submit">
                <i class="bx bx-plus-circle"></i>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                </svg> Tambah
            </button>
        </div>
        <div class="card-datatables table-responsive">
            <table class="datatables table table-borderles table-striped dt-advanced-search table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Nama</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kblis as $kbli)
                        <tr>
                            <th class="text-center align-top">{{ $loop->iteration }}</th>
                            <td class="align-top">{{ $kbli->nama }}</td>
                            <td class="text-center align-top">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modaledit" class="btn btn-primary btn-sm" data-bs-placement="top" title="Update data" id="updateButton" data-id="{{ $kbli->id }}" data-nama="{{ $kbli->nama }}">
                                        <i data-feather='edit'></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="hapus data" id="deleteButton" data-id="{{ $kbli->id }}">
                                        <i data-feather='trash-2'></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal KBLI -->
    <div class="modal fade" id="KBLI" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Klasifikasi Baku Lapangan Usaha (KBLI)</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col mt-1">
                        <label class="form-label" for="basicInput">Nama</label>
                        <input type="text" class="form-control" id="kbliInput" placeholder="Masukan Nama" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="saveKbli">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            const table = $('.datatables').DataTable();

            $('#saveKbli').on('click', function() {
                const nama = $('#kbliInput').val();

                if (!nama) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Nama harus diisi.',
                        customClass: {
                            confirmButton: 'btn btn-danger'
                        },
                        buttonsStyling: false
                    });
                    return;
                }

                $.ajax({
                    url: "{{ route('kbli.store') }}",
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        nama: nama
                    },
                    success: function(response) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'KBLI added successfully.',
                            showConfirmButton: false,
                            timer: 1500,
                            customClass: {
                                confirmButton: 'btn btn-primary'
                            },
                            buttonsStyling: false
                        }).then(() => {
                            location.reload();
                        });
                    },
                    error: function(response) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: response.responseJSON.message,
                            customClass: {
                                confirmButton: 'btn btn-danger'
                            },
                            buttonsStyling: false
                        });
                    }
                });
            });

            $(document).on('click', '#updateButton', function() {
                const id = $(this).data('id');
                const nama = $(this).data('nama');

                $('#kbliInput').val(nama);
                $('#saveKbli').off('click').on('click', function() {
                    const newNama = $('#kbliInput').val();

                    if (!newNama) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Nama harus diisi.',
                            customClass: {
                                confirmButton: 'btn btn-danger'
                            },
                            buttonsStyling: false
                        });
                        return;
                    }

                    $.ajax({
                        url: `/kbli/${id}`,
                        method: 'PUT',
                        data: {
                            _token: '{{ csrf_token() }}',
                            nama: newNama
                        },
                        success: function(response) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'KBLI updated successfully.',
                                showConfirmButton: false,
                                timer: 1500,
                                customClass: {
                                    confirmButton: 'btn btn-primary'
                                },
                                buttonsStyling: false
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function(response) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: response.responseJSON.message,
                                customClass: {
                                    confirmButton: 'btn btn-danger'
                                },
                                buttonsStyling: false
                            });
                        }
                    });
                });
            });

            $(document).on('click', '#deleteButton', function() {
                const id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-outline-danger ms-1'
                    },
                    buttonsStyling: false
                }).then(function(result) {
                    if (result.value) {
                        $.ajax({
                            url: `/kbli/${id}`,
                            method: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'KBLI deleted successfully.',
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    }
                                }).then(() => {
                                    location.reload();
                                });
                            },
                            error: function(response) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: response.responseJSON.message,
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
