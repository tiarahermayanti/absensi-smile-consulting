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

            <div class="adv-table" style="margin-top: 100px; overflow: auto;" >
              
               <table class="table table-striped table-advance table-hover" id="hidden-table-info" style="color: #000000; border: 1px solid #ccc">
                <!-- <table class="table table-striped table-advance table-hover" id="hidden-table-info> -->
    <style type="text/css">
      th,td{
        text-align: center;
      }
    </style>            
                <thead class="text-primary">
                  <tr>
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Nama</th>
                        <th>Penerimaan</th>
                        <th>Potongan</th>
                        <th>Total</th>
                        <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                        
                        <!-- <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          
                            <td style="width: 8%"> -->
                              <!--  <a 
                               href="javascript:void(0);"  data-toggle="modal" data-target="#edit-data" class="btn btn-info btn-xs"><i class="fa fa-file-text"></i></a> 

                               <a href="<?php echo base_url('c_karyawan/detailIzin/');?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a> -->

                            <!-- </td> -->
                         
                          

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