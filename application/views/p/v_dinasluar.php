 <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
       

          <!-- page start-->
          <div class="content-panel" style="padding-left: 2%; padding-right: 2%; padding-top: 50px">

              <div class="row" style="margin-top: 10px">
              

                    <div style="margin-right: 2%">
                      <h3 style="float: left; margin-left: 2%">Jadwal Kegiatan Luar</h3>
                       <a  href="#" data-toggle="modal" data-target="#tambah-data"><button  style=" float: right; " class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button> </a>
                    </div> 

            <div class="adv-table" style="margin-left: 2%; margin-right: 2%; margin-top: 100px; overflow: auto;" >
              
               <table class="table table-striped table-advance table-hover centered" id="hidden-table-info" style="color: #000000; border: 1px solid #ccc;">
                <!-- <table class="table table-striped table-advance table-hover" id="hidden-table-info> -->
 <style type="text/css">
  th, td{
    text-align: center;
  }
</style>               
                <thead class="text-primary">
                  <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Lokasi</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Status</th>
                        <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                          
                       <?php 
                        $no=1;
                        foreach ($dinas as $x ) {  ?>
                          
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo date("d-m-Y", strtotime($x->dinas_tgl)); ?></td>
                          <td><?php echo $x->kry_nama; ?></td>
                          <td><?php echo $x->dinas_tempat; ?></td>
                          <td><?php echo $x->dinas_lat; ?></td>
                          <td><?php echo $x->dinas_long; ?></td>
                          <td>
                            <?php if($x->dinas_status == "masuk") {
                              echo "Absen Datang";
                            } elseif ($x->dinas_status == "pulang") {
                              echo "Absen Pulang";
                            } elseif ($x->dinas_status == "dinas") {
                              echo "Absen Kegiatan";
                            }
                            ?>
                          </td>
                          <td>
                               <a href="#" onclick="update('<?php echo $x->dinas_id;?>')" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a> 

                               <a href="#" onclick="hapus('<?php echo $x->dinas_id;?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>

                            </td>

                          
                         
                          

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
     <!-- Modal Tambah -->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data" class="modal fade">

     <div class="modal-dialog">

         <div class="modal-content">
             <div class="modal-header">
                  <strong style="color: #ffffff">Tambah Data Kegiatan Luar</strong>
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button> 
             </div>

             <div class="row">
              <div class="col-lg-12">
                <div class="form-panel">
                   <form role="form" class="form-horizontal" action="<?php echo site_url('c_pimpinan/tambahDinas');?>" method="post" enctype="multipart/form-data">
                 
                                 <div class="form-group">
                                      <label class="col-lg-3 control-label">Tanggal Kegiatan</label>
                                      <div class="col-lg-9">
                                        <input type="date" name="dinas_tgl" class="form-control">
                                      </div>
                                    </div>
                                       <div class="form-group">
                                      <label class="col-lg-3 control-label">Nama Karyawan</label>
                                      <div class="col-lg-9">
                                        <select class="form-control" name="kry_id">
                                          <option value="">Pilih Karyawan</option>
                                          <?php foreach ($kry as $key): ?>
                                              <option value="<?php echo $key->kry_id ?>"><?php echo $key->kry_nama ?></option>
                                            
                                          <?php endforeach ?>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-lg-3 control-label">Lokasi</label>
                                      <div class="col-lg-9">
                                        <textarea id="dinas_tempat" rows="5" name="dinas_tempat" class="form-control"></textarea>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-lg-3 control-label">Latitude</label>
                                      <div class="col-lg-9">
                                        <input type="text" id="dinas_lat" name="dinas_lat" class="form-control">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-lg-3 control-label">Longitude</label>
                                      <div class="col-lg-9">
                                        <input type="text" id="dinas_long" name="dinas_long" class="form-control">
                                      </div>
                                    </div>
                                      <div class="form-group">
                                      <label class="col-lg-3 control-label">Status</label>
                                      <div class="col-lg-9">
                                        <select class="form-control" name="dinas_status">
                                          <option value="">Pilih Status</option>
                                          <option value="masuk">Absen Datang</option>
                                          <option value="masuk">Absen Kegiatan</option>
                                          <option value="pulang">Absen Pulang</option>
                                        </select>
                                      </div>
                                    </div>
           


                     <div class="form-group">
                          <label class="control-label col-md-3"></label>
                          <div class="col-md-9 col-xs-11">
                                <button style="float: right; margin-top: 20px;" type="submit" class="btn btn-primary btn-sm">KIRIM</button>
                          </div>
                        </div>
                       
             </form>     
         </div>
         </div>
                                    
        </div>
        </div>
      </div>
   </div>
 <!-- END Modal Tambah -->

  <!-- Modal Update -->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">

     <div class="modal-dialog">

         <div class="modal-content">
             <div class="modal-header">
                  <strong style="color: #ffffff">Edit Data Kegiatan Luar</strong>
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button> 
             </div>

             <div class="row">
              <div class="col-lg-12">
                <div class="form-panel">
                   <form role="form" class="form-horizontal" action="<?php echo site_url('c_pimpinan/updateDinas');?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="dinas_id">
                 
                                   <div class="form-group">
                                      <label class="col-lg-3 control-label">Tanggal Kegiatan</label>
                                      <div class="col-lg-9">
                                        <input type="date" name="dinas_tgl" class="form-control">
                                      </div>
                                    </div>
                                       <div class="form-group">
                                      <label class="col-lg-3 control-label">Nama Karyawan</label>
                                      <div class="col-lg-9">
                                        <select class="form-control" name="kry_id">
                                          <option value="">Pilih Karyawan</option>
                                          <?php foreach ($kry as $key): ?>
                                              <option value="<?php echo $key->kry_id ?>"><?php echo $key->kry_nama ?></option>
                                            
                                          <?php endforeach ?>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-lg-3 control-label">Lokasi</label>
                                      <div class="col-lg-9">
                                        <textarea id="dinas_tempat" rows="5" name="dinas_tempat" class="form-control"></textarea>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-lg-3 control-label">Latitude</label>
                                      <div class="col-lg-9">
                                        <input type="text" id="dinas_lat" name="dinas_lat" class="form-control">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-lg-3 control-label">Longitude</label>
                                      <div class="col-lg-9">
                                        <input type="text" id="dinas_long" name="dinas_long" class="form-control">
                                      </div>
                                    </div>
                                      <div class="form-group">
                                      <label class="col-lg-3 control-label">Status</label>
                                      <div class="col-lg-9">
                                        <select class="form-control" name="dinas_status">
                                          <option value="">Pilih Status</option>
                                          <option value="masuk">Absen Datang</option>
                                          <option value="masuk">Absen Kegiatan</option>
                                          <option value="pulang">Absen Pulang</option>
                                        </select>
                                      </div>
                                    </div>
           


                     <div class="form-group">
                          <label class="control-label col-md-3"></label>
                          <div class="col-md-9 col-xs-11">
                                <button style="float: right; margin-top: 20px;" type="submit" class="btn btn-primary btn-sm">KIRIM</button>
                          </div>
                        </div>
                       
             </form>     
         </div>
         </div>
                                    
        </div>
        </div>
      </div>
   </div>
 <!-- END Modal Update -->

<!-- Modal Delete -->
 <div  aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hapus-data" class="modal fade">

     <div class="modal-dialog">

         <div class="modal-content" style="width: 70%;  display: block; margin: auto;">
             <div class="modal-header">
                  <strong style="color: #ffffff">Hapus Data Kegiatan Luar</strong>
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button> 
             </div>

             <div class="cardhapus">
                
                <div class="card-body card-block">
                    <form action="<?php echo base_url('c_pimpinan/deleteDinas');?>" method="post" class="form-horizontal">
                        <div class="row form-group mt">
                            <label style="margin-left: 7%;" class=" form-control-label">Apakah yakin menghapus data?</label>
                            
                            <input type="hidden" id="dinas_id" name="dinas_id" class="form-control">
                        
                        </div>

                    <div class="card-footer" style="margin-right: 3%">
                        

                         <button style="float: right; margin-left: 5%;" type="button" class="btn btn-danger" data-dismiss="modal">Tidak </button>

                          <button style="float: right;" type="submit" class="btn btn-primary">Iya</button>
                                        
                    </div>

                </form>
                </div>
                                    
               </div>
        </div>
      </div>
   </div>
 <!-- END Modal Delete -->


 <script type="text/javascript">

 

  function update(id){
  var link =  "<?php echo site_url('c_pimpinan/getDinasById/"+id+"')?>" ;
 
    // Ajax Load data from ajax
    $.ajax({      
        url : link,
        type: "GET",
        dataType: "JSON",
        success: function(d)
        { 

             $('#edit-data').modal('show');
              $('[name="dinas_id"]').val(d.dinas_id);
              $('[name="kry_id"]').val(d.kry_id);
              $('[name="dinas_tgl"]').val(d.dinas_tgl);
              $('[name="dinas_tempat"]').val(d.dinas_tempat);
              $('[name="dinas_lat"]').val(d.dinas_lat);
              $('[name="dinas_long"]').val(d.dinas_long);
              $('[name="dinas_status"]').val(d.dinas_status);
             
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

 function hapus(id){

             $('#hapus-data').modal('show');
              $('[name="dinas_id"]').val(id);

}
</script>