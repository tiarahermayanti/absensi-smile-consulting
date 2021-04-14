
    <!--main content start-->
<style type="text/css">
  .tbpenerimaan td {
  padding-right : 30px; 
  padding-left: 20px; 
  /*padding-top: 18px;*/
  /*padding-bottom: 17px;*/
}
 
  .tbpotongan td {
  padding-right : 30px; 
  padding-left: 20px; 
  /*padding-top: 10px;*/
  /*padding-bottom: 6px;*/

}
</style>
    <section id="main-content">
      <section class="wrapper site-min-height">
          <div class="row" style="margin-left: 2px; margin-top: 10px;">
          <!-- <span style="padding-left: 14px; color: #000000" class="help-block">Informasi Gaji Bulan</span> -->
                 <form action="<?php echo site_url("c_karyawan/dataGaji");?>" method="post">
                <div class="col-md-2">

                          <div class="input-group input-large" >
                            <input type="month" class="form-control" name="bulan">
                           
                          </div>
                    </div>

                    <div class="col-md-1" style="padding-left: 3%">
                       <button style="padding-left: 10px; padding-right: 10px" class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                    </div> 
                    </form>
        </div>
        <?php foreach ($gaji->result() as $gaji) { ?>
        <div class="row" style="color: #000000">
          <div class="col-lg-12">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="custom-boxgaji">
                <div class="servicetitle">
                  <h4><b>PENERIMAAN</b></h4>
                  <hr style="background: #5cb85c">
                </div>
                    <table class="tbpenerimaan" width="100%" height="300px" style="text-align: left; font-size: 15px; border-color: #ccc;" rules="rows" >
                      <tr>
                        <td style="padding-top: 20px">Gaji Pokok</td>
                        <td>:</td>
                        <td><?php echo "Rp " . number_format($gaji->gj_pokok,2,',','.'); ?></td>
                      </tr>

                      <tr>
                        <td>Tunjangan Makan</td>
                        <td>:</td>
                        <td><?php echo "Rp " . number_format($gaji->gj_makan,2,',','.'); ?></td>
                      </tr>
                      <tr>
                        <td>Tunjangan Kesehatan</td>
                        <td>:</td>
                        <td><?php echo "Rp " . number_format($gaji->gj_kesehatan,2,',','.'); ?></td>
                      </tr>
                      <tr>
                        <td>Kedisiplinan</td>
                        <td>:</td>
                        <td><?php echo "Rp " . number_format($gaji->gj_disiplin,2,',','.'); ?></td>
                      </tr>
                      <tr>
                        <td>Transportasi</td>
                        <td>:</td>
                        <td><?php echo "Rp " . number_format($gaji->gj_transport,2,',','.'); ?></td>
                      </tr>
                      <?php if($gaji->ttl_lembur != 0){ ?>
                        <tr>
                        <td>Jumlah Lembur</td>
                        <td>:</td>
                        <td><?php echo $gaji->ttl_lembur. ' Hari';?></td>
                      </tr>
                      <tr>
                        <td>Gaji Lembur</td>
                        <td>:</td>
                        <td><?php echo "Rp " . number_format($gaji->gj_lembur,2,',','.'); ?></td>
                      </tr>
                      <?php } ?>
                      <tr style="background: #7fef7f; height: 60px">
                        <td><b>Total Penerimaan</b></td>
                        <td><b>:</b></td>
                        <?php $penerimaan = $gaji->gj_pokok + $gaji->gj_makan + $gaji->gj_kesehatan + $gaji->gj_disiplin + $gaji->gj_transport + $gaji->gj_lembur; ?>
                        <td><b><?php echo "Rp " . number_format($penerimaan,2,',','.'); ?></b></td>
                      </tr>
                    </table>

              </div>
               
                
              <!-- end custombox -->
            </div>
            <!-- end col-4 -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="custom-boxgaji">
                <div class="servicetitle">
                  <h4><b>POTONGAN</b></h4>
                  <hr style="background: #f0ad4e">
                </div>
                
                <table class="tbpotongan" width="100%" height="300px" style="text-align: left; font-size: 15px; border-color: #ccc" rules="rows" >

                  <?php if($gaji->ttl_half != 0){ ?>
                     <tr>
                        <td>Jumlah Hadir 1/2 Hari</td>
                        <td>:</td>
                        <td><?php echo $gaji->ttl_half. ' Hari';?></td>
                      </tr>
                      <tr>
                        <td>Total Potongan Hadir 1/2 Hari</td>
                        <td>:</td>
                        <td><?php echo "Rp " . number_format($gaji->pt_half,2,',','.'); ?></td>
                      </tr>
                  <?php } ?>

                  <?php if($gaji->ttl_terlambat != 0){ ?>
                     <tr>
                        <td>Jumlah Terlambat</td>
                        <td>:</td>
                        <td><?php echo $gaji->ttl_terlambat. ' Hari';?></td>
                      </tr>
                      <tr>
                        <td>Total Potongan Terlambat</td>
                        <td>:</td>
                        <td><?php echo "Rp " . number_format($gaji->pt_terlambat,2,',','.'); ?></td>
                      </tr>
                  <?php } ?>

                  <?php if($gaji->ttl_alpa != 0){ ?>
                     <tr>
                        <td>Jumlah Alpha</td>
                        <td>:</td>
                        <td><?php echo $gaji->ttl_alpa. ' Hari';?></td>
                      </tr>
                      <tr>
                        <td>Total Potongan Alpha</td>
                        <td>:</td>
                        <td><?php echo "Rp " . number_format($gaji->pt_alpa,2,',','.'); ?></td>
                      </tr>
                  <?php } ?>

                  <?php if($gaji->ttl_izin != 0){ ?>
                     <tr>
                        <td>Jumlah Izin</td>
                        <td>:</td>
                        <td><?php echo $gaji->ttl_izin. ' Hari';?></td>
                      </tr>
                      <tr>
                        <td>Total Potongan Izin</td>
                        <td>:</td>
                        <td><?php echo "Rp " . number_format($gaji->pt_izin,2,',','.'); ?></td>
                      </tr>
                  <?php } ?>

                    <?php if($gaji->ttl_cuti != 0){ ?>
                     <tr>
                        <td>Jumlah Cuti</td>
                        <td>:</td>
                        <td><?php echo $gaji->ttl_cuti. ' Hari';?></td>
                      </tr>
                      <tr>
                        <td>Total Potongan Cuti</td>
                        <td>:</td>
                        <td><?php echo "Rp " . number_format($gaji->pt_cuti,2,',','.'); ?></td>
                      </tr>
                  <?php } ?>
                 
                 
              
                <?php if($gaji->ttl_sakit != 0){ ?>
                     <tr>
                        <td>Jumlah Sakit S.Dr</td>
                        <td>:</td>
                        <td><?php echo $gaji->ttl_sakit. ' Hari';?></td>
                      </tr>
                      <tr>
                        <td>Total Potongan Sakit S.Dr</td>
                        <td>:</td>
                        <td><?php echo "Rp " . number_format($gaji->pt_sakit,2,',','.'); ?></td>
                      </tr>
                  <?php } ?>
              
                <?php if($gaji->ttl_sakitnsdr != 0){ ?>
                     <tr>
                        <td>Jumlah Sakit NS.Dr</td>
                        <td>:</td>
                        <td><?php echo $gaji->ttl_sakitnsdr. ' Hari';?></td>
                      </tr>
                      <tr>
                        <td>Total Potongan Sakit NS.Dr</td>
                        <td>:</td>
                        <td><?php echo "Rp " . number_format($gaji->pt_sakitnsdr,2,',','.'); ?></td>
                      </tr>
                  <?php } ?>

                  <?php $potongan = $gaji->pt_half + $gaji->pt_terlambat + $gaji->pt_alpa + $gaji->ttl_izin + $gaji->pt_cuti + $gaji->pt_sakit + $gaji->pt_sakitnsdr;
                  if($potongan == 0){ ?>
                      <tr style="height: 240px">
                          <td colspan="3" style="text-align: center;"><label>Tidak ada Potongan</label></td>
                      </tr>
                 <?php } ?>

                  
                <tr style="background: #f0ad4e;  height: 60px">
                  <td  style="padding-top: 10px; "><b>Total Potongan</b></td>
                  <td><b>:</b></td>
                  <td><b><?php echo "Rp " . number_format($potongan,2,',','.'); ?></b></td>
                </tr>
                </table>
              </div>
              <!-- end custombox -->
            </div>
            <!-- end col-4 -->
          </div>
          <!--  /col-lg-12 -->
        </div>
        <!--  /row -->

        <div class="row">
           <div style="color: #ffffff; float: center; width: 40%; margin-left: 30%">
                      <div class="custom-boxgaji" style="background:#008de4">
                        <div class="servicetitle">
                          <h4><b>Total Gaji <?php echo indonesian_date('01-'.$gaji->gj_bulan.'-'.$gaji->gj_tahun, 'F'). ' ' . $gaji->gj_tahun?></b></h4>
                          <hr style="background: #ffffff">
                        </div>
                        <div style="font-size: 20px"><b><?php echo "Rp " . number_format($penerimaan-$potongan,2,',','.'); ?></b></div>
                            

                      </div>
                    </div>
        </div>
      <?php } ?>

        
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT