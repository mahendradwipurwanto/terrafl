<?php if($this->uri->segment(1) == "beranda" || empty($this->uri->segment(1))){ ?>

<div class="page-footer-section bg-dark fg-white">
	<div class="container mb-5">
		<div class="row justify-content-center text-center wow fadeInUp">
			<div class="col-lg-8">
				<div class="text-center mb-3">
					<img src="<?= base_url();?>assets/logo.png" alt="" height="80">
				</div>
				<h3 class="mb-3"><span class="fg-primary">Terraflair</span></h3>
				<p class="caption">Lorem ipsum dolor sit amet consectetur adipisicing elit. <br> Expedita voluptates earum
					minima reiciendis consectetur veniam aut dignissimos</p>

				<ul class="nav justify-content-center py-3">
					<li class="nav-item"><a href="index.html" class="nav-link fg-white px-4">Home</a></li>
					<li class="nav-item"><a href="" class="nav-link fg-white px-4">Key Features</a></li>
					<li class="nav-item"><a href="" class="nav-link fg-white px-4">Pricing</a></li>
					<li class="nav-item"><a href="" class="nav-link fg-white px-4">Testimonials</a></li>
					<li class="nav-item"><a href="" class="nav-link fg-white px-4">FAQ</a></li>
				</ul>
			</div>
		</div>
	</div>

	<hr>
	<!-- Please don't remove or modify the credits below -->
	<p class="text-center mt-4 wow fadeIn">Copyright &copy; 2021 <a href="<?= base_url();?>"
			class="fg-white fw-medium">Terrafl</a>. All right reserved</p>
</div>

<?php }else{?>
</main>

<div class="page-footer-section bg-dark fg-white">
	<div class="container">
		<div class="row mb-5 py-3">
			<div class="col-sm-6 col-lg-2 py-3">
				<h5 class="mb-3">Pages</h5>
				<ul class="menu-link">
					<li><a href="#" class="">Features</a></li>
					<li><a href="#" class="">Customers</a></li>
					<li><a href="#" class="">Pricing</a></li>
					<li><a href="#" class="">GDPR</a></li>
				</ul>
			</div>
			<div class="col-sm-6 col-lg-2 py-3">
				<h5 class="mb-3">Company</h5>
				<ul class="menu-link">
					<li><a href="#" class="">About</a></li>
					<li><a href="#" class="">Team</a></li>
					<li><a href="#" class="">Leadership</a></li>
					<li><a href="#" class="">Careers</a></li>
					<li><a href="#" class="">HIRING!</a></li>
				</ul>
			</div>
			<div class="col-md-6 col-lg-4 py-3">
				<h5 class="mb-3">Contact</h5>
				<ul class="menu-link">
					<li><a href="#" class="">Contact Us</a></li>
					<li><a href="#" class="">Office Location</a></li>
					<li><a href="#" class="">hello@mobster.com</a></li>
					<li><a href="#" class="">support@macodeid.com</a></li>
					<li><a href="#" class="">+808 11233 900</a></li>
				</ul>
			</div>
			<div class="col-md-6 col-lg-4 py-3">
				<h5 class="mb-3">Subscribe</h5>
				<p>Get some offers, news, or update features of application</p>
				<form method="POST">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Your email..">
						<div class="input-group-append">
							<button type="submit" class="btn btn-primary"><span class="mai-send"></span></button>
						</div>
					</div>
				</form>

				<!-- Social Media Button -->
				<div class="mt-4">
					<a href="#" class="btn btn-fab btn-primary fg-white"><span class="mai-logo-facebook"></span></a>
					<a href="#" class="btn btn-fab btn-primary fg-white"><span class="mai-logo-twitter"></span></a>
					<a href="#" class="btn btn-fab btn-primary fg-white"><span class="mai-logo-instagram"></span></a>
					<a href="#" class="btn btn-fab btn-primary fg-white"><span class="mai-logo-google"></span></a>
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
				<p class="d-inline-block ml-2">Copyright &copy; <a href="https://www.macodeid.com/"
						class="fg-white fw-medium">MACode ID</a>. All rights reserved</p>
			</div>
			<div class="col-12 col-md-6 py-2">
				<ul class="nav justify-content-end">
					<li class="nav-item"><a href="#" class="nav-link">Terms of Use</a></li>
					<li class="nav-item"><a href="#" class="nav-link">Privacy Policy</a></li>
					<li class="nav-item"><a href="#" class="nav-link">Cookie Policy</a></li>
				</ul>
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
