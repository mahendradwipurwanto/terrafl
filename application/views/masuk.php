<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title> Masuk | Terraflair - Design for you</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Terraflair - Design for you" name="description" />
	<meta content="Aulia" name="author" />
	<!-- App favicon -->
	<link rel="shortcut icon" href="<?= base_url();?>assets/favicon.png">

	<!-- Bootstrap Css -->
	<link href="<?= base_url();?>assets/backend/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
		type="text/css" />
	<!-- Icons Css -->
	<link href="<?= base_url();?>assets/backend/css/icons.min.css" rel="stylesheet" type="text/css" />
	<!-- App Css-->
	<link href="<?= base_url();?>assets/backend/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

	<script src="<?= base_url();?>assets/backend/libs/jquery/jquery.min.js"></script>
	<script src="<?= base_url();?>assets/backend/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

</head>

<body>
	<div class="home-btn d-none d-sm-block">
		<a href="<?= base_url();?>" class="text-dark"><i class="fas fa-home h2"></i></a>
	</div>
	<div class="account-pages my-5 pt-sm-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6 col-xl-5">
					<div class="card overflow-hidden">
						<div class="bg-login text-center">
							<div class="bg-login-overlay" style="opacity: 1"></div>
							<div class="position-relative">
								<h5 class="text-white font-size-20">Selamat datang !</h5>
								<p class="text-white-50 mb-0">Masuk ke akun anda.</p>
								<a href="<?= base_url();?>" class="logo logo-admin mt-4">
									<img src="<?= base_url();?>assets/logo.png" alt="" height="30">
								</a>
							</div>
						</div>
						<div class="card-body pt-5">
              <!-- ALERT -->
							<?php if ($this->session->flashdata('error')) { ?>
							<div class="alert alert-danger">
								<?php echo $this->session->flashdata('error');?>
							</div>
							<?php }?>

							<?php if ($this->session->flashdata('warning')) { ?>
							<div class="alert alert-warning">
								<?php echo $this->session->flashdata('warning');?>
							</div>
							<?php }?>

							<?php if ($this->session->flashdata('success')) { ?>
							<div class="alert alert-success">
								<?php echo $this->session->flashdata('success');?>
							</div>
							<?php }?>

							<div class="p-2">
								<form class="form-horizontal" action="<?= site_url('masuk/proses_masuk');?>" method="POST">

									<div class="form-group">
										<label for="username">Username / Email</label>
										<input type="text" class="form-control" name="username" id="username"
											placeholder="Masukkan username atau email">
									</div>

									<div class="form-group">
										<label for="userpassword">Password</label>
										<input type="password" class="form-control" name="password" id="userpassword"
											placeholder="Masukkan password">
									</div>

									<div class="mt-3">
										<button class="btn btn-primary btn-block waves-effect waves-light" type="submit" id="send-button">Masuk ke
											akun</button>
									</div>

									<div class="mt-4 text-center">
										<a href="<?= site_url('lupa-password');?>" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Lupa
											password?</a>
									</div>
								</form>
							</div>

						</div>
					</div>
					<div class="mt-5 text-center">
						<p>Belum punya akun ? <a href="<?= site_url('daftar');?>" class="font-weight-medium text-primary"> Daftar
								sekarang </a> </p>
					</div>

				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$('form').submit(function (event) {
			$('#send-button').prop("disabled", true);
			// add spinner to button
			$('#send-button').html(
				`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> memuat...`
			);
			return;
		});
	</script>

	<!-- JAVASCRIPT -->
	<script src="<?= base_url();?>assets/backend/libs/metismenu/metisMenu.min.js"></script>
	<script src="<?= base_url();?>assets/backend/libs/simplebar/simplebar.min.js"></script>
	<script src="<?= base_url();?>assets/backend/libs/node-waves/waves.min.js"></script>

	<script src="<?= base_url();?>assets/backend/js/app.js"></script>
	<script src="<?= base_url();?>assets/backend/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

</body>

</html>
