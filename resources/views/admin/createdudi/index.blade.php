@extends('admin.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold mb-4"><span class="text-muted fw-light">Sikma |</span>DATA DUDI INTEGRASI</h4>

        <!-- Invoice List Table -->
        <div class="card p-2">
            <div class="card">
                <div class="row">
                    <div class="col-md-9">
                        <label class="form-label" for="basicSelect">Basic Select</label>
                        <div class="input-group">
                            <button class="btn btn-outline-primary" type="button">
                                <i data-feather="search"></i>
                            </button>
                            <select class="form-select" id="basicSelect">
                                <option value="" hidden>Pilih</option>
                                <option>IT</option>
                                <option>Blade Runner</option>
                                <option>Thor Ragnarok</option>
                            </select>
                            <button class="btn btn-outline-primary" type="button">Search !</button>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end align-items-center">
                        <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#tambah">Buat
                            DUDI</button>
                    </div>
                </div>
            </div>
            <!-- Table for DUDI data -->
            <div class="card-datatables table-responsive">
                <table id="dudiTable" class="datatables table table-borderless table-striped dt-advanced-search table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NIB/NPSN</th>
                            <th>Tipe</th>
                            <th>Nama Perseroan</th>
                            <th>Provinsi</th>
                            <th>Kabupaten/Kota</th>
                            <th>Lingkup</th>
                            <th>kriteria Mitra</th>
                            <th>Owner</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dudis as $dudi)
                            <tr>
                                <td class="align-top">{{ $loop->iteration }}</td>
                                <td class="align-top">{{ $dudi->nib }}</td>
                                <td class="align-top">{{ $dudi->tipe }}</td>
                                <td class="align-top">{{ $dudi->nama_perseroan }}</td>
                                <td class="align-top">{{ $dudi->provinsi->name }}</td>
                                <td class="align-top">{{ $dudi->kabupaten->name }}</td>
                                <td class="align-top">{{ $dudi->lingkupkerjasama }}</td>
                                <td class="align-top">{{ $dudi->kriteria->nama }}</td>
                                <td class="align-top">user</td>
                                <td class="align-top">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                         <button type="button" class="btn btn-info viewDudi" data-id="{{ $dudi->id }}" data-bs-toggle="modal" data-bs-target="#view">
            <i data-feather='inbox'></i>
        </button>

                                        <button type="button" data-bs-toggle="modal" data-bs-target="#update"
                                            class="btn btn-primary btn-sm" data-bs-placement="top" title="Update data"
                                            id="updateButton">
                                            <i data-feather='edit'></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm delete-button"
                                            data-bs-placement="top" title="Hapus data" data-id="{{ $dudi->id }}">
                                            <i data-feather='trash'></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>





    @include('admin.createdudi.create')
    @include('admin.createdudi.update')
    @include('admin.createdudi.view')
@endsection

@section('scripts')
    <script>
        $(function() {
            const table = $('.datatables').DataTable({

            })
        });
    </script>
@endsection
