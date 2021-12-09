<!-- start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box d-flex align-items-center justify-content-between">
			<h4 class="page-title mb-0 font-size-18">Dashboard</h4>

			<div class="page-title-right">
				<ol class="breadcrumb m-0">
					<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
					<li class="breadcrumb-item active">Selamat datang,
						<?= $this->session->userdata('nama');?></li>
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
				<div class="media">
					<div class="avatar-sm font-size-20 mr-3">
						<span class="avatar-title bg-soft-primary text-primary rounded">
							<i class="mdi mdi-tag-plus-outline"></i>
						</span>
					</div>
					<div class="media-body">
						<div class="font-size-16 mt-2">Total Desain</div>
					</div>
				</div>
				<h4 class="mt-4"><?= number_format($total_desain,0,",",".")?></h4>
			</div>
		</div>
	</div>
	<div class="col-xl-3">
		<div class="card">
			<div class="card-body">
				<div class="media">
					<div class="avatar-sm font-size-20 mr-3">
						<span class="avatar-title bg-soft-primary text-primary rounded">
							<i class="mdi mdi-package-variant"></i>
						</span>
					</div>
					<div class="media-body">
						<div class="font-size-16 mt-2">Request Desain</div>
					</div>
				</div>
				<h4 class="mt-4"><?= number_format($total_request,0,",",".")?></h4>
			</div>
		</div>
	</div>
	<div class="col-xl-3">
		<div class="card">
			<div class="card-body">
				<div class="media">
					<div class="avatar-sm font-size-20 mr-3">
						<span class="avatar-title bg-soft-primary text-primary rounded">
							<i class="mdi mdi-sale"></i>
						</span>
					</div>
					<div class="media-body">
						<div class="font-size-16 mt-2">Desain Terjual</div>
					</div>
				</div>
				<h4 class="mt-4"><?= number_format($total_dijual,0,",",".")?></h4>
			</div>
		</div>
	</div>
	<div class="col-xl-3">
		<div class="card">
			<div class="card-body">
				<div class="media">
					<div class="avatar-sm font-size-20 mr-3">
						<span class="avatar-title bg-soft-primary text-primary rounded">
							<i class="mdi mdi-coin-outline"></i>
						</span>
					</div>
					<div class="media-body">
						<div class="font-size-16 mt-2">Pendapatan</div>
					</div>
				</div>
				<h4 class="mt-4">Rp. <?= number_format($total_pendapatan,0,",",".")?></h4>
			</div>
		</div>
	</div>
</div>

<?php if($metode == false){?>
<div class="row">
	<div class="col-12">
		<div class="alert alert-warning">
			<b>PERHATIAN !</b> Anda belum menambahkan metode pembayaran. Harap tambahkan metode pembayaran terlebih dahulu !
		</div>
	</div>
</div>
<?php }?>

<div class="row">
	<div class="col-lg-4">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title mb-4">Request Terbaru</h4>

				<ul class="inbox-wid list-unstyled">
					<?php if($request_terbaru == false){?>
					<li class="inbox-list-item">
						<div class="media">
							<div class="media-body text-center">
								<p class="text-truncate mb-0">Belum ada data</p>
							</div>
						</div>
					</li>
					<?php }else{?>
					<?php foreach($request_terbaru as $key){?>
					<li class="inbox-list-item">
						<a href="<?= site_url('desainer/detail-request/');?>">
							<div class="media">
								<div class="mr-3 align-self-center">
									<img src="<?= base_url();?>assets/backend/images/users/avatar-3.jpg" alt=""
										class="avatar-sm rounded-circle">
								</div>
								<div class="media-body overflow-hidden">
									<h5 class="font-size-16 mb-1">Paul</h5>
									<p class="text-truncate mb-0">Hey! there I'm available</p>
								</div>
								<div class="font-size-12 ml-2">
									05 min
								</div>
							</div>
						</a>
					</li>
					<?php }?>
					<?php }?>
				</ul>

				<?php if($request_terbaru != false){?>
				<div class="text-center">
					<a href="<?= site_url('desainer/request');?>" class="btn btn-primary btn-sm">lebih banyak</a>
				</div>
				<?php }?>
			</div>
		</div>
	</div>

	<div class="col-lg-8">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title mb-4">Pembayaran terbaru
					<a href="<?= site_url('desainer/pembayaran');?>" class="btn btn-primary float-right btn-sm">lebih
						banyak</a></h4>
				<table id="datatable" class="table table-centered dt-responsive nowrap w-100">
					<thead>
						<tr>
							<th scope="col">Tanggal</th>
							<th scope="col">Trans ID.</th>
							<th scope="col">Atas Nama</th>
							<th scope="col">Jumlah</th>
							<th scope="col">Status</th>
						</tr>
					</thead>
					<tbody>
						<?php if($pembayaran_terbaru != false){?>
						<?php foreach($pembayaran_terbaru as $key){?>
						<tr>
							<td><?= date("d/m/Y", $key->TANGGAL);?></td>
							<td>
								<a href="#" class="text-body font-weight-medium">#<?= $key->ID_PEMBAYARAN;?></a>
							</td>
							<td><?= $key->NAMA;?></td>
							<td>Rp. <?= number_format($key->NOMINAL,0,",",".")?></td>
							<td>
								<?php if($key->STATUS == 1){
										echo '<span class="badge badge-soft-secondary font-size-12">Pending</span>';
								}elseif ($key->STATUS == 2) {
										echo '<span class="badge badge-soft-success font-size-12">Diterima</span>';
								}elseif ($key->STATUS == 3) {
										echo '<span class="badge badge-soft-danger font-size-12">Ditolak</span>';
								}else{
										echo '<span class="badge badge-soft-warning font-size-12">ERROR</span>';
								}?>
							</td>
						</tr>
						<?php }?>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- end row -->
