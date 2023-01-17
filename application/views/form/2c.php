    <!--begin::Form Group-->
    <div class="form-group">
        <label class="font-size-h6 font-weight-bolder text-dark">
            Nama Pemda *
        </label>
        <input type="text" name="pemda" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6 pemda" value="<?= $namaPemda ?>" readonly />

    </div>
    <!--end::Form Group-->

    <!--begin::Form Group-->
    <div class="form-group">
        <label class="font-size-h6 font-weight-bolder text-dark">
            Tahun Penilaian *
        </label>
        <input type="number" maxlength="4" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6 tahun" value="" readonly />
    </div>
    <!--end::Form Group-->

    <!--begin::Form Group-->
    <div class="form-group">
        <label class="font-size-h6 font-weight-bolder text-dark">
            Periode yang dinilai *
        </label>
        <input type="text" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6 rpjmd" readonly />
    </div>
    <!--end::Form Group-->
    <!--begin::Form Group-->
    <div class="form-group">
        <label class="font-size-h6 font-weight-bolder text-dark">
            Urusan Pemerintahan *
        </label>
        <input type="text" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6" value="" />
    </div>
    <!--end::Form Group-->

    <!--begin::Form Group-->
    <div class="form-group">
        <label class="font-size-h6 font-weight-bolder text-dark">
            OPD yang dinilai *
        </label>
        <input type="text" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6" value="<?= $namaOpd ?>" readonly />
    </div>
    <!--end::Form Group-->
    <!--begin::Form Group-->
    <div class="form-group">
        <label class="font-size-h6 font-weight-bolder text-dark">
            Sumber Data*
        </label>
        <input type="text" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6 sumber_data" value="" />
    </div>
    <!--end::Form Group-->

    <div class="table-responsive">

        <table>
            <tr>
                <th>Tujuan Strategis</th>
                <th colspan="3" class="tujuan_opd"></th>
            </tr>
            <tr>
                <th>Program OPD (Renja <span class="tahun"></span>) dan Kegiatan Utama</th>
                <th colspan="3"></th>
            </tr>
            <tr>
                <th>IKU Renstra OPD</th>
                <th></th>
                <th>IKU</th>
                <th>Target <span class="tahun"></span></th>
            </tr>
            <tr>
                <th>Program</th>
                <th colspan="3"></th>
            </tr>
            <tr>
                <th>Program, Kegiatan, dan Keluaran/Hasil Kegiatan yang akan dilakukan penilaian risiko</th>
                <th colspan="3">
                    Program ... <br>
                    Kegiatan ...<br>
                    Keluaran/Hasil Kegiatan:<br>
                    1.<br>
                    2.<br>

                </th>
            </tr>
        </table>
    </div>