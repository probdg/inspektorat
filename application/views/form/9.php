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
        <input type="number" maxlength="4" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6 tahun" placeholder="Ketikan Tahun" value="" readonly />
    </div>
    <!--end::Form Group-->
    <!--begin::Form Group-->
    <div class="form-group">
        <label class="font-size-h6 font-weight-bolder text-dark">
            Tujuan Strategis
        </label>
        <span class="tujuan_opd"></span>
    </div>
    <!--end::Form Group-->
    <!--begin::Form Group-->
    <div class="form-group">
        <label class="font-size-h6 font-weight-bolder text-dark">
            Urusan Pemerintahan *
        </label>
        <input type="text" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6" />
    </div>
    <!--end::Form Group-->
    <div class="table-responsive">


        <table>
            <thead>
                <tr>
                    <th width="10">No.</th>
                    <th>Kegiatan Pengendalian yang Dibutuhkan </th>
                    <th>Bentuk/Metode Pemantauan yang Diperlukan</th>
                    <th>Penanggung Jawab Pemantauan</th>
                    <th>Rencana Waktu Pelaksanaan Pemantauan</th>
                    <th>Realisasi Waktu Pelaksanaan</th>
                    <th>Keterangan</th>
                </tr>
                <tr>
                    <th>a</th>
                    <th>b</th>
                    <th>c</th>
                    <th>d</th>
                    <th>e</th>
                    <th>f</th>
                    <th>g</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>