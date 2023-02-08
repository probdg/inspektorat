<div class="modal fade" id="modal_7_pemda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i aria-hidden="true" class="ki ki-close"></i></button>
            </div>
            <div class="modal-body">

                <form id="form_7_pemda" novalidate="novalidate" enctype="multipart/form-data">
                    <input name="id" type="text" style="display: none">
                    <h4 class="kondisi_pengendalian"></h4>
                    <div class="form-group">
                        <label for="uraian_pengendalian">
                            Uraian Pengendalian Sudah Ada
                        </label>
                        <textarea class="form-control summernote" name="uraian_pengendalian" id="uraian_pengendalian" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="celah_pengendalian">
                            Celah Pengendalian
                        </label>
                        <select class="form-control" name="celah_pengendalian" id="celah_pengendalian">
                            <option value="">Pilih Celah Pengendalian</option>
                            <option value="1"> (1) Kebijakan dan Prosedur pengendalian sudah dilakukan, namun belum mampu menangani risiko yang teridentifikasi</option>
                            <option value="2"> (2) Prosedur pengendalian belum/tidak dapat dilaksanakan</option>
                            <option value="3"> (3) Kebijakan belum diikuti dengan prosedur baku yang jelas</option>
                            <option value="4"> (4) Kebijakan dan prosedur yang ada tidak sesuai dengan peraturan diatasnya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rencana_tindak_pengendalian">
                            Rencana Tindak
                            Pengendalian
                        </label>
                        <textarea class="form-control summernote" name="rencana_tindak_pengendalian" id="rencana_tindak_pengendalian" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="twp">
                            Target Waktu Penyelesaian
                        </label>
                        <input class="form-control" name="twp" id="twp" />
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" id="btnPengendalianPemda" onclick="savePengendalianPemda()" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </div>
</div>