  <div class="form-group text-right">

      <button onclick="preview3c()" type="button" class="btn btn-danger font-weight-bolder font-size-h6 pl-8 pr-4 py-4 my-3">
          <i class="far fa-file-pdf"></i>
          Preview Form 3.c Identifikasi Risiko Operasional OPD
      </button>
  </div>
  <!--begin::Form Group-->
  <div class="form-group">
      <label class="font-size-h6 font-weight-bolder text-dark">
          Nama Pemda
      </label>
      <input type="text" name="pemda" class="form-control h-auto p-3 border-0 rounded-lg font-size-h6 pemda" value="<?= $namaPemda ?>" readonly />

  </div>
  <!--end::Form Group-->

  <!--begin::Form Group-->
  <div class="form-group">
      <label class="font-size-h6 font-weight-bolder text-dark">
          Nama OPD
      </label>
      <input type="text" class="form-control h-auto p-3 border-0 rounded-lg font-size-h6" value="<?= $namaOpd ?>" readonly />
  </div>
  <!--end::Form Group-->

  <!--begin::Form Group-->
  <div class="form-group">
      <label class="font-size-h6 font-weight-bolder text-dark">
          Tahun Penilaian
      </label>
      <input type="number" maxlength="4" class="form-control h-auto p-3 border-0 rounded-lg font-size-h6 tahun" readonly>
  </div>
  <!--end::Form Group-->

  <!--begin::Form Group-->
  <div class="form-group">
      <label class="font-size-h6 font-weight-bolder text-dark">
          Periode Yang Dinilai
      </label>
      <input type="text" class="form-control h-auto p-3 border-0 rounded-lg font-size-h6 rpjmd" readonly />

  </div>
  <!--end::Form Group-->
  <div class="form-group row text-right">
      <div class="col-lg-12">
          <button type="button" class="btn btn-warning font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3" onclick="addRiskOperasional()">
              <i class="flaticon-plus"></i>
              Tambah Indikator</button>
      </div>
  </div>
  <div class="row">
      <div class="col-12">
          <table class="table table-bordered" id="tabel_3c">
              <thead>
                  <tr>
                      <th> NO</th>
                      <th> KEGIATAN </th>
                      <th> INDIKATOR </th>
                      <th> TAHAPAN </th>
                      <th> URAIAN RISIKO </th>
                      <th> KODE RISIKO </th>
                      <th> PEMILIK </th>
                      <th> SEBAB </th>
                      <th> SUMBER </th>
                      <th> KENDALI RISIKO </th>
                      <th> DAMPAK </th>
                      <th> PIHAK TERKENA </th>
                      <th> AKSI </th>

                  </tr>
              </thead>
              <tbody>
              </tbody>
          </table>
      </div>
  </div>