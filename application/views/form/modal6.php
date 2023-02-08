<div class="modal fade" id="modal_6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i aria-hidden="true" class="ki ki-close"></i></button>
            </div>
            <div class="modal-body">

                <form id="form_6" novalidate="novalidate" enctype="multipart/form-data">
                    <input name="id" type="text" style="display: none">
                    <h4 class="kondisi"></h4>
                    <div class="form-group">
                        <label for="rencana_perbaikan">
                            Rencana Perbaikan
                        </label>
                        <textarea class="form-control summernote" name="rencana_perbaikan" id="rencana_perbaikan" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="pj">
                            Penanggung Jawab
                        </label>
                        <input class="form-control" name="pj" id="pj" />
                    </div>
                    <div class="form-group">
                        <label for="twp">
                            Target Waktu Penyelesaian
                        </label>
                        <input class="form-control" name="twp" id="twp" />
                    </div>
                    <div class="form-group">
                        <label for="realisasi_penyelesaian">
                            Realisasi Penyelesaian
                        </label>
                        <textarea class="form-control summernote" name="realisasi_penyelesaian" id="realisasi_penyelesaian" rows="3"></textarea>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" id="btnSaveRtp" onclick="saveRtp()" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </div>
</div>