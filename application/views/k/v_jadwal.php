 <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
<style type="text/css">
  th, td{
    text-align: center;
  }
</style>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row">
          
          <div class="col-lg-12 ">
            <div class="row content-panel">
              <div class="panel-heading">
                <ul class="nav nav-tabs nav-justified">
                  <li class="active">
                    <a data-toggle="tab" href="#overview">Jam Kerja</a>
                  </li>
                 <!--  <li>
                    <a data-toggle="tab" href="#contact" class="contact-map"></a>
                  </li> -->
                  <li>
                    <a data-toggle="tab" href="#edit">Potongan dan Lembur</a>
                  </li>
                </ul>
              </div>
              <!-- /panel-heading -->
              <div class="panel-body">
                <div class="tab-content">
                  <div id="overview" class="tab-pane active">
                    <div class="row">
                     
                      <div class="col-md-12">
                          <div  style="margin-left: 2%; margin-right: 2%">
                            <table class="table table-striped table-advance table-hover centered" >
                             
                              <thead>
                                <tr>
                                  <th style="text-align: center;">Hari</th>
                                  <th style="text-align: center;">Masuk</th>
                                  <th style="text-align: center;">Pulang</th>
                                  <th style="text-align: center;">Lembur</th>
                                  <th style="text-align: center;">Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($jdwl as $k): ?>
                                  <tr>
                                   <td><?php echo $k->jdwl_hari; ?></td>
                                   <td><?php echo $k->jdwl_masuk;?></td>
                                   <td><?php echo $k->jdwl_pulang; ?></td>
                                   <td><?php echo $k->jdwl_lembur; ?></td>
                                   <td>
                                     <?php if($k->jdwl_status == "kerja"){ ?>
                                       <span class="label label-info label-mini">Hari Kerja</span>
                                     <?php } else if($k->jdwl_status == "libur"){ ?>
                                        <span class="label label-danger label-mini">Libur</span>
                                     <?php } ?>
                                    </td>
                                    

                                  </tr>
                                <?php endforeach ?>
                                
                                
                              </tbody>
                            </table>
                          </div>
                          <!-- /content-panel -->
                        </div>
                        <!-- /col-md-12 -->
                    </div>
                    <!-- /OVERVIEW -->
                  </div>
                  <!-- /tab-pane -->
                 
                  <div id="edit" class="tab-pane" >
                    <div class="row">
                      <div class="col-lg-12 detailed">

                        <form role="form" class="form-horizontal">
                          <?php foreach ($potongan as $k): ?>
                            <input type="hidden" name="id_pot" value="<?php echo $k->id_pot; ?>">
                             <div class="form-group">
                            <label class="col-lg-4 control-label">Terlambat</label>
                            <div class="col-lg-4">
                              <input  type="number"  name="terlambat" value="<?php echo $k->terlambat; ?>" class="form-control" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 control-label">Hadir 1/2 Hari</label>
                            <div class="col-lg-4">
                              <input  type="number" name="hadir_setengah" value="<?php echo $k->hadir_setengah; ?>" class="form-control" readonly>

                            </div>
                          </div>
                         
                          <div class="form-group">
                            <label class="col-lg-4 control-label">Sakit S.Dr</label>
                            <div class="col-lg-4">
                              <input  type="number"  name="sakit_sdr" value="<?php echo $k->sakit_sdr; ?>" class="form-control" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 control-label">sakit NS.Dr</label>
                            <div class="col-lg-4">
                              <input type="number" name="sakit_nsdr" value="<?php echo $k->sakit_nsdr; ?>" class="form-control" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 control-label">Izin</label>
                            <div class="col-lg-4">
                              <input type="number"  name="izin" value="<?php echo $k->izin; ?>" class="form-control" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 control-label">Cuti</label>
                            <div class="col-lg-4">
                              <input type="number" name="cuti" value="<?php echo $k->cuti; ?>" class="form-control" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 control-label">Alpha</label>
                            <div class="col-lg-4">
                              <input type="number"  name="alpa" value="<?php echo $k->alpa; ?>" class="form-control" readonly>
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="col-lg-4 control-label">Lembur</label>
                            <div class="col-lg-4">
                              <input type="number"  name="lembur" value="<?php echo $k->lembur; ?>" class="form-control" readonly>
                            </div>
                          </div>

                        
                          <?php endforeach ?>
                          
                        </form>
                      </div>
                    
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                </div>
                <!-- /tab-content -->
              </div>
              <!-- /panel-body -->
            </div>
            <!-- /col-lg-12 -->
          </div>
          <!-- /row -->
        </div>
        <!-- /container -->


      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
