<div class="modal fade" id="modal_9_opd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i aria-hidden="true" class="ki ki-close"></i></button>
            </div>
            <div class="modal-body">

                <form id="form_9_opd" novalidate="novalidate" enctype="multipart/form-data">
                    <input name="risk_opd" type="text" style="display: none">
                    <h4 class="text-pemantauan"></h4>
                    <div class="form-group">
                        <label for="metode_pemantauan">
                            Metode Pemantauan
                        </label>
                        <input class="form-control" name="metode_pemantauan" id="metode_pemantauan" />
                    </div>
                    <div class="form-group">
                        <label for="pj">
                            Penanggung Jawab
                        </label>
                        <input class="form-control" name="pj" id="pj" />
                    </div>
                    <div class="form-group">
                        <label for="rencana_waktu_pemantauan">
                            Rencana Waktu Pelaksanaan
                        </label>
                        <input class="form-control" name="rencana_waktu_pemantauan" id="rencana_waktu_pemantauan" />
                    </div>
                    <div class="form-group">
                        <label for="realisasi_waktu_pemantauan">
                            Realisasi Waktu Pelaksanaan
                        </label>
                        <input class="form-control" name="realisasi_waktu_pemantauan" id="realisasi_waktu_pemantauan" />
                    </div>
                    <div class="form-group">
                        <label for="keterangan">
                            Keterangan
                        </label>
                        <textarea class="form-control" name="keterangan" id="keterangan" rows="3"></textarea>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" id="btnPemantauanOpd" onclick="savePemantauanOpd()" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </div>
</div>