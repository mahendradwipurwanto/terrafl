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
										class="text-dark font-weight-bold font-size-16"><?= $desainer->NAMA;?></a>
									<p class="text-body mt-1 mb-1">
										<?= empty($desainer->BIDANG) ? 'belum diatur' : $desainer->BIDANG;?></p>
								</div>

								<div class="mt-4">

									<ui class="list-inline social-source-list">
										<?php if(!empty($desainer->FACEBOOK)){?>
										<li class="list-inline-item">
											<a href="<?= prep_url($desainer->FACEBOOK);?>" class="avatar-xs">
												<span class="h5">
													<i class="fab fa-facebook text-primary"></i>
												</span>
											</a>
										</li>
										<?php }?>

										<?php if(!empty($desainer->TWITTER)){?>
										<li class="list-inline-item">
											<a href="<?= prep_url($desainer->TWITTER);?>" target="_blank"
												class="avatar-xs">
												<span class="h5 mx-1">
													<i class="fab fa-twitter text-info"></i>
												</span>
											</a>
										</li>
										<?php }?>

										<?php if(!empty($desainer->INSTAGRAM)){?>
										<li class="list-inline-item">
											<a href="<?= prep_url($desainer->INSTAGRAM);?>" class="avatar-xs">
												<span class="h5">
													<i class="fab fa-instagram text-danger"></i>
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
				<div class="card mt-4">
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
											<span class="h2 text-primary">
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
											<span class="h2 text-primary">
												<i class="mdi mdi-package-variant"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php if($this->session->userdata('role') == 2){?>
					<div class="col-md-12 col-xl-4">
						<div class="card">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-8">
										<p class="mb-1">Request Desain</p>
										<button type="button" class="btn btn-primary btn-sm btn-block mb-0"
											data-toggle="modal" data-target="#request-desain">request sekarang</button>
									</div>
									<div class="col-4">
										<div class="text-right">
											<span class="h2 text-primary">
												<i class="mdi mdi-send"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php }?>
				</div>
				<div class="row px-2 mt-3">
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
	</div>
</div>


<div id="request-desain" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
	aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title mt-0">Request desain</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php if($this->session->userdata('logged_in') == TRUE || $this->session->userdata('logged_in')){?>
				<form action="<?= site_url('beranda/request_desain');?>" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id_desainer" value="<?= $desainer->ID_USER;?>">
					<div class="form-group">
						<label for="judul">Judul <small class="text-danger">*</small></label>
						<input type="text" class="form-control" name="judul" placeholder="Tambahkan judul request"
							required>
					</div>
					<div class="form-group">
						<label for="status">Tambahkan file <small class="text-muted">(optional)</small></label>
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="FILE" id="customFile">
							<label class="custom-file-label" for="customFile" id="fileName">Pilih file</label>
						</div>
						<small class="text-muted">Maksimal ukuran file 20mb</small>
					</div>
					<div class="form-group">
						<label for="richTextArea">Tambahkan catatan <small class="text-danger">*</small></label>
						<textarea type="text" id="richTextArea" class="form-control" rows="3" name="catatan"
							placeholder="Tambahkan catatan desain seperti apa yang anda inginkan"></textarea>
						<small class="text-danger">Tambahkan jika diperlukan.</small>
					</div>
					<div class="modal-footer px-0">
						<button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Request desain</button>
					</div>
				</form>
				<?php }else{?>
				<p>harap masuk ke akun anda, agar dapat request desain di desainer ini. <a
						href="<?= site_url('masuk');?>">masuk
						sekarang</a>
					<?php }?>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>


<script type="text/javascript">
	$('#customFile').change(function () {
		var file = $('#customFile')[0].files[0].name;
		$('#fileName').text(file);
	});

	tinymce.init({
		selector: "#richTextArea",
		height: 300,
		plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
		menubar: true,
		branding: false,
		toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
	});

</script>
