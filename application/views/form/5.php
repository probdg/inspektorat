   <div class="form-group text-right">

       <button onclick="preview5()" type="button" class="btn btn-danger font-weight-bolder font-size-h6 pl-8 pr-4 py-4 my-3">
           <i class="far fa-file-pdf"></i>
           Preview Form 5. Hasil Analisis Risiko
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
       <input type="number" maxlength="4" class="form-control h-auto p-3 border-0 rounded-lg font-size-h6 tahun" readonly />
   </div>
   <!--end::Form Group-->
   <!--begin::Form Group-->
   <div class="form-group">
       <label class="font-size-h6 font-weight-bolder text-dark">
           Batas Skala Risiko Terendah *
       </label>
       <input type="number" maxlength="4" max='25' min='0' class="form-control h-auto p-3 border-0 rounded-lg font-size-h6" name="batas" value="4" <?php if ($sess_opd != 56) : ?> readonly <?php endif ?> />
   </div>
   <!--end::Form Group-->