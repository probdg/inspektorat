<script>
    var tabel_3c;

    $(document).ready(function() {

        tabel_3c = $('#tabel_3c').DataTable({
            "responsive": true,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // "searching": false,
            "ordering": false,
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": '<?= base_url('form/Form3c/dat_list') ?>',
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
    const loadKegiatan = () => {
        var tahun = $('[name=tahun]').val();
        var id_opd = $('[name=id]').val();
        var id_rpjmd = $('[name=id_rpjmd]').val();
        var urusan = $('[name=urusan_pemda]').val();
        $.ajax({
            url: '<?= base_url('form/Form3c/getKegiatan') ?>',
            type: 'POST',
            dataType: 'JSON',
            async: false,
            data: {
                tahun: tahun,
                id_opd: id_opd,
                id_rpjmd: id_rpjmd,
                urusan: urusan
            },
            success: function(data) {
                $('[name="kegiatan"]').empty();
                $('[name="kegiatan"]').append('<option value="">-- Pilih Kegiatan --</option>');
                $.each(data, function(key, value) {
                    $('[name="kegiatan"]').append('<option value="' + value.id + '">' + value.kegiatan + '</option>');
                });
            }
        });
    }
    const addRiskOperasional = () => {
        $('[name="uraian_risiko"]').summernote('code', '');
        $('[name="uraian_sebab"]').summernote('code', '');
        $('[name="uraian_dampak"]').summernote('code', '');
        loadKegiatan();
        $('#form_3c')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('input:text:visible:first', this).focus();
        $('#modal_3c').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah'); // Set Title to Bootstrap modal title
        $('#btnSaveOperasional').text('Simpan'); //change button text
        $('#btnSaveOperasional').attr('disabled', false);
        $('#btnSaveOperasional').attr('style', 'display:block');
        $('.tahun').val($('[name=tahun]').val());
        $('[name="opd_id"]').val($('[name="id"]').val());
        $('[name="urusan_pemda"]').val($('.urusan_pemda').val());
    }

    function saveRiskOperasional() {
        $('#btnSaveOperasional').text('Menyimpan...'); //change button text
        $('#btnSaveOperasional').attr('disabled', true); //set button disable
        var url;
        url = '<?= base_url('form/Form3c/save') ?>';
        var formData = new FormData($('#form_3c')[0]);
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
                    $('#modal_3c').modal('hide');
                    reload_table3c();
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
                $('#btnSaveOperasional').text('Simpan'); //change button text
                $('#btnSaveOperasional').attr('disabled', false); //set button enable


            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", " Gagal Menyimpan / Update data", "error");
                $('#btnSaveOperasional').text('Simpan'); //change button text
                $('#btnSaveOperasional').attr('disabled', false); //set button enable

            }
        });
    }

    async function edit_risk_operasional(id) {
        loadKegiatan()
        $('#form_3c')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('.form-control').removeClass('is-invalid is-valid'); // clear error class
        $('#btnSaveOperasional').text('Perbaharui'); //change button text
        //Ajax Load data from ajax
        await $.ajax({
            url: '<?= base_url('form/Form3c/edit') ?>',
            type: "post",
            data: {
                id, //ID MASTER
            },
            async: false,
            dataType: "JSON",
            success: function(data) {
                $.each(data, function(i, v) {
                    if (i == 'urusan') {
                        $('#form_3c [name="urusan_pemda"]').val(v);

                    } else if (i == 'kegiatan') {
                        $('#form_3c [name="' + i + '"]').val(v).trigger('change')

                    } else {
                        if ($('#form_3c [name="' + i + '"]').hasClass('summernote')) {
                            $('#form_3c [name="' + i + '"]').summernote('code', v);
                        } else {

                            $('#form_3c [name="' + i + '"]').val(v);
                        }

                    }
                });

                $('#modal_3c').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Risk Operasional'); // Set title to Bootstrap modal title
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Gagal", "Gagal Mendapatkan data", "error");
            }
        });

    }

    function _delete_risk_opd(id, nama) {
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
                    url: '<?= base_url('form/Form3c/delete/') ?>' + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        //if success reload ajax table
                        Swal.fire("Berhasil!", "Data telah di hapus.", "success");
                        reload_table3c();
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

    function reload_table3c() {
        tabel_3c.ajax.reload(null, false); //reload datatable ajax
    }

    function preview3c() {
        $('#modal_print').modal('show')
        $('.modal-title').text('Form 3c. Identifikasi Risiko Operasional OPD')
        var tahun = $('[name=tahun]').val();
        var id_opd = $('[name=id]').val();
        var id_rpjmd = $('[name=id_rpjmd]').val();
        var urusan = $('[name=urusan_pemda]').val();

        url = "<?= base_url('form/Form3c/export') ?>"
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
</script>