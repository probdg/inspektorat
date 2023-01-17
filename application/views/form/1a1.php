 <!--begin::Form Group-->

 <div class="form-group">
     <label class="font-size-h6 font-weight-bolder text-dark">
         Tahun Penilaian
     </label>
     <input type="number" maxlength="4" max="9999" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6 tahun" value="" readonly />

 </div>
 <!--end::Form Group-->

 <!--begin::Form Group-->

 <div class="form-group">
     <label class="font-size-h6 font-weight-bolder text-dark">
         Nama OPD
     </label>
     <input type="text" name="pemda" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6 pemda" value="<?= $namaOpd ?>" readonly />

 </div>
 <!--begin::Form Group-->

 <div class="form-group">
     <label class="font-size-h6 font-weight-bolder text-dark">
         File di dukung .xls</label>
     <div></div>
     <div class="custom-file">
         <input type="file" accept=".xls" class="custom-file-input" id="customFile">
         <label class="custom-file-label" for="customFile">Unggah file</label>
     </div>
 </div>
 <!--end::Form Group-->

 <div class="form-group text-right">

     <button type="button" class="btn btn-dark font-weight-bold font-size-h6">
         Simpan
     </button>
 </div>