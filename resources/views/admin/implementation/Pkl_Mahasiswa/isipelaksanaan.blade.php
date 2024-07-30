@extends('layouts.header')

@section('title', 'Instruktur/Pendamping DUDI')

<style>
    .card-body {
        background-color: white;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
</style>

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold mb-4"><span class="text-muted fw-light">Invoice /</span> INSTRUKTUR/PENDAMPING DUDI</h4>

        <!-- Invoice List Table -->
        <div class="card p-2">
            <div class="card-datatables table-responsive">
                <div class="d-flex justify-content-end mb-2">
                    <button class="btn btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#tambah">
                        <i class="bx bx-plus-circle"></i> Tambah
                    </button>
                </div>
                <table class="datatables table table-borderless table-striped dt-advanced-search table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Rombel</th>
                            <th>Pendamping dari Industri</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Jumlah Mahasiswa</th>
                            <th>Jumlah Dosen</th>
                            <th>Jumlah Instruktur DUDI</th>
                            <th>Jumlah Biaya Total</th>
                            <th>Dokumen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item)
                        <tr>
                            <td class="align-top">{{ $index + 1 }}</td>
                            <td class="align-top">{{ $item->nama_rombongan }}</td>
                            <td class="align-top">{{ $item->pendamping_industri ?? 'Tidak Ada' }}</td>
                            <td class="align-top">{{ $item->tanggal_mulai }}</td>
                            <td class="align-top">{{ $item->tanggal_selesai }}</td>
                            <td class="align-top">{{ $item->mahasiswa_count }} Mahasiswa</td>
                            <td class="align-top">{{ $item->dosen_count }} Dosen</td>
                            <td class="align-top">{{ $item->instruktur_count }} Instruktur</td>
                            <td class="align-top">Rp. {{ number_format($item->jumlah_biaya_total, 0, ',', '.') }}</td>
                            <td class="align-top">
                                @if ($item->foto_dokumen)
                                <a href="{{ asset('uploads/' . $item->foto_dokumen) }}" class="btn btn-primary btn-sm" target="_blank">
                                    <i data-feather="file"></i> PDF
                                </a>
                                @else
                                -
                                @endif
                            </td>
                            <td class="align-top">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('pkl-mhs.edit', $item->id) }}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit data">
                                        <i data-feather="edit"></i>
                                    </a>
                                    <a href="{{ route('pkl-mhs.show', $item->id) }}" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Show data">
                                        <i data-feather="eye"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="{{ $item->id }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete data">
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

    <!-- Modal tambah-->
    <div class="modal fade" id="tambah" aria-labelledby="modalToggleLabel" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalToggleLabel">Form Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pkl-mhs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="item_kerjasama_id" value="{{ $itemKerjasamaId }}">
                        <div class="modal-body">
                            <!-- Nama Rombongan -->
                            <div class="col mb-3">
                                <label for="namaRombongan" class="form-label">Nama Rombongan</label>
                                <input type="text" id="namaRombongan" name="nama_rombongan" class="form-control"
                                    placeholder="Enter Name" />
                            </div>
                            <!-- Tanggal Mulai dan Tanggal Selesai -->
                            <div class="row g-2 mb-3">
                                <div class="col mb-0">
                                    <label for="tanggalMulai" class="form-label">Tanggal Mulai</label>
                                    <input type="date" name="tanggal_mulai" class="form-control" />
                                </div>
                                <div class="col mb-0">
                                    <label for="tanggalSelesai" class="form-label">Tanggal Selesai</label>
                                    <input type="date" name="tanggal_selesai" class="form-control" />
                                </div>
                            </div>
                            <!-- Foto/Dokumen -->
                            <div class="col mb-3">
                                <label for="fotoDokumen" class="form-label">Foto/Dokumen (.pdf/.jpg/.png/.jpeg)</label>
                                <input class="form-control" type="file" id="fotoDokumen" name="foto_dokumen" />
                            </div>
                            <div class="card-body">
                                <label for="">Sumber Biaya</label>
                                <hr>
                                <div class="col mb-3">
                                    <label class="form-label" for="biayaPerMahasiswa">Biaya Per Mahasiswa</label>
                                    <input type="number" class="form-control" name="biaya_per_mahasiswa" placeholder="10,000" />
                                </div>
                                
                                <div class="col mb-3">
                                    <label class="mb-1" for="biayaDuniaKerja">Nominal Biaya dari Dunia Kerja</label>
                                    <div class="input-group input-group-merge mb-2">
                                        <span class="input-group-text">RP.</span>
                                        <input type="number" class="form-control" name="biaya_dunia_kerja" placeholder="100" />
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            
                                <div class="col mb-3">
                                    <label class="mb-1" for="biayaSatuanPendidikan">Nominal Biaya dari Satuan Pendidikan</label>
                                    <div class="input-group input-group-merge mb-2">
                                        <span class="input-group-text">RP.</span>
                                        <input type="number" class="form-control" name="biaya_satuan_pendidikan" placeholder="100" />
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            
                                <div class="col mb-3">
                                    <label class="mb-1" for="biayaPemerintahDaerah">Nominal Biaya dari Pemerintah Daerah</label>
                                    <div class="input-group input-group-merge mb-2">
                                        <span class="input-group-text">RP.</span>
                                        <input type="number" class="form-control" name="biaya_pemerintah_daerah" placeholder="100" />
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            
                                <div class="col mb-3">
                                    <label class="mb-1" for="biayaPemerintahPusat">Nominal Biaya dari Pemerintah Pusat</label>
                                    <div class="input-group input-group-merge mb-2">
                                        <span class="input-group-text">RP.</span>
                                        <input type="number" class="form-control" name="biaya_pemerintah_pusat" placeholder="100" />
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            
                                <div class="col mb-3">
                                    <label class="mb-1" for="biayaCostSharing">Nominal Biaya dari Cost Sharing</label>
                                    <div class="input-group input-group-merge mb-2">
                                        <span class="input-group-text">RP.</span>
                                        <input type="number" class="form-control" name="biaya_cost_sharing" placeholder="100" />
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>                 
                            <!-- Mahasiswa -->
                            <h4 class="mt-2 text-center">Mahasiswa</h4>
                            <hr>
                            <div class="card-body invoice-repeater">
                                <div data-repeater-list="mahasiswa">
                                    <div data-repeater-item>
                                        <div class="row d-flex align-items-end">
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="mahasiswaNama">Nama</label>
                                                    <input type="text" name="nama" class="form-control"
                                                        placeholder="Masukan Nama" />
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="mahasiswaNim">NIM</label>
                                                    <input type="number" name="nim" class="form-control"
                                                        placeholder="32" />
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-12 mb-50">
                                                <div class="mb-1">
                                                    <button class="btn btn-outline-danger text-nowrap px-1"
                                                        data-repeater-delete type="button">
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
                                                    <input type="text" name="tempat_lahir" class="form-control"
                                                        placeholder="Masukan Nama" />
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="mahasiswaTanggalLahir">Tanggal Lahir</label>
                                                    <input type="date" name="tanggal_lahir" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-12 mb-50"></div>
                                        </div>
                                        <div class="row d-flex align-items-end">
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="mahasiswaGender">Jenis Kelamin</label>
                                                    <select name="gender" class="form-select">
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
                                                    <input type="text" name="nama" class="form-control"
                                                        placeholder="Masukan Nama" />
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="dosenNidn">NIDN</label>
                                                    <input type="number" name="nidn" class="form-control"
                                                        placeholder="32" />
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-12 mb-50">
                                                <div class="mb-1">
                                                    <button class="btn btn-outline-danger text-nowrap px-1"
                                                        data-repeater-delete type="button">
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
                                                    <input type="text" name="tempat_lahir" class="form-control"
                                                        placeholder="Masukan Nama" />
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="dosenTanggalLahir">Tanggal Lahir</label>
                                                    <input type="date" name="tanggal_lahir" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-12 mb-50"></div>
                                        </div>
                                        <div class="row d-flex align-items-end">
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="dosenGender">Jenis Kelamin</label>
                                                    <select name="gender" class="form-select">
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
                            <!-- Instruktur -->
                            <h4 class="mt-2 text-center">Instruktur</h4>
                            <hr>
                            <div class="card-body invoice-repeater">
                                <div data-repeater-list="instruktur">
                                    <div data-repeater-item>
                                        <div class="row d-flex align-items-end">
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="instrukturNoId">No.ID</label>
                                                    <input type="number" name="no_id" class="form-control"
                                                        placeholder="32" />
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="instrukturNama">Nama</label>
                                                    <input type="text" name="nama" class="form-control"
                                                        placeholder="Masukan Nama" />
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-12 mb-50">
                                                <div class="mb-1">
                                                    <button class="btn btn-outline-danger text-nowrap px-1"
                                                        data-repeater-delete type="button">
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
                                                    <input type="text" name="jabatan" class="form-control"
                                                        placeholder="Masukan Nama" />
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="instrukturNoTelepon">No. Telepon</label>
                                                    <input type="number" name="no_telepon" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-12 mb-50"></div>
                                        </div>
                                        <div class="row d-flex align-items-end">
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="instrukturEmail">Email</label>
                                                    <input type="email" name="email" class="form-control"
                                                        placeholder="Masukan Nama" />
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
                            <!-- Dosen Penanggung Jawab -->
                            <h4 class="mt-2 text-center">Dosen Penanggung Jawab</h4>
                            <hr>
                            <div class="card-body invoice-repeater">
                                <div data-repeater-list="dosen_penanggung_jawab">
                                    <div data-repeater-item>
                                        <div class="row d-flex align-items-end">
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="dpjNama">Nama</label>
                                                    <input type="text" name="nama" class="form-control"
                                                        placeholder="Masukan Nama" />
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="dpjNidn">NIDN</label>
                                                    <input type="number" name="nidn" class="form-control"
                                                        placeholder="32" />
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-12 mb-50">
                                                <div class="mb-1">
                                                    <button class="btn btn-outline-danger text-nowrap px-1"
                                                        data-repeater-delete type="button">
                                                        <i data-feather="x" class="me-25"></i>
                                                        <span>Delete</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row d-flex align-items-end">
                                            <div class="col-md-5 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="dpjProdi">Prodi</label>
                                                    <input type="text" name="prodi" class="form-control"
                                                        placeholder="Masukan Nama" />
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
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            const table = $('.datatables').DataTable({
                // konfigurasi tambahan jika diperlukan
            });
        });

        $(document).ready(function() {
    // CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Event listener for delete button
        $('.btn-delete').on('click', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var url = `{{ route('pkl-mhs.destroy', ':id') }}`.replace(':id', id);

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
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: 'Your file has been deleted.',
                                customClass: {
                                    confirmButton: 'btn btn-success'
                                },
                                buttonsStyling: false
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
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
                    });
                }
            });
        });
    });
    </script>
@endsection
