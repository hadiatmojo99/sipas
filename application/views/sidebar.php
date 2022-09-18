<aside class="main-sidebar elevation-4 sidebar-light-teal">
	<!-- Brand Logo -->
	<a href="#" class="brand-link">
		<img src="<?= base_url()?>assets/img/logo-kemenag.png" alt="SIPAS Logo"
			class="brand-image" style="opacity: .8">
		<span class="brand-text font-weight-light">SIPAS</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">


		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<?php if($this->session->userdata('jabatan') == 'Admin') {?>
				<li class="nav-header">ADMIN</li>
				<li class="nav-item">
					<a href="<?= base_url()?>dashboard/user"
						class="nav-link <?php if($this->uri->segment(2)=="user"){echo "active";}?>">
						<i class="nav-icon fas fa-th"></i>
						<p>
							Data User
						</p>
					</a>
				</li>				
				<?php } ?>
				<?php if($this->session->userdata('jabatan') == 'Staff') { ?>
				<li class="nav-header">STAFF</li>
				<?php }elseif($this->session->userdata('jabatan') == 'Admin') { ?>
				<li class="nav-header">STAFF</li>
				<?php }else{ ?>
				<li class="nav-header">MENU</li>
				<?php } ?>
				<li class="nav-item">
					<a href="<?=base_url() ?>dashboard"
						class="nav-link <?php if($this->uri->segment(2)==""){echo "active";}?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=base_url('dashboard') ?>/surat_masuk"
						class="nav-link <?php if($this->uri->segment(2)=="surat_masuk"){echo "active";}?>">
						<i class="fas fa-inbox nav-icon"></i>
						<p>
							Surat Masuk
						</p>
					</a>
				</li>
				<?php if($this->session->userdata('jabatan') == 'Admin' || $this->session->userdata('jabatan') == 'Staff' ) { ?>
				<li class="nav-item">
					<a href="<?=base_url('dashboard')?>/surat_keluar"
						class="nav-link <?php if($this->uri->segment(2)=="surat_keluar"){echo "active";}?>">
						<i class="nav-icon fas fa-envelope"></i>
						<p>
							Surat Keluar
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="#"
						class="nav-link <?php if($this->uri->segment(2)=="laporan_masuk" || $this->uri->segment(2)=="laporan_keluar"){echo "active";}?>">
						<i class="nav-icon fas fa-flag"></i>
						<p>
							Laporan
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview" style="display: none;">
						<li class="nav-item">
							<a href="<?=base_url() ?>dashboard/laporan_masuk"
								class="nav-link <?php if($this->uri->segment(2)=="laporan_masuk"){echo "active";}?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Surat Masuk</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=base_url() ?>dashboard/laporan_keluar"
								class="nav-link <?php if($this->uri->segment(2)=="laporan_keluar"){echo "active";}?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Surat Keluar</p>
							</a>
						</li>
					</ul>
				</li>

				<?php } ?>
				<li class="nav-item">
					<a href="<?= base_url('auth/logout') ?>" class="nav-link">
						<i class="fas fa-sign-out-alt nav-icon"></i>
						<p>
							Keluar
						</p>
					</a>
				</li>

				<!-- /.sidebar-menu -->
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
