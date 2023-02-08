<div class="form-group text-right">
    <button onclick="preview2a()" type="button" class="btn btn-danger font-weight-bolder font-size-h6 pl-8 pr-4 py-4 my-3">
        <i class="far fa-file-pdf"></i>
        Preview Form 2.a Risk Strategis Pemda
    </button>
</div>
<!--begin::Form Group-->
<div class="form-group">
    <label class="font-size-h6 font-weight-bolder text-dark">
        Nama Pemda *
    </label>
    <input type="text" name="pemda" class="form-control h-auto p-3  rounded-lg font-size-h6" value="<?= $namaPemda ?>" readonly />

</div>
<!--end::Form Group-->
<!--begin::Form Group-->
<div class="form-group">
    <label class="font-size-h6 font-weight-bolder text-dark">
        Tahun Penilaian *
    </label>
    <input type="number" maxlength="4" class="form-control h-auto p-3  rounded-lg font-size-h6 tahun" readonly />
</div>
<!--end::Form Group-->
<!--begin::Form Group-->
<div class="form-group">
    <label class="font-size-h6 font-weight-bolder text-dark">
        Periode yang dinilai *
    </label>
    <input type="text" class="form-control h-auto p-3 rounded-lg font-size-h6 rpjmd" value="" readonly />
</div>
<!--end::Form Group-->

<div class="card-footer">
    <div class="form-group row text-right">
        <div class="col-lg-12">
            <button type="button" class="btn btn-dark font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3" onclick="editKomite()"><i class="fa fa-user"></i> Unit Komite Manajemen Risiko</button>
        </div>
    </div>
</div>