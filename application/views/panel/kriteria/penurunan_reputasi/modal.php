<div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">

                <form id="form" novalidate="novalidate" enctype="multipart/form-data">
                    <input name="id" type="text" style="display: none">
                    <div class="form-group row validated">
                        <label for="reg" class="col-4 col-form-label">Reg</label>
                        <div class="col-8">
                            <input name="reg" type="text" class='form-control' placeholder="" style="width: 100%;" required>
                        </div>
                    </div>
                    <div class="form-group row validated">
                        <label for="level_dampak" class="col-4 col-form-label">Level</label>
                        <div class="col-8">
                            <textarea name="level_dampak" type="text" class='form-control' placeholder="" style="width: 100%;" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row validated">
                        <label for="penurunan_reputasi" class="col-4 col-form-label">Penurunan Reputasi</label>
                        <div class="col-8">
                            <textarea name="penurunan_reputasi" type="text" class='form-control' placeholder="" style="width: 100%;" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row validated">
                        <label for="keterangan" class="col-4 col-form-label">Keterangan</label>
                        <div class="col-8">
                            <textarea name="keterangan" type="text" class='form-control' placeholder="" style="width: 100%;" required></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" id="btnSave" onclick="save()" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </div>
</div>