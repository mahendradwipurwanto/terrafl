<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title> Daftar | Terraflair - Design for you</title>
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
								<h5 class="text-white font-size-20">Daftar akun baru</h5>
								<p class="text-white-50 mb-0">Ayo daftarkan diri anda ke website kami</p>
								<a href="<?= base_url();?>" class="logo logo-admin mt-4">
									<img src="<?= base_url();?>assets/logo.png" alt="" height="30">
								</a>
							</div>
						</div>
						<div class="card-body pt-5">

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
								<form class="form-horizontal" action="<?= site_url('masuk/proses_daftar');?>" method="POST">

                  <div class="form-group mb-2">
                    <label for="usernama">Mendaftar sebagai designer?</label>
                    <input type="checkbox" id="designer" switch="none" name="role"/>
                    <label for="designer" data-on-label="Ya" data-off-label="Tidak" class="float-right" style="width: 65px"></label>
                  </div>

									<div class="form-group">
										<label for="usernama">Nama lengkap <small class="text-danger">*</small></label>
										<input type="text" class="form-control" id="usernama" name="nama" maxlength="50"
											placeholder="Masukkan nama lengkap">
									</div>

									<div class="form-group">
										<label for="usernomor">Nomor telepon <small class="text-danger">*</small></label>
										<input type="tel" class="form-control" id="usernomor" name="no_telp"
											placeholder="Masukkan nomor telepon">
									</div>

									<div class="form-group">
										<label for="useremail">Email <small class="text-danger">*</small></label>
										<input type="email" class="form-control" id="useremail" name="email"
											placeholder="Masukkan email aktif">
									</div>

									<div class="form-group">
										<label for="username">Username <small class="text-danger">*</small></label>
										<input type="text" class="form-control" id="username" name="username" minlength="6" maxlength="15"
											placeholder="Masukkan username">
                      <small class="text-muted">6 s/d 15 karakter</small>
									</div>

									<div class="form-group">
										<label for="userpassword">Password <small class="text-danger">*</small></label>
										<input type="password" class="form-control" id="userpassword" name="password" minlength="6"
											maxlength="15" placeholder="Masukkan password">
                      <small class="text-muted">6 s/d 15 karakter</small>
									</div>

									<div class="form-group">
										<label for="password">Konfirmasi Password <small class="text-danger">*</small></label>
										<input type="password" class="form-control" id="userkonpass" name="password_conf" minlength="6"
											maxlength="15" placeholder="Konfirmasi password anda">
                      <small class="text-muted">6 s/d 15 karakter</small>
									</div>

									<div class="mt-4">
										<button class="btn btn-primary btn-block waves-effect waves-light" type="submit" id="send-button">Daftar
											sekarang</button>
									</div>
								</form>
							</div>

						</div>
					</div>
					<div class="mt-5 text-center">
						<p>Sudah punya akun ? <a href="<?= site_url('masuk');?>" class="font-weight-medium text-primary"> Masuk</a>
						</p>
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


  <!-- form advanced init -->
  <script src="<?= base_url();?>assets/backend/js/pages/form-advanced.init.js"></script>

	<script src="<?= base_url();?>assets/backend/js/app.js"></script>
  <script src="<?= base_url();?>assets/backend/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

</body>

</html>
