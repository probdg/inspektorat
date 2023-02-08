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
    <h4 class="text-center">Form 5. Daftar Risiko Prioritas </h4>
    Nama Pemda * : <?= ucwords(strtolower($pemda)) ?></br>
    Nama OPD * : <?= ucwords(strtolower($nama_opd)) ?></br>
    Tahun Penilaian * : <?= $tahun ?></br>
    Tujuan Strategis * :<?= $konteksTujuan ?></br>
    Urusan Pemerintahan * : <?= $konteksUrusan ?>
    <table width="100%">
        <thead>
            <tr>
                <th>NO</th>
                <th>Risiko Priorttas</th>
                <th>Kode Risiko</th>
                <th>Skala Risiko</th>
                <th>Pemilik Risiko</th>
                <th>Penyebab</th>
                <th>Dampak</th>
            </tr>
            <tr>
                <td>a</td>
                <td>b</td>
                <td>c</td>
                <td>d</td>
                <td>e</td>
                <td>f</td>
                <td>g</td>
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

            </tr>
            <?php $no_pemda = 1;
            foreach ($risk_pemda as $risk_pemda) : ?>
                <tr>
                    <td align="center"><?= $no_pemda++ ?></td>
                    <td align="left"><?= $risk_pemda['uraian_risiko'] ?></td>
                    <td align="left"><?= $risk_pemda['kode_risiko'] ?></td>
                    <td align="center"><?= $risk_pemda['skala_dampak'] * $risk_pemda['skala_kemungkinan'] ?></td>
                    <td align="left"><?= $risk_pemda['pemilik'] ?></td>
                    <td align="left"><?= $risk_pemda['uraian_sebab'] ?></td>
                    <td align="left"><?= $risk_pemda['uraian_dampak'] ?></td>
                </tr>
            <?php endforeach ?>

            <?php $no = 2;
            $no_opd_up = 1;
            foreach ($risk_opd as $key => $value) : ?>
                <tr>
                    <th><?= getRomawi($no) ?></th>
                    <th>Risiko Strategis OPD <?= $no_opd_up++ ?>: <?= $value['nama_opd'] ?></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>

                </tr>
                <?php $no_opd = 1;
                foreach ($value['detail'] as $ropd) : ?>
                    <tr>
                        <td valign="top" align="center"><?= $no_opd++ ?></td>
                        <td valign="top" align="left"><?= $ropd['uraian_risiko'] ?></td>
                        <td valign="top" align="left"><?= $ropd['kode_risiko'] ?></td>
                        <td valign="top" align="center"><?= $ropd['skala_dampak'] * $ropd['skala_kemungkinan'] ?></td>
                        <td valign="top" align="left"><?= $ropd['pemilik'] ?></td>
                        <td valign="top" align="left"><?= $ropd['uraian_sebab'] ?></td>
                        <td valign="top" align="left"><?= $ropd['uraian_dampak'] ?></td>
                    </tr>
                <?php endforeach ?>
                <?php $no++ ?>
            <?php endforeach ?>
            <?php
            $no_oper_up = 1;
            foreach ($risk_opd as $key => $vOp) : ?>
                <tr>
                    <th><?= getRomawi($no) ?></th>p
                    <th>Risiko Operasional OPD <?= $no_oper_up++ ?>: <?= $vOp['nama_opd'] ?></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <?php $no_oper = 1;
                foreach ($vOp['detail'] as $roper) : ?>
                    <tr>
                        <td valign="top" align="center"><?= $no_oper++ ?></td>
                        <td valign="top" align="left"><?= $roper['uraian_risiko'] ?></td>
                        <td valign="top" align="left"><?= $roper['kode_risiko'] ?></td>
                        <td valign="top" align="center"><?= $roper['skala_dampak'] * $roper['skala_kemungkinan'] ?></td>
                        <td valign="top" align="left"><?= $roper['pemilik'] ?></td>
                        <td valign="top" align="left"><?= $roper['uraian_sebab'] ?></td>
                        <td valign="top" align="left"><?= $roper['uraian_dampak'] ?></td>
                    </tr>
                <?php endforeach ?>
                <?php $no++ ?>
            <?php endforeach ?>

        </tbody>
    </table>