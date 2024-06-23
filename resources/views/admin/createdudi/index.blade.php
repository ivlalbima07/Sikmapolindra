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

            <div class="card-datatables table-responsive">
                <table class="datatables table table-borderles table-striped dt-advanced-search table">
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
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="align-top">1</td>
                            <td class=" align-top">1306220008076</td>
                            <td class=" align-top">NIB</td>
                            <td class=" align-top"> HENRY G. PADAGA</td>
                            <td class=" align-top">Prov. Sulawesi Tengah</td>
                            <td class=" align-top">Kab. Poso</td>
                            <td class=" align-top">Nasional</td>
                            <td class="align-top">Perusahaan Nasional Berstandar Tinggi</td>
                            <td class="align-top">Sme@negeri1</td>
                            <td class="align-top">
                                <div>
                                    <button type="button" onclick="location.href=''" class="btn btn-success btn-sm"><i
                                            data-feather='book'></i>Isi Pelaksanaan</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <div class="modal fade text-start" id="tambah" tabindex="-1" aria-labelledby="myModalLabel16" aria-hidden="true">
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
                            <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" />
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col mb-0">
                            <label for="nameBasic" class="form-label">Nama</label>
                            <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" />
                        </div>
                        <div class="col mb-0">
                            <label for="nameBasic" class="form-label">NIB</label>
                            <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" />
                        </div>
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Tanggal Terbit / SK Pendirian</label>
                            <input type="date" class="form-control invoice-edit-input date-picker" />
                        </div>
                        <div class="col mb-0">
                            <label for="nameBasic" class="form-label">Tipe</label>
                            <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" />
                        </div>
                    </div>
                    <div class=" my-1">
                        <label for="label-form">Nama Peserta Lain </label>
                        <textarea type="text" class="form-control"> </textarea>

                    </div>
                    <div class="row g-4">
                        <div class="col mb-0">
                            <label for="nameBasic" class="form-label">Provinsi</label>
                            <select class="select2 form-select" id="Provinsi">
                                <option value="" hidden>Pilih Provinsi</option>
                                <option>Alaska</option>
                                <option value="HI">Hawaii</option>
                                <option value="CA">California</option>
                            </select>
                        </div>
                        <div class="col mb-0">
                            <label for="nameBasic" class="form-label">Kabupaten/Kota</label>
                            <select class="select2 form-select" id="Kabupaten/Kota">
                                <option value="" hidden>Pilih Kabupaten</option>
                                <option>Alaska</option>
                                <option value="HI">Hawaii</option>
                                <option value="CA">California</option>
                            </select>
                        </div>
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Kecamatan</label>
                            <select class="select2 form-select" id="Kecamatan">
                                <option value="" hidden>Pilih Kecamatan</option>
                                <option>Alaska</option>
                                <option value="HI">Hawaii</option>
                                <option value="CA">California</option>
                            </select>
                        </div>
                        <div class="col mb-0">
                            <label for="nameBasic" class="form-label">Kelurahan</label>
                            <select class="select2 form-select" id="Kelurahan">
                                <option value="" hidden>Pilih Kelurahan</option>
                                <option>Alaska</option>
                                <option value="HI">Hawaii</option>
                                <option value="CA">California</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-2 my-1">
                        <div class="col mb-0">
                            <label for="nameBasic" class="form-label">Email Mitra</label>
                            <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" />
                        </div>
                        <div class="col mb-0">
                            <label for="nameBasic" class="form-label">No. Telp. Mitra</label>
                            <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" />
                        </div>
                    </div>
                    <div>
                        <label class="form-label" for="select2-multiple">Multiple</label>
                        <select class="select2 form-select" id="select2-multiple" multiple>
                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                <option value="AK">Alaska</option>
                                <option value="HI">Hawaii</option>
                            </optgroup>
                            <optgroup label="Pacific Time Zone">
                                <option value="CA">California</option>
                                <option value="NV">Nevada</option>
                                <option value="OR">Oregon</option>
                                <option value="WA">Washington</option>
                            </optgroup>
                            <optgroup label="Mountain Time Zone">
                                <option value="AZ">Arizona</option>
                                <option value="CO" selected>Colorado</option>
                                <option value="ID">Idaho</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NM">New Mexico</option>
                                <option value="ND">North Dakota</option>
                                <option value="UT">Utah</option>
                                <option value="WY">Wyoming</option>
                            </optgroup>
                            <optgroup label="Central Time Zone">
                                <option value="AL">Alabama</option>
                                <option value="AR">Arkansas</option>
                                <option value="IL">Illinois</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="OK">Oklahoma</option>
                                <option value="SD">South Dakota</option>
                                <option value="TX">Texas</option>
                                <option value="TN">Tennessee</option>
                                <option value="WI">Wisconsin</option>
                            </optgroup>
                            <optgroup label="Eastern Time Zone">
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="FL" selected>Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="IN">Indiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="OH">Ohio</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WV">West Virginia</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="my-1">
                        <label class="form-label" for="basicSelect1">Lingkup Kerjasama </label>
                        <select name="" id="" class="form-select">
                            <option value="" hidden>Pilih Lingkup Kerjasama</option>
                            <option class="dropdown-item">Nasional</option>
                            <option class="dropdown-item">Internasional</option>
                        </select>
                    </div>
                    <div class="my-1">
                        <label class="form-label" for="basicSelect1">Kriteria Mitra</label>
                        <select name="" id="" class="form-select">
                            <option value="" hidden>Pilih Kriteria Mitra</option>
                            <option class="dropdown-item">Nasional</option>
                            <option class="dropdown-item">Internasional</option>
                        </select>
                    </div>
                    <div class="my-1">
                        <label class="form-label" for="basicSelect1">Klasifikasi</label>
                        <select name="" id="" class="form-select">
                            <option value="" hidden>Pilih Klasifikasi</option>
                            <option class="dropdown-item">Nasional</option>
                            <option class="dropdown-item">Internasional</option>
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
                                                        <label for="nameBasic" class="form-label">Nama</label>
                                                        <input type="text" id="nameBasic" class="form-control"
                                                            placeholder="Enter Name" />
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label for="nameBasic" class="form-label">Email</label>
                                                        <input type="email" id="nameBasic" class="form-control"
                                                            placeholder="Enter Name" />
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label for="nameBasic" class="form-label">Nomor Hp</label>
                                                        <input type="text" id="nameBasic" class="form-control"
                                                            placeholder="Enter Name" />
                                                    </div>
                                                    <div class="col mb-0">
                                                        <button class="btn btn-outline-danger text-nowrap px-1"
                                                            data-repeater-delete type="button">
                                                            <i data-feather="x" class="me-25"></i>
                                                            <span>Delete</span>
                                                        </button>
                                                    </div>

                                                </div>
                                                <div class="row g-4 ">
                                                    <div class="col mb-0">
                                                        <label class="form-label" for="basicSelectGender">Jenis
                                                            Kelamin</label>
                                                        <select class="form-select" id="basicSelectGender"
                                                            data-bs-toggle="pill" aria-expanded="true">
                                                            <option value="" hidden>Pilih Jenis Kelamin</option>
                                                            <option class="dropdown-item">Laki-Laki</option>
                                                            <option class="dropdown-item">Perempuan</option>
                                                        </select>
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label class="form-label" for="basicSelectIdentity">Jenis
                                                            Identitas</label>
                                                        <select class="form-select" id="basicSelectIdentity"
                                                            data-bs-toggle="pill" aria-expanded="true">
                                                            <option value="" hidden>Pilih Jenis Identitas</option>
                                                            <option class="dropdown-item">Ktp</option>
                                                            <option class="dropdown-item">Paspor</option>
                                                            <option class="dropdown-item">Lainnya</option>
                                                        </select>
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label for="nameBasic" class="form-label">Nomor Identitas</label>
                                                        <input type="text" id="nameBasic" class="form-control"
                                                            placeholder="Enter Name" />
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label class="form-label"
                                                            for="basicSelectNationality">Kewarganegaraan</label>
                                                        <select class="form-select" id="basicSelectNationality"
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
    @endsection

    @section('scripts')
        <script>
            $(function() {
                const table = $('.datatables').DataTable({

                })
            });
        </script>
    @endsection
