
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
          <!-- page start-->
          <div class="content-panel" style="padding-right: 2%; padding-left: 2%; color: #000;">
           
              <div class="row mb" style="padding-right: 2%; padding-left: 15px" >
                <h3 style="float: left;">Pengajuan Izin</h3>

               
              </div>
        
            <div class="row">
              <div class="col-lg-12">
                <!-- <div class="form-panel"> -->
                  <form action="<?php echo site_url('c_pimpinan/updateIzin');?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                     <div class="form-group">
                      <?php  foreach ($izin->result() as $i ) { ?>

                        <input type="hidden" name="izin_id" value="<?php echo $i->izin_id ?>">
                          <label class="control-label col-md-3">Nama Karyawan</label>
                          <div class="col-md-9 col-xs-11">
                            <select class="form-control" name="kry_id">
                              <option value="">Pilih Nama Karyawan</option>
                               <?php  foreach ($karyawan->result() as $j ) { ?>
                              <option value="<?php echo $j->kry_id; ?>" <?php if($j->kry_id == $i->kry_id){echo "selected";} ?>><?php echo $j->kry_nama;?></option>
                              <?php } ?>
                            </select>
                            
                          </div>
                        </div>

                         <div class="form-group">
                          <label class="control-label col-md-3">Tanggal Pengajuan</label>
                          <div class="col-md-9 col-xs-11">
                                <input type="date" name="izin_tgl_pengajuan" class="form-control" value="<?php echo $i->izin_tgl_pengajuan; ?>">
                          </div>
                        </div>

                      <div class="form-group">
                          <label class="control-label col-md-3">Jenis Absen</label>
                          <div class="col-md-9 col-xs-11">
                            <select class="form-control" name="jenis" id="jenis" class="jenis">
                              <option value="">Pilih Jenis Absensi</option>
                               <?php  foreach ($jenis->result() as $j ) { ?>
                              <option value="<?php echo $j->id_izin_jenis; ?>" <?php if($j->id_izin_jenis == $i->id_izin_jenis){echo "selected";}?> ><?php echo $j->nama_izin_jenis;?></option>
                              <?php } ?>
                            </select>
                            
                          </div>
                        </div>

                        <div id="sisacuti" style="display:none">
                        <?php foreach ($this->m_izin->get_sisacuti($i->kry_id)->result() as $key) { ?>
                           
                              <div class="form-group">
                              <label class="control-label col-md-3">Sisa Cuti</label>
                              <div class="col-md-9 col-xs-11">
                                <input type="text" name="sisacuti" class="form-control" value="<?php echo $key->kry_cuti_sisa?>" readonly>
                              </div>
                            </div>
                              <?php } ?>

                        </div>

                      <div class="form-group">
                          <label class="control-label col-md-3">Tanggal Absen</label>
                              <div class="col-md-9 col-xs-11">
                                <div class="input-group input-large" >
                                  <input type="date" class="form-control" name="mulai" value="<?php echo $i->izin_mulai; ?>">
                                  <span class="input-group-addon">To</span>
                                  <input type="date" class="form-control" name="sampai" value="<?php echo $i->izin_berakhir; ?>">
                                </div>
                              </div>
                           
                          </div>

                         <div class="form-group">
                          <label class="control-label col-md-3">Keterangan</label>
                          <div class="col-md-9 col-xs-11">
                                <textarea rows="6" cols="30" class="form-control" name="keterangan" placeholder="Wajib menyertakan keterangan yang menunjang pilihan dalam absensi anda"><?php echo $i->izin_ket; ?></textarea>
                          </div>
                        </div>

                      
                        <div class="form-group">
                            <label class="control-label col-md-3">Upload</label>
                            <div class="col-md-9 col-xs-11 controls">
                                 <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 150px; height: 110px;">
                                  <?php if($i->izin_upload != "null"){ ?>
                                    <img src="<?php echo base_url();?>uploads/izin/<?php echo $i->izin_upload;?>" alt="" />
                                  <?php }else{ ?>
                                     <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                                    <?php } ?>
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="width: 150px; height: 110px; line-height: 20px;"></div>
                                <div style="margin-left: 15px">
                                  <span class="btn btn-theme02 btn-file">
                                    <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                                  <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                  <input type="file" name="foto" class="default" />
                                  </span>
                                  <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                                </div>
                              </div>
                            </div>
                          </div>

                        <div class="form-group">
                          <label class="control-label col-md-3">Status Absensi</label>
                          <div class="col-md-9 col-xs-11">
                            <select class="form-control" name="status">
                              <option value="">Pilih Status Absensi</option>
                               <?php  foreach ($status->result() as $j ) { ?>
                              <option value="<?php echo $j->id_status_izin; ?>" <?php if($j->id_status_izin == $i->id_izin_status){echo "selected";}?> ><?php echo $j->nama_status_izin;?></option>
                              <?php } ?>
                            </select>
                            
                          </div>
                        </div>

                         <div class="form-group mt">
                          <label class="control-label col-md-3"></label>
                          <div class="col-md-9 col-xs-11">
                                <button style="float: right; margin-top: 20px; padding: 10px; font-size: 13px" type="submit" class="btn btn-primary btn-sm">KIRIM</button>
                          </div>
                        </div>
                        

                         <?php } ?>
                      </form>                 
                  <!-- </div> -->
             </div>
                                    
            </div>
      </div>
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->


 <script>
$(document).ready(function(){

  var jenis = $('#jenis').find(":selected").val();
         
          if (jenis == "4") {
             // alert("data :" + jenis);

                $("#sisacuti").show();
          } else{
            $("#sisacuti").hide();
          }

    $("#jenis").change(function(){
        var jenis = $('#jenis').find(":selected").val();
         
          if (jenis == "4") {
             // alert("data :" + jenis);

                $("#sisacuti").show();
          } else{
            $("#sisacuti").hide();
          }
    });
});
</script>
 