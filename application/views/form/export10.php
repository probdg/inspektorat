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
      <h4 class="text-center">Pencatatan Kejadian Risiko (RISK EVEN) DAN RTP </h4>
      Nama Pemda * : <?= ucwords(strtolower($pemda)) ?></br>
      Nama OPD * : <?= ucwords(strtolower($nama_opd)) ?></br>
      Tahun Penilaian * : <?= $tahun ?></br>
      Tujuan Strategis * :<?= $konteksTujuan ?></br>
      Urusan Pemerintahan * : <?= $konteksUrusan ?>
      <table>
          <thead>
              <tr>
                  <th rowspan="2" width="10">No.</th>
                  <th rowspan="2">“Risiko” yang Teridentifikasi</th>
                  <th rowspan="2">Kode Risiko</th>
                  <th colspan="3">Kejadian Risiko</th>
                  <th rowspan="2">Keterangan</th>
                  <th rowspan="2">RTP</th>
                  <th rowspan="2">Rencana Pelaksanaan RTP</th>
                  <th rowspan="2">Realisasi Pelaksanaan RTP</th>
                  <th rowspan="2">Keterangan</th>
              </tr>
              <tr>
                  <th>Tanggal terjadi</th>
                  <th>Sebab</th>
                  <th>Dampak</th>
              </tr>

          </thead>
          <tbody>
          </tbody>
      </table>