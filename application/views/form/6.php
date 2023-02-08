   <div class="form-group text-right">

       <button onclick="preview6()" type="button" class="btn btn-danger font-weight-bolder font-size-h6 pl-8 pr-4 py-4 my-3">
           <i class="far fa-file-pdf"></i>
           Preview Form 6.RTP atas CEE
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
   <div class="row">
       <div class="col-12">
           <table style="width:100%" class="table table-bordered display" id="tabel_6">
               <thead>
                   <tr>
                       <th></th>
                       <th>Kondisi Lingkungan Pengendalian yang Kurang Memadai</th>
                       <th>Rencana Tindak Pengendalian Lingkungan Pengendalian</th>
                       <th>Penanggung jawab</th>
                       <th width="80">Target Waktu Penyelesaian</th>
                       <th>Realisasi Penyelesaian</th>
                       <th>Aksi</th>
                   </tr>
               </thead>
               <tbody>
               </tbody>
           </table>
       </div>
   </div>