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
    <div class="table-responsive">

        <table>
            <thead>
                <tr>
                    <th width="10">No.</th>
                    <th>Kondisi Lingkungan Pengendalian yang Kurang Memadai</th>
                    <th>Rencana Tindak Pengendalian Lingkungan Pengendalian</th>
                    <th>Penanggung jawab</th>
                    <th width="80">Target Waktu Penyelesaian</th>
                    <th>Realisasi Penyelesaian</th>
                </tr>
                <tr>
                    <th>a</th>
                    <th>b</th>
                    <th>c</th>
                    <th>d</th>
                    <th>e</th>
                    <th>f</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($f1a as $f1a) : ?>
                    <tr>
                        <th align="center"><?= getRomawi($f1a['urutan']); ?></th>
                        <th colspan="7"><?= $f1a['question'] ?></th>
                    </tr>
                    <?php $no = 1;
                    foreach ($f1a['detail'] as $detail) : ?>
                        <tr>
                            <th align="right"><?= $no++ ?></th>
                            <th><?= $detail['question'] ?></th>
                            <th>
                                <div class="form-group mb-0">
                                    <textarea class="form-control w-100" placeholder="Penjelasan" rows="3"></textarea>
                                </div>
                            </th>
                            <th>
                                <div class="form-group mb-0">
                                    <textarea class="form-control w-100" placeholder="Penjelasan" rows="3"></textarea>
                                </div>
                            </th>
                            <th>
                                <div class="form-group mb-0">
                                    <textarea class="form-control w-100" placeholder="Penjelasan" rows="3"></textarea>
                                </div>
                            </th>
                            <th>
                                <div class="form-group mb-0">
                                    <textarea class="form-control w-100" placeholder="Penjelasan" rows="3"></textarea>
                                </div>
                            </th>
                        </tr>
                    <?php endforeach ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>