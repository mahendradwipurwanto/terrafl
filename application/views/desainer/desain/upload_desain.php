<style>
	.badtag {
		border: solid 1px red !important;
		background-color: #d24a4a !important;
		color: white !important;
	}

	.badtag a {
		color: #ad2b2b !important;
	}

	input[switch]:checked+label:after {
		left: 43px;
		background-color: #eff2f7;
	}

</style>

<!-- start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box d-flex align-items-center justify-content-between">
			<h4 class="page-title mb-0 font-size-18">Upload Desain</h4>

			<div class="page-title-right">
				<ol class="breadcrumb m-0">
					<li class="breadcrumb-item"><a
							href="javascript: void(0);"><?= $this->uri->segment(1) ? ucwords(str_replace('-', ' ', $this->uri->segment(1))) : "";?></a>
					</li>
					<li class="breadcrumb-item active">
						<?= $this->uri->segment(2) ? ucwords(str_replace('-', ' ', $this->uri->segment(2))) : "";?></li>
				</ol>

			</div>
		</div>
	</div>
</div>
<!-- end page title -->
<form action="<?= site_url('desainer/proses_uploadDesain/'.$id_desain);?>" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-12">
			<div class="card border-info">
				<div class="card-body">
					<div class="row">
						<div class="col-8">
							<p class="card-title-desc mb-0">Upload desainmu disini, anda wajib menyertakan poster sebagai preview dari
								poster anda, serta upload file asli dari poster anda kedalam tipe file zip.</p>
						</div>
						<div class="col-4">
							<button type="submit" class="btn btn-primary float-right" id="send-button">upload desain</button>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-8">
			<div class="card">
				<div class="card-body">

					<div class="row">
						<div class="col-8">
							<div class="form-group">
								<label>Judul desain</label>
								<input type="text" class="form-control" name="JUDUL" maxlength="30" required
									placeholder="Judul karya desain anda" id="thresholdconfig" />
								<small class="text-muted">max 30 karakter</small>
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label>Kategori <small class="text-danger">*</small></label>
								<select class="form-control select2" name="KATEGORI" reqired>
									<option>Pilih kategori</option>
									<optgroup label="Kategori Desasin">
										<?php if($kategori != false){foreach ($kategori as $key) { ?>
										<option value="<?= $key->ID_KATEGORI;?>"><?= $key->KATEGORI;?></option>
										<?php }}else{?>
										<option>Belum ada kategori</option>
										<?php }?>
									</optgroup>
								</select>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-2">
							<div class="form-group">
								<label>Berbayar? <small class="text-danger">*</small></label>
								<div class="mt-2">
									<input type="checkbox" name="BERBAYAR" id="berbayar" switch="success" checked />
									<label for="berbayar" data-on-label="Ya" data-off-label="Tidak" style="width: 65px;"></label>
								</div>
							</div>
						</div>
						<div class="col-5 d-flex">
							<div class="form-group w-100 my-auto">
								<div class="input-group" id="harga">
									<div class="input-group-prepend">
										<span class="input-group-text">Rp.</span>
									</div>
									<input type="number" class="form-control" name="HARGA"
										placeholder="Atur harga untuk desain" >
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label>Tag desain <small class="text-danger">*</small></label>
						<input type="text" class="form-control" id='tag' name="TAG" style="min-height: 50px; height: 50px;"
							required />
						<small class="text-muted">gunakan , (coma) untuk memisahkan setiap tag</small>
					</div>

					<div class="form-group">
						<label>Keterangan desain <small class="text-muted">(optional)</small></label>
						<textarea id="elm1" name="KETERANGAN" name="area"></textarea>
						<small class="text-muted">tambahkan keterangan tentang desain, untuk menarik pengguna</small>
					</div>

				</div>
			</div>
		</div>
		<div class="col-4">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">File desain <small class="text-danger">*</small></h4>
					<p class="card-title-desc">Upload desain poster anda dalam .rar / .zip agar dapat didownload oleh pengguna
					</p>
					<div class="custom-file">
						<input type="file" class="custom-file-input" name="FILE" id="customFile" accept=".zip,.rar,.7zip" required>
						<label class="custom-file-label" for="customFile" id="fileName">Pilih file</label>
					</div>
					<small class="text-muted">maksimal ukuran file 20mb</small>
				</div>
			</div>
			<div class="card">
				<div class="card-body">

					<h4 class="card-title">Poster <small class="text-danger">*</small></h4>
					<p class="card-title-desc">Unggah poster preview dari desain.
					</p>

					<div>
						<div action="#" class="dropzone p-1">
							<div class="fallback">
							</div>
							<div class="dz-message needsclick">
								<div class="mb-2">
									<i class="display-4 text-muted mdi mdi-upload-network-outline"></i>
								</div>

								<h4>Drop files here or click to upload.</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</form>

<script>
	Dropzone.autoDiscover = false;

	var foto_upload = new Dropzone(".dropzone", {
		url: "<?= site_url('desainer/upload_poster/'.$id_desain) ?>",
		maxFilesize: 20,
		method: "post",
		acceptedFiles: "image/*",
		paramName: "POSTER",
		dictInvalidFileType: "Tipe file ini tidak dizinkan",
		addRemoveLinks: true,
		removedfile: function (file) {
			var fileName = file.name;

			$.ajax({
				type: 'POST',
				url: '<?= site_url('desainer/delete_poster/') ?>' + fileName,
				data: {
					name: fileName,
					request: 'delete'
				},
				sucess: function (data) {
					console.log('success: ' + data);
				}
			});

			var _ref;
			return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
		}
	});

</script>

<script type="text/javascript">
	$('form').submit(function (event) {
		$('#send-button').prop("disabled", true);
		// add spinner to button
		$('#send-button').html(
			`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
		);
	});

	$('#customFile').change(function () {
		var file = $('#customFile')[0].files[0].name;
		$('#fileName').text(file);
	});

	$("#berbayar").change(function () {
		if (this.checked) {
			$("#harga").removeClass('d-none');
			$("#harga").prop('required',true);
		} else {
			$("#harga").addClass('d-none');
			$("#harga").prop('required',false);
		}
	});

	$('#tag').tagsInput({
		'width': 'auto',
		'delimiter': ',',
		'defaultText': 'Tag',
		onAddTag: function (item) {
			$($(".tagsinput").get(0)).find(".tag").each(function () {
				if (!ValidateText($(this).text().trim().split(/(\s+)/)[0])) {
					$(this).addClass("badge-primary");
				}
			});
		},
		'onChange': function (item) {
			$($(".tagsinput").get(0)).find(".tag").each(function () {
				if (!ValidateText($(this).text().trim().split(/(\s+)/)[0])) {
					$(this).addClass("badge-primary");
				}
			});
		}

	});

	function ValidateText(mail) {
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)) {
			return (true)
		}
		return (false)
	}

</script>
