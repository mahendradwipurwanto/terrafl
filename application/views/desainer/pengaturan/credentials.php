    <!-- start page title -->
    <div class="row">
    	<div class="col-12">
    		<div class="page-title-box d-flex align-items-center justify-content-between">
    			<h4 class="page-title mb-0 font-size-18">Pengaturan credentials</h4>

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
    	<div class="col-md-8">
    		<div class="card">
    			<div class="card-body">
    				<form class="form-horizontal" action="<?= site_url('desainer/proses_ubahCren');?>" method="POST">
    					<h4 class="card-title">Informasi credentials anda
    						<button class="btn btn-primary btn-sm waves-effect waves-light float-right" type="submit"
    							id="send-button">Simpan perubahan</button>
    					</h4>
    					<hr>
    					<div class="form-group">
    						<label for="userNama">Email <small class="text-danger">*</small></label>
    						<input type="email" class="form-control" id="userNama" name="email" value="<?= $info->EMAIL;?>"
    							required>
    					</div>
    					<div class="form-group">
    						<label for="userNama">Username <small class="text-danger">*</small></label>
    						<input type="text" class="form-control" id="userNama" name="username" minlength="6" maxlength="15"
    							id="thresholdconfig" value="<?= $info->USERNAME;?>" required>
    						<small class="text-muted">6 s/d 15 karakter</small>
    					</div>
    					<hr>
    					<div class="form-group">
    						<label for="userTelepon">Password baru <small class="text-danger">*</small></label>
    						<input type="password" class="form-control" id="userTelepon" name="pass" minlength="6" maxlength="15"
    							id="thresholdconfig" placeholder="Masukkan password baru">
    						<small class="text-muted">6 s/d 15 karakter</small>
    					</div>
    					<div class="form-group">
    						<label for="userBidang">Konfirmasi password baru <small class="text-danger">*</small></label>
    						<input type="password" class="form-control" id="userBidang" name="kon_pass" minlength="6" maxlength="15"
    							id="thresholdconfig" placeholder="Masukkan Konfirmasi password baru">
    						<small class="text-muted">6 s/d 15 karakter</small>
    					</div>
    				</form>
    			</div>
    		</div>
    	</div>
    	<div class="col-md-4">
    		<div class="alert alert-info">
    			Anda dapat menggunakan laman ini untuk mengubah email dan username / merubah password anda.
    		</div>
    	</div>
    </div>


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
