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
        <div class="col-12">
            <h3 class="h3">Laporan - Surat Keluar</h3>
            <div class="card shadow-sm my-3">
                <div class="card-body">
                    <i class="fa fa-fw fa-info-circle fa-lg"></i> <strong > Silahkan pilih tanggal surat untuk menemukan surat keluar yang diinginkan.</strong>
                </div>
            </div>
<div class="row">
  <div class="col-md-12">
  <form action="<?= base_url('dashboard/proses_laporkeluar')?>" enctype="multipart/form-data"
								role="form" method="post">
                <div class="form-row">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                        <label for="tgl_mulai">Dari Tanggal:</label>
                        <input type="date" name="tgl_mulai" class="form-control shadow-sm mb-1" id="tgl_mulai" value="">
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                        <label for="tgl_akhir">Sampai Tanggal: </label>
                        <input type="date" name="tgl_akhir" class="form-control shadow-sm mb-1" id="tgl_akhir" value="">
                        <div class="invalid-feedback"></div>
                    </div>                    

                    <div class="col-xl-2 col-lg-2">
                        <button type="submit" name="submit" value="pdf" class="btn btn-primary shadow-sm btn-block btn-cek float-left" style="margin-top: 2rem;">Cetak</button>
                    </div>
                    <div class="col-xl-2 col-lg-2">
                        <button type="submit" name="submit" value="excel" class="btn btn-primary shadow-sm btn-block btn-cek float-left" style="margin-top: 2rem;">Cetak Excel</button>
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
