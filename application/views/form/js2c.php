<script>
    var tabel_2coutput, tabel_2c_subkegiatan, tabel_2c_aktifitas;

    $(document).ready(function() {

        tabel_2coutput = $('#tabel_2coutput').DataTable({
            "responsive": true,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // "searching": false,

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": '<?= base_url('form/Form2c/dat_list') ?>',
                "type": "POST",
                "data": function(data) {
                    data.rpjmd = $('[name=id_rpjmd]').val();
                    data.tahun = $('[name=tahun]').val();
                    data.id_opd = $('[name=id]').val();
                    data.urusan = $('.urusan_pemda').val();
                }

            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                    "targets": [0, -1], //last column
                    "orderable": false, //set not orderable
                    "className": 'text-center'
                },

            ],


        });
        tabel_2c_subkegiatan = $('#tabel_2c_subkegiatan').DataTable({
            "responsive": true,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // "searching": false,

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": '<?= base_url('form/Form2c/dat_list_subkegiatan') ?>',
                "type": "POST",
                "data": function(data) {
                    data.rpjmd = $('[name=id_rpjmd]').val();
                    data.tahun = $('[name=tahun]').val();
                    data.id_opd = $('[name=id]').val();
                    data.urusan = $('.urusan_pemda').val();
                }

            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                    "targets": [0, -1], //last column
                    "orderable": false, //set not orderable
                    "className": 'text-center'
                },

            ],


        });
        tabel_2c_aktifitas = $('#tabel_2c_aktifitas').DataTable({
            "responsive": true,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // "searching": false,

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": '<?= base_url('form/Form2c/dat_list_aktifitas') ?>',
                "type": "POST",
                "data": function(data) {
                    data.rpjmd = $('[name=id_rpjmd]').val();
                    data.tahun = $('[name=tahun]').val();
                    data.id_opd = $('[name=id]').val();
                    data.urusan = $('.urusan_pemda').val();
                }

            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                    "targets": [0, -1], //last column
                    "orderable": false, //set not orderable
                    "className": 'text-center'
                },

            ],


        });
    });
    $('#upload2c_subkegaitan').on('click', function() {

        var file_data = $('#file2c_subkegiatan')[0].files;
        var form = new FormData();
        form.append('file2c_subkegiatan', file_data[0]);
        form.append('tahun', $('[name=tahun]').val());
        form.append('opd_id', $('[name=id]').val());
        form.append('rpjmd', $('[name=id_rpjmd]').val());
        form.append('urusan', $('.urusan_pemda').val());
        $.ajax({
            "url": "<?= base_url('form/Form2c/import_subkegiatan') ?>",
            "method": "POST",
            "timeout": 0,
            "cache": false,
            "processData": false,
            "mimeType": "multipart/form-data",
            "contentType": false,
            "data": form,
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                //Download progress
                xhr.addEventListener("progress", function(evt) {
                    console.log(evt.lengthComputable);
                    if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        var panjang = (Math.round(percentComplete * 100) + "%");

                    }
                    KTApp.block('#kt_content', {
                        overlayColor: '#000000',
                        state: 'primary',
                        message: 'Sedang memproses... ' + panjang
                    });
                }, false);
                return xhr;
            },
            beforeSend: function() {
                KTApp.block('#kt_content', {
                    // overlayColor: '#000000',
                    state: 'primary',
                    message: 'Mempersiapkan file ...'
                });

            },
            complete: function() {
                KTApp.unblock('#kt_content');

                console.log('berhasil')
            },
            success: function(obj) {
                myJson = JSON.parse(obj);

                if (myJson.status) {
                    reload_iku_opd();
                    toastr.success(myJson.message);
                } else {
                    toastr.error(myJson.message);
                }
            }
        });
    });
    $('#upload2c_kegiatan').on('click', function() {

        var file_data = $('#file2c_kegiatan')[0].files;
        var form = new FormData();
        form.append('file2c_kegiatan', file_data[0]);
        form.append('tahun', $('[name=tahun]').val());
        form.append('opd_id', $('[name=id]').val());
        form.append('rpjmd', $('[name=id_rpjmd]').val());
        form.append('urusan', $('.urusan_pemda').val());
        $.ajax({
            "url": "<?= base_url('form/Form2c/import_kegiatan') ?>",
            "method": "POST",
            "timeout": 0,
            "cache": false,
            "processData": false,
            "mimeType": "multipart/form-data",
            "contentType": false,
            "data": form,
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                //Download progress
                xhr.addEventListener("progress", function(evt) {
                    console.log(evt.lengthComputable);
                    if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        var panjang = (Math.round(percentComplete * 100) + "%");

                    }
                    KTApp.block('#kt_content', {
                        overlayColor: '#000000',
                        state: 'primary',
                        message: 'Sedang memproses... ' + panjang
                    });
                }, false);
                return xhr;
            },
            beforeSend: function() {
                KTApp.block('#kt_content', {
                    // overlayColor: '#000000',
                    state: 'primary',
                    message: 'Mempersiapkan file ...'
                });

            },
            complete: function() {
                KTApp.unblock('#kt_content');
                console.log('berhasil')
                reload_output_opd();

            },
            success: function(obj) {
                myJson = JSON.parse(obj);

                if (myJson.status) {
                    toastr.success(myJson.message);
                } else {
                    toastr.error(myJson.message);
                }
            }
        });
    });

    function unduh_kegiatan() {
        var tahun = $('[name=tahun]').val();
        var id_opd = $('[name=id]').val();
        var id_rpjmd = $('[name=id_rpjmd]').val();
        var urusan = $('.urusan_pemda').val();
        url = "<?= base_url('form/Form2c/export_kegiatan') ?>?tahun=" + tahun + "&opd=" + id_opd + "&rpjmd=" + id_rpjmd + "&urusan=" + urusan;
        window.open(url, '_blank');
    }

    $('#anggota_sop_1').on('click', '.add_anggota', function(e) {
        e.preventDefault();
        var i = e.target.dataset.sop_1;
        var index = parseFloat(i) + 1
        $('.add_anggota').attr('data-sop_1', index)
        $('#anggota_sop_1').append(`<div class="form-group row" data-sop1="${index}">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                                   Lainnya *
                               </label>
                               <div class="col-lg-2">
                                   <input type="text" name="bidang_lainnya[]" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Bidang">
                               </div>
                               <div class="col-lg-2">
                                   <input type="text" name="jabatan_lainnya[]" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                               </div>
                               <div class="col-lg-4">
                                   <input type="text" name="nama_lainnya[]" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                               </div>
                               <div class="col-lg-2">
                                   <input type="text" name="nip_lainnya[]"  class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                               </div>
                               <div class="col-lg-2">
                                   <button type="button" data-sop1="${index}" onclick="del_anggota_sop_1(${index})" class="btn btn-icon btn-danger"><i aria-hidden="true" class="ki ki-close"></i></button>
                               </div>
                           </div>`);
    });
    $('#anggota_sop_2').on('click', '.add_anggota', function(e) {
        e.preventDefault();
        var i = e.target.dataset.sop_2;
        var index = parseFloat(i) + 1
        $('.add_anggota').attr('data-sop_2', index)
        $('#anggota_sop_2').append(`<div class="form-group row" data-sop2="${index}">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                                   Lainnya *
                               </label>
                               <div class="col-lg-2">
                                   <input type="text" name="bidang_lainnya[]" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Bidang">
                               </div>
                               <div class="col-lg-2">
                                   <input type="text" name="jabatan_lainnya[]" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                               </div>
                               <div class="col-lg-4">
                                   <input type="text" name="nama_lainnya[]" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                               </div>
                               <div class="col-lg-2">
                                   <input type="text" name="nip_lainnya[]"  class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                               </div>
                               <div class="col-lg-2">
                                   <button type="button" data-sop2="${index}" onclick="del_anggota_sop_2(${index})" class="btn btn-icon btn-danger"><i aria-hidden="true" class="ki ki-close"></i></button>
                               </div>
                           </div>`);
    });
    $('#anggota_sop_3').on('click', '.add_anggota', function(e) {
        e.preventDefault();
        var i = e.target.dataset.sop_3;
        var index = parseFloat(i) + 1
        $('.add_anggota').attr('data-sop_3', index)
        $('#anggota_sop_3').append(`<div class="form-group row" data-sop3="${index}">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                                   Lainnya *
                               </label>
                               <div class="col-lg-2">
                                   <input type="text" name="bidang_lainnya[]" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Bidang">
                               </div>
                               <div class="col-lg-2">
                                   <input type="text" name="jabatan_lainnya[]" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                               </div>
                               <div class="col-lg-4">
                                   <input type="text" name="nama_lainnya[]" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                               </div>
                               <div class="col-lg-2">
                                   <input type="text" name="nip_lainnya[]"  class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                               </div>
                               <div class="col-lg-2">
                                   <button type="button" data-sop3="${index}" onclick="del_anggota_sop_3(${index})" class="btn btn-icon btn-danger"><i aria-hidden="true" class="ki ki-close"></i></button>
                               </div>
                           </div>`);
    });

    function del_anggota_sop_1(i) {
        $(`[data-sop1=${i}]`).remove();
    }

    function del_anggota_sop_2(i) {
        $(`[data-sop2=${i}]`).remove();
    }

    function del_anggota_sop_3(i) {
        $(`[data-sop3=${i}]`).remove();
    }
    const edit_risiko_operasional_1 = () => {

        $('#form_pengelola_operasional_1')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('.form-control').removeClass('is-invalid is-valid'); // clear error class
        $('#btnSaveSop1').text('Perbaharui'); //change button text
        //Ajax Load data from ajax
        if ($('[name=id_rpjmd]').val() == '' || $('[name=tahun]').val() == '' || $('[name=id]').val() == '') {
            Swal.fire("Perhatian", "Isi tahun terlebih dahulu", "warning");
            return false;
        }
        $.ajax({
            url: '<?= base_url('form/Form2c/edit_risk_operasional_1') ?>',
            type: "post",
            async: false,
            data: {
                id_rpjmd: $('[name=id_rpjmd]').val(),
                tahun: $('[name=tahun]').val(),
                opd_id: $('[name=id]').val(),
            },
            dataType: "JSON",
            success: function(data) {
                $('#modal_risk_operasional_1').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Unit Pengelola Risiko Kegiatan'); // Set title to Bootstrap modal title
                $.each(data.data, function(key, value) {
                    if (key != 'id') {
                        var element = $('#form_pengelola_operasional_1 [name="' + key + '"]');
                        element.val(value);
                        element.closest('div.form-group')
                            .addClass('is-valid')
                            .find('.text-danger')
                            .remove();
                    }
                });
                $('#anggota_sop_1').empty();
                if (data.anggota.length == 0) {
                    $('#anggota_sop_1').append(`
                    <div class="form-group row" data-sop_1="0">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12">
                                   Lainnya *
                               </label>
                               <div class="col-lg-2">
                                   <input type="text" name="bidang_lainnya[]" id="bidang_lainnya" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Bidang">
                               </div>
                               <div class="col-lg-2">
                                   <input type="text" name="jabatan_lainnya[]" id="jabatan_lainnya" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                               </div>
                               <div class="col-lg-4">
                                   <input type="text" name="nama_lainnya[]" id="nama_lainnya" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                               </div>
                               <div class="col-lg-2">
                                   <input type="text" name="nip_lainnya[]" id="nip_lainnya" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                               </div>
                               <div class="col-lg-2">
                                   <button type="button" data-sop_1="0" class="btn btn-icon btn-success add_anggota"><i class="ki ki-plus"></i></button>
                               </div>
                           </div>`)
                } else {
                    var lastIndex = data.anggota.length;
                    for (let i = 0; i < data.anggota.length; i++) {
                        var element = data.anggota[i];
                        if (i == 0) {
                            $('#anggota_sop_1').append(`
                                <div class="form-group row" data-sop_1="${i}">
                                        <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12">
                                            Lainnya *
                                        </label>
                                        <div class="col-lg-2">
                                            <input type="text" name="bidang_lainnya[]" id="bidang_lainnya"  value="${element.bidang_anggota}" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Bidang">
                                        </div>
                                        <div class="col-lg-2">
                                            <input type="text" name="jabatan_lainnya[]" id="jabatan_lainnya"  value="${element.jabatan_anggota}" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="text" name="nama_lainnya[]" id="nama_lainnya" value="${element.nama_anggota}"  class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                                        </div>
                                        <div class="col-lg-2">
                                            <input type="text" name="nip_lainnya[]" id="nip_lainnya" value="${element.nip_anggota}" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                                        </div>
                                        <div class="col-lg-2">
                                            <button type="button" data-sop_1="${lastIndex}" class="btn btn-icon btn-success add_anggota"><i class="ki ki-plus"></i></button>
                                        </div>
                                    </div>`)
                        } else {
                            $('#anggota_sop_1').append(`
                            <div class="form-group row" data-sop1="${i}">
                                    <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12">
                                        Lainnya *
                                    </label>
                                    <div class="col-lg-2">
                                        <input type="text" name="bidang_lainnya[]" id="bidang_lainnya" value=${element.bidang_anggota} class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Bidang">
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="text" name="jabatan_lainnya[]" id="jabatan_lainnya" value="${element.jabatan_anggota}" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" name="nama_lainnya[]" id="nama_lainnya" value="${element.nama_anggota}" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="text" name="nip_lainnya[]" id="nip_lainnya" value="${element.nip_anggota}"  class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                                    </div>
                                    <div class="col-lg-2">
                                        <button type="button" data-sop1="${i}" onclick="del_anggota_sop_1(${i})" class="btn btn-icon btn-danger"><i aria-hidden="true" class="ki ki-close"></i></button>
                                    </div>
                                </div>`)
                        }
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Gagal", "Gagal Mendapatkan data", "error");
            }
        });

    }
    const edit_risiko_operasional_2 = () => {
        $('#form_pengelola_operasional_2')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('.form-control').removeClass('is-invalid is-valid'); // clear error class
        $('#btnSaveSop2').text('Perbaharui'); //change button text
        //Ajax Load data from ajax
        if ($('[name=id_rpjmd]').val() == '' || $('[name=tahun]').val() == '' || $('[name=id]').val() == '') {
            Swal.fire("Perhatian", "Isi tahun terlebih dahulu", "warning");
            return false;
        }
        $.ajax({
            url: '<?= base_url('form/Form2c/edit_risk_operasional_2') ?>',
            type: "post",
            async: false,
            data: {
                id_rpjmd: $('[name=id_rpjmd]').val(),
                tahun: $('[name=tahun]').val(),
                opd_id: $('[name=id]').val(),
            },
            dataType: "JSON",
            success: function(data) {
                $('#modal_risk_operasional_2').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text(' Unit Pengelola Risiko Subkegiatan'); // Set title to Bootstrap modal title
                $.each(data.data, function(key, value) {
                    if (key != 'id') {
                        var element = $('#form_pengelola_operasional_2 [name="' + key + '"]');
                        element.val(value);
                        element.closest('div.form-group')
                            .addClass('is-valid')
                            .find('.text-danger')
                            .remove();
                    }
                });
                $('#anggota_sop_2').empty();
                if (data.anggota.length == 0) {
                    $('#anggota_sop_2').append(`
                    <div class="form-group row" data-sop_2="0">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12">
                                   Lainnya *
                               </label>
                               <div class="col-lg-2">
                                   <input type="text" name="bidang_lainnya[]" id="bidang_lainnya" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Bidang">
                               </div>
                               <div class="col-lg-2">
                                   <input type="text" name="jabatan_lainnya[]" id="jabatan_lainnya" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                               </div>
                               <div class="col-lg-4">
                                   <input type="text" name="nama_lainnya[]" id="nama_lainnya" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                               </div>
                               <div class="col-lg-2">
                                   <input type="text" name="nip_lainnya[]" id="nip_lainnya" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                               </div>
                               <div class="col-lg-2">
                                   <button type="button" data-sop_2="0" class="btn btn-icon btn-success add_anggota"><i class="ki ki-plus"></i></button>
                               </div>
                           </div>`)
                } else {
                    var lastIndex = data.anggota.length;
                    for (let i = 0; i < data.anggota.length; i++) {
                        var element = data.anggota[i];
                        if (i == 0) {
                            $('#anggota_sop_2').append(`
                                <div class="form-group row" data-sop_2="${i}">
                                        <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12">
                                            Lainnya *
                                        </label>
                                        <div class="col-lg-2">
                                            <input type="text" name="bidang_lainnya[]" id="bidang_lainnya"  value="${element.bidang_anggota}" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Bidang">
                                        </div>
                                        <div class="col-lg-2">
                                            <input type="text" name="jabatan_lainnya[]" id="jabatan_lainnya"  value="${element.jabatan_anggota}" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="text" name="nama_lainnya[]" id="nama_lainnya" value="${element.nama_anggota}"  class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                                        </div>
                                        <div class="col-lg-2">
                                            <input type="text" name="nip_lainnya[]" id="nip_lainnya" value="${element.nip_anggota}" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                                        </div>
                                        <div class="col-lg-2">
                                            <button type="button" data-sop_2="${lastIndex}" class="btn btn-icon btn-success add_anggota"><i class="ki ki-plus"></i></button>
                                        </div>
                                    </div>`)
                        } else {
                            $('#anggota_sop_2').append(`
                            <div class="form-group row" data-sop2="${i}">
                                    <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12">
                                        Lainnya *
                                    </label>
                                    <div class="col-lg-2">
                                        <input type="text" name="bidang_lainnya[]" id="bidang_lainnya" value=${element.bidang_anggota} class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Bidang">
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="text" name="jabatan_lainnya[]" id="jabatan_lainnya" value="${element.jabatan_anggota}" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" name="nama_lainnya[]" id="nama_lainnya" value="${element.nama_anggota}" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="text" name="nip_lainnya[]" id="nip_lainnya" value="${element.nip_anggota}"  class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                                    </div>
                                    <div class="col-lg-2">
                                        <button type="button" data-sop2="${i}" onclick="del_anggota_sop_2(${i})" class="btn btn-icon btn-danger"><i aria-hidden="true" class="ki ki-close"></i></button>
                                    </div>
                                </div>`)
                        }
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Gagal", "Gagal Mendapatkan data", "error");
            }
        });

    }

    const edit_risiko_operasional_3 = () => {
        $('#form_pengelola_operasional_3')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('.form-control').removeClass('is-invalid is-valid'); // clear error class
        $('#btnSaveSop3').text('Perbaharui'); //change button text
        //Ajax Load data from ajax
        if ($('[name=id_rpjmd]').val() == '' || $('[name=tahun]').val() == '' || $('[name=id]').val() == '') {
            Swal.fire("Perhatian", "Isi tahun terlebih dahulu", "warning");
            return false;
        }
        $.ajax({
            url: '<?= base_url('form/Form2c/edit_risk_operasional_3') ?>',
            type: "post",
            async: false,
            data: {
                id_rpjmd: $('[name=id_rpjmd]').val(),
                tahun: $('[name=tahun]').val(),
                opd_id: $('[name=id]').val(),
            },
            dataType: "JSON",
            success: function(data) {
                $('#modal_risk_operasional_3').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text(' Unit Pengelola Risiko Aktifitas'); // Set title to Bootstrap modal title
                $.each(data.data, function(key, value) {
                    if (key != 'id') {
                        var element = $('#form_pengelola_operasional_3 [name="' + key + '"]');
                        element.val(value);
                        element.closest('div.form-group')
                            .addClass('is-valid')
                            .find('.text-danger')
                            .remove();
                    }
                });
                $('#anggota_sop_3').empty();
                if (data.anggota.length == 0) {
                    $('#anggota_sop_3').append(`
                    <div class="form-group row" data-sop_3="0">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12">
                                   Lainnya *
                               </label>
                               <div class="col-lg-2">
                                   <input type="text" name="bidang_lainnya[]" id="bidang_lainnya" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Bidang">
                               </div>
                               <div class="col-lg-2">
                                   <input type="text" name="jabatan_lainnya[]" id="jabatan_lainnya" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                               </div>
                               <div class="col-lg-4">
                                   <input type="text" name="nama_lainnya[]" id="nama_lainnya" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                               </div>
                               <div class="col-lg-2">
                                   <input type="text" name="nip_lainnya[]" id="nip_lainnya" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                               </div>
                               <div class="col-lg-2">
                                   <button type="button" data-sop_3="0" class="btn btn-icon btn-success add_anggota"><i class="ki ki-plus"></i></button>
                               </div>
                           </div>`)
                } else {
                    var lastIndex = data.anggota.length;
                    for (let i = 0; i < data.anggota.length; i++) {
                        var element = data.anggota[i];
                        if (i == 0) {
                            $('#anggota_sop_3').append(`<div class="form-group row" data-sop_3="${i}">
                                        <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12">
                                            Lainnya *
                                        </label>
                                        <div class="col-lg-2">
                                            <input type="text" name="bidang_lainnya[]" id="bidang_lainnya"  value="${element.bidang_anggota}" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Bidang">
                                        </div>
                                        <div class="col-lg-2">
                                            <input type="text" name="jabatan_lainnya[]" id="jabatan_lainnya"  value="${element.jabatan_anggota}" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="text" name="nama_lainnya[]" id="nama_lainnya" value="${element.nama_anggota}"  class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                                        </div>
                                        <div class="col-lg-2">
                                            <input type="text" name="nip_lainnya[]" id="nip_lainnya" value="${element.nip_anggota}" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                                        </div>
                                        <div class="col-lg-2">
                                            <button type="button" data-sop_3="${lastIndex}" class="btn btn-icon btn-success add_anggota"><i class="ki ki-plus"></i></button>
                                        </div>
                                    </div>`)
                        } else {
                            $('#anggota_sop_3').append(`
                            <div class="form-group row" data-sop3="${i}">
                                    <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12">
                                        Lainnya *
                                    </label>
                                    <div class="col-lg-2">
                                        <input type="text" name="bidang_lainnya[]" id="bidang_lainnya" value=${element.bidang_anggota} class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Bidang">
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="text" name="jabatan_lainnya[]" id="jabatan_lainnya" value="${element.jabatan_anggota}" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" name="nama_lainnya[]" id="nama_lainnya" value="${element.nama_anggota}" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="text" name="nip_lainnya[]" id="nip_lainnya" value="${element.nip_anggota}"  class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                                    </div>
                                    <div class="col-lg-2">
                                        <button type="button" data-sop3="${i}" onclick="del_anggota_sop_3(${i})" class="btn btn-icon btn-danger"><i aria-hidden="true" class="ki ki-close"></i></button>
                                    </div>
                                </div>`)
                        }
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Gagal", "Gagal Mendapatkan data", "error");
            }
        });

    }

    const edit_risiko_stakeholder = () => {
        $('#form_pengelola_stakeholder')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('.form-control').removeClass('is-invalid is-valid'); // clear error class
        $('#btnStakeHolder').text('Perbaharui'); //change button text
        //Ajax Load data from ajax
        if ($('[name=id_rpjmd]').val() == '' || $('[name=tahun]').val() == '' || $('[name=id]').val() == '') {
            Swal.fire("Perhatian", "Isi tahun terlebih dahulu", "warning");
            return false;
        }
        $.ajax({
            url: '<?= base_url('form/Form2c/edit_risk_stakeholder') ?>',
            type: "post",
            async: false,
            data: {
                id_rpjmd: $('[name=id_rpjmd]').val(),
                tahun: $('[name=tahun]').val(),
                opd_id: $('[name=id]').val(),
            },
            dataType: "JSON",
            success: function(data) {
                $('#modal_risk_stakeholder').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text(' Unit Pengelola Risiko Stakeholder'); // Set title to Bootstrap modal title
                $.each(data, function(key, value) {
                    if (key != 'id') {
                        var element = $('#form_pengelola_stakeholder [name="' + key + '"]');
                        element.val(value);
                        element.closest('div.form-group')
                            .addClass('is-valid')
                            .find('.text-danger')
                            .remove();
                    }
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Gagal", "Gagal Mendapatkan data", "error");
            }
        });

    }

    function save_sop_1() {
        $('#btnSaveSop1').text('Menyimpan...'); //change button text
        $('#btnSaveSop1').attr('disabled', true); //set button disable
        var url;
        url = '<?= base_url('form/Form2c/save_risk_sop_1') ?>';
        var formData = new FormData($('#form_pengelola_operasional_1')[0]);
        formData.set('rpjmd', $('[name=id_rpjmd]').val());
        formData.set('id_opd', $('[name=id]').val());
        formData.set('tahun', $('[name=tahun]').val());

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data) {

                if (data.status) //if success close modal and reload ajax table
                {
                    $('#modal_risk_operasional_1').modal('hide');
                    Swal.fire("Berhasil", "Berhasil menyimpan data", "success");
                } else {
                    $.each(data.messages, function(key, value) {
                        const element = $('[name ="' + key + '"]');
                        element.closest('div.form-group')
                            .addClass('is-invalid')
                            .find('.text-danger')
                            .remove();
                        if (element.parents('.input-group').length) {
                            $('.div' + key).html(value);
                            console.log(element.parents('.input-group').length);
                        } else if (element.prop("tagName") == "select") {
                            element.next().after(value)
                        } else {
                            element.after(value);
                        }
                    });

                }
                $('#btnSaveSop1').text('Simpan'); //change button text
                $('#btnSaveSop1').attr('disabled', false); //set button enable


            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", " Gagal Menyimpan / Update data", "error");
                $('#btnSaveSop1').text('Simpan'); //change button text
                $('#btnSaveSop1').attr('disabled', false); //set button enable

            }
        });
    }

    function save_sop_2() {
        $('#btnSaveSop2').text('Menyimpan...'); //change button text
        $('#btnSaveSop2').attr('disabled', true); //set button disable
        var url;
        url = '<?= base_url('form/Form2c/save_risk_sop_2') ?>';
        var formData = new FormData($('#form_pengelola_operasional_2')[0]);
        formData.set('rpjmd', $('[name=id_rpjmd]').val());
        formData.set('id_opd', $('[name=id]').val());
        formData.set('tahun', $('[name=tahun]').val());

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data) {

                if (data.status) //if success close modal and reload ajax table
                {
                    $('#modal_risk_operasional_2').modal('hide');
                    Swal.fire("Berhasil", "Berhasil menyimpan data", "success");
                } else {
                    $.each(data.messages, function(key, value) {
                        const element = $('[name ="' + key + '"]');
                        element.closest('div.form-group')
                            .addClass('is-invalid')
                            .find('.text-danger')
                            .remove();
                        if (element.parents('.input-group').length) {
                            $('.div' + key).html(value);
                            console.log(element.parents('.input-group').length);
                        } else if (element.prop("tagName") == "select") {
                            element.next().after(value)
                        } else {
                            element.after(value);
                        }
                    });

                }
                $('#btnSaveSop2').text('Simpan'); //change button text
                $('#btnSaveSop2').attr('disabled', false); //set button enable


            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", " Gagal Menyimpan / Update data", "error");
                $('#btnSaveSop2').text('Simpan'); //change button text
                $('#btnSaveSop2').attr('disabled', false); //set button enable

            }
        });
    }

    function save_sop_3() {
        $('#btnSaveSop3').text('Menyimpan...'); //change button text
        $('#btnSaveSop3').attr('disabled', true); //set button disable
        var url;
        url = '<?= base_url('form/Form2c/save_risk_sop_3') ?>';
        var formData = new FormData($('#form_pengelola_operasional_3')[0]);
        formData.set('rpjmd', $('[name=id_rpjmd]').val());
        formData.set('id_opd', $('[name=id]').val());
        formData.set('tahun', $('[name=tahun]').val());

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data) {

                if (data.status) //if success close modal and reload ajax table
                {
                    $('#modal_risk_operasional_3').modal('hide');
                    Swal.fire("Berhasil", "Berhasil menyimpan data", "success");
                } else {
                    $.each(data.messages, function(key, value) {
                        const element = $('[name ="' + key + '"]');
                        element.closest('div.form-group')
                            .addClass('is-invalid')
                            .find('.text-danger')
                            .remove();
                        if (element.parents('.input-group').length) {
                            $('.div' + key).html(value);
                            console.log(element.parents('.input-group').length);
                        } else if (element.prop("tagName") == "select") {
                            element.next().after(value)
                        } else {
                            element.after(value);
                        }
                    });

                }
                $('#btnSaveSop3').text('Simpan'); //change button text
                $('#btnSaveSop3').attr('disabled', false); //set button enable


            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", " Gagal Menyimpan / Update data", "error");
                $('#btnSaveSop3').text('Simpan'); //change button text
                $('#btnSaveSop3').attr('disabled', false); //set button enable

            }
        });
    }

    function saveIndikator() {
        $('#btnSaveIndikator').text('Menyimpan...'); //change button text
        $('#btnSaveIndikator').attr('disabled', true); //set button disable
        var url;
        url = '<?= base_url('form/Form2c/save_risk_sop_3') ?>';
        var formData = new FormData($('#form_pengelola_operasional_3')[0]);
        formData.set('rpjmd', $('[name=id_rpjmd]').val());
        formData.set('id_opd', $('[name=id]').val());
        formData.set('tahun', $('[name=tahun]').val());

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data) {

                if (data.status) //if success close modal and reload ajax table
                {
                    $('#modal_risk_operasional_3').modal('hide');
                    Swal.fire("Berhasil", "Berhasil menyimpan data", "success");
                } else {
                    $.each(data.messages, function(key, value) {
                        const element = $('[name ="' + key + '"]');
                        element.closest('div.form-group')
                            .addClass('is-invalid')
                            .find('.text-danger')
                            .remove();
                        if (element.parents('.input-group').length) {
                            $('.div' + key).html(value);
                            console.log(element.parents('.input-group').length);
                        } else if (element.prop("tagName") == "select") {
                            element.next().after(value)
                        } else {
                            element.after(value);
                        }
                    });

                }
                $('#btnSaveIndikator').text('Simpan'); //change button text
                $('#btnSaveIndikator').attr('disabled', false); //set button enable


            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", " Gagal Menyimpan / Update data", "error");
                $('#btnSaveIndikator').text('Simpan'); //change button text
                $('#btnSaveIndikator').attr('disabled', false); //set button enable

            }
        });
    }

    function save_stakeholder() {
        $('#btnStakeHolder').text('Menyimpan...'); //change button text
        $('#btnStakeHolder').attr('disabled', true); //set button disable
        var url;
        url = '<?= base_url('form/Form2c/save_risk_stakeholder') ?>';
        var formData = new FormData($('#form_pengelola_stakeholder')[0]);
        formData.set('rpjmd', $('[name=id_rpjmd]').val());
        formData.set('id_opd', $('[name=id]').val());
        formData.set('tahun', $('[name=tahun]').val());

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data) {

                if (data.status) //if success close modal and reload ajax table
                {
                    $('#modal_risk_stakeholder').modal('hide');
                    Swal.fire("Berhasil", "Berhasil menyimpan data", "success");
                } else {
                    $.each(data.messages, function(key, value) {
                        const element = $('[name ="' + key + '"]');
                        element.closest('div.form-group')
                            .addClass('is-invalid')
                            .find('.text-danger')
                            .remove();
                        if (element.parents('.input-group').length) {
                            $('.div' + key).html(value);
                            console.log(element.parents('.input-group').length);
                        } else if (element.prop("tagName") == "select") {
                            element.next().after(value)
                        } else {
                            element.after(value);
                        }
                    });

                }
                $('#btnStakeHolder').text('Simpan'); //change button text
                $('#btnStakeHolder').attr('disabled', false); //set button enable


            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", " Gagal Menyimpan / Update data", "error");
                $('#btnStakeHolder').text('Simpan'); //change button text
                $('#btnStakeHolder').attr('disabled', false); //set button enable

            }
        });
    }

    function preview2c() {
        $('#modal_print').modal('show')
        $('.modal-title').text('Penetapan Konteks Risiko Strategis Operasional OPD')
        var tahun = $('[name=tahun]').val();
        var id_opd = $('[name=id]').val();
        var id_rpjmd = $('[name=id_rpjmd]').val();
        $.ajax({
            type: "post",
            url: "<?= base_url('form/Form2c/export') ?>",
            data: {
                tahun: tahun,
                id_opd: id_opd,
                id_rpjmd: id_rpjmd,
                urusan: $('[name=urusan_pemda]').val(),

            },
            dataType: "html",
            success: function(response) {
                $('.printPreview').html(response)
            }
        });
    }
    const add_output_opd = () => {
        $('#form_output_opd')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('input:text:visible:first', this).focus();
        $('#modal_form_output_opd').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah'); // Set Title to Bootstrap modal title
        $('#btnSaveoutput').text('Simpan'); //change button text
        $('#btnSaveoutput').attr('disabled', false);
        $('#btnSaveoutput').attr('style', 'display:block');
        $('.tahun').val($('[name=tahun]').val());
        $('[name="opd_id"]').val($('[name="id"]').val());
        $('[name="urusan"]').val($('[name="urusan_pemda"]').val());
    }
    const add_aktifitas = () => {
        $('#form_aktifitas')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('input:text:visible:first', this).focus();
        $('#modal_form_aktifitas').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah'); // Set Title to Bootstrap modal title
        $('#btnSaveAktifitas').text('Simpan'); //change button text
        $('#btnSaveAktifitas').attr('disabled', false);
        $('#btnSaveAktifitas').attr('style', 'display:block');
        $('.tahun').val($('[name=tahun]').val());
        $('[name="opd_id"]').val($('[name="id"]').val());
        $('[name="urusan"]').val($('[name="urusan_pemda"]').val());
    }
    const add_subkegiatan = () => {
        $('#form_subkegiatan')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('input:text:visible:first', this).focus();
        $('#modal_form_subkegiatan').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah'); // Set Title to Bootstrap modal title
        $('#btnSaveSubKegiatan').text('Simpan'); //change button text
        $('#btnSaveSubKegiatan').attr('disabled', false);
        $('#btnSaveSubKegiatan').attr('style', 'display:block');
        $('.tahun').val($('[name=tahun]').val());
        $('[name="opd_id"]').val($('[name="id"]').val());
        $('[name="urusan"]').val($('[name="urusan_pemda"]').val());
    }

    function reload_output_opd() {
        tabel_2coutput.ajax.reload(null, false); //reload datatable ajax
    }

    function reload_subkegiatan_opd() {
        tabel_2c_subkegiatan.ajax.reload(null, false); //reload datatable ajax
    }

    function reload_aktifitas_opd() {
        tabel_2c_aktifitas.ajax.reload(null, false); //reload datatable ajax
    }

    function save_output_opd() {
        $('#btnSaveoutput').text('Menyimpan...'); //change button text
        $('#btnSaveoutput').attr('disabled', true); //set button disable
        var url;
        url = '<?= base_url('form/Form2c/save_output_opd') ?>';
        var formData = new FormData($('#form_output_opd')[0]);
        formData.set('rpjmd', $('[name=id_rpjmd]').val());
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data) {

                if (data.status) //if success close modal and reload ajax table
                {
                    $('#modal_form_output_opd').modal('hide');
                    Swal.fire("Berhasil", "Berhasil menyimpan data", "success");
                    reload_output_opd();
                } else {
                    $.each(data.messages, function(key, value) {
                        const element = $('[name ="' + key + '"]');
                        element.closest('div.form-group')
                            .addClass('is-invalid')
                            .find('.text-danger')
                            .remove();
                        if (element.parents('.input-group').length) {
                            $('.div' + key).html(value);
                            console.log(element.parents('.input-group').length);
                        } else if (element.prop("tagName") == "select") {
                            element.next().after(value)
                        } else {
                            element.after(value);
                        }
                    });

                }
                $('#btnSaveoutput').text('Simpan'); //change button text
                $('#btnSaveoutput').attr('disabled', false); //set button enable


            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", " Gagal Menyimpan / Update data", "error");
                $('#btnSaveoutput').text('Simpan'); //change button text
                $('#btnSaveoutput').attr('disabled', false); //set button enable

            }
        });
    }

    const edit_output_opd = (id) => {

        $('#form_output_opd')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('.form-control').removeClass('is-invalid is-valid'); // clear error class
        $('#btnSaveIndikator').text('Perbaharui'); //change button text
        //Ajax Load data from ajax
        $.ajax({
            url: '<?= base_url('form/Form2c/edit/') ?>' + id,
            type: "GET",
            async: false,
            dataType: "JSON",
            success: function(data) {
                $('#form_output_opd [name="id_output_opd"]').val(data.id);
                $('#form_output_opd [name="opd_id"]').val(data.opd_id);
                $('#form_output_opd [name="tahun"]').val(data.tahun);
                $('#form_output_opd [name="urusan_opd"]').val(data.urusan);
                $('#form_output_opd [name="target"]').val(data.target);
                $('#form_output_opd [name="satuan"]').val(data.satuan);
                $('#form_output_opd [name="atribut"]').val(data.atribut);
                $('#form_output_opd [name="kegiatan"]').val(data.kegiatan);

                $('#form_output_opd [name="output_opd"]').val(data.output);
                $('[name="prioritas"]').val(data.prioritas).prop('checked', true);

                $('#modal_form_output_opd').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit output OPD'); // Set title to Bootstrap modal title
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Gagal", "Gagal Mendapatkan data", "error");
            }
        });
    }

    function _delete_output_opd(id, nama) {
        Swal.fire({
            title: "Anda yakin menghapus data " + nama + "?",
            text: "anda tidak akan bisa mengembalikan data!",
            icon: "question",
            confirmButtonText: "Ya, Hapus data!",
            cancelButtonText: "Tidak, Batalkan hapus!",
            showCancelButton: true,

        }).then(result => {
            if (result.value) {
                $.ajax({
                    url: '<?= base_url('form/Form2c/delete/') ?>' + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        //if success reload ajax table
                        Swal.fire("Berhasil!", "Data telah di hapus.", "success");
                        reload_output_opd();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire("Error", "Gagal menghapus data", "error");
                    }

                });
            } else {
                Swal.fire("Dibatalkan", "Data tidak di hapus", "error");
            }
        })

    }
</script>