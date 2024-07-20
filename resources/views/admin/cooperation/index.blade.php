@extends('layouts.header')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold mb-4"><span class="text-muted fw-light">Sikma |</span> Data DUDI</h4>

        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Invoice List Table -->
        <div class="card p-2">
            <div class="d-flex justify-content-end">
                <button class="btn btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#tambah" type="submit">
                    <i class="bx bx-plus-circle"></i> <i data-feather='plus-circle'></i> Tambah data Kerjasama DUDI
                </button>
            </div>
            <div class="card-datatables table-responsive">
                <table class="datatables table table-borderles table-striped dt-advanced-search table" style="width:100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nomor PKS</th>
                            <th>dudi</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Item Kerjasama</th> <!-- Kolom baru -->
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datakerjasama as $index => $kerjasama)
                            <tr>
                                <th class="">{{ $index + 1 }}</th>
                                <td class="">{{ $kerjasama->nomor_pks }}</td>
                                <td class="">{{ $kerjasama->dudi->nama_perseroan }}</td>
                                <td class="">{{ $kerjasama->tanggal_mulai }}</td>
                                <td class="">{{ $kerjasama->tanggal_selesai }}</td>
                                <td class="">
                                    @foreach ($kerjasama->itemKerjasama as $item)
                                        <div>{{ $item->jurusan }} - {{ $item->jenis_kerjasama }}</div>
                                    @endforeach
                                </td>
                                <td class="">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-success btn-sm"
                                            onclick="location.href='/DataDocument'" title="document">
                                            <i data-feather='file'></i>
                                        </button>
                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $kerjasama->id }}"
                                            title="update data nota kesepakatan">
                                            <i data-feather='folder'></i>
                                        </button>
                                    </div>
                                    <br></br>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#itemkerjasama{{ $kerjasama->id }}" title="Tambah Data">
                                            <i data-feather='plus-circle'></i>
                                        </button>
                                        <form action="{{ route('cooperation.destroy', $kerjasama->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <i data-feather='trash-2'></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal{{ $kerjasama->id }}" tabindex="-1"
                                aria-labelledby="editModalLabel{{ $kerjasama->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form action="{{ route('cooperation.update', $kerjasama->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel{{ $kerjasama->id }}">Edit Data
                                                    Kerjasama</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col mb-1">
                                                        <label for="nomor_pks" class="form-label">Nomor PKS*</label>
                                                        <input type="text" id="nomor_pks{{ $kerjasama->id }}"
                                                            name="nomor_pks" class="form-control"
                                                            value="{{ $kerjasama->nomor_pks }}" required />
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col mb-0">
                                                        <label for="tanggal_pks" class="form-label">Tanggal PKS</label>
                                                        <input type="date" id="tanggal_pks{{ $kerjasama->id }}"
                                                            name="tanggal_pks" class="form-control"
                                                            value="{{ $kerjasama->tanggal_pks }}" required />
                                                    </div>
                                                </div>
                                                <div class="row g-2 mb-1">
                                                    <div class="col mb-0">
                                                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                                                        <input type="date" id="tanggal_mulai{{ $kerjasama->id }}"
                                                            name="tanggal_mulai" class="form-control"
                                                            value="{{ $kerjasama->tanggal_mulai }}" required />
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label for="tanggal_selesai" class="form-label">Tanggal
                                                            Selesai</label>
                                                        <input type="date" id="tanggal_selesai{{ $kerjasama->id }}"
                                                            name="tanggal_selesai" class="form-control"
                                                            value="{{ $kerjasama->tanggal_selesai }}" required />
                                                    </div>
                                                </div>
                                                <div class="col mb-2">
                                                    <label for="lampiran_bukti" class="form-label">Lampiran Bukti</label>
                                                    <input class="form-control" type="file"
                                                        id="lampiran_bukti{{ $kerjasama->id }}" name="lampiran_bukti" />
                                                    @if ($kerjasama->lampiran_bukti)
                                                        <small class="form-text text-muted">Lampiran saat ini: <a
                                                                href="{{ asset('storage/lampiran/' . $kerjasama->lampiran_bukti) }}"
                                                                target="_blank">{{ $kerjasama->lampiran_bukti }}</a></small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@foreach ($datakerjasama as $index => $kerjasama)
    <!-- Modal tambah item kerjasama -->
    <div class="modal fade text-start" id="itemkerjasama{{ $kerjasama->id }}" tabindex="-1" aria-labelledby="myModalLabel18" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h4 class="modal-title" id="myModalLabel18">Form Tambah Item Kerja Sama</h4>
                        <br>
                        <p class="text-primary">{{ $kerjasama->dudi->nama_perseroan }}</p>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="{{ route('itemkerjasama.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="kerjasama_id" value="{{ $kerjasama->id }}">
                        <div class="row g-3 mb-1">
                            <div class="col mb-0">
                                <label class="form-label" for="jurusan">Program studi</label>
                                <select class="form-select" id="jurusan" name="jurusan" required>
                                    <option value="" hidden>Pilih Jurusan</option>
                                    <option value="D3 Teknik Informatika">D3 Teknik Informatika</option>
                                    <option value="D4 Perancangan Manufaktur">D4 Perancangan Manufaktur</option>
                                    <option value="D3 Teknik Informatika">D3 Teknik Informatika</option>
                                </select>
                            </div>
                            <div class="col mb-0">
                                <label class="form-label" for="jenis_kerjasama">Jenis Kerjasama</label>
                                <select class="form-select" id="jenis_kerjasama" name="jenis_kerjasama" required>
                                    <option value="" hidden>Pilih Jenis Kerjasama</option>
                                    <option value="Dosen/Tenaga Ahli dari Dunia Kerja (Dosen Tamu)">Dosen/Tenaga Ahli dari Dunia Kerja (Dosen Tamu)</option>
                                    <option value="Praktek Kerja Lapangan (PKL) Mahasiswa">Praktek Kerja Lapangan (PKL) Mahasiswa</option>
                                    <option value="Praktek Kerja Lapangan (PKL) Dosen">Praktek Kerja Lapangan (PKL) Dosen</option>
                                    <option value="Sertifikasi Kompetensi">Sertifikasi Kompetensi</option>
                                    <option value="Riset Terapan">Riset Terapan</option>
                                    <option value="Penyerapan Lulusan">Penyerapan Lulusan</option>
                                    <option value="Beasiswa/Ikatan Dinas">Beasiswa/Ikatan Dinas</option>
                                    <option value="Sarana">Sarana</option>
                                    <option value="Joint Research">Joint Research</option>
                                    <option value="Pelatihan Kepada dunia kerja">Pelatihan Kepada dunia kerja</option>
                                </select>
                            </div>
                            <div class="col mb-0">
                                <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                    <i data-feather="x" class="me-25"></i>
                                    <span>Delete</span>
                                </button>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach







                            <!-- Modal tambah -->
                            <div class="modal fade" id="tambah" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form action="{{ route('cooperation.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Pilih Data
                                                    Perusahaan</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col mb-1">
                                                        <label for="dudi_id" class="form-label">Dudi</label>
                                                        <select class="select2 form-select" name="dudi_id" id="dudi_id"
                                                            required>
                                                            <option value="" hidden>Pilih dudi</option>
                                                            @foreach ($dudi as $dudis)
                                                                <option value="{{ $dudis->id }}">
                                                                    {{ $dudis->nama_perseroan }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col mb-1">
                                                        <label for="nomor_pks" class="form-label">Nomor PKS*</label>
                                                        <input type="text" id="nomor_pks" name="nomor_pks"
                                                            class="form-control" placeholder="Enter Nomor PKS" required />
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col mb-0">
                                                        <label for="tanggal_pks" class="form-label">Tanggal PKS</label>
                                                        <input type="date" id="tanggal_pks" name="tanggal_pks"
                                                            class="form-control invoice-edit-input date-picker" required />
                                                    </div>
                                                </div>
                                                <div class="row g-2 mb-1">
                                                    <div class="col mb-0">
                                                        <label for="tanggal_mulai" class="form-label">Tanggal
                                                            Mulai</label>
                                                        <input type="date" id="tanggal_mulai" name="tanggal_mulai"
                                                            class="form-control invoice-edit-input date-picker" required />
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label for="tanggal_selesai" class="form-label">Tanggal
                                                            Selesai</label>
                                                        <input type="date" id="tanggal_selesai" name="tanggal_selesai"
                                                            class="form-control invoice-edit-input date-picker" required />
                                                    </div>
                                                </div>
                                                <div class="col mb-2">
                                                    <label for="lampiran_bukti" class="form-label">Lampiran Bukti</label>
                                                    <input class="form-control" type="file" id="lampiran_bukti"
                                                        name="lampiran_bukti" />
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endsection
                        @section('scripts')
                            <script>
                                $(document).ready(function() {
                                    if (!$.fn.DataTable.isDataTable('.datatables')) {
                                        $('.datatables').DataTable();
                                    }
                                });
                            </script>
                        @endsection
