<!-- BEGIN PAGE CONTENT -->
        <div class="page-content page-wizard">
          <div class="header">
            <h2>Edit DAK<strong></strong></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>">Home</a>
                </li>
                <li class="active">Edit DAK</li>
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
                      <form role="form" role="form" method="post" action="<?php echo base_url('index.php/dak/edit/submit') ?>">
                        <input type="hidden" name="id" value="<?php echo $dak[0]['id'] ?>">
                         <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Bidang</label>
                              <select name="id_jenis" id="bidang">
                                <option value="">Pilih Bidang</option>
                                 <?php $i=0; foreach ($jenis as $item){ $i=$i+1;?>
                                             <option value="<?php echo $item['id'] ?>" <?php if($item['id'] == $dak[0]['id_jenis']){ echo "selected";} ?>><?php echo $item['jenis'] ?></option>
                     
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
                               <?php $i=0; foreach ($sub_jenis as $item){ $i=$i+1;?>
                                             <option value="<?php echo $item['id'] ?>" <?php if($item['id'] == $dak[0]['id_sub_jenis']){ echo "selected";} ?>><?php echo $item['sub_jenis'] ?></option>
                     
                                <?php   } ?> 
                              </select>
                            </div>
                          </div>
                        </div>  
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Nama Kegiatan</label>
                              <input type="text" class="form-control" name="kegiatan" value="<?php echo $dak[0]['kegiatan'] ?>">
                            </div>
                          </div>
                        </div>
                      <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Satuan</label>
                              <input type="text" class="form-control" name="satuan" value="<?php echo $dak[0]['satuan'] ?>">
                            </div>
                          </div>
                        </div>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Volume</label>
                              <input type="text" class="form-control" name="volume" value="<?php echo $dak[0]['volume'] ?>">
                            </div>
                          </div>
                        </div>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Jumlah Penerima Manfaat</label>
                              <input type="text" class="form-control" name="penerima_manfaat" value="<?php echo $dak[0]['penerima_manfaat'] ?>">
                            </div>
                          </div>
                        </div>
                            <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Jenis</label>
                              <select name="swakelola">
                                <option value="0" <?php if($dak[0]['swakelola'] == "0"){ echo "selected";} ?>>Kontrak</option>
                                <option value="1" <?php if($dak[0]['swakelola'] == "1"){ echo "selected";} ?>>Swakelola</option>
                              </select>
                            </div>
                          </div>
                        </div>
                            <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>DAK</label>
                              <input type="text" class="form-control" name="dak" value="<?php echo $dak[0]['dak'] ?>">
                            </div>
                          </div>
                        </div>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Realisasi Keuangan</label>
                              <input type="text" class="form-control" name="realisasi_keuangan" value="<?php echo $dak[0]['realisasi_keuangan'] ?>">
                            </div>
                          </div>
                        </div>
                            <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Realisasi Fisik</label>
                              <input type="text" class="form-control" name="realisasi_fisik" value="<?php echo $dak[0]['realisasi_fisik'] ?>">
                            </div>
                          </div>
                        </div>
                            <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Kodefikasi Masalah</label>
                              <input type="text" class="form-control" name="kodefikasi_masalah" value="<?php echo $dak[0]['kodefikasi_masalah'] ?>">
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
                              <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Edit</button>
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