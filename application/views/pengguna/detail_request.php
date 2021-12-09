<div class="page-hero-section bg-image hero-mini shadow-soft"
	style="background-image: url(<?= base_url();?>assets/frontend/img/hero_mini.svg);background-position: top;height: 110px;">
</div>
<div class="page-section">
	<div class="container">
		<div class="row">
			<div class="col-xl-3">
				<div class="alert alert-info small font-weight-normal">
					Anda diharuskan membayar biaya permintaan dari yang anda minta setelah desainer menerima
					permintaan anda.
				</div>
				<div class="card shadow-soft">
					<div class="card-body">
						<h4 class="card-title">Desainer</h4>
						<div class="mt-3">
							<p class="font-size-12 text-muted mb-1">Nama desainer</p>
							<h6 class="text-body"><?= $request->NAMA;?></h6>
						</div>

						<div class="mt-3">
							<p class="font-size-12 text-muted mb-1">Nomor Telepon</p>
							<h6 class="text-body"><a href="tel:<?= $request->NO_TELP;?>" target="_blank"
									class="text-secondary mr-2"><i class="fas fa-phone"></i></a>
								<?= $request->NO_TELP;?></h6>
						</div>

						<div class="mt-3">
							<p class="font-size-12 text-muted mb-1">Email</p>
							<h6 class="text-body"><a href="mailto:<?= $request->EMAIL;?>" target="_blank"
									class="text-secondary mr-2"><?= $request->EMAIL;?></a></h6>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-9">
				<?php if($request->STATUS > 0){?>
				<?php if($pembayaran == false){?>
				<div class="alert alert-warning">
					<b>PERHATIAN !</b> Permintaan ini telah diterima oleh desainer, tetapi anda belum
					melakukan pembayaran untuk request ini!. Harap selesaikan pembayaran anda dengan menekan
					tombol "Bayar sekarang"
				</div>
				<?php } ?>
				<?php } ?>
				<div class="card shadow-soft">
					<div class="card-body">
						<h4 class="card-title">Informasi permintaan
							<?php if($request->STATUS == 0){
							echo '<span class="badge badge-secondary font-size-12">Pending</span>';
						}elseif ($request->STATUS == 1) {
							echo '<span class="badge badge-primary font-size-12">Proses pengerjaan</span>';
						}elseif ($request->STATUS == 2) {
							echo '<span class="badge badge-success font-size-12">Selesai</span>';
						}elseif ($request->STATUS == 3) {
							echo '<span class="badge badge-danger font-size-12">Ditolak</span>';
						}else{
							echo '<span class="badge badge-warning font-size-12">ERROR</span>';
						}?>
						</h4>
						<!-- Timeline row Start -->
						<div class="row">

							<!-- Timeline 1 -->
							<div class="col-lg-9">
								<h4><?= $request->JUDUL;?></h4>
								<p class="card-title-desc"><?= $request->CATATAN;?></p>
							</div>
							<!-- Timeline 1 -->

							<?php if ($request->FILE != null) {?>
							<!-- Timeline 2 -->
							<div class="col-lg-3">
								<h6 class="text-muted mb-2">File tambahan</h6>
								<a href="<?= base_url();?>berkas/request/<?= $request->ID_REQUEST;?>/<?= $request->FILE;?>"
									target="_blank" class="mb-5 mb-lg-0">
									<div class="bg-light text-center p-2 pt-4 rounded">
										<i class="fa fa-file h2 text-primary mb-2"></i>
										<h6 class="font-weight-normal"><?= $request->FILE;?></h6>
									</div>
								</a>
							</div>
							<!-- Timeline 2 -->
							<?php }else{?>
							<div class="col-lg-3">
								<h6 class="text-muted text-center font-weight-normal">Tidak ada tambahan
									file dari pengguna</h6>
							</div>
							<?php }?>
						</div>
						<!-- Timeline row Over -->
						<hr>
						<h4 class="card-title mb-4">Informasi pengerjaan
							<?php if($pembayaran == false){?>
							<a href="<?= site_url('checkout-request/'.$request->ID_REQUEST);?>"
								class="btn btn-success btn-sm float-right mr-2">BAYAR SEKARANG</a>
							<?php }else{ ?>
							<button type="button" data-toggle="modal" data-target="#pembayaran_permintaan"
								class="btn btn-success btn-sm float-right mr-2">cek pembayaran</button>
							<?php } ?>
						</h4>

						<div class="row">
							<div class="col-4">
								<p class="font-size-2 text-muted mb-0">Tanggal request</p>
								<small class="text-info mb-2">tanggal saat pengguna mengirim request
									ini</small>
								<h4 class="text-body"><?= date("d F Y", $request->TANGGAL);?></h4>
								<div class="mt-3">
									<p class="font-size-2 text-muted mb-1">Lama Pengerjaan</p>
									<?php if($request->STATUS == 0){?>
									<span class="badge badge-warning">belum diterima</span>
									<?php }else{?>
									<h4 class="text-body"><?= $request->LAMA_PENGERJAAN;?></h4>
									<?php }?>
								</div>
							</div>
							<div class="col-4">
								<p class="font-size-2 text-muted mb-0">Tanggal diterima</p>
								<small class="text-info mb-2">tanggal saat anda menerima request
									ini</small>
								<?php if($request->STATUS == 0){?>
								<span class="badge badge-warning">belum diterima</span>
								<?php }else{?>
								<h4 class="text-body"><?= date("d F Y", $request->TANGGAL_DITERIMA);?>
								</h4>
								<?php }?>
								<?php if($request->STATUS == 2){?>
								<a href="<?= site_url('request/download/'.$request->ID_REQUEST.'/'.$request->FILE_REQUEST);?>"
									class="btn btn-pill btn-primary btn-block"
									target="_blank">download file request</a>
								<?php }?>
							</div>
							<div class="col-4 border-left text-right">
								<p class="font-size-2 text-muted mb-1">Biaya Pengerjaan</p>
								<?php if($request->STATUS == 0){?>
								<span class="badge badge-warning">belum diterima</span>
								<?php }else{?>
								<h2 class="text-body">Rp.
									<?= number_format($request->BIAYA,0,",",".");?></h2>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end row -->

	</div>
</div>


<div id="pembayaran_permintaan" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
	aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title mt-0">Pembayaran permintaan pengguna</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php if($request->STATUS == 0){?>
				<div class="alert alert-warning">
					<b>PERHATIAN !</b> Permintaanmu belum diterima oleh desainer. Harap tunggu atau hubungi
					desainer dengan kontak yang tertera
				</div>
				<?php }else{ ?>
				<?php if($pembayaran == false){?>
				<div class="alert alert-warning">
					<b>PERHATIAN !</b> Permintaan ini telah diterima oleh desainer, tetapi anda belum
					melakukan pembayaran untuk request ini!. Harap selesaikan pembayaran anda dengan menekan
					tombol "Bayar sekarang"
				</div>
				<?php }else{ ?>
				<div class="row mb-3">
					<div class="col-8">
						<span class="text-muted font-weight-normal">ID BAYAR</span>
					</div>
					<div class="col-4  border-bottom pb-1">
						<span
							class="text-primary font-weight-medium">#<?= $pembayaran->ID_PEMBAYARAN;?></span>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-8">
						<span class="text-muted font-weight-normal">Nama pemesan</span>
					</div>
					<div class="col-4  border-bottom pb-1">
						<span class="text-dark font-weight-medium"><?= $pembayaran->NAMA;?></span>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-8">
						<span class="text-muted font-weight-normal">Tanggal pesanan</span>
					</div>
					<div class="col-4  border-bottom pb-1">
						<span
							class="text-dark font-weight-medium"><?= date("d/m/Y", $pembayaran->TANGGAL);?></span>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-8">
						<span class="text-muted font-weight-normal">Pembayaran untuk -</span>
						<?= $pembayaran->JENIS == 1 ? '<span class="badge badge-primary">Pembelian DESAIN</span>' : '<span class="badge badge-warning">Request DESAIN</span>';?>
					</div>
					<div class="col-4  border-bottom pb-1">
						<span
							class="text-dark font-weight-medium"><?= $pembayaran->JENIS == 1 ? $pembayaran->JUDUL : $pembayaran->JUDUL_REQUEST;?></span>
					</div>
				</div>
				<div class="row">
					<div class="col-8">
						<span class="text-muted font-weight-normal">Total Tagihan</span>
					</div>
					<div class="col-4">
						<span class="h4 text-dark font-weight-medium">Rp.
							<?= number_format($pembayaran->NOMINAL,0,",",".")?></span>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-8">
						<span class="text-muted font-weight-normal">Metode pembayaran</span>
					</div>
					<div class="col-4  border-bottom pb-1">
						<span class="text-dark font-weight-medium"><?= $pembayaran->VIA;?></span>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-8">
						<span class="text-muted font-weight-normal">Atas nama</span>
					</div>
					<div class="col-4  border-bottom pb-1">
						<span class="text-dark font-weight-medium"><?= $pembayaran->ATAS_NAMA;?></span>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-8">
						<span class="text-muted font-weight-normal">Nomor E-Wallet / rekening</span>
					</div>
					<div class="col-4  border-bottom pb-1">
						<span class="text-dark font-weight-medium"><?= $pembayaran->NOMOR;?></span>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-8">
						<span class="text-muted font-weight-normal">Status pembayaran</span>
					</div>
					<div class="col-4  border-bottom pb-1">
						<?php if($pembayaran->STATUS == 1){
                                                  echo '<span class="badge badge-secondary font-size-12">Menunggu konfirmasi</span>';
                                                  }elseif ($pembayaran->STATUS == 2) {
                                                       echo '<span class="badge badge-success font-size-12">Diterima</span>';
                                                  }elseif ($pembayaran->STATUS == 3) {
                                                       echo '<span class="badge badge-danger font-size-12">Ditolak</span>';
                                                  }else{
                                                       echo '<span class="badge badge-warning font-size-12">ERROR</span>';
                                                  }
                                                  ?>
					</div>
				</div>
				<?php if($pembayaran->STATUS >= 1){?>
				<div class="row mb-3">
					<div class="col-8">
						<span class="text-muted font-weight-normal">Tanggal pembayaran</span>
					</div>
					<div class="col-4">
						<span
							class="text-dark font-weight-medium"><?= date("d/m/Y", $pembayaran->TANGGAL);?></span>
					</div>
				</div>
				<?php }?>
				<div class="row">
					<div class="col-12">
						<?php if($pembayaran->STATUS >= 1){?>
						<p class="text-muted font-weight-normal">Bukti pembayaran</p>
						<?php if($pembayaran->STATUS == 0){?>
						<div class="alert alert-warning text-dark" role="alert">
							<strong><i class="fas fa-info"></i></strong> Bukti pembayaran belum di unggah
							oleh pengguna
						</div>
						<?php }else{?>
						<img src="<?= base_url();?>berkas/pembayaran/<?= $pembayaran->ID_PEMBAYARAN;?>/<?= $pembayaran->BUKTI_BAYAR;?>"
							class="d-block w-100">
						<?php }?>
						<?php }?>
					</div>
				</div>
				<?php }?>
				<?php }?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</div>
