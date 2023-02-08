<div class="modal fade" id="modal_form_iku_opd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i aria-hidden="true" class="ki ki-close"></i></button>
            </div>
            <div class="modal-body">

                <form id="form_iku_opd" novalidate="novalidate" enctype="multipart/form-data">
                    <input name="opd_id" type="text" value="<?= $idOpd ?>" style="display: none">
                    <input name="tahun" type="text" class="tahun" style="display: none">
                    <input name="id_iku_opd" type="text" style="display: none">
                    <!--begin::Form Group-->
                    <div class="form-group row">
                        <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                            Urusan Pemerintahan *
                        </label>
                        <div class="col-12">
                            <select name="urusan_opd" id="urusan_opd" class="form-control h-auto p-2 font-size-h6">
                            </select>
                        </div>
                    </div>
                    <!--end::Form Group-->
                    <div class="form-group row">
                        <label for="prioritas" class="col-form-label col-12">
                            Prioritas
                        </label>
                        <div class="col-12">
                            <div class="radio-inline">

                                <label class="radio radio-lg radio-outline">
                                    <input type="radio" name="prioritas" value="0" checked />
                                    <span></span>
                                    Bukan Prioritas
                                </label>
                                <label class="radio radio-lg radio-outline">
                                    <input type="radio" name="prioritas" value="1" />
                                    <span></span>
                                    Prioritas
                                </label>
                            </div>
                        </div>

                    </div>


                    <div class="form-group row">
                        <label for="iku_opd" class="col-form-label col-12">
                            IKU
                        </label>
                        <div class="col-12">
                            <textarea class="form-control" name="iku_opd" id="iku_opd" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">

                        <label class="col-form-label col-3" for="target">
                            NILAI
                        </label>
                        <div class="col-9">
                            <input class="form-control" name="target" id="target" />
                        </div>
                    </div>
                    <div class="form-group row">

                        <label class="col-form-label col-3" for="target">
                            Satuan
                        </label>
                        <div class="col-9">
                            <input class="form-control" name="satuan" id="satuan" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-3" for="target">
                            Atribut
                        </label>
                        <div class="col-9">
                            <input class="form-control" name="atribut" id="atribut" />
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" id="btnSaveIKU" onclick="save_iku_opd()" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </div>
</div>