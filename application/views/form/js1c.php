<script>
    function unduh1c() {
        var tahun = $('[name=tahun]').val();
        var id_opd = $('[name=id]').val();
        var id_rpjmd = $('[name=id_rpjmd]').val();
        var tipe = 'excel';
        url = "<?= base_url('form/Form1c/export') ?>?tahun=" + tahun + "&opd=" + id_opd + "&rpjmd=" + id_rpjmd + "&tipe=" + tipe;

        window.open(url, '_blank');
    }

    function preview1c() {
        $('#modal_print').modal('show')
        $('.modal-title').text('Form 1.c')
        var tahun = $('[name=tahun]').val();
        var id_opd = $('[name=id]').val();
        var id_rpjmd = $('[name=id_rpjmd]').val();
        var tipe = 'pdf';
        url = "<?= base_url('form/Form1c/export') ?>?tahun=" + tahun + "&id_opd=" + id_opd + "&id_rpjmd=" + id_rpjmd + "&tipe=" + tipe;

        $.ajax({
            type: "get",
            url: url,
            dataType: "html",
            success: function(response) {
                $('.printPreview').html(response)
            }
        });
    }
    var tabel_1c;

    $(document).ready(function() {

        tabel_1c = $('#tabel_1c').DataTable({
            "responsive": true,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // "searching": false,
            "ordering": false,
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": '<?= base_url('form/Form1c/dat_list') ?>',
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
                },

            ],


        });

    });

    function reload_table1c() {
        tabel_1c.ajax.reload(null, false); //reload datatable ajax
    }

    function add_reviu() {
        $('#form_reviu')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('input:text:visible:first', this).focus();
        $('#modal_form_reviu').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah'); // Set Title to Bootstrap modal title
        $('#btnSaveReviu').text('Simpan'); //change button text
        $('#btnSaveReviu').attr('disabled', false);
        $('#btnSaveReviu').attr('style', 'display:block');
        $('.tahun').val($('[name=tahun]').val());
    }

    async function edit_reviu(id, tahun) {
        if (tahun) {
            var opd_id = $('[name=id]').val();
            $('#form_reviu')[0].reset(); // reset form on modals
            $('.text-danger').empty(); // clear error string
            $('.form-control').removeClass('is-invalid is-valid'); // clear error class
            $('#btnSaveReviu').text('Perbaharui'); //change button text
            //Ajax Load data from ajax
            await $.ajax({
                url: '<?= base_url('form/Form1c/edit/') ?>' + id,
                type: "post",
                data: {
                    id, //ID MASTER
                    tahun,
                    opd_id,
                },
                async: false,
                dataType: "JSON",
                success: function(data) {

                    $('#form_reviu [name="question"]').val(data.id_master_old).trigger('change');
                    if (data.data) {
                        $('[name="hasil_reviu"]').val(data.data.simpulan);
                        $('#form_reviu [name="tahun"]').val(tahun);
                        $('[name="penjelasan_reviu"]').val(data.data.penjelasan);
                        $('[name="uraian"]').val(data.data.uraian);
                        $('[name=uraian]').summernote({
                            height: 150,
                            // toolbar: false,
                            toolbar: [
                                ['font', ['bold', 'italic', 'underline', 'clear']],
                                ['para', ['ul', 'ol', 'paragraph']],
                            ],
                        });
                    }
                    $('#modal_form_reviu').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit Reviu'); // Set title to Bootstrap modal title
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Swal.fire("Gagal", "Gagal Mendapatkan data", "error");
                }
            });
        } else {
            Swal.fire("Gagal", "Tahun tidak boleh kosong", "error");
        }
    }


    function save_reviu() {
        $('#btnSaveReviu').text('Menyimpan...'); //change button text
        $('#btnSaveReviu').attr('disabled', true); //set button disable
        var url;
        url = '<?= base_url('form/Form1c/save') ?>';
        var formData = new FormData($('#form_reviu')[0]);
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
                    $('#modal_form_reviu').modal('hide');
                    Swal.fire("Berhasil", "Berhasil menyimpan data", "success");
                    reload_table1c();


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
                $('#btnSaveReviu').text('Simpan'); //change button text
                $('#btnSaveReviu').attr('disabled', false); //set button enable


            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", " Gagal Menyimpan / Update data", "error");
                $('#btnSaveReviu').text('Simpan'); //change button text
                $('#btnSaveReviu').attr('disabled', false); //set button enable

            }
        });
    }

    function _delete_reviu(id, nama) {
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
                    url: '<?= base_url('form/Form1c/delete/') ?>' + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        //if success reload ajax table
                        Swal.fire("Berhasil!", "Data telah di hapus.", "success");
                        reload_table1c();
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