                    <!-- start page title -->
                    <div class="row">
                    	<div class="col-12">
                    		<div class="page-title-box d-flex align-items-center justify-content-between">
                    			<h4 class="page-title mb-0 font-size-18">Dashboard</h4>

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
     <div class="col-xl-3">
          <div class="card">
               <div class="card-body">
                    <div class="media">
                         <div class="avatar-sm font-size-20 mr-3">
                              <span class="avatar-title bg-soft-primary text-primary rounded">
                                   <i class="mdi mdi-tag-plus-outline"></i>
                              </span>
                         </div>
                         <div class="media-body">
                              <div class="font-size-16 mt-2">Total Desain</div>
                         </div>
                    </div>
                    <h4 class="mt-4"><?= number_format($total_desain,0,",",".")?></h4>
               </div>
          </div>
     </div>
     <div class="col-xl-3">
          <div class="card">
               <div class="card-body">
                    <div class="media">
                         <div class="avatar-sm font-size-20 mr-3">
                              <span class="avatar-title bg-soft-primary text-primary rounded">
                                   <i class="mdi mdi-camera-account"></i>
                              </span>
                         </div>
                         <div class="media-body">
                              <div class="font-size-16 mt-2">Total Desainer</div>
                         </div>
                    </div>
                    <h4 class="mt-4"><?= number_format($total_desainer,0,",",".")?></h4>
               </div>
          </div>
     </div>
     <div class="col-xl-3">
          <div class="card">
               <div class="card-body">
                    <div class="media">
                         <div class="avatar-sm font-size-20 mr-3">
                              <span class="avatar-title bg-soft-primary text-primary rounded">
                                   <i class="mdi mdi-package-variant"></i>
                              </span>
                         </div>
                         <div class="media-body">
                              <div class="font-size-16 mt-2">Total Request</div>
                         </div>
                    </div>
                    <h4 class="mt-4"><?= number_format($total_request,0,",",".")?></h4>
               </div>
          </div>
     </div>
     <div class="col-xl-3">
          <div class="card">
               <div class="card-body">
                    <div class="media">
                         <div class="avatar-sm font-size-20 mr-3">
                              <span class="avatar-title bg-soft-primary text-primary rounded">
                                   <i class="mdi mdi-coin-outline"></i>
                              </span>
                         </div>
                         <div class="media-body">
                              <div class="font-size-16 mt-2">Total Pembayaran</div>
                         </div>
                    </div>
                    <h4 class="mt-4"><?= number_format($total_pembayaran,0,",",".")?></h4>
               </div>
          </div>
     </div>
</div>