@extends('admin.app')
@extends('layouts.header')
<style>
    .modal-body {
        max-height: calc(100vh - 200px);
        overflow-y: auto;
    }
</style>
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
                        <button type="button" class="btn btn-primary" id="tambahDudi" data-bs-toggle="modal" data-bs-target="#dudiModal">Buat DUDI</button>
                    </div>                    
                </div>
            </div>

            <div class="card-datatables table-responsive">
                <table class="table table-borderless table-striped dt-advanced-search table">
                    <thead>
                        <tr>    
                            <th>NO</th>
                            <th>NIB/NPSN</th>
                            <th>Tipe</th>
                            <th>Nama Perseroan</th>
                            <th>Provinsi</th>
                            <th>Kabupaten/Kota</th>
                            <th>Lingkup</th>
                            <th>Kategori Mitra</th>
                            <th>Owner</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dudis as $index => $dudi)
                        {{-- @dd($dudi); --}}
                            <tr>
                                <td class="align-top">{{ $index + 1 }}</td>
                                <td class="align-top">{{ $dudi->nib }}</td>
                                <td class="align-top">{{ $dudi->tipe }}</td>
                                <td class="align-top">{{ $dudi->nama_perseroan }}</td>
                                <td class="align-top">{{ $dudi->provinsi->name }}</td>
                                <td class="align-top">{{ $dudi->kabupaten->name }}</td>
                                <td class="align-top">{{ $dudi->lingkupkerjasama }}</td>
                                {{-- @dd($dudi->kriteria) --}}
                                <td class="align-top">{{ $dudi->kriteria->nama }}</td>
                                <td class="align-top">{{ $dudi->user->name }}</td>
                                <td class="align-top">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#viewModal"
                                            class="btn btn-warning btn-sm viewButton" data-bs-placement="top" title="View data"
                                            data-id="{{ $dudi->id }}">
                                            <i data-feather='inbox'></i>
                                        </button>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#dudiModal"
                                            class="btn btn-primary btn-sm editButton" data-bs-placement="top" title="Edit data" data-id="{{ $dudi->id }}">
                                            <i data-feather="edit"></i>
                                        </button>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#modaledit"
                                            class="btn btn-danger btn-sm " data-bs-placement="top" title="Delete data">
                                            <i data-feather="trash"></i>
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

    <!-- Modal view -->
    <div class="modal fade text-start" id="viewModal" tabindex="-1" aria-labelledby="myModalLabel16" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16">Manajemen Dudi</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <section class="invoice-preview-wrapper">
                                <div class="row invoice-preview">
                                    <div class="col-12">
                                        <div class="card invoice-preview-card">
                                            <div class="card-body invoice-padding pb-0">
                                                <div class="row g-3 invoice-spacing">
                                                    <div class="col-md-6">
                                                        <table class="table table-borderless">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="fw-bolder">Nama</td>
                                                                    <td>:</td>
                                                                    <td id="dudi-nama"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="fw-bolder">Tipe</td>
                                                                    <td>:</td>
                                                                    <td id="dudi-tipe"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="fw-bolder">NIB</td>
                                                                    <td>:</td>
                                                                    <td id="dudi-nib"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="fw-bolder">Tanggal Terbit / SK Pendirian</td>
                                                                    <td>:</td>
                                                                    <td id="dudi-tanggal-terbit"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="fw-bolder">Alamat</td>
                                                                    <td>:</td>
                                                                    <td id="dudi-alamat"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div class="mt-1">
                                                            <label class="fw-bolder">Klasifikasi Baku Lapangan Usaha (KBLI):</label>
                                                            <table class="table table-bordered" id="dudi-kbli">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Nama</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <!-- Data KBLI akan dimuat di sini -->
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <table class="table table-borderless">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="fw-bolder">Email Mitra</td>
                                                                    <td>:</td>
                                                                    <td id="dudi-email"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="fw-bolder">No. Telp. Mitra</td>
                                                                    <td>:</td>
                                                                    <td id="dudi-telp"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="fw-bolder">Kriteria Mitra</td>
                                                                    <td>:</td>
                                                                    <td id="dudi-kriteria"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="fw-bolder">Lingkup Kerjasama</td>
                                                                    <td>:</td>
                                                                    <td id="dudi-lingkup"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="fw-bolder">Provinsi</td>
                                                                    <td>:</td>
                                                                    <td id="dudi-provinsi"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="fw-bolder">Kabupaten/Kota</td>
                                                                    <td>:</td>
                                                                    <td id="dudi-kabupaten"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="fw-bolder">Kecamatan</td>
                                                                    <td>:</td>
                                                                    <td id="dudi-kecamatan"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="fw-bolder">Kelurahan</td>
                                                                    <td>:</td>
                                                                    <td id="dudi-kelurahan"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <hr class="invoice-spacing" />
                                            <h4 class="text-center">Data Penanggung Jawab</h4>
                                            <hr class="invoice-spacing" />
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Email</th>
                                                            <th>Nomor HP</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th>Jenis Identitas</th>
                                                            <th>Nomor Identitas</th>
                                                            <th>Kewarganegaraan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="penanggung-jawab-list"></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="dudiModal" tabindex="-1" aria-labelledby="myModalLabel16" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <form id="dudiForm" method="POST">
                    @csrf
                    <input type="hidden" id="method" name="_method" value="POST">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel16">Tambah/Edit Dudi</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <input type="hidden" id="id" name="id">
                                <div class="row g-4">
                                    <div class="col mb-0">
                                        <label for="nama_perseroan" class="form-label">Nama Perseroan</label>
                                        <input type="text" id="nama_perseroan" name="nama_perseroan" class="form-control" placeholder="Masukkan Nama Perseroan" required>
                                    </div>
                                    <div class="col mb-0">
                                        <label for="nib" class="form-label">NIB</label>
                                        <input type="number" id="nib" name="nib" class="form-control" placeholder="Enter NIB" />
                                    </div>
                                    <div class="col mb-0">
                                        <label for="skPendirian" class="form-label">Tanggal Terbit / SK Pendirian</label>
                                        <input type="date" id="tanggal_terbit" name="tanggal_terbit" class="form-control invoice-edit-input date-picker" />
                                    </div>
                                    <div class="col mb-0">
                                        <label for="tipe" class="form-label">Tipe</label>
                                        <input type="text" id="tipe" name="tipe" class="form-control" placeholder="Enter Type" />
                                    </div>
                                </div>
                                <div class="my-1">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea id="alamat" name="alamat" class="form-control"></textarea>
                                </div>
                                <div class="row g-4">
                                    <div class="col mb-0">
                                        <label for="province" class="form-label">Provinsi</label>
                                        <select class="select2 form-select" id="province" name="province_id">
                                            <option value="" hidden>Pilih Provinsi</option>
                                            @foreach ($provinces as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col mb-0">
                                        <label for="regency" class="form-label">Kabupaten/Kota</label>
                                        <select class="select2 form-select" id="regency" name="regency_id">
                                            <option value="" hidden>Pilih Kabupaten</option>
                                        </select>
                                    </div>
                                    <div class="col mb-0">
                                        <label for="district" class="form-label">Kecamatan</label>
                                        <select class="select2 form-select" id="district" name="district_id">
                                            <option value="" hidden>Pilih Kecamatan</option>
                                        </select>
                                    </div>
                                    <div class="col mb-0">
                                        <label for="village" class="form-label">Desa</label>
                                        <select class="select2 form-select" id="village" name="village_id">
                                            <option value="" hidden>Pilih Desa</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-2 my-1">
                                    <div class="col mb-0">
                                        <label for="emailMitra" class="form-label">Email Mitra</label>
                                        <input type="email" id="emailMitra" name="email_mitra" class="form-control" placeholder="Enter Email" />
                                    </div>
                                    <div class="col mb-0">
                                        <label for="telpMitra" class="form-label">No. Telp. Mitra</label>
                                        <input type="number" id="telpMitra" name="no_telp_mitra" class="form-control" placeholder="Enter Phone" />
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label" for="select2-multiple">Klasifikasi Baku Lapangan Usaha (KBLI)</label>
                                    <select class="select2 form-select" id="select2-multiple" name="klasifikasi_baku[]" multiple>
                                        @foreach ($kblis as $kbli)
                                            <option value="{{ $kbli->id }}">{{ $kbli->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>                                      
                                <div class="my-1">
                                    <label class="form-label" for="basicSelect1">Lingkup Kerjasama </label>
                                    <select name="lingkupkerjasama" class="form-select">
                                        <option value="" hidden>Pilih Lingkup Kerjasama</option>
                                        <option value="nasional" class="dropdown-item">Nasional</option>
                                        <option value="internasional" class="dropdown-item">Internasional</option>
                                    </select>
                                </div>
                                <div class="my-1">
                                    <label class="form-label" for="basicSelect1">Kriteria Mitra</label>
                                    <select name="kriteria_id" id="basicSelect1" class="form-select">
                                        <option value="" hidden>Pilih Kriteria Mitra</option>
                                        @foreach ($kriterias as $kriteria)
                                            <option value="{{ $kriteria->id }}">{{ $kriteria->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
    
                                <div class="my-1">
                                    <label class="form-label" for="basicSelect2">Klasifikasi</label>
                                    <select name="klasifikasi_id" id="basicSelect2" class="form-select">
                                        <option value="" hidden>Pilih Klasifikasi</option>
                                        <!-- Options will be populated dynamically -->
                                    </select>
                                </div>                                                       
                                
                                <hr>
                                <h4 class="text-center">Data Penanggung Jawab</h4>
                                <hr>
                                <div class="row">
                                    <!-- Invoice repeater -->
                                    <div class="col-12 my-1">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title text-center">Data Penanggung Jawab</h4>
                                            </div>
                                            <div class="card-body">
                                                <!-- Penanggung Jawab Section -->
                                                <div class="invoice-repeater">
                                                    <div data-repeater-list="penanggung_jawab">
                                                        <div data-repeater-item>
                                                            <div class="row g-4 mb-1">
                                                                <div class="col mb-0">
                                                                    <label for="penanggungJawabNama" class="form-label">Nama</label>
                                                                    <input type="text" id="penanggungJawabNama" name="penanggung_jawab[][nama]" class="form-control" placeholder="Enter Name" />
                                                                </div>
                                                                <div class="col mb-0">
                                                                    <label for="penanggungJawabEmail" class="form-label">Email</label>
                                                                    <input type="email" id="penanggungJawabEmail" name="penanggung_jawab[][email]" class="form-control" placeholder="Enter Email" />
                                                                </div>
                                                                <div class="col mb-0">
                                                                    <label for="penanggungJawabNoHp" class="form-label">Nomor Hp</label>
                                                                    <input type="number" id="penanggungJawabNoHp" name="penanggung_jawab[][nomor_hp]" class="form-control" placeholder="Enter Phone" />
                                                                </div>
                                                                <div class="col mb-0">
                                                                    <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                                                        <i data-feather="x" class="me-25"></i>
                                                                        <span>Delete</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="row g-4">
                                                                <div class="col mb-0">
                                                                    <label class="form-label" for="penanggungJawabGender">Jenis Kelamin</label>
                                                                    <select class="form-select" id="penanggungJawabGender" name="penanggung_jawab[][jenis_kelamin]" data-bs-toggle="pill" aria-expanded="true">
                                                                        <option value="" hidden>Pilih Jenis Kelamin</option>
                                                                        <option value="laki-laki">Laki-Laki</option>
                                                                        <option value="perempuan">Perempuan</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col mb-0">
                                                                    <label class="form-label" for="penanggungJawabIdentity">Jenis Identitas</label>
                                                                    <select class="form-select" id="penanggungJawabIdentity" name="penanggung_jawab[][jenis_identitas]" data-bs-toggle="pill" aria-expanded="true">
                                                                        <option value="" hidden>Pilih Jenis Identitas</option>
                                                                        <option value="KTP">KTP</option>
                                                                        <option value="SIM">SIM</option>
                                                                        <option value="Paspor">Paspor</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col mb-0">
                                                                    <label for="penanggungJawabNoIdentitas" class="form-label">Nomor Identitas</label>
                                                                    <input type="text" id="penanggungJawabNoIdentitas" name="penanggung_jawab[][nomor_identitas]" class="form-control" placeholder="Enter ID Number" />
                                                                </div>
                                                                <div class="col mb-0">
                                                                    <label class="form-label" for="penanggungJawabNationality">Kewarganegaraan</label>
                                                                    <select class="form-select" id="penanggungJawabNationality" name="penanggung_jawab[][kewarganegaraan]" data-bs-toggle="pill" aria-expanded="true">
                                                                        <option value="" hidden>Pilih Kewarganegaraan</option>
                                                                        <option value="WNI">WNI</option>
                                                                        <option value="WNA">WNA</option>
                                                                    </select>
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
                                                <!-- /Penanggung Jawab Section -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Invoice repeater -->
                                </div>                                
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
      
    

    {{-- modal view --}}
@endsection

@section('scripts')
    <script>
        $(function() {
            const table = $('.datatables').DataTable({

            })
        });

        $(document).ready(function() {
            $('#dudiModal').on('hidden.bs.modal', function () {
                // Clear all input fields
                $(this).find('form')[0].reset();

                // Clear Select2 elements
                $('#select2-multiple').val(null).trigger('change');
                $('select[name="kriteria_id"]').val(null).trigger('change');
                $('select[name="klasifikasi_id"]').val(null).trigger('change');
                $('select[name="lingkupkerjasama"]').val(null).trigger('change');

                // Reset dropdowns for provinsi, kabupaten, kecamatan, desa
                $('#province').val(null).trigger('change');
                $('#regency').empty().append('<option value="" hidden>Pilih Kabupaten</option>');
                $('#district').empty().append('<option value="" hidden>Pilih Kecamatan</option>');
                $('#village').empty().append('<option value="" hidden>Pilih Desa</option>');

                // Clear Penanggung Jawab repeater list
                var repeaterList = $('.invoice-repeater [data-repeater-list="penanggung_jawab"]');
                repeaterList.empty();

                // Reset form action
                $('#dudiForm').attr('action', '{{ route('dudi.store') }}');
                $('#method').val('POST');
            });



            // Event listener untuk tombol edit
            $('.editButton').on('click', function() {
                var id = $(this).data('id');
                var url = `{{ route('dudi.edit', ':id') }}`.replace(':id', id);

                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#nama_perseroan').val(data.nama_perseroan);
                        $('#nib').val(data.nib);
                        $('#tanggal_terbit').val(data.tanggal_terbit);
                        $('#tipe').val(data.tipe);
                        $('#alamat').val(data.alamat);
                        $('#emailMitra').val(data.email_mitra);
                        $('#telpMitra').val(data.no_mitra);

                        // Load regency, district, and village based on selected province
                        $('#province').val(data.provinsi.id).trigger('change');
                        setTimeout(function() {
                            $('#regency').val(data.kabupaten.id).trigger('change');
                            setTimeout(function() {
                                $('#district').val(data.kecamatan.id).trigger('change');
                                setTimeout(function() {
                                    $('#village').val(data.desa.id).trigger('change');
                                }, 500);
                            }, 500);
                        }, 500);

                        // Handle Select2 multiple elements for klasifikasi_baku
                        var klasifikasiBakuIds = data.klasifikasi_baku.map(function(item) {
                            return item.id;
                        });
                        setTimeout(function() {
                            $('#select2-multiple').val(klasifikasiBakuIds).trigger('change');
                        }, 1000);

                        // Set the kriteria and klasifikasi values
                        $('select[name="kriteria_id"]').val(data.kriteria.id).trigger('change');
                        setTimeout(function() {
                            $.ajax({
                                url: '/get-klasifikasi/' + data.kriteria.id,
                                type: 'GET',
                                dataType: 'json',
                                success: function(response) {
                                    $('select[name="klasifikasi_id"]').empty();
                                    $.each(response, function(key, value) {
                                        $('select[name="klasifikasi_id"]').append('<option value="' + value.id + '">' + value.nama_klasifikasi + '</option>');
                                    });
                                    $('select[name="klasifikasi_id"]').val(data.klasifikasi.id).trigger('change');
                                },
                                error: function(xhr, status, error) {
                                    console.error('AJAX Error:', status, error); // Debugging
                                }
                            });
                        }, 1000);

                        $('select[name="lingkupkerjasama"]').val(data.lingkupkerjasama).trigger('change');

                        // Handle penanggung jawabs
                        var penanggungJawabs = data.penanggung_jawabs;
                        var repeaterList = $('.invoice-repeater [data-repeater-list="penanggung_jawab"]');
                        repeaterList.empty(); // Kosongkan daftar repeater

                        penanggungJawabs.forEach(function(pj) {
                            var newItem = `
                                <div data-repeater-item>
                                    <input type="hidden" name="penanggung_jawab[${pj.id}][id]" value="${pj.id}" />
                                    <div class="row g-4 mb-1">
                                        <div class="col mb-0">
                                            <label for="penanggungJawabNama${pj.id}" class="form-label">Nama</label>
                                            <input type="text" id="penanggungJawabNama${pj.id}" name="penanggung_jawab[${pj.id}][nama]" class="form-control" placeholder="Enter Name" value="${pj.nama}" />
                                        </div>
                                        <div class="col mb-0">
                                            <label for="penanggungJawabEmail${pj.id}" class="form-label">Email</label>
                                            <input type="email" id="penanggungJawabEmail${pj.id}" name="penanggung_jawab[${pj.id}][email]" class="form-control" placeholder="Enter Email" value="${pj.email}" />
                                        </div>
                                        <div class="col mb-0">
                                            <label for="penanggungJawabNoHp${pj.id}" class="form-label">Nomor Hp</label>
                                            <input type="number" id="penanggungJawabNoHp${pj.id}" name="penanggung_jawab[${pj.id}][nomor_hp]" class="form-control" placeholder="Enter Phone" value="${pj.nomor_hp}" />
                                        </div>
                                        <div class="col mb-0">
                                            <button class="btn btn-outline-danger text-nowrap px-1 deleteButton" type="button">
                                                <i data-feather="x" class="me-25"></i>
                                                <span>Delete</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row g-4">
                                        <div class="col mb-0">
                                            <label class="form-label" for="penanggungJawabGender${pj.id}">Jenis Kelamin</label>
                                            <select class="form-select" id="penanggungJawabGender${pj.id}" name="penanggung_jawab[${pj.id}][jenis_kelamin]" data-bs-toggle="pill" aria-expanded="true">
                                                <option value="" hidden>Pilih Jenis Kelamin</option>
                                                <option value="laki-laki" ${pj.jenis_kelamin == 'laki-laki' ? 'selected' : ''}>Laki-Laki</option>
                                                <option value="perempuan" ${pj.jenis_kelamin == 'perempuan' ? 'selected' : ''}>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="col mb-0">
                                            <label class="form-label" for="penanggungJawabIdentity${pj.id}">Jenis Identitas</label>
                                            <select class="form-select" id="penanggungJawabIdentity${pj.id}" name="penanggung_jawab[${pj.id}][jenis_identitas]" data-bs-toggle="pill" aria-expanded="true">
                                                <option value="" hidden>Pilih Jenis Identitas</option>
                                                <option value="KTP" ${pj.jenis_identitas == 'KTP' ? 'selected' : ''}>KTP</option>
                                                <option value="SIM" ${pj.jenis_identitas == 'SIM' ? 'selected' : ''}>SIM</option>
                                                <option value="Paspor" ${pj.jenis_identitas == 'Paspor' ? 'selected' : ''}>Paspor</option>
                                            </select>
                                        </div>
                                        <div class="col mb-0">
                                            <label for="penanggungJawabNoIdentitas${pj.id}" class="form-label">Nomor Identitas</label>
                                            <input type="text" id="penanggungJawabNoIdentitas${pj.id}" name="penanggung_jawab[${pj.id}][nomor_identitas]" class="form-control" placeholder="Enter ID Number" value="${pj.nomor_identitas}" />
                                        </div>
                                        <div class="col mb-0">
                                            <label class="form-label" for="penanggungJawabNationality${pj.id}">Kewarganegaraan</label>
                                            <select class="form-select" id="penanggungJawabNationality${pj.id}" name="penanggung_jawab[${pj.id}][kewarganegaraan]" data-bs-toggle="pill" aria-expanded="true">
                                                <option value="" hidden>Pilih Kewarganegaraan</option>
                                                <option value="WNI" ${pj.kewarganegaraan == 'WNI' ? 'selected' : ''}>WNI</option>
                                                <option value="WNA" ${pj.kewarganegaraan == 'WNA' ? 'selected' : ''}>WNA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr />
                                </div>
                            `;
                            repeaterList.append(newItem);
                        });

                        feather.replace(); // Refresh ikon feather
                        $('#dudiForm').attr('action', `{{ route('dudi.update', ':id') }}`.replace(':id', id)); // URL untuk memperbarui data
                        $('#method').val('PUT');
                        $('#dudiModal').modal('show');
                    },
                    error: function() {
                        alert('Failed to fetch data.');
                    }
                });
            });

            // Event handler for the "Delete" button
            $(document).on('click', '.deleteButton', function() {
                $(this).closest('[data-repeater-item]').find('input[type="hidden"]').attr('name', 'penanggung_jawab_delete[]');
                $(this).closest('[data-repeater-item]').hide();
            });


            // Event listener untuk submit form
            $('#dudiForm').on('submit', function(e) {
                e.preventDefault(); // Mencegah pengiriman form secara default

                var formData = $(this).serialize();
                var url = $(this).attr('action');

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500,
                            customClass: {
                                confirmButton: 'btn btn-primary'
                            },
                            buttonsStyling: false
                        }).then(() => {
                            location.reload(); // Memuat ulang halaman setelah sukses
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

            // Dropdown dinamis
            $('#province').change(function() {
                var provinceID = $(this).val();
                if (provinceID) {
                    $.ajax({
                        url: '/getRegencies/' + provinceID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#regency').empty().append('<option value="" hidden>Pilih Kabupaten</option>');
                            $.each(data, function(key, value) {
                                $('#regency').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#regency').empty().append('<option value="" hidden>Pilih Kabupaten</option>');
                    $('#district').empty().append('<option value="" hidden>Pilih Kecamatan</option>');
                    $('#village').empty().append('<option value="" hidden>Pilih Desa</option>');
                }
            });

            $('#regency').change(function() {
                var regencyID = $(this).val();
                if (regencyID) {
                    $.ajax({
                        url: '/getDistricts/' + regencyID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#district').empty().append('<option value="" hidden>Pilih Kecamatan</option>');
                            $.each(data, function(key, value) {
                                $('#district').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#district').empty().append('<option value="" hidden>Pilih Kecamatan</option>');
                    $('#village').empty().append('<option value="" hidden>Pilih Desa</option>');
                }
            });

            $('#district').change(function() {
                var districtID = $(this).val();
                if (districtID) {
                    $.ajax({
                        url: '/getVillages/' + districtID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#village').empty().append('<option value="" hidden>Pilih Desa</option>');
                            $.each(data, function(key, value) {
                                $('#village').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#village').empty().append('<option value="" hidden>Pilih Desa</option>');
                }
            });


            $('#basicSelect1').change(function() {
                var kriteriaId = $(this).val();
                console.log(kriteriaId);
                if (kriteriaId) {
                    $.ajax({
                        url: '/get-klasifikasi/' + kriteriaId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log('Data received:', data); // Debugging
                            $('#basicSelect2').empty();
                            $('#basicSelect2').append('<option value="" hidden>Pilih Klasifikasi</option>');
                            $.each(data, function(key, value) {
                                $('#basicSelect2').append('<option value="' + value.id + '">' + value.nama_klasifikasi + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', status, error); // Debugging
                        }
                    });
                } else {
                    $('#basicSelect2').empty();
                    $('#basicSelect2').append('<option value="" hidden>Pilih Klasifikasi</option>');
                }
            });


            $('.viewButton').on('click', function() {
                var id = $(this).data('id');
                var url = `{{ route('dudi.show', ':id') }}`.replace(':id', id);

                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Memeriksa apakah data diterima dengan benar
                        console.log(data);

                        $('#dudi-nama').text(data.nama_perseroan);
                        $('#dudi-tipe').text(data.tipe);
                        $('#dudi-nib').text(data.nib);
                        $('#dudi-tanggal-terbit').text(data.tanggal_terbit);
                        $('#dudi-alamat').text(data.alamat);
                        $('#dudi-email').text(data.email_mitra);
                        $('#dudi-telp').text(data.no_mitra);
                        $('#dudi-kriteria').text(data.kriteria ? data.kriteria.nama : '');
                        $('#dudi-lingkup').text(data.lingkupkerjasama);
                        $('#dudi-provinsi').text(data.provinsi ? data.provinsi.name : '');
                        $('#dudi-kabupaten').text(data.kabupaten ? data.kabupaten.name : '');
                        $('#dudi-kecamatan').text(data.kecamatan ? data.kecamatan.name : '');
                        $('#dudi-kelurahan').text(data.desa ? data.desa.name : '');

                        // Klasifikasi Baku Lapangan Usaha (KBLI)
                        var kbliContent = '';
                        $.each(data.klasifikasi_baku, function(index, kbli) {
                            kbliContent += '<tr><td>' + (index + 1) + '</td><td>' + kbli.nama + '</td></tr>';
                        });
                        $('#dudi-kbli tbody').html(kbliContent);

                        // Data Penanggung Jawab
                        var pjContent = '';
                        $.each(data.penanggung_jawabs, function(index, pj) {
                            pjContent += '<tr>';
                            pjContent += '<td>' + (index + 1) + '</td>';
                            pjContent += '<td>' + pj.nama + '</td>';
                            pjContent += '<td>' + pj.email + '</td>';
                            pjContent += '<td>' + pj.nomor_hp + '</td>';
                            pjContent += '<td>' + pj.jenis_kelamin + '</td>';
                            pjContent += '<td>' + pj.jenis_identitas + '</td>';
                            pjContent += '<td>' + pj.nomor_identitas + '</td>';
                            pjContent += '<td>' + pj.kewarganegaraan + '</td>';
                            pjContent += '</tr>';
                        });
                        $('#penanggung-jawab-list').html(pjContent);

                        // Tampilkan modal
                        $('#viewModal').modal('show');
                    },
                    error: function() {
                        alert('Failed to fetch data.');
                    }
                });
            });
        });

    </script>
@endsection