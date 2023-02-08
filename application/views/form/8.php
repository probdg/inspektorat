     <div class="form-group text-right">
         <button onclick="preview8()" type="button" class="btn btn-danger font-weight-bolder font-size-h6 pl-8 pr-4 py-4 my-3">
             <i class="far fa-file-pdf"></i>
             Preview Form 8. Pengkomunikasian Pengendalian Yang Dibangun
         </button>
     </div>

     <!--begin::Form Group-->
     <div class="form-group">
         <label class="font-size-h6 font-weight-bolder text-dark">
             Nama Pemda
         </label>
         <input type="text" name="pemda" class="form-control h-auto p-3 border-0 rounded-lg font-size-h6 pemda" placeholder="Ketikan Tahun" value="<?= $namaPemda ?>" readonly />

     </div>
     <!--end::Form Group-->

     <!--begin::Form Group-->
     <div class="form-group">
         <label class="font-size-h6 font-weight-bolder text-dark">
             Tahun Penilaian
         </label>
         <input type="number" maxlength="4" class="form-control h-auto p-3 border-0 rounded-lg font-size-h6 tahun" placeholder="Ketikan Tahun" value="" readonly />
     </div>
     <!--end::Form Group-->

     <?php if ($sess_opd == '56') : ?>
         <div class="form-group row text-right">
             <div class="col-lg-12">
                 <button type="button" class="btn btn-warning font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3" onclick="addKomunikasiPemda()">
                     <i class="flaticon-plus"></i>
                     Tambah </button>
             </div>
         </div>

         <div class="row">
             <div class="col-12">
                 <table class="table table-bordered" id="tabel_8_pemda" width="100%">
                     <thead>
                         <tr>
                             <th width="10">No.</th>
                             <th>Risiko Prioritas </th>
                             <th>Kode Risiko</th>
                             <th>Kegiatan Pengendalian yang Dibutuhkan </th>
                             <th>Media/Bentuk Sarana Pengkomunikasian</th>
                             <th>Penyedia Informasi</th>
                             <th>Penerima Informasi</th>
                             <th>Rencana Waktu Pelaksanaan</th>
                             <th>Realisasi Waktu Pelaksanaan</th>
                             <th>Keterangan</th>
                             <th>Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                     </tbody>
                 </table>
             </div>
         </div>
     <?php else : ?>
         <div class="form-group row text-right">
             <div class="col-lg-12">
                 <button type="button" class="btn btn-warning font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3" onclick="addKomunikasiOpd()">
                     <i class="flaticon-plus"></i>
                     Tambah OPD </button>
             </div>
         </div>
         <div class="row">
             <div class="col-12">
                 <table class="table table-bordered" id="tabel_8_opd" width="100%">
                     <thead>
                         <tr>
                             <th width="10">No.</th>
                             <th>Risiko Prioritas </th>
                             <th>Kode Risiko</th>
                             <th>Kegiatan Pengendalian yang Dibutuhkan </th>
                             <th>Media/Bentuk Sarana Pengkomunikasian</th>
                             <th>Penyedia Informasi</th>
                             <th>Penerima Informasi</th>
                             <th>Rencana Waktu Pelaksanaan</th>
                             <th>Realisasi Waktu Pelaksanaan</th>
                             <th>Keterangan</th>
                             <th>Aksi</th>

                         </tr>
                     </thead>
                     <tbody>
                     </tbody>
                 </table>
             </div>
         </div>
         <div class="form-group row text-right">
             <div class="col-lg-12">
                 <button type="button" class="btn btn-warning font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3" onclick="addKomunikasiOperasional()">
                     <i class="flaticon-plus"></i>
                     Tambah Operasional</button>
             </div>
         </div>
         <div class="row">
             <div class="col-12">
                 <table class="table table-bordered" id="tabel_8_operasional" width="100%">
                     <thead>
                         <tr>
                             <th width="10">No.</th>
                             <th>Risiko Prioritas </th>
                             <th>Kode Risiko</th>
                             <th>Kegiatan Pengendalian yang Dibutuhkan </th>
                             <th>Media/Bentuk Sarana Pengkomunikasian</th>
                             <th>Penyedia Informasi</th>
                             <th>Penerima Informasi</th>
                             <th>Rencana Waktu Pelaksanaan</th>
                             <th>Realisasi Waktu Pelaksanaan</th>
                             <th>Keterangan</th>
                             <th data-priority="1">Aksi</th>

                         </tr>
                     </thead>
                     <tbody>
                     </tbody>
                 </table>
             </div>
         </div>
     <?php endif ?>