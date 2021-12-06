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

	<!-- DataTables -->
	<link href="<?= base_url();?>assets/backend/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
	rel="stylesheet" type="text/css" />
	<link href="<?= base_url();?>assets/backend/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
	rel="stylesheet" type="text/css" />

	<!-- Responsive datatable examples -->
	<link href="<?= base_url();?>assets/backend/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
	rel="stylesheet" type="text/css" />

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

	<!-- Sweet Alerts js -->
	<script src="<?= base_url();?>assets/backend/libs/sweetalert2/sweetalert2.min.js"></script>

	<!-- Tagsinput -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.js"
	integrity="sha512-wTIaZJCW/mkalkyQnuSiBodnM5SRT8tXJ3LkIUA/3vBJ01vWe5Ene7Fynicupjt4xqxZKXA97VgNBHvIf5WTvg=="
	crossorigin="anonymous"></script>

	<!-- Plugins js -->
	<script src="<?= base_url();?>assets/backend/libs/dropzone/min/dropzone.min.js"></script>

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
										<label for="usernama">Mendaftar sebagai desainer?</label>
										<input type="checkbox" id="desainer" switch="none" name="role" />
										<label for="desainer" data-on-label="Ya" data-off-label="Tidak" class="float-right"
										style="width: 65px"></label>
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
									<div id="desainer-tentang" class="d-none">
										<hr class="mt-2">
										<div class="form-group">
											<label for="userbidang">Bidang Desainer <small class="text-danger">*</small></label>
											<input type="text" class="form-control" id="userbidang" name="bidang"
											placeholder="Bidang desainer">
											<small class="text-muted">ex: Desainer UI/UX</small>
										</div>
										<div class="form-group">
											<label class="font-weight-medium mb-1">Informasi Pembayaran</label></br>
											<small class="text-danger mb-2">Harap isi informasi pembayaran dengan benar, karena semua transaksi pembayaran anda akan dikirim sesuai informasi pembayaran anda. </br> Anda dapat menambahkan metode pembayaran lain nanti.</small></br>
											<label for="viaPembayaran">Metode Pembayaran <small class="text-danger">*</small></label>
											<select class="form-control select2" name="via" id="viaPembayaran">
												<option>Pilih salah satu</option>
												<optgroup label="E-Wallet">
													<option value="DANA">DANA</option>
													<option value="SHOPEEPAY">SHOPEEPAY</option>
													<option value="OVO">OVO</option>
												</optgroup>
												<optgroup label="BANK">
													<option value="BCA">BCA</option>
													<option value="BRI">BRI</option>
													<option value="MANDIRI">MANDIRI</option>
													<option value="BNI">BNI</option>
													<option value="PERMATA">PERMATA BANK</option>
												</optgroup>
											</select>
											<small class="text-muted">Pilih salah satu bank</small>
										</div>
										<div class="form-group">
											<label for="useratas">Atas nama <small class="text-danger">*</small></label>
											<input type="text" class="form-control" id="useratas" name="atas_nama"
											placeholder="Atas nama">
											<small class="text-muted">Nama akun dari metode pembayaran anda yang terdaftar</small>
										</div>
										<div class="form-group">
											<label for="userrekening">Nomor E-Wallet / Nomor Rekening <small class="text-danger">*</small></label>
											<input type="text" class="form-control" id="userrekening" name="rekening"
											placeholder="Nomor rekening / E-Wallet">
											<small class="text-muted">Nomor dari e-wallet anda / rekening sesuai dengan metode yang dipilih</small>
										</div>
										<hr>
									</div>

									<div class="form-group">
										<label for="useremail">Email <small class="text-danger">*</small></label>
										<input type="email" class="form-control" id="useremail" name="email"
										placeholder="Masukkan email aktif">
									</div>

									<div class="form-group">
										<label for="username">Username <small class="text-danger">*</small></label>
										<input type="text" class="form-control" id="username" name="username" minlength="6" maxlength="15"
										placeholder="Masukkan username" id="thresholdconfig">
										<small class="text-muted">6 s/d 15 karakter</small>
									</div>

									<div class="form-group">
										<label for="userpassword">Password <small class="text-danger">*</small></label>
										<input type="password" class="form-control" id="userpassword" name="password" minlength="6"
										maxlength="15" placeholder="Masukkan password" id="thresholdconfig">
										<small class="text-muted">6 s/d 15 karakter</small>
									</div>

									<div class="form-group">
										<label for="password">Konfirmasi Password <small class="text-danger">*</small></label>
										<input type="password" class="form-control" id="userkonpass" name="password_conf" minlength="6"
										maxlength="15" placeholder="Konfirmasi password anda" id="thresholdconfig">
										<small class="text-muted">6 s/d 15 karakter</small>
									</div>

									<div class="mt-4">
										<button class="btn btn-primary btn-block waves-effect waves-light" type="submit"
										id="send-button">Daftar
									sekarang</button>
									<small class="text-muted">Pastikan semua data telah benar, sebelum melanjutkan.</small>
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

	$("#desainer").change(function () {
		if (this.checked) {
			$("#desainer-tentang").removeClass('d-none');
			$("#userbidang").prop('required',true);
			$("#viaPembayaran").prop('required',true);
			$("#useratas").prop('required',true);
			$("#userrekening").prop('required',true);
		} else {
			$("#desainer-tentang").addClass('d-none');
			$("#userbidang").prop('required',false);
			$("#viaPembayaran").prop('required',false);
			$("#useratas").prop('required',false);
			$("#userrekening").prop('required',false);
		}
	});

