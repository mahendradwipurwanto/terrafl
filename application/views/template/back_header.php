<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Dashboard | Terraflair - Design for you</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Terraflair - Design for you" name="description" />
	<meta content="Terraflair" name="author" />
	<!-- App favicon -->
	<link rel="shortcut icon" href="<?= base_url();?>assets/favicon.png">

	<!-- jquery.vectormap css -->
	<link href="<?= base_url();?>assets/backend/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css"
		rel="stylesheet" type="text/css" />

	<!-- Bootstrap Css -->
	<link href="<?= base_url();?>assets/backend/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
		type="text/css" />
	<!-- Icons Css -->
	<link href="<?= base_url();?>assets/backend/css/icons.min.css" rel="stylesheet" type="text/css" />
	<!-- App Css-->
	<link href="<?= base_url();?>assets/backend/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

	<script src="<?= base_url();?>assets/backend/libs/jquery/jquery.min.js"></script>
	<script src="<?= base_url();?>assets/backend/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body data-layout="horizontal" data-topbar="dark">
    
	<!-- ALERT -->
	<?php if ($this->session->flashdata('error')) { ?>
	<script>
		Swal.fire({
			text: '<?php echo $this->session->flashdata('
			error ');?>',
			icon: 'info',
		})

	</script>
	<?php }?>

	<?php if ($this->session->flashdata('warning')) { ?>
	<script>
		Swal.fire({
			text: '<?php echo $this->session->flashdata('
			warning ');?>',
			icon: 'warning',
		})

	</script>
	<?php }?>

	<?php if ($this->session->flashdata('success')) { ?>
	<script>
		Swal.fire({
			text: '<?php echo $this->session->flashdata('
			success ');?>',
			icon: 'success',
		})

	</script>
	<?php }?>

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

						<button type="button"
							class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
							data-toggle="collapse" data-target="#topnav-menu-content">
							<i class="fa fa-fw fa-bars"></i>
						</button>

						<?php $this->load->view('template/back_menu'); ?>

					</div>

					<div class="d-flex">

						<div class="dropdown d-none d-lg-inline-block ml-1">
							<button type="button" class="btn header-item noti-icon waves-effect"
								data-toggle="fullscreen">
								<i class="mdi mdi-fullscreen"></i>
							</button>
						</div>

						<div class="dropdown d-inline-block">
							<button type="button" class="btn header-item noti-icon waves-effect"
								id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true"
								aria-expanded="false" style="overflow: unset">
								<i class="mdi mdi-bell-outline"></i>
								<span class="badge badge-danger badge-pill">3</span>
							</button>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
								aria-labelledby="page-header-notifications-dropdown">
								<div class="p-3">
									<div class="row align-items-center">
										<div class="col">
											<h6 class="m-0"> Notifications </h6>
										</div>
										<div class="col-auto">
											<a href="#!" class="small"> View All</a>
										</div>
									</div>
								</div>
								<div data-simplebar style="max-height: 230px;">
									<a href="" class="text-reset notification-item">
										<div class="media">
											<div class="avatar-xs mr-3">
												<span class="avatar-title bg-primary rounded-circle font-size-16">
													<i class="bx bx-cart"></i>
												</span>
											</div>
											<div class="media-body">
												<h6 class="mt-0 mb-1">Your order is placed</h6>
												<div class="font-size-12 text-muted">
													<p class="mb-1">If several languages coalesce the grammar</p>
													<p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
												</div>
											</div>
										</div>
									</a>
								</div>
								<div class="p-2 border-top">
									<a class="btn btn-sm btn-link font-size-14 btn-block text-center"
										href="javascript:void(0)">
										<i class="mdi mdi-arrow-right-circle mr-1"></i> View More..
									</a>
								</div>
							</div>
						</div>

						<div class="dropdown d-inline-block">
							<button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img class="rounded-circle header-profile-user"
									src="<?= base_url();?>assets/backend/images/users/avatar-2.jpg" alt="Header Avatar">
								<span
									class="d-none d-xl-inline-block ml-1"><?= $this->session->userdata('nama');?></span>
								<i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
							</button>
							<div class="dropdown-menu dropdown-menu-right">
								<!-- item-->
								<a class="dropdown-item" href="#"><i
										class="bx bx-user font-size-16 align-middle mr-1"></i> Profil</a>
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
