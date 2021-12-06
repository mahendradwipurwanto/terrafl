<div class="page-hero-section bg-image hero-mini shadow-soft"
	style="background-image: url(<?= base_url();?>assets/frontend/img/hero_mini.svg);background-position: top;height: 110px;">
</div>

<div class="page-section mt-5 pt-0">
	<div class="container">
		<div class="row align-items-lg-center mb-2">
			<div class="col-lg-12 mb-2 mb-lg-0">
				<div class="mb-0">
					<h2 class="text-dark mb-0">
						<?= $desain->JUDUL;?>
					</h2>
					<p class="text-muted mb-3"><a
							href="<?= site_url('detail-desainer/'.$desain->ID_USER);?>"><?= $desain->NAMA;?></a>,
						<?= date("d F Y", strtotime($desain->TANGGAL));?> - <a
							href="<?= site_url('temukan-desain/kategori/'.$desain->KATEGORI);?>"
							class="badge badge-primary"><?= $desain->KATEGORI;?></a></p>
				</div>

			</div>

		</div>

		<div class="row">
			<div class="col-md-8">
				<div class="widget-wrap mt-0">
					<div class="row justify-content-center mb-4">
						<?php $no = 1; if($poster != false ){ foreach ($poster as $key) { ?>
						<article class="col-sm-6 col-md-4 col-lg-3 p-2">
							<div class="card h-100 transition-3d-hover">
								<div class="position-relative">
									<a class="image-popup-vertical-fit media-viewer">
										<img loading="lazy" class="fit lazysizes" style="filter: none !important;"
											src="<?= base_url();?>berkas/desain/<?= $desain->ID_DESAIN;?>/<?= $key->POSTER;?>"
											alt="<?= $desain->JUDUL;?>">
									</a>
								</div>

						</article>
						<?php $no++;}}else{?>
						<div class="col-12 text-center mt-5 mb-0">
							<h4>belum ada desain</h4>
						</div>
						<?php }?>
					</div>
					<p class="text-body"><?= $desain->KETERANGAN;?></p>
					<div class="mt-3">
						<h3 class="h5">Tags</h3>
						<div class="tag-clouds">
							<?php
              $tags = explode(',',$desain->TAG);

              foreach($tags as $key) {    
                  echo '<a class="tag-cloud-link mr-1" href="'.site_url('temukan-desain/tag/'.$key).'">'.$key.'</a>';    
              }
              ?>
						</div>
					</div>
				</div>
				<div class="widget-wrap">
					<p class="card-title">Komentar</p>
					<!-- Comment List -->
					<ul class="comment-list">
						<?php if($komentar == false){?>
						<li class="comment text-center">
							<p>Belum ada komentar</p>
						</li>
						<?php }else{?>
						<?php foreach ($komentar as $value) {?>
						<li class="comment mb-4">
							<div class="comment-body w-100">
								<h3><?= $value->NAMA;?>
									<?php if ($value->ID_USER == $this->session->userdata('id_user')){?>
									<button type="button" class="btn btn-soft-danger btn-xs float-right" data-toggle="modal"
										data-target="#hapusKomentar<?= $value->ID_KOMENTAR;?>"><i class="fas fa-trash"></i></button>

									<div id="hapusKomentar<?= $value->ID_KOMENTAR;?>" class="modal fade bd-example-modal-sm" tabindex="-1"
										role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-sm">
											<div class="modal-content">
												<div class="modal-body">
													<form action="<?= site_url('beranda/hapus_komentar/'.$value->ID_KOMENTAR);?>" method="post">
														<p>Hapus komentar anda?</p>
														<div class="modal-footer mx-0 px-0 mb-0 pb-0">
															<button type="button" class="btn btn-light btn-xs" data-dismiss="modal">batal</button>
															<button type="submit" class="btn btn-soft-danger btn-xs">hapus</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
									<?php }?>
								</h3>
								<div class="meta"><?= date("d F Y - H:i", $value->TANGGAL_KOMENTAR);?></div>
								<p><?= $value->KOMENTAR;?></p>
								<!-- <p><a href="#" class="reply">balas</a></p> -->
							</div>
						</li>
						<?php }?>
						<?php }?>
					</ul> <!-- END .comment-list -->

					<div class="comment-form-wrap pt-5">
						<h3 class="mb-2">Tinggalkan komentar anda</h3>
						<?php if($this->session->userdata('logged_in') == TRUE || $this->session->userdata('logged_in')){?>
						<form action="<?= site_url('beranda/komentarDesain');?>" method="POST">
							<input type="hidden" name="id_desain" value="<?= $desain->ID_DESAIN;?>">
							<div class="form-group">
								<textarea name="komentar" id="message" cols="30" rows="3" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<input type="submit" value="Kirim komentar" class="btn bg-main"><br>
								<small class="text-muted">nama anda akan terekam saat memberikan komentar</small>
							</div>
						</form>
						<?php }else{?>
						<p>harap masuk ke akun anda, untuk menambahkan komentar. <a href="<?= site_url('masuk');?>">masuk
								sekarang</a>
						</p>
						<?php }?>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="widget-wrap mt-0">
					<?php if($desain->BERBAYAR == 1){?>
					<span>
						Harga: <h3 class="text-main float-right t-heading"><span
								style="font-size: 14px">Rp.</span><?= number_format($desain->HARGA,0,",",".");?></h3>
					</span>
					<div class="mt-5">
						<a href="<?= site_url('checkout/'.$desain->LINK_DESAIN);?>"
							class="btn bg-main font-weight-bold btn-block"><i class="fas fa-cart-arrow-down"></i> <b>beli
								sekarang</b></a>
					</div>
					<?php }else{?>
					<button type="button" class="btn btn-success font-weight-bold btn-block" data-toggle="modal"
						data-target="#download"><i class="fas fa-download"></i> <b>download</b></button>
					<small class="text-muted">dengan menekan tombol download, maka anda setuju dengan kebijakan kami.</small>

					<div id="download" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog"
						aria-labelledby="mySmallModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title text-center">download - <?= $desain->JUDUL;?></h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<?php if($this->session->userdata('logged_in') == TRUE || $this->session->userdata('logged_in')){?>
									<div class="row justify-content-center text-center">
										<div class="col-10">
											<div class="row justify-content-center text-center">
												<div class="col-7">
													<img src="<?= base_url();?>assets/frontend/img/custom/download.png" width="100%"
														height="auto">
												</div>
											</div>
											<p><b>Hai! Jangan lupa untuk memberikan apresiasi ke </b> <u><?= $desain->NAMA;?></u></p>
											<small>dengan menekan tombol download, maka anda setuju dengan kebijakan kami.</small>
											<a href="<?= site_url('download/'.$desain->ID_DESAIN.'/'.$desain->FILE);?>"
												class="btn btn-success btn-block mb-4">download file</a>
										</div>
									</div>
									<?php }else{?>
									<p class="text-center">harap masuk ke akun anda, untuk dapat mendownload file ini. <a
											href="<?= site_url('masuk');?>">masuk
											sekarang</a>
									</p>
									<?php }?>
								</div>
							</div>
						</div>
					</div>
					<?php }?>
				</div>

				<div class="widget-wrap">
					<a href="<?= site_url('desainer/'.$desain->ID_USER);?>" class="comment-area p-0">
						<ul class="comment-list">
							<li class="comment mb-0">
								<div class="vcard bio">
									<img src="<?= ($desain->PROFIL == "default.png" ? base_url().'berkas/profil/desainer/default.png' : base_url().'berkas/profil/desainer/'.$desain->ID_USER.'/'.$desain->PROFIL);?>"
										alt="PROFIL <?= $desain->NAMA;?>" style="width: 70px !important; height: 70px !important">
								</div>
								<div class="comment-body">
									<h3><?php $nama = explode(" ", $desain->NAMA); echo $nama[0]; ?></h3>
									<div class="meta"><?= $this->M_beranda->count_desainDesainer($desain->ID_USER);?> Desain -
										<?= $this->M_beranda->count_requestDesainer($desain->ID_USER);?> Request
										</div>
								</div>
							</li>
						</ul>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
