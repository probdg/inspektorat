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
                        <label for="level" class="col-4 col-form-label">RPJMD</label>
                        <div class="col-8">
                            <select class="form-control" name="rpjmd">
                                <?php foreach ($rpjmd as $rpjmd) { ?>
                                    <option value="<?php echo $rpjmd['id'] ?>"><?php echo $rpjmd['nama_periode'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row validated">
                        <label for="level" class="col-4 col-form-label">No Urut</label>
                        <div class="col-8">
                            <input name="no_urut" type="text" class='form-control' placeholder="" style="width: 100%;" required>
                        </div>
                    </div>
                    <div class="form-group row validated">
                        <label for="level" class="col-4 col-form-label">Misi Strategis</label>
                        <div class="col-8">
                            <textarea name="misi" type="text" class='form-control' placeholder="" style="width: 100%;" required></textarea>
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