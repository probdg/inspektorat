<div class="modal fade" id="modal_4_operasional" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i aria-hidden="true" class="ki ki-close"></i></button>
            </div>
            <div class="modal-body">

                <form id="form_4_operasional" novalidate="novalidate" enctype="multipart/form-data">
                    <input name="id" type="text" style="display: none">
                    <h6 class="indikator_operasional"></h6>

                    <div class="form-group">
                        <label for="nilai">
                            Skala Dampak
                        </label>
                        <div class="radio-list dampak">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="skala_kemungkinan">
                            Skala Kemungkinan
                        </label>
                        <?php $kemungkinan = $this->db->get('ref_kriteria_kemungkinan')->result(); ?>
                        <div class="radio-list">
                            <?php foreach ($kemungkinan as $kemungkinan) : ?>
                                <label class="radio radio-lg radio-outline">
                                    <input type="radio" name="skala_kemungkinan" value="<?= $kemungkinan->reg ?>" />
                                    <span></span>
                                    <?= $kemungkinan->level ?>(<?= $kemungkinan->probabilitas ?>)
                                </label>
                            <?php endforeach ?>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" id="btnAnalisisOperasional" onclick="saveAnalisisOperasional()" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </div>
</div>