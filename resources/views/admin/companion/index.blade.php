@extends('layouts.header')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold mb-4"><span class="text-muted fw-light">INSTRUKTUR/</span>PENDAMPING DUDI</h4>

        <div class="card p-2">
            <div class="d-flex justify-content-end">
                <button class="btn btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                    type="button">
                    <i class="bx bx-plus-circle"></i> Tambah
                </button>
            </div>
            <div class="card-datatables table-responsive">
                <table class="datatables table table-borderless table-striped dt-advanced-search table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>NO Telepon</th>
                            <th>Email</th>
                            <th>Asal DUDI</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companions as $companion)
                            <tr>
                                <th class="text-center align-top">{{ $loop->iteration }}</th>
                                <td class="align-top">{{ $companion->name }}</td>
                                <td class="text-center align-top">{{ $companion->position }}</td>
                                <td class="text-center align-top">{{ $companion->phone }}</td>
                                <td class="text-center align-top">{{ $companion->email }}</td>
                                <td class="align-top">{{ $companion->dudi->nama_perseroan }}</td>
                                <td class="text-center align-top">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#modaledit"
                                            class="btn btn-primary btn-sm" data-bs-placement="top" title="Update data"
                                            id="updateButton" data-id="{{ $companion->id }}">
                                            <i data-feather='edit'></i>
                                        </button>

                                        <form action="{{ route('companions.destroy', $companion->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="hapus data">
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

    <!-- Modal for Adding Companion -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="POST" action="{{ route('companions.store') }}">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Pendamping DUDI</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            placeholder="Masukan Nama" required />
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Masukan email" required />
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="no_telefon">No Telefon</label>
                                        <input type="number" class="form-control" id="no_telefon" name="no_telefon"
                                            placeholder="0895547624361" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-12 mb-1 mb-sm-0">
                                    <label for="dudi_id" class="form-label">Asal DUDI</label>
                                    <select class="select2 form-select" name="dudi_id" id="dudi_id" required>
                                        <option value="" hidden>Pilih dudi</option>
                                        @foreach ($dudi as $dudis)
                                            <option value="{{ $dudis->id }}">
                                                {{ $dudis->nama_perseroan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <label class="form-label" for="jabatan_dudi">Jabatan Di Dudi</label>
                                    <input type="text" class="form-control" id="jabatan_dudi" name="jabatan_dudi"
                                        placeholder="Masukan Jabatan" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-12 mb-1 mb-sm-0">
                                    <label class="form-label" for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                    <select class="select2 form-select" id="pendidikan_terakhir" name="pendidikan_terakhir"
                                        required>
                                        <option value="" hidden>Pilih pendidikan terakhir</option>
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA</option>
                                        <option value="D3">D3</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <label class="form-label" for="keahlian">Keahlian/Bidang Keahlian</label>
                                    <input type="text" class="form-control" id="keahlian" name="keahlian"
                                        placeholder="Masukan Keahlian" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for Editing Companion -->
    <div class="modal fade" id="modaledit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="POST" action="">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Pendamping DUDI</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="edit_name">Nama</label>
                                        <input type="text" class="form-control" id="edit_name" name="name"
                                            placeholder="Masukan Nama" required />
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="edit_email">Email</label>
                                        <input type="email" class="form-control" id="edit_email" name="email"
                                            placeholder="Masukan email" required />
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="edit_phone">No Telefon</label>
                                        <input type="number" class="form-control" id="edit_phone" name="phone"
                                            placeholder="0895547624361" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-12 mb-1 mb-sm-0">
                                    <label for="edit_dudi_id" class="form-label">Asal DUDI</label>
                                    <select class="select2 form-select" name="dudi_id" id="edit_dudi_id" required>
                                        <option value="" hidden>Pilih dudi</option>
                                        @foreach ($dudi as $dudis)
                                            <option value="{{ $dudis->id }}">
                                                {{ $dudis->nama_perseroan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <label class="form-label" for="edit_position">Jabatan Di Dudi</label>
                                    <input type="text" class="form-control" id="edit_position" name="position"
                                        placeholder="Masukan Jabatan" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-12 mb-1 mb-sm-0">
                                    <label class="form-label" for="edit_last_education">Pendidikan Terakhir</label>
                                    <select class="select2 form-select" id="edit_last_education" name="last_education"
                                        required>
                                        <option value="" hidden>Pilih pendidikan terakhir</option>
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA</option>
                                        <option value="D3">D3</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <label class="form-label" for="edit_expertise">Keahlian/Bidang Keahlian</label>
                                    <input type="text" class="form-control" id="edit_expertise" name="expertise"
                                        placeholder="Masukan Keahlian" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            const table = $('.datatables').DataTable();

            // For passing data to the edit modal
            $('#modaledit').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var modal = $(this);

                // Make an AJAX request to fetch companion data and populate the form
                $.ajax({
                    url: `/companions/${id}/edit`,
                    method: 'GET',
                    success: function(data) {
                        // Populate the form fields with the data
                        modal.find('form').attr('action', `/companions/${id}`);
                        modal.find('input[name="name"]').val(data.name);
                        modal.find('input[name="email"]').val(data.email);
                        modal.find('input[name="phone"]').val(data.phone);
                        modal.find('select[name="dudis_id"]').val(data.dudis_id);
                        modal.find('input[name="position"]').val(data.position);
                        modal.find('select[name="last_education"]').val(data.last_education);
                        modal.find('input[name="expertise"]').val(data.expertise);
                    }
                });
            });
        });
    </script>
@endsection
