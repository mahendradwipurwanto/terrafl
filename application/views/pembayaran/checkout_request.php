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
								<form class="form-horizontal" action="<?= site_url('pembayaran/save_checkoutRequest');?>" method="POST">
									<h5>Data pengiriman</h5>
									<div class="form-group">
										<label for="usernama">Nama lengkap <small class="text-danger">*</small></label>
										<input type="text" class="form-control" id="usernama" name="nama" maxlength="50"
											value="<?= $user->NAMA;?>">
									</div>

									<div class="form-group">
										<label for="useremail">Email <small class="text-danger">*</small></label>
										<input type="email" class="form-control" id="useremail" name="email" value="<?= $user->EMAIL;?>"
											readonly>
										<small class="text-danger">Email ini merupakan email utama anda.</small>
									</div>

									<h5>Data pembayaran</h5>
									<div class="form-group">
										<label for="viaPembayaran">Bank / E-Wallet <small class="text-danger">*</small></label>
										<select class="form-control select2" name="via" id="viaPembayaran">
											<option>Pilih salah satu</option>
											<optgroup label="E-Wallet">
												<option value="DANA">DANA</option>
												<option value="SHOPEEPAY">SHOPEEPAY</option>
												<option value="OVO">OVO</option>
											</optgroup>
											<optgroup label="BANK">
												<option value="BCA">BCA</option>
												<option value="BRI">BRI</option>
												<option value="MANDIRI">MANDIRI</option>
												<option value="BNI">BNI</option>
												<option value="PERMATA">PERMATA BANK</option>
											</optgroup>
										</select>
										<small class="text-muted">Pilih salah satu bank</small>
									</div>
									<div class="form-group">
										<label for="atasNama">Atas Nama <small class="text-danger">*</small></label>
										<input type="text" class="form-control" id="atasNama" name="atas_nama" maxlength="50"
											value="<?= $user->NAMA;?>">
										<small class="text-danger">samakan dengan yang tertera pada rekening / akun E-Wallet anda.</small>
									</div>
									<div class="form-group">
										<label for="nomor">Nomor E-Wallet / Rekening <small class="text-danger">*</small></label>
										<input type="text" class="form-control" id="nomor" name="nomor" maxlength="50"
											placeholder="Masukkan nomor E-Wallet atau rekening">
									</div>

									<h5>Detail pesanan</h5>
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
										<input type="text" class="form-control" id="desainer" value="<?= $request->NAMA;?>" readonly>
										<input type="hidden" name="id_desainer" value="<?= $request->ID_USER;?>">
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
												value="<?= number_format($request->BIAYA,0,",",".");?>" readonly>
											<input type="hidden" name="nominal" value="<?= $request->BIAYA;?>">
										</div>
										<small class="text-danger">Total pembayaran tidak termasuk dengan biaya admin, harap melakukan
											pembayaran beserta biaya admin yang ada</small>
									</div>

									<div class="mt-4 row">
										<div class="col-3">
											<a href="<?= site_url('pengguna/detail-request/'.$request->ID_REQUEST);?>"
												class="btn btn-secondary btn-block waves-effect waves-light">batal</a>
										</div>
										<div class="col-9">
											<button class="btn btn-success btn-block waves-effect waves-light" type="submit"
												id="send-button">Buat pesanan</button>
										</div>
									</div>
								</form>
							</div>

						</div>
					</div>
					<div class="mt-5 text-center small">
						<p>Setelah membuat pesanan, maka data pesanan ini akan masuk ke riwayat pembayaran anda. Dan harap untuk
							melakukan proses pembayaran serta upload bukti pembayaran di halaman upload bukti pembayaran ini.
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

	</script>
