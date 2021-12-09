                    <!-- start page title -->
                    <div class="row">
                    	<div class="col-12">
                    		<div class="page-title-box d-flex align-items-center justify-content-between">
                    			<h4 class="page-title mb-0 font-size-18">Dashboard</h4>

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
                    							<i class="mdi mdi-camera-account"></i>
                    						</span>
                    					</div>
                    					<div class="media-body">
                    						<div class="font-size-16 mt-2">Total Desainer</div>
                    					</div>
                    				</div>
                    				<h4 class="mt-4"><?= number_format($total_desainer,0,",",".")?></h4>
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
                    						<div class="font-size-16 mt-2">Total Request</div>
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
                    							<i class="mdi mdi-coin-outline"></i>
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
                    </div>

                    <div class="row">
                    	<div class="col-md-6">
                    		<div class="card">
                    			<div class="card-body">
                    				<h4 class="card-title">Komentar</h4>
                    				<hr>
                    				<table id="datatable2" class="table table-centered dt-responsive nowrap w-100">
                    					<thead>
                    						<tr>
                    							<th scope="col">Komentar</th>
                    							<th scope="col">Dari</th>
                    							<th scope="col">Pada</th>
                    						</tr>
                    					</thead>
                    					<tbody>
                    						<?php if($komentar != false){?>
                    						<?php $no = 1; foreach($komentar as $key){?>
                    						<tr>
                    							<td>
                    								<button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                    									data-target="#komentar-<?= $key->ID_KOMENTAR;?>"><i class="fas fa-eyes"></i>
                    									baca</button>
                    							</td>
                    							<td><?= $key->NAMA;?></td>
                    							<td>
                    								<?php if($key->JENIS = 1){?>
                    								<span class="badge badge-warning">berita</span>
                    								- <i><?= $this->M_admin->get_judulBerita($key->ID_BERITA);?></i>
                    								<?php }else{?>
                    								<span class="badge badge-info">desain</span>
                    								- <i><?= $this->M_admin->get_judulDesain($key->ID_DESAIN);?></i>
                    								<?php }?>
                    							</td>
                    						</tr>

                    						<div id="komentar-<?= $key->ID_KOMENTAR;?>" class="modal fade bs-example-modal-center"
                    							tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    							<div class="modal-dialog modal-dialog-centered">
                    								<div class="modal-content">
                    									<div class="modal-header">
                    										<h5 class="modal-title mt-0">Komentar</h5>
                    										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    											<span aria-hidden="true">&times;</span>
                    										</button>
                    									</div>
                    									<div class="modal-body">
                    										<p><?= $key->KOMENTAR;?></p>
                    										<small><i class="mdi mdi-clock-outline mr-2"></i>
                    											<?= date("d/m/y H:i", $key->TANGGAL);?></small>
                    										<div class="modal-footer px-0">
                    											<button type="button" class="btn btn-secondary btn-sm"
                    												data-dismiss="modal">Tutup</button>
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
                    	<div class="col-md-6">
                    		<div class="card">
                    			<div class="card-body">
                    				<h4 class="card-title">Kelola kategori
                    					<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                    						data-target="#tambah_kategori">tambah kategori</button>
                    				</h4>
                    				<hr>
                    				<table id="datatable" class="table table-centered dt-responsive nowrap w-100">
                    					<thead>
                    						<tr>
                    							<th scope="col">No</th>
                    							<th scope="col"></th>
                    							<th scope="col">Kategori</th>
                    							<th scope="col">Keterangan</th>
                    						</tr>
                    					</thead>
                    					<tbody>
                    						<?php if($kategori != false){?>
                    						<?php $no = 1; foreach($kategori as $key){?>
                    						<tr>
                    							<td><?= $no++;?></td>
                    							<td>
                    								<button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                    									data-target="#edit_kategori-<?= $key->ID_KATEGORI;?>">edit</button>
                    								<button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                    									data-target="#hapus_kategori-<?= $key->ID_KATEGORI;?>">hapus</button>
                    							</td>
                    							<td><?= $key->KATEGORI;?></td>
                    							<td><i><?= $key->KETERANGAN;?></i></td>
                    						</tr>

                    						<div id="edit_kategori-<?= $key->ID_KATEGORI;?>"
                    							class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
                    							aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    							<div class="modal-dialog modal-dialog-centered">
                    								<div class="modal-content">
                    									<div class="modal-header">
                    										<h5 class="modal-title mt-0">Edit kategori - <?= $key->KATEGORI;?></h5>
                    										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    											<span aria-hidden="true">&times;</span>
                    										</button>
                    									</div>
                    									<div class="modal-body">
                    										<form action="<?= site_url('admin/edit_kategori');?>" method="post">
                    											<input type="hidden" name="id_kategori" value="<?= $key->ID_KATEGORI;?>">
                    											<div class="form-group">
                    												<label class="input-label">Kategori</label>
                    												<input type="text" class="form-control" name="kategori"
                    													value="<?= $key->KATEGORI;?>" required>
                    											</div>
                    											<div class="form-group">
                    												<label class="input-label">Kategori</label>
                    												<textarea type="text" class="form-control" rows="3"
                    													name="keterangan"><?= $key->KETERANGAN;?></textarea>
                    											</div>
                    											<div class="modal-footer px-0">
                    												<button type="button" class="btn btn-secondary btn-sm"
                    													data-dismiss="modal">Batal</button>
                    												<button type="submit" class="btn btn-info btn-sm">Ubah kategori</button>
                    											</div>
                    										</form>
                    									</div>
                    									<!-- /.modal-content -->
                    								</div>
                    								<!-- /.modal-dialog -->
                    							</div>
                    							<!-- /.modal -->
                    						</div>

                    						<div id="hapus_kategori-<?= $key->ID_KATEGORI;?>"
                    							class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
                    							aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    							<div class="modal-dialog modal-dialog-centered">
                    								<div class="modal-content">
                    									<div class="modal-header">
                    										<h5 class="modal-title mt-0">Hapus kategori - <?= $key->KATEGORI;?></h5>
                    										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    											<span aria-hidden="true">&times;</span>
                    										</button>
                    									</div>
                    									<div class="modal-body">
                    										<p>Apakah anda yakin ingin menghapus kategori <b><?= $key->KATEGORI;?></b>?</p>
                    										<div class="modal-footer px-0">
                    											<button type="button" class="btn btn-secondary btn-sm"
                    												data-dismiss="modal">Batal</button>
                    											<a href="<?= site_url('admin/hapus_kategori/'.$key->ID_KATEGORI);?>"
                    												class="btn btn-danger btn-sm">hapus kategori</a>
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

                    <div id="tambah_kategori" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
                    	aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    	<div class="modal-dialog modal-dialog-centered">
                    		<div class="modal-content">
                    			<div class="modal-header">
                    				<h5 class="modal-title mt-0">Tambah kategori</h5>
                    				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    					<span aria-hidden="true">&times;</span>
                    				</button>
                    			</div>
                    			<div class="modal-body">
                    				<form action="<?= site_url('admin/tambah_kategori');?>" method="post">
                    					<div class="form-group">
                    						<label class="input-label">Kategori</label>
                    						<input type="text" class="form-control" name="kategori" placeholder="Masukkan kategori"
                    							required>
                    					</div>
                    					<div class="form-group">
                    						<label class="input-label">Kategori</label>
                    						<textarea type="text" class="form-control" rows="3" name="keterangan"
                    							placeholder="Tambahkan keterangan"></textarea>
                    					</div>
                    					<div class="modal-footer px-0">
                    						<button type="button" class="btn btn-secondary btn-sm"
                    							data-dismiss="modal">Batal</button>
                    						<button type="submit" class="btn btn-info btn-sm">Ubah kategori</button>
                    					</div>
                    				</form>
                    			</div>
                    			<!-- /.modal-content -->
                    		</div>
                    		<!-- /.modal-dialog -->
                    	</div>
                    	<!-- /.modal -->
                    </div>
