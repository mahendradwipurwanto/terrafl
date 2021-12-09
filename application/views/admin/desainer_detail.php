     <!-- start page title -->
     <div class="row">
     	<div class="col-12">
     		<div class="page-title-box d-flex align-items-center justify-content-between">
     			<h4 class="page-title mb-0 font-size-18">Detail desainer - <?= $desainer->NAMA;?></h4>

     			<div class="page-title-right">
     				<ol class="breadcrumb m-0">
     					<li class="breadcrumb-item"><a
     							href="javascript: void(0);"><?= $this->uri->segment(1) ? ucwords(str_replace('-', ' ', $this->uri->segment(1))) : "";?></a>
     					</li>
     					<li class="breadcrumb-item active">
     						<?= $this->uri->segment(2) ? ucwords(str_replace('-', ' ', $this->uri->segment(2))) : "";?>
     					</li>
     				</ol>
     			</div>

     		</div>
     	</div>
     </div>
     <!-- end page title -->

     <!-- start row -->
     <div class="row">
     	<div class="col-md-12 col-xl-3">
     		<div class="card">
     			<div class="card-body">
     				<div class="profile-widgets py-3">

     					<div class="text-center">
     						<div class="">
     							<img src="<?= ($desainer->PROFIL == "default.png" || $desainer->PROFIL == false ? base_url().'assets/backend/images/users/avatar-2.jpg' : base_url().'berkas/profil/desainer/'.$desainer->ID_USER.'/'.$desainer->PROFIL);?>"
     								alt="" class="avatar-lg mx-auto img-thumbnail rounded-circle cropped">
     							<div class="online-circle"><i class="fas fa-circle text-success"></i></div>
     						</div>

     						<div class="mt-3 ">
     							<a href="#"
     								class="text-dark font-weight-medium font-size-16"><?= $desainer->NAMA;?></a>
     							<p class="text-body mt-1 mb-1">
     								<?= empty($desainer->BIDANG) ? 'belum diatur' : $desainer->BIDANG;?></p>
     						</div>

     						<div class="mt-4">

     							<ui class="list-inline social-source-list">
     								<?php if(!empty($desainer->FACEBOOK)){?>
     								<li class="list-inline-item">
     									<a href="<?= prep_url($desainer->FACEBOOK);?>" class="avatar-xs">
     										<span class="avatar-title rounded-circle">
     											<i class="mdi mdi-facebook"></i>
     										</span>
     									</a>
     								</li>
     								<?php }?>

     								<?php if(!empty($desainer->TWITTER)){?>
     								<li class="list-inline-item">
     									<a href="<?= prep_url($desainer->TWITTER);?>" target="_blank"
     										class="avatar-xs">
     										<span class="avatar-title rounded-circle bg-info">
     											<i class="mdi mdi-twitter"></i>
     										</span>
     									</a>
     								</li>
     								<?php }?>

     								<?php if(!empty($desainer->INSTAGRAM)){?>
     								<li class="list-inline-item">
     									<a href="<?= prep_url($desainer->INSTAGRAM);?>" class="avatar-xs">
     										<span class="avatar-title rounded-circle bg-pink">
     											<i class="mdi mdi-instagram"></i>
     										</span>
     									</a>
     								</li>
     								<?php }?>
     							</ui>

     						</div>
     					</div>

     				</div>
     			</div>
     		</div>
     		<div class="card">
     			<div class="card-body">
     				<h5 class="card-title mb-3">Informasi pribadi</h5>

     				<p class="card-title-desc">
     					<?= empty($desainer->TENTANG) ? 'belum diatur' : $desainer->TENTANG;?>
     				</p>

     				<div class="mt-3">
     					<p class="font-size-12 text-muted mb-1">Email</p>
     					<h6 class=""><a href="mailto:<?= $desainer->EMAIL;?>"><?= $desainer->EMAIL;?></a></h6>
     				</div>

     				<div class="mt-3">
     					<p class="font-size-12 text-muted mb-1">Nomor Telepon</p>
     					<h6 class=""><a href="tel:<?= $desainer->NO_TELP;?>" class="mr-1"><i
     								class="fas fa-phone"></i></a> <?= $desainer->NO_TELP;?></h6>
     				</div>

     				<div class="mt-3">
     					<p class="font-size-12 text-muted mb-1">Alamat</p>
     					<h6 class=""><?= empty($desainer->ALAMAT) ? 'belum diatur' : $desainer->ALAMAT;?></h6>
     				</div>

     			</div>
     		</div>

     	</div>


     	<div class="col-md-12 col-xl-9">
     		<div class="row">
     			<div class="col-md-12 col-xl-4">
     				<div class="card">
     					<div class="card-body">
     						<div class="row align-items-center">
     							<div class="col-8">
     								<p class="mb-2">Total Desain</p>
     								<h4 class="mb-0"><?= number_format($total_desain,0,",",".")?></h4>
     							</div>
     							<div class="col-4">
     								<div class="text-right">
     									<span class="font-size-30 text-primary">
     										<i class="mdi mdi-tag-plus-outline"></i>
     									</span>
     								</div>
     							</div>
     						</div>
     					</div>
     				</div>
     			</div>

     			<div class="col-md-12 col-xl-4">
     				<div class="card">
     					<div class="card-body">
     						<div class="row align-items-center">
     							<div class="col-8">
     								<p class="mb-2">Total Request</p>
     								<h4 class="mb-0"><?= number_format($total_request,0,",",".")?></h4>
     							</div>
     							<div class="col-4">
     								<div class="text-right">
     									<span class="font-size-30 text-primary">
     										<i class="mdi mdi-package-variant"></i>
     									</span>
     								</div>
     							</div>
     						</div>
     					</div>
     				</div>
     			</div>

     			<div class="col-md-12 col-xl-4">
     				<div class="card">
     					<div class="card-body">
     						<div class="row align-items-center">
     							<div class="col-8">
     								<p class="mb-2">Total Pendapatan</p>
     								<h4 class="mb-0">Rp. <?= number_format($total_pendapatan,0,",",".")?></h4>
     							</div>
     							<div class="col-4">
     								<div class="text-right">
     									<span class="font-size-30 text-primary">
     										<i class="mdi mdi-sale"></i>
     									</span>
     								</div>
     							</div>
     						</div>
     					</div>
     				</div>
     			</div>
     		</div>
     		<div class="row">
     			<?php $no = 1; if($desain != false ){ foreach ($desain as $key) { ?>
     			<article class="col-6 col-md-4 col-lg-3 mb-4 m-0 p-2">
     				<?php $poster = $this->M_beranda->get_poster($key->ID_DESAIN);?>
     				<div class="card card-bordered h-100 shadow-soft transition-3d-hover">
     					<div class="card-img-top position-relative">
     						<a class="image-popup-vertical-fit media-viewer"
     							href="<?= base_url();?>berkas/desain/<?= $key->ID_DESAIN;?>/<?= $poster;?>"
     							alt="<?= $key->JUDUL;?>">
     							<img loading="lazy" class="fit card-img-top lazysizes"
     								src="<?= base_url();?>berkas/desain/<?= $key->ID_DESAIN;?>/<?= $poster;?>"
     								alt="<?= $key->JUDUL;?>">
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
     						<ul class="list-inline m-0" style="margin-bottom: -10px"><i
     								class="fas fa-download fa-xs"></i> <?= $key->DIDOWNLOAD;?>
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
