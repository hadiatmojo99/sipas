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
                                <?php foreach ($data_user as $tb) { 
                              
                              ?>
									<form action="<?= base_url('dashboard/proses_edituser') ?>"
										enctype="multipart/form-data" role="form" method="post">
										<label for="nama">Nama</label>
										<div class="form-group">
											<input type="text" class="form-control" name="nama" id="nama"
												placeholder="Nama" value="<?= $tb['nama']?>">
										</div>

										<label for="username">Username</label>
										<div class="form-group">
											<input type="text" class="form-control" name="username" id="username"
												placeholder="Username" value="<?= $tb['username']?>">
										</div>

										<label for="jabatan">Jabatan</label>
										<div class="form-group">
											<select class="form-control" id="jabatan" name="jabatan">
											<option selected = <?=$tb['jabatan']?>><?=$tb['jabatan']?></option>
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
										</div>

										<label for="email">Email</label>
										<div class="form-group">
											<input type="text" class="form-control" name="email" id="email"
												placeholder="email" value="<?= $tb['email']?>">
										</div>
										<label for="password">Password</label>
										<div class="form-group">
											<input type="text" class="form-control" name="password" id="password"
												placeholder="Password">
												<input type="text" class="form-control" name="oldpassword" id="oldpassword" hidden value="<?= $tb['password']?>">
										</div>
                                        <div class="form-group">
											<input type="text" class="form-control" name="id_user" id="id_user"
												placeholder="id_user" hidden value="<?= $tb['id_user']?>">
										</div>                                         								
								<div class="card-footer">
									<button type="submit" class="btn btn-primary tombol-disimpan">Simpan</button>
									<a class="btn btn-primary tombol-disimpan" onclick="goBack()">Batal</a>
								</div>
                            </div>
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
