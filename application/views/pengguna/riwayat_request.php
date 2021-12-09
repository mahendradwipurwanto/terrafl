<div class="page-hero-section bg-image hero-mini shadow-soft"
	style="background-image: url(<?= base_url();?>assets/frontend/img/hero_mini.svg);background-position: top;height: 110px;">
</div>
<div class="page-section">
	<div class="container">
		<div class="row align-items-lg-center">
			<div class="col-lg-12 mb-4">
				<div class="mb-2">
					<h1 class="mb-0">Riwayat request <?= $pengguna->NAMA;?></h1>
					<p>Cek dan kelola riwayat requestmu disini</p>
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
									<th scope="col"></th>
									<th scope="col">Judul</th>
									<th scope="col">Biaya</th>
									<th scope="col">Status</th>
								</tr>
							</thead>
							<tbody>
								<?php if($request != false){?>
								<?php foreach($request as $key){?>
								<tr>
									<td><?= date("d/F/Y", $key->TANGGAL);?></td>
									<td><a href="<?= site_url('pengguna/detail-request/'.$key->ID_REQUEST);?>"
											class="btn btn-success btn-sm">Detail</a>
									</td>
									<td><?= $key->JUDUL;?></td>
									<td>Rp. <?= number_format($key->BIAYA,0,",",".")?></td>
									<td>
										<?php if($key->STATUS == 0){
                                                                 echo '<span class="badge badge-secondary font-size-12">Pending</span>';
                                                       }elseif ($key->STATUS == 1) {
                                                                 echo '<span class="badge badge-primary font-size-12">Proses pengerjaan</span>';
                                                       }elseif ($key->STATUS == 2) {
                                                                 echo '<span class="badge badge-success font-size-12">Selesai</span>';
                                                       }elseif ($key->STATUS == 3) {
                                                                 echo '<span class="badge badge-danger font-size-12">Ditolak</span>';
                                                       }else{
                                                                 echo '<span class="badge badge-warning font-size-12">ERROR</span>';
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
	</div>
</div>
