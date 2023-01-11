<div class="row">
    <div class="col-sm-12">

        <div class="box box-success box-solid">
            <div class="box-header with-border ">

                <div class="box-tools pull-right">
                    <h4>
                        <a href="<?= base_url('mapel/list'); ?>" class="font-weight-bold text-white" data-toggle="modal" data-target="#modal-default"><i class="fa fa-fw fa-plus"></i>Mapel</a>
                    </h4>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->

            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

            <div class="box-body">
                <!-- awal content tabel -->
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered" id="example1" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="40px">No</th>
                                <th>Nama mata pelajaran</th>
                                <th>Kode mata pelajaran</th>
                                <th width="70px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($mapel as $value) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $value->nama_mapel; ?></td>
                                    <td><?= $value->kode_mapel; ?></td>
                                    <td>


                                        <button type class="btn btn-xs btn-success" onclick="edit('<?= $value->id_mapel ?>')"><i class="fa fa-pencil"></i></button>

                                        <a class="btn btn-xs btn-danger" type="button" onclick="hapus()"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <!-- </div>
            </div> -->

                    <!-- akhir content tabel -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
    </div>
</div>




<!-- awal modal add -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah mapel</h4>
            </div>
            <div class="modal-body">

                <?php
                echo form_open('u/mapel/add'); ?>

                <!-- awal isi modal -->
                <div class="col-sm">
                    <div class="form-group">
                        <input type="text" name="nama_mapel" class="form-control" placeholder="Nama mapel">
                        <?= form_error('nama_mapel', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="kode_mapel" class="form-control" placeholder="Nama kode mapel">
                        <?= form_error('kode_mapel', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                </div>
                <!-- akhir isi modal -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning pull-left" href=" <?= base_url('target') ?>" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- akhir modal add -->


<!-- awal modal edit -->


<div class="modal fade" id="modal-defaultedit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Mapel</h4>
            </div>
            <div class="modal-body">

                <?php echo form_open('u/mapel/edit'); ?>

                <!-- awal isi modal -->
                <input type="hidden" id="id_mapel" name="id_mapel" value>

                <div class="col-sm">
                    <label for="nama_mapel">Nama mapel</label>
                    <div class="form-group">
                        <input type="text" name="nama_mapel" value="" class="form-control">
                        <?= form_error('nama_mapel', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                </div>
                <div class="col-sm">
                    <label for="kode_mapel">kode mapel</label>
                    <div class="form-group">
                        <input type="text" name="kode_mapel" value="" class="form-control">
                        <?= form_error('kode_mapel', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                </div>


                <!-- akhir isi modal -->

            </div>
            <div class=" modal-footer">
                <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            <?= form_close(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- akhir modal edit -->

<script>
    function edit(id) {

        $('#form_edit')[0].reset();
        $.ajax({
            type: "POST",
            url: "<?= base_url('u/mapel/json') ?>",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function(response) {
                $('#modal-defaultedit').modal('show');
                $('#id_mapel').val(response.id_mapel);
                $('#nama_mapel').val(response.nama_mapel);
                $('#kode_mapel').val(response.kode_mapel);

            }
        });
    }

    function hapus(id) {
        Swal.fire({
            title: 'Hapus data?',
            text: "Anda yakin menghapus file?",
            icon: 'question',
            showCancelButton: true,
            // confirmButtonColor: '#3085d6',
            // cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya, Hapus Data !'
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = '<?= base_url('u/mapel/delete/') ?>' + id;
            } else {
                Swal.fire(
                    'Dibatalkan!',
                    'Batal hapus',
                    'error'
                )
            }
        })

    }
</script>