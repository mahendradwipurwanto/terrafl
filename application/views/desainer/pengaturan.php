     <!-- start page title -->
     <div class="row">
     	<div class="col-12">
     		<div class="page-title-box d-flex align-items-center justify-content-between">
     			<h4 class="page-title mb-0 font-size-18">Pengaturan desainer</h4>

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

     <div class="row justify-content-center">
     	<div class="col-lg-6">
     		<div class="text-center mb-5">
     			<h4>Pengaturan desainer</h4>
     			<p class="text-muted">Atur segala informasi mengenai akun desainermu disini.</p>
     		</div>
     	</div>
     </div>

     <div class="row">
     	<div class="col-xl-4 col-md-6">
     		<div class="card plan-box">
     			<div class="card-body p-4">
     				<div class="media">
     					<div class="media-body">
     						<h5>Informasi Pribadi</h5>
     						<p class="text-muted">Atur informasi pribadimu disini</p>
     					</div>
     					<div class="ml-3">
     						<i class="bx bx-food-menu h1 text-primary"></i>
     					</div>
     				</div>

     				<div class="text-center">
     					<a href="<?= site_url('desainer/pengaturan/informasi-pribadi');?>"
     						class="btn btn-primary waves-effect waves-light">Atur sekarang</a>
     				</div>

     			</div>
     		</div>
     	</div>
     	<div class="col-xl-4 col-md-6">
     		<div class="card plan-box">
     			<div class="card-body p-4">
     				<div class="media">
     					<div class="media-body">
     						<h5>Metode Pembayaran</h5>
     						<p class="text-muted">Atur metode pembayaranmu disini</p>
     					</div>
     					<div class="ml-3">
     						<i class="bx bx-credit-card h1 text-primary"></i>
     					</div>
     				</div>

     				<div class="text-center">
     					<a href="<?= site_url('desainer/pengaturan/metode-pembayaran');?>"
     						class="btn btn-primary waves-effect waves-light">Atur sekarang</a>
     				</div>

     			</div>
     		</div>
     	</div>
     	<div class="col-xl-4 col-md-6">
     		<div class="card plan-box">
     			<div class="card-body p-4">
     				<div class="media">
     					<div class="media-body">
     						<h5>Credentials</h5>
     						<p class="text-muted">Atur informasi credentialsmu</p>
     					</div>
     					<div class="ml-3">
     						<i class="bx bx-shield-quarter h1 text-primary"></i>
     					</div>
     				</div>

     				<div class="text-center">
     					<a href="<?= site_url('desainer/pengaturan/credentials');?>"
     						class="btn btn-primary waves-effect waves-light">Atur sekarang</a>
     				</div>

     			</div>
     		</div>
     	</div>
     </div>
