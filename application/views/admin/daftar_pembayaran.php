     <!-- start page title -->
     <div class="row">
     	<div class="col-12">
     		<div class="page-title-box d-flex align-items-center justify-content-between">
     			<h4 class="page-title mb-0 font-size-18">Request desain pengguna</h4>

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

     <div class="row">
     	<div class="col-md-3">
     		<div class="card">
     			<div class="card-body">
     				<div class="media">
     					<div class="avatar-sm font-size-20 mr-3">
     						<span class="avatar-title bg-soft-primary text-primary rounded">
     							<i class="mdi mdi-tag-plus-outline"></i>
     						</span>
     					</div>
     					<div class="media-body">
     						<div class="font-size-16 mt-2">Total Pembayaran</div>
     					</div>
     				</div>
     				<h4 class="mt-4"><?= number_format($total_pembayaran,0,",",".")?></h4>
     			</div>
     		</div>
     	</div>
     	<div class="col-md-3">
     		<div class="card">
     			<div class="card-body">
     				<div class="media">
     					<div class="avatar-sm font-size-20 mr-3">
     						<span class="avatar-title bg-soft-primary text-primary rounded">
     							<i class="mdi mdi-package-variant"></i>
     						</span>
     					</div>
     					<div class="media-body">
     						<div class="font-size-16 mt-2">Menunggu konfirmasi</div>
     					</div>
     				</div>
     				<h4 class="mt-4"><?= number_format($pembayaran_pending,0,",",".")?></h4>
     			</div>
     		</div>
     	</div>
     	<div class="col-md-3">
     		<div class="card">
     			<div class="card-body">
     				<div class="media">
     					<div class="avatar-sm font-size-20 mr-3">
     						<span class="avatar-title bg-soft-primary text-primary rounded">
     							<i class="mdi mdi-package-variant"></i>
     						</span>
     					</div>
     					<div class="media-body">
     						<div class="font-size-16 mt-2">Telah dikonfirmasi</div>
     					</div>
     				</div>
     				<h4 class="mt-4"><?= number_format($pembayaran_selesai,0,",",".")?></h4>
     			</div>
     		</div>
     	</div>
     	<div class="col-md-3">
     		<div class="card">
     			<div class="card-body">
     				<div class="media">
     					<div class="avatar-sm font-size-20 mr-3">
     						<span class="avatar-title bg-soft-primary text-primary rounded">
     							<i class="mdi mdi-package-variant"></i>
     						</span>
     					</div>
     					<div class="media-body">
     						<div class="font-size-16 mt-2">Ditolak</div>
     					</div>
     				</div>
     				<h4 class="mt-4"><?= number_format($pembayaran_tolak,0,",",".")?></h4>
     			</div>
     		</div>
     	</div>
     </div>

     <div class="row">
     	<div class="col-xl-12">
     		<div class="card">
     			<div class="card-body">
     				<h4 class="card-title">Data Pembayaran</h4>
     				<hr>
     				<table id="datatable" class="table table-centered dt-responsive nowrap w-100">
     					<thead>
     						<tr>
     							<th scope="col">Tanggal</th>
     							<th scope="col">ID.Bayar</th>
     							<th scope="col"></th>
     							<th scope="col">Atas Nama</th>
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
     								<button type="button" class="btn btn-info btn-sm" data-toggle="modal"
     									data-target="#bukti-pembayaran<?= $key->ID_PEMBAYARAN;?>">Bukti
     									bayar</button>
     								<button type="button" class="btn btn-success btn-sm" data-toggle="modal"
     									data-target="#detail-pembayaran<?= $key->ID_PEMBAYARAN;?>">Detail</button>
     							</td>
     							<td><?= $key->NAMA;?></td>
     							<td>
     								<?= $key->JENIS == 1 ? '<span class="badge badge-soft-primary font-size-12">Desain</span>' : '<span class="badge badge-soft-info font-size-12">Request</span>';?>
     							</td>
     							<td>Rp. <?= number_format($key->NOMINAL,0,",",".")?></td>
     							<td>
     								<?php if($key->STATUS == 1){
													echo '<span class="badge badge-soft-secondary font-size-12">Menunggu konfirmasi</span>';
											}elseif ($key->STATUS == 2) {
												echo '<span class="badge badge-soft-success font-size-12">Diterima</span>';
											}elseif ($key->STATUS == 3) {
													echo '<span class="badge badge-soft-danger font-size-12">Ditolak</span>';
											}else{
													echo '<span class="badge badge-soft-warning font-size-12">ERROR</span>';
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
     												<span class="text-muted font-weight-normal">Ditujukan untuk desainer</span>
     											</div>
     											<div class="col-4  border-bottom pb-1">
     												<span class="text-dark font-weight-medium"><?= $key->NAMA_DESAINER;?> <a
     														href="<?= site_url('admin/detail-desainer/'.$key->ID_DESAINER);?>" target="_blank"
     														class="btn btn-info btn-sm ml-1"><i
     															class="far fa-share-square font-weight-normal"></i></a></span>
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
																echo '<span class="badge badge-soft-secondary font-size-12">Menunggu konfirmasi</span>';
																}elseif ($key->STATUS == 2) {
																	echo '<span class="badge badge-soft-success font-size-12">Diterima</span>';
																}elseif ($key->STATUS == 3) {
																	echo '<span class="badge badge-soft-danger font-size-12">Ditolak</span>';
																}else{
																	echo '<span class="badge badge-soft-warning font-size-12">ERROR</span>';
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
     											<strong><i class="fas fa-info"></i></strong> Bukti pembayaran belum
     											di unggah oleh pengguna
     											<?php }else{?>
     											<img
     												src="<?= base_url();?>berkas/pembayaran/<?= $key->ID_PEMBAYARAN;?>/<?= $key->BUKTI_BAYAR;?>"
     												class="d-block w-100">
     											<?php }?>
     											<div class="modal-footer mx-0 px-0">
     												<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
     											</div>
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
     <!-- end row -->
