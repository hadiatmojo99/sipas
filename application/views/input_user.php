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
							<center><h4>Tambah User</h4></center>							
						</div>
						<!-- Card Body -->
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">                                
									<form action="<?= base_url('dashboard/proses_adduser') ?>"
										enctype="multipart/form-data" role="form" method="post">
										<label for="nama">Nama</label>
										<div class="form-group">
											<input type="text" class="form-control" name="nama" id="nama"
												placeholder="Nama">
										</div><span class="text-danger"><?= form_error('nama'); ?></span>

										<label for="jabatan">Jabatan</label>
										<div class="form-group">
										<select class="form-control" id="jabatan" name="jabatan">
											<option selected="NULL"></option>
											<option value="Kepala Madrasah">Kepala Madrasah</option>											
											<option value="Staff">Staff</option>
											<option value="Guru Al Quran Hadist">Guru Al Qur'an Hadist</option>
											<option value="Guru Akidah Akhlak">Guru Akidah Akhlak</option>
											<option value="Guru Fiqih">Guru Fiqih</option>
											<option value="Guru SKI">Guru SKI</option>
											<option value="Guru PKn">Guru PKn</option>
											<option value="Guru B. Indonesia">Guru B. Indonesia</option>
											<option value="Guru B. Arab">Guru B. Arab</option>
											<option value="Guru B. Inggris">Guru B. Inggris</option>
											<option value="Guru Matematika">Guru Matematika</option>
											<option value="Guru Biologi">Guru Biologi</option>
											<option value="Guru Kimia">Guru Kimia</option>
											<option value="Guru Fisika">Guru Fisika</option>
											<option value="Guru Geografi">Guru Geografi</option>
											<option value="Guru Sosiologi">Guru Sosiologi</option>
											<option value="Guru Ekonomi">Guru Ekonomi</option>
											<option value="Guru Seni Budaya">Guru Seni Budaya</option>
											<option value="Guru PKWU">Guru PKWU</option>
											<option value="Guru TIK">Guru TIK</option>
											<option value="Guru BK">Guru BK</option>
											<option value="Pembina Pramuka">Pembina Pramuka</option>
											<option value="Pembina Paskibra">Pembina Paskibra</option>
											<option value="Pembina Pencak Silat">Pembina Pencak Silat</option>
											<option value="Pembina Keteda">Pembina Keteda</option>
											<option value="Pembina Taekwondo">Pembina Taekwondo</option>
											<option value="Pembina Rohis">Pembina Rohis</option>
											</select>
											</div><span class="text-danger"><?= form_error('jabatan'); ?></span>
											
										<label for="username">Username</label>
										<div class="form-group">
											<input type="text" class="form-control" name="username" id="username"
												placeholder="Username">
												<span class="text-danger"><?= form_error('username'); ?></span>
										</div>
										<label for="email">Email</label>
										<div class="form-group">
											<input type="text" class="form-control" name="email" id="email"
												placeholder="Masukkan Email">
												<span class="text-danger"><?= form_error('email'); ?></span>
												
										</div>
										<label for="password">Password</label>
										<div class="form-group">
											<input type="password" class="form-control" name="password" id="password"
												placeholder="Password"><span class="text-danger"><?= form_error('password'); ?></span>
										</div>  
										
										<label for="konfirm_password">Masukkan Ulang Password</label>
										<div class="form-group">
											<input type="password" class="form-control" name="konfirm_password" id="konfirm_password"
												placeholder="Masukkan Ulang Password"><span class="text-danger"><?= form_error('konfirm_password'); ?></span>
										</div> 
								<div class="card-footer">
									<button type="submit" class="btn btn-primary tombol-disimpan">Simpan</button>
								</div>
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
