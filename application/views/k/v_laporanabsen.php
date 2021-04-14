 <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
       

          <!-- page start-->
          <div class="content-panel" style="padding-left: 2%; padding-right: 2%; padding-top: 50px">

             <div class="row mb" >
              <span style="padding-left: 14px; color: #000000" class="help-block">Periode Absensi</span>
               <form action="<?php echo site_url("c_karyawan/dataAbsen");?>" method="post">
                <div class="col-md-4">

                          <div class="input-group input-large" >
                            <input type="date" class="form-control" name="dari">
                            <span class="input-group-addon">s/d</span>
                            <input type="date" class="form-control" name="sampai">
                          </div>
                    </div>

                    <div class="col-md-1" style="padding-left: 3%">
                       <button style="padding-left: 10px; padding-right: 10px" class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                    </div> 
                    </form>
                
              </div>

            <div class="adv-table" style="margin-top: 70px; overflow: auto;" >
              
              <table width="100%" class="display table table-bordered" id="hidden-table-info">
               <thead  style="text-align: center;">
                 <tr style="text-align: center;">
                          <th rowspan="2">No</th>
                          <th rowspan="2">Tanggal</th>
                          <th colspan="2" align="center">Jam Kerja</th>
                          <th rowspan="2">Kehadiran</th>
                          <th rowspan="2">Keterangan</th>
                          <th rowspan="2">Aksi</th>
                        </tr>
                        <tr>
                          <th>Jam Masuk</th>
                          <th>Jam Pulang</th>
                        </tr>
                </thead>
                <tbody>
                  
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