<div class="container container-fluid">
    <div class="card card-custom">
        <div class="card-header">
            <h3 class="card-title">
                RPJMD
            </h3>
            <div class="card-toolbar">
                <div class="example-tools justify-content-center">
                    <button type="button" onclick="add()" class="btn btn-success">Tambah</button>
                    <?php $this->load->view('panel/tujuan/modal'); ?>
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
                        <th>TUJUAN STRATEGIS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

    </div>
</div>