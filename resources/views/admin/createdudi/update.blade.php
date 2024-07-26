


@section('scripts')
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
@endsection
