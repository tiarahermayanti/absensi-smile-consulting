
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
                  <form action="<?php echo site_url('c_pimpinan/saveIzin');?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                     <div class="form-group">
                          <label class="control-label col-md-3">Nama Karyawan</label>
                          <div class="col-md-9 col-xs-11">
                            <select class="form-control" name="kry_id" id="kry_id" required>
                              <option value="">Pilih Nama Karyawan</option>
                               <?php  foreach ($karyawan->result() as $j ) { ?>
                              <option value="<?php echo $j->kry_id; ?>"><?php echo $j->kry_nama;?></option>
                              <?php } ?>
                            </select>
                            
                          </div>
                        </div>
                      <div class="form-group">
                          <label class="control-label col-md-3">Jenis Absen</label>
                          <div class="col-md-9 col-xs-11">
                            <select class="form-control" name="jenis" id="jenis" required>
                              <option value="">Pilih Jenis Absensi</option>
                               <?php  foreach ($jenis->result() as $j ) { ?>
                              <option value="<?php echo $j->id_izin_jenis; ?>"><?php echo $j->nama_izin_jenis;?></option>
                              <?php } ?>
                            </select>
                            
                          </div>
                        </div>

                          <div id="sisacuti" style="display:none">
                        <div id="perulangan"></div>
                           
                             
                         

                        </div>


                      <div class="form-group">
                          <label class="control-label col-md-3">Tanggal Absen</label>
                              <div class="col-md-9 col-xs-11">
                                <div class="input-group input-large" >
                                  <input type="date" class="form-control" name="mulai" required>
                                  <span class="input-group-addon">To</span>
                                  <input type="date" class="form-control" name="sampai" required>
                                </div>
                              </div>
                           
                          </div>


                         <div class="form-group">
                          <label class="control-label col-md-3">Keterangan</label>
                          <div class="col-md-9 col-xs-11">
                                <textarea rows="6" cols="30" class="form-control" name="keterangan" placeholder="Wajib menyertakan keterangan yang menunjang pilihan dalam absensi anda" required></textarea>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3">Upload</label>
                          <div class="col-md-9 col-xs-11 controls">
                             <div class="fileupload fileupload-new" data-provides="fileupload">
                                <span class="btn btn-theme02 btn-file">
                                  <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select file</span>
                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                <input type="file" name="foto" class="default" />
                                </span>
                                <span class="fileupload-preview" style="margin-left:5px;"></span>
                                <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>

                              </div>
                              <div class="row" style="margin-bottom: 10px; text-align: left; margin-left:5px;">
                                <span style="font-size: 10px">
                                      Format foto : gif, jpg, jpeg, png, bmp. Ukuran foto max : 3MB
                                      </span>
                              </div>
                              
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3">Status Absensi</label>
                          <div class="col-md-9 col-xs-11">
                            <select class="form-control" name="status" required>
                              <option value="">Pilih Status Absensi</option>
                               <?php  foreach ($status->result() as $j ) { ?>
                              <option value="<?php echo $j->id_status_izin; ?>"><?php echo $j->nama_status_izin;?></option>
                              <?php } ?>
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
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->


 <script>
$(document).ready(function(){

   // $("#kry_id").change(function(){
   //      var id = $('#kry_id').find(":selected").val();
   //      // alert("data :" + id);
         
   //        // $('#perulangan').append("<?php foreach ($this->m_izin->get_sisacuti("+id+")->result() as $key) { ?>");
   //        // $('#tutup').append("<?php } ?>");
   //        $('#tutup').append("hai aku cuti");

   //  });

    $("#jenis").change(function(){
        var jenis = $('#jenis').find(":selected").val();
         var id = $('#kry_id').find(":selected").val();
          if (jenis == "4") {
              $('#perulangan').append(
                "<?php foreach ($this->m_izin->get_sisacuti("+12345+")->result() as $key) { ?> " +
                 "<div class='form-group'>" +
                              "<label class='control-label col-md-3'>Sisa Cuti</label>"+
                              "<div class='col-md-9 col-xs-11'>" +
                               " <input type='text' name='sisacuti' class='form-control' value='<?php echo $key->kry_cuti_sisa?>' readonly>"+
                              "</div>"+
                            "</div>" +
              " <?php } ?>");

                $("#sisacuti").show();

          } else{
            $("#sisacuti").hide();
          }
    });
});
</script>
 