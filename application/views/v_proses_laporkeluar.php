<center><h3>AGENDA BUKU SURAT KELUAR
</br>TAHUN <?php echo date('Y') ?>
</br>MAN 1 BEKASI</h3></center>


<!-- <div>Tanggal dicetak : <?= date('d-m-Y')?></div> -->
<div>Bulan : <?= bulan(date('m', strtotime($bulan)));?> </div>
<table id="data_keluar" class="table table-hover" border="1" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No.</th>                                    
                                    <th>Tujuan</th>
                                    <th>Tanggal Surat</th>
									<th>Nomor Surat</th>
                                    <th>Keterangan</th>                                                                                                           
                                    <!--<th>Aksi</th>-->
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php 
                            $i = 1;
                            foreach ($data_keluar as $tb) { 
                                ?>
  <tr>    
      <td style="text-align:center"><?= $i++?></td>
      <td><?php echo $tb['tujuan_keluar']; ?></td>
      <td><?php echo date_indo($tb['tgl_keluar']);?></td>
	    <td><?php echo $tb['nomor_keluar'];?></td>
      <td><?php echo $tb['keterangan_keluar'];?></td>
      <!-- SAMPE SINI KEMARIN ! -->     





  </tr>
      
<?php } ?>
                            </tbody>
                        </table>
                            </br>
                        <div>Jumlah Surat : <?= $jml_keluar; ?></div>                        

<p style="text-align: left; float:right">Bekasi, <?= date_indo(date('Y-m-d'))?>
</br>
                            </br>
                            </br>
                            </br>
                            </br>
                            </br>
                            Hadi Atmojo

</p>                                                        
<script>
window.print();
</script>