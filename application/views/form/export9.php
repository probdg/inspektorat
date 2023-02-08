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
    <h4 class="text-center">Rancangan Pemantauan Atas Pengendalian Intern </h4>
    Nama Pemda * : <?= ucwords(strtolower($pemda)) ?></br>
    Nama OPD * : <?= ucwords(strtolower($nama_opd)) ?></br>
    Tahun Penilaian * : <?= $tahun ?></br>
    Tujuan Strategis * :<?= $konteksTujuan ?></br>
    Urusan Pemerintahan * : <?= $konteksUrusan ?>
    <table>
        <thead>
            <tr>
                <th width="10">No.</th>
                <th>Risiko Prioritas </th>
                <th>Kode Risiko</th>
                <th>Kegiatan Pengendalian yang Dibutuhkan </th>
                <th>Bentuk/Metode Pemantauan yang Diperlukan</th>
                <th>Penanggung Jawab Pemantauan</th>
                <th>Rencana Waktu Pelaksanaan Pemantauan</th>
                <th>Realisasi Waktu Pelaksanaan</th>
                <th>Keterangan</th>
            </tr>
            <tr>
                <th>a</th>
                <th>b</th>
                <th>c</th>
                <th>d</th>
                <th>e</th>
                <th>f</th>
                <th>g</th>
                <th>h</th>
                <th>i</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>I</th>
                <th>Risiko Strategis</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>

            </tr>
            <?php $no_pemda = 1;
            foreach ($risk_pemda as $risk_pemda) : ?>
                <?php
                $jumlah =  count($risk_pemda['detail']);
                if ($jumlah > 0) {
                    $rowspan = $jumlah;
                } else {
                    $rowspan = 1;
                }
                ?>
                <tr>
                    <td valign="top" rowspan="<?= $rowspan ?>" align="center"><?= $no_pemda++ ?></td>
                    <td valign="top" rowspan="<?= $rowspan ?>" align="left"><?= $risk_pemda['uraian_risiko'] ?></td>
                    <td valign="top" rowspan="<?= $rowspan ?>" align="left"><?= $risk_pemda['kode_risiko'] ?></td>
                    <td valign="top" align="left"><?= isset($risk_pemda['detail']) ? $risk_pemda['detail'][0]['kegiatan_pengendalian'] : '' ?></td>
                    <td valign="top" align="left"><?= isset($risk_pemda['detail']) ? $risk_pemda['detail'][0]['metode_pemantauan'] : '' ?></td>
                    <td valign="top" align="center"><?= isset($risk_pemda['detail']) ? $risk_pemda['detail'][0]['pj'] : '' ?></td>
                    <td valign="top" align="left"><?= isset($risk_pemda['detail']) ? $risk_pemda['detail'][0]['rencana_waktu_pemantauan'] : '' ?></td>
                    <td valign="top" align="left"><?= isset($risk_pemda['detail']) ? $risk_pemda['detail'][0]['realisasi_waktu_pemantauan'] : '' ?></td>
                    <td valign="top" align="left"><?= isset($risk_pemda['detail']) ? $risk_pemda['detail'][0]['keterangan'] : '' ?></td>

                </tr>
                <?php if ($jumlah > 1) : ?> <?php for ($i = 1; $i < $jumlah; $i++) : ?>
                        <tr>
                            <td valign="top" align="left"><?= isset($risk_pemda['detail']) ? $risk_pemda['detail'][$i]['kegiatan_pengendalian'] : '' ?></td>
                            <td valign="top" align="left"><?= isset($risk_pemda['detail']) ? $risk_pemda['detail'][$i]['metode_pemantauan'] : '' ?></td>
                            <td valign="top" align="center"><?= isset($risk_pemda['detail']) ? $risk_pemda['detail'][$i]['pj'] : '' ?></td>
                            <td valign="top" align="left"><?= isset($risk_pemda['detail']) ? $risk_pemda['detail'][$i]['rencana_waktu_pemantauan'] : '' ?></td>
                            <td valign="top" align="left"><?= isset($risk_pemda['detail']) ? $risk_pemda['detail'][$i]['realisasi_waktu_pemantauan'] : '' ?></td>
                            <td valign="top" align="left"><?= isset($risk_pemda['detail']) ? $risk_pemda['detail'][$i]['keterangan'] : '' ?></td>

                        </tr>
                    <?php endfor ?>
                <?php endif ?>
            <?php endforeach ?>
            <?php $no = 2;
            $no_opd_up = 1;
            $no_detail = 1;
            foreach ($risk_opd as $key => $value) : ?>
                <?php if ($value['detail_risiko']) : ?>
                    <tr>
                        <th><?= getRomawi($no) ?></th>
                        <th>Risiko Strategis OPD <?= $no_opd_up++ ?>: <?= $value['nama_opd'] ?></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php $no_opd = 1;
                    foreach ($value['detail_risiko'] as $detail) : ?>
                        <?php
                        $jopd =  count($detail['detail']);
                        if ($jopd > 0) {
                            $ropd = $jopd;
                        } else {
                            $ropd = 1;
                        } ?>
                        <tr>
                            <td valign="top" rowspan="<?= $ropd ?>" align="center"><?= $no_opd++ ?></td>
                            <td valign="top" rowspan="<?= $ropd ?>" align="left"><?= $detail['uraian_risiko'] ?></td>
                            <td valign="top" rowspan="<?= $ropd ?>" align="left"><?= $detail['kode_risiko'] ?></td>
                            <td valign="top" align="left"><?= isset($detail['detail']) ? $detail['detail'][0]['kegiatan_pengendalian'] : '' ?></td>
                            <td valign="top" align="left"><?= isset($detail['detail']) ? $detail['detail'][0]['metode_pemantauan'] : '' ?></td>
                            <td valign="top" align="center"><?= isset($detail['detail']) ? $detail['detail'][0]['pj'] : '' ?></td>
                            <td valign="top" align="left"><?= isset($detail['detail']) ? $detail['detail'][0]['rencana_waktu_pemantauan'] : '' ?></td>
                            <td valign="top" align="left"><?= isset($detail['detail']) ? $detail['detail'][0]['realisasi_waktu_pemantauan'] : '' ?></td>
                            <td valign="top" align="left"><?= isset($detail['detail']) ? $detail['detail'][0]['keterangan'] : '' ?></td>
                        </tr>
                        <?php if ($jopd > 1) : ?> <?php for ($iopd = 1; $iopd < $jopd; $iopd++) : ?>
                                <tr>
                                    <td valign="top" align="left"><?= isset($detail['detail']) ? $detail['detail'][$iopd]['kegiatan_pengendalian'] : '' ?></td>
                                    <td valign="top" align="left"><?= isset($detail['detail']) ? $detail['detail'][$iopd]['metode_pemantauan'] : '' ?></td>
                                    <td valign="top" align="center"><?= isset($detail['detail']) ? $detail['detail'][$iopd]['pj'] : '' ?></td>
                                    <td valign="top" align="left"><?= isset($detail['detail']) ? $detail['detail'][$iopd]['rencana_waktu_pemantauan'] : '' ?></td>
                                    <td valign="top" align="left"><?= isset($detail['detail']) ? $detail['detail'][$iopd]['realisasi_waktu_pemantauan'] : '' ?></td>
                                    <td valign="top" align="left"><?= isset($detail['detail']) ? $detail['detail'][$iopd]['keterangan'] : '' ?></td>

                                </tr>
                            <?php endfor ?>
                        <?php endif ?>
                    <?php endforeach ?>
                    <?php $no++ ?>
                <?php endif ?>

            <?php endforeach ?>
            <?php
            $no_operasional_up = 1;
            foreach ($risk_operasional as $key => $value) : ?>
                <?php if ($value['detail_risiko']) : ?>
                    <tr>
                        <th><?= getRomawi($no) ?></th>
                        <th>Risiko Strategis OPD <?= $no_operasional_up++ ?>: <?= $value['nama_opd'] ?></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php $no_detail_oper = 1;
                    foreach ($value['detail_risiko'] as $detail_op) : ?>
                        <?php
                        $joper =  count($detail_op['detail']);
                        if ($joper > 0) {
                            $roper = $joper;
                        } else {
                            $roper = 1;
                        } ?>
                        <tr>
                            <td valign="top" rowspan="<?= $roper ?>" align="center"><?= $no_detail_oper++ ?></td>
                            <td valign="top" rowspan="<?= $roper ?>" align="left"><?= $detail_op['uraian_risiko'] ?></td>
                            <td valign="top" rowspan="<?= $roper ?>" align="left"><?= $detail_op['kode_risiko'] ?></td>
                            <td valign="top" align="left"><?= isset($detail_op['detail']) ? $detail_op['detail'][0]['kegiatan_pengendalian'] : '' ?></td>
                            <td valign="top" align="left"><?= isset($detail_op['detail']) ? $detail_op['detail'][0]['metode_pemantauan'] : '' ?></td>
                            <td valign="top" align="center"><?= isset($detail_op['detail']) ? $detail_op['detail'][0]['pj'] : '' ?></td>
                            <td valign="top" align="left"><?= isset($detail_op['detail']) ? $detail_op['detail'][0]['rencana_waktu_pemantauan'] : '' ?></td>
                            <td valign="top" align="left"><?= isset($detail_op['detail']) ? $detail_op['detail'][0]['realisasi_waktu_pemantauan'] : '' ?></td>
                            <td valign="top" align="left"><?= isset($detail_op['detail']) ? $detail_op['detail'][0]['keterangan'] : '' ?></td>
                        </tr>
                        <?php if ($joper > 1) : ?> <?php for ($ioper = 1; $ioper < $joper; $ioper++) : ?>
                                <tr>
                                    <td valign="top" align="left"><?= isset($detail_op['detail']) ? $detail_op['detail'][$ioper]['kegiatan_pengendalian'] : '' ?></td>
                                    <td valign="top" align="left"><?= isset($detail_op['detail']) ? $detail_op['detail'][$ioper]['metode_pemantauan'] : '' ?></td>
                                    <td valign="top" align="center"><?= isset($detail_op['detail']) ? $detail_op['detail'][$ioper]['pj'] : '' ?></td>
                                    <td valign="top" align="left"><?= isset($detail_op['detail']) ? $detail_op['detail'][$ioper]['rencana_waktu_pemantauan'] : '' ?></td>
                                    <td valign="top" align="left"><?= isset($detail_op['detail']) ? $detail_op['detail'][$ioper]['realisasi_waktu_pemantauan'] : '' ?></td>
                                    <td valign="top" align="left"><?= isset($detail_op['detail']) ? $detail_op['detail'][$ioper]['keterangan'] : '' ?></td>

                                </tr>
                            <?php endfor ?>
                        <?php endif ?>
                    <?php endforeach ?>
                    <?php $no++ ?>
                <?php endif ?>

            <?php endforeach ?>
        </tbody>
    </table>