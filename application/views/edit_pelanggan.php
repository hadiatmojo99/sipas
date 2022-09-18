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
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash')?>"></div>
			<div class="row">
				<!-- Pie Chart -->
				<div class="container-fluid">
					<div class="card shadow">
						<!-- Card Header - Dropdown -->
						<div class="card-header">
							<h6>Edit Data</h6>
						</div>
						<!-- Card Body -->
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
                                <?php foreach ($data_pelanggan as $tb) { 
                              
                              ?>
									<form action="<?= base_url('dashboard/proses_edit') ?>"
										enctype="multipart/form-data" role="form" method="post">
										<label for="nama">Nama</label>
										<div class="form-group">
											<input type="text" class="form-control" name="nama" id="nama"
												placeholder="Nama" value="<?= $tb['nama']?>">
										</div>

										<label for="nomorkwh">Nomor KWH</label>
										<div class="form-group">
											<input type="text" class="form-control" name="nomorkwh" id="nomorkwh"
												placeholder="Nomor KWH" value="<?= $tb['nomor_kwh']?>">
										</div>
										<div class="form-group">
											<label for="daya">Daya</label>
											<select class="form-control" name="daya" id="daya">
                                                <option selected><?= $tb['daya']?></option>
												<option value="900 VA">900 VA</option>
												<option value="1300 VA">1300 VA</option>
												<option value="2200 VA">2200 VA</option>
												<option value="3500-5500 VA">3500-5500 VA</option>
												<option value="6600 VA ke atas">6600 VA ke atas</option>
												<option value="6600 VA - 200 kVA">6600 VA - 200 kVA</option>
											</select>
										</div>
                                        <?php } ?>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="alamat">Alamat</label>
										<input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat"
											aria-describedby="helpId" value="<?= $tb['alamat']?>">
									</div>

									<div class="form-group">
										<label for="tarifkwh">Tarif KWH</label>
										<select class="form-control" name="tarifkwh" id="tarifkwh">
                                            <option selected><?= $tb['tarif_kwh']?></option>
											<option value="Rp 1.352">Daya 900 VA, Rp 1.352</option>
											<option value="Rp 1.444,70">Daya 1300 VA, Rp 1.444,70</option>
											<option value="Rp 1.444,70">Daya 2200 VA, Rp 1.444,70</option>
											<option value="Rp 1.444,70">Daya 3500-5500 VA, Rp 1.444,70</option>
											<option value="Rp 1.444,70">Daya 6600 VA ke atas, Rp 1.444,70</option>
											<option value="Rp 1.444,70">Daya 6600 VA - 200 kVA, Rp 1.444,70</option>
										</select>
										<small id="helpId" class="text-muted">Harga per kwh saat ini</small>
									</div>

								</div>
								<div class="card-footer">
									<button type="submit" class="btn btn-primary tombol-disimpan">Simpan</button>
								</div>
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
