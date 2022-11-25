 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pritn Customer</title>
 </head>
 <body>
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
        <?php endforeach  ?>
    </table>

    <script type="text/javascript">
        window.print();
    </script>
 </body>
 </html>