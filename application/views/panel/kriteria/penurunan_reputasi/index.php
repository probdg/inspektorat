<div class="container container-fluid">
    <div class="card card-custom">
        <div class="card-header">
            <h3 class="card-title">
                <?= $subtitle ?>

            </h3>
            <div class="card-toolbar">
                <div class="example-tools justify-content-center">
                    <button type="button" onclick="add()" class="btn btn-success">Tambah</button>
                    <?php $this->load->view('panel/kriteria/penurunan_reputasi/modal'); ?>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <div class="card-body">
            <table class="table table-bordered" id="tabel">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>REG</th>
                        <th>LEVEL DAMPAK</th>
                        <th>PENURUNAN REPUTASI</th>
                        <th>KETERANGAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

    </div>
</div>