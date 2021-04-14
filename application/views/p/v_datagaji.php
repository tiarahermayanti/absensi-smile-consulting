 <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
       

          <!-- page start-->
          <div class="content-panel" style="padding-left: 2%; padding-right: 2%; padding-top: 50px">

              <div class="row" style="margin-top: 10px">
              <span style="padding-left: 14px; color: #000000" class="help-block">Informasi Gaji Bulan</span>
                 <form action="<?php echo site_url("c_pimpinan/dataGaji");?>" method="post">
                <div class="col-md-2">

                          <div class="input-group input-large" >
                            <input type="month" class="form-control" name="bulan">
                           
                          </div>
                    </div>

                    <div class="col-md-1" style="padding-left: 3%">
                       <button style="padding-left: 10px; padding-right: 10px" class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                    </div> 
                    </form>

            <div class="adv-table" style="margin-top: 70px; overflow: auto;" >
              <?php  
              $penerimaan = 0;
              $potongan = 0;
              foreach ($gaji->result() as $x) { 
                $bulan = $x->gj_bulan;
                $tahun = $x->gj_tahun;
                          $penerimaan = $penerimaan +$x->gj_pokok + $x->gj_makan + $x->gj_kesehatan + $x->gj_disiplin + $x->gj_transport + $x->gj_lembur;
                          $potongan = $potongan+ $x->pt_terlambat + $x->pt_alpa + $x->pt_izin + $x->pt_sakit + $x->pt_sakitnsdr + $x->pt_cuti;
                        }
              $pengeluaran = $penerimaan - $potongan;
                          
                        ?>
              <h3 style="padding-bottom: 10px; color: #0169a9" class = "centered"><b>Total Gaji Bulan <?php echo indonesian_date('01-'.$bulan.'-'.$tahun, 'F'). ' ' . $tahun .' : '. "Rp " . number_format($pengeluaran,2,',','.');?></b></h3>
              
               <table class="table table-striped table-advance table-hover" id="hidden-table-info" style="color: #000000; border: 1px solid #ccc">
                <!-- <table class="table table-striped table-advance table-hover" id="hidden-table-info> -->
     <style type="text/css">
       th, td{
        text-align: center
       }
     </style>           
                <thead class="text-primary">
                  <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Penerimaan</th>
                        <th>Potongan</th>
                        <th>Total</th>
                        <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                        <?php 
                        $no =1;
                        foreach ($gaji->result() as $x) { 
                          $penerimaan = $x->gj_pokok + $x->gj_makan + $x->gj_kesehatan + $x->gj_disiplin + $x->gj_transport + $x->gj_lembur;
                          $potongan = $x->pt_terlambat + $x->pt_alpa + $x->pt_izin + $x->pt_sakit + $x->pt_sakitnsdr + $x->pt_cuti + $x->pt_half;
                        ?>
                          <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $x->kry_nama; ?></td>
                          <td><?php echo "Rp " . number_format($penerimaan,2,',','.'); ?></td>
                          <td><?php echo "Rp " . number_format($potongan,2,',','.'); ?></td>
                          <td><?php echo "Rp " . number_format($penerimaan - $potongan,2,',','.');?></td>
                          <!-- <td></td> -->
                          
                            <td style="width: 8%">
                               <a 
                               href="<?php echo site_url("c_pimpinan/detailGaji/". $x->gj_id);?>"class="btn btn-info btn-xs"><i class="fa fa-file-text"></i></a> 

                               <a href="<?php echo site_url("c_pimpinan/editGaji/". $x->gj_id);?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>

                            </td>
                          </tr>
                        <?php $no++; } ?>

                         
                          

                </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->