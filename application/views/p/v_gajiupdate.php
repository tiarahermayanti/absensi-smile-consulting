<!-- main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row centered ">
              <h3 style="color: #008de4"><b>EDIT DATA GAJI</b></h3>
              <!-- <hr width="50%"> -->
        </div>
       <form role="form" class="form-horizontal" action="<?php echo site_url('c_pimpinan/updateGaji');?>" method="post" >

          
        <div class="row">
          <div class="col-lg-12 ">
                          
               <div class="col-lg-6 detailed" style="margin-top: 10px">
                <div class="centered">
                                <h5 style="color: #000000"><b>Penerimaan</b></h5>
                                <hr width="50%">
                          </div>
                         <input type="hidden" name="gj_id" value="<?php echo $gaji->gj_id;?>">
                         <input type="hidden" name="kry_id" value="<?php echo $gaji->kry_id; ?>">

                           <div class="form-group">
                            <label class="col-lg-4 control-label">Nama</label>
                            <div class="col-lg-6">
                              <input type="text" name="kry_nama" value="<?php echo $gaji->kry_nama;?>" class="form-control" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 control-label">Bulan</label>
                            <div class="col-lg-6">
                              <input type="text" name="gj_bulan" value="<?php echo $gaji->gj_bulan;?>" class="form-control" readonly>
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="col-lg-4 control-label">Tahun</label>
                            <div class="col-lg-6">
                              <input type="text" name="gj_tahun" value="<?php echo $gaji->gj_tahun;?>" class="form-control" readonly>
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="col-lg-4 control-label">Gaji Pokok</label>
                            <div class="col-lg-6">
                              <input type="number" name="gj_pokok" value="<?php echo $gaji->gj_pokok;?>" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 control-label">Gaji Makan</label>
                            <div class="col-lg-6">
                              <input type="number" name="gj_makan" value="<?php echo $gaji->gj_makan;?>" class="form-control">
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="col-lg-4 control-label">Gaji Kesehatan</label>
                            <div class="col-lg-6">
                              <input type="number" name="gj_kesehatan" value="<?php echo $gaji->gj_kesehatan;?>" class="form-control">
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="col-lg-4 control-label">Gaji Kedisiplinan</label>
                            <div class="col-lg-6">
                              <input type="number" name="gj_disiplin" value="<?php echo $gaji->gj_disiplin;?>" class="form-control">
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="col-lg-4 control-label">Gaji Transportasi</label>
                            <div class="col-lg-6">
                              <input type="number" name="gj_transport" value="<?php echo $gaji->gj_transport;?>" class="form-control">
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="col-lg-4 control-label">Jumlah Lembur</label>
                            <div class="col-lg-6">
                              <input type="number" name="ttl_lembur" value="<?php echo $gaji->ttl_lembur;?>" class="form-control">
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="col-lg-4 control-label">Gaji Lembur</label>
                            <div class="col-lg-6">
                              <input type="number" name="gj_lembur" value="<?php echo $gaji->gj_lembur;?>" class="form-control">
                            </div>
                          </div>
                          
                           
                </div>


                 <div class="col-lg-6 detailed centered">
                        <div class="centered">
                                <h5 style="color: #000000"><b>Potongan</b></h5>
                                <hr width="50%">
                          </div>
                          <div class="form-group">
                            <label class="col-lg-5 control-label">Jumlah Hadir 1/2 Hari</label>
                            <div class="col-lg-6">
                              <input type="number" name="ttl_half" value="<?php echo $gaji->ttl_half;?>" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-5 control-label">Total Potongan Hadir 1/2 Hari</label>
                            <div class="col-lg-6">
                              <input type="number" name="pt_half" value="<?php echo $gaji->pt_half;?>" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-5 control-label">Jumlah Terlambat</label>
                            <div class="col-lg-6">
                              <input type="number" name="ttl_terlambat" value="<?php echo $gaji->ttl_terlambat;?>" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-5 control-label">Total Potongan Terlambat</label>
                            <div class="col-lg-6">
                              <input type="number" name="pt_terlambat" value="<?php echo $gaji->pt_terlambat;?>" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-5 control-label">Jumlah Alpha</label>
                            <div class="col-lg-6">
                              <input type="number" name="ttl_alpa" value="<?php echo $gaji->ttl_alpa;?>" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-5 control-label">Total Potongan Alpha</label>
                            <div class="col-lg-6">
                              <input type="number" name="pt_alpa" value="<?php echo $gaji->pt_alpa;?>" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-5 control-label">Jumlah Izin</label>
                            <div class="col-lg-6">
                              <input type="number" name="ttl_izin" value="<?php echo $gaji->ttl_izin;?>" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-5 control-label">Total Potongan Izin</label>
                            <div class="col-lg-6">
                              <input type="number" name="pt_izin" value="<?php echo $gaji->pt_izin;?>" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-5 control-label">Jumlah Cuti</label>
                            <div class="col-lg-6">
                              <input type="number" name="ttl_cuti" value="<?php echo $gaji->ttl_cuti;?>" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-5 control-label">Total Potongan Cuti</label>
                            <div class="col-lg-6">
                              <input type="number" name="pt_cuti" value="<?php echo $gaji->pt_cuti;?>" class="form-control">
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="col-lg-5 control-label">Jumlah Sakit SD.r</label>
                            <div class="col-lg-6">
                              <input type="number" name="ttl_sakit" value="<?php echo $gaji->ttl_sakit;?>" class="form-control">
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="col-lg-5 control-label">Total Potongan Sakit SD.r</label>
                            <div class="col-lg-6">
                              <input type="number" name="pt_sakit" value="<?php echo $gaji->pt_sakit;?>" class="form-control">
                            </div>
                          </div>

                            <div class="form-group">
                            <label class="col-lg-5 control-label">Jumlah Sakit NSD.r</label>
                            <div class="col-lg-6">
                              <input type="number" name="ttl_sakitnsdr" value="<?php echo $gaji->ttl_sakitnsdr;?>" class="form-control">
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="col-lg-5 control-label">Total Potongan Sakit NSD.r</label>
                            <div class="col-lg-6">
                              <input type="number" name="pt_sakitnsdr" value="<?php echo $gaji->pt_sakitnsdr;?>" class="form-control">
                            </div>
                          </div>
        
          </div>
        </div>


                  <div class="centered mt" style="margin-top: 30px">
                             <button style="width: 50%" class="btn btn-primary" type="submit"> SIMPAN PERUBAHAN </button>
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
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
           
    $(function() {
    $(".generate").click(function() {
        $.ajax({      
                url : '<?php echo site_url("c_pimpinan/generate");?>',
                type: "GET",
                dataType: "JSON",
                success: function(d)
                { 
                    $('#pass').val(d.password);
                     
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
    });
  });


        </script>