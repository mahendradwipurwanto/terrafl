<div class="page-hero-section bg-image hero-mini shadow-soft"
	style="background-image: url(<?= base_url();?>assets/frontend/img/hero_mini.svg);background-position: top;height: 110px;">
</div>
<div class="page-section">
	<div class="container">
		<div class="row align-items-lg-center">
			<div class="col-lg-12 mb-4">
				<div class="mb-2">
					<h1 class="mb-0">Hai, <?= $pengguna->NAMA;?></h1>
					<p>Atur informasi tentang akun Terraflairmu disini</p>
				</div>

			</div>

		</div>
		<div class="row justify-content-center">
			<div class="col-8">
				<div class="card shadow-soft">
					<div class="card-body">
						<form action="<?= site_url('pengguna/proses_ubahInfo');?>" method="POST">
							<h4 class="card-title">informasi pribadi</h4>
							<div class="form-group">
								<label>Nama Lengkap</label>
								<input type="text" class="form-control" name="nama" value="<?= $pengguna->NAMA;?>" required>
							</div>
							<div class="form-group">
								<label>Nomor Telepon</label>
								<input type="number" class="form-control" name="no_telp" value="<?= $pengguna->NO_TELP;?>" required>
							</div>
							<hr>
							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control" name="email" value="<?= $pengguna->EMAIL;?>" required>
							</div>
							<div class="form-group">
								<label>Username</label>
								<input type="text" class="form-control" name="username" value="<?= $pengguna->USERNAME;?>" required>
							</div>
							<div class="form-group">
								<label>Password baru</label>
								<input type="password" class="form-control" name="password"
									placeholder="Masukkan konfirmasi password baru">
							</div>
							<div class="form-group">
								<label>Konfirmasi password baru</label>
								<input type="password" class="form-control" name="kon_pass"
									placeholder="Masukkan konfirmasi password baru">
							</div>
							<br>
							<button type="submit" class="btn btn-primary float-right">simpan perubahan</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
