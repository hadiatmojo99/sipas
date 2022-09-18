<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">			
			<div class="row">
				<!-- Pie Chart -->
				<div class="container-fluid">
					<div class="card shadow">
						<!-- Card Header - Dropdown -->
						<div class="card-header">
							<center>
								<h4><?= $title;?></h4>
							</center>
						</div>
						<!-- Card Body -->
						<div class="card-body">
<?php foreach ($data_disposisi as $tb) { ?>	
    <div class="container">
    <div class="row">						
    <div class="col-sm-2">
     <div><b>Nomor Surat</b></div>
     <div><b>Tanggal Diterima</b></div>
     <div><b>Pengirim</b></div>
     <div><b>Perihal</b></div>
     <div><b>Keterangan</b></div>
     <div><b>Tujuan</b></div>
     <div><b>Tanggal Disposisi</b></div>
     <div><b>Isi</b></div>
     <div><b>Sifat</b></div>
    </div>
    <div class="col-sm-10">
        <div>: <?= $tb['nomor_masuk'];?></div>
        <div>: <?= $tb['tgl_masuk'];?></div>
        <div>: <?= $tb['pengirim'];?></div>
        <div>: <?= $tb['perihal'];?></div>
        <div>: <?= $tb['keterangan'];?></div>
        <div>: <?= $tb['tujuan'];?></div>
        <div>: <?= $tb['tgl_disposisi'];?></div>
        <div>: <?= $tb['isi'];?></div>
        <div>: <?= $tb['sifat'];?></div>
    </div>
    </div>
    </div>
    <?php } ?>   
</div>

<div class="card-footer">
<a class="btn btn-success" target="_blank" href="<?= base_url().'assets/berkas/masuk/'.$tb['arsip_masuk'];?>">Arsip Surat Masuk</a>
<a class="btn btn-primary" target="_blank" href="<?= base_url().'assets/berkas/masuk/disposisi/'.$tb['arsip_disposisi'];?>">Arsip Disposisi</a>
</div>
					</div>
				</div>
			</div>
		</div>

</div>
</section>
</div>
