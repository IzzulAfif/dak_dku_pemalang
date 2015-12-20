<!-- BEGIN PAGE CONTENT  -->
        <div class="page-content page-wizard">
          <div class="header">
            <h2>Tambah <strong> BKU</strong></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>">Home</a>
                </li>
                <li class="active">Tambah Data BKU</li>
              </ol>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-content">
                  <div class="row">
                    <div class="col-md-6">
                     <input type="hidden" class="form-control" id="dak_bku" value="bku"/>
                      <?php echo validation_errors(); ?>
                      <form role="form" role="form" method="post" action="<?php echo base_url('index.php/bku/submit') ?>">
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Bidang</label>
                              <select name="id_jenis" id="bidang">
                                <option value="">Pilih Bidang</option>
                                 <?php $i=0; foreach ($jenis as $item){ $i=$i+1;?>
                                             <option value="<?php echo $item['id'] ?>"><?php echo $item['jenis'] ?></option>
                     
                                <?php   } ?>
                              </select>
                            </div>
                          </div>
                        </div>  
                         <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Sub Bidang</label>
                              <select name="id_sub_jenis" id="sub_jenis">
                                <option value="">Pilih Sub Bidang</option>
                               <!--   <?php $i=0; foreach ($sub_jenis as $item){ $i=$i+1;?>
                                             <option value="<?php echo $item['id'] ?>"><?php echo $item['sub_jenis'] ?></option>
                     
                                <?php   } ?> -->
                              </select>
                            </div>
                          </div>
                        </div>  
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Nama Kegiatan</label>
                              <input type="text" class="form-control" name="kegiatan">
                            </div>
                          </div>
                        </div>
                      <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Anggaran Provinsi</label>
                              <input type="text" class="form-control" name="anggaran_provinsi">
                            </div>
                          </div>
                        </div>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Anggaran Sharing</label>
                              <input type="text" class="form-control" name="anggaran_sharing">
                            </div>
                          </div>
                        </div>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Metode Pengadaan</label>
                              <input type="text" class="form-control" name="metode_pengadaan">
                            </div>
                          </div>
                        </div>

                            <div class="form-group">
                            <div class="row">
                              <div class="col-md-12">
                                <label>Tanggal Pengadaan</label>
                                <input type="date" class="form-control" name="tanggal_pengadaan">
                              </div>
                            </div>
                          </div>
                         
                           <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Nilai Kontrak</label>
                              <input type="text" class="form-control" name="nilai_kontrak">
                            </div>
                          </div>
                        </div>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Realisasi Provinsi</label>
                              <input type="text" class="form-control" name="realisasi_provinsi">
                            </div>
                          </div>
                        </div>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Realisasi SPJ</label>
                              <input type="text" class="form-control" name="realisasi_spj">
                            </div>
                          </div>
                        </div>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Target Fisik</label>
                              <input type="text" class="form-control" name="target_fisik">
                            </div>
                          </div>
                        </div>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Realisasi Fisik</label>
                              <input type="text" class="form-control" name="realisasi_fisik">
                            </div>
                          </div>
                        </div>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Permasalahan</label>
                              <input type="text" class="form-control" name="permasalahan">
                            </div>
                          </div>
                        </div>

                       
                     
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">

                             <input type="hidden" class="form-control" name="tahun" value="<?php echo $this->session->userdata('tahun'); ?>">
                             
                            </div>
                          </div>
                        </div>
                       
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</button>
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
        <!-- END PAGE CONTENT