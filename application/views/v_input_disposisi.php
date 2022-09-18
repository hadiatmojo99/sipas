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
<?php foreach ($data_disposisi as $tb) { ?>
							<form action="<?= base_url('dashboard/proses_inputdisposisi') ?>" enctype="multipart/form-data"
								role="form" method="post">
                                <input type="text" class="form-control" name="id_masuk" id="id_masuk"
										 value="<?= $tb['id_masuk']?>" hidden>
										 <?php } ?>
                                <label for="tgl_disposisi">Tanggal Disposisi</label>
                                <div class="input-group date">
                                    <input type="text" class="form-control" name="tgl_disposisi"
                                        id="tgl_disposisi" placeholder="Tanggal Disposisi" >
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>                                                                        
                                </div>
                                <span class="text-danger"><?= form_error('tgl_disposisi'); ?></span>
                                
                                <label for="tujuan">Tujuan</label>
                                <div class="form-group">
								<select class="form-control" id="tujuan" name="tujuan">
   <option selected="">---Pilih Tujuan---</option>
   <?php foreach($data_pilih as $d) { ?>
    <option value="<?php echo $d['jabatan'];?>"> <?php echo $d['jabatan']; ?></option>
   <?php } ?>
  </select>
                                    <span class="text-danger"><?= form_error('tujuan'); ?></span>
                                    
                                    <label for="isi">Isi Ringkas</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" name="isi"
                                            id="isi" placeholder="Isi Ringkas" >
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>                                                                        
                                    </div>
                                    <span class="text-danger"><?= form_error('isi'); ?></span>

                                    <label for="sifat">Sifat</label>
								<div class="form-group">
									<select class="form-control" id="sifat" name="sifat">
   <option selected="">---Pilih Sifat---</option>
    <option value="Sangat Segera">Sangat Segera</option>
	<option value="Segera">Segera</option>
	<option value="Penting">Penting</option>
	<option value="Biasa">Biasa</option>   
  </select>
								</div>
                                <span class="text-danger"><?= form_error('sifat'); ?></span>
								</div>

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
