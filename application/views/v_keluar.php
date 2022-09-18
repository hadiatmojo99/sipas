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
										<h2>Data Surat Keluar</h2>
									</div>
								</div>
								<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash')?>"></div>
								<?php if($this->session->flashdata('flash')) : ?>
								<?php endif; ?>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<a href="<?= base_url('dashboard/tambah_keluar')?>" class="btn btn-primary">Tambah
												Data</a>
                        <!-- <a href="<?= base_url('dashboard/bersihkan_keluar')?>" class="btn btn-danger">Kosongkan Tabel</a>											 -->
										</div>
									</div>
									<div class="col-md-6">																			
									</div>
								</div>
							</div>							
							<table id="data_keluar" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>                                    
                                    <th>Tujuan</th>
                                    <th>Tanggal Surat</th>
									<th>Nomor Surat</th>
                                    <th>Keterangan Surat</th>
                                    <th>Arsip Surat</th>
                                    <th>Aksi</th>                                    
                                    <!--<th>Aksi</th>-->
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php 
                            
                            foreach ($data_keluar as $tb) { 
                                ?>
  <tr>    
      <td></td>
      <td><?php echo $tb['tujuan_keluar']; ?></td>
      <td><?php echo date_indo($tb['tgl_keluar']);?></td>
	    <td><?php echo $tb['nomor_keluar'];?></td>
      <td><?php echo $tb['keterangan_keluar'];?></td>
      <!-- SAMPE SINI KEMARIN ! -->
      <td><?php 
      if ($tb['arsip_keluar'] != '') { ?>
          <a class="btn-sm btn-success" target="_blank" href="<?= base_url().'assets/berkas/keluar/'.$tb['arsip_keluar'];?>">Lihat</a>
      <?php } ?>
      <?php if ($tb['arsip_keluar'] == '') { ?>
          <?= 'Belum diupload' ;?>
      <?php } ?></td>




      <td>
											<a class="btn-sm btn-primary"
												href="<?php echo base_url().'dashboard/edit_keluar/'.$tb['id_keluar']; ?>"
												class="delete" title="Delete" data-toggle="tooltip">Edit</a>|
											<a class="btn-sm btn-danger tombol-hapus"
												href="<?php echo base_url().'dashboard/hapus_keluar/'.$tb['id_keluar']; ?>"
												class="delete tombol-hapus" title="Delete" data-toggle="tooltip">Hapus</a>
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
<!-- DataTables -->
<script type="text/javascript">
	$(document).ready(function(){
		$('#data_user').DataTable({
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
    var t = $('#data_keluar').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 3, 'desc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
</script>