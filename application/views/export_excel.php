<h1>Data Siswa</h1><hr>
<table border="1" cellpadding="8">
<tr>
  <th>No</th>
  <th>NIS</th>
  <th>Nama</th>
  <th>Jenis Kelamin</th>
  <th>Alamat</th>
</tr>
<?php
$i = 1;
if( ! empty($laporan)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
  foreach($laporan as $data) { // Lakukan looping pada variabel siswa dari controller
    echo "<tr>";
    echo "<td>".$i++."</td>";
    echo "<td>".$data->nama."</td>";
    echo "<td>".$data->nomor_kwh."</td>";
    echo "<td>".$data->daya."</td>";
    echo "<td>".$data->alamat."</td>";
    echo "</tr>";
  }
}else{ // Jika data tidak ada
  echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
}
?>
</table>