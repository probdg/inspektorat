<script>
    function unduh1a1() {
        var tahun = $('[name=tahun]').val();
        var id_opd = $('[name=id]').val();
        var id_rpjmd = $('[name=id_rpjmd]').val();
        url = "<?= base_url('form/SumberData/export') ?>?tahun=" + tahun + "&id_opd=" + id_opd + "&id_rpjmd=" + id_rpjmd;

        window.open(url, '_blank');
    }

    function preview1a1() {
        $('#modal_print').modal('show')
        $('.modal-title').text('Form 1a.1')
        var tahun = $('[name=tahun]').val();
        var id_opd = $('[name=id]').val();
        var id_rpjmd = $('[name=id_rpjmd]').val();
        url = "<?= base_url('form/SumberData/export') ?>?tahun=" + tahun + "&id_opd=" + id_opd + "&id_rpjmd=" + id_rpjmd;

        $.ajax({
            type: "get",
            url: url,
            dataType: "html",
            success: function(response) {
                $('.printPreview').html(response)
            }
        });
    }
    $('#upload1a').on('click', function() {

        var file_data = $('#fileExcel')[0].files;
        var form = new FormData();
        form.append('fileExcel', file_data[0]);
        form.append('tahun', $('[name=tahun]').val());
        form.append('nama_opd', $('[name=pemda]').val());
        form.append('pemda', 'PEMERINTAH DAERAH KABUPATEN SUMEDANG');
        form.append('id_opd', $('[name=id]').val());
        form.append('rpjmd', $('[name=id_rpjmd]').val());
        $.ajax({
            "url": "<?= base_url('home/import') ?>",
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
                    if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        console.log(persentComplete)
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
                console.log('berhasil')
            },
            success: function(obj) {
                myJson = JSON.parse(obj);

                if (myJson.status) {
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('home/loadResponden') ?>",
                        data: {
                            tahun: $('[name=tahun]').val(),
                            id_opd: $('[name=id]').val()
                        },
                        dataType: "html",
                        success: function(response) {
                            $('#responden').html(response);
                            KTApp.unblock('#kt_content');
                            toastr.success(myJson.message);
                        }
                    });
                } else {
                    KTApp.unblock('#kt_content');

                    toastr.error(myJson.message);
                }
            }
        });
    });
</script>