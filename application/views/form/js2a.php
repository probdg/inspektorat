<script>
    var tabel_2a;

    $(document).ready(function() {

        tabel_2a = $('#tabel_2a').DataTable({
            "responsive": true,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // "searching": false,

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": '<?= base_url('form/Form2a/dat_list') ?>',
                "type": "POST",
                "data": function(data) {
                    data.rpjmd = $('[name=id_rpjmd]').val();
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


    function preview2a() {
        $('#modal_print').modal('show')
        $('.modal-title').text('Penetapan Konteks Risiko Strategis PEMDA')
        var tahun = $('[name=tahun]').val();
        var id_opd = $('[name=id]').val();
        var id_rpjmd = $('[name=id_rpjmd]').val();
        $.ajax({
            type: "post",
            url: "<?= base_url('form/Form2a/export') ?>",
            data: {
                tahun: tahun,
                id_opd: id_opd,
                id_rpjmd: id_rpjmd,
                urusan: $('.urusan_pemda').val(),

            },
            dataType: "html",
            success: function(response) {
                $('.printPreview').html(response)
            }
        });
    }

    function reload_table2a() {
        tabel_2a.ajax.reload(null, false); //reload datatable ajax
    }
    const getSasaran = (value) => {

        $.ajax({
            type: "post",
            url: "<?= base_url('home/getSasaranPemda') ?>",
            data: {
                id_tujuan: value,
            },
            async: false,

            dataType: "JSON",
            success: function(res) {
                $('#select_sasaran_pemda').html('');
                $('#select_sasaran_pemda').append('<option value="">Pilih Sasaran</option>')
                $.each(res, function(i, value) {
                    $('#select_sasaran_pemda').append('<option value="' + value.id + '">' + value.no_urut + '.' + value.sasaran + '</option>')
                });
            }
        });

    }
    async function edit_iku(id) {
        $('#form_reviu')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('.form-control').removeClass('is-invalid is-valid'); // clear error class
        $('#btnSave').text('Perbaharui'); //change button text
        //Ajax Load data from ajax
        await $.ajax({
            url: '<?= base_url('form/Form2a/edit/') ?>' + id,
            type: "get",
            async: false,
            dataType: "JSON",
            success: function(data) {
                $('#select_tujuan_pemda').val(data.id_tujuan).trigger('change');
                $('#select_sasaran_pemda').val(data.id_sasaran).trigger('change');
                $('#iku').val(data.iku);
                $('#satuan').val(data.satuan);
                $('#target').val(data.target);
                $('#atribut').val(data.atribut);
                $('#id_iku').val(data.id);
                $('#btnIKU').html('<i class="flaticon-edit"></i>Perbaharui IKU'); //change button text

                document.getElementById("select_tujuan_pemda").scrollIntoView();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Gagal", "Gagal Mendapatkan data", "error");
            }
        });

    }

    function saveKomite() {
        $('#btnSaveKomite').text('Menyimpan...'); //change button text
        $('#btnSaveKomite').attr('disabled', true); //set button disable
        var url;
        url = '<?= base_url('form/Form2a/saveKomite') ?>';
        var formData = new FormData($('#form_komite')[0]);
        formData.set('tahun', $('[name="tahun"]').val());
        formData.set('id_rpjmd', $('[name="id_rpjmd"]').val());
        formData.set('opd_id', $('#kt_form [name="id"]').val());

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
                    $('#modal_form_komite').modal('hide');
                    Swal.fire("Berhasil", "Berhasil menyimpan data", "success");
                } else {
                    $.each(data.messages, function(key, value) {
                        const element = $('[name="' + key + '"]');
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
                $('#btnSaveKomite').text('Simpan'); //change button text
                $('#btnSaveKomite').attr('disabled', false); //set button enable


            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", " Gagal Menyimpan / Update data", "error");
                $('#btnSaveKomite').text('Simpan'); //change button text
                $('#btnSaveKomite').attr('disabled', false); //set button enable

            }
        });
    }

    const changeUrusan = (e) => {
        $.ajax({
            type: "post",
            url: '<?= base_url('form/Form2a/getKonteksRisiko') ?>',
            data: {
                urusan: e.value,
                tahun: $('[name="tahun"]').val(),
            },
            dataType: "json",
            success: function(response) {
                $.each(response.data, function(key, value) {
                    var element = $('[name="' + key + '"]');
                    console.log(element)

                    if (key != 'id') {
                        element.val(value)
                    }
                });

            }
        });
    }

    const loadDataRpjmd = () => {

        $.ajax({
            type: "post",
            url: '<?= base_url('form/Form2a/get_data') ?>',
            data: {
                id_rpjmd: $('[name=id_rpjmd]').val(),
                tahun: $('[name=tahun]').val(),
            },
            dataType: "json",
            success: function(response) {
                $('#form_komite [name="urusan"]').empty().append('<option value="">Pilih Urusan</option>');
                $('#form_komite [name="misi"]').empty().append('<option value="">Pilih Misi</option>');
                $('#form_komite [name="tujuan"]').empty().append('<option value="">Pilih Tujuan</option>');
                $('#form_komite [name="sasaran"]').empty().append('<option value="">Pilih Sasaran</option>');
                $('#form_komite [name="iku"]').empty().append('<option value="">Pilih IKU</option>');
                $('#form_komite [name="prioritas"]').empty().append('<option value="">Pilih Prioritas</option>');

                $.each(response.urusan, function(i, v) {
                    $('#form_komite [name="urusan"]').append('<option value="' + v.id + '">' + v.urusan + '</option>');
                });
                $.each(response.misi, function(i, v) {
                    $('#form_komite [name="misi"]').append('<option value="' + v.id + '">' + v.misi + '</option>');
                });
                $.each(response.tujuan, function(i, v) {
                    $('#form_komite [name="tujuan"]').append('<option value="' + v.id + '">' + v.tujuan + '</option>');
                });
                $.each(response.sasaran, function(i, v) {
                    $('#form_komite #sasaran').append('<option value="' + v.id + '">' + v.sasaran + '</option>');
                });
                $.each(response.iku, function(i, v) {
                    $('#form_komite [name="iku"]').append('<option value="' + v.id + '">' + v.iku + '</option>');
                });
                $.each(response.prioritas, function(i, v) {
                    $('#form_komite [name="prioritas"]').append('<option value="' + v.id + '">' + v.prioritas + '</option>');
                });
            }
        });
    }
    async function editKomite() {
        loadDataRpjmd()
        $('.text-danger').empty(); // clear error string
        $('.form-control').removeClass('is-invalid is-valid'); // clear error class
        $('#btn2aKomite').text('Perbaharui'); //change button text
        //Ajax Load data from ajax
        if ($('[name=id_rpjmd]').val() == '' || $('[name=tahun]').val() == '' || $('[name=id]').val() == '') {
            Swal.fire("Perhatian", "Isi tahun terlebih dahulu", "warning");
            return false;
        }
        await $.ajax({
            url: '<?= base_url('form/Form2a/editKomite/') ?>',
            type: "post",
            async: false,
            data: {
                id_rpjmd: $('[name=id_rpjmd]').val(),
                tahun: $('[name=tahun]').val(),
                opd_id: $('[name=id]').val(),
            },
            dataType: "JSON",
            success: function(data) {
                $('#modal_form_komite').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Manajemen Komite Risiko'); // Set title to Bootstrap modal title
                $.each(data, function(key, value) {
                    if (key != 'id') {
                        if (key == 'sumber_data') {
                            var element = $('[name="sumber_data_2a"]');
                        } else {
                            var element = $('[name="' + key + '"]');
                        }

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
    const addIkuPemda = () => {
        var formIku = new FormData();
        formIku.append('rpjmd', $('[name=id_rpjmd]').val());
        formIku.append('select_tujuan_pemda', $('#select_tujuan_pemda').val());
        formIku.append('select_sasaran_pemda', $('#select_sasaran_pemda').val());
        formIku.append('iku', $('#iku').val());
        formIku.append('id_iku', $('#id_iku').val());
        formIku.append('satuan', $('#satuan').val());
        formIku.append('target', $('#target').val());
        formIku.append('atribut', $('#atribut').val());

        var settings = {
            "url": "<?= base_url('form/form2a/save') ?>",
            "method": "POST",
            "timeout": 0,
            "processData": false,
            "mimeType": "multipart/form-data",
            "contentType": false,
            "data": formIku
        };

        $.ajax(settings).done(function(obj) {
            myJson = JSON.parse(obj);

            if (myJson.status) {
                toastr.success(myJson.message);
                $('#select_tujuan_pemda').val("").trigger('change');
                $('#select_sasaran_pemda').html(' ');
                $('#iku').val('');
                $('#satuan').val('');
                $('#target').val('');
                $('#atribut').val('');
                $('#id_iku').val('');
                reload_table2a();
                $('#btnIKU').html('<i class="flaticon-plus"></i>Tambah IKU'); //change button text

            } else {
                $.each(myJson.messages, function(key, value) {
                    if (key == 'rpjmd') {
                        if (value)
                            toastr.error('RPJMD belum di isi');
                    }
                    const element = $('#' + key);
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

        });
    }

    const add_urusan = () => {
        $('.urusanNew').show();
        $('.urusan').hide();
    }
    const batal_urusan = () => {
        $('.urusanNew').hide();
        $('.urusan').show();
    }
    $('#addUrusan').click(function() {
        $.ajax({
            type: "post",
            url: "<?= base_url('form/Form2a/addUrusan') ?>",
            data: {
                urusan: $('[name=new_urusan]').val(),
            },
            dataType: "JSON",
            success: function(response) {
                if (response.status) {
                    toastr.success(response.message);
                    $('.urusanNew').hide();
                    $('.urusan').show();
                    $('[name="urusan"]').append('<option value="' + response.id + '">' + response.urusan + '</option>');
                    $('[name="urusan"]').val(response.id).trigger('change');
                } else {
                    toastr.error(response.message);
                }
            }
        });
    });
</script>