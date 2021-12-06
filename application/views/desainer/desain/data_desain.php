  <!-- start page title -->
  <div class="row">
  	<div class="col-12">
  		<div class="page-title-box d-flex align-items-center justify-content-between">
  			<h4 class="page-title mb-0 font-size-18">Desainku</h4>

  			<div class="page-title-right">
  				<ol class="breadcrumb m-0">
  					<li class="breadcrumb-item"><a
  							href="javascript: void(0);"><?= $this->uri->segment(1) ? ucwords(str_replace('-', ' ', $this->uri->segment(1))) : "";?></a>
  					</li>
  					<li class="breadcrumb-item active">
  						<?= $this->uri->segment(2) ? ucwords(str_replace('-', ' ', $this->uri->segment(2))) : "";?></li>
  				</ol>

  			</div>
  		</div>
  	</div>
  </div>
  <!-- end page title -->

  <div class="row">
  	<div class="col-xl-3">
  		<div class="card">
  			<div class="card-body">
  				<div>
  					<div class="pb-3 border-bottom">
  						<div class="row align-items-center">
  							<div class="col-8">
  								<p class="mb-2">Total Desain</p>
  								<h4 class="mb-0"><?= number_format($total_desain,0,",",".")?></h4>
  							</div>
  							<div class="col-4">
  								<div class="text-right">
  									<i class="mdi mdi-tag-plus-outline h3 text-info"></i>
  								</div>
  							</div>
  						</div>
  					</div>
  					<div class="py-3 border-bottom">
  						<div class="row align-items-center">
  							<div class="col-8">
  								<p class="mb-2">Desain Berbayar</p>
  								<h4 class="mb-0"><?= number_format($desain_berbayar,0,",",".")?></h4>
  							</div>
  							<div class="col-4">
  								<div class="text-right">
  									<i class="mdi mdi-sale h3 text-success"></i>
  								</div>
  							</div>
  						</div>
  					</div>
  					<div class="pt-3">
  						<div class="row align-items-center">
  							<div class="col-8">
  								<p class="mb-2">Desain Terjual</p>
  								<h4 class="mb-0"><?= number_format($desain_dijual,0,",",".")?></h4>
  							</div>
  							<div class="col-4">
  								<div class="text-right">
  									<i class="mdi mdi-coin-outline h3 text-warning"></i>
  								</div>
  							</div>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  	<div class="col-xl-9">

  		<div class="page-title-right">
  			<div class="btn-toolbar mb-4" role="toolbar">
  				<div class="btn-group mr-2 mb-2 mb-sm-0">
  					<a href="<?= site_url('desainer/desainku');?>" class="btn btn-primary waves-light waves-effect"
  						data-toggle="tooltip" data-placement="top" title="Atur ulang"><i
  							class="mdi mdi-refresh h5 text-white"></i></a>
  					<a href="<?= site_url('desainer/desainku/berbayar');?>" class="btn btn-primary waves-light waves-effect"
  						data-toggle="tooltip" data-placement="top" title="Berbayar"><i class="mdi mdi-sale h5 text-white"></i></a>
  					<a href="<?= site_url('desainer/desainku/terjual');?>" class="btn btn-primary waves-light waves-effect"
  						data-toggle="tooltip" data-placement="top" title="Terjual"><i
  							class="mdi mdi-coin-outline h5 text-white"></i></a>
  				</div>
  				<div class="btn-group mr-2 mb-2 mb-sm-0">
  					<button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle"
  						data-toggle="dropdown" aria-expanded="false" data-toggle="tooltip" data-placement="top" title="Kategori">
  						<i class="fa fa-tag"></i> <i class="mdi mdi-chevron-down ml-1"></i>
  					</button>
  					<div class="dropdown-menu">
  						<?php if($kategori != false){foreach ($kategori as $key) { ?>
  						<a class="dropdown-item"
  							href="<?= site_url('desainer/desainku/kategori/'.$key->KATEGORI);?>"><?= $key->KATEGORI;?></a>
  						<?php }}else{?>
  						<a class="dropdown-item">Belum ada kategori</a>
  						<?php }?>
  					</div>
  				</div>
  				<div class="btn-group ml-auto mb-2 mb-sm-0">
  					<a href="<?= site_url('desainer/upload-desain');?>" class="btn btn-primary waves-light waves-effect">
  						Upload desain
  					</a>
  				</div>
  			</div>
  		</div>
  		<div class="row">
  			<div class="col-12">
  				<?php if($this->uri->segment(3) == "kategori"){?>
  				Menampilkan desain berdasarkan kategori <span class="text-info"><?= $this->uri->segment(3);?></span>
  				<?php }?>
  				<?php if($this->uri->segment(3) == "terjual"){?>
  				Menampilkan desain yang telah <span class="text-info">terjual</span>
  				<?php }?>
  				<?php if($this->uri->segment(3) == "berbayar"){?>
  				Menampilkan desain <span class="text-info">berbayar</span>
  				<?php }?>
  			</div>
  		</div>
  		<div class="row">
  			<?php $no = 1; if($desain != false ){ foreach ($desain as $key) { ?>
  			<article class="col-6 col-md-4 col-lg-3 mb-4 m-0 p-2">
  				<?php $poster = $this->M_beranda->get_poster($key->ID_DESAIN);?>
  				<div class="card card-bordered h-100 shadow-soft transition-3d-hover">
  					<div class="card-img-top position-relative">
  						<a class="image-popup-vertical-fit media-viewer"
  							href="<?= base_url();?>berkas/desain/<?= $key->ID_DESAIN;?>/<?= $poster;?>" alt="<?= $key->JUDUL;?>">
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
  							<span><a class="d-block font-weight-bold text-dark text-lines"
  									href="<?= site_url('desain/'.$key->LINK_DESAIN);?>"><?= $key->JUDUL;?></a></span>
  						</div>
  						<ul class="list-inline m-0"><i class="fas fa-download fa-xs"></i> <?= $key->DIDOWNLOAD;?>
  							<?= $key->BERBAYAR == 1 ? '<span class="text-primary float-right" style="right: 10px; bottom: 4px; ">Rp.'.number_format($key->HARGA,0,",",".").'</span>' : '<span class="text-info float-right" style="right: 10px; bottom: 4px; ">Gratis</span>';?></small>
  						</ul>
  						<div class="row">
  							<div class="col-8">
  								<a href="<?= site_url('desainer/edit-desain/'.$key->LINK_DESAIN);?>"
  									class="btn btn-primary btn-sm btn-block mt-2">edit desain</a>
  							</div>
  							<div class="col-4">
  								<button type="button" class="btn btn-danger btn-sm btn-block mt-2" data-toggle="modal"
  									data-target="#hapus-desain<?= $key->ID_DESAIN;?>"><i class="fas fa-trash"></i></button>
  							</div>
  						</div>
  					</div>
  				</div>

  				<div id="hapus-desain<?= $key->ID_DESAIN;?>" class="modal fade bs-example-modal-center" tabindex="-1"
  					role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  					<div class="modal-dialog modal-dialog-centered">
  						<div class="modal-content">
  							<div class="modal-header">
  								<h5 class="modal-title mt-0">Hapus desain - <?= $key->JUDUL;?></h5>
  								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  									<span aria-hidden="true">&times;</span>
  								</button>
  							</div>
  							<div class="modal-body">
  								<p class="text-dark mb-1">Apakah anda yakin, ingin menghapus desain <i><?= $key->JUDUL;?></i>?</p>
  								<small class="text-danger">tindakan ini akan menghapus semua data dari desain ini.</small>
  							</div>
  							<div class="modal-footer">
  								<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
  								<a href="<?= site_url('desainer/delete_desain/'.$key->ID_DESAIN);?>" class="btn btn-danger">Hapus</a>
  							</div>
  							<!-- /.modal-content -->
  						</div>
  						<!-- /.modal-dialog -->
  					</div>
  					<!-- /.modal -->

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
