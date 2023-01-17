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
          Nama OPD
      </label>
      <input type="text" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6" value="<?= $namaOpd ?>" readonly />


  </div>
  <!--end::Form Group-->

  <!--begin::Form Group-->
  <div class="form-group">
      <label class="font-size-h6 font-weight-bolder text-dark">
          Tahun Penilaian
      </label>
      <input type="number" maxlength="4" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6 tahun" readonly />
  </div>
  <!--end::Form Group-->

  <!--begin::Form Group-->
  <div class="form-group">
      <label class="font-size-h6 font-weight-bolder text-dark">
          Periode Yang Dinilai
      </label>
      <input type="text" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6 rpjmd" readonly />
  </div>
  <!--end::Form Group-->

  <!--begin::Form Group-->
  <div class="form-group">
      <label class="font-size-h6 font-weight-bolder text-dark">
          Urusan Pemerintah
      </label>
      <select title="Pilih OPD" name="pemdaname2" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6">
          <option selected>Pilih Urusan</option>
          <option>Urusan ...</option>
          <option>Urusan ...</option>
          <option>Urusan lainnya</option>
      </select>
  </div>
  <!--end::Form Group-->

  <table width="100%">
      <thead>
          <tr>
              <th rowspan="3" width="10">No.</th>
              <th rowspan="3">Tujuan/Sasaran Strategis/Program</th>
              <th rowspan="3">Indikator Kinerja</th>
              <th colspan="3">Risiko</th>
              <th colspan="2">Sebab</th>
              <th rowspan="3">C/UC</th>
              <th colspan="2">Dampak</th>
          </tr>
          <tr>
              <th rowspan="2">Uraian</th>
              <th>Kode</th>
              <th rowspan="2">Pemilik</th>
              <th rowspan="2">Uraian</th>
              <th rowspan="2">Sumber</th>
              <th rowspan="2">Uraian</th>
              <th rowspan="2">Pihak Yang Terkena</th>
          </tr>
          <tr>
              <th>Risiko</th>
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
              <th>i</th>
              <th>j</th>
              <th>k</th>
          </tr>

      </thead>
      <tbody>
          <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>
                  <select title="Pilih Sebab Risiko" name="sebab_risiko" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6">
                      <option selected>Pilih Sebab Risiko</option>
                      <option>Man</option>
                      <option>Money</option>
                      <option>Method</option>
                      <option>Machine</option>
                      <option>Material</option>
                  </select>
              </td>
              <td>
                  <select title="Pilih Sumber" name="sumber" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6">
                      <option selected>Pilih Sumber</option>
                      <option>Eksternal</option>
                      <option>Internal</option>
                  </select>
              </td>
              <td>i</td>
              <td>
                  <select title="Pilih Dampak Risiko" name="dampak_risiko" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6">
                      <option selected>Pilih Dampak Risiko</option>
                      <option>Keuangan</option>
                      <option>Kinerja</option>
                      <option>Reputasi</option>
                      <option>Hukum</option>
                  </select>
              </td>
              <td>
                  <input type="text" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6" name="pihak_terkena" placeholder="Ketikan Pihak Terkena" value="" />
              </td>
          </tr>
      </tbody>

  </table>