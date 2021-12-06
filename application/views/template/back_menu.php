<div class="topnav">
	<nav class="navbar navbar-light navbar-expand-lg topnav-menu">

		<div class="collapse navbar-collapse" id="topnav-menu-content">
			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<a class="nav-link" href="<?= base_url();?>">Beranda</a>
				</li>
				<?php if($this->session->userdata('role') == 0){?>
				<li class="nav-item dropdown">
					<a class="nav-link" href="<?= site_url('admin');?>">Dashboard</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link" href="<?= site_url('admin/kelola-berita');?>">Kelola Berita</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Data User <div
							class="arrow-down"></div>
					</a>
					<div class="dropdown-menu" aria-labelledby="topnav-dashboard">
						<a href="<?= site_url('admin/daftar-desainer');?>" class="dropdown-item">Desainer</a>
						<a href="<?= site_url('admin/daftar-pengguna');?>" class="dropdown-item">Pengguna</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link" href="<?= site_url('admin/daftar-request');?>">
						Data Request</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link" href="<?= site_url('admin/daftar-pembayaran');?>">
						Data Pembayaran</a>
				</li>
				<?php }elseif($this->session->userdata('role') == 1){?>
				<li class="nav-item dropdown">
					<a class="nav-link" href="<?= site_url('desainer');?>">Dashboard</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kelola Desain <div
							class="arrow-down"></div>
					</a>
					<div class="dropdown-menu" aria-labelledby="topnav-dashboard">
						<a href="<?= site_url('desainer/desainku');?>" class="dropdown-item">Desainku</a>
						<a href="<?= site_url('desainer/upload-desain');?>" class="dropdown-item">Upload Desain</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kelola Request <div
							class="arrow-down"></div>
					</a>
					<div class="dropdown-menu" aria-labelledby="topnav-dashboard">
						<a href="<?= site_url('desainer/request');?>" class="dropdown-item">Request Desain</a>
						<a href="<?= site_url('desainer/pengiriman');?>" class="dropdown-item">Pengiriman Desain</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link" href="<?= site_url('desainer/pembayaran');?>">Pembayaran</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link" href="<?= site_url('desainer/pengaturan');?>">Pengaturan</a>
				</li>
				<?php }elseif($this->session->userdata('role') == 2){?>
				<?php }?>

			</ul>
		</div>
	</nav>
</div>
