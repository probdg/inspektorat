<!--begin::Form Group-->
<div class="form-group">
    <label class="font-size-h6 font-weight-bolder text-dark">
        Nama Pemda *
    </label>
    <input type="text" name="pemda" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6 pemda" placeholder="Ketikan Tahun" value="<?= $namaPemda ?>" readonly />

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
        Tujuan Strategis *
    </label>
    <span class="tujuan"></span>
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


<table width="100%">
    <thead>
        <tr>
            <th>NO</th>
            <th>Risiko Priorttas</th>
            <th>Kode Risiko</th>
            <th>Skala Dampak *)</th>
            <th>Skala Kemungkinan *)</th>
            <th>Skala Risiko</th>
            <th>Penyebab</th>
            <th>Dampak</th>
        </tr>
        <tr>
            <td>a</td>
            <td>b</td>
            <td>c</td>
            <td>d</td>
            <td>e</td>
            <td>f</td>
            <td>g</td>
            <td>h</td>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>