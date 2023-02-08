<script>
    var tabel_9_pemda, tabel_9_opd, tabel_9_operasional;

    $(document).ready(function() {
        tabel_9_pemda = $('#tabel_9_pemda').DataTable({
            "responsive": true,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // "searching": false,
            "ordering": false,
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": '<?= base_url('form/Form9/dat_list_pemda') ?>',
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
        tabel_9_opd = $('#tabel_9_opd').DataTable({
            "responsive": true,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // "searching": false,
            "ordering": false,
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": '<?= base_url('form/Form9/dat_list_opd') ?>',
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
        tabel_9_operasional = $('#tabel_9_operasional').DataTable({
            "responsive": true,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // "searching": false,
            "ordering": false,
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": '<?= base_url('form/Form9/dat_list_operasional') ?>',
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

    function preview9() {
        $('.modal-title').text('Form 9')
        var tahun = $('[name=tahun]').val();
        var id_opd = $('[name=id]').val();
        var id_rpjmd = $('[name=id_rpjmd]').val();
        var urusan = $('[name=urusan_pemda]').val();
        url = "<?= base_url('form/Form9/export') ?>"
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

    function savePemantauanPemda() {
        $('#btnPemantauanPemda').text('Menyimpan...'); //change button text
        $('#btnPemantauanPemda').attr('disabled', true); //set button disable
        var url;
        url = '<?= base_url('form/Form9/save_pemda') ?>';
        var formData = new FormData($('#form_9_pemda')[0]);
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
                    $('#modal_9_pemda').modal('hide');
                    Swal.fire("Berhasil", "Berhasil menyimpan data", "success");
                    reload_table_9_pemda();


                } else {
                    $.each(data.messages, function(key, value) {
                        const element = $('#form_9_pemda [name ="' + key + '"]');
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
                $('#btnPemantauanPemda').text('Simpan'); //change button text
                $('#btnPemantauanPemda').attr('disabled', false); //set button enable


            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", " Gagal Menyimpan / Update data", "error");
                $('#btnPemantauanPemda').text('Simpan'); //change button text
                $('#btnPemantauanPemda').attr('disabled', false); //set button enable

            }
        });
    }

    function savePemantauanOpd() {
        $('#btnPemantauanOpd').text('Menyimpan...'); //change button text
        $('#btnPemantauanOpd').attr('disabled', true); //set button disable
        var url;
        url = '<?= base_url('form/Form9/save_opd') ?>';
        var formData = new FormData($('#form_9_opd')[0]);
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
                    $('#modal_9_opd').modal('hide');
                    reload_table_9_opd();
                    Swal.fire("Berhasil", "Berhasil menyimpan data", "success");
                } else {
                    $.each(data.messages, function(key, value) {
                        const element = $('#form_9_opd [name ="' + key + '"]');
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
                $('#btnPemantauanOpd').text('Simpan'); //change button text
                $('#btnPemantauanOpd').attr('disabled', false); //set button enable


            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", " Gagal Menyimpan / Update data", "error");
                $('#btnPemantauanOpd').text('Simpan'); //change button text
                $('#btnPemantauanOpd').attr('disabled', false); //set button enable

            }
        });
    }

    function savePemantauanOperasional() {
        $('#btnPemantauanOpd').text('Menyimpan...'); //change button text
        $('#btnPemantauanOpd').attr('disabled', true); //set button disable
        var url;
        url = '<?= base_url('form/Form9/save_operasional') ?>';
        var formData = new FormData($('#form_9_operasional')[0]);
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
                    $('#modal_9_operasional').modal('hide');
                    reload_table_9_operasional();
                    Swal.fire("Berhasil", "Berhasil menyimpan data", "success");
                } else {
                    $.each(data.messages, function(key, value) {
                        const element = $('#form_9_operasional [name ="' + key + '"]');
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
                $('#btnPemantauanOpd').text('Simpan'); //change button text
                $('#btnPemantauanOpd').attr('disabled', false); //set button enable


            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", " Gagal Menyimpan / Update data", "error");
                $('#btnPemantauanOpd').text('Simpan'); //change button text
                $('#btnPemantauanOpd').attr('disabled', false); //set button enable

            }
        });
    }
    async function editPemantauanPemda(id) {

        $('#form_9_pemda')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('.form-control').removeClass('is-invalid is-valid'); // clear error class
        $('#btnPemantauanPemda').text('Perbaharui'); //change button text
        //Ajax Load data from ajax
        await $.ajax({
            url: '<?= base_url('form/Form9/edit_pemda') ?>',
            type: "post",
            data: {
                id, //ID MASTER
            },
            async: false,
            dataType: "JSON",
            success: function(resp) {
                $('#form_9_pemda [name="risk_pemda"]').val(id);
                var data = resp.data
                $('.text-pemantauan').html(resp.kegiatan_pengendalian)
                $('#form_9_pemda [name="pj"]').val(data.pj);
                $('#form_9_pemda [name="rencana_waktu_pemantauan"]').val(data.rencana_waktu_pemantauan);
                $('#form_9_pemda [name="realisasi_waktu_pemantauan"]').val(data.realisasi_waktu_pemantauan);
                $('#form_9_pemda [name="keterangan"]').val(data.keterangan);
                $('#form_9_pemda [name="metode_pemantauan"]').val(data.keterangan);

                $('#modal_9_pemda').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Pemantauan Pemda'); // Set title to Bootstrap modal title
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Gagal", "Gagal Mendapatkan data", "error");
            }
        });

    }
    async function editPemantauanOpd(id) {

        $('#form_9_opd')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('.form-control').removeClass('is-invalid is-valid'); // clear error class
        $('#btnPemantauanOpd').text('Perbaharui'); //change button text
        //Ajax Load data from ajax
        await $.ajax({
            url: '<?= base_url('form/Form9/edit_opd') ?>',
            type: "post",
            data: {
                id, //ID MASTER
            },
            async: false,
            dataType: "JSON",
            success: function(resp) {
                $('#form_9_opd [name="risk_opd"]').val(id);

                var data = resp.data
                $('.text-pemantauan').html(resp.kegiatan_pengendalian)
                $('#form_9_opd [name="pj"]').val(data.pj);
                $('#form_9_opd [name="rencana_waktu_pemantauan"]').val(data.rencana_waktu_pemantauan);
                $('#form_9_opd [name="realisasi_waktu_pemantauan"]').val(data.realisasi_waktu_pemantauan);
                $('#form_9_opd [name="keterangan"]').val(data.keterangan);
                $('#form_9_opd [name="metode_pemantauan"]').val(data.keterangan);

                $('#modal_9_opd').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Pemantauan Opd'); // Set title to Bootstrap modal title
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Gagal", "Gagal Mendapatkan data", "error");
            }
        });

    }
    async function editPemantauanOperasional(id) {

        $('#form_9_operasional')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('.form-control').removeClass('is-invalid is-valid'); // clear error class
        $('#btnPemantauanOperasional').text('Perbaharui'); //change button text
        //Ajax Load data from ajax
        await $.ajax({
            url: '<?= base_url('form/Form9/edit_operasional') ?>',
            type: "post",
            data: {
                id, //ID MASTER
            },
            async: false,
            dataType: "JSON",
            success: function(data) {
                $('#form_9_operasional [name="risk_operasional"]').val(id);
                var data = resp.data
                $('.text-pemantauan').html(resp.kegiatan_pengendalian)
                $('#form_9_operasional [name="pj"]').val(data.pj);
                $('#form_9_operasional [name="rencana_waktu_pemantauan"]').val(data.rencana_waktu_pemantauan);
                $('#form_9_operasional [name="realisasi_waktu_pemantauan"]').val(data.realisasi_waktu_pemantauan);
                $('#form_9_operasional [name="keterangan"]').val(data.keterangan);
                $('#form_9_operasional [name="metode_pemantauan"]').val(data.keterangan);

                $('#modal_9_operasional').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Pemantauan Operasional'); // Set title to Bootstrap modal title
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Gagal", "Gagal Mendapatkan data", "error");
            }
        });

    }

    function reload_table_9_pemda() {
        tabel_9_pemda.ajax.reload(null, false); //reload datatable ajax
    }

    function reload_table_9_opd() {
        tabel_9_opd.ajax.reload(null, false); //reload datatable ajax
    }

    function reload_table_9_operasional() {
        tabel_9_operasional.ajax.reload(null, false); //reload datatable ajax
    }
</script>