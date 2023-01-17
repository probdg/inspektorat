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
                "url": '<?= base_url('tujuan/dat_list') ?>',
                "type": "POST",
                "data": function(data) {
                    data.rpjmd = $('#rpjmd').val();
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
        $('[name="username"]').removeAttr('readonly');
        $('#cek_label').show();
        $('.form-control ,.custom-file-input').removeClass('is-invalid'); // clear error class
        $('.form-control ,.custom-file-input').removeClass('is-valid'); // clear error class
        $('.invalid-feedback').empty(); // clear error string
        $('#label-image').text('Upload image (PNG,JPEG,JPG Max 4Mb)'); // label image upload
        $('#image-preview').text('(No image)');
    }


    async function edit(id) {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.invalid-feedback ,#file-preview').empty(); // clear error string
        $('.form-control , .custom-file-input ').removeClass('is-invalid is-valid'); // clear error class
        $('#btnSave').text('Perbaharui'); //change button text
        //Ajax Load data from ajax
        await $.ajax({
            url: '<?= base_url('tujuan/edit/') ?>' + id,
            type: "GET",
            async: false,
            dataType: "JSON",
            success: function(data) {
                $('[name="id"]').val(data.id);
                $('[name="rpjmd"]').val(data.id_rpjmd).trigger('change');
                $('[name="tujuan"]').val(data.tujuan);
                $('[name="no_urut"]').val(data.no_urut);

                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit User Panel'); // Set title to Bootstrap modal title
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Gagal", "Gagal Mendapatkan data", "error");
            }
        });
    }

    function save() {
        $('#btnSave').text('Menyimpan...'); //change button text
        $('#btnSave').attr('disabled', true); //set button disable
        var url;
        url = '<?= base_url('tujuan/save') ?>';
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
                    for (var i = 0; i < data.inputerror.length; i++) {

                        $('[name="' + data.inputerror[i] + '"]').addClass('is-invalid'); //select parent twice to select div form-group class and add m--font-danger class
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string

                    }

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
            title: "Anda yakin menghapus ?",
            text: "anda tidak akan bisa mengembalikan data!",
            icon: "question",
            confirmButtonText: "Ya, Hapus data!",
            cancelButtonText: "Tidak, Batalkan hapus!",
            showCancelButton: true,

        }).then(result => {
            if (result.value) {
                $.ajax({
                    url: '<?= base_url('tujuan/delete/') ?>' + id,
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