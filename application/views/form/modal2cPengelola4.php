       <div class="modal fade" id="modal_risk_stakeholder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
           <div class="modal-dialog modal-xl modal-lg modal-dialog-centered" role="document">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel"></h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                   </div>
                   <div class="modal-body">
                       <form id="form_pengelola_stakeholder" novalidate="novalidate" enctype="multipart/form-data">
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
                       </form>
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                       <button type="button" id="btnStakeHolder" onclick="save_stakeholder()" class="btn btn-success">Simpan</button>
                   </div>
               </div>
           </div>
       </div>