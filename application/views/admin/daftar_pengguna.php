     <!-- start page title -->
     <div class="row">
     	<div class="col-12">
     		<div class="page-title-box d-flex align-items-center justify-content-between">
     			<h4 class="page-title mb-0 font-size-18">Daftar Pengguna</h4>

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
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="avatar-sm font-size-20 mr-3">
                        <span class="avatar-title bg-soft-primary text-primary rounded">
                            <i class="mdi mdi-tag-plus-outline"></i>
                       </span>
                  </div>
                  <div class="media-body">
                   <div class="font-size-16 mt-2">Total pengguna</div>
              </div>
         </div>
         <h4 class="mt-4"><?= number_format($total_pengguna,0,",",".")?></h4>
    </div>
</div>
</div>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Pengguna</h4>
                    <hr>
                    <table id="datatable" class="table table-centered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col"></th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">No Telepon</th>
                           </tr>
                      </thead>
                      <tbody>
                       <?php if($pengguna != false){?>
                            <?php $no = 1; foreach($pengguna as $key){?>
                                 <tr>
                                     <td><?= $no++;?></td>
                                     <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail-pengguna-<?= $key->ID_USER;?>">detail</button></td>
                                     <td><?= $key->NAMA;?></td>
                                     <td><?= $key->EMAIL;?></td>
                                     <td><a href="tel:<?= $key->NO_TELP;?>" class="btn btn-secondary btn-sm mr-2"><i class="fas fa-phone"></i></a> <?= $key->NO_TELP;?></td>
                                </tr>

                                <div id="detail-pengguna-<?= $key->ID_USER;?>" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                   <div class="modal-dialog">
                                        <div class="modal-content">
                                             <div class="modal-header">
                                                  <h5 class="modal-title mt-0">Detail pengguna</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                       <span aria-hidden="true">&times;</span>
                                                  </button>
                                             </div>
                                             <div class="modal-body">
                                                  <div class="row mb-2 border-bottom pb-1">
                                                       <div class="col-4">
                                                            <span class="text-muted font-weight-medium">Nama Pengguna</span>
                                                       </div>
                                                       <div class="col-8">
                                                            <span class="text-dark font-weight-normal"><?= $key->NAMA;?></span>
                                                       </div>
                                                  </div>
                                                  <div class="row mb-2 border-bottom pb-1">
                                                       <div class="col-4">
                                                            <span class="text-muted font-weight-medium">Nomor Telepon</span>
                                                       </div>
                                                       <div class="col-8">
                                                            <span class="text-dark font-weight-normal"><a href="tel:<?= $key->NO_TELP;?>" class="btn btn-secondary btn-sm mr-2"><i class="fas fa-phone"></i></a> <?= $key->NO_TELP;?></span>
                                                       </div>
                                                  </div>
                                                  <div class="row">
                                                       <div class="col-4">
                                                            <span class="text-muted font-weight-medium">Email</span>
                                                       </div>
                                                       <div class="col-8">
                                                            <span class="text-dark font-weight-normal"><?= $key->EMAIL;?></span>
                                                       </div>
                                                  </div>
                                                  <hr>
                                                  <div class="row mb-2 border-bottom pb-1">
                                                       <div class="col-4">
                                                            <span class="text-muted font-weight-medium">Username</span>
                                                       </div>
                                                       <div class="col-8">
                                                            <span class="text-dark font-weight-normal"><?= $key->USERNAME;?></span>
                                                       </div>
                                                  </div>
                                                  <div class="row">
                                                       <div class="col-4">
                                                            <span class="text-muted font-weight-medium">Total Pembayaran</span>
                                                       </div>
                                                       <div class="col-8">
                                                            <span class="text-dark font-weight-normal"><?= $this->M_admin->get_totalPembelianPengguna($key->ID_USER);?> Pembayaran (Desain & Request)</span>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                             </div>
                                             <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                   </div>
                                   <!-- /.modal -->
                              </div>

                         <?php }?>
                    <?php }?>
               </tbody>
          </table>
     </div>
</div>
</div>
</div>
<!-- end row -->
