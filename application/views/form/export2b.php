<link href="<?= base_url('assets/table.css') ?>" rel="stylesheet" type="text/css" />
<h4 class="text-center"> PENETAPAN KONTEKS <span class="text-red"> RISIKO STRATEGIS OPD</span></h4>
<?php
if (isset($konteks)) {
    $konteksUrusan = $konteks['urusan'];
} else {
    $konteksUrusan = '';
}
?>
<table>
    <tr>
        <th>Nama Pemda * </th>
        <th colspan="3"><?= ucwords(strtolower($pemda)) ?></th>
    </tr>
    <tr>
        <th>Tahun Penilaian * </th>
        <th colspan="3"><?= $tahun ?></th>
    </tr>
    <tr>
        <th>Periode yang dinilai * </th>
        <th colspan="3"><?= $periode ?></th>
    </tr>
    <tr>
        <th>Urusan Pemerintahan * </th>
        <th colspan="3"><?= $konteksUrusan ?></th>
    </tr>
    <tr>
        <th>OPD yang Dinilai * </th>
        <th colspan="3"><?= $nama_opd ?></th>
    </tr>
    <tr>
        <th>Sumber Data * </th>
        <th colspan="3">Renstra <?= $nama_opd ?></th>
    </tr>
    <tr>
        <th>Tujuan Strategis</th>
        <th colspan="3"><?= $tujuan ?></th>
    </tr>
    <tr>
        <th>Sasaran Strategis</th>
        <th colspan="3">
            <?php
            foreach ($kontekSasaran as $ksasaran) : ?>
                <?= $ksasaran['sasaran'] ?><br>
            <?php endforeach ?>
        </th>
    </tr>
    <tr>
        <th valign="top" rowspan="<?= count($iku) > 0 ? count($iku) + 1 : 1 ?>">IKU Renstra OPD</th>
        <th>NO</th>
        <th>IKU</th>
        <th> <?= $tahun ?></th>
    </tr>
    <?php $no  = 1;
    foreach ($iku as $i) : ?>
        <tr>
            <!-- NO -->
            <th><?= $no++ ?></th>
            <!-- IKU -->
            <th><?= $i['iku'] ?></th>
            <!-- //TARGET -->
            <th><?= $i['target'] ?></th>
        </tr>
    <?php endforeach ?>

    <tr>
        <th>Informasi Lain</th>
        <th colspan="3"><?= $program ?></th>
    </tr>
    <tr>
        <th>Tujuan, Sasaran, IKU dan Program yang akan dilakukan penilaian risiko</th>
        <th colspan="3">
            Tujuan Strategis :<br> <?= $tujuan ?><br>
            <br>

            Sasaran Strategis:<br>
            <?php
            foreach ($kontekSasaran as $ks) : ?>
                <?= $ks['sasaran'] ?><br>
            <?php endforeach ?>
            <br>

            IKU Strategis:<br>
            <?php
            foreach ($iku_prioritas as $a) : ?>
                - <?= $a['iku'] ?> <br>
            <?php endforeach ?>


        </th>
    </tr>
    <tr>
        <td style="border: 0;" colspan="2"></td>
        <td style="border: 0;" colspan="2" align="center">Sumedang , <?= date_indo(date('d-m-Y')) ?><br>
            <?= $pejabat['jabatan_pj'] ?>

            <br>
            <br>
            <br>
            <u><?= $pejabat['nama_pj'] ?></u><br>
            <?= $pejabat['nip_pj'] ?>

        </td>
    </tr>
</table>