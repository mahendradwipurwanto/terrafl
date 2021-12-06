     <!-- start page title -->
     <div class="row">
     	<div class="col-12">
     		<div class="page-title-box d-flex align-items-center justify-content-between">
     			<h4 class="page-title mb-0 font-size-18">Daftar berita</h4>

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
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar berita
                <a href="<?= site_url('admin/posting-berita');?>" class="btn btn-primary waves-light waves-effect btn-sm float-right">
              Posting berita
            </a>
          </h4>
                    <hr>
                    <table id="datatable" class="table table-centered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th scope="col">Tanggal</th>
                                <th scope="col"></th>
                                <th scope="col">Judul</th>
                                <th scope="col">Kategori</th>
                                <th scope="col"></th>
                           </tr>
                      </thead>
                      <tbody>
                       <?php if($berita != false){?>
                            <?php foreach($berita as $key){?>
                                 <tr>
                                     <td><?= date("d/F/Y", strtotime($key->TANGGAL));?></td>
                                     <td>
                                        <a heref="<?= site_url('admin/edit-berita/'.$key->ID_BERITA);?>" class="btn btn-info btn-sm"><i class="far fa-edit"></i></a>
                                        <a heref="<?= site_url('berita/'.$key->ID_BERITA);?>" target="_blank" class="btn btn-secondary btn-sm"><i class="far fa-eye"></i></a>
                                     </td>
                                     <td><?= $key->JUDUL;?></td>
                                     <td><?= $key->KATEGORI;?></td>
                                     <td><i class="far fa-eye mr-1"></i> <?= number_format($key->VIEWER,0,",",".")?> <i class="fas fa-comment-dots ml-2 mr-1"></i> <?= number_format($this->M_admin->get_countCommentBerita($key->ID_BERITA),0,",",".")?></td>
                           </tr>
                      <?php }?>
                 <?php }?>
            </tbody>
       </table>
  </div>
</div>
</div>
</div>
<!-- end row -->
