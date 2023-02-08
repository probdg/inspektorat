<div class="modal fade" id="modal_8_operasional" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i aria-hidden="true" class="ki ki-close"></i></button>
            </div>
            <div class="modal-body">

                <form id="form_8_operasional" novalidate="novalidate" enctype="multipart/form-data">
                    <input name="id" type="text" style="display: none">
                    <h4 class="title-kominukasi"></h4>
                    <div class="form-group">
                        <label for="risk_operasional">
                            Risiko Operasional
                        </label>
                        <select class="form-control" name="risk_operasional" id="risk_operasional"></select>
                    </div>
                    <div class="form-group">
                        <label for="media">
                            Media/Bentuk Sarana
                            Pengkomunikasian
                        </label>
                        <input class="form-control" name="media" id="media" />
                    </div>
                    <div class="form-group">
                        <label for="kegiatan_pengedalian">
                            Kegiatan Pengendalian
                        </label>
                        <textarea class="form-control" name="kegiatan_pengendalian" id="kegiatan_pengendalian" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="penyedia_informasi">
                            Penyedia Informasi
                        </label>
                        <input class="form-control" name="penyedia_informasi" id="penyedia_informasi" />
                    </div>

                    <div class="form-group">
                        <label for="penerima_informasi">
                            Penerima Informasi
                        </label>
                        <input class="form-control" name="penerima_informasi" id="penerima_informasi" />
                    </div>
                    <div class="form-group">
                        <label for="penerima_informasi">
                            Rencana Waktu Pelaksanaan
                        </label>
                        <input class="form-control" name="rencana_waktu_pelaksanaan" id="rencana_waktu_pelaksanaan" />
                    </div>
                    <div class="form-group">
                        <label for="penerima_informasi">
                            Realisasi Waktu Pelaksanaan
                        </label>
                        <input class="form-control" name="realisasi_waktu_pelaksanaan" id="realisasi_waktu_pelaksanaan" />
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
                <button type="button" id="btnKomunikasiOperasional" onclick="saveKomunikasiOperasional()" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </div>
</div>