<script>
  var tabel_1b;

  $(document).ready(function() {

    tabel_1b = $('#tabel').DataTable({
      "responsive": true,
      "processing": true, //Feature control the processing indicator.
      "serverSide": true, //Feature control DataTables' server-side processing mode.
      "order": [], //Initial no order.
      // "searching": false,

      // Load data for the table's content from an Ajax source
      "ajax": {
        "url": '<?= base_url('form/SumberData/dat_list') ?>',
        "type": "POST",
        "data": function(data) {
          data.opd = $('[name=id]').val();
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

  function preview1b() {
    $('#modal_print').modal('show')
    $('.modal-title').text('Form 1.b')
    var tahun = $('[name=tahun]').val();
    var id_opd = $('[name=id]').val();
    var id_rpjmd = $('[name=id_rpjmd]').val();
    url = "<?= base_url('form/SumberData/export1b') ?>?tahun=" + tahun + "&id_opd=" + id_opd + "&id_rpjmd=" + id_rpjmd;

    $.ajax({
      type: "get",
      url: url,
      dataType: "html",
      success: function(response) {
        $('.printPreview').html(response)
      }
    });
  }

  function reload_table1b() {
    tabel_1b.ajax.reload(null, false); //reload datatable ajax
  }


  function add() {
    $('#form_sumberdata')[0].reset(); // reset form on modals
    $('.text-danger').empty(); // clear error string
    $('input:text:visible:first', this).focus();
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah'); // Set Title to Bootstrap modal title
    $('#btnSaveSumbeData').text('Simpan'); //change button text
    $('#btnSaveSumbeData').attr('disabled', false);
    $('#btnSaveSumbeData').attr('style', 'display:block');
    $('.tahun').val($('[name=tahun]').val());

  }

  async function edit_sumberdata(id) {

    $('#form_sumberdata')[0].reset(); // reset form on modals
    $('.text-danger').empty(); // clear error string
    $('.form-control').removeClass('is-invalid is-valid'); // clear error class
    $('#btnSaveSumbeData').text('Perbaharui'); //change button text
    //Ajax Load data from ajax
    await $.ajax({
      url: '<?= base_url('form/SumberData/edit/') ?>' + id,
      type: "GET",
      async: false,
      dataType: "JSON",
      success: function(data) {
        $('#form_sumberdata [name="id_sumberdata"]').val(data.id);
        $('[name="opd_id"]').val(data.opd_id);
        $('#form_sumberdata [name="tahun"]').val(data.tahun);
        $('[name="sumberdata"]').val(data.sumberdata);
        $("input[name=nilai][value=" + data.nilai + "]").prop('checked', true);
        $('[name="kelemahan"]').val(data.kelemahan);
        $('[name="klasifikasi"]').val(data.klasifikasi).trigger('change');
        $('[name="sub_klasifikasi"]').val(data.sub_klasifikasi).trigger('change');

        $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
        $('.modal-title').text('Edit Sumber Data'); // Set title to Bootstrap modal title
      },
      error: function(jqXHR, textStatus, errorThrown) {
        Swal.fire("Gagal", "Gagal Mendapatkan data", "error");
      }
    });
  }

  function save_sumberdata() {
    $('#btnSaveSumbeData').text('Menyimpan...'); //change button text
    $('#btnSaveSumbeData').attr('disabled', true); //set button disable
    var url;
    url = '<?= base_url('form/SumberData/save') ?>';
    var formData = new FormData($('#form_sumberdata')[0]);
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
          reload_table1b();
        } else {
          $.each(data.messages, function(key, value) {
            const element = $('#form_sumberdata [name ="' + key + '"]');
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
        $('#btnSaveSumbeData').text('Simpan'); //change button text
        $('#btnSaveSumbeData').attr('disabled', false); //set button enable


      },
      error: function(jqXHR, textStatus, errorThrown) {
        Swal.fire("Error", " Gagal Menyimpan / Update data", "error");
        $('#btnSaveSumbeData').text('Simpan'); //change button text
        $('#btnSaveSumbeData').attr('disabled', false); //set button enable

      }
    });
  }
  const getSubKlasifikasi = (value) => {

    $.ajax({
      type: "post",
      url: "<?= base_url('form/SumberData/getSubKlasifikasi') ?>",
      data: {
        id_master: value,
      },
      async: false,

      dataType: "JSON",
      success: function(res) {
        $('#sub_klasifikasi').html('');
        $('#sub_klasifikasi').append('<option value="">Pilih Sub Klasifikasi</option>')
        no = 0;
        $.each(res, function(i, value) {
          no++;
          $('#sub_klasifikasi').append('<option value="' + value.id + '">' + parseFloat(no) + '. ' + value.question + '</option>')
        });
      }
    });

  }

  function _delete_sumberdata(id, nama) {
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
          url: '<?= base_url('form/SumberData/delete/') ?>' + id,
          type: "POST",
          dataType: "JSON",
          success: function(data) {
            //if success reload ajax table
            Swal.fire("Berhasil!", "Data telah di hapus.", "success");
            reload_table1b();
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