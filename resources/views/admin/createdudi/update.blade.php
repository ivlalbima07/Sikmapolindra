<div class="modal fade text-start" id="update" aria-labelledby="myModalLabel16" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel16">Tambah Dudi</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameBasic" class="form-label">Nama Rombel</label>
                        <input type="text" id="updateNameBasic" class="form-control" placeholder="Enter Name" />
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col mb-0">
                        <label for="updateName" class="form-label">Nama</label>
                        <input type="text" id="updateName" class="form-control" placeholder="Enter Name" />
                    </div>
                    <div class="col mb-0">
                        <label for="updateNIB" class="form-label">NIB</label>
                        <input type="text" id="updateNIB" class="form-control" placeholder="Enter NIB" />
                    </div>
                    <div class="col mb-0">
                        <label for="updateTanggalTerbit" class="form-label">Tanggal Terbit / SK Pendirian</label>
                        <input type="date" class="form-control invoice-edit-input date-picker"
                            id="updateTanggalTerbit" />
                    </div>
                    <div class="col mb-0">
                        <label for="updateTipe" class="form-label">Tipe</label>
                        <input type="text" id="updateTipe" class="form-control" placeholder="Enter Tipe" />
                    </div>
                </div>
                <div class=" my-1">
                    <label for="label-form">Nama Peserta Lain</label>
                    <textarea type="text" class="form-control" id="updatePesertaLain"> </textarea>
                </div>
                <div class="row g-4">
                    <div class="col mb-0">
                        <label for="updateProvince" class="form-label">Provinsi</label>
                        <select class="select2 form-select" id="updateProvince">
                            <option value="" hidden>Pilih Provinsi</option>
                            @foreach ($provinces as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col mb-0">
                        <label for="updateRegency" class="form-label">Kabupaten/Kota</label>
                        <select class="select2 form-select" id="updateRegency">
                            <option value="" hidden>Pilih Kabupaten</option>
                        </select>
                    </div>
                    <div class="col mb-0">
                        <label for="updateDistrict" class="form-label">Kecamatan</label>
                        <select class="select2 form-select" id="updateDistrict">
                            <option value="" hidden>Pilih Kecamatan</option>
                        </select>
                    </div>
                    <div class="col mb-0">
                        <label for="updateVillage" class="form-label">Desa</label>
                        <select class="select2 form-select" id="updateVillage">
                            <option value="" hidden>Pilih Desa</option>
                        </select>
                    </div>
                </div>

                <div class="row g-2 my-1">
                    <div class="col mb-0">
                        <label for="updateEmailMitra" class="form-label">Email Mitra</label>
                        <input type="text" id="updateEmailMitra" class="form-control"
                            placeholder="Enter Email Mitra" />
                    </div>
                    <div class="col mb-0">
                        <label for="updateNoTelpMitra" class="form-label">No. Telp. Mitra</label>
                        <input type="text" id="updateNoTelpMitra" class="form-control"
                            placeholder="Enter No. Telp. Mitra" />
                    </div>
                </div>
                <div>
                    <label class="form-label" for="updateSelect2Multiple">Klasifikasi Baku Lapangan Usaha (KBLI)</label>
                    <select class="select2 form-select" id="updateSelect2Multiple" multiple>
                        @foreach ($kblis as $kbli)
                            <option value="{{ $kbli->id }}">{{ $kbli->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="my-1">
                    <label class="form-label" for="updateSelectLingkup">Lingkup Kerjasama</label>
                    <select name="" id="updateSelectLingkup" class="form-select">
                        <option value="" hidden>Pilih Lingkup Kerjasama</option>
                        <option class="dropdown-item">Nasional</option>
                        <option class="dropdown-item">Internasional</option>
                    </select>
                </div>
                <div class="my-1">
                    <label class="form-label" for="updateSelectKriteria">Kriteria Mitra</label>
                    <select name="kriteria" id="updateSelectKriteria" class="form-select">
                        <option value="" hidden>Pilih Kriteria Mitra</option>
                        @foreach ($kriterias as $kriteria)
                            <option value="{{ $kriteria->id }}">{{ $kriteria->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="my-1">
                    <label class="form-label" for="updateSelectKlasifikasi">Klasifikasi</label>
                    <select name="klasifikasi" id="updateSelectKlasifikasi" class="form-select">
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
                                <form action="#" class="invoice-repeater">
                                    <div data-repeater-list="invoice">
                                        <div data-repeater-item>
                                            <div class="row g-4 mb-1">
                                                <div class="col mb-0">
                                                    <label for="updateNamaPJ" class="form-label">Nama</label>
                                                    <input type="text" id="updateNamaPJ" class="form-control"
                                                        placeholder="Enter Nama" />
                                                </div>
                                                <div class="col mb-0">
                                                    <label for="updateEmailPJ" class="form-label">Email</label>
                                                    <input type="email" id="updateEmailPJ" class="form-control"
                                                        placeholder="Enter Email" />
                                                </div>
                                                <div class="col mb-0">
                                                    <label for="updateNoHpPJ" class="form-label">Nomor Hp</label>
                                                    <input type="text" id="updateNoHpPJ" class="form-control"
                                                        placeholder="Enter Nomor Hp" />
                                                </div>
                                                <div class="col mb-0">
                                                    <button class="btn btn-outline-danger text-nowrap px-1"
                                                        data-repeater-delete type="button">
                                                        <i data-feather="x" class="me-25"></i>
                                                        <span>Delete</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="row g-4">
                                                <div class="col mb-0">
                                                    <label class="form-label" for="updateSelectGender">Jenis
                                                        Kelamin</label>
                                                    <select class="form-select" id="updateSelectGender"
                                                        data-bs-toggle="pill" aria-expanded="true">
                                                        <option value="" hidden>Pilih Jenis Kelamin</option>
                                                        <option class="dropdown-item">Laki-Laki</option>
                                                        <option class="dropdown-item">Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="col mb-0">
                                                    <label class="form-label" for="updateSelectIdentity">Jenis
                                                        Identitas</label>
                                                    <select class="form-select" id="updateSelectIdentity"
                                                        data-bs-toggle="pill" aria-expanded="true">
                                                        <option value="" hidden>Pilih Jenis Identitas</option>
                                                        <option class="dropdown-item">Ktp</option>
                                                        <option class="dropdown-item">Paspor</option>
                                                        <option class="dropdown-item">Lainnya</option>
                                                    </select>
                                                </div>
                                                <div class="col mb-0">
                                                    <label for="updateNoIdentitasPJ" class="form-label">Nomor
                                                        Identitas</label>
                                                    <input type="text" id="updateNoIdentitasPJ"
                                                        class="form-control" placeholder="Enter Nomor Identitas" />
                                                </div>
                                                <div class="col mb-0">
                                                    <label class="form-label"
                                                        for="updateSelectNationality">Kewarganegaraan</label>
                                                    <select class="form-select" id="updateSelectNationality"
                                                        data-bs-toggle="pill" aria-expanded="true">
                                                        <option value="" hidden>Pilih Kewarganegaraan</option>
                                                        <option class="dropdown-item">WNI</option>
                                                        <option class="dropdown-item">WNA</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <hr />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn btn-icon btn-primary" type="button"
                                                data-repeater-create>
                                                <i data-feather="plus" class="me-25"></i>
                                                <span>Add New</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice repeater -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    $(function() {
        const table = $('.datatables').DataTable({

        });
    });

    $(document).ready(function() {
        $('.select2').select2({
            dropdownParent: $('#update')
        });

        $('#updateProvince').change(function() {
            var provinceID = $(this).val();
            if (provinceID) {
                $.ajax({
                    url: '/getRegencies/' + provinceID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#updateRegency').empty().append(
                            '<option hidden>Pilih Kabupaten</option>');
                        $.each(data, function(key, value) {
                            $('#updateRegency').append('<option value="' + key +
                                '">' +
                                value + '</option>');
                        });
                    }
                });
            }
        });

        $('#updateRegency').change(function() {
            var regencyID = $(this).val();
            if (regencyID) {
                $.ajax({
                    url: '/getDistricts/' + regencyID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#updateDistrict').empty().append(
                            '<option hidden>Pilih Kecamatan</option>');
                        $.each(data, function(key, value) {
                            $('#updateDistrict').append('<option value="' + key +
                                '">' +
                                value + '</option>');
                        });
                    }
                });
            }
        });

        $('#updateDistrict').change(function() {
            var districtID = $(this).val();
            if (districtID) {
                $.ajax({
                    url: '/getVillages/' + districtID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#updateVillage').empty().append(
                            '<option hidden>Pilih Desa</option>');
                        $.each(data, function(key, value) {
                            $('#updateVillage').append('<option value="' + key +
                                '">' +
                                value + '</option>');
                        });
                    }
                });
            }
        });

        $('#updateBasicSelect1').change(function() {
            var kriteriaId = $(this).val();
            if (kriteriaId) {
                $.ajax({
                    url: '/get-klasifikasi/' + kriteriaId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#updateBasicSelect2').empty();
                        $('#updateBasicSelect2').append(
                            '<option value="" hidden>Pilih Klasifikasi</option>');
                        $.each(data, function(key, value) {
                            $('#updateBasicSelect2').append('<option value="' +
                                value.id +
                                '">' + value.nama_klasifikasi + '</option>');
                        });
                    }
                });
            } else {
                $('#updateBasicSelect2').empty();
                $('#updateBasicSelect2').append('<option value="" hidden>Pilih Klasifikasi</option>');
            }
        });
    });
</script>
