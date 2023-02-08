       <div class="modal fade" id="modal_risk_operasional_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
           <div class="modal-dialog modal-xl modal-lg modal-dialog-centered" role="document">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel"></h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                   </div>
                   <div class="modal-body">
                       <form id="form_pengelola_operasional_2" novalidate="novalidate" enctype="multipart/form-data">
                           <input type="text" style="display: none" name="unit" id="unit">
                           <!--begin::Form Group-->
                           <div class="form-group row">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                                   Penanggung Jawab *
                               </label>
                               <div class="col-lg-4">
                                   <input type="text" name="jabatan_pj" id="jabatan_pj" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                               </div>
                               <div class="col-lg-4">
                                   <input type="text" name="nama_pj" id="nama_pj" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                               </div>
                               <div class="col-lg-4">
                                   <input type="text" name="nip_pj" id="nip_pj" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                               </div>
                           </div>
                           <!--end::Form Group-->
                           <!--begin::Form Group-->
                           <div class="form-group row">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                                   Ketua
                               </label>

                               <div class="col-lg-4">
                                   <input type="text" name="jabatan_ketua" id="jabatan_ketua" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                               </div>
                               <div class="col-lg-4">
                                   <input type="text" name="nama_ketua" id="nama_ketua" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                               </div>
                               <div class="col-lg-4">
                                   <input type="text" name="nip_ketua" id="nip_ketua" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                               </div>
                           </div>
                           <!--end::Form Group-->
                           <!--begin::Form Group-->
                           <div class="form-group row">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                                   Pengelola Risiko *
                               </label>
                               <div class="col-lg-4">
                                   <input type="text" name="jabatan_pengelola" id="jabatan_pengelola" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                               </div>
                               <div class="col-lg-4">
                                   <input type="text" name="nama_pengelola" id="nama_pengelola" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                               </div>
                               <div class="col-lg-4">
                                   <input type="text" name="nip_pengelola" id="nip_pengelola" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                               </div>
                           </div>
                           <!--end::Form Group-->
                           <div id="anggota_sop_2"></div>

                       </form>
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                       <button type="button" id="btnSaveSop2" onclick="save_sop_2()" class="btn btn-success">Simpan</button>
                   </div>
               </div>
           </div>
       </div>