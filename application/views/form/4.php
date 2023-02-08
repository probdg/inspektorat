   <div class="form-group text-right">

       <button onclick="preview4()" type="button" class="btn btn-danger font-weight-bolder font-size-h6 pl-8 pr-4 py-4 my-3">
           <i class="far fa-file-pdf"></i>
           Preview Form 4. Hasil Analisis Risiko
       </button>
   </div>
   <!--begin::Form Group-->
   <div class="form-group">
       <label class="font-size-h6 font-weight-bolder text-dark">
           Nama Pemda *
       </label>
       <input type="text" name="pemda" class="form-control h-auto p-3 border-0 rounded-lg font-size-h6 pemda" placeholder="Ketikan Tahun" value="<?= $namaPemda ?>" readonly />

   </div>
   <!--end::Form Group-->

   <!--begin::Form Group-->
   <div class="form-group">
       <label class="font-size-h6 font-weight-bolder text-dark">
           Tahun Penilaian *
       </label>
       <input type="number" maxlength="4" class="form-control h-auto p-3 border-0 rounded-lg font-size-h6 tahun" placeholder="Ketikan Tahun" value="" readonly />
   </div>
   <!--end::Form Group-->
   <div class="row">
       <div class="col-12">
           <?php if ($sess_opd == '56') : ?>
               <table class="table table-bordered" id="tabel_4_pemda">
                   <thead>
                       <tr>
                           <th> NO</th>
                           <th> URAIAN RISIKO </th>
                           <th> KODE RISIKO </th>
                           <th> SKALA DAMPAK </th>
                           <th> SKALA KEMUNGKINAN </th>
                           <th> SKALA RISIKO</th>
                           <th> AKSI </th>
                       </tr>
                   </thead>
                   <tbody>
                   </tbody>
               </table>

           <?php else : ?>
               <table class="table table-bordered" id="tabel_4_opd">
                   <thead>
                       <tr>
                           <th> NO</th>
                           <th> URAIAN RISIKO </th>
                           <th> KODE RISIKO </th>
                           <th> SKALA DAMPAK </th>
                           <th> SKALA KEMUNGKINAN </th>
                           <th> SKALA RISIKO</th>
                           <th> AKSI </th>
                       </tr>
                   </thead>
                   <tbody>
                   </tbody>
               </table>

               <table class="table table-bordered" id="tabel_4_operasional">
                   <thead>
                       <tr>
                           <th> NO</th>
                           <th> URAIAN RISIKO </th>
                           <th> KODE RISIKO </th>
                           <th> SKALA DAMPAK </th>
                           <th> SKALA KEMUNGKINAN </th>
                           <th> SKALA RISIKO</th>
                           <th> AKSI </th>

                       </tr>
                   </thead>
                   <tbody>
                   </tbody>
               </table>
           <?php endif ?>
       </div>
   </div>