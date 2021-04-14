
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

            <div class="row ">
              <div class="col-md-12" style="overflow: auto;">
                  <h3 style="padding-bottom: 10px; color: #0169a9" class = "centered"><b>Laporan Absensi <?php echo $jangka ?></b></h3>

                 <!--   <div class="col-md-4 mb" style="float: right;"> -->

                  <!--  <a href="<?php echo site_url("c_pimpinan/tambahKaryawan");?>"><button  style=" float: right; " class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button> </a> -->

                   <div class="btn-group mb" style=" float: right;">
                      <button type="button" class="btn btn-theme02 dropdown-toggle" data-toggle="dropdown">
                        Export <span class="caret"></span>
                        </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo site_url('exportAbsensi/today');?>">Laporan Hari Ini</a></li>

                      </ul>
                    </div>

                  
                <!-- </div> -->
                 
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
                          <td><?php echo $x->kry_nama?></td>
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