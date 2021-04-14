 <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
<style type="text/css">
  th, td{
    text-align: center;
  }
</style>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row">
          
          <div class="col-lg-12 ">
            <div class="row content-panel">
              <div class="panel-heading">
                <ul class="nav nav-tabs nav-justified">
                  <li class="active">
                    <a data-toggle="tab" href="#overview">Jam Kerja</a>
                  </li>
                 <!--  <li>
                    <a data-toggle="tab" href="#contact" class="contact-map"></a>
                  </li> -->
                  <li>
                    <a data-toggle="tab" href="#edit">Potongan dan Lembur</a>
                  </li>
                </ul>
              </div>
              <!-- /panel-heading -->
              <div class="panel-body">
                <div class="tab-content">
                  <div id="overview" class="tab-pane active">
                    <div class="row">
                     
                      <div class="col-md-12">
                          <div  style="margin-left: 2%; margin-right: 2%">
                            <table class="table table-striped table-advance table-hover centered" >
                             
                              <thead>
                                <tr>
                                  <th style="text-align: center;">Hari</th>
                                  <th style="text-align: center;">Masuk</th>
                                  <th style="text-align: center;">Pulang</th>
                                  <th style="text-align: center;">Lembur</th>
                                  <th style="text-align: center;">Status</th>
                                  <th style="text-align: center;"></th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($jdwl as $k): ?>
                                  <tr>
                                   <td><?php echo $k->jdwl_hari; ?></td>
                                   <td><?php echo $k->jdwl_masuk;?></td>
                                   <td><?php echo $k->jdwl_pulang; ?></td>
                                   <td><?php echo $k->jdwl_lembur; ?></td>
                                   <td>
                                     <?php if($k->jdwl_status == "kerja"){ ?>
                                       <span class="label label-info label-mini">Hari Kerja</span>
                                     <?php } else if($k->jdwl_status == "libur"){ ?>
                                        <span class="label label-danger label-mini">Libur</span>
                                     <?php } ?>
                                    </td>
                                    <td>
                                      <!-- <input type="hidden" name="jdwl_id" id="jdwl_id" value="<?php echo $k->jdwl_id; ?>"> -->
                                      <a href="#" onclick="tampilalert('<?php echo $k->jdwl_id; ?>')" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                    </td>

                                  </tr>
                                <?php endforeach ?>
                                
                                
                              </tbody>
                            </table>
                          </div>
                          <!-- /content-panel -->
                        </div>
                        <!-- /col-md-12 -->
                    </div>
                    <!-- /OVERVIEW -->
                  </div>
                  <!-- /tab-pane -->
                 
                  <div id="edit" class="tab-pane" >
                    <div class="row">
                      <div class="col-lg-12 detailed">

                        <form role="form" class="form-horizontal" action="<?php echo site_url('c_pimpinan/updatePotongan');?>" method="post">
                          <?php foreach ($potongan as $k): ?>
                            <input type="hidden" name="id_pot" value="<?php echo $k->id_pot; ?>">
                             <div class="form-group">
                            <label class="col-lg-4 control-label">Terlambat</label>
                            <div class="col-lg-4">
                              <input  type="number"  name="terlambat" value="<?php echo $k->terlambat; ?>" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 control-label">Hadir 1/2 Hari</label>
                            <div class="col-lg-4">
                              <input  type="number" name="hadir_setengah" value="<?php echo $k->hadir_setengah; ?>" class="form-control">

                            </div>
                          </div>
                         
                          <div class="form-group">
                            <label class="col-lg-4 control-label">Sakit S.Dr</label>
                            <div class="col-lg-4">
                              <input  type="number"  name="sakit_sdr" value="<?php echo $k->sakit_sdr; ?>" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 control-label">sakit NS.Dr</label>
                            <div class="col-lg-4">
                              <input type="number" name="sakit_nsdr" value="<?php echo $k->sakit_nsdr; ?>" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 control-label">Izin</label>
                            <div class="col-lg-4">
                              <input type="number"  name="izin" value="<?php echo $k->izin; ?>" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 control-label">Cuti</label>
                            <div class="col-lg-4">
                              <input type="number" name="cuti" value="<?php echo $k->cuti; ?>" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 control-label">Alpha</label>
                            <div class="col-lg-4">
                              <input type="number"  name="alpa" value="<?php echo $k->alpa; ?>" class="form-control">
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="col-lg-4 control-label">Lembur</label>
                            <div class="col-lg-4">
                              <input type="number"  name="lembur" value="<?php echo $k->lembur; ?>" class="form-control">
                            </div>
                          </div>

                          <div class="mt" class="form-group" style="margin-top: 30px; ">
                             <button style="width: 50%;  display: block; margin: auto;" class="btn btn-primary" type="submit"> SIMPAN </button>
                          </div>
                          <?php endforeach ?>
                          
                        </form>
                      </div>
                    
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                </div>
                <!-- /tab-content -->
              </div>
              <!-- /panel-body -->
            </div>
            <!-- /col-lg-12 -->
          </div>
          <!-- /row -->
        </div>
        <!-- /container -->


        <!-- modal update jadwal -->
         <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">

     <div class="modal-dialog">

         <div class="modal-content">
             <div class="modal-header">
                  <strong style="color: #ffffff">Edit Jadwal Kerja</strong>
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button> 
             </div>

             <div class="row">
              <div class="col-lg-12">
                <div class="form-panel" style="color: #000">
                  <form action="<?php echo site_url('c_pimpinan/updateJadwal');?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <input type="hidden" name="xjdwl_id">
                         <div class="form-group">
                          <label class="control-label col-md-3">Hari</label>
                          <div class="col-md-9 col-xs-11">
                                <input type="text" name="xjdwl_hari" id="xjdwl_hari" class="form-control" readonly>
                          </div>
                        </div>
                         <div class="form-group">
                          <label class="control-label col-md-3">Masuk</label>
                          <div class="col-md-9 col-xs-11">
                                <input type="time" name="xjdwl_masuk" id="xjdwl_masuk" class="form-control">
                          </div>
                        </div>
                         <div class="form-group">
                          <label class="control-label col-md-3">Pulang</label>
                          <div class="col-md-9 col-xs-11">
                                <input type="time" name="xjdwl_pulang" id="xjdwl_pulang" class="form-control">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Lembur</label>
                          <div class="col-md-9 col-xs-11">
                                <input type="time" name="xjdwl_lembur" id="xjdwl_lembur" class="form-control">
                          </div>
                        </div>
                        

                        <div class="form-group">
                          <label class="control-label col-md-3">Status</label>
                          <div class="col-md-9 col-xs-11">
                            <select class="form-control" name="xjdwl_status" id="xjdwl_status" required class="form-control">
                              <option value="">Pilih Status Absensi</option>
                              <option value="kerja">Hari Kerja</option>
                              <option value="libur">Libur</option>

                               
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


      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->

 
<script type="text/javascript">

 

  function tampilalert(id){
  var link =  "<?php echo site_url('c_pimpinan/getJadwalId/"+id+"')?>" ;
 
    // Ajax Load data from ajax
    $.ajax({      
        url : link,
        type: "GET",
        dataType: "JSON",
        success: function(d)
        { 

             $('#edit-data').modal('show');
              $('[name="xjdwl_id"]').val(d.jdwl_id);
              $('[name="xjdwl_hari"]').val(d.jdwl_hari);
              $('[name="xjdwl_masuk"]').val(d.jdwl_masuk);
              $('[name="xjdwl_pulang"]').val(d.jdwl_pulang);
              $('[name="xjdwl_lembur"]').val(d.jdwl_lembur);
              $('[name="xjdwl_status"]').val(d.jdwl_status);

              // var slc = d.jdwl_status;
              // $('#xjdwl_status option[value='+slc+']').attr('selected','selected');
             
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

</script>