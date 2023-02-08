    <link href="<?= base_url('assets/table.css') ?>" rel="stylesheet" type="text/css" />
    <h4 class="text-center"> PENETAPAN KONTEKS <span class="text-red"> RISIKO OPERASIONAL OPD</span></h4>
    <?php
    if (isset($konteks)) {
        $program = $konteks['id_prioritas'];
        $konteksprogram = $konteks['prioritas'];
        $konteksUrusan = $konteks['urusan'];
    } else {
        $program = '';
        $konteksprogram = '';
        $konteksUrusan = '';
    } ?>
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
            <th>Program <?= $nama_opd ?> (Renja <?= $tahun ?>) dan Kegiatan Utama</th>
            <th colspan="3">
                <ol>
                    <?php foreach ($prioritas as $prioritas) : ?>
                        <?php if ($program == $prioritas['prioritas']) : ?>
                            <li><b><?= $prioritas['prioritas'] ?></b></li>
                        <?php else : ?>
                            <li><?= $prioritas['prioritas'] ?></li>

                        <?php endif ?>
                    <?php endforeach ?>
                </ol>
            </th>
        </tr>
        <tr>
            <th valign="top" rowspan="<?= count($output) > 0 ? count($output) + 1 : 1 ?>">Keluaran /Hasil Kegiatan</th>
            <th>NO</th>
            <th>Output / Outcome</th>
            <th><?= $tahun ?></th>
        </tr>
        <?php $no  = 1;
        foreach ($output as $i) : ?>
            <tr>
                <!-- NO -->
                <th><?= $no++ ?></th>
                <!-- IKU -->
                <th><?= $i['kegiatan'] ?></th>
                <!-- //TARGET -->
                <th><?= $i['target'] ?> <?= $i['satuan'] ?></th>
            </tr>
        <?php endforeach ?>
        <tr>
            <th>Informasi Lain</th>
            <th colspan="3"></th>
        </tr>
        <tr>
            <th>Kegiatan, dan indikator
                keluaran yang akan
                dilakukan penilaian risiko</th>
            <th colspan="3">
                <?= $konteksprogram ?>

            </th>
        </tr>
        <tr>
            <td style="border: 0;" colspan="2"></td>
            <td style="border: 0;" colspan="2" align="center">Sumedang , <?= date_indo(date('Y-m-d')) ?><br>
                <?= $pejabat['jabatan_pj'] ?>

                <br>
                <br>
                <br>
                <u><?= $pejabat['nama_pj'] ?></u><br>
                <?= $pejabat['nip_pj'] ?>

            </td>
        </tr>
    </table>