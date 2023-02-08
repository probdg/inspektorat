<table>
    <thead>
        <tr>
            <td>ID KEGIATAN</td>
            <td>NAMA KEGIATAN</td>
            <td>NAMA SUB KEGIATAN</td>
            <td>SATUAN </td>
            <td>TARGET</td>
            <td>ATRIBUT</td>
            <td>Keterangan : Baris Kedua yang akan di proses </td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($output as $output) : ?>

            <tr>
                <td><?= $output['id'] ?></td>
                <td><?= $output['kegiatan'] ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        <?php endforeach ?>

    </tbody>
</table>