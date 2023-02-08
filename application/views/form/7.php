   <div class="form-group text-right">

       <button onclick="preview7()" type="button" class="btn btn-danger font-weight-bolder font-size-h6 pl-8 pr-4 py-4 my-3">
           <i class="far fa-file-pdf"></i>
           Preview Form 7. RTP atas Hasil Identifikasi Risiko
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
               <table class="table table-bordered" id="tabel_7_pemda" width="100%">
                   <thead>
                       <tr>
                           <th width="10">No.</th>
                           <th>Risiko Prioritas </th>
                           <th>Kode Risiko</th>
                           <th>Uraian Pengendalian yang Sudah Ada *)</th>
                           <th width="80"> Celah Pengendalian</th>
                           <th> Rencana Tindak Pengendalian</th>
                           <th>Pemilik/ Penangung Jawab</th>
                           <th>Target Waktu Penyelesaian</th>
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
               <table class="table table-bordered" id="tabel_7_opd" width="100%">
                   <thead>
                       <tr>
                           <th width="10">No.</th>
                           <th>Risiko Prioritas </th>
                           <th>Kode Risiko</th>
                           <th>Uraian Pengendalian yang Sudah Ada *)</th>
                           <th width="80"> Celah Pengendalian</th>
                           <th> Rencana Tindak Pengendalian</th>
                           <th>Pemilik/ Penangung Jawab</th>
                           <th>Target Waktu Penyelesaian</th>
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
               <table class="table table-bordered" id="tabel_7_operasional" width="100%">
                   <thead>
                       <tr>
                           <th width="10">No.</th>
                           <th>Risiko Prioritas </th>
                           <th>Kode Risiko</th>
                           <th>Uraian Pengendalian yang Sudah Ada *)</th>
                           <th width="80"> Celah Pengendalian</th>
                           <th> Rencana Tindak Pengendalian</th>
                           <th>Pemilik/ Penangung Jawab</th>
                           <th>Target Waktu Penyelesaian</th>
                           <th>Aksi</th>

                       </tr>
                   </thead>
                   <tbody>
                   </tbody>
               </table>
           </div>
       </div>
   <?php endif ?>