<script>
    var tabel_8_pemda, tabel_8_opd, tabel_8_operasional;

    $(document).ready(function() {
        tabel_8_pemda = $('#tabel_8_pemda').DataTable({
            "responsive": true,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // "searching": false,
            "ordering": false,
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": '<?= base_url('form/Form8/dat_list_pemda') ?>',
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
        tabel_8_opd = $('#tabel_8_opd').DataTable({
            "responsive": true,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // "searching": false,
            "ordering": false,
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": '<?= base_url('form/Form8/dat_list_opd') ?>',
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
        tabel_8_operasional = $('#tabel_8_operasional').DataTable({
            "responsive": true,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // "searching": false,
            "ordering": false,
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": '<?= base_url('form/Form8/dat_list_operasional') ?>',
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

    function preview8() {
        $('.modal-title').text('Form 8')
        var tahun = $('[name=tahun]').val();
        var id_opd = $('[name=id]').val();
        var id_rpjmd = $('[name=id_rpjmd]').val();
        var urusan = $('[name=urusan_pemda]').val();
        url = "<?= base_url('form/Form8/export') ?>"
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

    function saveKomunikasiPemda() {
        $('#btnKomunikasiPemda').text('Menyimpan...'); //change button text
        $('#btnKomunikasiPemda').attr('disabled', true); //set button disable
        var url;
        url = '<?= base_url('form/Form8/save_pemda') ?>';
        var formData = new FormData($('#form_8_pemda')[0]);
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
                    $('#modal_8_pemda').modal('hide');
                    Swal.fire("Berhasil", "Berhasil menyimpan data", "success");
                    reload_table_8_pemda();
                } else {
                    $.each(data.messages, function(key, value) {
                        const element = $('#form_8_pemda [name ="' + key + '"]');
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
                $('#btnKomunikasiPemda').text('Simpan'); //change button text
                $('#btnKomunikasiPemda').attr('disabled', false); //set button enable


            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", " Gagal Menyimpan / Update data", "error");
                $('#btnKomunikasiPemda').text('Simpan'); //change button text
                $('#btnKomunikasiPemda').attr('disabled', false); //set button enable

            }
        });
    }

    function saveKomunikasiOpd() {
        $('#btnKomunikasiOpd').text('Menyimpan...'); //change button text
        $('#btnKomunikasiOpd').attr('disabled', true); //set button disable
        var url;
        url = '<?= base_url('form/Form8/save_opd') ?>';
        var formData = new FormData($('#form_8_opd')[0]);
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
                    $('#modal_8_opd').modal('hide');
                    reload_table_8_opd();
                    Swal.fire("Berhasil", "Berhasil menyimpan data", "success");
                } else {
                    $.each(data.messages, function(key, value) {
                        const element = $('#form_8_opd [name ="' + key + '"]');
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
                $('#btnKomunikasiOpd').text('Simpan'); //change button text
                $('#btnKomunikasiOpd').attr('disabled', false); //set button enable


            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", " Gagal Menyimpan / Update data", "error");
                $('#btnKomunikasiOpd').text('Simpan'); //change button text
                $('#btnKomunikasiOpd').attr('disabled', false); //set button enable

            }
        });
    }

    function saveKomunikasiOperasional() {
        $('#btnKomunikasiOpd').text('Menyimpan...'); //change button text
        $('#btnKomunikasiOpd').attr('disabled', true); //set button disable
        var url;
        url = '<?= base_url('form/Form8/save_operasional') ?>';
        var formData = new FormData($('#form_8_operasional')[0]);
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
                    $('#modal_8_operasional').modal('hide');
                    reload_table_8_operasional();
                    Swal.fire("Berhasil", "Berhasil menyimpan data", "success");
                } else {
                    $.each(data.messages, function(key, value) {
                        const element = $('#form_8_operasional [name ="' + key + '"]');
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
                $('#btnKomunikasiOpd').text('Simpan'); //change button text
                $('#btnKomunikasiOpd').attr('disabled', false); //set button enable


            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", " Gagal Menyimpan / Update data", "error");
                $('#btnKomunikasiOpd').text('Simpan'); //change button text
                $('#btnKomunikasiOpd').attr('disabled', false); //set button enable

            }
        });
    }
    const loadRiskPemda = async () => {
        var tahun = $('[name=tahun]').val();
        var id_opd = $('[name=id]').val();
        var id_rpjmd = $('[name=id_rpjmd]').val();
        var urusan = $('[name=urusan_pemda]').val();

        await $.ajax({
            url: '<?= base_url('form/Form8/get_risk_pemda') ?>',
            async: false,
            type: "POST",
            data: {
                tahun,
                id_opd,
                id_rpjmd,
                urusan,
            },
            dataType: "JSON",
            success: function(data) {
                $('#form_8_pemda [name="risk_pemda"]').empty();
                $('#form_8_pemda [name="risk_pemda"]').append('<option value="">-- Pilih --</option>');
                $.each(data, function(key, value) {
                    $('#form_8_pemda [name="risk_pemda"]').append('<option value="' + value.id + '">' + value.kode_risiko + '.' + value.uraian_risiko + '</option>');
                });
            }
        });
    }
    const loadRiskOpd = async () => {
        var tahun = $('[name=tahun]').val();
        var id_opd = $('[name=id]').val();
        var id_rpjmd = $('[name=id_rpjmd]').val();
        var urusan = $('[name=urusan_pemda]').val();
        await $.ajax({
            url: '<?= base_url('form/Form8/get_risk_opd') ?>',
            async: false,
            type: "POST",
            data: {
                tahun,
                id_opd,
                id_rpjmd,
                urusan,
            },
            dataType: "JSON",
            success: function(data) {
                $('#form_8_opd [name="risk_opd"]').empty();
                $('#form_8_opd [name="risk_opd"]').append('<option value="">-- Pilih --</option>');
                $.each(data, function(key, value) {
                    $('#form_8_opd [name="risk_opd"]').append('<option value="' + value.id + '">' + value.kode_risiko + '.' + value.uraian_risiko + '</option>');
                });
            }
        });
    }
    const loadRiskOperasional = async () => {
        var tahun = $('[name=tahun]').val();
        var id_opd = $('[name=id]').val();
        var id_rpjmd = $('[name=id_rpjmd]').val();
        var urusan = $('[name=urusan_pemda]').val();
        await $.ajax({
            url: '<?= base_url('form/Form8/get_risk_operasional') ?>',
            type: "POST",
            async: false,
            data: {
                tahun,
                id_opd,
                id_rpjmd,
                urusan,
            },
            dataType: "JSON",
            success: function(data) {
                $('#form_8_operasional [name="risk_operasional"]').empty();
                $('#form_8_operasional [name="risk_operasional"]').append('<option value="">-- Pilih --</option>');
                $.each(data, function(key, value) {
                    $('#form_8_operasional [name="risk_operasional"]').append('<option value="' + value.id + '">' + value.kode_risiko + '.' + value.uraian_risiko + '</option>');
                });
            }
        });
    }
    async function addKomunikasiPemda() {
        loadRiskPemda();
        $('#form_8_pemda')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('.form-control').removeClass('is-invalid is-valid'); // clear error class
        $('#btnKomunikasiPemda').text('Tambah'); //change button text
        $('#form_8_pemda [name="id"]').val('');
        $('#modal_8_pemda').modal('show'); // show bootstrap modal when complete loaded
        $('.modal-title').text('Tambah Komunikasi Pemda'); // Set title to Bootstrap modal title
    }
    async function addKomunikasiOpd() {
        loadRiskOpd();

        $('#form_8_opd')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('.form-control').removeClass('is-invalid is-valid'); // clear error class
        $('#btnKomunikasiOpd').text('Tambah'); //change button text
        $('#form_8_opd [name="id"]').val('');
        $('#modal_8_opd').modal('show'); // show bootstrap modal when complete loaded
        $('.modal-title').text('Tambah Komunikasi Opd'); // Set title to Bootstrap modal title
    }
    async function addKomunikasiOperasional() {
        loadRiskOperasional();

        $('#form_8_operasional')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('.form-control').removeClass('is-invalid is-valid'); // clear error class
        $('#btnKomunikasiOperasional').text('Tambah'); //change button text
        $('#form_8_operasional [name="id"]').val('');
        $('#modal_8_operasional').modal('show'); // show bootstrap modal when complete loaded
        $('.modal-title').text('Tambah Komunikasi Operasional'); // Set title to Bootstrap modal title
    }

    function editKomunikasiPemda(id) {
        loadRiskPemda();
        $('#form_8_pemda')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('.form-control').removeClass('is-invalid is-valid'); // clear error class
        $('#btnKomunikasiPemda').text('Perbaharui'); //change button text
        //Ajax Load data from ajax
        $.ajax({
            url: '<?= base_url('form/Form8/edit_pemda') ?>',
            type: "post",
            data: {
                id, //ID MASTER
            },
            async: false,
            dataType: "JSON",
            success: function(resp) {
                var data = resp.data
                $('#form_8_pemda [name="id"]').val(id);
                $('#form_8_pemda [name="risk_pemda"]').val(data.id_risk).trigger('change');
                $('#form_8_pemda [name="media"]').val(data.media);
                $('#form_8_pemda [name="keterangan"]').val(data.keterangan);
                $('#form_8_pemda [name="kegiatan_pengendalian"]').val(data.kegiatan_pengendalian);
                $('#form_8_pemda [name="penyedia_informasi"]').val(data.penyedia_informasi);
                $('#form_8_pemda [name="penerima_informasi"]').val(data.penerima_informasi);
                $('#form_8_pemda [name="rencana_waktu_pelaksanaan"]').val(data.rencana_waktu_pelaksanaan);
                $('#form_8_pemda [name="realisasi_waktu_pelaksanaan"]').val(data.realisasi_waktu_pelaksanaan);
                $('#modal_8_pemda').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Komunikasi Pemda'); // Set title to Bootstrap modal title
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Gagal", "Gagal Mendapatkan data", "error");
            }
        });

    }

    function editKomunikasiOpd(id) {
        loadRiskOpd();

        $('#form_8_opd')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('.form-control').removeClass('is-invalid is-valid'); // clear error class
        $('#btnKomunikasiOpd').text('Perbaharui'); //change button text
        //Ajax Load data from ajax
        $.ajax({
            url: '<?= base_url('form/Form8/edit_opd') ?>',
            type: "post",
            data: {
                id, //ID MASTER
            },
            async: false,
            dataType: "JSON",
            success: function(resp) {

                var data = resp.data
                $('#form_8_opd [name="id"]').val(data.id);
                $('#form_8_opd [name="risk_opd"]').val(data.id_risk).trigger('change');
                $('#form_8_opd [name="media"]').val(data.media);
                $('#form_8_opd [name="keterangan"]').val(data.keterangan);
                $('#form_8_opd [name="kegiatan_pengendalian"]').val(data.kegiatan_pengendalian);
                $('#form_8_opd [name="penyedia_informasi"]').val(data.penyedia_informasi);
                $('#form_8_opd [name="penerima_informasi"]').val(data.penerima_informasi);
                $('#form_8_opd [name="rencana_waktu_pelaksanaan"]').val(data.rencana_waktu_pelaksanaan);
                $('#form_8_opd [name="realisasi_waktu_pelaksanaan"]').val(data.realisasi_waktu_pelaksanaan);

                $('#modal_8_opd').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Komunikasi Opd'); // Set title to Bootstrap modal title
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Gagal", "Gagal Mendapatkan data", "error");
            }
        });

    }

    function editKomunikasiOperasional(id) {
        loadRiskOperasional();

        $('#form_8_operasional')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('.form-control').removeClass('is-invalid is-valid'); // clear error class
        $('#btnKomunikasiOperasional').text('Perbaharui'); //change button text
        //Ajax Load data from ajax
        $.ajax({
            url: '<?= base_url('form/Form8/edit_operasional') ?>',
            type: "post",
            data: {
                id, //ID MASTER
            },
            async: false,
            dataType: "JSON",
            success: function(data) {
                var data = resp.data
                $('#form_8_operasional [name="id"]').val(data.id);
                $('#form_8_operasional [name="risk_operasional"]').val(data.id_risk).trigger('change');
                $('#form_8_operasional [name="media"]').val(data.media);
                $('#form_8_operasional [name="keterangan"]').val(data.keterangan);
                $('#form_8_operasional [name="kegiatan_pengendalian"]').val(data.kegiatan_pengendalian);
                $('#form_8_operasional [name="penyedia_informasi"]').val(data.penyedia_informasi);
                $('#form_8_operasional [name="penerima_informasi"]').val(data.penerima_informasi);
                $('#form_8_operasional [name="rencana_waktu_pelaksanaan"]').val(data.rencana_waktu_pelaksanaan);
                $('#form_8_operasional [name="realisasi_waktu_pelaksanaan"]').val(data.realisasi_waktu_pelaksanaan);

                $('#modal_8_operasional').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Komunikasi Operasional'); // Set title to Bootstrap modal title
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Gagal", "Gagal Mendapatkan data", "error");
            }
        });

    }

    function delKomunikasiPemda(id, nama) {
        Swal.fire({
            title: "Anda yakin menghapus data " + id + "?",
            text: "anda tidak akan bisa mengembalikan data!",
            icon: "question",
            confirmButtonText: "Ya, Hapus data!",
            cancelButtonText: "Tidak, Batalkan hapus!",
            showCancelButton: true,

        }).then(result => {
            if (result.value) {
                $.ajax({
                    url: '<?= base_url('form/Form8/delete_pemda') ?>',
                    type: "POST",
                    data: {
                        id
                    },
                    dataType: "JSON",
                    success: function(data) {
                        //if success reload ajax table
                        Swal.fire("Berhasil!", "Data telah di hapus.", "success");
                        reload_table_8_pemda();
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

    function delKomunikasiOperasional(id, nama) {
        Swal.fire({
            title: "Anda yakin menghapus data " + id + "?",
            text: "anda tidak akan bisa mengembalikan data!",
            icon: "question",
            confirmButtonText: "Ya, Hapus data!",
            cancelButtonText: "Tidak, Batalkan hapus!",
            showCancelButton: true,

        }).then(result => {
            if (result.value) {
                $.ajax({
                    url: '<?= base_url('form/Form8/delete_operasional') ?>',
                    type: "POST",
                    data: {
                        id
                    },
                    dataType: "JSON",
                    success: function(data) {
                        //if success reload ajax table
                        Swal.fire("Berhasil!", "Data telah di hapus.", "success");
                        reload_table_8_operasional();
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

    function delKomunikasiOpd(id, nama) {
        Swal.fire({
            title: "Anda yakin menghapus data " + id + "?",
            text: "anda tidak akan bisa mengembalikan data!",
            icon: "question",
            confirmButtonText: "Ya, Hapus data!",
            cancelButtonText: "Tidak, Batalkan hapus!",
            showCancelButton: true,

        }).then(result => {
            if (result.value) {
                $.ajax({
                    url: '<?= base_url('form/Form8/delete_opd') ?>',
                    type: "POST",
                    data: {
                        id
                    },
                    dataType: "JSON",
                    success: function(data) {
                        //if success reload ajax table
                        Swal.fire("Berhasil!", "Data telah di hapus.", "success");
                        reload_table_8_opd();
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

    function reload_table_8_pemda() {
        tabel_8_pemda.ajax.reload(null, false); //reload datatable ajax
    }

    function reload_table_8_opd() {
        tabel_8_opd.ajax.reload(null, false); //reload datatable ajax
    }

    function reload_table_8_operasional() {
        tabel_8_operasional.ajax.reload(null, false); //reload datatable ajax
    }
</script>