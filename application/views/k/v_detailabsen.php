 <style>
th, td {
  padding: 8px;  
  text-align: left;
}
</style>
 <section id="main-content">
      <section class="wrapper">

          <!-- page start-->
          <div class="content-panel" style="padding-left: 2%; padding-right: 2%;">
            <?php 
                foreach ($alasan->result() as $key) {
                  $alasan_msk = $key->alasan_msk;
                  $alasan_plg = $key->alasan_plg;
              }
                    ?>
              <?php foreach ($detail->result() as $x) { ?>

             <div class="row mb centered">
              <h3 style="color: #000000"><b>RINCIAN INFORMASI</b></h3>
              <hr width="50%">
              </div>

              <div class="row mb">
                  <table >
                    <tr>
                      <td><b>Nama</b></td>
                      <td><b>:</b></td>
                      <td><b><?php echo $x->kry_nama; ?></b></td>
                    </tr>
                    <tr>
                      <td>Tanggal</td>
                      <td>:</td>
                      <td><?php echo indonesian_date($x->ab_tgl); ?></td>
                    </tr>
                    <tr>
                      <td>Kehadiran</td>
                      <td>:</td>
                      <td><?php echo $x->status_nama; ?></td>
                    </tr>
                  </table>
                  
                  <!-- <hr size="10px" width="30%" align="left" > -->
                </div>


              <div class="row mb" >
                <h5 style="padding-left: 8px"><b>Informasi Jam Kerja</b></h5>
                 <div class="col-lg-12">

                  <!-- Absen masuk -->
                    <div class="col-md-4">
                      <table width="100%">
                        <tr>
                          <td>Jam Masuk</td>
                          <td>:</td>
                          <td><?php echo $x->ab_masuk; ?></td>
                        </tr>
                        

                        <?php $terlambat = $x->ab_trlmbt_msk;
                         if($terlambat != 0){
                                   $jam    =floor($terlambat / (60 * 60));
                                    $menit   =floor(($terlambat - $jam * (60 * 60))/60);?>

                        <tr>
                          <td>Terlambat</td>
                          <td>:</td>
                          <td><?php echo $jam . " jam " . $menit . " menit ";?></td>
                        </tr>

                        <tr>
                          <td>Alasan</td>
                          <td>:</td>
                          <td><?php echo $alasan_msk;?></td>
                        </tr>
                        <?php  } ?>
                      
                        <tr>
                          <td>Lokasi</td>
                          <td>:</td>
                          <td><?php echo $x->ab_latlong_msk;?></td>
                        </tr>
                      </table>
                    </div>

                    <!-- foto absen masuk -->
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                     <img width="150px" height="200px" src="<?php echo base_url();?>uploads/absen_masuk/<?php echo $x->ab_ft_msk;?>">
                    </div>

                    <!-- absen pulang -->
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      <table>
                          <tr>
                            <td>Jam Pulang</td>
                            <td>:</td>
                            <td><?php echo $x->ab_pulang; ?></td>
                          </tr>

                          <?php 
                          $terlambat = $x->ab_trlmbt_plg;
                            if($terlambat != 0){
                               $jam    =floor($terlambat / (60 * 60));
                                      $menit   =floor(($terlambat - $jam * (60 * 60))/60);
                          ?>
                          
                          <tr>
                            <td>Terlambat</td>
                            <td>:</td>
                            <td><?php echo $jam . " jam " . $menit . " menit ";?></td>
                          </tr>
                          <tr>
                            <td>Alasan</td>
                            <td>:</td>
                            <td><?php echo $alasan_plg; ?></td>
                          </tr>
                          <?php }?>

                          <?php 
                          $lembur = $x->ab_lembur;
                            if($lembur != 0){
                               $jaml    =floor($lembur / (60 * 60));
                                      $menitl   =floor(($lembur - $jaml * (60 * 60))/60);
                          ?>
                          
                          <tr>
                            <td>Terlambat Pulang</td>
                            <td>:</td>
                            <td><?php $jaml . " jam " . $menitl . " menit ";?></td>
                          </tr>
                          <tr>
                            <td>Alasan</td>
                            <td>:</td>
                            <td><?php echo $alasan_plg; ?></td>
                          </tr>
                          <?php }?>
                          
                          <tr>
                            <td>Lokasi</td>
                            <td>:</td>
                            <td><?php echo $x->ab_latlong_msk;?></td>
                          </tr>
                        </table>
                    </div>

                    <!-- foto absen pulang -->
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <img  width="150" height="200px" src="<?php echo base_url();?>uploads/absen_pulang/<?php echo $x->ab_ft_plg;?>">
                    </div>
               
               </div>
              </div>
              <?php } ?>

              <?php if($dinas->num_rows() != 0){ ?>
                  <div class="row mb" >
                    <h5 style="padding-left: 8px"><b>Informasi Aktifitas</b></h5>
                      <div class="col-lg-12 col-md-12" >
              <?php  if($absendinas->result() != null){
                $no = 1;
                  foreach ($absendinas->result() as $d) {?>
                      <!-- aktifitas -->
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb" >
                      <table width="100%">
                        <tr>
                          <td>Jam Datang Aktifitas <?php echo $no;?></td>
                          <td>:</td>
                          <td><?php echo $d->ab_dinas_jam; ?></td>
                          
                        </tr>
                        <tr>
                          <td>Lokasi Kerja <?php echo $no;?></td>
                          <td>:</td>
                          <td><?php echo $d->dinas_tempat; ?></td>
                        </tr>
                        <tr>
                          <td>Jam Selesai Aktifitas <?php echo $no;?></td>
                          <td>:</td>
                          <td><?php echo $d->ab_dinas_selesai; ?></td>
                          
                        </tr>
                      </table>
                    </div>

                    <!-- foto absen masuk -->
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mb">
                     <img width="150px" height="200px" src="<?php echo base_url();?>uploads/absen_dinas/<?php echo $d->ab_dinas_foto;?>">
                    </div>

                    <?php $no++; } } ?>
               </div>
              </div>

              
              <!-- end jam masuk dinas -->

              <!-- start rencana kegiatan -->
              <div class="row mb" >
                <h5 style="padding-left: 8px"><b>Laporan Rencana Kegiatan</b></h5>
                <div class="col-lg-12">
                    <?php  if($absendinas->result() != null){
                      $no = 1;
                        foreach ($absendinas->result() as $d) {?>
                            <!-- aktifitas -->
                          <div class="col-md-4">
                            <div>Aktifitas <?php echo $no;?> : </div>
                            <div style="text-align: justify; padding: 10px;">
                              <pre style="height: 100px"><?php echo $d->dinas_rencana; ?></pre>
                            </div>
                          </div>

                     <?php $no++; } } ?>
               </div>
              </div>

             
              <!-- end rencana kegiatan -->

              <!-- start laporan kegiatan -->
              <div class="row mb" >
                 <h5 style="padding-left: 8px"><b>Laporan Kegiatan Harian</b></h5>
                 <div class="col-lg-12">
                    <?php  if($absendinas->result() != null){
                      $no = 1;
                        foreach ($absendinas->result() as $d) {?>
                            <!-- aktifitas -->
                          <div class="col-md-4">
                            <div>Aktifitas <?php echo $no;?> : </div>
                                <div style="text-align: justify; padding: 10px;">
                                  <pre style="height: 100px"><?php echo $d->dinas_lap; ?></pre>
                                </div>
                          </div>
                    <?php $no++; } } ?>
                  </div>
                </div>

              
              <!-- end laporan kegiatan -->

              <!-- start foto kegiatan -->
              <div class="row mb" >
                    <h5 style="padding-left: 8px"><b>Foto Kegiatan</b></h5>
                     <div class="col-lg-12" >
              <?php  if($absendinas->result() != null){
                $no = 1;
                  foreach ($absendinas->result() as $d) {?>
                      <!-- aktifitas -->
                    <div class="col-md-4 ">
                      <div style=" padding-top: 10px; padding-bottom: 10px">Aktifitas <?php echo $no;?> : </div>
                          <div  style="height: 170px; border: 1px solid #ccc; padding: 10px;">
                               <?php if($d->dinas_ft1 != null ){?>
                                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <!-- <img width="100%" height="120px" src="<?php echo base_url();?>uploads/foto_kegiatan/<?php echo $d->dinas_ft1;?>"> -->
                                     <div class="project">
                                          <div class="photo-wrapperkry">
                                              <div class="photo centered">
                                               
                                                 <a class="fancybox " href="<?php echo base_url();?>uploads/foto_kegiatan/<?php echo $d->dinas_ft1;?>"><img  class="img-responsive" style=" width: 100%; height: 120px;  display: block; margin: auto; " src="<?php echo base_url();?>uploads/foto_kegiatan/<?php echo $d->dinas_ft1;?>" alt=""></a>
                                              
                                             </div>
                                           </div>
                                          <div class="overlay"></div>
                                      </div>
                                  </div>
                                 <?php }?>

                                <?php if($d->dinas_ft2 != null ){?>
                                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                         <div class="project">
                                                    <div class="photo-wrapperkry">
                                                        <div class="photo centered">
                                                         
                                                           <a class="fancybox " href="<?php echo base_url();?>uploads/foto_kegiatan/<?php echo $d->dinas_ft2;?>"><img  class="img-responsive" style=" width: 100%; height: 120px;  display: block; margin: auto; " src="<?php echo base_url();?>uploads/foto_kegiatan/<?php echo $d->dinas_ft2;?>" alt=""></a>
                                                        
                                                       </div>
                                                     </div>
                                                    <div class="overlay"></div>
                                                </div>
                                      </div>
                                 <?php }?>
                          
                           
                                 <?php if($d->dinas_ft3 != null ){?>
                                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                   <div class="project">
                                                    <div class="photo-wrapperkry">
                                                        <div class="photo centered">
                                                         
                                                           <a class="fancybox " href="<?php echo base_url();?>uploads/foto_kegiatan/<?php echo $d->dinas_ft3;?>"><img  class="img-responsive" style=" width: 100%; height: 120px;  display: block; margin: auto; " src="<?php echo base_url();?>uploads/foto_kegiatan/<?php echo $d->dinas_ft3;?>" alt=""></a>
                                                        
                                                       </div>
                                                     </div>
                                                    <div class="overlay"></div>
                                                </div>
                                    </div>
                                  <?php }?>
                    
                        </div>
                    </div>
                    
                    <?php $no++; } } ?>
               </div>
              </div>

              
              <!-- end foto kegiatan -->
               <!-- end if dinas ada -->
              <?php } else{ ?>
               
                <!-- laporan kegiatan harian -->

                     <!-- start laporan kegiatan -->
              <div class="row mb mt" >
                 
                 <div class="col-lg-12">
                    <?php   if($laporan->result() != null) {

                        foreach ($laporan->result() as $y) { ?>
                            <!-- aktifitas -->

                          <div class="col-md-6">
                            <h5 style="padding-left: 8px"><b>Laporan Kegiatan Harian</b></h5>
                                <div style="text-align: justify; ">
                                  <pre style="height: 100px;padding: 10px;"><?php echo $y->lap_deskripsi; ?></pre>
                                </div>
                          </div>
                      <!-- aktifitas -->
                    <div class="col-md-6 ">
                    <h5 style="padding-left: 8px"><b>Foto Kegiatan</b></h5>
                          <div  style="height: 160px; border: 1px solid #ccc; padding: 10px;">
                               <?php if($y->lap_foto1 != null ){?>
                                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <!-- <img width="100%" height="120px" src="<?php echo base_url();?>uploads/foto_kegiatan/<?php echo $d->dinas_ft1;?>"> -->
                                     <div class="project">
                                          <div class="photo-wrapperkry">
                                              <div class="photo centered">
                                               
                                                 <a class="fancybox " href="<?php echo base_url();?>uploads/foto_kegiatan/<?php echo $y->lap_foto1;?>"><img  class="img-responsive" style=" width: 130px; height: 130px;  display: block; margin: auto; " src="<?php echo base_url();?>uploads/foto_kegiatan/<?php echo $y->lap_foto1;?>" alt=""></a>
                                              
                                             </div>
                                           </div>
                                          <div class="overlay"></div>
                                      </div>
                                  </div>
                                 <?php }?>

                                <?php if($y->lap_foto2 != null ){?>
                                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                         <div class="project">
                                                    <div class="photo-wrapperkry">
                                                        <div class="photo centered">
                                                         
                                                           <a class="fancybox " href="<?php echo base_url();?>uploads/foto_kegiatan/<?php echo $y->lap_foto2;?>"><img  class="img-responsive" style=" width: 130px; height: 130px;  display: block; margin: auto; " src="<?php echo base_url();?>uploads/foto_kegiatan/<?php echo $y->lap_foto2;?>" alt=""></a>
                                                        
                                                       </div>
                                                     </div>
                                                    <div class="overlay"></div>
                                                </div>
                                      </div>
                                 <?php }?>
                          
                           
                                 <?php if($y->lap_foto3 != null ){?>
                                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                   <div class="project">
                                                    <div class="photo-wrapperkry">
                                                        <div class="photo centered">
                                                         
                                                           <a class="fancybox " href="<?php echo base_url();?>uploads/foto_kegiatan/<?php echo $y->lap_foto3;?>"><img  class="img-responsive" style=" width: 130px; height: 130px;  display: block; margin: auto; " src="<?php echo base_url();?>uploads/foto_kegiatan/<?php echo $y->lap_foto3;?>" alt=""></a>
                                                        
                                                       </div>
                                                     </div>
                                                    <div class="overlay"></div>
                                                </div>
                                    </div>
                                  <?php }?>
                    
                        </div>
                    </div>
                    
                    <?php } } ?>
               </div>
              </div>

              
              <!-- end foto kegiatan -->

              <?php } ?>
              
              <!-- <div class="row mt mb">
              <a href="<?php echo site_url("c_karyawan/saveRencanaKegiatan");?>"><button class="btn btn-theme" >SUBMIT</button></a>
              </div> -->
              

                  

          </div>
          <!-- page end-->
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->