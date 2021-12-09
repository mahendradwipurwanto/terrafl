	<div class="account-pages my-5 pt-sm-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6 col-xl-5">
					<div class="card overflow-hidden">
						<div class="bg-login text-center">
							<div class="bg-login-overlay bg-main" style="opacity: 1"></div>
							<div class="position-relative">
								<h5 class="text-white font-size-20">Checkout</h5>
								<p class="text-white-50 mb-0"><?= $request->JUDUL;?></p>
							</div>
						</div>
						<div class="card-body pt-5">
							<div class="p-2">
								<form class="form-horizontal" action="<?= site_url('pembayaran/upload_buktiBayar');?>" method="POST"
									enctype="multipart/form-data">
									<h5>Data pengiriman</h5>
									<div class="form-group">
										<label for="usernama">Nama lengkap <small class="text-danger">*</small></label>
										<input type="text" class="form-control" id="usernama" name="nama" maxlength="50"
											value="<?= $user->NAMA;?>" disabled>
									</div>

									<div class="form-group">
										<label for="useremail">Email <small class="text-danger">*</small></label>
										<input type="email" class="form-control" id="useremail" name="email" value="<?= $user->EMAIL;?>"
											disabled>
										<small class="text-danger">Email ini merupakan email utama anda.</small>
									</div>

									<h5>Detail pesanan</h5>

									<div class="form-group">
										<label for="idPembayaran">Pesanan <small class="text-danger">*</small></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text">#</span>
											</div>
											<input type="text" class="form-control" id="idPembayaran" value="<?= $pembayaran->ID_PEMBAYARAN;?>"
												disabled>
											<input type="hidden" name="id_pembayaran" value="<?= $pembayaran->ID_PEMBAYARAN;?>">
										</div>
									</div>
									<div class="form-group">
										<label for="desain">Request <small class="text-danger">*</small></label>
										<div class="input-group mb-3">
											<input type="text" class="form-control" id="desain" value="<?= $request->JUDUL;?>" readonly>
											<input type="hidden" name="id_request" value="<?= $request->ID_REQUEST;?>">
											<div class="input-group-append">
												<a href="<?= site_url('pengguna/detail-request/'.$request->ID_REQUEST);?>" target="_blank"
													class="input-group-text" id="desain-addon">lihat request</a>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="desainer">Desainer <small class="text-danger">*</small></label>
										<input type="text" class="form-control" id="desainer" value="<?= $request->NAMA;?>" disabled>
									</div>
									<div class="form-group">
										<label for="desainer">Informasi pembayaran <small class="text-danger">*</small></label>
										<div class="accordion accordion-gap" id="accordionMETODE">
											<?php if($metode_list != false){ foreach($metode_list as $key){ ?>
											<div class="accordion-item wow fadeInRight">
												<div class="accordion-trigger" id="metode-<?= $key->ID_METODE;?>">
													<button class="btn btn-block collapsed text-left" type="button" data-toggle="collapse"
														data-target="#collapse-<?= $key->ID_METODE;?>" aria-expanded="false"
														aria-controls="collapse-<?= $key->ID_METODE;?>"><?= $key->VIA;?> <i
															class="fas fa-arrow-down float-right"></i></button>
												</div>
												<div id="collapse-<?= $key->ID_METODE;?>" class="collapse"
													aria-labelledby="metode-<?= $key->ID_METODE;?>" data-parent="#accordionMETODE">
													<div class="accordion-content">
														<div class="row mb-2 mt-2">
															<div class="col-5">
																<span class="text-muted font-weight-normal">Metode Pembayaran</span>
															</div>
															<div class="col-7">
																<span class="text-dark font-weight-medium"><?= $key->VIA;?></span>
															</div>
														</div>
														<div class="row mb-2">
															<div class="col-5">
																<span class="text-muted font-weight-normal">Atas Nama</span>
															</div>
															<div class="col-7">
																<span class="text-dark font-weight-medium"><?= $key->ATAS_NAMA;?></span>
															</div>
														</div>
														<div class="row mb-2">
															<div class="col-5">
																<span class="text-muted font-weight-normal">Nomor Rekening / E-Wallet</span>
															</div>
															<div class="col-7">
																<span class="text-dark font-weight-medium"><?= $key->NOMOR;?></span>
															</div>
														</div>
													</div>
												</div>
											</div>
											<?php }}?>
										</div>
										<small class="text-danger">Harap transfer total pembayaran yang harus dibayar pada salah informasi
											pembayaran diatas.</small>
									</div>
									<div class="form-group">
										<label for="nominal">Total Pembayaran <small class="text-danger">*</small></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text">Rp.</span>
											</div>
											<input type="text" class="form-control" id="nominal"
												value="<?= number_format($pembayaran->NOMINAL,0,",",".");?>" disabled>
											<input type="hidden" name="nominal" value="<?= $pembayaran->NOMINAL;?>">
										</div>
										<small class="text-danger">Total pembayaran tidak termasuk dengan biaya admin, harap melakukan
											pembayaran beserta biaya admin yang ada</small>
									</div>

									<h5>Upload bukti pembayaran</h5>
									<div class="form-group">
										<label for="GETP_BUKTI" class="upload-card mx-auto">
											<img id="P_BUKTI" class="upload-img w-100 P_BUKTI cursor"
												src="<?= base_url() . 'assets/frontend/img/others/Pickanimage.png' ?>" alt="Placeholder">
										</label>
										<input type="file" id="GETP_BUKTI" class="form-control-file d-none" name="bukti_bayar"
											onchange="previewP_BUKTI(this);" accept="image/*">
										<small class="text-muted">Max 2Mb size, and use 1:1 ratio.</small>
									</div>
									<div class="form-group">
										<label for="catatan">Catatan <small class="text-muted">(optional)</small></label>
										<textarea type="text" class="form-control" id="catatan" name="catatan" rows="3"
											placeholder="Tambahkan catatan"></textarea>
										<small class="text-muted">Tambahkan catatan jika diperlukan</small>
									</div>

									<div class="mt-4 row">
										<div class="col-3">
											<a href="<?= $this->agent->referrer();?>"
												class="btn btn-secondary btn-block waves-effect waves-light">batal</a>
										</div>
										<div class="col-9">
											<button class="btn btn-success btn-block waves-effect waves-light" type="submit"
												id="send-button">Upload bukti pembayaran</button>
										</div>
									</div>
								</form>
							</div>

						</div>
					</div>
					<div class="mt-5 text-center small">
						<p class="text-muted">Setelah bukti pembayaran anda diterima oleh desainer, maka anda akan menerima
							notifikasi dan akses link untuk mendownload desain pesanan anda.</p>
						<p>Harap pastikan bahwa transfer telah berhasil, dan anda memiliki bukti pembayaran berupa foto atau
							screenshoot dari bukti transfer.
						</p>
					</div>

				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$('form').submit(function (event) {
			$('#send-button').prop("disabled", true);
			// add spinner to button
			$('#send-button').html(
				`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> memuat...`
			);
			return;
		});

		function previewP_BUKTI(input) {
			$(".P_BUKTI").removeClass('hidden');
			var file = $("#GETP_BUKTI").get(0).files[0];

			if (file) {
				var reader = new FileReader();

				reader.onload = function () {
					$("#P_BUKTI").attr("src", reader.result);
				}

				reader.readAsDataURL(file);
			}
		}

	</script>
