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
<h4 class="text-center">Identifikasi Risiko Strategis Pemerintah Daerah</h4>
Nama Pemda * : <?= ucwords(strtolower($pemda)) ?></br>
Nama OPD * : <?= ucwords(strtolower($nama_opd)) ?></br>
Tahun Penilaian * : <?= $tahun ?></br>
Periode Yang Dinilai * :<?= $periode ?></br>
Urusan Pemerintahan * : <?= $konteksUrusan ?>
<table class="a" width="100%">

    <thead>
        <tr>
            <th rowspan="2" width="10">No.</th>
            <th rowspan="2">Tujuan/Sasaran Strategis/Program</th>
            <th rowspan="2">Indikator Kinerja</th>
            <th colspan="3">Risiko</th>
            <th colspan="2">Sebab</th>
            <th rowspan="2">C/UC</th>
            <th colspan="2">Dampak</th>
        </tr>
        <tr>
            <th>Uraian</th>
            <th>Kode Risiko</th>
            <th>Pemilik</th>
            <th>Uraian</th>
            <th>Sumber</th>
            <th>Uraian</th>
            <th>Pihak Yang Terkena</th>
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
            <th>j</th>
            <th>k</th>
        </tr>

    </thead>
    <tbody>
        <tr>
            <td> </td>
            <td>Tujuan Strategis Pemda : <?= $konteksTujuan ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?php $jumlahRisiko == 0 ? $countRow  = 1 : $countRow  = $jumlahRisiko; ?>
        <tr>
            <td></td>
            <td valign="top" rowspan="<?= $countRow ?>">Sasaran : <?php foreach ($kontekSasaran as $ksasaran) : ?>
                    <?= $ksasaran['no_urut'] ?> . <?= $ksasaran['sasaran'] ?><br>
                <?php endforeach ?></td>
            <td valign="top" rowspan="<?= $countRow ?>"><?= $konteksIku ?></td>
            <td valign="top"><?= !empty($risk) ? $risk[0]['uraian_risiko'] : '' ?></td>
            <td valign="top"><?= !empty($risk) ? $risk[0]['kode_risiko'] : '' ?></td>
            <td valign="top"><?= !empty($risk) ? $risk[0]['pemilik'] : '' ?></td>
            <td valign="top"><?= !empty($risk) ? $risk[0]['uraian_sebab'] : '' ?></td>
            <td valign="top"><?php if (!empty($risk))
                                    echo $risk[0]['sumber'] == '2' ? 'Internal' : 'Eksternal' ?></td>
            <td valign="top"><?= !empty($risk) ? $risk[0]['kendali'] : '' ?></td>
            <td valign="top"><?= !empty($risk) ? $risk[0]['uraian_dampak'] : '' ?></td>
            <td valign="top"><?= !empty($risk) ? $risk[0]['pihak_terkena'] : '' ?></td>
        </tr>
        <?php if ($risk > 1) : ?>
            <?php for ($i = 1; $i < $jumlahRisiko; $i++) : ?>
                <tr>
                    <td valign="top"></td>
                    <td valign="top"><?= !empty($risk) ? $risk[$i]['uraian_risiko'] : '' ?></td>
                    <td valign="top"><?= !empty($risk) ? $risk[$i]['kode_risiko'] : '' ?></td>
                    <td valign="top"><?= !empty($risk) ? $risk[$i]['pemilik'] : '' ?></td>
                    <td valign="top"><?= !empty($risk) ? $risk[$i]['uraian_sebab'] : '' ?></td>
                    <td valign="top"><?php if (!empty($risk))
                                            echo $risk[$i]['sumber'] == '2' ? 'Internal' : 'Eksternal' ?></td>
                    <td valign="top"><?= !empty($risk) ? $risk[$i]['kendali'] : '' ?></td>
                    <td valign="top"><?= !empty($risk) ? $risk[$i]['uraian_dampak'] : '' ?></td>
                    <td valign="top"><?= !empty($risk) ? $risk[$i]['pihak_terkena'] : '' ?></td>
                </tr>
            <?php endfor ?>
        <?php endif ?>
    </tbody>

</table>