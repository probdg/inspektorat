<div class="card-header align-items-center  mt-4">
    <h3 class="card-title align-items-start flex-column">
        Tujuan, Sasaran, IKU dan Program yang akan dilakukan penilaian risiko
    </h3>
</div>


<div class="card-body">
    <input type="text" id="id_iku" style="display: none;">
    <!--begin::Form Group-->
    <div class="form-group">
        <label class="font-size-h6 font-weight-bolder text-dark">
            TUJUAN *
        </label>
        <select class="form-control" id="select_tujuan_pemda" onchange="getSasaran(this.value)">
        </select>
    </div>
    <!--end::Form Group-->

    <!--begin::Form Group-->
    <div class="form-group">
        <label class="font-size-h6 font-weight-bolder text-dark">
            SASARAN *
        </label>
        <select class="form-control" id="select_sasaran_pemda">

        </select>
    </div>
    <!--end::Form Group-->

    <!--begin::Form Group-->
    <div class="form-group">
        <label class="font-size-h6 font-weight-bolder text-dark">
            NAMA IKU *
        </label>
        <div class="form-group row">
            <div class="col-lg-12 mb-5">
                <textarea type="text" id="iku" class="form-control h-auto p-3  rounded-lg font-size-h6" placeholder="Ketikan IKU"></textarea>
            </div>
        </div>
    </div>
    <!--end::Form Group-->
    <!--begin::Form Group-->
    <div class="form-group">
        <label class="font-size-h6 font-weight-bolder text-dark">
            SATUAN IKU *
        </label>
        <div class="form-group row">
            <div class="col-lg-6">
                <input type="text" id="satuan" class="form-control h-auto p-3  rounded-lg font-size-h6" placeholder="Ketikan Satuan contoh : poin , persen ,tahun">
            </div>
        </div>
    </div>
    <!--end::Form Group-->
    <!--begin::Form Group-->
    <div class="form-group">
        <label class="font-size-h6 font-weight-bolder text-dark">
            IKU *
        </label>
        <div class="form-group row">
            <div class="col-lg-6">
                <input type="text" id="target" class="form-control h-auto p-3  rounded-lg font-size-h6" placeholder="Ketikan Target contoh : 90 , 82,88">
            </div>
        </div>
    </div>
    <!--end::Form Group-->
    <!--begin::Form Group-->
    <div class="form-group">
        <label class="font-size-h6 font-weight-bolder text-dark">
            ATRIBUT IKU *
        </label>
        <div class="form-group row">
            <div class="col-lg-6">
                <input type="text" id="atribut" class="form-control h-auto p-3  rounded-lg font-size-h6" placeholder="Ketikan atribut contoh : point , persen">
            </div>
        </div>
    </div>
    <!--end::Form Group-->
</div>
<div class="card-footer">
    <div class="form-group row text-right">
        <div class="col-lg-12">
            <button type="button" id="btnIKU" class="btn btn-warning font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3" onclick="addIkuPemda()">
                <i class="flaticon-plus"></i>
                Tambah IKU</button>
        </div>
    </div>
    <table class="table table-bordered" id="tabel_2a">
        <thead>
            <tr>
                <th> TUJUAN </th>
                <th> SASARAN </th>
                <th> IKU </th>
                <th> SATUAN </th>
                <th> NILAI </th>
                <th> AKSI </th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>