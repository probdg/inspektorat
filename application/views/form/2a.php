    <!--begin::Form Group-->
    <div class="form-group">
        <label class="font-size-h6 font-weight-bolder text-dark">
            Nama Pemda *
        </label>
        <input type="text" name="pemda" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6" value="<?= $namaPemda ?>" readonly />

    </div>
    <!--end::Form Group-->

    <!--begin::Form Group-->
    <div class="form-group">
        <label class="font-size-h6 font-weight-bolder text-dark">
            Tahun Penilaian *
        </label>
        <input type="number" maxlength="4" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6 tahun" readonly />
    </div>
    <!--end::Form Group-->

    <!--begin::Form Group-->
    <div class="form-group">
        <label class="font-size-h6 font-weight-bolder text-dark">
            Periode Yang Dinilai
        </label>
        <input type="text" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6 rpjmd" value="" readonly />

    </div>
    <!--end::Form Group-->

    <!--begin::Form Group-->
    <div class="form-group">
        <label class="font-size-h6 font-weight-bolder text-dark">
            Sumber Data *
        </label>
        <input type="text" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6" />
    </div>
    <!--end::Form Group-->


    <table style="width:100%">
        <tr>
            <th>Visi * </th>
            <th></th>
        </tr>
        <tr>
            <th>Misi Strategis RPJMD</th>
            <th class="misi"></th>
        </tr>
        <tr>
            <th>Penetapan konteks Misi Risiko Strategis Pemda</th>
            <th></th>
        </tr>
        <tr>
            <th>Tujuan Strategis RPJMD</th>
            <th class="tujuan"></th>
        </tr>
        <tr>
            <th>Penetapan Konteks Tujuan Risiko Strategis Pemda</th>
            <th></th>
        </tr>
        <tr>
            <th>Sasaran RPJMD</th>
            <th class="sasaran"></th>
        </tr>
        <tr>
            <th>Penetapan Konteks Sasaran Risiko Strategis Pemda</th>
            <th></th>
        </tr>
        <tr>
            <th>IKU Sasaran RPJMD</th>
            <th></th>
        </tr>
        <tr>
            <th>Penetapan Konteks IKU Risiko Strategis Pemda</th>
            <th></th>
        </tr>
        <tr>
            <th>Prioritas pembangunan dan program unggulan</th>
            <th></th>
        </tr>
        <tr>
            <th>Urusan Pemerintahan Daerah</th>
            <th></th>
        </tr>
        <tr>
            <th>Nama Dinas Terkait</th>
            <th></th>
        </tr>
        <tr>
            <th>Tujuan, Sasaran, IKU dan Program yang akan dilakukan penilaian risiko</th>
            <th>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Tujuan</label>
                            <textarea type="text" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6"></textarea>
                        </div>
                        <div class="form-group">

                            <label> Sasaran</label>
                            <textarea type="text" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6"></textarea>
                        </div>
                        <div class="form-group">

                            <label> IKU</label>
                            <textarea type="text" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6"></textarea>
                        </div>
                        <div class="form-group">

                            <label> Program</label>
                            <textarea type="text" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6"></textarea>
                        </div>
                    </div>

            </th>
        </tr>
    </table>