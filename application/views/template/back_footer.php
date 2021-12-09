</div>
<!-- End Page-content -->

<footer class="footer">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6">
				2021 © Terraflair.
			</div>
			<div class="col-sm-6">
				<div class="text-sm-right d-none d-sm-block">
					Design & Develop by Aulia Maharani
				</div>
			</div>
		</div>
	</div>
</footer>
</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->

</div>
<!-- end container-fluid -->
<!-- JS Plugins Init. -->
<!-- JAVASCRIPT -->
<script src="<?= base_url();?>assets/backend/libs/metismenu/metisMenu.min.js"></script>
<script src="<?= base_url();?>assets/backend/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url();?>assets/backend/libs/node-waves/waves.min.js"></script>

<!-- apexcharts -->
<script src="<?= base_url();?>assets/backend/libs/apexcharts/apexcharts.min.js"></script>

<!-- jquery.vectormap map -->
<script src="<?= base_url();?>assets/backend/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js">
</script>
<script
	src="<?= base_url();?>assets/backend/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js">
</script>

<!-- Magnific Popup-->
<script src="<?= base_url();?>assets/backend/libs/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- form advanced -->
<script src="<?= base_url();?>assets/backend/libs/select2/js/select2.min.js"></script>
<script src="<?= base_url();?>assets/backend/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url();?>assets/backend/libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="<?= base_url();?>assets/backend/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="<?= base_url();?>assets/backend/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

<!--tinymce js-->
<!-- <script src="<?= base_url();?>assets/backend/libs/tinymce/tinymce.min.js"></script> -->

<!-- Summernote js -->
<script src="<?= base_url();?>assets/backend/libs/summernote/summernote-bs4.min.js"></script>

<!-- init js -->
<script src="<?= base_url();?>assets/backend/js/pages/form-editor.init.js"></script>
<!-- form advanced init -->
<script src="<?= base_url();?>assets/backend/js/pages/form-advanced.init.js"></script>
<!-- Tour init js-->
<script src="<?= base_url();?>assets/backend/js/pages/lightbox.init.js"></script>

<script src="<?= base_url();?>assets/backend/js/app.js"></script>

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

<script type="text/javascript">
	$(document).ready(function () {
		$('#datatable').DataTable({
			"language": {
				"emptyTable": '<div class="text-center p-4">' +
					'<img class="mb-3" src="<?= base_url() ?>assets/backend/svg/sorry.svg" alt="Image Description" style="width: 7rem;">' +
					'<p class="mb-0">Tidak ada data untuk ditampilkan</p>' +
					'</div>'
			},
			"scrollX": true
		});
		$('#datatable2').DataTable({
			"language": {
				"emptyTable": '<div class="text-center p-4">' +
					'<img class="mb-3" src="<?= base_url() ?>assets/backend/svg/sorry.svg" alt="Image Description" style="width: 7rem;">' +
					'<p class="mb-0">Tidak ada data untuk ditampilkan</p>' +
					'</div>'
			},
			"scrollX": true
		});
	});

</script>
</body>

</html>
