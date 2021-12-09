    <style type="text/css">
    	.upload-card {
    		width: 150px;
    		height: 150px;
    		display: flex;
    		justify-content: center;
    		align-items: center;
    		overflow: hidden;
    	}

    	.upload-img {
    		flex-shrink: 0;
    		min-width: 100%;
    		min-height: 100%;
    	}

    </style>
    <!-- start page title -->
    <div class="row">
    	<div class="col-12">
    		<div class="page-title-box d-flex align-items-center justify-content-between">
    			<h4 class="page-title mb-0 font-size-18">Pengaturan metode pembayaran</h4>

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
    	<div class="col-md-10">
    		<div class="card">
    			<div class="card-body">
    				<form class="form-horizontal" action="<?= site_url('desainer/proses_ubahInfo');?>" method="POST">
    					<h4 class="card-title">Informasi pribadi anda
    						<button class="btn btn-primary btn-sm waves-effect waves-light float-right" type="submit"
    							id="send-button">Simpan perubahan informasi pribadi</button>
    					</h4>
    					<hr>
    					<div class="row">
    						<div class="col-md-7">
    							<div class="form-group">
    								<label for="userNama">Nama <small class="text-danger">*</small></label>
    								<input type="text" class="form-control" id="userNama" name="nama"
    									value="<?= $info->NAMA;?>" required>
    							</div>
    							<div class="form-group">
    								<label>Foto profil <small class="text-danger">*</small></label></br>
    								<button type="button" class="btn btn-info btn-sm btn-pill" data-toggle="modal"
    									data-target="#ubah-foto"><i class="fas fa-picture"></i> ubah foto
    									profil</button>
    							</div>
    							<div class="form-group">
    								<label for="userTelepon">Nomor Telepon <small class="text-danger">*</small></label>
    								<input type="number" class="form-control" id="userTelepon" name="no_telp"
    									value="<?= $info->NO_TELP;?>" required>
    							</div>
    							<div class="form-group">
    								<label for="userBidang">Bidang desainer <small class="text-danger">*</small></label>
    								<input type="text" class="form-control" id="userBidang" name="bidang"
    									value="<?= $info->BIDANG;?>" required>
    							</div>
    							<div class="form-group">
    								<label for="userAlamat">Alamat <small class="text-danger">*</small></label>
    								<textarea type="text" class="form-control" id="userAlamat" name="alamat" rows="2"
    									required><?= $info->ALAMAT;?></textarea>
    							</div>
    							<div class="form-group">
    								<label for="userTentang">Tentang <small class="text-danger">*</small></label>
    								<textarea type="text" class="form-control" id="userTentang" name="tentang" rows="3"
    									required><?= $info->TENTANG;?></textarea>
    							</div>
    						</div>
    						<div class="col-md-5">
    							<div class="form-group">
    								<label for="userFacebook">Facebook <small class="text-danger">*</small></label>
    								<input type="text" class="form-control" id="userFacebook" name="facebook"
    									value="<?= $info->FACEBOOK;?>" required>
    								<small class="text-muted">ex: https://web.facebook.com/terraflair</small>
    							</div>
    							<div class="form-group">
    								<label for="userInstagram">Instagram <small class="text-danger">*</small></label>
    								<input type="text" class="form-control" id="userInstagram" name="instagram"
    									value="<?= $info->INSTAGRAM;?>" required>
    								<small class="text-muted">ex: https://instagram.com/terraflair</small>
    							</div>
    							<div class="form-group">
    								<label for="userTwitter">Twitter <small class="text-danger">*</small></label>
    								<input type="text" class="form-control" id="userTwitter" name="twitter"
    									value="<?= $info->TWITTER;?>" required>
    								<small class="text-muted">ex: https://twitter.com/terraflair</small>
    							</div>
    						</div>
    					</div>
    				</form>
    			</div>
    		</div>
    	</div>
    </div>



    <div id="ubah-foto" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
    	aria-labelledby="mySmallModalLabel" aria-hidden="true">
    	<div class="modal-dialog modal-dialog-centered modal-sm">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h5 class="modal-title mt-0">Ubah foto profil anda</h5>
    				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
    				</button>
    			</div>
    			<form action="<?= site_url('desainer/proses_ubahFoto') ?>" method="post" enctype="multipart/form-data">
    				<div class="modal-body pb-0">
    					<!-- Form Group -->
    					<div class="form-group mx-auto mb-2">
    						<label for="fotoLabel" class="input-label">Logo penyelenggara</label>
    						<label for="GETL_FOTO" class="upload-card mx-auto">
    							<img id="L_FOTO" class="upload-img w-100 L_FOTO cursor"
    								src="<?= ($info->PROFIL == "default.png" ? base_url().'assets/frontend/img/others/Pickanimage.png' : base_url().'berkas/profil/desainer/'.$info->ID_USER.'/'.$info->PROFIL);?>"
    								alt="<?= $info->NAMA;?>">
    						</label>
    						<input type="file" id="GETL_FOTO" class="form-control-file d-none" name="PROFIL"
    							onchange="previewL_FOTO(this);" accept="image/*">
    						<small class="text-muted">Max 2Mb size, and use 1:1 ratio.</small>
    					</div>
    					<!-- End Form Group -->
    				</div>
    				<div class="modal-footer">
    					<button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Batal</button>
    					<button type="submit" class="btn btn-sm btn-primary">Ubah foto</button>
    				</div>
    			</form>
    		</div>
    		<!-- /.modal-content -->
    	</div>
    	<!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <script type="text/javascript">
    	function previewL_FOTO(input) {
    		$(".L_FOTO").removeClass('hidden');
    		var file = $("#GETL_FOTO").get(0).files[0];

    		if (file) {
    			var reader = new FileReader();

    			reader.onload = function () {
    				$("#L_FOTO").attr("src", reader.result);
    			}

    			reader.readAsDataURL(file);
    		}
    	}

    </script>


    <script type="text/javascript">
    	$('form').submit(function (event) {
    		$('#send-button').prop("disabled", true);
    		// add spinner to button
    		$('#send-button').html(
    			`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> memuat...`
    		);
    		return;
    	});

    </script>
