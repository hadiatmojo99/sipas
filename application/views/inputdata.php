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
							<h6>Tampah Data Pelanggan</h6>
						</div>
						<!-- Card Body -->
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<form action="<?= base_url('dashboard/proses_input') ?>"
										enctype="multipart/form-data" role="form" method="post">
										<label for="nama">Nama</label>
										<div class="form-group">
											<input type="text" class="form-control" name="nama" id="nama"
												placeholder="Nama">
										</div>

										<label for="nomorkwh">Nomor KWH</label>
										<div class="form-group">
											<input type="text" class="form-control" name="nomorkwh" id="nomorkwh"
												placeholder="Nomor KWH">
										</div>
										<div class="form-group">
											<label for="daya">Daya</label>
											<select class="form-control" name="daya" id="daya">
												<option value="900 VA">900 VA</option>
												<option value="1300 VA">1300 VA</option>
												<option value="2200 VA">2200 VA</option>
												<option value="3500 - 5500 VA">3500 - 5500 VA</option>
												<option value="6600 VA ke atas">6600 VA ke atas</option>
												<option value="6600 VA - 200 kVA">6600 VA - 200 kVA</option>
											</select>
										</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="alamat">Alamat</label>
										<input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat"
											aria-describedby="helpId">
									</div>

									<div class="form-group">
										<label for="tarifkwh">Tarif KWH</label>
										<select class="form-control" name="tarifkwh" id="tarifkwh">
											<option value="Rp 1.352">Daya 900 VA, Rp 1.352</option>
											<option value="Rp 1.444,70">Daya 1300 VA, Rp 1.444,70</option>
											<option value="Rp 1.444,70">Daya 2200 VA, Rp 1.444,70</option>
											<option value="Rp 1.444,70">Daya 3500 - 5500 VA, Rp 1.444,70</option>
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
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2020 <a href="<?=base_url() ?>assets/https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> BETA
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?=base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?=base_url() ?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?=base_url() ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?=base_url() ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=base_url() ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=base_url() ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?=base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?=base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url() ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url() ?>assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url() ?>assets/dist/js/pages/dashboard.js"></script>
<script src="<?=base_url() ?>assets/js/script.js"></script>
</body>
</html>
