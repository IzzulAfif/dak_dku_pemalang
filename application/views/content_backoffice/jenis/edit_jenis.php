<!-- BEGIN PAGE CONTENT -->
        <div class="page-content page-wizard">
          <div class="header">
            <h2>Edit bidang <?php echo $jenis[0]['dak_bku'] ?><strong></strong></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>">Home</a>
                </li>
                <li class="active">Edit Data bidang <?php echo $jenis[0]['dak_bku'] ?></li>
              </ol>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-content">
                  <div class="row">
                    <div class="col-md-6">
                      <?php echo validation_errors(); ?>
                      <form role="form" role="form" method="post" action="<?php echo base_url('index.php/jenis/edit/submit') ?>">
                        <input type="hidden" name="id" value="<?php echo $jenis[0]['id'] ?>">
                       <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Kode</label>
                              <input type="text" class="form-control" name="kode" value="<?php echo $jenis[0]['kode'] ?>">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Bidang</label>
                              <input type="text" class="form-control" name="jenis" value="<?php echo $jenis[0]['jenis'] ?>">
                            </div>
                          </div>
                        </div>
                     
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">

                             <input type="hidden" class="form-control" name="dak_bku" value="<?php echo $jenis[0]['dak_bku'] ?>">
                             
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <button type="submit" class="btn btn-square btn-primary"><i class="fa fa-plus"></i> Edit</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="footer">
            <div class="copyright">
              <p class="pull-left sm-pull-reset">
                <span>Copyright <span class="copyright">©</span> 2015 </span>
                <span></span>.
              </p>
            </div>
          </div>
        </div>
        <!-- END PAGE CONTENT -->