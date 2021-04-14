<!-- main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row centered ">
              <h3 style="color: #008de4"><b>TAMBAH DATA KARYAWAN</b></h3>
              <!-- <hr width="50%"> -->
        </div>
       <form role="form" class="form-horizontal" action="<?php echo site_url('c_pimpinan/saveKaryawan');?>" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-lg-12 ">
                          <div class="centered">
                                <h5 style="color: #000000"><b>Data Pribadi</b></h5>
                                <hr width="50%">
                          </div>
               <div class="col-lg-8 detailed" style="margin-top: 10px">
                         
                            <div class="form-group">
                            <label class="col-lg-3 control-label">NIK</label>
                            <div class="col-lg-6">
                              <input type="text" name="kry_nik" class="form-control">
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
                              <select class="form-control" name="kry_jk">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                              </select>
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
                              <input type="email" name="kry_email" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Telepon</label>
                            <div class="col-lg-6">
                              <input type="number" name="kry_tlp" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Alamat</label>
                            <div class="col-lg-6">
                              <textarea rows="6" cols="30" class="form-control" name="kry_alamat"></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Jatah Cuti</label>

                            <div class="col-lg-6">
                                  <input style="width: 20%;border-radius: 3px; border: 1px solid #ccc; padding: 5px; " type="number" name="kry_cuti"  >
                                    <label style="width: 30%; padding-left: 2%;">Masa Berlaku</label>
                                 <input style="width: 47%; border-radius: 3px; border: 1px solid #ccc; padding: 8px;" type="date" name="kry_cuti_sampai">
                            </div>
                          </div>

                           
                </div>

                 <div class="col-lg-4 detailed centered">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Foto Diri</label>
                            <div class="col-lg-8">
                                  <div class="centered fileupload fileupload-new" data-provides="fileupload">
                                  <div class="fileupload-new thumbnail" style="width: 150px; height: 110px;">
                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                                  </div>
                                  <div class="fileupload-preview fileupload-exists thumbnail" style="width: 150px; height: 110px; line-height: 20px;"></div>
                                  <div>
                                    <span class="btn btn-theme02 btn-file">
                                      <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                    <input type="file" name="kry_foto" class="default" />
                                    </span>
                                    <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                                  </div>
                                  </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-lg-3 control-label">Foto KTP</label>
                            <div class="col-lg-8">
                                 <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 150px; height: 110px;">
                                  <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="width: 150px; height: 110px; line-height: 20px;"></div>
                                <div>
                                  <span class="btn btn-theme02 btn-file">
                                    <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                                  <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                  <input type="file" name="kry_ktp" class="default" />
                                  </span>
                                  <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        
                         <div class="form-group">
                            <label class="col-lg-3 control-label">Foto KK</label>
                            <div class="col-lg-8">
                                 <div class="fileupload fileupload-new" data-provides="fileupload">
                                  <div class="fileupload-new thumbnail" style="width: 150px; height: 110px;">
                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                                  </div>
                                  <div class="fileupload-preview fileupload-exists thumbnail" style="width: 150px; height: 110px; line-height: 20px;"></div>
                                  <div>
                                    <span class="btn btn-theme02 btn-file">
                                      <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                    <input type="file" name="kry_kk" class="default" />
                                    </span>
                                    <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                      </div>


                     
                    </div>
                  </div>

          <div class="row">
          <div class="col-lg-12 " style="margin-top: 10px">
                       
               <div class="col-lg-8 detailed" >
                         
                           <div class="centered mt">
                                <h5 style="color: #000000"><b>Data Gaji per Bulan</b></h5>
                                <hr width="50%">
                          </div>

                            <div class="form-group">
                            <label class="col-lg-3 control-label">Bank</label>
                            <div class="col-lg-6">
                              <select class="form-control" name="id_bank">
                                <option value="">Pilih Bank</option>
                                <?php foreach ($bank->result() as $key) { ?>
                                  <option value="<?php echo $key->id_bank; ?>"><?php echo $key->nama_bank; ?></option>
                                <?php } ?>
                                
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-lg-3 control-label">Nomor Rekening</label>
                            <div class="col-lg-6">

                              <input type="number" name="rekening" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Nama Pemilik</label>
                            <div class="col-lg-6">

                              <input type="text" name="kry_an_rekening" class="form-control">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-lg-3 control-label">Gaji Pokok</label>
                            <div class="col-lg-6">
                              <input type="number" name="gj_pokok" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Tunjangan Makan</label>
                            <div class="col-lg-6">
                              <input type="number" name="gj_makan" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Tunjangan Kesehatan</label>
                            <div class="col-lg-6">
                              <input type="number" name="gj_kesehatan" class="form-control">
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="col-lg-3 control-label">Kedisiplinan</label>
                            <div class="col-lg-6">
                              <input type="number" name="gj_disiplin" class="form-control">
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="col-lg-3 control-label">Transportasi</label>
                            <div class="col-lg-6">
                              <input type="number" name="gj_transport" class="form-control">
                            </div>
                          </div>
                          
                          
                </div>

<style type="text/css">
  #mybutton {
            position: relative;
            z-index: 1;
            left: 85%;
            top: -25px;
      cursor: pointer;
         }
</style>
                 <div class="col-lg-4 detailed">
                         

                          <div class="centered mt">
                                <h5 style="color: #000000"><b>Data Login Pengguna</b></h5>
                                <hr width="50%">
                          </div>

                          <div class="form-group">
                            <div class="col-lg-12">
                               <span id="generate" onclick="isi_otomatis()" style="display: block;margin: auto; " class="btn btn-warning">Dapatkan ID & Password</span>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-lg-4 control-label">ID Karyawan</label>
                            <div class="col-lg-6">
                               <input id="kry_id" type="text" name="kry_id" class="form-control" required readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 control-label">Password</label>
                            <div class="col-lg-6">
                               <input type="password" id="pass" name="password" class="form-control"  required readonly>
                               <span id="mybutton" onclick="change()"><i class="glyphicon glyphicon-eye-open"></i></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 control-label">Hak Akses</label>
                            <div class="col-lg-6">
                              <select class="form-control" name="role" required="">
                                <option value="">Pilih Hak Akses</option>
                                <option value="piminan">Pimpinan</option>
                                <option value="karyawan">Karyawan</option>
                              </select>
                            </div>
                          </div>

                          
                  </div>
                        
          </div>

        </div>
     <!-- ROW -->
     <div class="centered mt" style="margin-top: 30px">
                             <button style="width: 50%" class="btn btn-primary" type="submit"> SIMPAN </button>
                          </div>
   </form>
           
      </section>
      <!-- /wrapper -->
    </section>

 <script type="text/javascript">
            $(document).ready(function(){

                // Format mata uang.
                $( '.uang' ).mask('000.000.000', {reverse: true});

            })
        </script>

  <script type="text/javascript">

     function isi_otomatis(){
                $.ajax({      
                url : '<?php echo site_url("c_pimpinan/generate");?>',
                type: "GET",
                dataType: "JSON",
                success: function(d)
                { 

                    $('#kry_id').val(d.kry_id);
                    $('#pass').val(d.password);
                     
         
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
      }

   
    function change()
         {
            var x = document.getElementById('pass').type;

            if (x == 'password')
            {
               document.getElementById('pass').type = 'text';
               document.getElementById('mybutton').innerHTML = '<i class="glyphicon glyphicon-eye-close"></i>';
            }
            else
            {
               document.getElementById('pass').type = 'password';
               document.getElementById('mybutton').innerHTML = '<i class="glyphicon glyphicon-eye-open"></i>';
            }
         }
  </script>

 
