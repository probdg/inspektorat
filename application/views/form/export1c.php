    <link href="<?= base_url('assets/table.css') ?>" rel="stylesheet" type="text/css" />

    <h4 class="text-center">
        Simpulan Survei Persepsi atas <span style="color:red"> Lingkungan Pengendalian Intern</span>
        <br>

        di <?= ucwords(strtolower($pemda)) ?>
    </h4>

    Nama Pemda * : <?= ucwords(strtolower($pemda)) ?></br>

    <?php if ($this->session->userdata('opd') != 56) : ?>
        Nama OPD * : <?= ucwords(strtolower($nama_opd)) ?></br>
    <?php endif ?>
    Tahun Penilaian * : <?= $tahun ?></br>
    <table border="1" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th rowspan="2" width="10">No.</th>
                <th rowspan="2">Sub Unsur</th>
                <th colspan="2">Hasil Reviu Dokumen</th>
                <th colspan="2">Hasil Survei Persepsi</th>
                <th rowspan="2" width="80">Simpulan</th>
                <th rowspan="2">Penjelasan</th>
            </tr>
            <tr>
                <th width="40">Hasil</th>
                <th>Uraian</th>
                <th width="40">Hasil</th>
                <th>Uraian</th>
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
            </tr>
        </thead>
        <tbody>

            <?php foreach ($data as $data) : ?>
                <?php
                $countReviu =  count($data['reviu']);
                if ($countReviu == 0) {
                    $rows = 1;
                } else {
                    $rows = $countReviu;
                }
                ?>
                <tr>
                    <td valign="top" rowspan="<?= $rows ?>"><?= $data['no'] ?></td>
                    <td valign="top" rowspan="<?= $rows ?>"><?= $data['question'] ?></td>
                    <td valign="top" align="center"><?= isset($data['reviu'][0]['nilai']) ? $data['reviu'][0]['nilai'] : '' ?></td>
                    <td valign="top"><?= isset($data['reviu'][0]['kelemahan']) ? $data['reviu'][0]['kelemahan'] : '' ?></td>
                    <td valign="middle" align="center" rowspan="<?= $rows ?>"><?= $data['nilai'] ?></td>
                    <td valign="top" rowspan="<?= $rows ?>"><?= $data['keterangan'] ?></td>
                    <td valign="middle" align="center" rowspan="<?= $rows ?>"><?= $data['simpulan'] ?></td>
                    <td valign="middle" rowspan="<?= $rows ?>"><?= $data['penjelasan'] ?></td>
                </tr>
                <?php for ($i = 1; $i < $countReviu; $i++) : ?>
                    <tr>
                        <td valign="top" align="center"><?= isset($data['reviu'][$i]['nilai']) ? $data['reviu'][$i]['nilai'] : '' ?></td>
                        <td valign="top"><?= isset($data['reviu'][$i]['kelemahan']) ? $data['reviu'][$i]['kelemahan'] : '' ?></td>
                    </tr>
                <?php endfor ?>
            <?php endforeach ?>
        </tbody>
    </table>