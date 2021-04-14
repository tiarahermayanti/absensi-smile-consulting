
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

            <div class="row "style="margin-top: 50px; ">
              <div class="col-md-12" style="overflow: auto;">

              <table width="100%" style="color: #000000; border: 1px solid #ccc; " class="display table table-bordered" id="hidden-table-info">
              <thead class="text-primary">
                        <tr>
                          <th rowspan="2" style="vertical-align:middle">No</th>
                          <th rowspan="2" style="vertical-align:middle">Nama</th>
                          <th colspan="11">Rekap Absensi</th>
                        </tr>
                        <tr>
                          
                          <th>HP</th>
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