<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title?></title>
    <style type="text/css">
.table_struk {
	text-align: left;
}
</style>
</head>
<body>
    <p align='center'>STRUK BUKTI PEMBAYARAN LISTRIK</p>  
    
    <p>Tanggal : <?php echo date('d/m/Y'); ?></p>
        <?php foreach ($data_pelanggan as $tb) { ?>
            <table width="437" height="69" border="0">
  <tr>
    <th width="160" class="table_struk" scope="row">Nomor Meter</th>
    <td width="8">:</td>
    <td width="310"><?= $tb['nomor_kwh'];?></td>
  </tr>
  <tr>
    <th class="table_struk" scope="row">Nama</th>
    <td>:</td>
    <td><?= $tb['nama'];?></td>
  </tr>
  <tr>
    <th class="table_struk" scope="row">Tarif per kWH</th>
    <td>:</td>
    <td><?= $tb['tarif_kwh'];?></td>
  </tr>
  <tr>
    <th class="table_struk" scope="row">Daya</th>
    <td>:</td>
    <td><?= $tb['daya'];?></td>
  </tr>
  <tr>
    <th class="table_struk" scope="row">Total Pemakaian</th>
    <td>:</td>
    <td><?= $tb['total_pemakaian'];?></td>
  </tr>
  <tr>
    <th class="table_struk" scope="row">Total Tagihan</th>
    <td>:</td>
    <td><?= $tb['total_tagihan'];?></td>
  </tr>
</table>
<p>-----------------------------------------------------------------------------------------------------------------------------------------------------------</p>
<p>Simpan struk ini sebagai bukti pembayaran yang sah</p>
    <?php } ?>

    <script>
		window.print();
	</script>
</body>
</html>