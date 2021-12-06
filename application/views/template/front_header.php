<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<meta name="description" content="Website design">

	<meta name="copyright" content="Terraflair, <?= base_url();?>">

	<title><?= ($this->uri->segment(1) ? ucwords(str_replace('-', ' ', $this->uri->segment(1)).' '.($this->uri->segment(2) ? str_replace('-', ' ', $this->uri->segment(2)) : "")." | Terraflair - Design for you") : "Terraflair - Design for you");?></title>

	<link rel="shortcut icon" href="<?= base_url();?>assets/favicon.png" type="image/x-icon">

	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css">

	<link href="<?= base_url();?>assets/backend/css/icons.min.css" rel="stylesheet" type="text/css" />
		
	<link rel="stylesheet" href="<?= base_url();?>assets/frontend/css/maicons.css">

	<link rel="stylesheet" href="<?= base_url();?>assets/frontend/vendor/animate/animate.css">

	<link rel="stylesheet" href="<?= base_url();?>assets/frontend/vendor/owl-carousel/css/owl.carousel.min.css">

	<link rel="stylesheet" href="<?= base_url();?>assets/frontend/css/bootstrap.css">

	<link rel="stylesheet" href="<?= base_url();?>assets/frontend/css/mobster.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css">

	<link rel="stylesheet" href="<?= base_url();?>assets/frontend/css/custom.css?<?= time();?>">

	<!-- Sweet Alert-->
	<link href="<?= base_url();?>assets/backend/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

	<!-- javascript -->
	<script src="<?= base_url();?>assets/frontend/js/jquery-3.5.1.min.js"></script>

	<script src="<?= base_url();?>assets/frontend/js/bootstrap.bundle.min.js"></script>

	<!-- Sweet Alerts js -->
	<script src="<?= base_url();?>assets/backend/libs/sweetalert2/sweetalert2.min.js"></script>
</head>

<body>

	<?php $this->load->view('template/alert');?>

	<nav class="navbar navbar-expand-lg <?php if($this->uri->segment(1) != "beranda" && (!empty($this->uri->segment(1)))){ ?>navbar-dark<?php }else{?>navbar-light<?php }?> navbar-floating">
		<div class="container">
			<a class="navbar-brand" href="<?= base_url();?>">
				<img src="<?= base_url();?>assets/logo.png" alt="" width="40">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler"
				aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarToggler">
				<ul class="navbar-nav ml-lg-5 mt-3 mt-lg-0">
					<li
						class="nav-item <?= ($this->uri->segment(1) == "beranda" || empty($this->uri->segment(1)) ? "active" : "") ?>">
						<a class="nav-link" href="<?= site_url('beranda');?>">Beranda</a>
					</li>
					<li class="nav-item <?= ($this->uri->segment(1) == "temukan-desain" || $this->uri->segment(1) == "desain" ? "active" : "") ?>">
						<a class="nav-link" href="<?= site_url('temukan-desain');?>">Temukan Desain</a>
					</li>
					<li class="nav-item <?= ($this->uri->segment(1) == "emukan-desainer" ? "active" : "") ?>">
						<a class="nav-link" href="<?= site_url('temukan-desainer');?>">Temukan Desainer</a>
					</li>
					<li class="nav-item <?= ($this->uri->segment(1) == "berita" ? "active" : "") ?>">
						<a class="nav-link" href="<?= site_url('berita');?>">Berita</a>
					</li>
				</ul>
				<?php if($this->session->userdata('logged_in') == true || $this->session->userdata('logged_in')){ ?>
				<div class="ml-auto my-2 my-lg-0">
					<div class="half">
						<label for="profile2" class="profile-dropdown w-100">
							<input type="checkbox" id="profile2">
							<img src="https://cdn0.iconfinder.com/data/icons/avatars-3/512/avatar_hipster_guy-512.png">
							<span><?= $this->session->userdata('nama')?></span>
							<label for="profile2"><i class="mdi mdi-menu"></i></label>
							<ul>
								<?php if($this->session->userdata('role') == 0) {?>
								<li><a href="<?= site_url('admin');?>"><i class="mdi mdi-account"></i>Admin dashboard</a></li>
								<?php }elseif ($this->session->userdata('role') == 1) {?>
								<li><a href="<?= site_url('desainer');?>"><i class="mdi mdi-account"></i>desainer dashboard</a></li>
								<?php }elseif ($this->session->userdata('role') == 2) {?>
								<li><a href="<?= site_url('pengguna/request-desain');?>"><i
											class="mdi mdi-plus-box-multiple-outline"></i>Request Desain</a></li>
								<li><a href="<?= site_url('pengguna/pembayaran');?>"><i
											class="mdi mdi-credit-card-minus-outline"></i>Pembayaran</a></li>
								<li><a href="<?= site_url('pengguna/pengaturan');?>"><i class="mdi mdi-cogs"></i>Pengaturan</a></li>
								<?php }?>
								<li><a href="<?= site_url('keluar');?>"><i class="mdi mdi-logout"></i>Keluar</a></li>
							</ul>
						</label>
					</div>
				</div>
				<?php }else{?>
				<div class="ml-auto my-2 my-lg-0">
					<a href="<?= site_url('masuk');?>" class="btn btn-light rounded-pill">masuk</a>
				</div>
				<div class="ml-4 my-2 my-lg-0">
					<a href="<?= site_url('daftar');?>" class="btn btn-dark rounded-pill">daftar sekarang</a>
				</div>
				<?php }?>
			</div>
		</div>
	</nav>

	<?php if($this->uri->segment(1) != "beranda" && (!empty($this->uri->segment(1)))){ ?>
	<main>
	<?php }?>
