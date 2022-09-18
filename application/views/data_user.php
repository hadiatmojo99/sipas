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
										<h2>Data User</h2>
									</div>
								</div>
								<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash')?>"></div>
								<?php if($this->session->flashdata('flash')) : ?>
								<?php endif; ?>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<a href="<?= base_url('dashboard/tambah_user')?>" class="btn btn-primary">Tambah
												Data</a>											
										</div>
									</div>
									<div class="col-md-6">																			
									</div>
								</div>
							</div>							
							<table id="data_user" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>                                    
                                    <th>Nama</th>
									<th>Jabatan</th>
                                    <th>Username</th>
									<th>Email</th>
                                    <th>Aksi</th>                                    
                                    <!--<th>Aksi</th>-->
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php 
                            $no = 1;
                            foreach ($data_user as $tb) { 
                                ?>
  <tr>    
      <td><?php echo $no++ ?></td>
      <td><?php echo $tb['nama']; ?></td>
	  <td><?php echo $tb['jabatan']; ?></td>
      <td><?php echo $tb['username'];?></td>
	  <td><?php echo $tb['email'];?></td>
      <td>
											<a class="btn btn-primary"
												href="<?php echo base_url().'dashboard/edit_user/'.$tb['id_user']; ?>"
												class="delete" title="Delete" data-toggle="tooltip">Edit</a>
											<a class="btn btn-danger tombol-hapus"
												href="<?php echo base_url().'dashboard/hapus_user/'.$tb['id_user']; ?>"
												class="delete" title="Delete" data-toggle="tooltip">Hapus</a>
										</td>
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
<!-- Sparkline -->
<script src="<?= base_url() ?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url() ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
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
    var t = $('#data_user').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]]
    } );

    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
</script>