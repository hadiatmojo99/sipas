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
								<h4>Tambah Surat Masuk</h4>
							</center>
						</div>
						<!-- Card Body -->
						<div class="card-body">

							<form action="<?= base_url('dashboard/proses_addmasuk') ?>" enctype="multipart/form-data"
								role="form" method="post">
                                <label for="tgl_masuk">Tanggal Masuk</label>
                                <div class="input-group date">
                                    <input type="text" class="form-control" name="tgl_masuk"
                                        id="tgl_masuk" placeholder="Tanggal Masuk">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>                                                                        
                                </div>
                                <span class="text-danger"><?= form_error('tgl_masuk'); ?></span>
                                
                                <label for="nomor">Nomor Masuk</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nomor" id="nomor" placeholder="Nomor">
                                    <span class="text-danger"><?= form_error('nomor'); ?></span>
                                    
                                    <label for="tgl_surat">Tanggal Surat</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" name="tgl_surat"
                                            id="tgl_surat" placeholder="Tanggal Surat">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>                                                                        
                                    </div>
                                    <span class="text-danger"><?= form_error('tgl_surat'); ?></span>

                                    <label for="pengirim">Nama Pengirim</label>
								<div class="form-group">
									<input type="text" class="form-control" name="pengirim" id="pengirim"
										placeholder="Nama Pengirim Surat">
								</div>
                                <span class="text-danger"><?= form_error('pengirim'); ?></span>
								</div>
								<label for="perihal">Perihal Surat</label>
								<div class="form-group">
									<input type="text" class="form-control" name="perihal" id="perihal"
										placeholder="Perihal">
								</div><span class="text-danger"><?= form_error('perihal'); ?></span>

								<label for="berkas">Upload Surat</label>
								<div class="input-group mb-3">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="berkas" name="berkas" accept="application/pdf">
										<label class="custom-file-label" for="berkas">Choose file</label>
									</div>
									
								</div>
                                <?php if (isset($error)) : ?>
					<div class="text-danger"><?= $error ?></div>
				<?php endif; ?>
                                


								<div class="card-footer">
									<button type="submit" class="btn btn-primary tombol-disimpan">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

</div>
</section>
</div>
