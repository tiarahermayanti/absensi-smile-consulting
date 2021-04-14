
<!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
<style>
.tblrekap th, td {
  text-align: left;
  padding-right: 8px; 
  padding-bottom: 3px;
  padding-left: 12px;
vertical-align:middle;
}

</style>
    <section id="main-content">
      <section class="wrapper">
          <!-- page start-->
          <div class="content-panel" style="padding-left: 2%; padding-right: 2%; padding-top: 20px">

             <div class="row mb" style="margin-top: 10px">
              <form action="<?php echo site_url("c_pimpinan/laporanAll");?>" method="post">
                <div class="col-md-4">
                      <span style="color: #000000" class="help-block">Periode Absensi</span>

                                  <div class="input-group input-large" >
                                    <input type="date" class="form-control" name="dari" required>
                                    <span class="input-group-addon">s/d</span>
                                    <input type="date" class="form-control" name="sampai" required>
                                  </div>
                                   
                  </div>
                  <div class="col-md-1" style=" padding-left: 5%; padding-top: 34px">
                           <button style="padding-left: 10px; padding-right: 10px" class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>

                    </div>
                    

                
                </form>
                  

                  <div class="col-md-7" style="padding-left: 10%; margin-top: 10px">
                      <table class="tblrekap" style="border: 1px solid black; font-size: 13px; color: #000000; float: right;">
                        <tr >
                          <td colspan="6" style="padding-top: 8px">
                            <h5><b>Keterangan</b></h5>
                            <hr size="10px">
                          </td>
                        </tr>
                        <tr>
                          <td>HP</td>
                          <td>:</td>
                          <td>Hadir Penuh</td>
                          <td>S S.Dr</td>
                          <td>:</td>
                          <td>Sakit S.Dr</td>
                          
                        </tr>
                        <tr>
                          <td>H1/2</td>
                          <td>:</td>
                          <td>Hadir 1/2 Hari</td>
                           <td>S NS.Dr</td>
                          <td>:</td>
                          <td>Sakit NS.Dr</td>
                        </tr>
                        <tr>
                          <td>TM</td>
                          <td>:</td>
                          <td>Terlambat Masuk</td>
                          <td>C</td>
                          <td>:</td>
                          <td>Cuti</td>
                        
                        </tr>
     
                        <tr>
                         <td>PT</td>
                          <td>:</td>
                          <td>Pulang Terlambat </td>
                          <td>I</td>
                          <td>:</td>
                          <td>Izin</td>
                        </tr>
                        <tr>
                          <td>L</td>
                          <td>:</td>
                          <td>Lembur</td>
                          <td>A</td>
                          <td>:</td>
                          <td>Alpha</td>

                          
                        </tr>
                        <tr>
                           <td>TAP</td>
                          <td>:</td>
                          <td>Tidak Absen Pulang</td>
                          <td></td>
                          <td></td>
                          <td></td>

                        </tr>
                       
                       
                       
                       
                      </table>
                    </div> 
                
              </div>

            <div class="row "style="margin-top: 10px; ">

              <div class="col-md-12" style="overflow: auto;">
                  <h3 style="padding-bottom: 10px; color: #0169a9" class = "centered"><b>Laporan Absensi <?php echo $jangka ?></b></h3>
                  <!--  <a href="<?php echo site_url("exportAbsensi/all/".$dari."/".$sampai);?>"style=" float: right; margin-bottom: 10px " class="btn btn-theme02">Download</a> -->

                    <div class="btn-group " style=" float: right; margin-bottom: 10px">
                      <button type="button" class="btn btn-theme02 dropdown-toggle" data-toggle="dropdown">
                        Export <span class="caret"></span>
                        </button>
                      <ul class="dropdown-menu" role="menu">

                        <li><a href="<?php echo site_url("exportAbsensi/all/".$dari."/".$sampai);?>">Laporan Absensi</a></li>
                        <!-- <li><a href="<?php echo site_url('exportAbsensi');?>">Laporan Kegiatan</a></li> -->

                      </ul>
                    </div>
                    
                    
              <table width="100%" style="color: #000000; border: 1px solid #ccc" class="display table table-bordered" id="hidden-table-info">
              <thead class="text-primary">
                        <tr>
                          <th rowspan="2" style="vertical-align:middle;">No</th>
                          <th rowspan="2" style="vertical-align:middle;">Nama</th>
                          <th colspan="11">Rekap Absensi</th>
                        </tr>
                        <tr>
                          
                          <th >HP</th>
                          <th>H1/2</th>
                          <th>TM</th>
                          <th>PT</th>
                          <th>L</th>
                          <th>TAP</th>
                          <th>S S.Dr</th>
                          <th>S NS.Dr</th>
                          <th>C</th>
                          <th>I</th>
                          <th>A</th>
                          

                        </tr>
                        
                      </thead>
                <tbody style="text-align: center;">
                  

                        <?php 
                          $no = 1; 
                           
                          foreach ($absen->result() as $a) {
                            if($status == "now"){
                               $data['rekap'] = $this->m_absen->get_bykry($a->kry_id)->result();
                            } else if($status == "jangka"){
                                $data['rekap'] = $this->m_absen->get_bytgl_kry($a->kry_id, $dari, $sampai)->result();
                            }
                             
                            $hadir = 0;
                            $half = 0;
                            $sakit = 0;
                            $sakitnsdr = 0;
                            $izin = 0;
                            $cuti = 0;
                            $alpa = 0;
                            $cepatplg =0;
                            $tidakabsen = 0;
                            $lembur = 0;
                            $ttllembur = 0;
                            $ttlterlambat =0;
                            $terlambat = 0;
                            $plglama = 0;
                            $totalplglama = 0;
                              foreach ($data['rekap'] as $x) {
                                

                              if($x->status_id == 1){
                                  $hadir = $hadir + 1;
                                  

                              }else if($x->status_id == 2){
                                  $half = $half + 1;

                              } else if($x->status_id == 3){
                                  $sakit = $sakit + 1;
                              } else if($x->status_id == 4){
                                  $sakitnsdr = $sakitnsdr + 1;
                              } else if ($x->status_id == 5) {
                                  $izin = $izin + 1;
                              } else if($x->status_id == 6){
                                  $cuti = $cuti + 1;
                              } else if ($x->status_id == 7) {
                                  $alpa = $alpa + 1;
                              }

                              if($x->ab_pulang < "18:00:00" && $x->ab_pulang != "00:00:00"){
                                  $cepatplg = $cepatplg + 1;
                              }

                              if($x->ab_pulang == "00:00:00"){
                                  $tidakabsen = $tidakabsen + 1;
                              }

                              if($x->ab_trlmbt_msk != "0"){
                                      $terlambat = $terlambat + 1;
                                      $ttlterlambat = $ttlterlambat + $x->ab_trlmbt_msk;
                                     
                                  }
                                 $jamtm    =floor($ttlterlambat / (60 * 60));
                                $menittm   =floor(($ttlterlambat - $jamtm * (60 * 60))/60);
                                $tm = $jamtm . " jam " . $menittm . " menit ";

                              if($x->ab_trlmbt_plg != "0"){
                                  $plglama = $plglama + 1;
                                  $totalplglama = $totalplglama + $x->ab_trlmbt_plg; 
                              }
                                $jampt    =floor($totalplglama / (60 * 60));
                                $menitpt   =floor(($totalplglama - $jampt * (60 * 60))/60);
                                $pt = $jampt . " jam " . $menitpt . " menit ";

                              if($x->ab_lembur != "0"){
                                  $lembur = $lembur + 1;
                                  $ttllembur = $ttllembur + $x->ab_lembur;
                              }
                                $jaml    =floor($ttllembur / (60 * 60));
                                $menitl   =floor(($ttllembur - $jaml * (60 * 60))/60);
                                $l = $jaml . " jam " . $menitl . " menit ";
                         
                          ?>
                        

                       

                       

                  <?php   } ?> 

                       <tr>
                          <td><?php echo $no;?></td>
                          <td><?php echo $a->kry_nama;?></td>
                          <td><?php echo $hadir;?></td>
                          <td><?php echo $half;?></td>
                          <td><?php echo $terlambat;?> kali (<?php echo $tm?>)</td>
                          <td><?php echo $plglama;?> kali (<?php echo $pt?>)</td>
                          <td><?php echo $lembur;?> kali (<?php echo $l?>)</td>
                          <td><?php echo $tidakabsen; ?></td>
                          <td><?php echo $sakit;?></td>
                          <td><?php echo $sakitnsdr;?></td>
                          <td><?php echo $cuti;?></td>
                          <td><?php echo $izin;?></td>
                          <td><?php echo $alpa;?></td>

                        </tr>

                      <?php $no++; }?>
                       
                </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->
        </div>
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->