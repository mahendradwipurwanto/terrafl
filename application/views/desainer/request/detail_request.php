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
     		<div class="alert alert-info small font-weight-normal">
     			Setelah "Mengelola Permintaan", anda dapat mulai mengerjakan request setelah pengguna melakukan
     			pembayaran atau sebelum pada menu "Cek Pembayaran".</br></br>
     			Anda dapat mengirim hasil request desain pada menu "Kelola Pengiriman Request".
     		</div>
     		<div class="card">
     			<div class="card-body">
     				<h4 class="card-title">Pengirim</h4>
     				<div class="mt-3">
     					<p class="font-size-12 text-muted mb-1">Nama pengirim</p>
     					<h6 class="text-body"><?= $request->NAMA;?></h6>
     				</div>

     				<div class="mt-3">
     					<p class="font-size-12 text-muted mb-1">Nomor Telepon</p>
     					<h6 class="text-body"><a href="tel:<?= $request->NO_TELP;?>" target="_blank"
     							class="text-secondary mr-2"><i class="fas fa-phone"></i></a>
     						<?= $request->NO_TELP;?></h6>
     				</div>

     				<div class="mt-3">
     					<p class="font-size-12 text-muted mb-1">Email</p>
     					<h6 class="text-body"><a href="mailto:<?= $request->EMAIL;?>" target="_blank"
     							class="text-secondary mr-2"><?= $request->EMAIL;?></a></h6>
     				</div>
     			</div>
     		</div>
     	</div>
     	<div class="col-xl-9">
     		<?php if($request->STATUS > 0){?>
     		<?php if($pembayaran == false){?>
     		<div class="alert alert-warning">
     			<b>PERHATIAN !</b> Pengguna belum melakukan pembayaran untuk permintaan ini, disarankan menunggu
     			hingga pengguna melakukan pembayaran sesuai biaya yang anda kenakan ! Anda dapat menghubungi
     			pengguna melalui nomor telepon atau email yang tertera.
     		</div>
     		<?php } ?>
     		<?php } ?>
     		<div class="card">
     			<div class="card-body">
     				<h4 class="card-title">Informasi permintaan
     					<?php if($request->STATUS == 0){
                                        echo '<span class="badge badge-soft-secondary font-size-12">Pending</span>';
                              }elseif ($request->STATUS == 1) {
                                        echo '<span class="badge badge-soft-primary font-size-12">Proses pengerjaan</span>';
                              }elseif ($request->STATUS == 2) {
                                        echo '<span class="badge badge-soft-success font-size-12">Selesai</span>';
                              }elseif ($request->STATUS == 3) {
                                        echo '<span class="badge badge-soft-danger font-size-12">Ditolak</span>';
                              }else{
                                        echo '<span class="badge badge-soft-warning font-size-12">ERROR</span>';
                              }?>
     				</h4>
     				<!-- Timeline row Start -->
     				<div class="row">

     					<!-- Timeline 1 -->
     					<div class="col-lg-9">
     						<h4><?= $request->JUDUL;?></h4>
     						<p class="card-title-desc"><?= $request->CATATAN;?></p>
     					</div>
     					<!-- Timeline 1 -->

     					<?php if ($request->FILE != null) {?>
     					<!-- Timeline 2 -->
     					<div class="col-lg-3">
     						<h6 class="text-muted mb-2">File tambahan</h6>
     						<a href="<?= base_url();?>berkas/request/<?= $request->ID_REQUEST;?>/<?= $request->FILE;?>"
     							target="_blank" class="mb-5 mb-lg-0">
     							<div class="bg-light text-center p-2 pt-4 rounded">
     								<i class="fa fa-file h1 text-primary mb-2"></i>
     								<h6 class="font-weight-normal"><?= $request->FILE;?></h6>
     							</div>
     						</a>
     					</div>
     					<!-- Timeline 2 -->
     					<?php }else{?>
     					<div class="col-lg-3">
     						<h6 class="text-muted text-center font-weight-normal">Tidak ada tambahan file
     							dari pengguna</h6>
     					</div>
     					<?php }?>
     				</div>
     				<!-- Timeline row Over -->
     				<hr>
     				<h4 class="card-title mb-4">Informasi pengerjaan
     					<?php if ($request->STATUS == 0) { ?>
     					<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
     						data-target="#kelola_permintaan">Terima permintaan</button>
     					<button type="button" class="btn btn-danger btn-sm float-right mr-2"
     						data-toggle="modal" data-target="#tolak_permintaan">Tolak permintaan</button>
     					<?php }else{?>
     					<button type="button" class="btn btn-primary btn-sm float-right mr-2"
     						data-toggle="modal" data-target="#selesai_permintaan"
     						<?php if($pembayaran == false){ echo "disabled";}?>>Selesaikan
     						permintaan</button>
     					<?php }?>
     					<button type="button" data-toggle="modal" data-target="#pembayaran_permintaan"
     						class="btn btn-success btn-sm float-right mr-2">cek pembayaran</button>
     				</h4>

     				<div class="row">
     					<div class="col-4">
     						<p class="font-size-2 text-muted mb-0">Tanggal request</p>
     						<small class="text-info mb-2">tanggal saat pengguna mengirim request
     							ini</small>
     						<h4 class="text-body"><?= date("d F Y", $request->TANGGAL);?></h6>
     							<div class="mt-3">
     								<p class="font-size-2 text-muted mb-1">Lama Pengerjaan</p>
     								<?php if($request->STATUS == 0){?>
     								<span class="badge badge-warning">belum diterima</span>
     								<?php }else{?>
     								<h4 class="text-body"><?= $request->LAMA_PENGERJAAN;?></h6>
     									<?php }?>
     							</div>
     					</div>
     					<div class="col-4">
     						<p class="font-size-2 text-muted mb-0">Tanggal diterima</p>
     						<small class="text-info mb-2">tanggal saat anda menerima request ini</small>
     						<?php if($request->STATUS == 0){?>
     						<span class="badge badge-warning">belum diterima</span>
     						<?php }else{?>
     						<h4 class="text-body"><?= date("d F Y", $request->TANGGAL_DITERIMA);?></h6>
     							<?php }?>
     							<?php if($request->STATUS == 2){?>
     							<a href="<?= site_url('request/download/'.$request->ID_REQUEST.'/'.$request->FILE_REQUEST);?>"
     								class="btn btn-pill btn-primary btn-block" target="_blank">download
     								file request</a>
     							<?php }?>
     					</div>
     					<div class="col-4 border-left text-right">
     						<p class="font-size-2 text-muted mb-1">Biaya Pengerjaan</p>
     						<?php if($request->STATUS == 0){?>
     						<span class="badge badge-warning">belum diterima</span>
     						<?php }else{?>
     						<h1 class="text-body">Rp. <?= number_format($request->BIAYA,0,",",".");?></h1>
     						<?php }?>
     					</div>
     				</div>
     			</div>
     		</div>
     	</div>
     </div>
     <!-- end row -->


     <div id="selesai_permintaan" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
     	aria-labelledby="mySmallModalLabel" aria-hidden="true">
     	<div class="modal-dialog modal-dialog-centered">
     		<div class="modal-content">
     			<div class="modal-header">
     				<h5 class="modal-title mt-0">Selesaikan permintaan pengguna</h5>
     				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
     					<span aria-hidden="true">&times;</span>
     				</button>
     			</div>
     			<div class="modal-body">
     				<form action="<?= site_url('desainer/selesai_request/2/'.$request->EMAIL.'/'.$request->NAMA);?>"
     					method="post" enctype="multipart/form-data">
     					<input type="hidden" name="id_request" value="<?= $request->ID_REQUEST;?>">
     					<div class="alert alert-warning">
     						Jika permintaan selesai, harap upload file desain yang telah dikerjakan.
     					</div>
     					<div class="form-group">
     						<label for="status">File permintaan <small
     								class="text-danger">*</small></label>
     						<div class="custom-file">
     							<input type="file" class="custom-file-input" name="FILE" id="customFile"
     								accept=".zip,.rar,.7zip" required>
     							<label class="custom-file-label" for="customFile" id="fileName">Pilih
     								file</label>
     						</div>
     						<small class="text-muted">maksimal ukuran file 20mb</small>
     					</div>
     					<div class="form-group">
     						<label for="status">Tambahkan catatan <small
     								class="text-danger">*</small></label>
     						<textarea type="text" class="form-control" rows="3"
     							name="catatan"><?= $request->CATATAN_DESAINER;?></textarea>
     						<small class="text-danger">Tambahkan jika diperlukan.</small>
     					</div>
     					<div class="modal-footer px-0">
     						<button type="button" class="btn btn-secondary btn-sm"
     							data-dismiss="modal">Batal</button>
     						<button type="submit" class="btn btn-success btn-sm">Selesaikan
     							permintaan</button>
     					</div>
     				</form>
     			</div>
     		</div>
     		<!-- /.modal-content -->
     	</div>
     	<!-- /.modal-dialog -->
     </div>


     <div id="pembayaran_permintaan" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
     	aria-labelledby="mySmallModalLabel" aria-hidden="true">
     	<div class="modal-dialog modal-lg modal-dialog-centered">
     		<div class="modal-content">
     			<div class="modal-header">
     				<h5 class="modal-title mt-0">Pembayaran permintaan pengguna</h5>
     				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
     					<span aria-hidden="true">&times;</span>
     				</button>
     			</div>
     			<div class="modal-body">
     				<?php if($request->STATUS == 0){?>
     				<div class="alert alert-warning">
     					<b>PERHATIAN !</b> Permintaanmu belum diterima oleh desainer. Harap tunggu atau
     					hubungi desainer dengan kontak yang tertera
     				</div>
     				<?php }else{ ?>
     				<?php if($pembayaran == false){?>
     				<div class="alert alert-warning">
     					<b>PERHATIAN !</b> Permintaan ini telah diterima oleh desainer, tetapi anda belum
     					melakukan pembayaran untuk request ini!. Harap selesaikan pembayaran anda dengan
     					menekan tombol "Bayar sekarang"
     				</div>
     				<?php }else{ ?>
     				<div class="row mb-3">
     					<div class="col-8">
     						<span class="text-muted font-weight-normal">ID BAYAR</span>
     					</div>
     					<div class="col-4  border-bottom pb-1">
     						<span
     							class="text-primary font-weight-medium">#<?= $pembayaran->ID_PEMBAYARAN;?></span>
     					</div>
     				</div>
     				<div class="row mb-3">
     					<div class="col-8">
     						<span class="text-muted font-weight-normal">Nama pemesan</span>
     					</div>
     					<div class="col-4  border-bottom pb-1">
     						<span class="text-dark font-weight-medium"><?= $pembayaran->NAMA;?></span>
     					</div>
     				</div>
     				<div class="row mb-3">
     					<div class="col-8">
     						<span class="text-muted font-weight-normal">Tanggal pesanan</span>
     					</div>
     					<div class="col-4  border-bottom pb-1">
     						<span
     							class="text-dark font-weight-medium"><?= date("d/m/Y", $pembayaran->TANGGAL);?></span>
     					</div>
     				</div>
     				<div class="row mb-3">
     					<div class="col-8">
     						<span class="text-muted font-weight-normal">Pembayaran untuk -</span>
     						<?= $pembayaran->JENIS == 1 ? '<span class="badge badge-primary">Pembelian DESAIN</span>' : '<span class="badge badge-warning">Request DESAIN</span>';?>
     					</div>
     					<div class="col-4  border-bottom pb-1">
     						<span
     							class="text-dark font-weight-medium"><?= $pembayaran->JENIS == 1 ? $pembayaran->JUDUL : $pembayaran->JUDUL_REQUEST;?></span>
     					</div>
     				</div>
     				<div class="row">
     					<div class="col-8">
     						<span class="text-muted font-weight-normal">Total Tagihan</span>
     					</div>
     					<div class="col-4">
     						<span class="h4 text-dark font-weight-medium">Rp.
     							<?= number_format($pembayaran->NOMINAL,0,",",".")?></span>
     					</div>
     				</div>
     				<div class="row mb-3">
     					<div class="col-8">
     						<span class="text-muted font-weight-normal">Metode pembayaran</span>
     					</div>
     					<div class="col-4  border-bottom pb-1">
     						<span class="text-dark font-weight-medium"><?= $pembayaran->VIA;?></span>
     					</div>
     				</div>
     				<div class="row mb-3">
     					<div class="col-8">
     						<span class="text-muted font-weight-normal">Atas nama</span>
     					</div>
     					<div class="col-4  border-bottom pb-1">
     						<span class="text-dark font-weight-medium"><?= $pembayaran->ATAS_NAMA;?></span>
     					</div>
     				</div>
     				<div class="row mb-3">
     					<div class="col-8">
     						<span class="text-muted font-weight-normal">Nomor E-Wallet / rekening</span>
     					</div>
     					<div class="col-4  border-bottom pb-1">
     						<span class="text-dark font-weight-medium"><?= $pembayaran->NOMOR;?></span>
     					</div>
     				</div>
     				<div class="row mb-3">
     					<div class="col-8">
     						<span class="text-muted font-weight-normal">Status pembayaran</span>
     					</div>
     					<div class="col-4  border-bottom pb-1">
     						<?php if($pembayaran->STATUS == 1){
                                                  echo '<span class="badge badge-secondary font-size-12">Menunggu konfirmasi</span>';
                                                  }elseif ($pembayaran->STATUS == 2) {
                                                       echo '<span class="badge badge-success font-size-12">Diterima</span>';
                                                  }elseif ($pembayaran->STATUS == 3) {
                                                       echo '<span class="badge badge-danger font-size-12">Ditolak</span>';
                                                  }else{
                                                       echo '<span class="badge badge-warning font-size-12">ERROR</span>';
                                                  }
                                                  ?>
     					</div>
     				</div>
     				<?php if($pembayaran->STATUS >= 1){?>
     				<div class="row mb-3">
     					<div class="col-8">
     						<span class="text-muted font-weight-normal">Tanggal pembayaran</span>
     					</div>
     					<div class="col-4">
     						<span
     							class="text-dark font-weight-medium"><?= date("d/m/Y", $pembayaran->TANGGAL);?></span>
     					</div>
     				</div>
     				<?php }?>
     				<div class="row">
     					<div class="col-12">
     						<?php if($pembayaran->STATUS >= 1){?>
     						<p class="text-muted font-weight-normal">Bukti pembayaran</p>
     						<?php if($pembayaran->STATUS == 0){?>
     						<div class="alert alert-warning text-dark" role="alert">
     							<strong><i class="fas fa-info"></i></strong> Bukti pembayaran belum di
     							unggah oleh pengguna
     						</div>
     						<?php }else{?>
     						<img src="<?= base_url();?>berkas/pembayaran/<?= $pembayaran->ID_PEMBAYARAN;?>/<?= $pembayaran->BUKTI_BAYAR;?>"
     							class="d-block w-100">
     						<?php }?>
     						<?php }?>
     					</div>
     				</div>
     				<?php }?>
     				<?php }?>
     			</div>
     			<div class="modal-footer">
     				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
     			</div>
     			<!-- /.modal-content -->
     		</div>
     		<!-- /.modal-dialog -->
     	</div>
     </div>


     <div id="tolak_permintaan" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
     	aria-labelledby="mySmallModalLabel" aria-hidden="true">
     	<div class="modal-dialog modal-dialog-centered">
     		<div class="modal-content">
     			<div class="modal-header">
     				<h5 class="modal-title mt-0">Tolak permintaan pengguna</h5>
     				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
     					<span aria-hidden="true">&times;</span>
     				</button>
     			</div>
     			<div class="modal-body">
     				<form action="<?= site_url('desainer/tolak_request/3');?>" method="post">
     					<input type="hidden" name="id_request" value="<?= $request->ID_REQUEST;?>">
     					<div class="alert alert-warning">
     						Jika anda menerima request ini, harap tambahkan alasan kenapa anda melok
     						request ini.
     					</div>
     					<div class="form-group">
     						<label for="status">Status permintaan <small
     								class="text-danger">*</small></label>
     						<input type="text" class="form-control" value="Ditolak" readonly>
     					</div>
     					<div class="form-group">
     						<label for="status">Tambahkan catatan <small
     								class="text-danger">*</small></label>
     						<textarea type="text" class="form-control" rows="3" name="catatan"></textarea>
     						<small class="text-danger">Tambahkan alasan kenapa anda menolak.</small>
     					</div>
     					<div class="modal-footer px-0">
     						<button type="button" class="btn btn-secondary btn-sm"
     							data-dismiss="modal">Batal</button>
     						<button type="submit" class="btn btn-danger btn-sm">Tolak</button>
     					</div>
     				</form>
     			</div>
     		</div>
     		<!-- /.modal-content -->
     	</div>
     	<!-- /.modal-dialog -->
     </div>



     <div id="kelola_permintaan" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
     	aria-labelledby="mySmallModalLabel" aria-hidden="true">
     	<div class="modal-dialog modal-dialog-centered">
     		<div class="modal-content">
     			<div class="modal-header">
     				<h5 class="modal-title mt-0">Terima permintaan pengguna</h5>
     				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
     					<span aria-hidden="true">&times;</span>
     				</button>
     			</div>
     			<div class="modal-body">
     				<form action="<?= site_url('desainer/terima_request/1');?>" method="post">
     					<input type="hidden" name="id_request" value="<?= $request->ID_REQUEST;?>">
     					<div class="alert alert-warning">
     						Jika anda menerima request ini, harap atur berapa lama waktu pengerjaan dari
     						request ini.
     					</div>
     					<div class="form-group">
     						<label>Lama pengerjaan <small class="text-danger">*</small></label>
     						<div class="row">
     							<div class="col-8">
     								<input type="number" min="1" class="form-control" name="lama"
     									placeholder="Lama pengerjaan" required>
     							</div>
     							<div class="col-4">
     								<select class="form-control select2" name="rentang" required>
     									<option selected>Pilih rentang</option>
     									<option value="Hari">Hari</option>
     									<option value="Minggu">Minggu</option>
     									<option value="Bulan">Bulan</option>
     								</select>
     							</div>
     						</div>
     					</div>
     					<div class="form-group">
     						<label for="status">Status permintaan <small
     								class="text-danger">*</small></label>
     						<input type="text" class="form-control" value="Proses Pengerjaan (diterima)"
     							readonly>
     					</div>
     					<div class="form-group">
     						<label for="status">Biaya <small class="text-danger">*</small></label>
     						<input type="number" class="form-control" name="biaya"
     							placeholder="Biaya dari permintaan" required>
     					</div>
     					<div class="form-group">
     						<label for="status">Tambahkan catatan <small
     								class="text-muted">(optional)</small></label>
     						<textarea type="text" class="form-control" rows="3" name="catatan"></textarea>
     					</div>
     					<div class="modal-footer px-0">
     						<button type="button" class="btn btn-secondary btn-sm"
     							data-dismiss="modal">Batal</button>
     						<button type="submit" class="btn btn-primary btn-sm">Terima</button>
     					</div>
     				</form>
     			</div>
     		</div>
     		<!-- /.modal-content -->
     	</div>
     	<!-- /.modal-dialog -->
     </div>

     <script type="text/javascript">
     	$('#customFile').change(function () {
     		var file = $('#customFile')[0].files[0].name;
     		$('#fileName').text(file);
     	});

     </script>
