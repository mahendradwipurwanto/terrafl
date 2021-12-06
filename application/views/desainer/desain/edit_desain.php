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
			<h4 class="page-title mb-0 font-size-18">Edit Desain - <?= $desain->JUDUL;?></h4>

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
<form action="<?= site_url('desainer/proses_editDesain/'.$desain->ID_DESAIN.'/'.$desain->ID_DESAIN);?>" method="post"
	enctype="multipart/form-data">
	<div class="row">
		<div class="col-12">
			<div class="card border-info">
				<div class="card-body">
					<div class="row">
						<div class="col-8">
							<p class="card-title-desc mb-0">Edit desainmu, anda wajib menyertakan poster sebagai preview dari
								poster anda, serta upload file asli dari poster anda kedalam tipe file zip.</p>
						</div>
						<div class="col-4">
							<button type="submit" class="btn btn-primary float-right" id="send-button">ubah desain</button>
							<a href="<?= site_url('desainer/desainku');?>" class="btn btn-secondary float-right mr-2"
								id="send-button">batal</a>
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
									value=" <?= $desain->JUDUL;?>" id="thresholdconfig" />
								<small class="text-muted">max 30 karakter</small>
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label>Kategori <small class="text-danger">*</small></label>
								<select class="form-control select2" name="KATEGORI" reqired>
									<option value=" <?= $desain->ID_KATEGORI;?>"><?= $desain->KATEGORI;?></option>
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
									<input type="checkbox" name="BERBAYAR" id="berbayar" switch="success"
										<?= $desain->BERBAYAR == 1 ? 'checked' : '';?> />
									<label for="berbayar" data-on-label="Ya" data-off-label="Tidak" style="width: 65px;"></label>
								</div>
							</div>
						</div>
						<div class="col-5 d-flex">
							<div class="form-group w-100 my-auto">
								<div class="input-group <?= $desain->BERBAYAR == 1 ? '' : 'd-none';?>" id="harga">
									<div class="input-group-prepend">
										<span class="input-group-text">Rp.</span>
									</div>
									<input type="number" class="form-control" name="HARGA" value="<?= $desain->HARGA;?>">
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label>Tag desain <small class="text-danger">*</small></label>
						<input type="text" class="form-control" id='tag' name="TAG" style="min-height: 50px; height: 50px;"
							value="<?= $desain->TAG;?>" required />
						<small class="text-muted">gunakan , (coma) untuk memisahkan setiap tag</small>
					</div>

					<div class="form-group">
						<label>Keterangan desain <small class="text-muted">(optional)</small></label>
						<textarea id="elm1" name="KETERANGAN" name="area"><?= $desain->KETERANGAN;?></textarea>
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
						<input type="file" class="custom-file-input" name="FILE" id="customFile" accept=".zip,.rar,.7zip">
						<label class="custom-file-label" for="customFile"
							id="fileName"><?= !empty($desain->FILE) ? $desain->FILE : 'Pilih file';?></label>
					</div>
					<small class="text-muted">maksimal ukuran file 20mb. <a
							href="<?= site_url('download/'.$desain->ID_DESAIN.'/'.$desain->FILE);?>" class="text-primary"
							target="_blank">cek file</a></small>
				</div>
			</div>
			<div class="card">
				<div class="card-body">

					<h4 class="card-title">Poster <small class="text-danger">*</small></h4>
					<p class="card-title-desc">Unggah poster preview dari desain.
					</p>

					<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#edit-poster">ubah
						poster</button>
					</b>
				</div>
			</div>
		</div>

</form>

<div id="edit-poster" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
	aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title mt-0">Edit poster - <?= $desain->JUDUL;?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php $no = 1; if($poster != false ){ foreach ($poster as $key) { ?>
				<article class="col-6 col-md-4 col-lg-3 p-2">
					<div class="card h-100 transition-3d-hover">
						<div class="position-relative">
							<a class="image-popup-vertical-fit">
								<img loading="lazy" class="fit lazysizes" style="filter: none !important;"
									src="<?= base_url();?>berkas/desain/<?= $desain->ID_DESAIN;?>/<?= $key->POSTER;?>"
									alt="<?= $desain->JUDUL;?>">
							</a>
							<div class="row mt-2">
								<div class="col-8">
									<button type="button" class="btn btn-info btn-sm btn-block">ubah poster</button>
								</div>
								<div class="col-4">
									<button type="button" class="btn btn-danger btn-sm btn-block"><i class="fas fa-trash"></i></button>
								</div>
							</div>
						</div>

				</article>
				<?php $no++;}}else{?>
				<div class="col-12 text-center mt-5 mb-0">
					<h4>belum ada desain</h4>
				</div>
				<?php }?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

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
					url: '<?= site_url('
					desainer / delete_poster / ') ?>' + fileName,
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
				$("#harga").prop('required', true);
			} else {
				$("#harga").addClass('d-none');
				$("#harga").prop('required', false);
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
