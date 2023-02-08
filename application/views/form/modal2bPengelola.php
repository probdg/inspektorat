       <div class="modal fade" id="modal_form_risk_strategis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
           <div class="modal-dialog modal-xl modal-lg modal-dialog-centered" role="document">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel"></h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                   </div>
                   <div class="modal-body">
                       <form id="form_pengelola_strategis" novalidate="novalidate" enctype="multipart/form-data">

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
                                   KEPALA BIDANG / KEPALA BAGIAN / KEPALA SEKSI 1 *
                               </label>
                               <div class="col-lg-3">
                                   <input type="text" name="bidang_kepala" id="bidang_kepala" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Bidang">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="jabatan_kepala" id="jabatan_kepala" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="nama_kepala" id="nama_kepala" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="nip_kepala" id="nip_kepala" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                               </div>
                           </div>
                           <!--end::Form Group-->
                           <!--begin::Form Group-->
                           <div class="form-group row">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                                   KEPALA BIDANG / KEPALA BAGIAN / KEPALA SEKSI 2*
                               </label>
                               <div class="col-lg-3">
                                   <input type="text" name="bidang_kepala_2" id="bidang_kepala_2" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Bidang">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="jabatan_kepala_2" id="jabatan_kepala_2" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="nama_kepala_2" id="nama_kepala_2" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="nip_kepala_2" id="nip_kepala_2" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                               </div>
                           </div>
                           <!--end::Form Group-->
                           <!--begin::Form Group-->
                           <div class="form-group row">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                                   STAF BIDANG *
                               </label>
                               <div class="col-lg-3">
                                   <input type="text" name="bidang_staff" id="bidang_staff" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Bidang">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="jabatan_staff" id="jabatan_staff" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="nama_staff" id="nama_staff" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="nip_staff" id="nip_staff" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                               </div>
                           </div>
                           <!--end::Form Group-->


                           <div id="anggota"></div>

                       </form>
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                       <button type="button" id="btnRiskOpd" onclick="save_risk_opd()" class="btn btn-success">Simpan</button>
                   </div>
               </div>
           </div>
       </div>