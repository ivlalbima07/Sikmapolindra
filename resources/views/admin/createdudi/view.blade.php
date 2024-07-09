{{-- modal view --}}
<div class="modal fade text-start" id="view" tabindex="-1" aria-labelledby="myModalLabel16" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel16">Manajemen Dudi</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <section class="invoice-preview-wrapper">
                        <div class="row invoice-preview">
                            <!-- Invoice -->
                            <div class="">
                                <div class="card invoice-preview-card">
                                    <div class="card-body invoice-padding pb-0">
                                        <!-- Header starts -->
                                        <div class="row g-3 invoice-spacing">
                                            <div class="col">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td class="fw-bolder">Nama</td>
                                                            <td>:</td>
                                                            <td id="nama-perseroan"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-bolder">Tipe</td>
                                                            <td>:</td>
                                                            <td id="tipe"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-bolder">NIB</td>
                                                            <td>:</td>
                                                            <td id="nib"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-bolder">Tanggal Terbit / SK Pendirian</td>
                                                            <td>:</td>
                                                            <td id="tanggal_terbit"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-bolder">Alamat</td>
                                                            <td>:</td>
                                                            <td id="alamat"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="mt-1">
                                                    <label class="fw-bolder">Klasifikasi Baku Lapangan Usaha (KBLI):</label>
                                                    <table id="klasifikasi_baku"></table>
                                                </div>
                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td class="fw-bolder">Email Mitra</td>
                                                            <td>:</td>
                                                            <td id="email_mitra"></td>
                                                        </tr>
                                                        <tr class="mt-2">
                                                            <td class="fw-bolder" style="padding: 8px">No. Telp. Mitra</td>
                                                            <td>:</td>
                                                            <td id="no_mitra"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-bolder">Kriteria Mitra</td>
                                                            <td>:</td>
                                                            <td id="kriteria"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-bolder">Lingkup Kerjasama</td>
                                                            <td>:</td>
                                                            <td id="lingkupkerjasama"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-bolder">Provinsi</td>
                                                            <td>:</td>
                                                            <td id="provinsi"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-bolder">Kabupaten/Kota</td>
                                                            <td>:</td>
                                                            <td id="kabupaten"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-bolder">Kecamatan</td>
                                                            <td>:</td>
                                                            <td id="kecamatan"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-bolder">Kelurahan</td>
                                                            <td>:</td>
                                                            <td id="desa"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- Header ends -->
                                    </div>
                                    <hr class="invoice-spacing" />
                                    <h4 class="text-center">Data Penanggung Jawab</h4>
                                    <hr class="invoice-spacing" />
                                    <div class="card-datatables table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Nomer HP</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Jenis Identitas</th>
                                                    <th>Nomor Identitas</th>
                                                    <th>Kewarganegaraan</th>
                                                </tr>
                                            </thead>
                                            <tbody id="penanggung_jawab_table"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /Invoice -->
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- modal view end --}}

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".viewDudi").forEach(button => {
            button.addEventListener("click", function() {
                var id = this.getAttribute("data-id");
                fetch(`/dudi/${id}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        document.getElementById("nama_perseroan").innerText = data.nama_perseroan;
                        document.getElementById("tipe").innerText = data.tipe;
                        document.getElementById("nib").innerText = data.nib;
                        document.getElementById("tanggal_terbit").innerText = data.tanggal_terbit;
                        document.getElementById("alamat").innerText = data.alamat;
                        document.getElementById("email_mitra").innerText = data.email_mitra;
                        document.getElementById("no_mitra").innerText = data.no_mitra;
                        document.getElementById("kriteria").innerText = data.kriteria.nama;
                        document.getElementById("lingkupkerjasama").innerText = data.lingkupkerjasama;
                        document.getElementById("provinsi").innerText = data.provinsi.name;
                        document.getElementById("kabupaten").innerText = data.kabupaten.name;
                        document.getElementById("kecamatan").innerText = data.kecamatan.name;
                        document.getElementById("desa").innerText = data.desa.name;

                        var klasifikasiTable = document.getElementById("klasifikasi_baku");
                        klasifikasiTable.innerHTML = "";
                        data.klasifikasi_baku.forEach(klasifikasi => {
                            var row = klasifikasiTable.insertRow();
                            var cell = row.insertCell(0);
                            cell.innerText = klasifikasi;
                        });

                        var penanggungJawabTable = document.getElementById("penanggung_jawab_table");
                        penanggungJawabTable.innerHTML = "";
                        data.penanggung_jawabs.forEach((pj, index) => {
                            var row = penanggungJawabTable.insertRow();
                            row.insertCell(0).innerText = index + 1;
                            row.insertCell(1).innerText = pj.nama;
                            row.insertCell(2).innerText = pj.email;
                            row.insertCell(3).innerText = pj.nomor_hp;
                            row.insertCell(4).innerText = pj.jenis_kelamin;
                            row.insertCell(5).innerText = pj.jenis_identitas;
                            row.insertCell(6).innerText = pj.nomor_identitas;
                            row.insertCell(7).innerText = pj.kewarganegaraan;
                        });
                    });
            });
        });
    });
</script>
