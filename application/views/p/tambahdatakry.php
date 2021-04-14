<!-- main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row centered ">
              <h3 style="color: #000000"><b>TAMBAH DATA KARYAWAN</b></h3>
              <!-- <hr width="50%"> -->
              </div>
       <form role="form" class="form-horizontal">
        <!-- <div class="row"> -->
          <div class="col-lg-12 ">
            <div class="row content-panel">
              <div class="panel-heading">
                <ul class="nav nav-tabs nav-justified">
                  <li class="active">
                    <a data-toggle="tab" href="#pribadi">Data Pribadi</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#gaji" >Data Gaji per Bulan</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#akun">Data Pengguna Web</a>
                  </li>
                </ul>
              </div>
              <!-- /panel-heading -->
              <div class="panel-body">
                <div class="tab-content">
                  
                  <div id="pribadi" class="tab-pane active">
                    <div class="row">
                      <div class="col-md-12 col-lg-12" >
                        <!-- <h4 class="mb">Contact Information</h4> -->
                        <form role="form" class="form-horizontal">
                          <div class="col-lg-8 detailed" style="margin-top: 10px">
                            <div class="form-group">
                            <label class="col-lg-3 control-label">ID Karyawan</label>
                            <div class="col-lg-6">
                              <input type="text" name="kry_id" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Nama Lengkap</label>
                            <div class="col-lg-6">
                              <input type="text" name="kry_nama" class="form-control">
                            </div>
                          </div>
                            <div class="form-group">
                            <label class="col-lg-3 control-label">Jenis Kelamin</label>
                            <div class="col-lg-6">
                              <input type="text" name="kry_jk" id="addr1" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Posisi</label>
                            <div class="col-lg-6">
                              <input type="text" name="kry_posisi" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Email</label>
                            <div class="col-lg-6">
                              <input type="text" name="kry_email" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Telepon</label>
                            <div class="col-lg-6">
                              <input type="text" name="kry_tlp" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Alamat</label>
                            <div class="col-lg-6">
                              <textarea rows="6" cols="30" class="form-control" name="kry_alamat"></textarea>
                            </div>
                          </div>

                          

                        </div>

                        <div class="col-lg-4 detailed">
                          <label >Foto KTP</label>
                          <div class="fileupload fileupload-new" data-provides="fileupload">
                          <div class="fileupload-new thumbnail" style="width: 180px; height: 130px;">
                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                          </div>
                          <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                          <div>
                            <span class="btn btn-theme02 btn-file">
                              <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                            <input type="file" name="kry_ktp" class="default" />
                            </span>
                            <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                          </div>
                        </div>

                        <label>Foto Diri</label>
                          <div class="fileupload fileupload-new" data-provides="fileupload">
                          <div class="fileupload-new thumbnail" style="width: 180px; height: 130px;">
                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                          </div>
                          <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                          <div>
                            <span class="btn btn-theme02 btn-file">
                              <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                            <input type="file" name="kry_foto" class="default" />
                            </span>
                            <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                          </div>
                          </div>
                         <!--  <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <a data-toggle="tab" href="#gaji" >Selanjutnya</a>
                            </div>
                          </div> -->
                        </div>
                        </form>
                      </div>

                    </div>
                    <!-- /OVERVIEW -->
                  </div>
                  <!-- /tab-pane -->

                  <div id="gaji" class="tab-pane active">
                    <div class="row">

                      <div class="col-lg-12 col-lg-offset-2 detailed">
                        <!-- <h4 class="mb">Contact Information</h4> -->
                        <form role="form" class="form-horizontal">
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Nomor Rekening</label>
                            <div class="col-lg-6">
                              <input type="text" placeholder=" " id="addr1" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Gaji Pokok</label>
                            <div class="col-lg-6">
                              <input type="text" placeholder=" " id="addr1" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Tunjangan makan</label>
                            <div class="col-lg-6">
                              <input type="text" placeholder=" " id="addr2" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Tunjangan Kesehatan</label>
                            <div class="col-lg-6">
                              <input type="text" placeholder=" " id="phone" class="form-control">
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Sisa Cuti</label>
                            <div class="col-lg-6">
                              <input type="text" placeholder=" " id="email" class="form-control">
                            </div>
                          </div>
                         
                        </form>
                      </div>
                      
                      
                    </div>
                    <!-- /OVERVIEW -->
                  </div>

                  <div id="akun" class="tab-pane active">
                    <div class="row">

                      <div class="col-lg-12 detailed">
                        <!-- <h4 class="mb">Contact Information</h4> -->
                        <form role="form" class="form-horizontal">
                          <div class="form-group">
                            <label class="col-lg-3 control-label">ID Karyawan</label>
                            <div class="col-lg-6">
                               <input type="text" placeholder=" " id="cell" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Password</label>
                            <div class="col-lg-6">
                               <input type="text" placeholder=" " id="cell" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Hak Akses</label>
                            <div class="col-lg-6">
                              <input type="text" placeholder=" " id="cell" class="form-control">
                            </div>
                          </div>
                         
                        
                      </div>
                      
                      
                    </div>
                    <!-- /OVERVIEW -->
                  </div>


                </div>
                <!-- /tab-content -->
              </div>
              <!-- /panel-body -->
            </form>
            </div>
            <!-- /col-lg-12 -->
          </div>
          </form>
          <!-- /row -->
        </div>
        <!-- /container -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT 