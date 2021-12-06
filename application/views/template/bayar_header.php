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

<body data-layout="horizontal" data-topbar="dark">
	<div class="home-btn d-none d-sm-block">
		<a href="<?= base_url();?>" class="text-dark"><i class="fas fa-home h2"></i></a>
	</div>

	<?php $this->load->view('template/alert');?>

	<?php $this->load->view('template/alert');?>

	<div class="container-fluid">
		<!-- Begin page -->
		<div id="layout-wrapper">

			<!-- ============================================================== -->
			<!-- Start right Content here -->
			<!-- ============================================================== -->
			<div class="main-content">

				<div class="page-content">