<div class="modal fade" id="modal_form_reviu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i aria-hidden="true" class="ki ki-close"></i></button>
            </div>
            <div class="modal-body">

                <form id="form_reviu" novalidate="novalidate" enctype="multipart/form-data">
                    <input name="opd_id" type="text" value="<?= $idOpd ?>" style="display: none">
                    <input name="tahun" type="text" class="tahun" style="display: none">
                    <div class="form-group">
                        <label for="question">Sub Unsur</label>
                        <select name="question" class="form-control">
                            <?php foreach ($m1 as $m1) : ?>
                                <option value="<?= $m1['id'] ?>">
                                    <?= str_to_number($m1['urutan']); ?> . <?= $m1['question'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="uraian">
                            Uraian Survey
                        </label>
                        <textarea class="form-control" name="uraian" id="uraian" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="hasil_reviu">
                            Simpulan
                        </label>
                        <textarea class="form-control" name="hasil_reviu" id="hasil_reviu" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="penjelasan_reviu">
                            Penjelasan
                        </label>
                        <textarea class="form-control" name="penjelasan_reviu" id="penjelasan_reviu" rows="3"></textarea>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" id="btnSaveReviu" onclick="save_reviu()" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </div>
</div>