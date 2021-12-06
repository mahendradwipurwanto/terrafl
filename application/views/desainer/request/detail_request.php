     <!-- start page title -->
     <div class="row">
     	<div class="col-12">
     		<div class="page-title-box d-flex align-items-center justify-content-between">
     			<h4 class="page-title mb-0 font-size-18">Detail request</h4>

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
     				<h4 class="card-title">Pengirim</h4>
     				<div class="mt-3">
     					<p class="font-size-12 text-muted mb-1">Nama pengirim</p>
     					<h6 class="text-body">Mahendra Dwi Purwanto</h6>
     				</div>

     				<div class="mt-3">
     					<p class="font-size-12 text-muted mb-1">Nomor Telepon</p>
     					<h6 class="text-body">085-402-841</h6>
     				</div>

     				<div class="mt-3">
     					<p class="font-size-12 text-muted mb-1">Email</p>
     					<h6 class="text-body">StaceyTLopez@armyspy.com</h6>
     				</div>
     			</div>
     		</div>
     	</div>
     	<div class="col-xl-9">
     		<div class="card">
     			<div class="card-body">
     				<h4 class="card-title">Informasi permintaan</h4>
     				<!-- Timeline row Start -->
     				<div class="row">

     					<!-- Timeline 1 -->
     					<div class="col-lg-9">
     						<h4>Buatkan makanan</h4>
     						<p class="card-title-desc">Hi I'm Patrick Becker, been industry's standard dummy ultrices Cambridge.
     							Hi
     							I'm Patrick Becker, been industry's standard dummy ultrices Cambridge. Hi I'm Patrick Becker, been
     							industry's standard dummy ultrices Cambridge. Hi I'm Patrick Becker, been industry's standard dummy
     							ultrices Cambridge. Hi I'm Patrick Becker, been industry's standard dummy ultrices Cambridge. Hi
     							I'm
     							Patrick Becker, been industry's standard dummy ultrices Cambridge.</p>
     					</div>
     					<!-- Timeline 1 -->

     					<!-- Timeline 2 -->
     					<div class="col-lg-3">
     						<h6 class="text-muted mb-2">File pengguna</h6>
     						<a href="" class="mb-5 mb-lg-0">
     							<div class="bg-light text-center p-2 pt-4 rounded">
     								<i class="fa fa-file h1 text-primary mb-2"></i>
     								<h6 class="font-weight-normal">Front end Developer</h6>
     							</div>
     						</a>
     					</div>
     					<!-- Timeline 2 -->
     				</div>
     				<!-- Timeline row Over -->
     				<hr>
     				<h4 class="card-title mb-4">Informasi pengerjaan
     					<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
     						data-target="#kelola_permintaan">kelola permintaan</button>
     					<a href="" class="btn btn-success btn-sm float-right">pembayaran</a>
     				</h4>

     				<div class="row">
     					<div class="col-4">
     						<p class="font-size-2 text-muted mb-1">Tanggal request</p>
     						<h4 class="text-body">12 November 2021</h6>
     							<div class="mt-3">
     								<p class="font-size-2 text-muted mb-1">Lama Pengerjaan</p>
     								<h4 class="text-body">2 minggu</h6>
     							</div>
     					</div>
     					<div class="col-4">
     						<p class="font-size-2 text-muted mb-1">Tanggal diterima</p>
     						<h4 class="text-body">25 November 2021</h6>
     					</div>
     					<div class="col-4 border-left text-right">
     						<p class="font-size-2 text-muted mb-1">Biaya Pengerjaan</p>
     						<h1 class="text-body">Rp. 12.000</h1>
     					</div>
     				</div>
     			</div>
     		</div>
     	</div>
     </div>
     <!-- end row -->


     <div id="kelola_permintaan" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
     	aria-labelledby="mySmallModalLabel" aria-hidden="true">
     	<div class="modal-dialog modal-dialog-centered">
     		<div class="modal-content">
     			<div class="modal-header">
     				<h5 class="modal-title mt-0">Kelola permintaan pengguna</h5>
     				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
     					<span aria-hidden="true">&times;</span>
     				</button>
     			</div>
     			<div class="modal-body">
     				<form action="" method="post">
     					<div class="form-group">
     						<label>Lama pengerjaan</label>
     						<div class="row">
     							<div class="col-8">
     								<input type="number" min="1" class="form-control" name="lama" placeholder="Lama pengerjaan">
     							</div>
     							<div class="col-4">
     								<select class="form-control" name="rentang">
     									<option selected>Pilih rentang</option>
     									<option value="Hari">Hari</option>
     									<option value="Minggu">Minggu</option>
     									<option value="Bulan">Bulan</option>
     								</select>
     							</div>
     						</div>
     					</div>
     					<div class="form-group">
     						<label for="status">Status permintaan</label>
     						<select class="form-control" name="status">
     							<option selected>Ganti status</option>
     							<option value="1">Proses Pengerjaan</option>
     							<option value="2">Selesai</option>
     							<option value="3">Ditolak</option>
     						</select>
     					</div>
     					<div class="modal-footer px-0">
     						<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
     						<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
     					</div>
     				</form>
     			</div>
     		</div>
     		<!-- /.modal-content -->
     	</div>
     	<!-- /.modal-dialog -->
     </div>
