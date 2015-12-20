<!-- BEGIN PAGE CONTENT -->
        <div class="page-content">
          <div class="header">
            <h2>Manajemen <strong>BKU</strong></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>">Home</a>
                </li>
                <li class="active">Manajemen BKU</li>
              </ol>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="panel">
                <div class="panel-header">
                  
                </div>
                <div class="panel-content">
                  <div class="row">
                    <div class="col-md-5">
                      <a href="<?php echo base_url('index.php/bku/add')?>" class="btn btn-sm btn-info btn-square"><i class="fa fa-plus"></i> Tambah</a>
                      <a href="<?php echo base_url('index.php/bku/excel')?>" class="btn btn-sm btn-info btn-square"><i class="fa fa-plus"></i> Print Excel</a>
                    </div>
                  </div>
                  <table class="table table-hover table-dynamic" id="">
                    <thead>
                      <tr>
                        <th>Kegiatan</th>
                    
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($bku as $item): ?>
                        <tr>
                          <td><?php echo $item['kegiatan'] ?></td>
                        
                          <td>
                            <a href="<?php echo base_url('index.php/bku/index/'.$item['id']) ?>" class="btn btn-sm btn-square btn-success"><i class="fa fa-pencil-square-o"></i></a>
                            <a href="<?php echo base_url('index.php/bku/delete/'.$item['id']) ?>" class="btn btn-square btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Data Ini?')"><i class="fa fa-ban"></i></a>
                          </td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
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