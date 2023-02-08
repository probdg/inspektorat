<script>
    function preview5() {
        $('.modal-title').text('Form 5. Identifikasi Risiko Strategis Pemerintah Daerah')
        var tahun = $('[name=tahun]').val();
        var id_opd = $('[name=id]').val();
        var id_rpjmd = $('[name=id_rpjmd]').val();
        var urusan = $('[name=urusan_pemda]').val();
        var batas = $('[name=batas]').val();
        if (batas) {
            url = "<?= base_url('form/Form5/export') ?>"
            $.ajax({
                type: "post",
                url: url,
                data: {
                    tahun,
                    id_opd,
                    id_rpjmd,
                    urusan,
                    batas
                },
                dataType: "html",
                success: function(response) {
                    $('#modal_print').modal('show')
                    $('.printPreview').html(response)
                }
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Batas Skala Risiko Terendah Harus Diisi',
            })
        }
    }
</script>