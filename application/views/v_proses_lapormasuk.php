<style type="text/css">
.left { text-align: left;}
.right { text-align: right;}
.center { text-align: center;}
.justify { text-align: justify;}
</style>

<center><h3>AGENDA BUKU SURAT MASUK
</br>TAHUN <?php echo date('Y') ?>
</br>MAN 1 BEKASI</h3></center>


<!-- <div>Tanggal dicetak : <?= date('d-m-Y')?></div> -->
<div>Bulan : <?= bulan(date('m', strtotime($bulan)));?> </div>
<table id="data_keluar" class="table table-hover" border="1" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No.</th>                                    
                                    <th>Pengirim</th>
                                    <th>Tanggal Terima</th>
									<th>Nomor Surat</th>
                                    <th>Perihal</th>                                                                                                           
                                    <!--<th>Aksi</th>-->
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php 
                            $i = 1;
                            foreach ($data_masuk as $tb) { 
                                ?>
  <tr>    
      <td style="text-align:center"><?= $i++?></td>
      <td><?php echo $tb['pengirim']; ?></td>
      <td><?php echo date_indo($tb['tgl_masuk']);?></td>
	    <td><?php echo $tb['nomor_masuk'];?></td>
      <td><?php echo $tb['perihal'];?></td>
      <!-- SAMPE SINI KEMARIN ! -->     





  </tr>
      
<?php } ?>
                            </tbody>
                        </table>
                            </br>
                        <div>Jumlah Surat : <?= $jml_masuk; ?></div>                        

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