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
     	<div class="col-xl-3">
     		<div class="card">
     			<div class="card-body">
     				<div>
     					<div class="pb-3 border-bottom">
     						<div class="row align-items-center">
     							<div class="col-8">
     								<p class="mb-2">Total Request</p>
     								<h4 class="mb-0"><?= number_format($total_request,0,",",".")?></h4>
     							</div>
     							<div class="col-4">
     								<div class="text-right">
     									<i class="mdi mdi-package-variant h3 text-info"></i>
     								</div>
     							</div>
     						</div>
     					</div>
     					<div class="py-3 border-bottom">
     						<div class="row align-items-center">
     							<div class="col-8">
     								<p class="mb-2">Pending</p>
     								<h4 class="mb-0"><?= number_format($request_pending,0,",",".")?></h4>
     							</div>
     							<div class="col-4">
     								<div class="text-right">
     									<i class="mdi mdi-television-pause h3 text-secondary"></i>
     								</div>
     							</div>
     						</div>
     					</div>
     					<div class="py-3 border-bottom">
     						<div class="row align-items-center">
     							<div class="col-8">
     								<p class="mb-2">Proses</p>
     								<h4 class="mb-0"><?= number_format($request_proses,0,",",".")?></h4>
     							</div>
     							<div class="col-4">
     								<div class="text-right">
     									<i class="mdi mdi-typewriter h3 text-primary"></i>
     								</div>
     							</div>
     						</div>
     					</div>
     					<div class="pt-3">
     						<div class="row align-items-center">
     							<div class="col-8">
     								<p class="mb-2">Selesai</p>
     								<h4 class="mb-0"><?= number_format($request_selesai,0,",",".")?></h4>
     							</div>
     							<div class="col-4">
     								<div class="text-right">
     									<i class="mdi mdi-briefcase-check h3 text-success"></i>
     								</div>
     							</div>
     						</div>
     					</div>
     				</div>
     			</div>
     		</div>
     	</div>
     	<div class="col-xl-9">
     		<div class="card">
     			<div class="card-body">
     				<h4 class="card-title">Request desain pengguna</h4>
     					<hr>
     					<table id="datatable" class="table table-centered dt-responsive nowrap w-100">
     						<thead>
     							<tr>
     								<th scope="col">Tanggal</th>
     								<th scope="col"></th>
     								<th scope="col">Atas Nama</th>
     								<th scope="col">Judul</th>
     								<th scope="col">Biaya</th>
     								<th scope="col">Status</th>
     							</tr>
     						</thead>
     						<tbody>
     							<?php if($request != false){?>
     							<?php foreach($request as $key){?>
     							<tr>
     								<td><?= date("d/F/Y", strtotime($key->TANGGAL));?></td>
     								<td><a href="<?= site_url('desainer/detail-request/');?>" class="btn btn-success btn-sm">Detail</a>
     								</td>
     								<td><?= $key->NAMA;?></td>
     								<td>Rp. <?= number_format($key->BIAYA,0,",",".")?></td>
     								<td>
     									<?php if($key->STATUS == 0){
													echo '<span class="badge badge-soft-secondary font-size-12">Pending</span>';
											}elseif ($key->STATUS == 1) {
													echo '<span class="badge badge-soft-primary font-size-12">Proses pengerjaan</span>';
											}elseif ($key->STATUS == 2) {
													echo '<span class="badge badge-soft-success font-size-12">Selesai</span>';
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
