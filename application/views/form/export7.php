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
   <h4 class="text-center">RTP atas Hasil Identifikasi Risiko </h4>
   Nama Pemda * : <?= ucwords(strtolower($pemda)) ?></br>
   Nama OPD * : <?= ucwords(strtolower($nama_opd)) ?></br>
   Tahun Penilaian * : <?= $tahun ?></br>
   Tujuan Strategis * :<?= $konteksTujuan ?></br>
   Urusan Pemerintahan * : <?= $konteksUrusan ?>

   <table class="a" id="">
       <thead>
           <tr>
               <th width="10">No.</th>
               <th>Risiko Prioritas </th>
               <th>Kode Risiko</th>
               <th>Uraian Pengendalian yang Sudah Ada *)</th>
               <th width="80"> Celah Pengendalian</th>
               <th>Rencana Tindak Pengendalian</th>
               <th>Pemilik/ Penangung Jawab</th>
               <th>Target Waktu Penyelesaian</th>
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
           <tr>
               <th>I</th>
               <th>Risiko Strategis</th>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
           </tr>
           <?php $no_pemda = 1;
            foreach ($risk_pemda as $risk_pemda) : ?>
               <tr>
                   <td valign="top" align="center"><?= $no_pemda++ ?></td>
                   <td valign="top" align="left"><?= $risk_pemda['uraian_risiko'] ?></td>
                   <td valign="top" align="left"><?= $risk_pemda['kode_risiko'] ?></td>
                   <td valign="top" align="left"><?= $risk_pemda['uraian_pengendalian'] ?></td>
                   <td valign="top" align="left"><?= $risk_pemda['celah_pengendalian'] ?></td>
                   <td valign="top" align="left"><?= $risk_pemda['rencana_tindak_pengendalian'] ?></td>
                   <td valign="top" align="center"><?= $risk_pemda['pemilik'] ?></td>
                   <td valign="top" align="left"><?= $risk_pemda['twp'] ?></td>

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
                   <th></th>

               </tr>
               <?php $no_opd = 1;
                foreach ($value['detail'] as $ropd) : ?>
                   <tr>
                       <td valign="top" align="center"><?= $no_opd++ ?></td>
                       <td valign="top" align="left"><?= $ropd['uraian_risiko'] ?></td>
                       <td valign="top" align="left"><?= $ropd['kode_risiko'] ?></td>
                       <td valign="top" align="left"><?= $ropd['uraian_pengendalian'] ?></td>
                       <td valign="top" align="left"><?= $ropd['celah_pengendalian'] ?></td>
                       <td valign="top" align="left"><?= $ropd['rencana_tindak_pengendalian'] ?></td>
                       <td valign="top" align="center"><?= $ropd['pemilik'] ?></td>
                       <td valign="top" align="left"><?= $ropd['twp'] ?></td>

                   </tr>
               <?php endforeach ?>
               <?php $no++ ?>
           <?php endforeach ?>
           <?php
            $no_oper_up = 1;
            foreach ($risk_operasional as $key => $vOp) : ?>
               <tr>
                   <th valign="top"><?= getRomawi($no) ?></th>
                   <th>Risiko Operasional OPD <?= $no_oper_up++ ?>: <?= $vOp['nama_opd'] ?></th>
                   <th></th>
                   <th></th>
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
                       <td valign="top" align="left"><?= $roper['uraian_pengendalian'] ?></td>
                       <td valign="top" align="left"><?= $roper['celah_pengendalian'] ?></td>
                       <td valign="top" align="left"><?= $roper['rencana_tindak_pengendalian'] ?></td>
                       <td valign="top" align="center"><?= $roper['pemilik'] ?></td>
                       <td valign="top" align="left"><?= $roper['twp'] ?></td>
                   </tr>
               <?php endforeach ?>
               <?php $no++ ?>
           <?php endforeach ?>
       </tbody>
   </table>