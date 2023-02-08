<script>
    var tabel_7_pemda, tabel_7_opd, tabel_7_operasional;

    $(document).ready(function() {
        tabel_7_pemda = $('#tabel_7_pemda').DataTable({
            "responsive": true,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // "searching": false,
            "ordering": false,
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": '<?= base_url('form/Form7/dat_list_pemda') ?>',
                "type": "POST",
                "data": function(data) {
                    data.opd = $('[name=id]').val();
                    data.rpjmd = $('[name=id_rpjmd]').val();
                    data.tahun = $('[name=tahun]').val();
                    data.urusan = $('[name=urusan_pemda]').val();
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
        tabel_7_opd = $('#tabel_7_opd').DataTable({
            "responsive": true,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // "searching": false,
            "ordering": false,
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": '<?= base_url('form/Form7/dat_list_opd') ?>',
                "type": "POST",
                "data": function(data) {
                    data.opd = $('[name=id]').val();
                    data.rpjmd = $('[name=id_rpjmd]').val();
                    data.tahun = $('[name=tahun]').val();
                    data.urusan = $('[name=urusan_pemda]').val();
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
        tabel_7_operasional = $('#tabel_7_operasional').DataTable({
            "responsive": true,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // "searching": false,
            "ordering": false,
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": '<?= base_url('form/Form7/dat_list_operasional') ?>',
                "type": "POST",
                "data": function(data) {
                    data.opd = $('[name=id]').val();
                    data.rpjmd = $('[name=id_rpjmd]').val();
                    data.tahun = $('[name=tahun]').val();
                    data.urusan = $('[name=urusan_pemda]').val();
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

    function preview7() {
        $('.modal-title').text('Form 7. Penilaian atas Kegiatan Pengendalian yang Ada dan Masih Dibutuhkan')
        var tahun = $('[name=tahun]').val();
        var id_opd = $('[name=id]').val();
        var id_rpjmd = $('[name=id_rpjmd]').val();
        var urusan = $('[name=urusan_pemda]').val();
        url = "<?= base_url('form/Form7/export') ?>"
        $.ajax({
            type: "post",
            url: url,
            data: {
                tahun,
                id_opd,
                id_rpjmd,
                urusan,
            },
            dataType: "html",
            success: function(response) {
                $('#modal_print').modal('show')
                $('.printPreview').html(response)
            }
        });
    }

    function savePengendalianPemda() {
        $('#btnPengendalianPemda').text('Menyimpan...'); //change button text
        $('#btnPengendalianPemda').attr('disabled', true); //set button disable
        var url;
        url = '<?= base_url('form/Form7/save_pemda') ?>';
        var formData = new FormData($('#form_7_pemda')[0]);
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
                    $('#modal_7_pemda').modal('hide');
                    Swal.fire("Berhasil", "Berhasil menyimpan data", "success");
                    reload_table_7_pemda();


                } else {
                    $.each(data.messages, function(key, value) {
                        const element = $('#form_7_pemda [name ="' + key + '"]');
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
                $('#btnPengendalianPemda').text('Simpan'); //change button text
                $('#btnPengendalianPemda').attr('disabled', false); //set button enable


            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", " Gagal Menyimpan / Update data", "error");
                $('#btnPengendalianPemda').text('Simpan'); //change button text
                $('#btnPengendalianPemda').attr('disabled', false); //set button enable

            }
        });
    }

    function savePengendalianOpd() {
        $('#btnPengendalianOpd').text('Menyimpan...'); //change button text
        $('#btnPengendalianOpd').attr('disabled', true); //set button disable
        var url;
        url = '<?= base_url('form/Form7/save_opd') ?>';
        var formData = new FormData($('#form_7_opd')[0]);
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
                    $('#modal_7_opd').modal('hide');
                    reload_table_7_opd();
                    Swal.fire("Berhasil", "Berhasil menyimpan data", "success");
                } else {
                    $.each(data.messages, function(key, value) {
                        const element = $('#form_7_opd [name ="' + key + '"]');
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
                $('#btnPengendalianOpd').text('Simpan'); //change button text
                $('#btnPengendalianOpd').attr('disabled', false); //set button enable


            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", " Gagal Menyimpan / Update data", "error");
                $('#btnPengendalianOpd').text('Simpan'); //change button text
                $('#btnPengendalianOpd').attr('disabled', false); //set button enable

            }
        });
    }

    function savePengendalianOperasional() {
        $('#btnPengendalianOpd').text('Menyimpan...'); //change button text
        $('#btnPengendalianOpd').attr('disabled', true); //set button disable
        var url;
        url = '<?= base_url('form/Form7/save_operasional') ?>';
        var formData = new FormData($('#form_7_operasional')[0]);
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
                    $('#modal_7_operasional').modal('hide');
                    reload_table_7_operasional();
                    Swal.fire("Berhasil", "Berhasil menyimpan data", "success");
                } else {
                    $.each(data.messages, function(key, value) {
                        const element = $('#form_7_operasional [name ="' + key + '"]');
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
                $('#btnPengendalianOpd').text('Simpan'); //change button text
                $('#btnPengendalianOpd').attr('disabled', false); //set button enable


            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", " Gagal Menyimpan / Update data", "error");
                $('#btnPengendalianOpd').text('Simpan'); //change button text
                $('#btnPengendalianOpd').attr('disabled', false); //set button enable

            }
        });
    }
    async function editPengendalianPemda(id) {

        $('#form_7_pemda')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('.form-control').removeClass('is-invalid is-valid'); // clear error class
        $('#btnPengendalianPemda').text('Perbaharui'); //change button text
        //Ajax Load data from ajax
        await $.ajax({
            url: '<?= base_url('form/Form7/edit_pemda') ?>',
            type: "post",
            data: {
                id, //ID MASTER
            },
            async: false,
            dataType: "JSON",
            success: function(resp) {
                var data = resp.data
                $('.kondisi_pengendalian').html(resp.uraian_risiko)
                $('#form_7_pemda [name="id"]').val(id);

                if (data) {
                    $('#form_7_pemda [name="celah_pengendalian"]').val(data.celah_pengendalian).trigger('change');
                    $('#form_7_pemda [name="uraian_pengendalian"]').summernote('code', data.uraian_pengendalian);
                    $('#form_7_pemda [name="rencana_tindak_pengendalian"]').summernote('code', data.rencana_tindak_pengendalian);
                    $('#form_7_pemda [name="twp"]').val(data.twp);
                } else {
                    $('#form_7_pemda [name="celah_pengendalian"]').val('').trigger('change');
                    $('#form_7_pemda [name="uraian_pengendalian"]').summernote('code', '');
                    $('#form_7_pemda [name="rencana_tindak_pengendalian"]').summernote('code', '');
                    $('#form_7_pemda [name="twp"]').val('');
                }
                $('#modal_7_pemda').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Pengendalian Pemda'); // Set title to Bootstrap modal title
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Gagal", "Gagal Mendapatkan data", "error");
            }
        });

    }
    async function editPengendalianOpd(id) {

        $('#form_7_opd')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('.form-control').removeClass('is-invalid is-valid'); // clear error class
        $('#btnPengendalianOpd').text('Perbaharui'); //change button text
        //Ajax Load data from ajax
        await $.ajax({
            url: '<?= base_url('form/Form7/edit_opd') ?>',
            type: "post",
            data: {
                id, //ID MASTER
            },
            async: false,
            dataType: "JSON",
            success: function(resp) {

                $('#form_7_opd [name="id"]').val(id);
                var data = resp.data
                $('.kondisi_pengendalian').html(resp.uraian_risiko)
                if (data) {
                    $('#form_7_opd [name="celah_pengendalian"]').val(data.celah_pengendalian).trigger('change');
                    $('#form_7_opd [name="uraian_pengendalian"]').summernote('code', data.uraian_pengendalian);
                    $('#form_7_opd [name="rencana_tindak_pengendalian"]').summernote('code', data.rencana_tindak_pengendalian);
                    $('#form_7_opd [name="twp"]').val(data.twp);
                } else {
                    $('#form_7_opd [name="celah_pengendalian"]').val('').trigger('change');
                    $('#form_7_opd [name="uraian_pengendalian"]').summernote('code', '');
                    $('#form_7_opd [name="rencana_tindak_pengendalian"]').summernote('code', '');
                    $('#form_7_opd [name="twp"]').val('');
                }
                $('#modal_7_opd').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Pengendalian Opd'); // Set title to Bootstrap modal title
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Gagal", "Gagal Mendapatkan data", "error");
            }
        });

    }
    async function editPengendalianOperasional(id) {

        $('#form_7_operasional')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('.form-control').removeClass('is-invalid is-valid'); // clear error class
        $('#btnPengendalianOperasional').text('Perbaharui'); //change button text
        //Ajax Load data from ajax
        await $.ajax({
            url: '<?= base_url('form/Form7/edit_operasional') ?>',
            type: "post",
            data: {
                id, //ID MASTER
            },
            async: false,
            dataType: "JSON",
            success: function(data) {
                $('#form_7_operasional [name="id"]').val(id);
                var data = resp.data
                $('.kondisi_pengendalian').html(resp.uraian_risiko)
                if (data) {
                    $('#form_7_operasional [name="celah_pengendalian"]').val(data.celah_pengendalian).trigger('change');
                    $('#form_7_operasional [name="uraian_pengendalian"]').summernote('code', data.uraian_pengendalian);
                    $('#form_7_operasional [name="rencana_tindak_pengendalian"]').summernote('code', data.rencana_tindak_pengendalian);
                    $('#form_7_operasional [name="twp"]').val(data.twp);
                } else {
                    $('#form_7_operasional [name="id"]').val('');
                    $('#form_7_operasional [name="celah_pengendalian"]').val('').trigger('change');
                    $('#form_7_operasional [name="uraian_pengendalian"]').summernote('code', '');
                    $('#form_7_operasional [name="rencana_tindak_pengendalian"]').summernote('code', '');
                    $('#form_7_operasional [name="twp"]').val('');
                }
                $('#modal_7_operasional').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Pengendalian Operasional'); // Set title to Bootstrap modal title
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Gagal", "Gagal Mendapatkan data", "error");
            }
        });

    }

    function reload_table_7_pemda() {
        tabel_7_pemda.ajax.reload(null, false); //reload datatable ajax
    }

    function reload_table_7_opd() {
        tabel_7_opd.ajax.reload(null, false); //reload datatable ajax
    }

    function reload_table_7_operasional() {
        tabel_7_operasional.ajax.reload(null, false); //reload datatable ajax
    }
</script>