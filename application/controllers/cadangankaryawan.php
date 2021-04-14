<?php

class C_karyawan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

         if($this->session->userdata('status') != "login" || $this->session->userdata('role') != "karyawan"){
            redirect("c_login");
        }

        $this->load->model("m_absen");
        $this->load->model("m_izin");
        date_default_timezone_set('Asia/Jakarta');


    }
    
    function index(){
    	$kry_id = $this->session->userdata('kry_id');
		$ab_tgl = date('Y-m-d');
    	$cek = $this->m_absen->cek_masuk($kry_id, $ab_tgl);
		if ($cek->num_rows() > 0) { 
		 	foreach ($cek->result() as $key) {
		 		$ab_id = $key->ab_id;
		 		$ab_plg = $key->ab_pulang;
		 		$ab_trlmbt_msk = $key->ab_trlmbt_msk;
		 		$ab_trlmbt_plg = $key->ab_trlmbt_plg;
		 		$ab_lembur = $key->ab_lembur;
		 	}  

		 	$alasan =  $this->m_absen->cekAlasan($ab_id);
		 	foreach ($alasan->result() as $x) {
		 		$alasan_plg = $x->alasan_plg; 
		 	}

		 	if($ab_trlmbt_msk != "0" && $alasan->num_rows()==0){
		 		redirect('c_karyawan/welcome');
		 	}
		 		$ceklap = $this->m_absen->cek_laporan($ab_id);
				if ($ceklap->num_rows() > 0) {     
				 	if($ab_plg == "00:00:00"){
				 		$this->template->load('k/header','k/v_absenpulang');
				 	} else{
				 		if($ab_trlmbt_plg != "0" || $ab_lembur !="0"){
				 			if ($alasan->num_rows()==0 || $alasan_plg == null) {
				 				redirect('c_karyawan/bye');
				 			}
				 		}
				 		redirect("c_karyawan/detailAbsen/".$ab_id);
				 	}
				} else{
				 	redirect('c_karyawan/kegiatan');
				}
			 	 
		} else if($cek->num_rows() == 0){
		 	$this->template->load('k/header','k/v_absenMasuk');
		}
        
    }

    function absenMasuk(){
    	// $latlong = $this->input->post('latlong');
    	$lat = $this->input->post('getlat');
    	$long = $this->input->post('getlong');
		$image = $this->input->post('imgBase64');
		$image = str_replace('data:image/png;base64,','', $image);
		$image = base64_decode($image);
		$filename = 'image_'.time().'.png';
		file_put_contents(FCPATH.'/uploads/absen_masuk/'.$filename,$image);

		$kry_id = $this->session->userdata('kry_id');
		$ab_tgl = date('Y-m-d');
		$masuk = date('H:i:s');
		// $masuk = date('09:00:00');
		
		if($masuk < "18:00:00" && $masuk >= "09:15:00" ){
			$ab_masuk = date('H:i:s');
		}else if($masuk < "09:15:00") {
			$ab_masuk = date('09:00:00');
		}else{
			  echo '<script language="javascript">';
                 echo 'alert("Jam Kerja untuk hari ini telah usai");';
                 echo 'window.location= "'.base_url('c_karyawan').'";';
                echo '</script>';
		}

		$detik_jadwal = strtotime("09:15:00");
		$detik_masuk = strtotime($ab_masuk);
		if($ab_masuk > "09:15:00"){
			$terlambat = $detik_masuk - $detik_jadwal;
		} else{
			$terlambat = "0";
		}

		$ab_trlmbt_msk = $terlambat;
		$ab_foto_msk = $filename;
		
		$dinas_tgl = date('Y-m-d');
		$dinas_status = "masuk";
		$dinas = $this->m_absen->getdinas($kry_id, $dinas_tgl, $dinas_status);

		if($dinas->num_rows() == 0){
			$bedalat = substr($lat, 0, 6);
			$plat = substr("-0.912901", 0, 6);
			$bedalong = substr($long, 0, 7);
			$plong = substr("100.349500", 0, 7);
			// veteran -0.9361491235486279, 100.35438085995584
			// ulakrang -0.912901, 100.349500


			if($bedalat==$plat && $bedalong==$plong){
				$ab_latlong_msk = "Smile Consulting Indonesia";
				
				
			} else{
				echo '<script language="javascript">';
	                 echo 'alert("posisi tidak sesuai dengan kantor");';
	                 echo 'window.location= "'.base_url('c_karyawan').'";';
	                echo '</script>';
			}
		} else{
			foreach ($dinas->result() as $k) {
				$bedalat = substr($lat, 0, 6);
				$plat = substr($k->dinas_lat, 0, 6);
				$bedalong = substr($long, 0, 7);
				$plong = substr($k->dinas_long, 0, 7);
			
				if($bedalat==$plat && $bedalong==$plong){
					$ab_latlong_msk = $k->dinas_tempat;
				} else{
					echo '<script language="javascript">';
		            echo 'alert("posisi tidak sesuai dengan '.$k->dinas_tempat.'");';
		            echo 'window.location= "'.base_url('c_karyawan').'";';
		            echo '</script>';
				}

			}

		}
		
		$status_id = 1;
		
		if($ab_masuk < "18:00:00"){

			$cek = $this->m_absen->cek_masuk($kry_id, $ab_tgl);
			 if ($cek->num_rows() == 0) {     
				$res = $this->m_absen->absen_masuk($kry_id, $ab_tgl, $ab_masuk, $ab_trlmbt_msk, $ab_foto_msk, $ab_latlong_msk, $status_id);
	    
				redirect('c_karyawan/welcome'); 
			 }
			 redirect('c_karyawan/welcome'); 
		} else{
			  echo '<script language="javascript">';
                 echo 'alert("Jam Kerja untuk hari ini telah usai");';
                 echo 'window.location= "'.base_url('c_karyawan').'";';
                echo '</script>';
		}
		
    }


    function welcome(){
    	$kry_id = $this->session->userdata('kry_id');
		$ab_tgl = date('Y-m-d');
    	$data['masuk'] = $this->m_absen->get_masuk($kry_id, $ab_tgl);

        $this->template->load('k/header','k/v_welcome', $data);
    }

    function bye(){
    	$kry_id = $this->session->userdata('kry_id');
		$ab_tgl = date('Y-m-d');
    	$data['pulang'] = $this->m_absen->get_pulang($kry_id, $ab_tgl);

        $this->template->load('k/header','k/v_bye', $data);
    }

    function saveAlasan(){
    	$ab_id = $this->input->post('ab_id');
    	$alasan_masuk = $this->input->post('alasan_msk');
    	$alasan_plg = $this->input->post('alasan_plg');

    	$cekalasan = $this->m_absen->cekAlasan($ab_id);
    	if ($cekalasan->num_rows() == 0) {
    		$this->m_absen->alasan_masuk($ab_id,$alasan_masuk, $alasan_plg);
    	}
    	else{
    		$this->m_absen->update_alasan($ab_id, $alasan_plg);
    	}

    	redirect('c_karyawan');
    	
    }

    function tidaksavealasan(){
    	redirect('c_karyawan');
    }

    function kegiatan(){
    	$kry_id = $this->session->userdata('kry_id');
    	$dinas_tgl = date('Y-m-d');
		$dinas_status = "dinas";
		$dinas = $this->m_absen->getdinas($kry_id, $dinas_tgl, $dinas_status);

		if($dinas->num_rows() == 0){
			$this->template->load('k/header','k/v_kegiatan');
		} else{
			foreach ($dinas->result() as $k) {
				$dinas_id = $k->dinas_id;

			
				$absen = $this->m_absen->get_absen_dinas($dinas_id);
				
				if($absen->num_rows() != 0){
					foreach ($absen->result() as $key) {
						if ($key->dinas_lap == "") {
							redirect('c_karyawan/dinasKegiatan/'.$dinas_id);
						}
					}
				
				} else if($absen->num_rows() == 0){
					redirect('c_karyawan/absenDinas/'.$dinas_id);
				}  
			}

			$this->template->load('k/header','k/v_kegiatan');
		}

		
    }



    function absenDinas(){
    	$dinas_id =$this->uri->segment(3);
    	$dinas = $this->m_absen->getdinas_byid($dinas_id);
    	foreach ($dinas->result() as $k) {
    		$data['lokasi'] = $k->dinas_tempat;
    		$data['dinas_id'] = $k->dinas_id;
    	}
    	$this->template->load('k/header','k/v_absendinas', $data);
    }

    function saveAbsenDinas(){
    	$dinas_id = $this->uri->segment(3);
    	$lat = $this->input->post('getlat');
    	$long = $this->input->post('getlong');
	    $image = $this->input->post('imgBase64');
		$image = str_replace('data:image/png;base64,','', $image);
		$image = base64_decode($image);
		$filename = 'image_'.time().'.png';
		file_put_contents(FCPATH.'/uploads/absen_dinas/'.$filename,$image);

		$ab_dinas_jam = date('H:i:s');
		$ab_dinas_foto = $filename;
    	
		
		$dinas = $this->m_absen->getdinas_byid($dinas_id);

		if($dinas->num_rows() == 0){
			echo '<script language="javascript">';
	        echo 'alert("tidak diberi akses dinas luar");';
	        echo 'window.location= "'.base_url('c_karyawan').'";';
	        echo '</script>';
			
		} else{
			foreach ($dinas->result() as $k) {
				$data['tempat'] = $k->dinas_tempat;
				$bedalat = substr($lat, 0, 6);
				$plat = substr($k->dinas_lat, 0, 6);
				$bedalong = substr($long, 0, 7);
				$plong = substr($k->dinas_long, 0, 7);
       

			}
			
				if($bedalat==$plat && $bedalong==$plong){
					$cek = $this->m_absen->get_absen_dinas($dinas_id);
						 if ($cek->num_rows() == 0) {     
						 	
							$this->m_absen->insert_absen_dinas($dinas_id,$ab_dinas_jam,$ab_dinas_foto);
						 } 
					
							redirect('c_karyawan/dinasKegiatan'); 
				} else{
					echo '<script language="javascript">';
		            echo 'alert("posisi tidak sesuai dengan '.$k->dinas_tempat.'");';
		            echo 'window.location= "'.base_url('c_karyawan').'";';
		            echo '</script>';
				}

			
		}
			
    }

    function dinasKegiatan(){
    	$dinas_id =$this->uri->segment(3);
    	$dinas = $this->m_absen->getdinas_byid($dinas_id);
    	foreach ($dinas->result() as $k) {
    		$data['lokasi'] = $k->dinas_tempat;
    	}
    	$absen = $this->m_absen->get_absen_dinas($dinas_id);
    	foreach ($absen->result() as $k) {
    		$data['ab_dinas_id'] = $k->ab_dinas_id;
    	}
    	$this->template->load('k/header','k/v_dinaskegiatan', $data);
    }

    function saveDinasKegiatan(){
    	$ab_dinas_id = $this->input->post('ab_dinas_id');
    	$dinas_lap = $this->input->post('deskripsi');
    	
				// UPLOAD FOTO KEGIATAN
		    	$this->load->library('upload');
		        $nmfoto = "foto_".time(); //nama file + fungsi time
		        $config['upload_path'] = './uploads/foto_kegiatan/'; //Folder untuk menyimpan hasil upload
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		        $config['max_size'] = '5120'; //maksimum besar file 3M
		        // $config['max_width']  = '5000'; //lebar maksimum 5000 px
		        // $config['max_height']  = '5000'; //tinggi maksimu 5000 px
		        $config['file_name'] = $nmfoto; //nama yang terupload nantinya

		        $this->upload->initialize($config);
		        
		        if($_FILES['foto']['name'])
		        {
		            if ($this->upload->do_upload('foto'))
		            {
		                $gbr = $this->upload->data();
		                $dinas_ft_lap = $gbr['file_name'];
			        } else{
		            	echo '<script language="javascript">';
			            echo 'alert("Format foto tidak sesuai");';
			             echo 'window.location= "'.base_url('c_karyawan').'";';
			            echo '</script>';
		            }
		    	}else{
		    		$dinas_ft_lap = null;
		    	} 

		    	// UPLOAD DOKUMEN KEGIATAN
		        $this->load->library('upload');
		        $nmfile = "file_".time(); //nama file + fungsi time
		        $config1['upload_path'] = './uploads/dokumen_kegiatan/'; //Folder untuk menyimpan hasil upload
		        $config1['allowed_types'] = 'doc|docx|pdf|xls|xlsx'; //type yang dapat diakses bisa anda sesuaikan
		        $config1['max_size'] = '10240'; //maksimum besar file 3M
		        // $config['max_width']  = '5000'; //lebar maksimum 5000 px
		        // $config['max_height']  = '5000'; //tinggi maksimu 5000 px
		        $config1['file_name'] = $nmfile; //nama yang terupload nantinya

		        $this->upload->initialize($config1);
		        
		        if($_FILES['dokumen']['name'])
		        {
		            if ($this->upload->do_upload('dokumen'))
		            {
		                $dok = $this->upload->data();
		          
		                $dinas_dok_lap = $dok['file_name'];
		            } else{
		            	echo '<script language="javascript">';
			            echo 'alert("Format dokumen tidak sesuai");';
			             echo 'window.location= "'.base_url('c_karyawan').'";';
			            echo '</script>';
		            }
		        } else{
		        	$dinas_dok_lap = null;
		        } 

					$this->m_absen->update_dinas_kegiatan($ab_dinas_id, $dinas_lap, $dinas_ft_lap, $dinas_dok_lap);

					redirect('c_karyawan');  
    }

    function saveKegiatan(){

		$lap_deskripsi = $this->input->post('deskripsi');
    	$kry_id = $this->session->userdata('kry_id');
		$ab_tgl = date('Y-m-d');
    	$data['masuk'] = $this->m_absen->get_ab_id($kry_id, $ab_tgl);
    	foreach ($data['masuk']->result() as $key) {
    		$ab_id = $key->ab_id;
    	}

    	$ceklap = $this->m_absen->cek_laporan($ab_id);
			if ($ceklap->num_rows() == 0) {     

				// UPLOAD FOTO KEGIATAN
		    	$this->load->library('upload');
		        $nmfoto = "foto_".time(); //nama file + fungsi time
		        $config['upload_path'] = './uploads/foto_kegiatan/'; //Folder untuk menyimpan hasil upload
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		        $config['max_size'] = '5120'; //maksimum besar file 3M
		        // $config['max_width']  = '5000'; //lebar maksimum 5000 px
		        // $config['max_height']  = '5000'; //tinggi maksimu 5000 px
		        $config['file_name'] = $nmfoto; //nama yang terupload nantinya

		        $this->upload->initialize($config);
		        
		        if($_FILES['foto']['name'])
		        {
		            if ($this->upload->do_upload('foto'))
		            {
		                $gbr = $this->upload->data();
		                $lap_foto = $gbr['file_name'];
			        } else{
		            	echo '<script language="javascript">';
			            echo 'alert("Format foto tidak sesuai");';
			             echo 'window.location= "'.base_url('c_karyawan').'";';
			            echo '</script>';
		            }
		    	}else{
		    		$lap_foto = null;
		    	} 

		    	// UPLOAD DOKUMEN KEGIATAN
		        $this->load->library('upload');
		        $nmfile = "file_".time(); //nama file + fungsi time
		        $config1['upload_path'] = './uploads/dokumen_kegiatan/'; //Folder untuk menyimpan hasil upload
		        $config1['allowed_types'] = 'doc|docx|pdf|xls|xlsx'; //type yang dapat diakses bisa anda sesuaikan
		        $config1['max_size'] = '10240'; //maksimum besar file 3M
		        // $config['max_width']  = '5000'; //lebar maksimum 5000 px
		        // $config['max_height']  = '5000'; //tinggi maksimu 5000 px
		        $config1['file_name'] = $nmfile; //nama yang terupload nantinya

		        $this->upload->initialize($config1);
		        
		        if($_FILES['dokumen']['name'])
		        {
		            if ($this->upload->do_upload('dokumen'))
		            {
		                $dok = $this->upload->data();
		          
		                $lap_dokumen = $dok['file_name'];
		            } else{
		            	echo '<script language="javascript">';
			            echo 'alert("Format dokumen tidak sesuai");';
			             echo 'window.location= "'.base_url('c_karyawan').'";';
			            echo '</script>';
		            }
		        } else{
		        	$lap_dokumen = null;
		        } 

					$this->m_absen->insert_kegiatan($ab_id, $lap_deskripsi, $lap_foto, $lap_dokumen);

					redirect('c_karyawan');

			
			}	    
	}

    function absenPulang(){
    	// $latlong = $this->input->post('latlong');
    	$lat = $this->input->post('getlat');
    	$long = $this->input->post('getlong');

		$image = $this->input->post('imgBase64');
		$image = str_replace('data:image/png;base64,','', $image);
		$image = base64_decode($image);
		$filename = 'image_'.time().'.png';
		file_put_contents(FCPATH.'/uploads/absen_pulang/'.$filename,$image);

		$kry_id = $this->session->userdata('kry_id');
		$ab_tgl = date('Y-m-d');
		$pulang = date('H:i:s');
		// $pulang = "18:00:00";

		if($pulang > "09:00:00"){
			$ab_pulang = date('H:i:s');
		} else{
			echo '<script language="javascript">';
	        echo 'alert("Jam Kantor Belum mulai");';
	        echo 'window.location= "'.base_url('c_karyawan').'";';
	        echo '</script>';
		}

		$detik_jadwal = strtotime("18:00:00");
		$detik_pulang = strtotime($ab_pulang);
		if($ab_pulang > "18:15:00" && $ab_pulang < "20:00:00"){
			$ab_trlmbt_plg = $detik_pulang - $detik_jadwal;
		} else if($ab_pulang > "20:00:00"){
			$ab_lembur = $detik_pulang - strtotime("20:00:00");
		} else{
			$ab_trlmbt_plg = 0;
			$ab_lembur = 0;
		}


		$ab_ft_plg = $filename;
		

		$dinas_tgl = date('Y-m-d');
		$dinas_status = "pulang";
		$dinas = $this->m_absen->getdinas($kry_id, $dinas_tgl, $dinas_status);

		if($dinas->num_rows() == 0){
			$bedalat = substr($lat, 0, 6);
			$plat = substr("-0.912901", 0, 6);
			$bedalong = substr($long, 0, 7);
			$plong = substr("100.349500", 0, 7);
			// veteran -0.9361491235486279, 100.35438085995584
			// ulakrang -0.912901, 100.349500

			if($bedalat==$plat && $bedalong==$plong){
				$ab_latlong_plg = 'Smile Consulting Indonesia';
			} else{
				echo '<script language="javascript">';
	                 echo 'alert("posisi tidak sesuai dengan kantor");';
	                 echo 'window.location= "'.base_url('c_karyawan').'";';
	                echo '</script>';
			}
		} else{
			foreach ($dinas->result() as $k) {
				
				$bedalat = substr($lat, 0, 6);
				$plat = substr($k->dinas_lat, 0, 6);
				$bedalong = substr($long, 0, 7);
				$plong = substr($k->dinas_long, 0, 7);
			

			if($bedalat==$plat && $bedalong==$plong){
			// $ab_latlong_msk = $lat .', '. $long;
				$ab_latlong_plg = $k->dinas_tempat;
			} else{
				echo '<script language="javascript">';
	                 echo 'alert("posisi tidak sesuai dengan '.$k->dinas_tempat.'");';
	                 echo 'window.location= "'.base_url('c_karyawan').'";';
	                echo '</script>';
			}

			}

		}

		$cek = $this->m_absen->cek_masuk($kry_id, $ab_tgl);

		 if ($cek->num_rows() == 0) {     
			redirect('c_karyawan'); 

		 }else{

		 	foreach ($cek->result() as $key) {
		 		$ab_id = $key->ab_id;
		 		$msk = $key->ab_masuk;
		 		$plg = $key->ab_pulang;
		 	}

		 	$standar = 7;
		 		$detik_masuk = strtotime($msk);
				$detik_pulang = strtotime($ab_pulang);
		 		$jam = floor(($detik_pulang - $detik_masuk) / (60 * 60));
		 	if($jam < $standar){
		 		$status_id = "6";
		 	} else{
		 		$status_id = "1";
		 	}

		 	if($plg == "00:00:00" && $ab_latlong_plg!=null){

		 		$this->m_absen->absen_pulang($ab_id, $ab_pulang, $ab_trlmbt_plg, $ab_ft_plg, $ab_latlong_plg, $ab_lembur, $status_id);


		 		redirect('c_karyawan/bye');

		 	} else if($plg == "00:00:00" && $ab_latlong_plg==null){
		 		echo '<script language="javascript">';
			            echo 'alert("lokasi kosong");';
			             echo 'window.location= "'.base_url('c_karyawan').'";';
			            echo '</script>';
		 	}
		 }
    }



    function lapAbsen(){
        $this->template->load('k/header','k/v_laporanabsen');
    }

    function dataAbsen(){
    	$dari = $this->input->post('dari');
    	$sampai = $this->input->post('sampai');

    	if($dari == $sampai){
    		// $data['jangka'] = date("d F Y", strtotime($dari));
    		$data['jangka'] = indonesian_date($dari);

    		
    	}else if($sampai < $dari){
    		echo '<script language="javascript">';
			            echo 'alert("Masukan Tanggal Yang Sesuai");';
			             echo 'window.location= "'.base_url('c_karyawan/lapAbsen').'";';
			            echo '</script>';
    	}else{
    		$data['jangka'] = indonesian_date($dari) ." - ". indonesian_date($sampai);
    	}

    	$data['absen'] = $this->m_absen->get_bytgl($dari, $sampai);
    	

    	$hadir = 0;
    	$sakit = 0;
    	$izin = 0;
    	$cuti = 0;
    	$alpa = 0;
    	$cepatplg =0;
    	$tidakabsen = 0;
    	$lembur = 0;
    	$terlambat =0;
    	$half = 0;
    	foreach ($data['absen']->result() as $x) {
    		if($x->status_id == 1){
    			$hadir = $hadir + 1;
    			$terlambat = $terlambat + $x->ab_trlmbt_msk;
    		}else if($x->status_id == 3){
    			$half = $half + 1;

    		} else if($x->status_id == 3){
    			$sakit = $sakit + 1;
    		} else if ($x->status_id == 4) {
    			$izin = $izin + 1;
    		} else if($x->status_id == 5){
    			$cuti = $cuti + 1;
    		} else if ($x->status_id == 6) {
    			$alpa = $alpa + 1;
    		}

    		if($x->ab_pulang < "18:00:00" && $x->ab_pulang != "00:00:00"){
    			$cepatplg = $cepatplg + 1;
    		}

    		if($x->ab_pulang == "00:00:00"){
    			$tidakabsen = $tidakabsen + 1;
    		}

    		$lembur = $lembur + $x->ab_lembur;


    		
    	}
    	$data['hadir'] = $hadir;
    	$data['half'] = $half;
    	$data['sakit'] = $sakit;
    	$data['izin'] = $izin;
    	$data['cuti'] = $cuti;
    	$data['alpa'] = $alpa;
    	$data['cepatplg'] = $cepatplg;
    	$data['tidakabsen'] = $tidakabsen;
    	$data['lembur'] = $lembur;
    	$data['terlambat'] = $terlambat;



        $this->template->load('k/header','k/v_dataabsen',$data);

    }

    function detailAbsen(){
    	$ab_id = $this->uri->segment(3);
    	$data['detail'] = $this->m_absen->get_byid($ab_id);
    	$data['laporan'] = $this->m_absen->cek_laporan($ab_id);
    	$data['alasan'] = $this->m_absen->cekAlasan($ab_id);

    	$kry_id = $this->session->userdata('kry_id');
    	foreach ($data['detail']->result() as $key) {
    		$dinas_tgl = $key->ab_tgl;
    	}
    	$data['dinas'] = $this->m_absen->get_detail_dinas($kry_id, $dinas_tgl);
    	
        $this->template->load('k/header','k/v_detailabsen', $data);
    }

    public function downloadfile(){	
    	$nama = $this->uri->segment(3);			
    	$path = "./uploads/dokumen_kegiatan/" . $nama;
		force_download($path,NULL);
	}	

	 function izin(){
	 	$kry_id = $this->session->userdata('kry_id');
	 	$data['izin'] = $this->m_izin->karyawan_izin($kry_id);
        $this->template->load('k/header','k/v_pengajuan',$data);
    }

    function detailIzin(){
    	$izin_id = $this->uri->segment(3);
	 	$data['izin'] = $this->m_izin->get_byid($izin_id);
        $this->template->load('k/header','k/v_detailizin',$data);
    }

    function tambahIzin(){
    	$this->template->load('k/header','k/v_tambahizin');
    }

    function saveIzin(){
    	$izin_jenis = $this->input->post('jenis');
    	$izin_mulai = $this->input->post('mulai');
    	$izin_berakhir = $this->input->post('sampai');
    	$izin_ket = $this->input->post('keterangan');

    	$kry_id = $this->session->userdata('kry_id');
		$izin_tgl_pengajuan = date('Y-m-d');
		$izin_status = "menunggu";

    	
		$this->load->library('upload');
		$nmfoto = "izin_".time(); //nama file + fungsi time
		$config['upload_path'] = './uploads/izin/'; //Folder untuk menyimpan hasil upload
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = '5120'; //maksimum besar file 3M
		$config['file_name'] = $nmfoto; //nama yang terupload nantinya

		        $this->upload->initialize($config);
		        
		        if($_FILES['foto']['name'])
		        {
		            if ($this->upload->do_upload('foto'))
		            {
		                $gbr = $this->upload->data();
		                $izin_upload = $gbr['file_name'];
			        } else{
		            	echo '<script language="javascript">';
			            echo 'alert("Format foto tidak sesuai");';
			             echo 'window.location= "'.base_url('c_karyawan/tambahIzin').'";';
			            echo '</script>';
		            }
		    	} else{
		    		if($izin_jenis == "sakitskd"){
		    			echo '<script language="javascript">';
			            echo 'alert("Bila izin sakit harus menyertakan Surat Keterangan Dokter");';
			             echo 'window.location= "'.base_url('c_karyawan/tambahIzin').'";';
			            echo '</script>';
		    	
		    		} else{
		    			$izin_upload = "null";
		    		}
		    	}

		    	
		$this->m_izin-> insert($kry_id, $izin_jenis, $izin_mulai, $izin_berakhir, $izin_tgl_pengajuan, $izin_ket, $izin_upload, $izin_status);

		redirect('c_karyawan/izin');
    }


    function gaji(){
    	$this->template->load('k/header','k/v_gaji');
    }

   
    
    
}
