<script type="text/javascript">
    var save_method; //for save method string
    var table;

    $(document).ready(function() {


        //datatables
        table = $('#tabel').DataTable({
            "responsive": true,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // "searching": false,

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": '<?= base_url('opd/dat_detail_list') ?>',
                "type": "POST",
                "data": function(data) {
                    data.id = '<?= $id ?>',
                        data.rpjmd = $('#rpjmd').val()
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



    function getSasaran() {
        var rpjmd = $('[name="rpjmd"]').val();
        var pemda = '<?= $id ?>';

        $('[name="sasaran"]').select2();
        $.ajax({
            url: '<?= base_url('opd/getSasaran/') ?>',
            type: "post",
            data: {
                rpjmd: rpjmd,
                pemda: pemda
            },
            dataType: "JSON",
            success: function(data) {
                $('[name="sasaran"]').empty();
                $('[name="sasaran"]').append('<option value="">--Pilih Sasaran--</option>');
                $.each(data, function(key, value) {
                    console.log(value)
                    $('[name="sasaran"]').append('<option value="' + value.id + '">' + value.sasaran + '</option>');
                });

            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Gagal", "Gagal Mendapatkan data", "error");
            }
        });
    }

    function add() {
        save_method = 'add';
        reset(); // reset form on modals
        $('input:text:visible:first', this).focus();
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah'); // Set Title to Bootstrap modal title
        $('#btnSave').text('Simpan'); //change button text
        $('#btnSave').attr('disabled', false);
        $('#btnSave').attr('style', 'display:block');
    }

    function reset() {
        $('#form')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('[name="sasaran"]').empty();
        $('#label-image').text('Upload image (PNG,JPEG,JPG Max 4Mb)'); // label image upload
        $('#image-preview').text('(No image)');
    }


    function save() {
        $('#btnSave').text('Menyimpan...'); //change button text
        $('#btnSave').attr('disabled', true); //set button disable
        var url;
        url = '<?= base_url('opd/save_detail') ?>';
        var formData = new FormData($('#form')[0]);
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
                    $('#modal_form').modal('hide');
                    Swal.fire("Berhasil", "Berhasil menyimpan data", "success");
                    reload_table();

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
                $('#btnSave').text('Simpan'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable


            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", " Gagal Menyimpan / Update data", "error");
                $('#btnSave').text('Simpan'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable

            }
        });
    }

    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax
    }

    function _delete(id, nama) {
        Swal.fire({
            title: "Anda yakin menghapus " + nama + " ?",
            text: "anda tidak akan bisa mengembalikan data!",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Ya, Hapus data!",
            cancelButtonText: "Tidak, Batalkan hapus!",

        }).then(result => {
            if (result.value) {
                $.ajax({
                    url: '<?= base_url('opd/delete_detail/') ?>' + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        //if success reload ajax table
                        Swal.fire("Berhasil!", "Data telah di hapus.", "success");
                        reload_table();
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