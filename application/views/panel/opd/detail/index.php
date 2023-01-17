<div class="container container-fluid">
    <div class="card card-custom">
        <div class="card-header">
            <h3 class="card-title">
                <?= $subtitle ?>
            </h3>
            <div class="card-toolbar">
                <div class="example-tools justify-content-center">
                    <a href="<?= base_url('opd') ?>" class="btn btn-danger">Kembali</a>

                    <button type="button" onclick="add()" class="btn btn-success">Tambah</button>
                    <?php $this->load->view('panel/opd/detail/modal'); ?>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <div class="card-body">
            <div class="form-group">
                <label for="level">RPJMD</label>
                <select class="form-control" id="rpjmd" onchange="reload_table()">
                    <?php foreach ($rpjmd as $value) { ?>
                        <option value="<?php echo $value['id'] ?>"><?php echo $value['nama_periode'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <table class="table table-bordered" id="tabel">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA OPD / PEMDA</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

    </div>
</div>