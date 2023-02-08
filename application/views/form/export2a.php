    <link href="<?= base_url('assets/table.css') ?>" rel="stylesheet" type="text/css" />
    <h4 class="text-center"> PENETAPAN KONTEKS <span class="text-red">RISIKO STRATEGIS PEMDA</span></h4>
    <table class="a" style="width:100%">
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
        <tr>
            <td>Nama Pemda * </td>
            <td><?= ucwords(strtolower($pemda)) ?></td>
        </tr>
        <tr>
            <td>Tahun Penilaian * </td>
            <td><?= $tahun ?></td>
        </tr>
        <tr>
            <td>Periode yang dinilai * </td>
            <td><?= $periode ?></td>
        </tr>
        <tr>
            <td>Sumber Data * </td>
            <td><?= isset($komite) ? $komite['sumber_data'] : ''; ?></td>
        </tr>
        <tr>
            <td><b>Visi *</b> </td>
            <td><?= isset($komite) ? $komite['visi'] : '' ?></td>
        </tr>
        <tr>
            <td>Misi Strategis RPJMD</td>
            <td>
                <ol>
                    <?php foreach ($misi as $misi) : ?>
                        <li><?= $misi['misi'] ?></li>
                    <?php endforeach ?>
                </ol>
            </td>
        </tr>
        <tr>
            <td><b>Penetapan konteks Misi Risiko Strategis Pemda<b></td>
            <td><?= $konteksMisi ?></td>
        </tr>
        <tr>
            <td>Tujuan Strategis RPJMD</td>
            <td>
                <ol>
                    <?php foreach ($tujuan as $tujuan) : ?>
                        <li><?= $tujuan['tujuan'] ?></li>
                    <?php endforeach ?>
                </ol>

            </td>
        </tr>
        <tr>
            <td><b>Penetapan Konteks Tujuan Risiko Strategis Pemda</b></td>
            <td><?= $konteksTujuan ?></td>
        </tr>
        <tr>
            <td>Sasaran RPJMD</td>
            <td class="sasaran">
                <ol>
                    <?php foreach ($sasaran as $sasaran) : ?>
                        <li><?= $sasaran['sasaran'] ?></li>
                    <?php endforeach ?>
                </ol>
            </td>
        </tr>
        <tr>
            <td><b>Penetapan Konteks Sasaran Risiko Strategis Pemda<b></td>
            <td>
                <ol style="list-style: none">
                    <?php foreach ($kontekSasaran as $ks) : ?>
                        <li><?= $ks['no_urut'] ?> . <?= $ks['sasaran'] ?></li>
                    <?php endforeach ?>
                </ol>
            </td>
        </tr>
        <tr>
            <td>IKU Sasaran RPJMD</td>
            <td>
                <ol>
                    <?php foreach ($iku as $iku) : ?>
                        <li><?= $iku['iku'] ?></li>
                    <?php endforeach ?>
                </ol>
            </td>
        </tr>
        <tr>
            <td><b>Penetapan Konteks IKU Risiko Strategis Pemda<b></td>
            <td><?= $konteksIku ?></td>
        </tr>
        <tr>
            <td>Prioritas pembangunan dan program unggulan</td>
            <td>

                <ol>

                    <?php foreach ($prioritas as $prioritas) : ?>
                        <?php if ($program == $prioritas['prioritas']) : ?>
                            <li><b><?= $prioritas['prioritas'] ?></b></li>
                        <?php else : ?>
                            <li><?= $prioritas['prioritas'] ?></li>

                        <?php endif ?>
                    <?php endforeach ?>
                </ol>
            </td>
        </tr>
        <tr>
            <td><b>Urusan Pemerintahan Daerah</b></td>
            <td> <?= $konteksUrusan ?></td>
        </tr>
        <tr>
            <td>Nama Dinas Terkait</td>
            <td>
                <ol>

                    <?php foreach ($dinas as $dinas) : ?>
                        <li><?= $dinas['nama_opd'] ?></li>
                    <?php endforeach ?>
                </ol>
            </td>
        </tr>
        <tr>
            <td>Tujuan, Sasaran, IKU dan Program yang akan dilakukan penilaian risiko</td>
            <td>
                <div class="row">
                    <div class="col-lg-12">
                        Tujuan ,<?= $konteksTujuan ?><br>
                        Sasaran, <?php foreach ($kontekSasaran as $ksasaran) : ?>
                            <?= $ksasaran['no_urut'] ?> . <?= $ksasaran['sasaran'] ?><br>
                        <?php endforeach ?>
                        IKU <?= $konteksIku ?><br>
                        Program <?= $konteksPrioritas ?>

                    </div>

            </td>
        </tr>
        <tr>
            <td></td>
            <td align="center">Sumedang , <?= date_indo(date('Y-m-d')) ?><br>
                <?= $pejabat['jabatan_pj'] ?>

                <br>
                <br>
                <br>

            </td>
        </tr>
    </table>