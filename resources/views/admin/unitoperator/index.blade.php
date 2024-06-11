@extends('admin.app')

@section('content')
    <div class="content-wrapper">
        <h4 class="fw-bold mb-4"><span class="text-muted fw-light">Sikma |</span> OPERATOR SATUAN PENDIDIKAN</h4>
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Users List Table -->
            <div class="card">
                <div class="card-datatable table-responsive p-3">
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#basicModal">
                            <i class="bx bx-plus-circle"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                            </svg> Tambah
                        </button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form method="POST" action="{{ route('users.store') }}">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title">Form Tambah Operator Akun Satuan Pendidikan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="nameBasic" class="form-label">Nama</label>
                                                <input type="text" name="name" class="form-control" placeholder="Enter Name" required />
                                            </div>
                                        </div>
                                        <div class="row g-2">
                                            <div class="col mb-0">
                                                <label for="emailBasic" class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control" placeholder="xxxx@xxx.xx" required />
                                            </div>
                                            <div class="col mb-0">
                                                <label for="phoneBasic" class="form-label">No Telefon</label>
                                                <input type="text" name="phone_number" class="form-control" placeholder="1 234 567 8900" required />
                                            </div>
                                        </div>
                                        <div class="row g-2">
                                            <div class="col mb-0">
                                                <label class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control" placeholder="Your Password" required />
                                            </div>
                                            <div class="col mb-0">
                                                <label class="form-label">Confirm Password</label>
                                                <input type="password" name="password_confirmation" class="form-control" placeholder="Your Password" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end Modal -->

                    <table class="datatables datatables-users table border-top">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No Telefon</th>
                                <th>Aktivitas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone_number }}</td>
                                    <td>
                                        <label class="form-check-label mb-50" for="customSwitch{{ $user->id }}">aktif</label>
                                        <div class="form-check form-switch form-check-info">
                                            <input type="checkbox" class="form-check-input" id="customSwitch{{ $user->id }}" checked />
                                            <label class="form-check-label" for="customSwitch{{ $user->id }}">
                                                <span class="switch-icon-left"><i data-feather="check"></i></span>
                                                <span class="switch-icon-right"><i data-feather="x"></i></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#Modal1-{{ $user->id }}" class="btn btn-primary btn-sm" data-bs-placement="top" title="Update data" data-bs-toggle="tooltip">
                                                <i data-feather='edit'></i>
                                            </button>
                                            <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" id="confirm-text" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="hapus data"><i data-feather='trash-2'></i></button>
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
        <!-- / Content -->

        <!-- Modal Action -->
        @foreach ($users as $user)
            <div class="modal fade" id="Modal1-{{ $user->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('users.update', $user->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title">Form Edit Operator Akun Satuan Pendidikan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="nameBasic" class="form-label">Nama</label>
                                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" required />
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col mb-0">
                                        <label for="emailBasic" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ $user->email }}" required />
                                    </div>
                                    <div class="col mb-0">
                                        <label for="phoneBasic" class="form-label">No Telefon</label>
                                        <input type="text" name="phone_number" class="form-control" value="{{ $user->phone_number }}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- end Modal -->

        <div class="content-backdrop fade"></div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            const table = $('.datatables').DataTable();
        });
    </script>
@endsection
