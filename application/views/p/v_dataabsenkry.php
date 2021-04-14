
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
}

</style>
    <section id="main-content">
      <section class="wrapper">
          <!-- page start-->
          <div class="content-panel" style="padding-left: 2%; padding-right: 2%; padding-top: 20px">

             <div class="row mb" >
              <form action="<?php echo site_url("c_pimpinan/dataAbsenKaryawan");?>" method="post">
                <div class="col-md-5">
                   <div >
                    <span style="color: #000000" class="help-block">Nama Karyawan</span>
                                <select class="form-control" name="kry_id" required>
                                    <option value="">Pilih Nama Karyawan</option>
                                     <?php  foreach ($karyawan->result() as $j ) { ?>
                                    <option value="<?php echo $j->kry_id; ?>"><?php echo $j->kry_nama;?></option>
                                    <?php } ?>
                                  </select>
                    </div>

                      <div style="margin-top: 10px">
                      <span style="color: #000000" class="help-block">Periode Absensi</span>

                                  <div class="input-group input-large" >
                                    <input type="date" class="form-control" name="dari" required>
                                    <span class="input-group-addon">s/d</span>
                                    <input type="date" class="form-control" name="sampai" required>
                                  </div>

                           
                        
                      </div>
                     <div style="margin-top: 10px">
                     
                             <button style="padding-left: 10px; padding-right: 10px" class="btn btn-primary" type="submit">Cari</button>
                          </div> 

                </div>
                </form>
                  

                    <div class="col-md-7" style="padding-left: 10%">
                      <table class="tblrekap" style="border: 1px solid black; font-size: 13px; color: #000000">
                        <tr >
                          <td colspan="6" style="padding-top: 8px">
                            <h5><b>Rekap Absensi <?php echo $jangka ?></b></h5>
                            <hr size="10px">
                          </td>
                        </tr>
                        <tr>
                          <td>Hadir Penuh</td>
                          <td>:</td>
                          <td><?php echo $hadir ;?> Hari</td>
                          <td>Hadir 1/2 Hari</td>
                          <td>:</td>
                          <td><?php echo $half ?> Hari</td>
                        </tr>
                        <tr>
                          <td>Terlambat Masuk</td>
                          <td>:</td>
                          <td><?php echo $terlambat; ?> Hari</td>
                          <td>Cuti</td>
                          <td>:</td>
                          <td><?php echo $cuti; ?> Hari</td>
                        </tr>
                        <tr>
                          <td>Total Masuk Terlambat</td>
                          <td>:</td>
                          <td>
                            <?php 
                            if($ttlterlambat == 0){
                              echo "0 Jam 0 Menit";
                            } else{
                               $jam    =floor($ttlterlambat / (60 * 60));
                              $menit   =floor(($ttlterlambat - $jam * (60 * 60))/60);
                              echo $jam . " Jam " . $menit . " Menit ";
                            }
                             
                            ?>
                              
                            </td>
                         <td>Sakit NS.Dr</td>
                          <td>:</td>
                          <td><?php echo $sakitnsdr; ?> Hari</td>
                        </tr>
     
                        <tr>
                          <td>Pulang Terlambat</td>
                          <td>:</td>
                          <td><?php echo $plglama; ?> Hari</td>
                          <td>Sakit S.Dr</td>
                          <td>:</td>
                          <td><?php echo $sakit; ?> Hari</td>
                        </tr>
                        <tr>
                          <td>Total Pulang Terlambat</td>
                          <td>:</td>
                          <td>
                            <?php 
                            if($totalplglama == 0){
                              echo "0 Jam 0 Menit";
                            } else{
                               $jam    =floor($totalplglama / (60 * 60));
                              $menit   =floor(($totalplglama - $jam * (60 * 60))/60);
                              echo $jam . " Jam " . $menit . " Menit ";
                            }
                             
                            ?>
                          </td>
                           <td>Alpha</td>
                          <td>:</td>
                          <td><?php echo $alpa;?> Hari</td>
                        </tr>
                        <tr>
                          <td>Tidak Absen Pulang</td>
                          <td>:</td>
                          <td><?php echo $tidakabsen;?> Hari</td>
                          <td>Izin</td>
                          <td>:</td>
                          <td><?php echo $izin;?> Hari</td>
                          
                        </tr>
                        <tr>
                           <td>Lembur</td>
                          <td>:</td>
                          <td><?php echo $lembur;?> Hari</td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                       
                        <tr >
                          <td style="padding-bottom: 8px;">Total Jam Lembur</td>
                          <td>:</td>
                          <td>
                             <?php 
                            if($ttllembur == 0){
                              echo "0 Jam 0 Menit";
                            } else{
                               $jaml    =floor($ttllembur / (60 * 60));
                              $menitl   =floor(($ttllembur - $jaml * (60 * 60))/60);
                              echo $jaml . " Jam " . $menitl . " Menit ";
                            }
                             
                            ?>
                            </td>
                            <td></td>
                          <td></td>
                          <td></td>
                        
                         
                        </tr>
                      </table>
                    </div>
                
              </div>

            <div class="row ">
              <div class="col-md-12" style="overflow: auto;">
                  <h3 style="padding-bottom: 10px; color: #0169a9" class = "centered"><b>Laporan Absensi <?php echo $jangka ?></b></h3>
                   <div class="btn-group " style=" float: right; margin-bottom: 10px">
                      <button type="button" class="btn btn-theme02 dropdown-toggle" data-toggle="dropdown">
                        Export <span class="caret"></span>
                        </button>
                      <ul class="dropdown-menu" role="menu">

                        <li><a href="<?php echo site_url("exportAbsensi/index/".$kry_id."/".$dari."/".$sampai);?>">Laporan Absensi</a></li>
                        <!-- <li><a href="<?php echo site_url('exportAbsensi');?>">Laporan Kegiatan</a></li> -->

                      </ul>
                    </div>

              <table width="100%" style="color: #000000; border: 1px solid #ccc" class="display table table-bordered" id="hidden-table-info">
              <thead class="text-primary">
                        <tr>
                          <th rowspan="2" style="vertical-align:middle;">No</th>
                          <th rowspan="2" style="vertical-align:middle;">Nama</th>
                          <th rowspan="2" style="vertical-align:middle;">Tanggal</th>
                          <th colspan="2">Absen Masuk</th>
                          <th colspan="3">Absen Pulang</th>
                          <th rowspan="2" style="vertical-align:middle;">Kehadiran</th>
                          <th rowspan="2" style="vertical-align:middle;">Aksi</th>
                        </tr>
                        <tr>
                          <th >Jam Masuk</th>
                          <th >Terlambat</th>
                          <th >Jam Pulang</th>
                          <th >Terlambat</th>
                          <th >Lembur</th>

                        </tr>
                        
                      </thead>
                <tbody style="text-align: center;">
                   <?php
                        $no = 1; 
                        foreach ($absen->result() as $x) : ?>
                        <tr>
                          <td><?php echo $no;?></td>
                          <td><?php echo $kry_nama?></td>
                          <td><?php echo  date("d-m-Y", strtotime($x->ab_tgl));?></td>
                          <td><?php echo $x->ab_masuk;?></td>

                          <td>
                                <?php $terlambat = $x->ab_trlmbt_msk;
                              if ($terlambat == 0){
                                echo "-";
                              } else{
                                $jam    =floor($terlambat / (60 * 60));
                                  $menit   =floor(($terlambat - $jam * (60 * 60))/60);
                                  echo $jam . " jam " . $menit . " menit ";
                              }
                              ?>
                                
                          </td>

                          <td><?php echo $x->ab_pulang;?></td>

                          <td>
                            <?php $terlambat = $x->ab_trlmbt_plg;
                              if ($terlambat == 0){
                                echo "-";
                              } else{
                                $jam    =floor($terlambat / (60 * 60));
                                  $menit   =floor(($terlambat - $jam * (60 * 60))/60);
                                  echo $jam . " jam " . $menit . " menit ";
                              }
                              ?>
                            
                          </td>

                          <td>
                            <?php $terlambat = $x->ab_lembur;
                              if ($terlambat == 0){
                                echo "-";
                              } else{
                                $jam    =floor($terlambat / (60 * 60));
                                  $menit   =floor(($terlambat - $jam * (60 * 60))/60);
                                  echo $jam . " jam " . $menit . " menit ";
                              }
                              ?>
                            
                          </td>

                          <td><?php echo $x->status_nama;?></td>

                          <td><a href="<?php echo base_url('c_pimpinan/detailAbsen/'.$x->ab_id .'/'.$x->kry_id);?>" style="padding-left: 10px; padding-right: 10px" class="btn btn-info btn-xs"><i class="fa fa-file-text-o"></i></a>

                            <a href="<?php echo base_url('c_pimpinan/editAbsenKry/'.$x->ab_id);?>"  class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                          </td>
                        </tr>
                       <?php 
                        $no++;
                        endforeach;?>
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