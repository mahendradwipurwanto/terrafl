<div class="page-hero-section bg-image hero-mini shadow-soft"
	style="background-image: url(<?= base_url();?>assets/frontend/img/hero_mini.svg);background-position: top;height: 110px;">
</div>

<div class="page-section mt-5 pt-0">
	<div class="container">
		<div class="row align-items-lg-center mb-4">
			<div class="col-lg-12 mb-2 mb-lg-0">
				<div class="mb-4">
					<h1 class="mb-0">Temukan Desain</h1>
					<p>Temukan berbagai macam desain sesuai keinginanmu.</p>
				</div>

				<form action="<?= site_url('temukan-desain/cari');?>" class="search-form" method="get">
					<div class="form-group">
						<span class="icon mai-search"></span>
						<input type="text" class="form-control" name="q" placeholder="Masukkan kata kunci pencarian">
					</div>
				</form>

			</div>

		</div>
		<div class="row">
			<div class="col-xl-3">
				<div class="widget-wrap mt-0">
					<h3 class="widget-title">Ketegori</h3>
					<ul class="categories">
						<?php if($kategori != false){foreach ($kategori as $key) { ?>
						<li><a href="<?= site_url('temukan-desain/kategori/'.$key->KATEGORI);?>"><?= $key->KATEGORI;?>
								<span><?= $this->M_beranda->count_katDesain($key->ID_KATEGORI);?></span></a></li>
						<?php }}?>
					</ul>
				</div>

				<div class="widget-wrap">
					<h3 class="widget-title">Tags Desain</h3>
					<div class="tag-clouds">
						<?php
								$tags = explode(',',$tag_list);
								if ($tag_list != false) {
									foreach($tags as $key) {    
											echo '<a class="tag-cloud-link mr-1" href="'.site_url('temukan-desain/tag/'.$key).'">'.$key.'</a>';    
									}
								}else{
									echo "belum ada tag";
								}
								?>
					</div>
				</div>
			</div>
			<div class="col-xl-9">
				<div class="row">
					<div class="col-12">
						<?php if($this->uri->segment(2) == "kategori"){?>
						Menampilkan desain berdasarkan kategori <span class="text-info"><?= $this->uri->segment(3);?></span>
						<?php }?>
						<?php if($this->uri->segment(2) == "tag"){?>
						Menampilkan desain berdasarkan tagline <span class="text-info"><?= $this->uri->segment(3);?></span>
						<?php }?>
						<?php if($this->uri->segment(2) == "cari"){?>
						Menampilkan desain berdasarkan kata kunci pencarian <span class="text-info"><?= $_GET['q'];?></span>
						<?php }?>
					</div>
				</div>
				<div class="row mb-5">
					<?php $no = 1; if($desain != false ){ foreach ($desain as $key) { ?>
					<article class="col-6 col-md-4 col-lg-3 mb-4 m-0 p-2">
						<?php $poster = $this->M_beranda->get_poster($key->ID_DESAIN);?>
						<div class="card card-bordered h-100 shadow-soft transition-3d-hover">
							<div class="card-img-top position-relative">
								<a class="image-popup-vertical-fit media-viewer" href="<?= site_url('desain/'.$key->LINK_DESAIN);?>">
									<img loading="lazy" class="fit card-img-top lazysizes"
										src="<?= base_url();?>berkas/desain/<?= $key->ID_DESAIN;?>/<?= $poster;?>" alt="<?= $key->JUDUL;?>">
								</a>
								<div class="position-absolute top-0 left-0 mt-3 ml-3">
									<small
										class="badge badge-<?= $key->BERBAYAR == 1 ? 'info' : 'success';?>"><?= $key->BERBAYAR == 1 ? '<i class="fas fa-dollar-sign fa-sm mr-2"></i> Premium' : 'Gratis';?></small>
								</div>
							</div>
							<div class="card-body" style=" padding: 10px;">
								<span class="d-block small font-weight-bold text-cap">
									<a href="#" class="badge badge-soft-primary"><?= $key->KATEGORI;?></a>
								</span>
								<div class="mb-0">
									<span><a class="d-block font-weight-bold text-dark"
											href="<?= site_url('desain/'.$key->LINK_DESAIN);?>"><?= $key->JUDUL;?></a></span>
								</div>
								<ul class="list-inline m-0"><i class="fas fa-download fa-xs"></i> <?= $key->DIDOWNLOAD;?>
  							<?= $key->BERBAYAR == 1 ? '<span class="text-primary float-right" style="right: 10px; bottom: 4px; ">Rp.'.number_format($key->HARGA,0,",",".").'</span>' : '<span class="text-info float-right" style="right: 10px; bottom: 4px; ">Gratis</span>';?></small>
								</ul>
							</div>
						</div>

					</article>
					<?php $no++;}}else{?>
					<div class="col-12 text-center mt-5 mb-0">
						<h4>belum ada desain</h4>
					</div>
					<?php }?>
				</div>
			</div>
		</div>
		<!-- end row -->
	</div>
</div>
