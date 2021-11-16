<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title> Ubah Password | Terraflair - Design for you</title>
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

	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

	<!-- ALERT -->
	<?php if ($this->session->flashdata('error')) { ?>
	<script>
		Swal.fire({
			text: '<?php echo $this->session->flashdata('error');?>',
			icon: 'info',
		})

	</script>
	<?php }?>

	<?php if ($this->session->flashdata('warning')) { ?>
	<script>
		Swal.fire({
			text: '<?php echo $this->session->flashdata('warning');?>',
			icon: 'warning',
		})

	</script>
	<?php }?>

	<?php if ($this->session->flashdata('success')) { ?>
	<script>
		Swal.fire({
			text: '<?php echo $this->session->flashdata('success');?>',
			icon: 'success',
		})

	</script>
	<?php }?>

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
								<h5 class="text-white font-size-20">Ubah password</h5>
								<p class="text-white-50 mb-0">Masukkan password baru akun anda.</p>
								<a href="<?= base_url();?>" class="logo logo-admin mt-4">
									<img src="<?= base_url();?>assets/logo.png" alt="" height="30">
								</a>
							</div>
						</div>
						<div class="card-body pt-5">

							<div class="p-2">
								<form class="form-horizontal" action="<?= site_url('masuk/proses_ubahPassword');?>" method="POST">
                  <input type="hidden" name="id_user" value="<?= $id_user;?>">  

									<div class="form-group">
										<label for="email">Email</label>
										<input type="email" class="form-control" name="email" id="email"
											value="<?= $email;?>" readonly>
									</div>

                  <div class="form-group">
                    <label for="userpassword">Password Baru <small class="text-danger">*</small></label>
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

									<div class="mt-3">
										<button class="btn btn-primary btn-block waves-effect waves-light" type="submit" id="send-button">Ubah password</button>
									</div>
								</form>
							</div>

						</div>
					</div>
					<div class="mt-5 text-center">
						<p>Masuk ke akun anda ? <a href="<?= site_url('masuk');?>" class="font-weight-medium text-primary">
								Masuk</a>
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

	<script src="<?= base_url();?>assets/backend/js/app.js"></script>
	<script src="<?= base_url();?>assets/backend/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

</body>

</html>
