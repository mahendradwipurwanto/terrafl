<div class="page-hero-section bg-image hero-mini shadow-soft"
	style="background-image: url(<?= base_url();?>assets/frontend/img/hero_mini.svg);background-position: top;height: 110px;">
</div>


<div class="page-section pt-4">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 py-3">
				<article class="blog-single-entry pl-0">
					<div class="post-thumbnail">
						<img
							src="<?= ($berita->POSTER == null ? base_url().'assets/frontend/img/blogs/placeholder.png' : base_url().'berkas/berita/'.$berita->LINK_BERITA.'/'.$berita->POSTER);?>"
							alt="<?= $berita->JUDUL;?>" class="w-100">
					</div>
					<div class="post-date">
						Posted on <a href="#"><?= date("M d, Y", $berita->TANGGAL);?></a>
					</div>
					<h1 class="post-title"><?= $berita->JUDUL;?></h1>
					<div class="entry-meta mb-4">
						<div class="meta-item entry-author">
							<div class="icon">
								<span class="mai-person"></span>
							</div>
							by <a><?= $berita->NAMA;?></a>
						</div>
						<div class="meta-item">
							<div class="icon">
								<span class="mai-pricetags"></span>
							</div>
							Kategori:
							<a href="<?= site_url('berita/kategori/'.$berita->KATEGORI);?>"><?= $berita->KATEGORI;?></a>
						</div>
						<div class="meta-item">
							<div class="icon">
								<span class="mai-chatbubble-ellipses"></span>
							</div>
							<a href="#"><?= $this->M_beranda->count_komentarBerita($berita->ID_BERITA);?> Komentar</a>
						</div>
					</div>
					<div class="entry-content">
						<p><?= $berita->KONTEN;?></p>
						<div class="mt-3">
							<h3 class="h5">Tags</h3>
							<div class="tag-clouds">
								<?php
								$tags = explode(',',$berita->TAG);

								foreach($tags as $key) {    
									echo '<a class="tag-cloud-link mr-1" href="'.site_url('berita/tag/'.$key).'">'.$key.'</a>';    
								}
								?>
							</div>
						</div>
					</div>
				</article>

				<!-- Comments -->
				<div class="comment-area">
					<h3 class="mb-5"><?= $this->M_beranda->count_komentarBerita($berita->ID_BERITA);?> Komentar</h3>
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
						<form action="<?= site_url('beranda/komentarBerita');?>" method="POST">
							<input type="hidden" name="id_berita" value="<?= $berita->ID_BERITA;?>">
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
				</div> <!-- end comment -->
			</div>

			<!-- Sidebar -->
			<div class="col-lg-4 py-3">
				<div class="widget-wrap">
					<form action="<?= site_url('berita/cari');?>" method="get" class="search-form">
						<h3 class="widget-title">Pencarian</h3>
						<div class="form-group">
							<span class="icon mai-search"></span>
							<input type="text" class="form-control" name="q" placeholder="Masukkan kata kunci">
						</div>
					</form>
				</div>

				<div class="widget-wrap">
					<h3 class="widget-title">Kategori</h3>
					<ul class="categories">
						<?php if($kategori != false){foreach ($kategori as $key) { ?>
						<li><a href="<?= site_url('berita/kategori/'.$key->KATEGORI);?>"><?= $key->KATEGORI;?>
								<span><?= $this->M_beranda->count_katBerita($key->ID_KATEGORI);?></span></a></li>
						<?php }}?>
					</ul>
				</div>

				<div class="widget-wrap">
					<h3 class="widget-title">Tags</h3>
					<div class="tag-clouds">
						<?php
				$tags = explode(',',$tag_list);
				if ($tag_list != false) {
					foreach($tags as $key) {    
						echo '<a class="tag-cloud-link mr-1" href="'.site_url('berita/tag/'.$key).'">'.$key.'</a>';    
					}
				}else{
					echo "belum ada tag";
				}
				?>
					</div>
				</div>
			</div> <!-- end sidebar -->

		</div> <!-- .row -->
	</div>
</div>
