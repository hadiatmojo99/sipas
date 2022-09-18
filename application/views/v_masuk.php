<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row">

			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<div class="table-wrapper">
							<div class="table-title">
								<div class="row">
									<div class="col">
										<h2>Data Surat Masuk</h2>
									</div>
								</div>
								<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash')?>"></div>
								<?php if($this->session->flashdata('flash')) : ?>
								<?php endif; ?>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
                    <?php if($this->session->userdata('jabatan') == 'Admin' || $this->session->userdata('jabatan') == 'Staff' ) { ?>
											<a href="<?= base_url('dashboard/tambah_masuk')?>" class="btn btn-primary">Tambah
												Data</a>
                        <?php } ?>
                        <!-- <a href="<?= base_url('dashboard/bersihkan_masuk')?>" class="btn btn-danger">Kosongkan Tabel</a> -->
										</div>
									</div>
									<div class="col-md-6">
									</div>
								</div>
							</div>
							<table id="data_masuk" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Pengirim</th>
                                    <th>Tanggal Terima</th>
									                  <th>Nomor Surat</th>
                                    <th>Perihal</th>                                    
                                    <?php if($this->session->userdata('jabatan') == 'Admin' || $this->session->userdata('jabatan') == 'Staff' ) { ?>
                                    <th>Arsip Surat</th>
                                    <?php } ?>
                                    <th>Keterangan</th>
                                    <?php if($this->session->userdata('jabatan') == 'Admin' || $this->session->userdata('jabatan') == 'Staff' ) { ?>
                                    <th>Aksi</th>
                                    <?php } ?>
                                    <!--<th>Aksi</th>-->
                                </tr>
                            </thead>

                            <tbody>
                            <?php
                            $no = 1;
                            foreach ($data_masuk as $tb) {
                                ?>
  <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $tb['pengirim']; ?></td>
      <td><?php echo date_indo($tb['tgl_masuk']);?></td>
	    <td><?php echo $tb['nomor_masuk'];?></td>
      <td><?php echo $tb['perihal'];?></td>
      <!-- SAMPE SINI KEMARIN ! -->
      <?php if($this->session->userdata('jabatan') == 'Admin' || $this->session->userdata('jabatan') == 'Staff' ) { ?>
      <td><?php
      if ($tb['arsip_masuk'] != '') { ?>
          <a class="btn btn-success" target="_blank" href="<?= base_url().'assets/berkas/masuk/'.$tb['arsip_masuk'];?>">Lihat</a>
      <?php } ?>
      <?php if ($tb['arsip_masuk'] == '') { ?>
          <?= 'Belum diupload' ;?>
      <?php } ?></td>
      <?php } ?>
      <td>
      <?php if($this->session->userdata('jabatan') == 'Admin' || $this->session->userdata('jabatan') == 'Staff' ) { ?>
      <?php echo $tb['keterangan'];?>
      <?php }else{ ?>
        <a class="btn btn-success" href="<?= base_url().'dashboard/detail_masuk/'.$tb['id_masuk'];?>">Detail</a>
      <?php } ?>
      </td>



      <?php if($this->session->userdata('jabatan') == 'Admin' || $this->session->userdata('jabatan') == 'Staff' ) { ?>
      <td>
      <?php
      if ($tb['arsip_masuk'] == '') { ?>
<div class="btn-group">
  <!-- <button type="button" class="btn-sm btn-primary">Aksi</button> -->
  <button type="button" class="btn-sm btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Aksi
  </button>
  <div class="dropdown-menu">
  <a class="dropdown-item" href="<?= base_url().'dashboard/edit_masuk/'.$tb['id_masuk'];?>">Edit Surat</a>
    <a class="dropdown-item tombol-hapus" href="<?= base_url().'dashboard/hapus_masuk/'.$tb['id_masuk'];?>">Hapus</a>    
  </div>
</div>
<?php }else{ ?>
  <div class="btn-group">
  <!-- <button type="button" class="btn-sm btn-primary">Aksi</button> -->
  <button type="button" class="btn-sm btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Aksi
  </button>
  <div class="dropdown-menu">
<?php if ($tb['keterangan'] == 'Belum Disposisi') { ?>
  <a class="dropdown-item" href="<?= base_url().'dashboard/disposisi/'.$tb['id_masuk'];?>">Disposisi</a>
  <a class="dropdown-item" href="<?= base_url().'dashboard/edit_masuk/'.$tb['id_masuk'];?>">Edit Surat</a>
  <a class="dropdown-item tombol-hapus" href="<?= base_url().'dashboard/hapus_masuk/'.$tb['id_masuk'];?>">Hapus</a>
<?php }else{ ?>
  <a class="dropdown-item" href="<?= base_url().'dashboard/edit_disposisi/'.$tb['id_masuk'];?>">Edit Disposisi</a>
    <a class="dropdown-item" href="<?= base_url().'dashboard/edit_masuk/'.$tb['id_masuk'];?>">Edit Surat</a>
    <a class="dropdown-item tombol-hapus" href="<?= base_url().'dashboard/hapus_masuk/'.$tb['id_masuk'];?>">Hapus</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="<?= base_url().'dashboard/detail_masuk/'.$tb['id_masuk'];?>">Detail</a>
  </div>
</div>
<?php } ?>
    <?php } ?>
										</td>
                    <?php } ?>
  </tr>      
<?php } ?>
                            </tbody>                            
                        </table>
						</div>
					</div>
				</div>
			</div>
	</section>
</div>
<!-- DataTables -->
<script type="text/javascript">
	$(document).ready(function(){
		$('#data_masuk').DataTable({
      "order": [[ 0, "asc" ]]
    });
	});
</script>


 <!-- /.card -->
 </section>
          <!-- /.Left col -->
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<footer class="main-footer">
<strong>Copyright &copy; 2022 <a href="https://instagram.com/hadiatmojo99">Hadi Atmojo</a>.</strong>
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
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- SweetAlert -->
<script src="<?=base_url() ?>assets/package/dist/sweetalert2.all.min.js"></script>
<script src="<?=base_url() ?>assets/js/myscript.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() ?>assets/dist/js/pages/dashboard.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>assets/js/jquery.dataTables.js"></script>
<!--Data Tabelnya-->
<script type="text/javascript">
	$(document).ready(function() {
    var t = $('#data_masuk').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 2, 'asc' ]]
    } );

    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
</script>
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>