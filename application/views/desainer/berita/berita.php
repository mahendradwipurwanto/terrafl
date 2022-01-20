     <!-- start page title -->
     <div class="row">
     	<div class="col-12">
     		<div class="page-title-box d-flex align-items-center justify-content-between">
     			<h4 class="page-title mb-0 font-size-18">Daftar berita</h4>

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
     	<div class="col-12">
     		<div class="card">
     			<div class="card-body">
     				<h4 class="card-title">Daftar berita
     					<a href="<?= site_url('desainer/posting-berita');?>"
     						class="btn btn-primary waves-light waves-effect btn-sm float-right">
     						Posting berita
     					</a>
     				</h4>
     				<hr>
     				<table id="datatable" class="table table-centered dt-responsive nowrap w-100">
     					<thead>
     						<tr>
     							<th scope="col">Tanggal</th>
     							<th scope="col"></th>
     							<th scope="col">Judul</th>
     							<th scope="col">Kategori</th>
     							<th scope="col"></th>
     						</tr>
     					</thead>
     					<tbody>
     						<?php if($berita != false){?>
     						<?php foreach($berita as $key){?>
     						<tr>
     							<td><?= date("d/F/Y", $key->TANGGAL);?></td>
     							<td>
     								<a href="<?= site_url('desainer/edit-berita/'.$key->LINK_BERITA);?>"
     									class="btn btn-info text-white btn-sm"><i class="far fa-edit"></i></a>
     								<a href="<?= site_url('berita/baca/'.$key->LINK_BERITA);?>" target="_blank"
     									class="btn btn-secondary btn-sm"><i class="far fa-eye"></i></a>
     								<button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
     									data-target="#hapus-<?= $key->ID_BERITA;?>"><i class="fas fa-trash"></i></button>
     							</td>
     							<td><?= $key->JUDUL;?><?php if ($key->DRAFT == 1) { echo " - <i class='text-warning'>Draft</i>"; };?>
     							</td>
     							<td><span
     									class="badge <?php $a = rand(1, 4); if($a == 1){ echo 'badge-primary';}elseif($a == 2){echo 'badge-info'; }elseif($a == 3){echo 'badge-warning';}else{ echo 'badge-orange'; }?>"><?= $key->KATEGORI;?></span>
     							</td>
     							<td><i class="far fa-eye mr-1"></i> <?= number_format($key->VIEWER,0,",",".")?> <i
     									class="fas fa-comment-dots ml-2 mr-1"></i>
     								<?= number_format($this->M_admin->get_countCommentBerita($key->ID_BERITA),0,",",".")?></td>
     						</tr>

     						<div id="hapus-<?= $key->ID_BERITA;?>" class="modal fade bs-example-modal-center" tabindex="-1"
     							role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
     							<div class="modal-dialog modal-dialog-centered modal-sm">
     								<div class="modal-content">
     									<div class="modal-header">
     										<h5 class="modal-title mt-0">Hapus berita</h5>
     										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
     											<span aria-hidden="true">&times;</span>
     										</button>
     									</div>
     									<div class="modal-body">
     										<p>Apakah anda yakin, ingin menghapus berita ini?</p>
     										<div class="modal-footer mx-0 px-0">
     											<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
     											<a href="<?= site_url('desainer/proses_hapusBerita/'.$key->ID_BERITA);?>"
     												class="btn btn-danger">hapus</a>
     										</div>
     									</div>
     								</div>
     								<!-- /.modal-content -->
     							</div>
     							<!-- /.modal-dialog -->
     						</div>
     						<!-- /.modal -->
     						<?php }?>
     						<?php }?>
     					</tbody>
     				</table>
     			</div>
     		</div>
     	</div>
     </div>
     <!-- end row -->
