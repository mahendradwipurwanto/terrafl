     <!-- start page title -->
     <div class="row">
     	<div class="col-12">
     		<div class="page-title-box d-flex align-items-center justify-content-between">
     			<h4 class="page-title mb-0 font-size-18">Daftar Desainer</h4>

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
     	<div class="col-xl-4">
     		<div class="card">
     			<div class="card-body">
     				<div class="media">
     					<div class="avatar-sm font-size-20 mr-3">
     						<span class="avatar-title bg-soft-primary text-primary rounded">
     							<i class="mdi mdi-tag-plus-outline"></i>
     						</span>
     					</div>
     					<div class="media-body">
     						<div class="font-size-16 mt-2">Total desainer</div>
     					</div>
     				</div>
     				<h4 class="mt-4"><?= number_format($total_desainer,0,",",".")?></h4>
     			</div>
     		</div>
     	</div>
     </div>

     <div class="row">
     	<div class="col-xl-12">
     		<div class="card">
     			<div class="card-body">
     				<h4 class="card-title">Daftar Desainer</h4>
     				<hr>
     				<table id="datatable" class="table table-centered dt-responsive nowrap w-100">
     					<thead>
     						<tr>
     							<th scope="col">No</th>
     							<th scope="col"></th>
     							<th scope="col">Nama</th>
     							<th scope="col">Email</th>
     							<th scope="col">No Telepon</th>
     						</tr>
     					</thead>
     					<tbody>
     						<?php if($desainer != false){?>
     						<?php $no = 1; foreach($desainer as $key){?>
     						<tr>
     							<td><?= $no++;?></td>
     							<td><a href="<?= site_url('admin/detail-desainer/'.$key->ID_USER);?>"
     									class="btn btn-info btn-sm">detail desainer</a></td>
     							<td><?= $key->NAMA;?></td>
     							<td><?= $key->EMAIL;?></td>
     							<td><a href="tel:<?= $key->NO_TELP;?>" class="btn btn-secondary btn-sm mr-2"><i
     										class="fas fa-phone"></i></a> <?= $key->NO_TELP;?></td>
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
