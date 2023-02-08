<script>
    var tabel_6;

    $(document).ready(function() {
        var groupColumn = 0;
        tabel_6 = $('#tabel_6').DataTable({

            "responsive": true,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // "searching": false,
            "ordering": false,
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": '<?= base_url('form/Form6/dat_list') ?>',
                "type": "POST",
                "data": function(data) {
                    data.opd = $('[name=id]').val();
                    data.rpjmd = $('[name=id_rpjmd]').val();
                    data.tahun = $('[name=tahun]').val();
                }
            },
            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [0, -1], //last column
                "orderable": false, //set not orderable
                "className": 'text-center'
            }, {
                visible: false,
                targets: groupColumn
            }],
            drawCallback: function(settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;

                api
                    .column(groupColumn, {
                        page: 'current'
                    })
                    .data()
                    .each(function(group, i) {
                        if (last !== group) {
                            $(rows)
                                .eq(i)
                                .before('<tr class="group"><td colspan="7">' + group + '</td></tr>');

                            last = group;
                        }
                    });
            },


        });

    });

    function reload_table_6() {
        tabel_6.ajax.reload(null, false); //reload datatable ajax
    }
    async function edit_rtp(id) {

        var opd_id = $('[name=id]').val();
        $('#form_6')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('.form-control').removeClass('is-invalid is-valid'); // clear error class
        $('#btnSaveRtp').text('Perbaharui'); //change button text
        //Ajax Load data from ajax
        $('#form_6 [name=realisasi_penyelesaian]').summernote('code', '');
        $('#form_6 [name=rencana_perbaikan]').summernote('code', '');


        await $.ajax({
            url: '<?= base_url('form/Form6/edit') ?>',
            type: "post",
            data: {
                id, //ID SUMBER DATA FORM 1b SUMBER DATA 
            },
            async: false,
            dataType: "JSON",
            success: function(data) {
                $('.kondisi').empty()
                $('.kondisi').html(data.kelemahan)
                $('#form_6 [name="id"]').val(data.id_master_old);
                if (data.data) {

                    $('#form_6 [name="pj"]').val(data.data.pj);
                    $('#form_6 [name="twp"]').val(data.data.twp);

                    $('#form_6 [name=realisasi_penyelesaian]').summernote('code',
                        data.data.realisasi_penyelesaian);
                    $('#form_6 [name=rencana_perbaikan]').summernote('code',
                        data.data.rencana_perbaikan);
                }
                $('#modal_6').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Reviu'); // Set title to Bootstrap modal title
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Gagal", "Gagal Mendapatkan data", "error");
            }
        });

    }

    function saveRtp() {
        $('#btnSaveRtp').text('Menyimpan...'); //change button text
        $('#btnSaveRtp').attr('disabled', true); //set button disable
        var url;
        url = '<?= base_url('form/Form6/save') ?>';
        var formData = new FormData($('#form_6')[0]);
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
                    $('#modal_6').modal('hide');
                    Swal.fire("Berhasil", "Berhasil menyimpan data", "success");
                    reload_table_6();


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
                $('#btnSaveRtp').text('Simpan'); //change button text
                $('#btnSaveRtp').attr('disabled', false); //set button enable


            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", " Gagal Menyimpan / Update data", "error");
                $('#btnSaveRtp').text('Simpan'); //change button text
                $('#btnSaveRtp').attr('disabled', false); //set button enable

            }
        });
    }

    function preview6() {
        $('.modal-title').text('Form 6. Penilaian atas Kegiatan Pengendalian yang Ada dan Masih Dibutuhkan/ RTP atas Kelemahan Lingkungan Pengendalian (RTP atas CEE)')
        var tahun = $('[name=tahun]').val();
        var id_opd = $('[name=id]').val();
        var id_rpjmd = $('[name=id_rpjmd]').val();
        var urusan = $('[name=urusan_pemda]').val();
        url = "<?= base_url('form/Form6/export') ?>"
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
</script>