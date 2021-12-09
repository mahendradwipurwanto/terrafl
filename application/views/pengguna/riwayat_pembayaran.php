<div class="page-hero-section bg-image hero-mini shadow-soft"
	style="background-image: url(<?= base_url();?>assets/frontend/img/hero_mini.svg);background-position: top;height: 110px;">
</div>
<div class="page-section">
	<div class="container">
		<div class="row align-items-lg-center">
			<div class="col-lg-12 mb-4">
				<div class="mb-2">
					<h1 class="mb-0">Riwayat pembayaran <?= $pengguna->NAMA;?></h1>
					<p>Cek dan kelola riwayat pembayaranmu disini</p>
				</div>

			</div>

		</div>
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="card shadow-soft">
					<div class="card-body">
						<table id="datatable" class="table table-centered dt-responsive nowrap w-100">
							<thead>
								<tr>
									<th scope="col">Tanggal</th>
									<th scope="col">ID.Bayar</th>
									<th scope="col"></th>
									<th scope="col">Pembayaran</th>
									<th scope="col">Nominal</th>
									<th scope="col">Status</th>
								</tr>
							</thead>
							<tbody>
								<?php if($pembayaran != false){?>
								<?php foreach($pembayaran as $key){?>
								<tr>
									<td><?= date("d/m/Y", $key->TANGGAL);?></td>
									<td><a href="#" class="text-primary font-weight-medium">#<?= $key->ID_PEMBAYARAN;?></a></td>
									<td>
										<?php if($key->STATUS == 2 && $key->JENIS == 1){?>
										<a href="<?= site_url('download/'.$key->ID_DESAIN.'/'.$this->M_pembayaran->get_fileDesain($key->ID_DESAIN));?>"
											target="_blank" class="btn btn-primary btn-sm">Download desain</a>
										<?php }?>
										<?php if($key->STATUS == 0){?>
										<a href="<?= site_url('pembayaran/bayar/'.$key->ID_PEMBAYARAN);?>" target="_blank"
											class="btn btn-success btn-sm">Unggah Bukti
											bayar</a>
										<?php }else{?>
										<button type="button" class="btn btn-info btn-sm" data-toggle="modal"
											data-target="#bukti-pembayaran<?= $key->ID_PEMBAYARAN;?>">Bukti
											bayar</button>
										<?php }?>
										<button type="button" class="btn btn-success btn-sm" data-toggle="modal"
											data-target="#detail-pembayaran<?= $key->ID_PEMBAYARAN;?>">Detail</button>
									</td>
									<td>
										<?= $key->JENIS == 1 ? '<span class="badge badge-primary font-size-12">Desain</span>' : '<span class="badge badge-info font-size-12">Request</span>';?>
									</td>
									<td>Rp. <?= number_format($key->NOMINAL,0,",",".")?></td>
									<td>
										<?php if($key->STATUS == 1){
													echo '<span class="badge badge-secondary font-size-12">Menunggu konfirmasi</span>';
											}elseif ($key->STATUS == 2) {
												echo '<span class="badge badge-success font-size-12">Diterima</span>';
											}elseif ($key->STATUS == 3) {
													echo '<span class="badge badge-danger font-size-12">Ditolak</span>';
											}else{
													echo '<span class="badge badge-warning font-size-12">Unggah bukti bayar</span>';
											}?>
									</td>
								</tr>

								<div id="detail-pembayaran<?= $key->ID_PEMBAYARAN;?>" class="modal fade bs-example-modal-center"
									tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title mt-0">Detail pembayaran</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<div class="row mb-3">
													<div class="col-8">
														<span class="text-muted font-weight-normal">ID BAYAR</span>
													</div>
													<div class="col-4  border-bottom pb-1">
														<span class="text-primary font-weight-medium">#<?= $key->ID_PEMBAYARAN;?></span>
													</div>
												</div>
												<div class="row mb-3">
													<div class="col-8">
														<span class="text-muted font-weight-normal">Nama pemesan</span>
													</div>
													<div class="col-4  border-bottom pb-1">
														<span class="text-dark font-weight-medium"><?= $key->NAMA;?></span>
													</div>
												</div>
												<div class="row mb-3">
													<div class="col-8">
														<span class="text-muted font-weight-normal">Tanggal pesanan</span>
													</div>
													<div class="col-4  border-bottom pb-1">
														<span class="text-dark font-weight-medium"><?= date("d/m/Y", $key->TANGGAL);?></span>
													</div>
												</div>
												<div class="row mb-3">
													<div class="col-8">
														<span class="text-muted font-weight-normal">Pembayaran untuk -</span>
														<?= $key->JENIS == 1 ? '<span class="badge badge-primary">Pembelian DESAIN</span>' : '<span class="badge badge-warning">Request DESAIN</span>';?>
													</div>
													<div class="col-4  border-bottom pb-1">
														<span
															class="text-dark font-weight-medium"><?= $key->JENIS == 1 ? $key->JUDUL : $key->JUDUL_REQUEST;?></span>
													</div>
												</div>
												<div class="row">
													<div class="col-8">
														<span class="text-muted font-weight-normal">Total Tagihan</span>
													</div>
													<div class="col-4">
														<span class="h4 text-dark font-weight-medium">Rp.
															<?= number_format($key->NOMINAL,0,",",".")?></span>
													</div>
												</div>
												<hr>
												<div class="row mb-3">
													<div class="col-8">
														<span class="text-muted font-weight-normal">Metode pembayaran</span>
													</div>
													<div class="col-4  border-bottom pb-1">
														<span class="text-dark font-weight-medium"><?= $key->VIA;?></span>
													</div>
												</div>
												<div class="row mb-3">
													<div class="col-8">
														<span class="text-muted font-weight-normal">Atas nama</span>
													</div>
													<div class="col-4  border-bottom pb-1">
														<span class="text-dark font-weight-medium"><?= $key->ATAS_NAMA;?></span>
													</div>
												</div>
												<div class="row mb-3">
													<div class="col-8">
														<span class="text-muted font-weight-normal">Nomor E-Wallet / rekening</span>
													</div>
													<div class="col-4  border-bottom pb-1">
														<span class="text-dark font-weight-medium"><?= $key->NOMOR;?></span>
													</div>
												</div>
												<div class="row mb-3">
													<div class="col-8">
														<span class="text-muted font-weight-normal">Status pembayaran</span>
													</div>
													<div class="col-4  border-bottom pb-1">
														<?php if($key->STATUS == 1){
																echo '<span class="badge badge-secondary font-size-12">Menunggu konfirmasi</span>';
																}elseif ($key->STATUS == 2) {
																	echo '<span class="badge badge-success font-size-12">Diterima</span>';
																}elseif ($key->STATUS == 3) {
																	echo '<span class="badge badge-danger font-size-12">Ditolak</span>';
																}else{
																	echo '<span class="badge badge-warning font-size-12">Unggah bukti bayar</span>';
																}
																?>
													</div>
												</div>
												<?php if($key->STATUS >= 1){?>
												<div class="row mb-3">
													<div class="col-8">
														<span class="text-muted font-weight-normal">Tanggal pembayaran</span>
													</div>
													<div class="col-4">
														<span class="text-dark font-weight-medium"><?= date("d/m/Y", $key->TANGGAL);?></span>
													</div>
												</div>
												<?php }?>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
											</div>
											<!-- /.modal-content -->
										</div>
										<!-- /.modal-dialog -->
									</div>
									<!-- /.modal -->
								</div>

								<div id="bukti-pembayaran<?= $key->ID_PEMBAYARAN;?>" class="modal fade bs-example-modal-center"
									tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title mt-0">Bukti pembayaran</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<?php if($key->STATUS == 0){?>
												<div class="alert alert-warning text-dark" role="alert">
													<strong><i class="fas fa-info"></i></strong> Anda belum mengunggah bukti pembayaran ! Harap
													unggah bukti pembayaran !
													<?php }else{?>
												</div>
												<img
													src="<?= base_url();?>berkas/pembayaran/<?= $key->ID_PEMBAYARAN;?>/<?= $key->BUKTI_BAYAR;?>"
													class="d-block w-100">
												<?php }?>
												<div class="modal-footer mx-0 px-0">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
												</div>
											</div>
											<!-- /.modal-content -->
										</div>
										<!-- /.modal-dialog -->
									</div>
									<!-- /.modal -->
								</div>
								<?php }?>
								<?php }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
