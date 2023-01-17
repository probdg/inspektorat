    <!--begin::Form Group-->
    <div class="form-group">
        <label class="font-size-h6 font-weight-bolder text-dark">
            Nama Pemda
        </label>
        <input type="text" name="pemda" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6 pemda" value="<?= $namaPemda ?>" readonly />

    </div>
    <!--end::Form Group-->

    <!--begin::Form Group-->
    <div class="form-group">
        <label class="font-size-h6 font-weight-bolder text-dark">
            Tahun Penilaian
        </label>
        <input type="number" maxlength="4" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6 tahun" value="" readonly />
    </div>
    <!--end::Form Group-->

    <table>
        <thead>
            <tr>
                <th rowspan="2" width="10">No.</th>
                <th rowspan="2">Sub Unsur</th>
                <th colspan="2">Hasil Reviu Dokumen</th>
                <th colspan="2">Hasil Survei Persepsi</th>
                <th rowspan="2" width="80">Simpulan</th>
                <th rowspan="2">Penjelasan</th>
            </tr>
            <tr>
                <th width="40">Hasil</th>
                <th>Uraian</th>
                <th width="40">Hasil</th>
                <th>Uraian</th>
            </tr>
            <tr>
                <th>a</th>
                <th>b</th>
                <th>c</th>
                <th>d</th>
                <th>e</th>
                <th>f</th>
                <th>g</th>
                <th>h</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($m1 as $m1) : ?>
                <tr>
                    <td align="center"><?= str_to_number($m1['urutan']); ?></td>
                    <td><?= $m1['question'] ?></td>
                    <td>&nbsp;</td>
                    <td>
                        <div class="form-group mb-0">
                            <textarea class="form-control w-100" placeholder="Ketikan Uraian" rows="3"></textarea>
                        </div>
                    </td>
                    <td>&nbsp;</td>
                    <td>
                        <div class="form-group mb-0">
                            <textarea class="form-control w-100" placeholder="Ketikan Uraian" rows="3"></textarea>
                        </div>
                    </td>
                    <td>
                        <div class="form-group mb-0">
                            <textarea class="form-control w-100" placeholder="Simpulan" rows="3"></textarea>
                        </div>
                    </td>
                    <td>
                        <div class="form-group mb-0">
                            <textarea class="form-control w-100" placeholder="Penjelasan" rows="3"></textarea>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>