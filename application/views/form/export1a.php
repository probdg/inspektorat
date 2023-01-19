<table>
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
        <?php foreach ($master as $m) : ?>
            <tr>
                <th><?= $m['urutan'] ?></td>
                <th colspan="3"><?= $m['question'] ?></td>
                <th style="text-align:center;">MEMADAI / KURANG MEMADAI</td>
            </tr>
            <?php $no = 1;
            foreach ($m['detail'] as $d) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $d['questions'] ?></td>
                    <td><?= $d['modus'] ?></td>
                    <td><?= $d['keterangan'] ?></td>
                    <td style="text-align:center;"><?= $d['simpulan'] ?></td>

                </tr>
            <?php endforeach ?>
        <?php endforeach ?>
    </tbody>
</table>