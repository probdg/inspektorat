<!--begin::Form Group-->
<div class="form-group">
    <label class="font-size-h6 font-weight-bolder text-dark">
        Tahun Penilaian
    </label>
    <input type="number" min="0" name="tahun" maxlength="4" max="9999" onkeyup="changeTahun(this)" class="form-control h-auto p-3 border-0 rounded-lg font-size-h6 tahun" placeholder="Ketikan Tahun" value="" required />

</div>
<!--end::Form Group-->

<!--begin::Form Group-->
<div class="form-group">
    <label class="font-size-h6 font-weight-bolder text-dark">
        Nama OPD
    </label>
    <input type="text" name="opd" class="form-control h-auto p-3 border-0 rounded-lg font-size-h6 pemda" value="<?= $namaOpd ?>" readonly />
    <input type="text" style="display: none" name="id" value="<?= $idOpd ?>">
    <input type="text" style="display: none" name="id_rpjmd" value="">

</div>
<!--end::Form Group-->

<!--begin::Form Group-->

<div class="form-group">
    <label class="font-size-h6 font-weight-bolder text-dark">
        File di dukung .xls , .xlsx</label>
    <div></div>
    <div class="custom-file">
        <input type="file" accept=".xls,.xlsx" name="fileExcel" class="custom-file-input" id="fileExcel">
        <label class="custom-file-label" for="customFile">Unggah file</label>
    </div>
</div>
<!--end::Form Group-->
<div class="form-group text-right">

    <button id="upload1a" type="button" class="btn btn-warning font-weight-bolder font-size-h6 pl-8 pr-4 py-4 my-3">
        <i class="fas fa-cloud-upload-alt"></i>
        Upload
    </button>
</div>