<script>
    var tabel_2biku;

    $(document).ready(function() {

        tabel_2biku = $('#tabel_2biku').DataTable({
            "responsive": true,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // "searching": false,

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": '<?= base_url('form/Form2b/dat_list') ?>',
                "type": "POST",
                "data": function(data) {
                    data.rpjmd = $('[name=id_rpjmd]').val();
                    data.tahun = $('[name=tahun]').val();
                    data.id_opd = $('[name=id]').val();
                    data.urusan = $('.urusan_pemda').val();
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
    $('#upload2b').on('click', function() {

        var file_data = $('#file2b')[0].files;
        var form = new FormData();
        form.append('file2b', file_data[0]);
        form.append('tahun', $('[name=tahun]').val());
        form.append('opd_id', $('[name=id]').val());
        form.append('rpjmd', $('[name=id_rpjmd]').val());
        form.append('urusan', $('.urusan_pemda').val());
        $.ajax({
            "url": "<?= base_url('form/Form2b/import') ?>",
            "method": "POST",
            "timeout": 0,
            "cache": false,
            "processData": false,
            "mimeType": "multipart/form-data",
            "contentType": false,
            "data": form,
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                //Download progress
                xhr.addEventListener("progress", function(evt) {
                    console.log(evt.lengthComputable);
                    if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        var panjang = (Math.round(percentComplete * 100) + "%");

                    }
                    KTApp.block('#kt_content', {
                        overlayColor: '#000000',
                        state: 'primary',
                        message: 'Sedang memproses... ' + panjang
                    });
                }, false);
                return xhr;
            },
            beforeSend: function() {
                KTApp.block('#kt_content', {
                    // overlayColor: '#000000',
                    state: 'primary',
                    message: 'Mempersiapkan file ...'
                });

            },
            complete: function() {
                KTApp.unblock('#kt_content');

                console.log('berhasil')
            },
            success: function(obj) {
                myJson = JSON.parse(obj);

                if (myJson.status) {
                    reload_iku_opd();
                    toastr.success(myJson.message);
                } else {
                    toastr.error(myJson.message);
                }
            }
        });
    });
    $('#btn2b').on('click', function() {
        var form = new FormData();
        form.append('tahun', $('[name=tahun]').val());
        form.append('urusan', $('.urusan_pemda').val());
        form.append('sumber_data', $('[name=sumber_data_2b]').val());
        form.append('id_opd', $('[name=id]').val());
        form.append('rpjmd', $('[name=id_rpjmd]').val());

        var settings = {
            "url": "<?= base_url('form/Form2b/save') ?>",
            "method": "POST",
            "timeout": 0,
            "processData": false,
            "mimeType": "multipart/form-data",
            "contentType": false,
            "data": form
        };

        $.ajax(settings).done(function(obj) {
            myJson = JSON.parse(obj);

            if (myJson.status) {
                toastr.success(myJson.message);
            } else {
                $.each(myJson.messages, function(i, v) {
                    if (v) {
                        toastr.error(v)
                    }
                });
            }

        });
    });

    function preview2b() {
        $('#modal_print').modal('show')
        $('.modal-title').text('Penetapan Konteks Risiko Strategis OPD')
        var tahun = $('[name=tahun]').val();
        var id_opd = $('[name=id]').val();
        var id_rpjmd = $('[name=id_rpjmd]').val();
        $.ajax({
            type: "post",
            url: "<?= base_url('form/Form2b/export') ?>",
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
    const add_iku_opd = () => {
        $('#form_iku_opd')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('input:text:visible:first', this).focus();
        $('#modal_form_iku_opd').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah'); // Set Title to Bootstrap modal title
        $('#btnSaveIKU').text('Simpan'); //change button text
        $('#btnSaveIKU').attr('disabled', false);
        $('#btnSaveIKU').attr('style', 'display:block');
        $('.tahun').val($('[name=tahun]').val());
        $('[name="opd_id"]').val($('[name="id"]').val());
        $('[name="urusan"]').val($('.urusan_pemda').val());
    }

    function reload_iku_opd() {
        tabel_2biku.ajax.reload(null, false); //reload datatable ajax
    }

    function save_iku_opd() {
        $('#btnSaveIKU').text('Menyimpan...'); //change button text
        $('#btnSaveIKU').attr('disabled', true); //set button disable
        var url;
        url = '<?= base_url('form/Form2b/save_iku_opd') ?>';
        var formData = new FormData($('#form_iku_opd')[0]);
        formData.set('rpjmd', $('[name=id_rpjmd]').val());
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
                    $('#modal_form_iku_opd').modal('hide');
                    Swal.fire("Berhasil", "Berhasil menyimpan data", "success");
                    reload_iku_opd();
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
                $('#btnSaveIKU').text('Simpan'); //change button text
                $('#btnSaveIKU').attr('disabled', false); //set button enable


            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", " Gagal Menyimpan / Update data", "error");
                $('#btnSaveIKU').text('Simpan'); //change button text
                $('#btnSaveIKU').attr('disabled', false); //set button enable

            }
        });
    }

    function save_risk_opd() {
        $('#btnRiskOpd').text('Menyimpan...'); //change button text
        $('#btnRiskOpd').attr('disabled', true); //set button disable
        var url;
        url = '<?= base_url('form/Form2b/save_risk_opd') ?>';
        var formData = new FormData($('#form_pengelola_strategis')[0]);
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
                    $('#modal_form_risk_strategis').modal('hide');
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
                $('#btnRiskOpd').text('Simpan'); //change button text
                $('#btnRiskOpd').attr('disabled', false); //set button enable


            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", " Gagal Menyimpan / Update data", "error");
                $('#btnRiskOpd').text('Simpan'); //change button text
                $('#btnRiskOpd').attr('disabled', false); //set button enable

            }
        });
    }
    $('#anggota').on('click', '.add_anggota', function(e) {
        e.preventDefault();
        var i = e.target.dataset.id;
        var index = parseFloat(i) + 1
        $('.add_anggota').attr('data-id', index)
        $('#anggota').append(`<div class="form-group row" data-index="${index}">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                                   Lainnya *
                               </label>
                               <div class="col-lg-2">
                                   <input type="text" name="bidang_lainnya[]" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Bidang">
                               </div>
                               <div class="col-lg-2">
                                   <input type="text" name="jabatan_lainnya[]" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                               </div>
                               <div class="col-lg-4">
                                   <input type="text" name="nama_lainnya[]" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                               </div>
                               <div class="col-lg-2">
                                   <input type="text" name="nip_lainnya[]"  class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                               </div>
                               <div class="col-lg-2">
                                   <button type="button" data-id="${index}" onclick="del_anggota(${index})" class="btn btn-danger"><i class="ki ki-plus"></i></button>
                               </div>
                           </div>`);
    });


    function del_anggota(i) {
        $(`[data-index=${i}]`).remove();
    }
    async function edit_risk_strategis() {
        $('#form_pengelola_strategis')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('.form-control').removeClass('is-invalid is-valid'); // clear error class
        $('#btnRiskOpd').text('Perbaharui'); //change button text
        //Ajax Load data from ajax
        if ($('[name=id_rpjmd]').val() == '' || $('[name=tahun]').val() == '' || $('[name=id]').val() == '') {
            Swal.fire("Perhatian", "Isi tahun terlebih dahulu", "warning");
            return false;
        }
        await $.ajax({
            url: '<?= base_url('form/Form2b/edit_risk_strategis') ?>',
            type: "post",
            async: false,
            data: {
                id_rpjmd: $('[name=id_rpjmd]').val(),
                tahun: $('[name=tahun]').val(),
                opd_id: $('[name=id]').val(),
            },
            dataType: "JSON",
            success: function(data) {
                $('#modal_form_risk_strategis').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text(' Unit Pengelola Risiko Strategis'); // Set title to Bootstrap modal title
                $.each(data.data, function(key, value) {
                    if (key != 'id') {
                        var element = $('[name="' + key + '"]');
                        element.val(value);
                        element.closest('div.form-group')
                            .addClass('is-valid')
                            .find('.text-danger')
                            .remove();
                    }
                });
                $('#anggota').empty();
                if (data.anggota.length == 0) {
                    $('#anggota').append(`
                    <div class="form-group row" data-id="0">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12">
                                   Lainnya *
                               </label>
                               <div class="col-lg-2">
                                   <input type="text" name="bidang_lainnya[]" id="bidang_lainnya" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Bidang">
                               </div>
                               <div class="col-lg-2">
                                   <input type="text" name="jabatan_lainnya[]" id="jabatan_lainnya" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                               </div>
                               <div class="col-lg-4">
                                   <input type="text" name="nama_lainnya[]" id="nama_lainnya" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                               </div>
                               <div class="col-lg-2">
                                   <input type="text" name="nip_lainnya[]" id="nip_lainnya" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                               </div>
                               <div class="col-lg-2">
                                   <button type="button" data-id="0" class="btn btn-icon btn-success add_anggota"><i class="ki ki-plus"></i></button>
                               </div>
                           </div>`)
                } else {
                    var lastIndex = data.anggota.length;
                    for (let i = 0; i < data.anggota.length; i++) {
                        var element = data.anggota[i];
                        if (i == 0) {
                            $('#anggota').append(`
                                <div class="form-group row" data-index="${i}">
                                        <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12">
                                            Lainnya *
                                        </label>
                                        <div class="col-lg-2">
                                            <input type="text" name="bidang_lainnya[]" id="bidang_lainnya"  value="${element.bidang_anggota}" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Bidang">
                                        </div>
                                        <div class="col-lg-2">
                                            <input type="text" name="jabatan_lainnya[]" id="jabatan_lainnya"  value="${element.jabatan_anggota}" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="text" name="nama_lainnya[]" id="nama_lainnya" value="${element.nama_anggota}"  class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                                        </div>
                                        <div class="col-lg-2">
                                            <input type="text" name="nip_lainnya[]" id="nip_lainnya" value="${element.nip_anggota}" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                                        </div>
                                        <div class="col-lg-2">
                                            <button type="button" data-id="${lastIndex}" class="btn btn-icon btn-success add_anggota"><i class="ki ki-plus"></i></button>
                                        </div>
                                    </div>`)
                        } else {
                            $('#anggota').append(`
                            <div class="form-group row" data-index="${i}">
                                    <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12">
                                        Lainnya *
                                    </label>
                                    <div class="col-lg-2">
                                        <input type="text" name="bidang_lainnya[]" id="bidang_lainnya" value=${element.bidang_anggota} class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Bidang">
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="text" name="jabatan_lainnya[]" id="jabatan_lainnya" value="${element.jabatan_anggota}" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" name="nama_lainnya[]" id="nama_lainnya" value="${element.nama_anggota}" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="text" name="nip_lainnya[]" id="nip_lainnya" value="${element.nip_anggota}"  class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                                    </div>
                                    <div class="col-lg-2">
                                        <button type="button" data-index="${i}" onclick="del_anggota(${i})" class="btn btn-icon btn-danger"><i class="ki ki-close"></i></button>
                                    </div>
                                </div>`)
                        }
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Gagal", "Gagal Mendapatkan data", "error");
            }
        });

    }
    const edit_iku_opd = (id) => {

        $('#form_iku_opd')[0].reset(); // reset form on modals
        $('.text-danger').empty(); // clear error string
        $('.form-control').removeClass('is-invalid is-valid'); // clear error class
        $('#btnSaveIKU').text('Perbaharui'); //change button text
        //Ajax Load data from ajax
        $.ajax({
            url: '<?= base_url('form/Form2b/edit/') ?>' + id,
            type: "GET",
            async: false,
            dataType: "JSON",
            success: function(data) {
                $('#form_iku_opd [name="id_iku_opd"]').val(data.id);
                $('#form_iku_opd [name="opd_id"]').val(data.opd_id);
                $('#form_iku_opd [name="tahun"]').val(data.tahun);
                $('#form_iku_opd [name="urusan_opd"]').val(data.urusan);
                $('#form_iku_opd [name="target"]').val(data.target);
                $('#form_iku_opd [name="satuan"]').val(data.satuan);
                $('#form_iku_opd [name="iku_opd"]').val(data.iku);
                $('#form_iku_opd [name="atribut"]').val(data.atribut);

                $('[name="prioritas"]').val(data.prioritas).prop('checked', true);

                $('#modal_form_iku_opd').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit IKU OPD'); // Set title to Bootstrap modal title
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Gagal", "Gagal Mendapatkan data", "error");
            }
        });
    }

    function _delete_iku_opd(id, nama) {
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
                    url: '<?= base_url('form/Form2b/delete/') ?>' + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        //if success reload ajax table
                        Swal.fire("Berhasil!", "Data telah di hapus.", "success");
                        reload_iku_opd();
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