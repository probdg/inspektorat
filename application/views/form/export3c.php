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
<table width="100%">
    <thead>

        <tr>
            <th rowspan="3" width="10">No.</th>
            <th rowspan="3">Tujuan/Sasaran Strategis/Program</th>
            <th width="120" rowspan="3">Indikator Kinerja</th>
            <th colspan="3">Risiko</th>
            <th colspan="2">Sebab</th>
            <th rowspan="3">C/UC</th>
            <th colspan="2">Dampak</th>
        </tr>
        <tr>
            <th rowspan="2">Uraian</th>
            <th width="100">Kode</th>
            <th rowspan="2">Pemilik</th>
            <th rowspan="2">Uraian</th>
            <th rowspan="2">Sumber</th>
            <th rowspan="2">Uraian</th>
            <th rowspan="2">Pihak Yang Terkena</th>
        </tr>
        <tr>
            <th>Risiko</th>
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

    <tbody>
        <?php $no  = 1;
        foreach ($output as $out) : ?>
            <?php
            $risk = $this->db->get_where('f3c_risk_operasional', ['kegiatan' => $out['id']])->result_array();
            $jumlahRisiko = count($risk);
            $jumlahRisiko == 0 ? $countRow  = 1 : $countRow  = $jumlahRisiko;

            ?>
            <tr>
                <td rowspan="<?= $countRow ?>"></td>
                <td rowspan="<?= $countRow ?>" valign="top"><?= $out['kegiatan'] ?></td>
                <td rowspan="<?= $countRow ?>" valign="top"><?= $out['output'] ?></td>
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
        <?php endforeach ?>

    </tbody>
</table>