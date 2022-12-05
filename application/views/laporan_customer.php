<!DOCTYPE html>
<html><head>
    <title></title>
</head><body>
    <table>
        <tr>
            <th>ID</th>
            <th>NAMA</th>
            <th>TUJUAN</th>
            <th>KENDARAAN</th>
        </tr>

        <?php $no = 1;
        foreach($customer as $cust) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $cust->nama_customer ?></td>
            <td><?= $cust->tujuan ?></td>
            <td><?= $cust->nama_kendaraan ?></td>
        
        </tr>
        <?php endforeach ?>
    </table>
</body></html>