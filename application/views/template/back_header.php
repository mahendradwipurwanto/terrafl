<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>
		<?= ($this->uri->segment(1) ? ucwords(str_replace('-', ' ', $this->uri->segment(1)).' - '.($this->uri->segment(2) ? str_replace('-', ' ', $this->uri->segment(2)) : "")." | Terraflair - Design for you") : "| Terraflair - Design for you");?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Terraflair - Design for you" name="description" />
	<meta content="Terraflair" name="author" />
	<!-- App favicon -->
	<link rel="shortcut icon" href="<?= base_url();?>assets/favicon.png">

	<!-- jquery.vectormap css -->
	<link href="<?= base_url();?>assets/backend/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css"
		rel="stylesheet" type="text/css" />

	<!-- ADDON -->

	<!-- Lightbox css -->
	<link href="<?= base_url();?>assets/backend/libs/magnific-popup/magnific-popup.css" rel="stylesheet"
		type="text/css" />

	<!-- Plugins css -->
	<link href="<?= base_url();?>assets/backend/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />

	<!-- Sweet Alert-->
	<link href="<?= base_url();?>assets/backend/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

	<!-- Select2 -->
	<link href="<?= base_url();?>assets/backend/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

	<!-- dataTables -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">

	<!-- Tagsinput -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.css"
		integrity="sha512-uKwYJOyykD83YchxJbUxxbn8UcKAQBu+1hcLDRKZ9VtWfpMb1iYfJ74/UIjXQXWASwSzulZEC1SFGj+cslZh7Q=="
		crossorigin="anonymous" />

	<!-- Summernote css -->
	<link href="<?= base_url();?>assets/backend/libs/summernote/summernote-bs4.min.css" rel="stylesheet"
		type="text/css" />

	<!-- Bootstrap Css -->
	<link href="<?= base_url();?>assets/backend/css/bootstrap.css" id="bootstrap-style" rel="stylesheet"
		type="text/css" />
	<!-- Icons Css -->
	<link href="<?= base_url();?>assets/backend/css/icons.min.css" rel="stylesheet" type="text/css" />
	<!-- App Css-->
	<link href="<?= base_url();?>assets/backend/css/app.css" id="app-style" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="<?= base_url();?>assets/backend/css/custom.css?<?= time();?>">

	<!-- javascript -->
	<script src="<?= base_url();?>assets/backend/libs/jquery/jquery.min.js"></script>

	<script src="<?= base_url();?>assets/backend/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

	<script type="text/javascript" src="<?=base_url();?>assets/frontend/plugin/tinymce/jquery.tinymce.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/frontend/plugin/tinymce/tinymce.min.js"></script>

	<!-- Sweet Alerts js -->
	<script src="<?= base_url();?>assets/backend/libs/sweetalert2/sweetalert2.min.js"></script>

	<!-- Tagsinput -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.js"
		integrity="sha512-wTIaZJCW/mkalkyQnuSiBodnM5SRT8tXJ3LkIUA/3vBJ01vWe5Ene7Fynicupjt4xqxZKXA97VgNBHvIf5WTvg=="
		crossorigin="anonymous"></script>

	<!-- Plugins js -->
	<script src="<?= base_url();?>assets/backend/libs/dropzone/min/dropzone.min.js"></script>
</head>

