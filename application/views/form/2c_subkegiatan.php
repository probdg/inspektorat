<div class="form-group row text-right">
    <div class="col-lg-12">
        <button onclick="preview2c_subkegiatan()" type="button" class="btn btn-danger font-weight-bolder font-size-h6 pl-8 pr-4 py-4 my-3">
            <i class="far fa-file-pdf"></i>
            Preview Form 2.c Konteks Subkegiatan OPD
        </button>
        <button type="button" class="btn btn-dark font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3" onclick="edit_risiko_operasional_2()"><i class="fa fa-user"></i> Unit Pengelola Sub Kegiatan</button>
        <button type="button" id="btnIKUOpd" class="btn btn-warning font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3" onclick="add_subkegiatan()">
            <i class="flaticon-plus"></i>
            Tambah Kegiatan</button>
        <button type="button" onclick="unduh_kegiatan()" class=" btn btn-success font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3"><i class="fas fa-file-export"></i> Template Risk OPD</button>

    </div>
</div>
<div class="form-group row">
    <label class="font-size-h6 font-weight-bolder text-dark">
        File di dukung .xls , .xlsx</label>
    <div></div>
    <div class="custom-file">
        <input type="file" accept=".xls,.xlsx" name="file2c_subkegiatan" class="custom-file-input" id="file2c_subkegiatan">
        <label class="custom-file-label" for="customFile">Unggah file</label>
    </div>

</div>
<div class="form-group row text-right">
    <div class="col-lg-12">

        <button id="upload2c_subkegiatan" type="button" class="btn btn-warning font-weight-bolder font-size-h6 pl-8 pr-4 py-4 my-3">
            <i class="fas fa-file-import"></i>
            Upload
        </button>

    </div>
</div>
<div class="row">
    <div class="col-12">
        <table class="table table-bordered" id="tabel_2c_subkegiatan">
            <thead>
                <tr>
                    <th> NO</th>
                    <th> KEGIATAN </th>
                    <th> TARGET </th>
                    <th> SATUAN </th>
                    <th> AKSI </th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>