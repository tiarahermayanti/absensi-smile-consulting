
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
                        <td></td>
                      </tr>

                      <tr>
                        <td>Tunjangan Makan</td>
                        <td>:</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Tunjangan Kesehatan</td>
                        <td>:</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Kedisiplinan</td>
                        <td>:</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Transportasi</td>
                        <td>:</td>
                        <td></td>
                      </tr>
                        <tr>
                        <td>Jumlah Lembur</td>
                        <td>:</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Gaji Lembur</td>
                        <td>:</td>
                        <td></td>
                      </tr>
                    
                      <tr style="background: #7fef7f; height: 60px">
                        <td><b>Total Penerimaan</b></td>
                        <td><b>:</b></td>
                        <td><b></b></td>
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

                  <!--    <tr>
                        <td>Jumlah Hadir 1/2 Hari</td>
                        <td>:</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Total Potongan Hadir 1/2 Hari</td>
                        <td>:</td>
                        <td></td>
                      </tr>

                     <tr>
                        <td>Jumlah Terlambat</td>
                        <td>:</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Total Potongan Terlambat</td>
                        <td>:</td>
                        <td></td>
                      </tr>
                 
                     <tr>
                        <td>Jumlah Alpha</td>
                        <td>:</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Total Potongan Alpha</td>
                        <td>:</td>
                        <td></td>
                      </tr>

                     <tr>
                        <td>Jumlah Izin</td>
                        <td>:</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Total Potongan Izin</td>
                        <td>:</td>
                        <td></td>
                      </tr>

                     <tr>
                        <td>Jumlah Cuti</td>
                        <td>:</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Total Potongan Cuti</td>
                        <td>:</td>
                        <td></td>
                      </tr>
              
                     <tr>
                        <td>Jumlah Sakit S.Dr</td>
                        <td>:</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Total Potongan Sakit S.Dr</td>
                        <td>:</td>
                        <td></td>
                      </tr>
              
                     <tr>
                        <td>Jumlah Sakit NS.Dr</td>
                        <td>:</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Total Potongan Sakit NS.Dr</td>
                        <td>:</td>
                        <td></td>
                      </tr> -->

                  
                      <tr style="height: 240px">
                          <td colspan="3" style="text-align: center;"><label>Tidak ada Potongan</label></td>
                      </tr>

                  
                <tr style="background: #f0ad4e;  height: 60px">
                  <td  style="padding-top: 10px; "><b>Total Potongan</b></td>
                  <td><b>:</b></td>
                  <td><b></b></td>
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
                          <h4><b>Total Gaji Bulan</b></h4>
                          <hr style="background: #ffffff">
                        </div>
                        <div style="font-size: 20px"><b><?php echo "Rp "; ?></b></div>
                            

                      </div>
                    </div>
        </div>

        
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT