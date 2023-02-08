<div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i aria-hidden="true" class="ki ki-close"></i></button>
            </div>
            <div class="modal-body">

                <form id="form_sumberdata" novalidate="novalidate" enctype="multipart/form-data">
                    <input name="id_sumberdata" type="text" style="display: none">
                    <input name="tahun" class="tahun" type="text" style="display: none">
                    <input name="opd_id" type="text" value="<?= $idOpd ?>" style="display: none">
                    <div class="form-group">
                        <label for="sumberdata">Sumber Data</label>
                        <textarea type="text" name="sumberdata" class="form-control" placeholder="Ketikan Sumber Data"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="kelemahan">Uraian Kelemahan</label>
                        <textarea class="form-control" rows="4" name="kelemahan" placeholder="Ketikan Uraian Kelemahan" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="klasifikasi">Klasifikasi</label>
                        <select name="klasifikasi" class="form-control" onchange="getSubKlasifikasi(this.value)">
                            <option value="">Pilih Klasifikasi</option>
                            <?php foreach ($m1 as $m1) : ?>
                                <option value="<?= $m1['id'] ?>">
                                    <?= str_to_number($m1['urutan']); ?> . <?= $m1['question'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sub_klasifikasi">Sub Klasifikasi</label>
                        <select name="sub_klasifikasi" id="sub_klasifikasi" class="form-control">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nilai">
                            Nilai
                        </label>
                        <div class="radio-list">
                            <label class="radio radio-lg radio-outline">
                                <input type="radio" name="nilai" value="1" checked />
                                <span></span>
                                1 Tidak Setuju/Belum ada/ belum dibangun
                            </label>
                            <label class="radio radio-lg radio-outline">
                                <input type="radio" name="nilai" value="2" />
                                <span></span>
                                2 Kurang Setuju/Telah dibangun/diterapkan, akan tetapi belum konsisten
                            </label>
                            <label class="radio radio-lg radio-outline">
                                <input type="radio" name="nilai" value="3" />
                                <span></span>
                                3 Setuju/Sudah dibangun atau diterapkan dengan baik, tapi masih bisa ditingkatkan
                            </label>
                            <label class="radio radio-lg radio-outline">
                                <input type="radio" name="nilai" value="4" />
                                <span></span>
                                4 Sangat Setuju/Sudah dibangun atau diterapkan dengan baik dan dapat ditularkan ke organisasi lain
                            </label>
                        </div>
                    </div>
                    <!--end::Form Group-->

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" id="btnSaveSumbeData" onclick="save_sumberdata()" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </div>
</div>