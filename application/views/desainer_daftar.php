<div class="page-hero-section bg-image hero-mini shadow-soft"
	style="background-image: url(<?= base_url();?>assets/frontend/img/hero_mini.svg);background-position: top;height: 110px;">
</div>
<div class="page-section">
	<div class="container">
		<div class="row align-items-lg-center">
			<div class="col-lg-12 mb-2 mb-lg-0">
				<div class="mb-2">
					<h1 class="mb-0">Temukan desainer</h1>
					<p>Temukan desainer untuk lihat atau request desain</p>
				</div>

			</div>

		</div>
		<div class="row">
			<?php if($desainer == false){ ?>
			<center>
				<h4>belum ada desainer, jadilah yang pertama dengan mendaftar sekarang !</h4>
			</center>
			<?php }else{?>
			<?php foreach ($desainer as $key) {?>
			<div class="col-md-4 col-xl-3">
				<a href="<?= site_url('detail-desainer/'.$key->ID_USER);?>">
					<div class="card shadow-soft">
						<div class="card-body">
							<div class="profile-widgets py-3">

								<div class="text-center">
									<div class="">
										<img
											src="<?= ($key->PROFIL == "default.png" || $key->PROFIL == false ? base_url().'assets/backend/images/users/avatar-2.jpg' : base_url().'berkas/profil/desainer/'.$key->ID_USER.'/'.$key->PROFIL);?>"
											alt="" class="avatar-lg mx-auto img-thumbnail rounded-circle cropped">
									</div>

									<div class="mt-3 ">
										<a href="<?= site_url('detail-desainer/'.$key->ID_USER);?>"
											class="text-dark font-weight-bold font-size-16"><?= $key->NAMA;?></a>
										<p class="text-body mt-1 mb-1"><?= empty($key->BIDANG) ? 'belum diatur' : $key->BIDANG;?></p>
									</div>

									<div class="mt-3">
										<span class="badge badge-info mr-2">2 desain</span> <span>|</span> <span
											class="badge badge-primary ml-2">2 request</span>
									</div>
								</div>

							</div>
						</div>
					</div>
				</a>
			</div>
			<?php }?>
			<?php }?>
		</div>
	</div>
</div>
