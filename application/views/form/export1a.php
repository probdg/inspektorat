    <link href="<?= base_url('assets/table.css') ?>" rel="stylesheet" type="text/css" />
    <h4 class="text-center"> KUESIONER PENILAIAN <span style="color:red"> LINGKUNGAN PENGENDALIAN INTERN</span>
        </br>
        CONTROL ENVIRONMENT EVALUATION (CEE)</h4>
    Nama Pemda * : <?= ucwords(strtolower($pemda)) ?></br>

    <?php if ($this->session->userdata('opd') != 56) : ?>
        Nama OPD * : <?= ucwords(strtolower($opd)) ?></br>
    <?php endif ?>
    Tahun Penilaian * : <?= $tahun ?></br>
    Periode yang dinilai * :<?= $periode ?></br>
    <table border="1" width="100%">
        <thead>

            <tr>
                <th width="10">No.</th>
                <th>PERTANYAAN /KUESIONER JAWABAN </th>
                <th colspan="2">RESPONDEN (R) </th>
                <th>SIMPULAN KUISIONER</th>
            </tr>

            <tr>
                <th>a</th>
                <th>b</th>
                <th colspan="2">c</th>
                <th>d</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $modus = '';
            $html = '';
            foreach ($master as $m) : ?>
                <?php $no = 1;
                $modus = [];
                foreach ($m['detail'] as $d) : ?>
                    <?php $modus[] = intval($d['modus']) ?>
                    <?php $html .= '<tr>
                    <td align="center">' . $no++ . '</td>
                    <td>' . $d['questions'] . '</td>
                    <td align="center">' . $d['modus'] . '</td>
                    <td>' . $d['keterangan'] . '</td>
                    <td style="text-align:center;">' . $d['simpulan'] . '</td></tr>' ?>
                <?php endforeach ?>
                <?php $hitungModus = modus($modus); ?>
                <tr>
                    <th class="text-center" width="5%"><?= $m['urutan'] ?></td>
                    <th width="50%"><?= $m['question'] ?></td>
                    <th class="text-center" width="5%"><?= $hitungModus == 0 ? '' : $hitungModus ?></th>
                    <th width="25%"></th>
                    <th width="15%" style="text-align:center;"><?= simpulan($hitungModus) ?></td>
                </tr>
                <?= $html ?>
            <?php endforeach ?>

        </tbody>
    </table>
    <?php

    function modus($array)
    {
        $v = array_count_values($array);
        arsort($v);
        foreach ($v as $k => $v) {
            $total = $k;
            break;
        }
        return $total;
    }
    function simpulan($nilai)
    {
        if ($nilai < 3) {
            if ($nilai == 0) {
                $hasil =  'Belum di isi';
            } else {
                $hasil =  'Kurang Memadai';
            }
        } else {
            if (in_array($nilai, [3, 4])) {
                $hasil = 'Memadai';
            } else {
                $hasil = 'Belum di Isi';
            }
        }
        return $hasil;
    }
    ?>