     <!-- start page title -->
     <div class="row">
     	<div class="col-12">
     		<div class="page-title-box d-flex align-items-center justify-content-between">
     			<h4 class="page-title mb-0 font-size-18">Daftar request desain pengguna</h4>

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
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <div class="media">
              <div class="avatar-sm font-size-20 mr-3">
                <span class="avatar-title bg-soft-primary text-primary rounded">
                  <i class="mdi mdi-tag-plus-outline"></i>
                </span>
              </div>
              <div class="media-body">
               <div class="font-size-16 mt-2">Total request</div>
             </div>
           </div>
           <h4 class="mt-4"><?= number_format($total_request,0,",",".")?></h4>
         </div>
       </div>
     </div>
     <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <div class="media">
            <div class="avatar-sm font-size-20 mr-3">
              <span class="avatar-title bg-soft-primary text-primary rounded">
                <i class="mdi mdi-autorenew"></i>
              </span>
            </div>
            <div class="media-body">
             <div class="font-size-16 mt-2">Sedang diproses</div>
           </div>
         </div>
         <h4 class="mt-4"><?= number_format($request_proses,0,",",".")?></h4>
       </div>
     </div>
   </div>
   <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <div class="media">
          <div class="avatar-sm font-size-20 mr-3">
            <span class="avatar-title bg-soft-primary text-primary rounded">
              <i class="mdi mdi-code-tags-check"></i>
            </span>
          </div>
          <div class="media-body">
           <div class="font-size-16 mt-2">Sudah selesai</div>
         </div>
       </div>
       <h4 class="mt-4"><?= number_format($request_selesai,0,",",".")?></h4>
     </div>
   </div>
 </div>
 <div class="col-md-3">
  <div class="card">
    <div class="card-body">
      <div class="media">
        <div class="avatar-sm font-size-20 mr-3">
          <span class="avatar-title bg-soft-primary text-primary rounded">
            <i class="mdi mdi-file-cancel-outline"></i>
          </span>
        </div>
        <div class="media-body">
         <div class="font-size-16 mt-2">Request ditolak</div>
       </div>
     </div>
     <h4 class="mt-4"><?= number_format($request_tolak,0,",",".")?></h4>
   </div>
 </div>
</div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Daftar request desain pengguna</h4>
        <hr>
        <table id="datatable" class="table table-centered dt-responsive nowrap w-100">
          <thead>
            <tr>
              <th scope="col">Tanggal</th>
              <th scope="col"></th>
              <th scope="col">Atas Nama</th>
              <th scope="col">Desainer</th>
              <th scope="col">Judul</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
           <?php if($request != false){?>
            <?php foreach($request as $key){?>
             <tr>
              <td><?= date("d/F/Y", $key->TANGGAL);?></td>
              <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail-request-<?= $key->ID_REQUEST;?>">detail</button></td>
              <td><?= $key->NAMA;?></td>
              <td><?= $key->NAMA_DESAINER;?></td>
              <td><?= $key->JUDUL?></td>
              <td>
               <?php if($key->STATUS == 0){
                echo '<span class="badge badge-soft-secondary font-size-12">Pending</span>';
              }elseif ($key->STATUS == 1) {
                echo '<span class="badge badge-soft-primary font-size-12">Proses pengerjaan</span>';
              }elseif ($key->STATUS == 2) {
                echo '<span class="badge badge-soft-success font-size-12">Selesai</span>';
              }elseif ($key->STATUS == 3) {
                echo '<span class="badge badge-soft-danger font-size-12">Ditolak</span>';
              }else{
                echo '<span class="badge badge-soft-warning font-size-12">ERROR</span>';
              }?>
            </td>
          </tr>

          <div id="detail-request-<?= $key->ID_REQUEST;?>" class="modal fade bs-example-modal-center"
            tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title mt-0">Detail request - <span class="text-primary font-weight-medium">#<?= $key->ID_REQUEST;?></span></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row mb-3">
                    <div class="col-8">
                      <span class="text-muted font-weight-normal">Nama pemesan</span>
                    </div>
                    <div class="col-4  border-bottom pb-1">
                      <span class="text-dark font-weight-medium"><?= $key->NAMA;?></span>
                    </div>
                  </div>
                  <div class="row mb-3">
                   <div class="col-8">
                    <span class="text-muted font-weight-normal">Ditujukan untuk desainer</span>
                  </div>
                  <div class="col-4  border-bottom pb-1">
                    <span class="text-dark font-weight-medium"><?= $key->NAMA_DESAINER;?> <a href="<?= site_url('admin/detail-desainer/'.$key->ID_DESAINER);?>" target="_blank" class="btn btn-info btn-sm ml-1"><i class="far fa-share-square font-weight-normal"></i></a></span>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-8">
                    <span class="text-muted font-weight-normal">Tanggal request</span>
                  </div>
                  <div class="col-4  border-bottom pb-1">
                    <span class="text-dark font-weight-medium"><?= date("d/m/Y", $key->TANGGAL);?></span>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-8">
                    <span class="text-muted font-weight-normal">Request untuk -</span>
                  </div>
                  <div class="col-4  border-bottom pb-1">
                    <span
                    class="text-dark font-weight-medium"><?= $key->JUDUL;?></span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-8">
                    <span class="text-muted font-weight-normal">Total biaya</span>
                  </div>
                  <div class="col-4">
                    <span class="h4 text-dark font-weight-medium">Rp.
                      <?= number_format($key->BIAYA,0,",",".")?></span>
                    </div>
                  </div>
                  <hr>
                  <div class="row mb-3">
                    <div class="col-8">
                      <span class="text-muted font-weight-normal">Status</span>
                    </div>
                    <div class="col-4  border-bottom pb-1">
                      <?php if($key->STATUS == 0){
                        echo '<span class="badge badge-soft-secondary font-size-12">Pending</span>';
                      }elseif ($key->STATUS == 1) {
                        echo '<span class="badge badge-soft-primary font-size-12">Proses pengerjaan</span>';
                      }elseif ($key->STATUS == 2) {
                        echo '<span class="badge badge-soft-success font-size-12">Selesai</span>';
                      }elseif ($key->STATUS == 3) {
                        echo '<span class="badge badge-soft-danger font-size-12">Ditolak</span>';
                      }else{
                        echo '<span class="badge badge-soft-warning font-size-12">ERROR</span>';
                      }?>
                    </div>
                  </div>
                  <?php if($key->STATUS >= 1){?>
                    <div class="row mb-3">
                      <div class="col-8">
                        <span class="text-muted font-weight-normal">Tanggal diterima</span>
                      </div>
                      <div class="col-4  border-bottom pb-1">
                        <span class="text-dark font-weight-medium"><?= date("d/m/Y", $key->TANGGAL);?></span>
                      </div>
                    </div>
                  <?php }?>
                  <div class="row">
                    <div class="col-12">
                      <span class="text-muted font-weight-normal">Catatan</span>
                    </br>
                    <span class="text-dark font-weight-normal"><?= $key->CATATAN;?></span>
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
