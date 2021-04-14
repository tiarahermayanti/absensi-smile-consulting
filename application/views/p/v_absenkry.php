 <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
       

          <!-- page start-->
          <div class="content-panel" style="padding-left: 2%; padding-right: 2%; padding-top: 50px">
          <form action="<?php echo site_url("c_pimpinan/dataAbsenKaryawan");?>" method="post">

             <div class="row" >
              <span style="padding-left: 14px; color: #000000" class="help-block">Nama Karyawan</span>
                <div class="col-md-4">
                          <select class="form-control" name="kry_id" required>
                              <option value="">Pilih Nama Karyawan</option>
                               <?php  foreach ($karyawan->result() as $j ) { ?>
                              <option value="<?php echo $j->kry_id; ?>"><?php echo $j->kry_nama;?></option>
                              <?php } ?>
                            </select>
                    </div>
              </div>

              <div class="row" style="margin-top: 10px">
              <span style="padding-left: 14px; color: #000000" class="help-block">Periode Absensi</span>
                <div class="col-md-4">

                          <div class="input-group input-large" >
                            <input type="date" class="form-control" name="dari" required>
                            <span class="input-group-addon">s/d</span>
                            <input type="date" class="form-control" name="sampai" required>
                          </div>
                    </div>

                   
                
              </div>
               <div class="row mb" style="margin-top: 10px">
                <div class="col-md-4">
                       <button style="padding-left: 10px; padding-right: 10px" class="btn btn-primary" type="submit">Cari</button>
                    </div> 
                    </div> 

            </form>


            <div class="adv-table" style="margin-top: 70px; overflow: auto; vertical-align:middle;" >
       
              <table width="100%" class="display table table-bordered" id="hidden-table-info">
               <thead  style="text-align: center;">
                 <tr style="text-align: center;">
                          <th rowspan="2" style="vertical-align:middle;">No</th>
                          <th rowspan="2" style="vertical-align:middle;">Tanggal</th>
                          <th colspan="2" align="center">Jam Kerja</th>
                          <th rowspan="2" style="vertical-align:middle;">Kehadiran</th>
                          <th rowspan="2" style="vertical-align:middle;">Keterangan</th>
                          <th rowspan="2" style="vertical-align:middle;">Aksi</th>
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