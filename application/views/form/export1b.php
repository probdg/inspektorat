    <link href="<?= base_url('assets/table.css') ?>" rel="stylesheet" type="text/css" />
    <h4 class="text-center">Control Enviromental Evaluatiom (CEE) Berdasarkan <span class="text-red">Dokumen</span></h4></br>
    Nama Pemda * : <?= ucwords(strtolower($pemda)) ?></br>

    <?php if ($this->session->userdata('opd') != 56) : ?>
        Nama OPD * : <?= ucwords(strtolower($nama_opd)) ?></br>
    <?php endif ?>
    Tahun Penilaian * : <?= $tahun ?></br>
    <table width="100%">
        <thead>
            <tr>
                <th>NO</th>
                <th>SUMBER DATA</th>
                <th>KELEMAHAN</th>
                <th>KLASIFIKASI</th>
                <th>SUB KLASIFIKASI</th>
                <th>NILAI</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($master) : ?>
                <?php $no = 1;
                foreach ($master as $list) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $list->sumberdata; ?></td>
                        <td><?= $list->kelemahan; ?></td>
                        <td><?= $list->question; ?></td>
                        <td><?= $list->subQuestion; ?></td>
                        <td><?= $list->nilai; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data</td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>