<body data-layout="horizontal" data-topbar="dark">

	<?php $this->load->view('template/alert');?>

	<div class="container-fluid">
		<!-- Begin page -->
		<div id="layout-wrapper">

			<header id="page-topbar">
				<div class="navbar-header">
					<div class="d-flex">
						<!-- LOGO -->
						<div class="navbar-brand-box">
							<a href="index.html" class="logo logo-dark">
								<span class="logo-sm">
									<img src="<?= base_url();?>assets/logo.png" alt="" height="20">
								</span>
								<span class="logo-lg">
									<img src="<?= base_url();?>assets/logo.png" alt="" height="18">
								</span>
							</a>

							<a href="index.html" class="logo logo-light">
								<span class="logo-sm">
									<img src="<?= base_url();?>assets/logo.png" alt="" height="20">
								</span>
								<span class="logo-lg">
									<img src="<?= base_url();?>assets/logo.png" alt="" height="18">
								</span>
							</a>
						</div>

						<button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
							data-toggle="collapse" data-target="#topnav-menu-content">
							<i class="fa fa-fw fa-bars"></i>
						</button>

						<?php $this->load->view('template/back_menu'); ?>

					</div>

					<div class="d-flex">

						<div class="dropdown d-none d-lg-inline-block ml-1">
							<button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
								<i class="mdi mdi-fullscreen"></i>
							</button>
						</div>
						<?php if($this->session->userdata('role') == 1){?>

						<div class="dropdown d-inline-block">
							<button type="button" class="btn header-item noti-icon waves-effect"
								id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true"
								aria-expanded="false" style="overflow: unset !important">
								<i class="mdi mdi-bell-outline"></i>
								<?php $notif = 0;
								if($metode == false){
									$notif = $notif+1;
								}

								if($notif_request != false){
									$notif = $notif+$notif_request;
								}

								if($notif_pembayaran != false){
									$notif = $notif+$notif_pembayaran;
								}
							?>
								<?php if($notif > 0){?>
								<span class="badge badge-danger badge-pill"><?= $notif;?></span>
								<?php }?>
							</button>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
								aria-labelledby="page-header-notifications-dropdown">
								<div class="p-3">
									<div class="row align-items-center">
										<div class="col">
											<h6 class="m-0"> Notifications </h6>
										</div>
										<div class="col-auto">
											<a href="<?= site_url('desainer/notifikasi');?>" class="small"> Lihat semua</a>
										</div>
									</div>
								</div>
								<div data-simplebar style="max-height: 230px;">
									<?php if($metode == false){?>
									<a href="<?= site_url('desainer/pengaturan/metode-pembayaran');?>"
										class="text-reset notification-item">
										<div class="media">
											<div class="avatar-xs mr-3">
												<span class="avatar-title bg-primary rounded-circle font-size-16">
													<i class="bx bx-credit-card"></i>
												</span>
											</div>
											<div class="media-body">
												<h6 class="mt-0 mb-1">Harap atur metode pembayaran anda</h6>
												<div class="font-size-12 text-muted">
													<p class="mb-1">atur pembayaran anda, agar dapat menerima transfer pembayaran</p>
													<p class="mb-0"><i class="mdi mdi-clock-outline"></i> baru saja</p>
												</div>
											</div>
										</div>
									</a>
									<?php }?>
									<?php if($notif_request != false){?>
									<a href="<?= site_url('desainer/request');?>" class="text-reset notification-item">
										<div class="media">
											<div class="avatar-xs mr-3">
												<span class="avatar-title bg-primary rounded-circle font-size-16">
													<i class="mdi mdi-package-variant"></i>
												</span>
											</div>
											<div class="media-body">
												<h6 class="mt-0 mb-1">Request desain baru <b>(<?= $notif_request;?>)</b></h6>
												<div class="font-size-12 text-muted">
													<p class="mb-1">anda memiliki <b>(<?= $notif_request;?>)</b> request desain baru</p>
													<p class="mb-0"><i class="mdi mdi-clock-outline"></i> baru saja</p>
												</div>
											</div>
										</div>
									</a>
									<?php }?>
									<?php if($notif_pembayaran != false){?>
									<a href="<?= site_url('desainer/pembayaran');?>" class="text-reset notification-item">
										<div class="media">
											<div class="avatar-xs mr-3">
												<span class="avatar-title bg-primary rounded-circle font-size-16">
													<i class="mdi mdi-sale"></i>
												</span>
											</div>
											<div class="media-body">
												<h6 class="mt-0 mb-1">Konfirmasi pembayaran <b>(<?= $notif_pembayaran;?>)</b></h6>
												<div class="font-size-12 text-muted">
													<p class="mb-1">anda memiliki <b>(<?= $notif_pembayaran;?>)</b> yang belum dikonfirmasi</p>
													<p class="mb-0"><i class="mdi mdi-clock-outline"></i> baru saja</p>
												</div>
											</div>
										</div>
									</a>
									<?php }?>
								</div>
							</div>
						</div>
						<?php }?>
						<div class="dropdown d-inline-block">
							<button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img class="rounded-circle header-profile-user cropped-sm"
									src="<?= ($profil == "default.png" || $profil == false ? base_url().'assets/backend/images/users/avatar-2.jpg' : base_url().'berkas/profil/desainer/'.$this->session->userdata('id_user').'/'.$profil);?>"
									alt="<?= $this->session->userdata('nama');?>">
								<span class="d-none d-xl-inline-block ml-1"><?= $this->session->userdata('nama');?></span>
								<i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
							</button>
							<div class="dropdown-menu dropdown-menu-right">
								<!-- ADMIN -->
								<?php if($this->session->userdata('role') == 0){?>
								<a class="dropdown-item" href="<?= site_url('admin');?>"><i
										class="bx bxs-dashboard font-size-16 align-middle mr-1"></i> Dashboard admin</a>
								<!-- DESAINER -->
								<?php }elseif($this->session->userdata('role') == 1){?>
								<a class="dropdown-item" href="<?= site_url('desainer');?>"><i
										class="bx bxs-dashboard font-size-16 align-middle mr-1"></i> Dashboard Desainer</a>
								<a class="dropdown-item" href="<?= site_url('desainer/pengaturan');?>"><i
										class="bx bx-cog font-size-16 align-middle mr-1"></i> Pengaturan</a>
								<!-- PENGGUNA -->
								<?php }elseif($this->session->userdata('role') == 2){?>
								<a class="dropdown-item" href="<?= site_url('pengguna');?>"><i
										class="bx bx-user font-size-16 align-middle mr-1"></i> Profil</a>
								<a class="dropdown-item" href="<?= site_url('pengguna/pengaturan');?>"><i
										class="bx bx-cog font-size-16 align-middle mr-1"></i> Pengaturan</a>
								<?php }?>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item text-danger" href="<?= site_url('keluar');?>"><i
										class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i>
									Keluar</a>
							</div>
						</div>
					</div>
				</div>
			</header>

			<!-- ============================================================== -->
			<!-- Start right Content here -->
			<!-- ============================================================== -->
			<div class="main-content">

				<div class="page-content">
