
<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h3 style="color: #000000"><b>LAPORAN KEGIATAN<b></h3>
              <p style="margin-bottom: 30px">Silahkan anda melaporkan berbagai kegiatan yang telah anda lakukan dengan disertai bukti foto yang mendukung informasi yang anda berikan</p>
           
              <form class="form-horizontal style-form" action="<?php echo site_url("c_karyawan/saveKegiatan");?>" method="post" enctype="multipart/form-data">

                <div class="form-group">
                  <label style="color: #000000" class="col-sm-2 col-sm-2 control-label">Infromasi Kegiatan</label>
                  <div class="col-sm-10" style="margin-bottom: 20px;">
                    <textarea rows="6" cols="30" class="form-control" name="deskripsi" placeholder="Masukan kegiatan yang telah anda lakukan" required></textarea>
                  </div>
                </div>

                <div class="form-group">
                    <div class="row centered" style="margin-bottom: 15px">
                      <label style="color: #000000" class="control-label ">FOTO KEGIATAN</label>
                    </div>
                      
                    
                    <div class="row centered">
                      <div class="col-md-4">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                          <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                          </div>
                          <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                          <div>
                            <span class="btn btn-theme02 btn-file">
                              <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                            <input type="file" name="foto1" class="default" />
                            </span>
                            <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                          </div>
                        </div>
                        
                      </div>

                      <div class="col-md-4">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                          <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                          </div>
                          <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                          <div>
                            <span class="btn btn-theme02 btn-file">
                              <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                            <input type="file" name="foto2" class="default" />
                            </span>
                            <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                          </div>
                        </div>
                        
                      </div>

                      <div class="col-md-4">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                          <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                          </div>
                          <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                          <div>
                            <span class="btn btn-theme02 btn-file">
                              <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                            <input type="file" name="foto3" class="default" />
                            </span>
                            <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                          </div>
                        </div>
                        
                      </div>
                    </div>


                    <div class="row centered" style="margin-top: 5px; margin-bottom: 10px">

                      <span class="label label-info">NOTE!</span>

                      <span>
                            Format foto : gif, jpg, jpeg, png, bmp. Ukuran foto max : 5MB
                            </span>
                    </div>
                </div>

                 <div class="row centered" >
                    <div class="col-lg-offset-1 col-lg-10 col-lg-offset-1">         
                      <button style="margin-bottom: 20px; margin-top: 30px; " type="submit" class="btn btn-primary btn-lg btn-block">KIRIM</button>
                    </div>
                  </div>
                

              </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
        <!-- /row -->
      </section>
    </section>
