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
<script type="text/javascript">
	tinymce.init({
		selector: "#richTextArea",
		height: 600,
		plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
		menubar: true,
		branding: false,
		toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
		automatic_uploads: true,
		image_advtab: true,
		images_upload_url: "<?php echo base_url()?>desainer/tinymce_upload",
		file_picker_types: 'image',
		paste_data_images: true,
		relative_urls: false,
		remove_script_host: false,
		file_picker_callback: function (cb, value, meta) {
			var input = document.createElement('input');
			input.setAttribute('type', 'file');
			input.setAttribute('accept', 'image/*');
			input.onchange = function () {
				var file = this.files[0];
				var reader = new FileReader();
				reader.readAsDataURL(file);
				reader.onload = function () {
					var id = 'post-image-' + (new Date()).getTime();
					var blobCache = tinymce.activeEditor.editorUpload.blobCache;
					var blobInfo = blobCache.create(id, file, reader.result);
					blobCache.add(blobInfo);
					cb(blobInfo.blobUri(), {
						title: file.name
					});
				};
			};
			input.click();
		}
	});

</script>
<!-- start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box d-flex align-items-center justify-content-between">
			<h4 class="page-title mb-0 font-size-18">Posting Berita</h4>

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

<?php if($metode == false){?>
<div class="row">
	<div class="col-12">
		<div class="alert alert-warning">
			<b>PERHATIAN !</b> Anda belum menambahkan metode pembayaran. Harap tambahkan metode pembayaran terlebih dahulu !
		</div>
	</div>
</div>
<?php }?>

<!-- end page title -->
<form action="<?= site_url('desainer/proses_postingBerita');?>" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-12">
			<div class="card border-info">
				<div class="card-body">
					<div class="row">
						<div class="col-9">
							<div class="form-group mb-0">
								<input type="text" class="form-control" name="JUDUL" maxlength="40" required
									placeholder="Masukkan judul berita" id="thresholdconfig" />
							</div>
						</div>
						<div class="col-1">
							<button type="submit" class="btn btn-secondary btn-block" name="draft" value="1">Draft</button>
						</div>
						<div class="col-2">
							<button type="submit" class="btn btn-primary btn-block" name="posting" value="1">Posting</button>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-9">
			<div class="card">
				<div class="card-body">

					<div class="form-group">
						<textarea class="form-control w-100" rows="10" name="KONTEN" id="richTextArea"></textarea>
						<small class="text-muted">tambahkan keterangan tentang desain, untuk menarik pengguna</small>
					</div>

				</div>
			</div>
		</div>
		<div class="col-3">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Poster <small class="text-muted">(optional)</small></h4>
					<div class="custom-file">
						<input type="file" class="custom-file-input" name="POSTER" id="customFile" accept="image/*">
						<label class="custom-file-label" for="customFile" id="fileName">Pilih file</label>
					</div>
					<small class="text-muted">maksimal ukuran file 2mb</small>
					<hr>
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
					<hr>
					<div class="form-group">
						<label>Tag desain <small class="text-danger">*</small></label>
						<input type="text" class="form-control" id='tag' name="TAG" style="min-height: 50px; height: 50px;" />
						<small class="text-muted">gunakan , (coma) untuk memisahkan setiap tag</small>
					</div>
				</div>
			</div>
		</div>
	</div>

</form>

<script type="text/javascript">
	$('#customFile').change(function () {
		var file = $('#customFile')[0].files[0].name;
		$('#fileName').text(file);
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
