<style type="text/css">
 
  th, td {
  padding-right: 50px;  
  padding-left: 5px;
  }

  .form-control{
    color : #000000;
  }
</style>
<!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row mt">
          <div class="col-lg-12">
            <div class="row content-panel">

             <div class="profile-text mt mb centered detailed" >
                <h3>SAMPAI BERTEMU KEMBALI</h3>
                <h3 style="padding-top: 5px; bottom: 20px">KARYAWAN SMILE CONSULTING INDONESIA</h3>
              </div>

                <?php foreach ($pulang->result() as $x) : 
                  $tgl = indonesian_date($x->ab_tgl, 'l, d F Y');
                 ?>
              <form action="<?php echo site_url("c_karyawan/saveAlasan");?>" method="post">

                <!-- col-md-4 -->
              <div class="col-md-4 centered ">
                <div class="right-divider hidden-sm hidden-xs">
                   <div class="profile-ab">
                  <img src="<?php echo base_url();?>uploads/absen_pulang/<?php echo $x->ab_ft_plg;?>" >
                 
                </div>
                </div>
              </div>
              <!-- /col-md-4 -->

              <!-- col-md-8 -->
             
              <div class="col-md-8 profile-text" style="color: #000000">     
               <!--  <?php if($x->ab_trlmbt_msk == 0){ ?>
                  <div style="margin-top: 35px">
                <?php } ?>    -->      
                <form role="form" class="form-horizontal">
                
                  <div class="row" style="margin-bottom: 15px ">
                    <div class="form-group">
                            <label class="col-lg-2 control-label">Nama</label>
                            <div class="col-lg-6">
                              <input type="text" value="<?php echo $x->kry_nama;?>" class="form-control" readonly>
                            </div>
                          </div>
                  </div>
                  <div class="row" style="margin-bottom: 15px ">
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Tanggal</label>
                            <div class="col-lg-6">
                              <input type="text" value="<?php echo $tgl;?>" class="form-control" readonly>
                            </div>
                          </div>
                  </div>
                  <div class="row" style="margin-bottom: 15px ">
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Jam Pulang</label>
                            <div class="col-lg-6">
                              <input type="text" value="Pk. <?php echo $x->ab_pulang;?>" class="form-control" readonly>
                            </div>
                          </div>
                  </div>

                   <?php if($x->ab_trlmbt_plg != 0){
                    $terlambat = $x->ab_trlmbt_plg;
                    $jam    =floor($terlambat / (60 * 60));
                      $menit   =floor(($terlambat - $jam * (60 * 60))/60);
                ?>

                  <div class="row" style="margin-bottom: 15px ">
                           <div class="form-group">
                            <label class="col-lg-2 control-label">Waktu Lebih</label>
                            <div class="col-lg-6">
                              <input type="text" value="<?php echo $jam . " jam " . $menit . " menit ";?>" class="form-control" readonly>
                            </div>
                          </div>
                          </div>
                  <div class="row" style="margin-bottom: 15px ">
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Penyebab Lebih</label>
                            <div class="col-lg-6">
                              <textarea rows="6" cols="30" class="form-control" name="alasan_plg" placeholder="Masukan alasan terlambat pulang" required></textarea>
                            </div>
                            </div>
                  </div>

                  <?php } ?>

                   <?php if($x->ab_lembur != 0){
                    $terlambat = $x->ab_lembur;
                    $jam    =floor($terlambat / (60 * 60));
                      $menit   =floor(($terlambat - $jam * (60 * 60))/60);
                    ?>
                     <div class="row" style="margin-bottom: 15px ">
                           <div class="form-group">
                            <label class="col-lg-2 control-label">Waktu Lembur</label>
                            <div class="col-lg-6">
                              <input type="text" value="<?php echo $jam . " jam " . $menit . " menit ";?>" class="form-control" readonly>
                            </div>
                          </div>
                          </div>
                  <div class="row" style="margin-bottom: 15px ">
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Penyebab Lembur</label>
                            <div class="col-lg-6">
                              <textarea rows="6" cols="30" class="form-control" name="alasan_plg" placeholder="Masukan alasan lembur" required></textarea>
                            </div>
                            </div>
                  </div>

                  <?php } ?>

                

                          <div class="form-group" >
                            <div class="col-lg-offset-2 col-lg-10">
                              <input type="hidden" name="ab_id" value="<?php echo $x->ab_id;?>">
                              <button  style="margin-bottom: 20px; margin-top: 10px" class="btn btn-theme" type="submit">SUBMIT</button>
                            </div>
                          </div>

                        </form>

             
             
            </div>
          </div>
             </form>
             <?php endforeach;?>
          </div>
        </div>
        <!-- /col-lg-12 -->
      </div>
      <!-- /row -->
        </section>
      </section>
          