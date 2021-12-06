<?php if($this->uri->segment(1) == "beranda" || empty($this->uri->segment(1))){ ?>

<div class="page-footer-section bg-dark fg-white">
	<div class="container mb-5">
		<div class="row justify-content-center text-center wow fadeInUp">
			<div class="col-lg-8">
				<div class="text-center mb-3">
					<img src="<?= base_url();?>assets/logo.png" alt="" height="80">
				</div>
				<h3 class="mb-3"><span class="fg-primary">Terraflair</span></h3>
				<p class="caption">Website marketplace untuk para pencari desain dan desaigner Indonesia, menyediakan transaksi desain dan permintaan desain antar pencari desain dan desainer </br> <i>~ Design For You ~</i></p>

				<ul class="nav justify-content-center py-3">
					<li class="nav-item"><a href="<?= base_url();?>" class="nav-link fg-white px-4">Beranda</a></li>
					<li class="nav-item"><a href="<?= site_url('temukan-desain');?>" class="nav-link fg-white px-4">Temukan desain</a></li>
					<li class="nav-item"><a href="<?= site_url('desainer');?>" class="nav-link fg-white px-4">Desainer</a></li>
					<li class="nav-item"><a href="<?= site_url('berita');?>" class="nav-link fg-white px-4">Berita</a></li>
				</ul>
			</div>
		</div>
	</div>

	<hr>
	<!-- Please don't remove or modify the credits below -->
	<p class="text-center mt-4 wow fadeIn">Copyright &copy; 2021 <a href="<?= base_url();?>"
			class="fg-white fw-medium">Terraflair</a>. All right reserved</p>
</div>

<?php }else{?>
</main>

<div class="page-footer-section bg-dark fg-white">
	<div class="container">
		<div class="row mb-5 py-3">
			<div class="col-sm-6 col-lg-2 py-3">
				<h5 class="mb-3 text-white">Halaman</h5>
				<ul class="menu-link">
					<li><a href="<?= base_url();?>" class="">Beranda</a></li>
					<li><a href="<?= site_url('temukan-desain');?>" class="">Temukan Desain</a></li>
					<li><a href="<?= site_url('temukan-desainer');?>" class="">Temukan Desainer</a></li>
					<li><a href="<?= site_url('berita');?>" class="">Berita</a></li>
				</ul>
			</div>
			<div class="col-sm-6 col-lg-2 py-3">
			</div>
			<div class="col-md-6 col-lg-4 py-3">
				<h5 class="mb-3 text-white">Kontak</h5>
				<ul class="menu-link">
					<li><a href="mailto:cs.terrafl@gmail.com" class="">Kontak kami</a></li>
					<li><a href="mailto:cs.terrafl@gmail.com" class="">cs.terrafl@gmail.com</a></li>
					<li><a href="tel:" class="">+808 11233 900</a></li>
				</ul>
			</div>
			<div class="col-md-6 col-lg-4 py-3">
				<!-- Social Media Button -->
				<div class="mt-4">
					<a href="#" class="btn btn-fab btn-primary fg-white"><span class="mai-logo-facebook"></span></a>
					<a href="#" class="btn btn-fab btn-primary fg-white"><span class="mai-logo-twitter"></span></a>
					<a href="#" class="btn btn-fab btn-primary fg-white"><span class="mai-logo-instagram"></span></a>
				</div>
			</div>
		</div>
	</div>

	<hr>

	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6 py-2">
				<img src="../assets/favicon-light.png" alt="" width="40">
				<!-- Please don't remove or modify the credits below -->
				<p class="d-inline-block ml-2">Copyright &copy; <a href="<?= base_url();?>"
						class="fg-white fw-medium">Terraflair</a>. All rights reserved</p>
			</div>
		</div>
	</div>
</div>

<?php }?>

<script src="<?= base_url();?>assets/frontend/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="<?= base_url();?>assets/frontend/vendor/wow/wow.min.js"></script>

<script src="<?= base_url();?>assets/frontend/js/mobster.js"></script>

</body>

</html>
