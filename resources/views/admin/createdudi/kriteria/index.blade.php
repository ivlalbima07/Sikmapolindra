@extends('layouts.header')
@section('content')
<div class="card p-2">
    <h4>Kriteria Mitra</h4>
    <div class="d-flex justify-content-end">
        <button class="btn btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="bx bx-plus-circle"></i> Tambah
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
                @foreach($kriterias as $kriteria)
                <tr>
                    <th class="text-center align-top">{{ $loop->iteration }}</th>
                    <td class="align-top">{{ $kriteria->nama }}</td>
                    <td class="text-center align-top">
                        <div class="btn-group" role="group">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#modaledit"
                                class="btn btn-primary btn-sm" data-id="{{ $kriteria->id }}" data-nama="{{ $kriteria->nama }}">
                                <i data-feather='edit'></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteKriteria({{ $kriteria->id }})">
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

<!-- Modal tambah kriteria -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Kriteria</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col mt-1">
                    <label class="form-label" for="namaInput">Nama</label>
                    <input type="text" class="form-control" id="namaInput" placeholder="Masukan Nama">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="addKriteria()">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal edit kriteria -->
<div class="modal fade" id="modaledit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modaleditLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modaleditLabel">Edit Kriteria</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col mt-1">
                    <label class="form-label" for="editNamaInput">Nama</label>
                    <input type="text" class="form-control" id="editNamaInput" placeholder="Masukan Nama">
                    <input type="hidden" id="editIdInput">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="updateKriteria()">Simpan</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function() {
        $('.datatables').DataTable();
    });

    function addKriteria() {
        var nama = $('#namaInput').val();
        $.ajax({
            url: "{{ route('Kriteria.store') }}",
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                nama: nama
            },
            success: function(response) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Kriteria added successfully.',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: {
                        confirmButton: 'btn btn-primary'
                    },
                    buttonsStyling: false
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        location.reload();
                    }
                });
            },
            error: function(response) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'There was a problem adding the kriteria.',
                    customClass: {
                        confirmButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                });
            }
        });
    }

    function updateKriteria() {
        var id = $('#editIdInput').val();
        var nama = $('#editNamaInput').val();
        $.ajax({
            url: "{{ url('/Kriteria') }}/" + id,
            method: 'PUT',
            data: {
                _token: '{{ csrf_token() }}',
                nama: nama
            },
            success: function(response) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Kriteria updated successfully.',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: {
                        confirmButton: 'btn btn-primary'
                    },
                    buttonsStyling: false
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        location.reload();
                    }
                });
            },
            error: function(response) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'There was a problem updating the kriteria.',
                    customClass: {
                        confirmButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                });
            }
        });
    }

    $('#modaledit').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var nama = button.data('nama');

        var modal = $(this);
        modal.find('#editIdInput').val(id);
        modal.find('#editNamaInput').val(nama);
    });

    function deleteKriteria(id) {
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
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ url('/Kriteria') }}/" + id,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: 'Kriteria deleted successfully.',
                            customClass: {
                                confirmButton: 'btn btn-success'
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    },
                    error: function(response) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'There was a problem deleting the kriteria.',
                            customClass: {
                                confirmButton: 'btn btn-danger'
                            },
                            buttonsStyling: false
                        });
                    }
                });
            }
        });
    }
</script>
@endsection
