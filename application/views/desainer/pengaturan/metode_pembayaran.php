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

   <div class="row">
       <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Metode pembayaran anda</h4>
                <hr>
                <table id="datatable" class="table table-centered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th></th>
                            <th>Metode</th>
                            <th>Atas Nama</th>
                            <th>Nomor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($metode_list != false){?>
                            <?php $no = 1; foreach($metode_list as $key){?>
                                <tr>
                                    <td><?= $no++;?></td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit-<?= $key->ID_METODE;?>">edit</button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus-<?= $key->ID_METODE;?>">hapus</button>
                                    </td>
                                    <td><span class="badge <?php $a = rand(1, 4); if($a == 1){ echo 'badge-primary';}elseif($a == 2){echo 'badge-info'; }elseif($a == 3){echo 'badge-warning';}else{ echo 'badge-orange'; }?>"><?= $key->VIA;?></span></td>
                                    <td><?= $key->ATAS_NAMA;?></td>
                                    <td><?= $key->NOMOR;?></td>
                                </tr>

                                <div id="edit-<?= $key->ID_METODE;?>" class="modal fade bs-example-modal-center"
                                    tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title mt-0">Edit metode pembayaran</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" action="<?= site_url('desainer/proses_editMetode/'.$key->ID_METODE);?>" method="POST">
                                                    <div class="form-group">
                                                        <small class="text-danger mb-2">Harap isi informasi pembayaran dengan benar, karena semua transaksi pembayaran anda akan dikirim sesuai informasi pembayaran anda.</small></br>
                                                        <label for="viaPembayaran">Metode Pembayaran <small class="text-danger">*</small></label>
                                                        <select class="form-control w-100 select2" name="via" id="viaPembayaran" required>
                                                            <option value="<?= $key->VIA;?>"><?= $key->VIA;?></option>
                                                            <optgroup label="E-Wallet">
                                                                <option value="DANA">DANA</option>
                                                                <option value="SHOPEEPAY">SHOPEEPAY</option>
                                                                <option value="OVO">OVO</option>
                                                            </optgroup>
                                                            <optgroup label="BANK">
                                                                <option value="BCA">BCA</option>
                                                                <option value="BRI">BRI</option>
                                                                <option value="MANDIRI">MANDIRI</option>
                                                                <option value="BNI">BNI</option>
                                                                <option value="PERMATA">PERMATA BANK</option>
                                                            </optgroup>
                                                        </select>
                                                        <small class="text-muted">Pilih salah satu bank</small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="useratas">Atas nama <small class="text-danger">*</small></label>
                                                        <input type="text" class="form-control" id="useratas" name="atas_nama"
                                                        value="<?= $key->ATAS_NAMA;?>" required>
                                                        <small class="text-muted">Nama akun dari metode pembayaran anda yang terdaftar</small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="userrekening">Nomor E-Wallet / Nomor Rekening <small class="text-danger">*</small></label>
                                                        <input type="text" class="form-control" id="userrekening" name="rekening"
                                                        value="<?= $key->NOMOR;?>" required>
                                                        <small class="text-muted">Nomor dari e-wallet anda / rekening sesuai dengan metode yang dipilih</small>
                                                    </div>
                                                    <div class="modal-footer mx-0 px-0">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-info">ubah metode</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                            </div>

                            <div id="hapus-<?= $key->ID_METODE;?>" class="modal fade bs-example-modal-center"
                                tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0">Hapus metode pembayaran</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah anda yakin, ingin menghapus metode ini?</p>
                                            <div class="modal-footer mx-0 px-0">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <a href="<?= site_url('desainer/proses_hapusMetode/'.$key->ID_METODE);?>" class="btn btn-danger">hapus metode</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        </div>
                    <?php }}?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tambahkan metode</h5>
            <hr>
            <div>
                <form class="form-horizontal" action="<?= site_url('desainer/proses_tambahMetode');?>" method="POST">
                    <div class="form-group">
                        <small class="text-danger mb-2">Harap isi informasi pembayaran dengan benar, karena semua transaksi pembayaran anda akan dikirim sesuai informasi pembayaran anda.</small></br>
                        <label for="viaPembayaran">Metode Pembayaran <small class="text-danger">*</small></label>
                        <select class="form-control select2" name="via" id="viaPembayaran" required>
                            <option>Pilih salah satu</option>
                            <optgroup label="E-Wallet">
                                <option value="DANA">DANA</option>
                                <option value="SHOPEEPAY">SHOPEEPAY</option>
                                <option value="OVO">OVO</option>
                            </optgroup>
                            <optgroup label="BANK">
                                <option value="BCA">BCA</option>
                                <option value="BRI">BRI</option>
                                <option value="MANDIRI">MANDIRI</option>
                                <option value="BNI">BNI</option>
                                <option value="PERMATA">PERMATA BANK</option>
                            </optgroup>
                        </select>
                        <small class="text-muted">Pilih salah satu bank</small>
                    </div>
                    <div class="form-group">
                        <label for="useratas">Atas nama <small class="text-danger">*</small></label>
                        <input type="text" class="form-control" id="useratas" name="atas_nama"
                        placeholder="Atas nama" required>
                        <small class="text-muted">Nama akun dari metode pembayaran anda yang terdaftar</small>
                    </div>
                    <div class="form-group">
                        <label for="userrekening">Nomor E-Wallet / Nomor Rekening <small class="text-danger">*</small></label>
                        <input type="text" class="form-control" id="userrekening" name="rekening"
                        placeholder="Nomor rekening / E-Wallet" required>
                        <small class="text-muted">Nomor dari e-wallet anda / rekening sesuai dengan metode yang dipilih</small>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit"
                        id="send-button">Tambahkan metode</button>
                        <small class="text-muted">Pastikan semua data telah benar, sebelum melanjutkan.</small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>