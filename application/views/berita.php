<div class="page-hero-section bg-image hero-mini shadow-soft"
	style="background-image: url(<?= base_url();?>assets/frontend/img/hero_mini.svg);background-position: top;height: 110px;">
</div>
<div class="page-section">
	<div class="container">
		<div class="row align-items-lg-center">
			<div class="col-lg-12 mb-2 mb-lg-0">
				<div class="mb-2">
					<h1 class="mb-0">Berita</h1>
					<p>Baca berita terbaru dari terraflair disini</p>
				</div>

			</div>

		</div>
		<div class="row">
			<div class="col-lg-8 py-3">
				<div class="row">
					<div class="col-12">
						<?php if($this->uri->segment(2) == "kategori"){?>
						Menampilkan berita berdasarkan kategori <span class="text-info"><?= $this->uri->segment(3);?></span>
						<?php }?>
						<?php if($this->uri->segment(2) == "tag"){?>
						Menampilkan berita berdasarkan tagline <span class="text-info"><?= $this->uri->segment(3);?></span>
						<?php }?>
						<?php if($this->uri->segment(2) == "cari"){?>
						Menampilkan berita berdasarkan kata kunci pencarian <span class="text-info"><?= $_GET['q'];?></span>
						<?php }?>
					</div>
				</div>
				<?php if($berita == false){?>
				<center>
					<h4 class="text-muted">belum ada berita terbaru</h4>
				</center>
				<?php }else{?>
				<?php foreach ($berita as $key) {?>
				<article class="blog-entry px-0">
					<div class="entry-header">
						<div class="post-thumbnail">
							<img
								src="<?= ($key->POSTER == null ? base_url().'assets/frontend/img/blogs/placeholder.png' : base_url().'berkas/berita/'.$key->LINK_BERITA.'/'.$key->POSTER);?>"
								alt="<?= $key->JUDUL;?>" class="w-100">
						</div>
						<div class="post-date">
							<h3><?= date("y", $key->TANGGAL);?></h3>
							<span><?= date("M", $key->TANGGAL);?></span>
						</div>
					</div>
					<div class="post-title"><a href="<?= site_url('berita/baca/'.$key->LINK_BERITA);?>"><?= $key->JUDUL;?></a>
					</div>
					<div class="entry-meta mb-2">
						<div class="meta-item entry-author">
							<div class="icon">
								<span class="mai-person"></span>
							</div>
							oleh <a>Admin</a>
						</div>
						<div class="meta-item">
							<div class="icon">
								<span class="mai-pricetags"></span>
							</div>
							Kategori:
							<a href="<?= site_url('berita/kategori/'.$key->KATEGORI);?>"><?= $key->KATEGORI;?></a>
						</div>
						<div class="meta-item">
							<div class="icon">
								<span class="mai-chatbubble-ellipses"></span>
							</div>
							<a href="#"><?= $this->M_beranda->count_komentarBerita($key->ID_BERITA);?> Komentar</a>
						</div>
					</div>
					<div class="entry-content">
						<p><?= substr(strip_tags($key->KONTEN), 0, 250);?></p>
					</div>
					<a href="<?= site_url('berita/baca/'.$key->LINK_BERITA);?>" class="btn btn-secondary btn-pill">Baca lebih
						lanjut</a>
				</article>
				<?php }?>
				<?php }?>
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
		</div>
	</div>
</div>
