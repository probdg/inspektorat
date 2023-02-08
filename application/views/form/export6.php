    <link href="<?= base_url('assets/table.css') ?>" rel="stylesheet" type="text/css" />
    <?php
    if (isset($konteks)) {
        $program = $konteks['id_prioritas'];
        $konteksMisi = $konteks['misi'];
        $konteksTujuan = $konteks['tujuan'];
        $konteksPrioritas = $konteks['prioritas'];
        $konteksIku =   $konteks['iku'];
        $konteksUrusan = $konteks['urusan'];
    } else {
        $program = '';
        $konteksMisi = '';
        $konteksTujuan = '';
        $konteksPrioritas = '';
        $konteksIku = '';
        $konteksUrusan = '';
    } ?>
    <h4 class="text-center"> Penilaian atas Kegiatan Pengendalian yang Ada dan Masih Dibutuhkan/ RTP atas Kelemahan Lingkungan Pengendalian<br> (RTP atas CEE) </h4>
    Nama Pemda * : <?= ucwords(strtolower($pemda)) ?></br>
    Nama OPD * : <?= ucwords(strtolower($nama_opd)) ?></br>
    Tahun Penilaian * : <?= $tahun ?></br>
    <!--end::Form Group-->
    <div class="table-responsive">

        <table>
            <thead>
                <tr>
                    <th width="10">No.</th>
                    <th>Kondisi Lingkungan Pengendalian yang Kurang Memadai</th>
                    <th>Rencana Tindak Pengendalian Lingkungan Pengendalian</th>
                    <th>Penanggung jawab</th>
                    <th width="80">Target Waktu Penyelesaian</th>
                    <th>Realisasi Penyelesaian</th>
                </tr>
                <tr>
                    <th>a</th>
                    <th>b</th>
                    <th>c</th>
                    <th>d</th>
                    <th>e</th>
                    <th>f</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($data as $f1a) : ?>
                    <tr>
                        <th align="center"><?= getRomawi($no++) ?></th>
                        <th colspan="7"><?= $f1a['question'] ?></th>
                    </tr>
                    <?php $no_up = 1;
                    foreach ($f1a['reviu'] as $detail) : ?>
                        <tr>
                            <th align="right"><?= $no_up++ ?></th>
                            <th><?= $detail['kelemahan'] ?></th>
                            <th><?= $detail['rencana_perbaikan'] ?></th>
                            <th><?= $detail['pj'] ?></th>
                            <th><?= $detail['twp'] ?></th>
                            <th><?= $detail['realisasi_penyelesaian'] ?></th>

                        </tr>
                    <?php endforeach ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>