</script>

<!-- JAVASCRIPT -->
<script src="<?= base_url();?>assets/backend/libs/metismenu/metisMenu.min.js"></script>
<script src="<?= base_url();?>assets/backend/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url();?>assets/backend/libs/node-waves/waves.min.js"></script>

<!-- apexcharts -->
<script src="<?= base_url();?>assets/backend/libs/apexcharts/apexcharts.min.js"></script>

<!-- jquery.vectormap map -->
<script src="<?= base_url();?>assets/backend/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js">
</script>
<script
src="<?= base_url();?>assets/backend/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js">
</script>

<!-- Required datatable js -->
<script src="<?= base_url();?>assets/backend/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url();?>assets/backend/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?= base_url();?>assets/backend/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url();?>assets/backend/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url();?>assets/backend/libs/jszip/jszip.min.js"></script>
<script src="<?= base_url();?>assets/backend/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url();?>assets/backend/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="<?= base_url();?>assets/backend/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url();?>assets/backend/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url();?>assets/backend/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="<?= base_url();?>assets/backend/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url();?>assets/backend/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js">
</script>

<!-- Magnific Popup-->
<script src="<?= base_url();?>assets/backend/libs/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- form advanced -->
<script src="<?= base_url();?>assets/backend/libs/select2/js/select2.min.js"></script>
<script src="<?= base_url();?>assets/backend/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url();?>assets/backend/libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="<?= base_url();?>assets/backend/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="<?= base_url();?>assets/backend/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

<!--tinymce js-->
<script src="<?= base_url();?>assets/backend/libs/tinymce/tinymce.min.js"></script>

<!-- Summernote js -->
<script src="<?= base_url();?>assets/backend/libs/summernote/summernote-bs4.min.js"></script>

<!-- init js -->
<script src="<?= base_url();?>assets/backend/js/pages/form-editor.init.js"></script>
<!-- form advanced init -->
<script src="<?= base_url();?>assets/backend/js/pages/form-advanced.init.js"></script>
<!-- Tour init js-->
<script src="<?= base_url();?>assets/backend/js/pages/lightbox.init.js"></script>

<!-- Datatable init js -->
<script src="<?= base_url();?>assets/backend/js/pages/datatables.init.js"></script>

<script src="<?= base_url();?>assets/backend/js/app.js"></script>

</body>

</html>
