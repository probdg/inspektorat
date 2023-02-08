<div class="modal fade" id="modal_3a" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i aria-hidden="true" class="ki ki-close"></i></button>
            </div>
            <div class="modal-body">

                <form id="form_3a" novalidate="novalidate" enctype="multipart/form-data">
                    <input name="opd_id" type="text" value="<?= $idOpd ?>" style="display: none">
                    <input name="tahun" type="text" class="tahun" style="display: none">
                    <input name="id" type="text" style="display: none">
                    <!--begin::Form Group-->
                    <div class="form-group row">
                        <label for="urusan_pemda" class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                            Urusan Pemerintahan *
                        </label>
                        <div class="col-12">
                            <select name="urusan_pemda" id="urusan_pemda" class="form-control h-auto p-2 font-size-h6">
                            </select>
                        </div>
                    </div>
                    <!--end::Form Group-->
                    <!--begin::Form Group-->
                    <div class="form-group row">
                        <label for="jenis_risiko" class="col-form-label col-12">
                            JENIS RISIKO
                        </label>
                        <div class="col-12">
                            <select class="form-control" name="jenis_risiko" id="jenis_risiko" rows="3">
                                <option value="">Pilih Jenis Risiko</option>
                                <?php
                                $sumber = $this->db->order_by('kode', 'asc')->get('ref_jenis_risiko')->result();
                                foreach ($sumber as $row) : ?>
                                    <option value="<?= $row->kode ?>"><?= str_pad($row->kode, 2, "0", STR_PAD_LEFT); ?> . <?= $row->jenis ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <!--end::Form Group-->
                    <!--begin::Form Group-->
                    <div class="form-group row">
                        <label for="opd_penilai" class="col-form-label col-12">
                            OPD YANG MENILAI
                        </label>
                        <div class="col-12">
                            <select class="form-control" name="opd_penilai" id="opd_penilai" rows="3">
                                <option value="">Pilih OPD Penilai</option>
                                <?php
                                $sumber = $this->db->order_by('kode', 'asc')->get('ref_opd')->result();
                                foreach ($sumber as $row) : ?>
                                    <option value="<?= $row->id ?>"><?= str_pad($row->id, 2, "0", STR_PAD_LEFT); ?> . <?= $row->nama_opd ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <!--end::Form Group-->
                    <!--begin::Form Group-->
                    <div class="form-group row">
                        <label for="uraian_risiko" class="col-form-label col-12">
                            URAIAN RISIKO
                        </label>
                        <div class="col-12">
                            <textarea class="form-control summernote" name="uraian_risiko" id="uraian_risiko" rows="3"></textarea>
                        </div>
                    </div>
                    <!--end::Form Group-->
                    <!--begin::Form Group-->
                    <div class="form-group row">
                        <label for="pemilik" class="col-form-label col-12">
                            PEMILIK
                        </label>
                        <div class="col-12">
                            <input class="form-control" name="pemilik" id="pemilik">
                        </div>
                    </div>
                    <!--end::Form Group-->
                    <!--begin::Form Group-->
                    <div class="form-group row">
                        <label for="uraian_sebab" class="col-form-label col-12">
                            SEBAB RISIKO
                        </label>
                        <div class="col-12">
                            <textarea class="form-control summernote" name="uraian_sebab" id="uraian_sebab" rows="3"></textarea>
                        </div>
                    </div>
                    <!--end::Form Group-->
                    <!--begin::Form Group-->
                    <div class="form-group row">
                        <label for="sumber" class="col-form-label col-12">
                            SUMBER RISIKO
                        </label>
                        <div class="col-12">
                            <select class="form-control" name="sumber" id="sumber" rows="3">
                                <option value="">Pilih Sumber Risiko</option>
                                <?php
                                $sumber = $this->db->get('ref_sumber_risiko')->result();
                                foreach ($sumber as $row) : ?>
                                    <option value="<?= $row->id ?>"><?= $row->reg ?> . <?= $row->kategori ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <!--end::Form Group-->
                    <!--begin::Form Group-->
                    <div class="form-group row">
                        <label for="kendali" class="col-form-label col-12">
                            Kontrol
                        </label>
                        <div class="col-12">
                            <select class="form-control" name="kendali" id="kendali" rows="3">
                                <option value="">Pilih Kontrol</option>
                                <option value="C">C</option>
                                <option value="UC">UC</option>
                            </select>
                        </div>
                    </div>
                    <!--end::Form Group-->
                    <!--begin::Form Group-->
                    <div class="form-group row">
                        <label for="kategori_dampak" class="col-form-label col-12">
                            Kategori Dampak
                        </label>
                        <div class="col-12">
                            <select class="form-control" name="kategori_dampak" id="kategori_dampak" rows="3">
                                <option value="">Pilih Kategori Dampak</option>
                                <option value="ref_tuntutan_hukum">TUNTUTAN HUKUM</option>
                                <option value="ref_kerugian_negara">KERUGIAN NEGARA</option>
                                <option value="ref_gangguan_pelayanan">GANGGUAN TERHADAP PELAYANAN</option>
                                <option value="ref_penurunan_reputasi">PENURUNAN REPUTASI</option>
                                <option value="ref_penurunan_kinerja">PENURUNAN KINERJA</option>
                            </select>
                        </div>
                    </div>
                    <!--end::Form Group-->
                    <!--begin::Form Group-->
                    <div class="form-group row">
                        <label for="uraian_dampak" class="col-form-label col-12">
                            URAIAN DAMPAK
                        </label>
                        <div class="col-12">
                            <textarea class="form-control summernote" name="uraian_dampak" id="uraian_dampak" rows="3"></textarea>
                        </div>
                    </div>
                    <!--end::Form Group-->
                    <!--begin::Form Group-->
                    <div class="form-group row">
                        <label for="pihak_terkena" class="col-form-label col-12">
                            PIHAK TERDAMPAK
                        </label>
                        <div class="col-12">
                            <input class="form-control" name="pihak_terkena" id="pihak_terkena">
                        </div>
                    </div>
                    <!--end::Form Group-->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" id="btnSaveRisk" onclick="saveRiskPemda()" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </div>
</div>