<!-- BEGIN PAGE CONTENT  -->
        <div class="page-content page-wizard">
          <div class="header">
            <h2>Tambah <strong> DAK</strong></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>">Home</a>
                </li>
                <li class="active">Tambah Data DAK</li>
              </ol>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-content">
                  <div class="row">
                    <div class="col-md-6">
                       <input type="hidden" class="form-control" id="dak_bku" value="dak"/>
                      <?php echo validation_errors(); ?>
                      <form role="form" role="form" method="post" action="<?php echo base_url('index.php/dak/submit') ?>">
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
                              <label>Satuan</label>
                              <input type="text" class="form-control" name="satuan">
                            </div>
                          </div>
                        </div>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Volume</label>
                              <input type="text" class="form-control" name="volume">
                            </div>
                          </div>
                        </div>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Jumlah Penerima Manfaat</label>
                              <input type="text" class="form-control" name="penerima_manfaat">
                            </div>
                          </div>
                        </div>
                            <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Jenis</label>
                              <select name="swakelola">
                                <option value="0">Kontrak</option>
                                <option value="1">Swakelola</option>
                              </select>
                            </div>
                          </div>
                        </div>
                            <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>DAK</label>
                              <input type="text" class="form-control" name="dak">
                            </div>
                          </div>
                        </div>
                         <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Realisasi Keuangan</label>
                              <input type="text" class="form-control" name="realisasi_keuangan">
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
                              <label>Kodefikasi Masalah</label>
                              <input type="text" class="form-control" name="kodefikasi_masalah">
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