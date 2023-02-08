<script>
    var tabel_4_pemda, tabel_4_opd, tabel_4_operasional;

    $(document).ready(function() {
        tabel_4_pemda = $('#tabel_4_pemda').DataTable({
            "responsive": true,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // "searching": false,
            "ordering": false,
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": '<?= base_url('form/Form4/dat_list_pemda') ?>',
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
        tabel_4_opd = $('#tabel_4_opd').DataTable({
            "responsive": true,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // "searching": false,
            "ordering": false,
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": '<?= base_url('form/Form4/dat_list_opd') ?>',
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
        tabel_4_operasional = $('#tabel_4_operasional').DataTable({
            "responsive": true,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // "searching": false,
            "ordering": false,
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": '<?= base_url('form/Form4/dat_list_operasional') ?>',
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


    function preview4() {
        $('#modal_print').modal('show')
        $('.modal-title').text('Form 4. Hasil Analisis Risiko ')
        var tahun = $('[name=tahun]').val();
        var id_opd = $('[name=id]').val();
        var id_rpjmd = $('[name=id_rpjmd]').val();
        var urusan = $('[name=urusan_pemda]').val();

        url = "<?= base_url('form/Form4/export') ?>"
        $.ajax({
            type: "post",
            url: url,
            data: {
                tahun,
                id_opd,
                id_rpjmd,
                urusan
            },
            dataType: "html",
            success: function(response) {
                $('.printPreview').html(response)
            }
        });
    }

    function saveAnalisisPemda() {
        $('#btnAnalisisPemda').text('Menyimpan...'); //change button text
        $('#btnAnalisisPemda').attr('disabled', true); //set button disable
        var url;
        url = '<?= base_url('form/Form4/save_pemda') ?>';
        var formData = new FormData($('#form_4_pemda')[0]);
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
                    $('#modal_4_pemda').modal('hide');
                    reload_table_4_pemda();
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
                $('#btnAnalisisPemda').text('Simpan'); //change button text
                $('#btnAnalisisPemda').attr('disabled', false); //set button enable


            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", " Gagal Menyimpan / Update data", "error");
                $('#btnAnalisisPemda').text('Simpan'); //change button text
                $('#btnAnalisisPemda').attr('disabled', false); //set button enable

            }
        });
    }

    function saveAnalisisOpd() {
        $('#btnAnalisisOpd').text('Menyimpan...'); //change button text
        $('#btnAnalisisOpd').attr('disabled', true); //set button disable
        var url;
        url = '<?= base_url('form/Form4/save_opd') ?>';
        var formData = new FormData($('#form_4_opd')[0]);
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
                    $('#modal_4_opd').modal('hide');
                    reload_table_4_opd();
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
                $('#btnAnalisisOpd').text('Simpan'); //change button text
                $('#btnAnalisisOpd').attr('disabled', false); //set button enable


            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", " Gagal Menyimpan / Update data", "error");
                $('#btnAnalisisOpd').text('Simpan'); //change button text
                $('#btnAnalisisOpd').attr('disabled', false); //set button enable

            }
        });
    }

    function saveAnalisisOperasional() {
        $('#btnAnalisisOpd').text('Menyimpan...'); //change button text
        $('#btnAnalisisOpd').attr('disabled', true); //set button disable
        var url;
        url = '<?= base_url('form/Form4/save_operasional') ?>';
        var formData = new FormData($('#form_4_operasional')[0]);
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
                    $('#modal_4_operasional').modal('hide');
                    reload_table_4_operasional();
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
                $('#btnAnalisisOpd').text('Simpan'); //change button text
                $('#btnAnalisisOpd').attr('disabled', false); //set button enable


            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", " Gagal Menyimpan / Update data", "error");
                $('#btnAnalisisOpd').text('Simpan'); //change button text
                $('#btnAnalisisOpd').attr('disabled', false); //set button enable

            }
        });
    }
    async function editSkalaPemda(id) {

        $('#form_4_pemda')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('.form-control').removeClass('is-invalid is-valid'); // clear error class
        $('#btnAnalisisPemda').text('Perbaharui'); //change button text
        //Ajax Load data from ajax
        await $.ajax({
            url: '<?= base_url('form/Form4/edit_pemda') ?>',
            type: "post",
            data: {
                id, //ID MASTER
            },
            async: false,
            dataType: "JSON",
            success: function(data) {
                $('.indikator_pemda').html(data.uraian_risiko)
                $('#form_4_pemda [name="id"]').val(data.id);
                $('.dampak').empty();

                $.each(data.dampak, function(i, v) {
                    $('.dampak').append(`<label class="radio radio-lg radio-outline">
                                <input type="radio" name="skala_dampak" value="${v.reg}" />
                                <span></span>
                                ${v.nama}
                            </label>`)
                });
                if (data.skala_dampak)
                    $('[name="skala_dampak"][value="' + data.skala_dampak + '"]').prop('checked', true);
                if (data.skala_kemungkinan)
                    $('[name="skala_kemungkinan"][value="' + data.skala_kemungkinan + '"]').prop('checked', true);

                $('#modal_4_pemda').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Skala Pemda'); // Set title to Bootstrap modal title
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Gagal", "Gagal Mendapatkan data", "error");
            }
        });

    }
    async function editSkalaOpd(id) {

        $('#form_4_opd')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('.form-control').removeClass('is-invalid is-valid'); // clear error class
        $('#btnAnalisisOpd').text('Perbaharui'); //change button text
        //Ajax Load data from ajax
        await $.ajax({
            url: '<?= base_url('form/Form4/edit_opd') ?>',
            type: "post",
            data: {
                id, //ID MASTER
            },
            async: false,
            dataType: "JSON",
            success: function(data) {
                $('.indikator_opd').html(data.uraian_risiko)

                $('#form_4_opd [name="id"]').val(data.id);
                $('.dampak').empty();

                $.each(data.dampak, function(i, v) {
                    $('.dampak').append(`<label class="radio radio-lg radio-outline">
                                <input type="radio" name="skala_dampak" value="${v.reg}" />
                                <span></span>
                                ${v.nama}
                            </label>`)
                });
                if (data.skala_dampak)
                    $('[name="skala_dampak"][value="' + data.skala_dampak + '"]').prop('checked', true);
                if (data.skala_kemungkinan)
                    $('[name="skala_kemungkinan"][value="' + data.skala_kemungkinan + '"]').prop('checked', true);


                $('#modal_4_opd').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Skala Opd'); // Set title to Bootstrap modal title
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Gagal", "Gagal Mendapatkan data", "error");
            }
        });

    }
    async function editSkalaOperasional(id) {

        $('#form_4_operasional')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('.form-control').removeClass('is-invalid is-valid'); // clear error class
        $('#btnAnalisisOperasional').text('Perbaharui'); //change button text
        //Ajax Load data from ajax
        await $.ajax({
            url: '<?= base_url('form/Form4/edit_operasional') ?>',
            type: "post",
            data: {
                id, //ID MASTER
            },
            async: false,
            dataType: "JSON",
            success: function(data) {
                $('.indikator_operasional').html(data.uraian_risiko)

                $('#form_4_operasional [name="id"]').val(data.id);
                $('.dampak').empty();
                $.each(data.dampak, function(i, v) {

                    $('.dampak').append(`<label class="radio radio-lg radio-outline">
                                <input type="radio" name="skala_dampak" value="${v.reg}" />
                                <span></span>
                                ${v.nama}
                            </label>`)
                });
                if (data.skala_dampak)
                    $('[name="skala_dampak"][value="' + data.skala_dampak + '"]').prop('checked', true);
                if (data.skala_kemungkinan)
                    $('[name="skala_kemungkinan"][value="' + data.skala_kemungkinan + '"]').prop('checked', true);

                $('#modal_4_operasional').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Skala Operasional'); // Set title to Bootstrap modal title
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Gagal", "Gagal Mendapatkan data", "error");
            }
        });

    }

    function reload_table_4_pemda() {
        tabel_4_pemda.ajax.reload(null, false); //reload datatable ajax
    }

    function reload_table_4_opd() {
        tabel_4_opd.ajax.reload(null, false); //reload datatable ajax
    }

    function reload_table_4_operasional() {
        tabel_4_operasional.ajax.reload(null, false); //reload datatable ajax
    }
</script>