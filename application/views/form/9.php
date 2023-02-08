         <div class="form-group text-right">
             <button onclick="preview9()" type="button" class="btn btn-danger font-weight-bolder font-size-h6 pl-8 pr-4 py-4 my-3">
                 <i class="far fa-file-pdf"></i>
                 Preview Form 9. Rancangan Pemantauan Atas Pengendalian Intern
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
             <div class="row">
                 <div class="col-12">
                     <table class="table table-bordered" id="tabel_9_pemda" width="100%">
                         <thead>
                             <tr>
                                 <th width="10">No.</th>

                                 <th>Risiko Prioritas </th>
                                 <th>Kode Risiko </th>
                                 <th>Kegiatan Pengendalian yang Dibutuhkan </th>
                                 <th>Bentuk/Metode Pemantauan yang Diperlukan</th>
                                 <th>Penanggung Jawab Pemantauan</th>
                                 <th>Rencana Waktu Pelaksanaan Pemantauan</th>
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
             <div class="row">
                 <div class="col-12">
                     <table class="table table-bordered" id="tabel_9_opd" width="100%">
                         <thead>
                             <tr>
                                 <th width="10">No.</th>
                                 <th>Risiko Prioritas </th>
                                 <th>Kode Risiko </th>
                                 <th>Kegiatan Pengendalian yang Dibutuhkan </th>
                                 <th>Bentuk/Metode Pemantauan yang Diperlukan</th>
                                 <th>Penanggung Jawab Pemantauan</th>
                                 <th>Rencana Waktu Pelaksanaan Pemantauan</th>
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
             <div class="row">
                 <div class="col-12">
                     <table class="table table-bordered" id="tabel_9_operasional" width="100%">
                         <thead>
                             <tr>
                                 <th width="10">No.</th>
                                 <th>Risiko Prioritas </th>
                                 <th>Kode Risiko </th>
                                 <th>Kegiatan Pengendalian yang Dibutuhkan </th>
                                 <th>Bentuk/Metode Pemantauan yang Diperlukan</th>
                                 <th>Penanggung Jawab Pemantauan</th>
                                 <th>Rencana Waktu Pelaksanaan Pemantauan</th>
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
         <?php endif ?>