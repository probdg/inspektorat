<!--begin::Form Group-->
<div class="form-group">
    <label class="font-size-h6 font-weight-bolder text-dark">
        Nama Pemda
    </label>
    <input type="text" name="pemda" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6 pemda" placeholder="Ketikan Tahun" value="<?= $namaPemda ?>" readonly />

</div>
<!--end::Form Group-->

<!--begin::Form Group-->
<div class="form-group">
    <label class="font-size-h6 font-weight-bolder text-dark">
        Tahun Penilaian
    </label>
    <input type="number" maxlength="4" class="form-control  h-auto p-5 border-0 rounded-lg font-size-h6 tahun" readonly />

</div>
<!--end::Form Group-->

<div class="container-data-pill" id="form-parent">
    <div class="card card-custom example example-compact my-4">
        <div class="card-body">
            <div class="form-group">
                <label>Sumber Data</label>
                <input type="text" class="form-control" placeholder="Ketikan Sumber Data" />
            </div>
            <div class="form-group">
                <label for="exampleTextarea">Uraian
                    Kelemahan</label>
                <textarea class="form-control" id="exampleTextarea" placeholder="Ketikan Uraian Kelemahan" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label>Klasifikasi</label>
                <input type="text" class="form-control" placeholder="Ketikan Klasifikasi" />
            </div>
        </div>
    </div>
</div>


<button type="button" class="btn btn-success w-100 mt-3 mb-3" onclick="addOtherForm();">Tambah
    Data Lainnya</button>

<div class="form-group text-right">
    <button type="button" class="btn btn-dark font-weight-bold font-size-h6">
        Simpan
    </button>
</div>