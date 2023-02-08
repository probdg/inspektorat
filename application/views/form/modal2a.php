       <div class="modal fade" id="modal_form_komite" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
           <div class="modal-dialog modal-xl modal-lg modal-dialog-centered" role="document">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel"></h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                   </div>
                   <div class="modal-body">
                       <form id="form_komite" novalidate="novalidate" enctype="multipart/form-data">

                           <!--begin::Form Group-->
                           <div class="form-group row">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12">
                                   Sumber Data *
                               </label>
                               <div class="col-12">
                                   <input type="text" name="sumber_data_2a" id="sumber_data_2a" class="form-control h-auto p-2 rounded-lg font-size-h6" />
                               </div>
                           </div>
                           <!--end::Form Group-->
                           <!--begin::Form Group-->
                           <div class="form-group row">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                                   Urusan Pemerintahan *
                               </label>
                               <div class="col-12">

                                   <div class="input-group">
                                       <select name="urusan" id="urusan" class="form-control h-auto p-2 font-size-h6 urusan" onchange="changeUrusan(this)">

                                       </select>
                                       <div class="input-group-append urusan">
                                           <button type="button" class="input-group-text" onclick="add_urusan()" id="addNewUrusan"><i class="fa fa-plus"></i></button>
                                       </div>
                                       <input class="form-control urusanNew" style="display:none;" type="text" name="new_urusan" placeholder="Urusan">
                                       <div class="input-group-append urusanNew" style="display:none;">
                                           <button type="button" class="input-group-text" id="addUrusan">Simpan</button>
                                       </div>
                                       <div class="input-group-append urusanNew" style="display:none;">
                                           <button type="button" class="input-group-text" onclick="batal_urusan()">x</button>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <!--end::Form Group-->
                           <!--begin::Form Group-->
                           <div class="form-group row">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                                   Visi *
                               </label>
                               <div class="col-12">

                                   <textarea type="text" name="visi" id="visi" class="form-control h-auto p-2 rounded-lg font-size-h6"></textarea>

                               </div>
                           </div>
                           <!--end::Form Group-->
                           <!--begin::Form Group-->
                           <div class="form-group row">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                                   Penetapan konteks Misi Risiko *
                               </label>
                               <div class="col-12">
                                   <select name="misi" id="misi" class="form-control h-auto p-2 rounded-lg font-size-h6">
                                   </select>
                               </div>
                           </div>
                           <!--end::Form Group-->
                           <!--begin::Form Group-->
                           <div class="form-group row">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                                   Penetapan konteks Tujuan Risiko *
                               </label>
                               <div class="col-12">
                                   <select name="tujuan" id="tujuan" class="form-control h-auto p-2 rounded-lg font-size-h6"></select>
                               </div>
                           </div>
                           <!--end::Form Group-->
                           <!--begin::Form Group-->
                           <!-- <div class="form-group row">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                                   Penetapan konteks Sasaran Risiko *
                               </label>
                               <div class="col-12">
                                   <select name="sasaran[]" id="sasaran" class="select2 form-control h-auto p-2 rounded-lg font-size-h6" style="width: 100%" multiple></select>
                               </div>
                           </div> -->
                           <!--end::Form Group-->
                           <!--begin::Form Group-->
                           <div class="form-group row">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                                   Penetapan konteks IKU Risiko *
                               </label>
                               <div class="col-12">
                                   <select name="iku" id="iku" class="form-control h-auto p-2 rounded-lg font-size-h6"></select>
                               </div>
                           </div>
                           <!--end::Form Group-->
                           <!--begin::Form Group-->
                           <div class="form-group row">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                                   Penetapan konteks Prioritas Risiko *
                               </label>
                               <div class="col-12">
                                   <select name="prioritas" id="prioritas" class="form-control h-auto p-2 rounded-lg font-size-h6"></select>
                               </div>
                           </div>
                           <!--end::Form Group-->
                           <!--begin::Form Group-->
                           <div class="form-group row">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                                   Penanggung Jawab *
                               </label>
                               <div class="col-lg-6">
                                   <input type="text" name="jabatan_pj" id="jabatan_pj" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                               </div>
                               <div class="col-lg-6">
                                   <input type="text" name="nip_pj" id="nip_pj" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                               </div>
                           </div>
                           <!--end::Form Group-->
                           <!--begin::Form Group-->
                           <div class="form-group row">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                                   Wakil Penanggung Jawab *
                               </label>

                               <div class="col-lg-6">
                                   <input type="text" name="jabatan_wpj" id="jabatan_wpj" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                               </div>
                               <div class="col-lg-6">
                                   <input type="text" name="nip_wpj" id="nip_wpj" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
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
                           <!--begin::Form Group-->
                           <div class="form-group row">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                                   Sekretaris 1 *
                               </label>
                               <div class="col-lg-4">
                                   <input type="text" name="jabatan_sekretaris1" id="jabatan_sekretaris1" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                               </div>
                               <div class="col-lg-4">
                                   <input type="text" name="nama_sekretaris1" id="nama_sekretaris1" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                               </div>
                               <div class="col-lg-4">
                                   <input type="text" name="nip_sekretaris1" id="nip_sekretaris1" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                               </div>
                           </div>
                           <!--end::Form Group-->
                           <!--begin::Form Group-->
                           <div class="form-group row">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                                   Sekretaris 2 *
                               </label>
                               <div class="col-lg-4">
                                   <input type="text" name="jabatan_sekretaris2" id="jabatan_sekretaris2" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                               </div>
                               <div class="col-lg-4">
                                   <input type="text" name="nama_sekretaris2" id="nama_sekretaris2" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                               </div>
                               <div class="col-lg-4">
                                   <input type="text" name="nip_sekretaris2" id="nip_sekretaris2" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                               </div>
                           </div>
                           <!--end::Form Group-->

                           <!--begin::Form Group-->
                           <div class="form-group row">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12">
                                   Sekretaris 3 *
                               </label>
                               <div class="col-lg-4">
                                   <input type="text" name="jabatan_sekretaris3" id="jabatan_sekretaris3" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                               </div>
                               <div class="col-lg-4">
                                   <input type="text" name="nama_sekretaris3" id="nama_sekretaris3" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                               </div>
                               <div class="col-lg-4">
                                   <input type="text" name="nip_sekretaris3" id="nip_sekretaris3" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                               </div>
                           </div>
                           <!--end::Form Group-->

                           <!--begin::Form Group-->
                           <div class="form-group row">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                                   STAF AHLI BIDANG 1 *
                               </label>
                               <div class="col-lg-3">
                                   <input type="text" name="bidang_staff1" id="bidang_staff1" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Bidang">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="jabatan_staff1" id="jabatan_staff1" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="nama_staff1" id="nama_staff1" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="nip_staff1" id="nip_staff1" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                               </div>
                           </div>
                           <!--end::Form Group-->
                           <!--begin::Form Group-->
                           <div class="form-group row">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                                   STAF AHLI BIDANG 2 *
                               </label>
                               <div class="col-lg-3">
                                   <input type="text" name="bidang_staff2" id="bidang_staff2" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Bidang">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="jabatan_staff2" id="jabatan_staff2" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="nama_staff2" id="nama_staff2" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="nip_staff2" id="nip_staff2" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                               </div>
                           </div>
                           <!--end::Form Group-->
                           <!--begin::Form Group-->
                           <div class="form-group row">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                                   STAF AHLI BIDANG 3 *
                               </label>
                               <div class="col-lg-3">
                                   <input type="text" name="bidang_staff3" id="bidang_staff3" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Bidang">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="jabatan_staff3" id="jabatan_staff3" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="nama_staff3" id="nama_staff3" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="nip_staff3" id="nip_staff3" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                               </div>
                           </div>
                           <!--end::Form Group-->
                           <!--begin::Form Group-->
                           <div class="form-group row">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                                   ASISTEN PEMERINTAH *
                               </label>
                               <div class="col-lg-3">
                                   <input type="text" name="jabatan_assist_pemerintah" id="jabatan_assist_pemerintah" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="nama_assist_pemerintah" id="nama_assist_pemerintah" class=" form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="nip_assist_pemerintah" id="nip_assist_pemerintah" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                               </div>
                           </div>
                           <!--end::Form Group-->
                           <!--begin::Form Group-->
                           <div class="form-group row">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                                   ASISTEN PEMBANGUNAN *
                               </label>
                               <div class="col-lg-3">
                                   <input type="text" name="jabatan_assist_pembangunan" id="jabatan_assist_pembangunan" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="nama_assist_pembangunan" id="nama_assist_pembangunan" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="nip_assist_pembangunan" id="nip_assist_pembangunan" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                               </div>
                           </div>
                           <!--end::Form Group-->

                           <!--begin::Form Group-->
                           <div class="form-group row">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                                   ASISTEN ADMINISTRASI *
                               </label>
                               <div class="col-lg-3">
                                   <input type="text" name="jabatan_assist_admin" id="jabatan_assist_admin" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="nama_assist_admin" id="nama_assist_admin" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="nip_assist_admin" id="nip_assist_admin" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                               </div>
                           </div>
                           <!--end::Form Group-->

                           <!--begin::Form Group-->
                           <div class="form-group row">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                                   PERWAKILAN KEPALA OPD *
                               </label>
                               <div class="col-lg-3">
                                   <input type="text" name="jabatan_kepala_opd" id="jabatan_kepala_opd" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="nama_kepala_opd" id="nama_kepala_opd" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="nip_kepala_opd" id="nip_kepala_opd" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                               </div>
                           </div>
                           <!--end::Form Group-->

                           <!--begin::Form Group-->
                           <div class="form-group row">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                                   KEPALA BKAD *
                               </label>
                               <div class="col-lg-3">
                                   <input type="text" name="jabatan_kepala_bkad" id="jabatan_kepala_bkad" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="nama_kepala_bkad" id="nama_kepala_bkad" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="nip_kepala_bkad" id="nip_kepala_bkad" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                               </div>
                           </div>
                           <!--end::Form Group-->

                           <!--begin::Form Group-->
                           <div class="form-group row">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                                   INSPKETUR DAERAH *
                               </label>
                               <div class="col-lg-3">
                                   <input type="text" name="jabatan_inspektur_daerah" id="jabatan_inspektur_daerah" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="nama_inspektur_daerah" id="nama_inspektur_daerah" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="nip_inspektur_daerah" id="nip_inspektur_daerah" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                               </div>
                           </div>
                           <!--end::Form Group-->

                           <!--begin::Form Group-->
                           <div class="form-group row">
                               <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                                   PERWAKILAN CAMAT *
                               </label>
                               <div class="col-lg-3">
                                   <input type="text" name="jabatan_camat" id="jabatan_camat" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Jabatan">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="nama_camat" id="nama_camat" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan Nama">
                               </div>
                               <div class="col-lg-3">
                                   <input type="text" name="nip_camat" id="nip_camat" class="form-control h-auto p-2 rounded-lg font-size-h6" placeholder="Ketikan NIP">
                               </div>
                           </div>
                           <!--end::Form Group-->
                       </form>
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                       <button type="button" id="btn2aKomite" onclick="saveKomite()" class="btn btn-success">Simpan</button>
                   </div>
               </div>
           </div>
       </div>