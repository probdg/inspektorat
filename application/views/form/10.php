         <div class="form-group text-right">
             <button onclick="preview10()" type="button" class="btn btn-danger font-weight-bolder font-size-h6 pl-8 pr-4 py-4 my-3">
                 <i class="far fa-file-pdf"></i>
                 Preview Form 10. Pencatatan Kejadian Risiko (Risk Event) Dan RTP
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
         <!--begin::Form Group-->
         <div class="form-group">
             <label class="font-size-h6 font-weight-bolder text-dark">
                 Urusan Pemerintahan *
             </label>
             <input type="text" class="form-control h-auto p-3 border-0 rounded-lg font-size-h6 urusan" />
         </div>
         <?php if ($sess_opd == '56') : ?>

             <table class="table table-bordered" id="tabel_10_pemda">
                 <thead>
                     <tr>
                         <th width="10">No.</th>
                         <th>Risiko Prioritas </th>
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
             <table class="table table-bordered" id="tabel_10_opd">
                 <thead>
                     <tr>
                         <th width="10">No.</th>
                         <th>Risiko Prioritas </th>
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
             <table class="table table-bordered" id="tabel_10_operasional">
                 <thead>
                     <tr>
                         <th width="10">No.</th>
                         <th>Risiko Prioritas </th>
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
         <?php else : ?>
             <table class="table table-bordered" id="tabel_10_opd">
                 <thead>
                     <tr>
                         <th width="10">No.</th>
                         <th>Risiko Prioritas </th>
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
             <table class="table table-bordered" id="tabel_10_operasional">
                 <thead>
                     <tr>
                         <th width="10">No.</th>
                         <th>Risiko Prioritas </th>
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
         <?php endif ?>