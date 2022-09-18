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
			<div class="flash" data-flashdata="<?= $this->session->flashdata('gagal')?>"></div>
			<?php if($this->session->flashdata('gagal')) : ?>
			<?php endif; ?>
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
<?php foreach ($data_masuk as $tb) { ?>
							<form action="<?= base_url('dashboard/proses_editmasuk') ?>" enctype="multipart/form-data"
								role="form" method="post">
                                <input type="text" class="form-control" name="id_masuk" id="id_masuk"
										 value="<?= $tb['id_masuk']?>" hidden>
                                <label for="tgl_masuk">Tanggal Masuk</label>
                                <div class="input-group date">
                                    <input type="text" class="form-control" name="tgl_masuk"
                                        id="tgl_masuk" placeholder="Tanggal Masuk" value="<?= $tb['tgl_masuk']?>">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>                                                                        
                                </div>
                                <span class="text-danger"><?= form_error('tgl_masuk'); ?></span>
                                
                                <label for="nomor">Nomor Masuk</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nomor" id="nomor" placeholder="Nomor" value="<?= $tb['nomor_masuk']?>">
                                    <span class="text-danger"><?= form_error('nomor'); ?></span>
                                    
                                    <label for="tgl_surat">Tanggal Surat</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" name="tgl_surat"
                                            id="tgl_surat" placeholder="Tanggal Surat" value="<?= $tb['tgl_surat']?>">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>                                                                        
                                    </div>
                                    <span class="text-danger"><?= form_error('tgl_surat'); ?></span>

                                    <label for="pengirim">Nama Pengirim</label>
								<div class="form-group">
									<input type="text" class="form-control" name="pengirim" id="pengirim"
										placeholder="Nama Pengirim Surat" value="<?= $tb['pengirim']?>">
								</div>
                                <span class="text-danger"><?= form_error('pengirim'); ?></span>
								</div>
								<label for="perihal">Perihal Surat</label>
								<div class="form-group">
									<input type="text" class="form-control" name="perihal" id="perihal"
										placeholder="Perihal" value="<?= $tb['perihal']?>">
								</div><span class="text-danger"><?= form_error('perihal'); ?></span>

								<label for="#">Upload Surat</label>
								<div class="input-group mb-3">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="berkas" name="berkas" value='<?= $tb['arsip_masuk']?>' accept="application/pdf">
                                        <input type="text" class="form-control" name="arsip_lama" value="<?= $tb['arsip_masuk']?>" hidden>
										<label class="custom-file-label" for="berkas">Choose file</label>
									</div>
                                    <?php if($tb['arsip_masuk'] != '') { ?>
                                    <a class="btn btn-outline-secondary" href="<?= base_url().'assets/berkas/masuk/'.$tb['arsip_masuk'];?>" title="<?= $tb['nomor_masuk']?>" target="_blank">Lihat File</a>
									<?php } ?>
                                    <?php if($tb['arsip_masuk'] == '') { ?>
                                    <a class="btn btn-outline-secondary disabled" aria-disabled="true">Belum Diupload</a>
									<?php } ?>
								</div>
									
								</div>
                                <?php if (isset($error)) : ?>
					<div class="text-danger"><?= $error ?></div>
				<?php endif; ?>
                                


								<div class="card-footer">
									<button type="submit" class="btn btn-primary tombol-disimpan">Simpan</button>
									<a class="btn btn-primary tombol-disimpan" onclick="goBack()">Batal</a>
								</div>
							</form>
                            <?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>

</div>
</section>
</div>
