<?php

class C_pimpinan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

         if($this->session->userdata('status') != "login" || $this->session->userdata('role') != "pimpinan"){
            redirect("c_login");
        }
 
        $this->load->model("m_absen");
        $this->load->model("m_izin");
        $this->load->model("m_karyawan");
        $this->load->model("m_jadwal");
        $this->load->model("m_gaji");


        date_default_timezone_set('Asia/Jakarta');
    }

    function index(){
        $data['today'] = $this->m_absen->getallbystatus()->result();
        // foreach ($data['today'] as $k) {
        //    echo $k->status_id.' jumlah = '. $k->total;
        // }
       $this->template->load('p/headerdashboard', 'p/dashboard');
        // $this->load->view('p/coba_dashboard',$data);
    }

    function infoKaryawan(){
        $keyword = $this->input->post('cari');

        if($keyword == null){
            $data['kry'] = $this->m_karyawan->getall();
        } else{
            $data['kry'] = $this->m_karyawan->cari($keyword);
        }
    	
    	$this->template->load('p/headerkry','p/v_kryinfo',$data);
    }



    function detailKaryawan(){
        $kry_id = $this->uri->segment(3);
        $data['kry'] = $this->m_karyawan->getKaryawan($kry_id);
        $data['user'] = $this->m_karyawan->getuserby($kry_id);
        
        $this->template->load('p/headerkry','p/v_krydetail', $data);
    }

    function tambahKaryawan(){
        $data['bank'] = $this->m_karyawan->getBank();
    	$this->template->load('p/headerkry','p/v_kryinsert',$data);
    }

    function generate(){
        $year = date('y');
        $urutan = $this->m_karyawan->getjumlah() + 1; 
        $id = $year . $urutan. random_string('numeric',5);
        $password = random_string('alnum',7);

        $data = array(
            'kry_id'      =>  $id,
            'password'   =>  $password
          );

        echo json_encode($data);

    }

    function saveKaryawan(){
        $kry_id = $this->input->post('kry_id');
        $kry_nik= $this->input->post('kry_nik');
        $kry_nama = $this->input->post('kry_nama');
        $kry_jk = $this->input->post('kry_jk');
        $kry_posisi = $this->input->post('kry_posisi');
        $kry_email = $this->input->post('kry_email');
        $kry_tlp = $this->input->post('kry_tlp');
        $kry_alamat = $this->input->post('kry_alamat');
        $kry_cuti = $this->input->post('kry_cuti');
        $kry_cuti_sampai= $this->input->post('kry_cuti_sampai');
        $kry_cuti_sisa = $kry_cuti;
        $id_bank= $this->input->post('id_bank');
        $kry_rekening = $this->input->post('rekening');
        $kry_an_rekening = $this->input->post('kry_an_rekening');
        $gj_pokok = $this->input->post('gj_pokok');
        $gj_makan = $this->input->post('gj_makan');
        $gj_kesehatan = $this->input->post('gj_kesehatan');
        $gj_disiplin = $this->input->post('gj_disiplin');
        $gj_transport = $this->input->post('gj_transport');
        $kry_tgl = date('Y-m-d');
        $kry_status = 'aktif';
        $password = md5($this->input->post('password'));
        $role = $this->input->post('role');


        $this->load->library('upload');
        $nmfoto1 = $kry_id . time(); //nama file + fungsi time
        $config1['upload_path'] = './uploads/foto_profile/'; //Folder untuk menyimpan hasil upload
        $config1['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config1['max_size'] = '5120'; //maksimum besar file 3M
        $config1['file_name'] = $nmfoto1; //nama yang terupload nantinya

                $this->upload->initialize($config1);
                
                if($_FILES['kry_foto']['name'])
                {
                    if ($this->upload->do_upload('kry_foto'))
                    {
                        $gbr = $this->upload->data();
                        $kry_foto = $gbr['file_name'];
                    } else{
                        echo '<script language="javascript">';
                        echo 'alert("Format foto tidak sesuai");';
                         echo 'window.location= "'.base_url('c_pimpinan/tambahKaryawan').'";';
                        echo '</script>';
                    }
                } else{
                   
                        $kry_foto = "";
                }

        $this->load->library('upload');
        $nmfoto2 = $kry_id . time(); //nama file + fungsi time
        $config2['upload_path'] = './uploads/foto_ktp/'; //Folder untuk menyimpan hasil upload
        $config2['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config2['max_size'] = '5120'; //maksimum besar file 3M
        $config2['file_name'] = $nmfoto2; //nama yang terupload nantinya

                $this->upload->initialize($config2);
                
                if($_FILES['kry_ktp']['name'])
                {
                    if ($this->upload->do_upload('kry_ktp'))
                    {
                        $gbr = $this->upload->data();
                        $kry_ktp = $gbr['file_name'];
                    } else{
                        echo '<script language="javascript">';
                        echo 'alert("Format foto tidak sesuai");';
                         echo 'window.location= "'.base_url('c_pimpinan/tambahKaryawan').'";';
                        echo '</script>';
                    }
                } else{
                   
                        $kry_ktp = "";
                }

         $this->load->library('upload');
        $nmfoto3 = $kry_id . time(); //nama file + fungsi time
        $config3['upload_path'] = './uploads/foto_kk/'; //Folder untuk menyimpan hasil upload
        $config3['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config3['max_size'] = '5120'; //maksimum besar file 3M
        $config3['file_name'] = $nmfoto3; //nama yang terupload nantinya

                $this->upload->initialize($config3);
                
                if($_FILES['kry_kk']['name'])
                {
                    if ($this->upload->do_upload('kry_kk'))
                    {
                        $gbr = $this->upload->data();
                        $kry_kk = $gbr['file_name'];
                    } else{
                        echo '<script language="javascript">';
                        echo 'alert("Format foto tidak sesuai");';
                         echo 'window.location= "'.base_url('c_pimpinan/tambahKaryawan').'";';
                        echo '</script>';
                    }
                } else{
                   
                        $kry_kk = "";
                }

        $cek = $this->m_karyawan->cekKaryawan($kry_id);
        if($cek->num_rows() == 0){
                $this->m_karyawan->insertkry($kry_id, $kry_nik, $kry_nama, $kry_jk, $kry_posisi, $kry_email, $kry_tlp, $kry_alamat, $kry_cuti, $kry_cuti_sampai, $kry_cuti_sisa, $id_bank, $kry_rekening, $kry_an_rekening, $gj_pokok, $gj_makan, $gj_kesehatan, $gj_disiplin, $gj_transport, $kry_foto,$kry_ktp, $kry_kk,$kry_tgl, $kry_status);
            $this->m_karyawan->insertUser($kry_id, $password, $role, $kry_status);

            redirect('c_pimpinan/infoKaryawan');
        } else{
            echo '<script language="javascript">';
                        echo 'alert("Id Karyawan sudah ada");';
                         echo 'window.location= "'.base_url('c_pimpinan/tambahKaryawan').'";';
                        echo '</script>';
        }
        
    }

    function editKaryawan(){
        $kry_id = $this->uri->segment(3);
        $data['kry'] = $this->m_karyawan->getKaryawan($kry_id);
        $data['user'] = $this->m_karyawan->getuserby($kry_id);
         $data['bank'] = $this->m_karyawan->getBank();
        $this->template->load('p/headerkry','p/v_kryupdate', $data);
    }

    function updateKaryawan(){
        $kry_id = $this->input->post('kry_id');
        $kry_nik= $this->input->post('kry_nik');
        $kry_nama = $this->input->post('kry_nama');
        $kry_jk = $this->input->post('kry_jk');
        $kry_posisi = $this->input->post('kry_posisi');
        $kry_email = $this->input->post('kry_email');
        $kry_tlp = $this->input->post('kry_tlp');
        $kry_alamat = $this->input->post('kry_alamat');
        $kry_cuti = $this->input->post('kry_cuti');
        $kry_cuti_sampai= $this->input->post('kry_cuti_sampai');
        $kry_cuti_sisa = $this->input->post('kry_cuti_sisa');
        $id_bank= $this->input->post('id_bank');
        $kry_rekening = $this->input->post('rekening');
        $kry_an_rekening = $this->input->post('kry_an_rekening');
        $gj_pokok = $this->input->post('gj_pokok');
        $gj_makan = $this->input->post('gj_makan');
        $gj_kesehatan = $this->input->post('gj_kesehatan');
        $gj_disiplin = $this->input->post('gj_disiplin');
        $gj_transport = $this->input->post('gj_transport');
        $kry_status = 'aktif';
        $password = md5($this->input->post('password'));
        $role = $this->input->post('role');

        $kry = $this->m_karyawan->getKaryawan($kry_id);
        foreach ($kry->result() as $key) {
            $profile = $key->kry_foto;
            $ktp = $key->kry_ktp;
            $kk = $key->kry_kk;
        }

        $this->load->library('upload');
        $nmfoto1 = $kry_id . time(); //nama file + fungsi time
        $config1['upload_path'] = './uploads/foto_profile/'; //Folder untuk menyimpan hasil upload
        $config1['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config1['max_size'] = '5120'; //maksimum besar file 3M
        $config1['file_name'] = $nmfoto1; //nama yang terupload nantinya

                $this->upload->initialize($config1);
                
                if($_FILES['kry_foto']['name'])
                {
                    if ($this->upload->do_upload('kry_foto'))
                    {
                        $gbr = $this->upload->data();
                        $kry_foto = $gbr['file_name'];
                    } else{
                        echo '<script language="javascript">';
                        echo 'alert("Format foto tidak sesuai");';
                         echo 'window.location= "'.base_url('c_pimpinan/tambahKaryawan').'";';
                        echo '</script>';
                    }
                } else{
                   
                        $kry_foto = $profile;
                }

        $this->load->library('upload');
        $nmfoto2 = $kry_id . time(); //nama file + fungsi time
        $config2['upload_path'] = './uploads/foto_ktp/'; //Folder untuk menyimpan hasil upload
        $config2['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config2['max_size'] = '5120'; //maksimum besar file 3M
        $config2['file_name'] = $nmfoto2; //nama yang terupload nantinya

                $this->upload->initialize($config2);
                
                if($_FILES['kry_ktp']['name'])
                {
                    if ($this->upload->do_upload('kry_ktp'))
                    {
                        $gbr = $this->upload->data();
                        $kry_ktp = $gbr['file_name'];
                    } else{
                        echo '<script language="javascript">';
                        echo 'alert("Format foto tidak sesuai");';
                         echo 'window.location= "'.base_url('c_pimpinan/tambahKaryawan').'";';
                        echo '</script>';
                    }
                } else{
                   
                        $kry_ktp = $ktp;
                }

         $this->load->library('upload');
        $nmfoto3 = $kry_id . time(); //nama file + fungsi time
        $config3['upload_path'] = './uploads/foto_kk/'; //Folder untuk menyimpan hasil upload
        $config3['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config3['max_size'] = '5120'; //maksimum besar file 3M
        $config3['file_name'] = $nmfoto3; //nama yang terupload nantinya

                $this->upload->initialize($config3);
                
                if($_FILES['kry_kk']['name'])
                {
                    if ($this->upload->do_upload('kry_kk'))
                    {
                        $gbr = $this->upload->data();
                        $kry_kk = $gbr['file_name'];
                    } else{
                        echo '<script language="javascript">';
                        echo 'alert("Format foto tidak sesuai");';
                         echo 'window.location= "'.base_url('c_pimpinan/tambahKaryawan').'";';
                        echo '</script>';
                    }
                } else{
                   
                        $kry_kk = $kk;
                }

        $this->m_karyawan->updatekry($kry_id, $kry_nik, $kry_nama, $kry_jk, $kry_posisi, $kry_email, $kry_tlp, $kry_alamat, $kry_cuti, $kry_cuti_sampai, $kry_cuti_sisa, $id_bank, $kry_rekening, $kry_an_rekening, $gj_pokok, $gj_makan, $gj_kesehatan, $gj_disiplin, $gj_transport, $kry_foto,$kry_ktp, $kry_kk, $kry_status);
        $this->m_karyawan->updateUser($kry_id, $password, $role, $kry_status);

        redirect('c_pimpinan/infoKaryawan');
    }

    function deleteKaryawan(){
        $kry_id = $this->input->post('kry_id');

        $dinas = $this->m_absen->getdinasid($kry_id);
        foreach ($dinas->result() as $d) {
            $dinas_id = $d->dinas_id;
            $this->m_absen->deleteabsendinas($dinas_id);
        }
        $this->m_absen->deletedinas($kry_id);

        $data = $this->m_absen->getabid($kry_id);
        foreach ($data->result() as $k) {
            $ab_id = $k->ab_id;

            $this->m_absen->deletelaporan($ab_id);
            $this->m_absen->deletealasan($ab_id);
        }
        $this->m_absen->deletebykry_id($kry_id);
        $this->m_izin->deletebykry($kry_id);
        $this->m_gaji->deletebykry($kry_id);
        $this->m_karyawan->hapusUser($kry_id);
        $this->m_karyawan->hapusKaryawan($kry_id);

        redirect('c_pimpinan/infoKaryawan');

    }

    function updateStatus(){
        $kry_id = $this->uri->segment(3);
        $kry_status = $this->uri->segment(4);

        $this->m_karyawan->statusKaryawan($kry_id, $kry_status);
        $this->m_karyawan->statusUser($kry_id, $kry_status);

        redirect('c_pimpinan/infoKaryawan');
    }


    function absenKaryawan(){
    	$data['karyawan'] = $this->m_karyawan->getnama();
        $this->template->load('p/headerabsen','p/v_absenkry', $data);
        // $this->load->view('p/headerabsen');
    }

    function dataAbsenKaryawan(){
    	$dari = $this->input->post('dari');
    	$sampai = $this->input->post('sampai');
    	$kry_id = $this->input->post('kry_id');

    	if($dari == $sampai){
    		// $data['jangka'] = date("d F Y", strtotime($dari));
    		$data['jangka'] = indonesian_date($dari);

    		
    	}else if($sampai < $dari){
    		echo '<script language="javascript">';
			            echo 'alert("Masukan Tanggal Yang Sesuai");';
			             echo 'window.location= "'.base_url('c_pimpinan/absenKaryawan').'";';
			            echo '</script>';
    	}else{
    		$data['jangka'] = indonesian_date($dari) ." - ". indonesian_date($sampai);
    	}

    	$data['karyawan'] = $this->m_karyawan->getnama();
    	$data['absen'] = $this->m_absen->get_bytgl_kry($kry_id, $dari, $sampai);
    	$kry = $this->m_karyawan->getKaryawan($kry_id);
    	foreach ($kry->result() as $k) {
    		$data['kry_nama'] = $k->kry_nama;
    	}
    	

    	$hadir = 0;
    	$half = 0;
    	$sakit = 0;
    	$sakitnsdr = 0;
    	$izin = 0;
    	$cuti = 0;
    	$alpa = 0;
    	$cepatplg =0;
    	$tidakabsen = 0;
    	$lembur = 0;
    	$ttllembur = 0;
    	$ttlterlambat =0;
    	$terlambat = 0;
    	$plglama = 0;
    	$totalplglama = 0;
    	foreach ($data['absen']->result() as $x) {
    		if($x->status_id == 1){
    			$hadir = $hadir + 1;
    			

    		}else if($x->status_id == 2){
    			$half = $half + 1;

    		} else if($x->status_id == 3){
    			$sakit = $sakit + 1;
    		} else if($x->status_id == 4){
    			$sakitnsdr = $sakitnsdr + 1;
    		} else if ($x->status_id == 5) {
    			$izin = $izin + 1;
    		} else if($x->status_id == 6){
    			$cuti = $cuti + 1;
    		} else if ($x->status_id == 7) {
    			$alpa = $alpa + 1;
    		}

    		if($x->ab_pulang < "18:00:00" && $x->ab_pulang != "00:00:00"){
    			$cepatplg = $cepatplg + 1;
    		}

    		if($x->ab_pulang == "00:00:00"){
    			$tidakabsen = $tidakabsen + 1;
    		}

    		if($x->ab_trlmbt_msk != "0" && $x->status_id == "1"){
    				$terlambat = $terlambat + 1;
    				$ttlterlambat = $ttlterlambat + $x->ab_trlmbt_msk;
    			}

    		if($x->ab_trlmbt_plg != "0"){
    			$plglama = $plglama + 1;
    			$totalplglama = $totalplglama + $x->ab_trlmbt_plg; 
    		}

    		if($x->ab_lembur != "0"){
    			$lembur = $lembur + 1;
    			$ttllembur = $ttllembur + $x->ab_lembur;
    		}
    		


    		
    	}

    	$data['hadir'] = $hadir;
    	$data['half'] = $half;
    	$data['sakit'] = $sakit;
    	$data['sakitnsdr'] = $sakitnsdr;
    	$data['izin'] = $izin;
    	$data['cuti'] = $cuti;
    	$data['alpa'] = $alpa;
    	$data['cepatplg'] = $cepatplg;
    	$data['tidakabsen'] = $tidakabsen;
    	$data['lembur'] = $lembur;
    	$data['ttllembur'] = $ttllembur;
    	$data['terlambat'] = $terlambat;
    	$data['ttlterlambat'] = $ttlterlambat;
    	$data['plglama'] = $plglama;
    	$data['totalplglama'] = $totalplglama;

        $data['dari'] = $dari;
        $data['sampai'] = $sampai;
        $data['kry_id'] = $kry_id;



        $this->template->load('p/headerabsen','p/v_dataabsenkry',$data);

    }

    function editAbsenKry(){
        $ab_id = $this->uri->segment(3);
        // $kryid = $this->uri->segment(4);
        $data['absen'] = $this->m_absen->get_byid($ab_id);
        $data['status'] = $this->m_absen->getStatusAbsen();
        $this->template->load('p/headerabsen','p/v_updateabsenkry',$data);
    }

    function updateAbsenKry(){
        $ab_id = $this->input->post('ab_id');
        $ab_tgl = $this->input->post('ab_tgl');
        $ab_masuk = $this->input->post('ab_masuk');
        $ab_pulang = $this->input->post('ab_pulang');
        $status_id = $this->input->post('status_id');

        $hari = indonesian_date(time(), 'l');
        $jadwal = $this->m_jadwal->getJam($hari);

        foreach ($jadwal->result() as $key) {
            $jammasuk = $key->jdwl_masuk;
            $jampulang = $key->jdwl_pulang;
            $jamlembur = $key->jdwl_lembur;
        }

        $detik_jammasuk = strtotime($jammasuk);
        $detik_masuk = strtotime($ab_masuk);
        if($ab_masuk > $jammasuk){
            $ab_trlmbt_msk = $detik_masuk - $detik_jammasuk;
        } else{
            $ab_trlmbt_msk = "0";
        }



        $detik_jampulang = strtotime($jampulang);
        $detik_pulang = strtotime($ab_pulang);
        if($ab_pulang > $jampulang && $ab_pulang < $jamlembur){
            $ab_trlmbt_plg = $detik_pulang - $detik_jampulang;
        } else if($ab_pulang > $jamlembur){
            $ab_lembur = $detik_pulang - strtotime($jamlembur);
        } else{
            $ab_trlmbt_plg = 0;
            $ab_lembur = 0;
        }

        $this->m_absen->updateAbsen($ab_id,$ab_tgl, $ab_masuk, $ab_trlmbt_msk, $ab_pulang, $ab_trlmbt_plg, $ab_lembur, $status_id);
        redirect('c_pimpinan/absenKaryawan');

    }

     function detailAbsen(){
        $ab_id = $this->uri->segment(3);
        $kry_id = $this->uri->segment(4);
        $data['detail'] = $this->m_absen->get_byid($ab_id);
        $data['laporan'] = $this->m_absen->cek_laporan($ab_id);
        $data['alasan'] = $this->m_absen->cekAlasan($ab_id);

        foreach ($data['detail']->result() as $key) {
            $dinas_tgl = $key->ab_tgl;
        }
        $dinas_status = 'dinas';
        $data['dinas'] = $this->m_absen->getdinas($kry_id, $dinas_tgl, $dinas_status);
        $data['absendinas'] = $this->m_absen->get_detail_dinas($kry_id, $dinas_tgl);
        
        $this->template->load('p/headerabsen','p/v_detailabsen', $data);
    }

     function laporanAll(){
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');

        $bulan = date('d-m-Y');
        if($dari == null || $sampai == null){
            // $data['absen'] = $this->m_absen->getall_now();
            // $data['jangka'] = indonesian_date($bulan);
            // $data['status'] = "now";
            $this->template->load('p/headerabsen','p/v_absenall');


        } else{

            if($dari == $sampai){
            $data['jangka'] = date("d F Y", strtotime($dari));
            $data['jangka'] = indonesian_date($dari);

            
            }else if($sampai < $dari){
            echo '<script language="javascript">';
                        echo 'alert("Masukan Tanggal Yang Sesuai");';
                         echo 'window.location= "'.base_url('c_karyawan/lapAbsen').'";';
                        echo '</script>';
            }else{
                $data['jangka'] = indonesian_date($dari) ." - ". indonesian_date($sampai);
            }
                $data['dari'] = $dari;
            $data['sampai'] = $sampai;
                 $data['absen'] = $this->m_absen->getall_bytgl($dari, $sampai);
                 $data['status'] = "jangka";

        $this->template->load('p/headerabsen','p/v_dataabsenall',$data);

        }
        
    }

    function laporanToday(){
          $bulan = date('d-m-Y');
          $data['absen'] = $this->m_absen->getall_now();               
          $data['jangka'] = indonesian_date($bulan);

        $this->template->load('p/headerabsen','p/v_dataabsentoday',$data);

    }

	function izin(){
	 	$data['izin'] = $this->m_izin->getall_izin();
	 	$data['jenis'] = $this->m_izin->getJenisIzin();
	 	$data['status'] = $this->m_izin->getStatusIzin();
	 	$data['karyawan'] = $this->m_karyawan->getnama();
        $this->template->load('p/headerizin','p/v_pengajuanizin',$data);
    }

    // function tambahIzin(){
    //     $data['jenis'] = $this->m_izin->getJenisIzin();
    //     $data['status'] = $this->m_izin->getStatusIzin();
    //     $data['karyawan'] = $this->m_karyawan->getnama();
    //     $this->template->load('p/headerizin','p/v_izininsert',$data);
    // }
    
    function saveIzin(){
    	$kry_id = $this->input->post('kry_id');
    	$izin_jenis = $this->input->post('jenis');
    	$imulai = $this->input->post('mulai');
    	$iberakhir = $this->input->post('sampai');
    	$izin_ket = $this->input->post('keterangan');
        $izin_tgl_pengajuan = date('Y-m-d');
        $izin_status = $this->input->post('status');

        $berakhir = strtotime($iberakhir);
        $mulai = strtotime($imulai);
        $hari = floor(($berakhir-$mulai) / (60 * 60 * 24));

        $cuti = $this->m_izin->get_sisacuti($kry_id)->row();      

        if($izin_jenis == "4"){
          
                 if($hari > $cuti->kry_cuti_sisa ){
                 echo '<script language="javascript">';
                        echo 'alert("Pengajuan cuti melebihi sisa jatah cuti yang tersisa :'.$cuti->kry_cuti_sisa.' ");';
                         echo 'window.location= "'.base_url('c_pimpinan/tambahIzin').'";';
                        echo '</script>';
                } else if($imulai <= date('Y-m-d')){
                    echo '<script language="javascript">';
                        echo 'alert("pengajuan cuti harus dilakukan satu hari sebelumnya ");';
                         echo 'window.location= "'.base_url('c_pimpinan/tambahIzin').'";';
                        echo '</script>';
                }else if( $hari <= $cuti->kry_cuti_sisa && $imulai > date('Y-m-d') ){
                    $izin_mulai = $imulai;
                    $izin_berakhir = $iberakhir;
                }
            
           
        } else{
            $izin_mulai = $imulai;
            $izin_berakhir = $iberakhir;
        }

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
			             echo 'window.location= "'.base_url('c_pimpinan/izin').'";';
			            echo '</script>';
		            }
		    	} else{
		    		if($izin_jenis == 1){
		    			echo '<script language="javascript">';
			            echo 'alert("Bila izin sakit harus menyertakan Surat Keterangan Dokter");';
			             echo 'window.location= "'.base_url('c_pimpinan/izin').'";';
			            echo '</script>';
		    	
		    		} else{
		    			$izin_upload = "null";
		    		}
		    	}

		    	
		$this->m_izin->insert($kry_id, $izin_jenis, $izin_mulai, $izin_berakhir, $izin_tgl_pengajuan, $izin_ket, $izin_upload, $izin_status);

		redirect('c_pimpinan/izin');
    }

    // function getIzinById($izin_id){
    //    $data= $this->m_izin->get_byid($izin_id)->row();
    //     echo json_encode($data);
    // }


    // function editIzin(){
    //     $izin_id = $this->uri->segment(3);
    //     $data['izin'] = $this->m_izin->get_byid($izin_id);
    //     $data['jenis'] = $this->m_izin->getJenisIzin();
    //     $data['status'] = $this->m_izin->getStatusIzin();
    //     $data['karyawan'] = $this->m_karyawan->getnama();

    //     $this->template->load('p/headerizin','p/v_izinupdate',$data);
    // }

    function updateIzin(){
        $izin_id = $this->input->post('izin_id');
        $kry_id = $this->input->post('kry_id');
        $izin_jenis = $this->input->post('jenis');
        $imulai = $this->input->post('mulai');
        $iberakhir = $this->input->post('sampai');
        $izin_ket = $this->input->post('keterangan');
        $izin_tgl_pengajuan = date('Y-m-d');
        $izin_status = $this->input->post('status');

        $berakhir = strtotime($iberakhir);
        $mulai = strtotime($imulai);
        $hari = floor(($berakhir-$mulai) / (60 * 60 * 24))+1;

        $cuti = $this->m_karyawan->get_sisacuti($kry_id)->row();      

        if($izin_jenis == "4"){
          
                 if($hari > $cuti->kry_cuti_sisa ){
                 echo '<script language="javascript">';
                        echo 'alert("Pengajuan cuti melebihi sisa jatah cuti yang tersisa :'.$cuti->kry_cuti_sisa.' ");';
                         echo 'window.location= "'.base_url('c_pimpinan/tambahIzin').'";';
                        echo '</script>';
                } else if($imulai <= date('Y-m-d')){
                    echo '<script language="javascript">';
                        echo 'alert("pengajuan cuti harus dilakukan satu hari sebelumnya ");';
                         echo 'window.location= "'.base_url('c_pimpinan/tambahIzin').'";';
                        echo '</script>';
                }else if( $hari <= $cuti->kry_cuti_sisa && $imulai > date('Y-m-d') ){
                    $izin_mulai = $imulai;
                    $izin_berakhir = $iberakhir;
                }
            
           
        } else{
            $izin_mulai = $imulai;
            $izin_berakhir = $iberakhir;
        }

        $izinbyid = $this->m_izin->get_byid($izin_id)->result();
        foreach ($izinbyid as $i) {
            $upload = $i->izin_upload;
        }

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
                         echo 'window.location= "'.base_url('c_pimpinan/izin').'";';
                        echo '</script>';
                    }
                } else{
                    
                        $izin_upload = $upload;
                    
                }

                
       $save = $this->m_izin->update($izin_id, $kry_id, $izin_jenis, $izin_mulai, $izin_berakhir, $izin_tgl_pengajuan, $izin_ket, $izin_upload, $izin_status);

       
            if($izin_status == "2"){

                if($izin_jenis == "1"){
                    $status_id = "3";
                } else if($izin_jenis == "2"){
                    $status_id = "4";
                } else if($izin_jenis == "3"){
                    $status_id = "5";
                } else if($izin_jenis == "4"){
                    $status_id ="6";
                    $kry_cuti_sisa = $cuti->kry_cuti_sisa - $hari;
                    $this->m_karyawan->update_sisacuti($kry_id, $kry_cuti_sisa);
                }

                $from=$izin_mulai;
                $to =$izin_berakhir;
                while (strtotime($from)<=strtotime($to)){
                    $ab_tgl = date("Y-m-d", strtotime($from));
                    $this->m_absen->insert_absen_izin($kry_id, $ab_tgl, $status_id);

                $from = mktime(0,0,0,date("m",strtotime($from)),date("d",strtotime($from))+1,date("Y",strtotime($from)));
                $from=date("Y-m-d", $from);
             }
         }

        redirect('c_pimpinan/izin');
      

        
    }

     function deleteIzin(){
         $izin_id = $this->input->post('izin_id');

         $this->m_izin->delete($izin_id);
        redirect('c_pimpinan/izin');
    }

    function konfimasiIzin(){

        $izin_id = $this->input->post('izin_id');

         $k= $this->m_izin->get_byid($izin_id)->row();
        
             $kry_id = $k->kry_id;
             $izin_mulai = $k->izin_mulai;
             $izin_berakhir = $k->izin_berakhir;
             $izin_jenis = $k->id_izin_jenis;
        
       
        $izin_status = '2';

        $berakhir = strtotime($izin_berakhir);
        $mulai = strtotime($izin_mulai);
        $hari = floor(($berakhir-$mulai) / (60 * 60 * 24))+1;

        $cuti = $this->m_karyawan->get_sisacuti($kry_id)->row();      

                
       $this->m_izin->updateStatus($izin_id, $izin_status);

                if($izin_jenis == "1"){
                    $status_id = "3";
                } else if($izin_jenis == "2"){
                    $status_id = "4";
                } else if($izin_jenis == "3"){
                    $status_id = "5";
                } else if($izin_jenis == "4"){
                    $status_id ="6";
                    $kry_cuti_sisa = $cuti->kry_cuti_sisa - $hari;
                    $this->m_karyawan->update_sisacuti($kry_id, $kry_cuti_sisa);
                }

                $from=$izin_mulai;
                $to =$izin_berakhir;
                while (strtotime($from)<=strtotime($to)){
                    $ab_tgl = date("Y-m-d", strtotime($from));
                    $this->m_absen->insert_absen_izin($kry_id, $ab_tgl, $status_id);

                $from = mktime(0,0,0,date("m",strtotime($from)),date("d",strtotime($from))+1,date("Y",strtotime($from)));
                $from=date("Y-m-d", $from);
             }
         

        redirect('c_pimpinan/izin');
      
    }

    function tolakIzin(){
        $izin_id = $this->input->post('izin_id');
        $izin_status = '3';
        $this->m_izin->updateStatus($izin_id, $izin_status);
        redirect('c_pimpinan/izin');
    }
    

   
    function jadwalKaryawan(){
         $data['jdwl'] = $this->m_jadwal->getJadwal()->result();
          $data['potongan'] = $this->m_jadwal->getPotongan()->result();
        $this->template->load('p/headerjadwal','p/v_jadwal', $data);

    }

    function getJadwalId($id){
        $data = $this->m_jadwal->getJadwalById($id)->row();
        echo json_encode($data);
    }

    function updateJadwal(){
        $jdwl_id = $this->input->post('xjdwl_id');
        $jdwl_hari = $this->input->post('xjdwl_hari');
        $jdwl_masuk = $this->input->post('xjdwl_masuk');
        $jdwl_pulang = $this->input->post('xjdwl_pulang');
        $jdwl_lembur = $this->input->post('xjdwl_lembur');
        $jdwl_status = $this->input->post('xjdwl_status');

         $this->m_jadwal->updateJadwal($jdwl_id, $jdwl_hari, $jdwl_masuk, $jdwl_pulang, $jdwl_lembur, $jdwl_status);
         redirect('c_pimpinan/jadwalKaryawan');
    }

    function updatePotongan(){
        $id_pot = $this->input->post('id_pot');
        $hadir_setengah = $this->input->post('hadir_setengah');
        $terlambat = $this->input->post('terlambat');
        $sakit_sdr = $this->input->post('sakit_sdr');
        $sakit_nsdr = $this->input->post('sakit_nsdr');
        $izin = $this->input->post('izin');
        $cuti = $this->input->post('cuti');
        $alpa = $this->input->post('alpa');
        $lembur = $this->input->post('lembur');


        $this->m_jadwal->updatePotongan($id_pot, $terlambat, $hadir_setengah, $sakit_sdr, $sakit_nsdr, $izin, $cuti, $alpa, $lembur);
        redirect('c_pimpinan/jadwalKaryawan');
    }

    function KegiatanLuar(){
        $data['kry'] = $this->m_karyawan->getnama()->result();
        $data['dinas'] = $this->m_jadwal->getDinasLuar()->result();
        $this->template->load('p/headerjadwal','p/v_dinasluar', $data);
    }


    function tambahDinas(){
         $kry_id = $this->input->post('kry_id');
         $dinas_tgl = $this->input->post('dinas_tgl');
         $dinas_tempat = $this->input->post('dinas_tempat');
         $dinas_lat = $this->input->post('dinas_lat');
         $dinas_long = $this->input->post('dinas_long');
         $dinas_status = $this->input->post('dinas_status');


         $this->m_jadwal->insertDinasLuar($kry_id, $dinas_tgl, $dinas_tempat, $dinas_lat, $dinas_long, $dinas_status);
        redirect('c_pimpinan/KegiatanLuar');
    }

    function getDinasById($dinas_id){
         $data = $this->m_jadwal->getDinasLuarById($dinas_id)->row();
         echo json_encode($data);
    }

    function updateDinas(){
         $dinas_id = $this->input->post('dinas_id');
         $kry_id = $this->input->post('kry_id');
         $dinas_tgl = $this->input->post('dinas_tgl');
         $dinas_tempat = $this->input->post('dinas_tempat');
         $dinas_lat = $this->input->post('dinas_lat');
         $dinas_long = $this->input->post('dinas_long');
         $dinas_status = $this->input->post('dinas_status');


         $this->m_jadwal->updateDinasLuar($dinas_id,$kry_id, $dinas_tgl, $dinas_tempat, $dinas_lat, $dinas_long, $dinas_status);
        redirect('c_pimpinan/KegiatanLuar');
    }

    function deleteDinas(){
         $dinas_id = $this->input->post('dinas_id');

         $this->m_jadwal->deleteDinasLuar($dinas_id);
        redirect('c_pimpinan/KegiatanLuar');
    }


     function gaji(){
         $this->template->load('p/headergaji','p/v_gaji');
        
    }
    

    function dataGaji(){
        $bt = $this->input->post('bulan');
        if($bt == null){
            $this->template->load('p/headergaji','p/v_gaji');
        }
        $bulan = date('m', strtotime($bt));
        $tahun = date('Y', strtotime($bt));
        $dari = $bt.'-01';
        $sampai = $bt.'-31';

        $now = date('Y-m');
        $tgl = date('Y-m-d');
        // $tgl = date('2021-01-31');
        $year = date('Y');
        $month = date('m');
        $nowdari = $now.'-01';
        $nowsampai = $now.'-31';
        $akhirbulan = $this->m_gaji->lastOfMonth($year, $month);

        if($bt<$now){
            $data['gaji'] = $this->m_gaji->getGaji($bulan,$tahun);
            if($data['gaji']->num_rows() != 0){
                $this->template->load('p/headergaji','p/v_datagaji', $data);
            } else{
                $kry = $this->m_karyawan->getKryAktif()->result();

                foreach ($kry as $k) {
                    $kry_tgl = $k->kry_tgl;
                    $kry_bt = date('Y-m', strtotime($kry_tgl));

                    if($kry_bt <= $bt){
                        $kry_id = $k->kry_id;
                        $gj_bulan = $bulan;
                        $gj_tahun = $tahun;
                        $gj_pokok = $k->gj_pokok;
                        $gj_makan = $k->gj_makan;
                        $gj_kesehatan = $k->gj_kesehatan;
                        $gj_disiplin = $k->gj_disiplin;
                        $gj_transport = $k->gj_transport;
                        // echo $gj_pokok .'gaji'. $kry_id.',';


                        $half = 0;
                        $sakit = 0;
                        $sakitnsdr = 0;
                        $izin = 0;
                        $cuti = 0;
                        $alpa = 0;
                        $lembur = 0;
                        $ttllembur = 0;
                        $ttlterlambat =0;
                        $terlambat = 0;

                        $absen = $this->m_absen->getabsen_bykry($kry_id, $dari, $sampai)->result();
                        foreach ($absen as $a) {
                                    if($a->status_id == 2){
                                        $half = $half + 1;
                                    } else if($a->status_id == 3){
                                        $sakit = $sakit + 1;
                                    } else if($a->status_id == 4){
                                        $sakitnsdr = $sakitnsdr + 1;
                                    } else if ($a->status_id == 5) {
                                        $izin = $izin + 1;
                                    } else if($a->status_id == 6){
                                        $cuti = $cuti + 1;
                                    } else if ($a->status_id == 7) {
                                        $alpa = $alpa + 1;
                                    }

                                    if($a->ab_trlmbt_msk != "0" && $a->status_id == "1"){
                                            $terlambat = $terlambat + 1;
                                            // $ttlterlambat = $ttlterlambat + $x->ab_trlmbt_msk;
                                        }

                                    if($a->ab_lembur != "0"){
                                        $lembur = $lembur + 1;
                                        // $ttllembur = $ttllembur + $x->ab_lembur;
                                    }

                        }

                        $pt = $this->m_jadwal->getPotongan()->row();
                        $pt_half = $half * $pt->hadir_setengah;
                        $pt_terlambat = $terlambat * $pt->terlambat;
                        $gj_lembur = $lembur * $pt->lembur;
                        $pt_alpa = $alpa * $pt->alpa;
                        $pt_izin = $izin * $pt->izin;
                        $pt_sakit = $sakit * $pt->sakit_sdr;
                        $pt_sakitnsdr = $sakitnsdr * $pt->sakit_nsdr;
                        $pt_cuti = $cuti * $pt->cuti;





                        $this->m_gaji->insertGaji($kry_id, $gj_bulan, $gj_tahun, $gj_pokok, $gj_makan, $gj_kesehatan, $gj_disiplin, $gj_transport, $terlambat, $pt_terlambat, $half, $pt_half, $lembur, $gj_lembur, $alpa, $pt_alpa, $izin, $pt_izin, $sakit, $pt_sakit, $sakitnsdr, $pt_sakitnsdr, $cuti, $pt_cuti);
                    }

                }
                $this->template->load('p/headergaji','p/v_gaji');
                
            }

        } else if( $tgl == $akhirbulan && $bt==$now){
             $data['gaji'] = $this->m_gaji->getGaji($month,$year);
            if($data['gaji']->num_rows() != 0){
                $this->template->load('p/headergaji','p/v_datagaji', $data);
            } else{
                $kry = $this->m_karyawan->getKryAktif()->result();

                foreach ($kry as $k) {
                    $kry_tgl = $k->kry_tgl;
                    $kry_bt = date('Y-m', strtotime($kry_tgl));

                    if($kry_bt <= $bt){
                        $kry_id = $k->kry_id;
                        $gj_bulan = $bulan;
                        $gj_tahun = $tahun;
                        $gj_pokok = $k->gj_pokok;
                        $gj_makan = $k->gj_makan;
                        $gj_kesehatan = $k->gj_kesehatan;
                        $gj_disiplin = $k->gj_disiplin;
                        $gj_transport = $k->gj_transport;
                        // echo $gj_pokok .'gaji'. $kry_id.',';


                        $half = 0;
                        $sakit = 0;
                        $sakitnsdr = 0;
                        $izin = 0;
                        $cuti = 0;
                        $alpa = 0;
                        $lembur = 0;
                        $ttllembur = 0;
                        $ttlterlambat =0;
                        $terlambat = 0;

                        $absen = $this->m_absen->getabsen_bykry($kry_id, $nowdari, $nowsampai)->result();
                        foreach ($absen as $a) {
                                    if($a->status_id == 2){
                                        $half = $half + 1;
                                    } else if($a->status_id == 3){
                                        $sakit = $sakit + 1;
                                    } else if($a->status_id == 4){
                                        $sakitnsdr = $sakitnsdr + 1;
                                    } else if ($a->status_id == 5) {
                                        $izin = $izin + 1;
                                    } else if($a->status_id == 6){
                                        $cuti = $cuti + 1;
                                    } else if ($a->status_id == 7) {
                                        $alpa = $alpa + 1;
                                    }

                                    if($a->ab_trlmbt_msk != "0" && $a->status_id == "1"){
                                            $terlambat = $terlambat + 1;
                                            // $ttlterlambat = $ttlterlambat + $x->ab_trlmbt_msk;
                                        }

                                    if($a->ab_lembur != "0"){
                                        $lembur = $lembur + 1;
                                        // $ttllembur = $ttllembur + $x->ab_lembur;
                                    }


                        }

                        $pt = $this->m_jadwal->getPotongan()->row();
                        $pt_half = $half * $pt->hadir_setengah;
                        $pt_terlambat = $terlambat * $pt->terlambat;
                        $gj_lembur = $lembur * $pt->lembur;
                        $pt_alpa = $alpa * $pt->alpa;
                        $pt_izin = $izin * $pt->izin;
                        $pt_sakit = $sakit * $pt->sakit_sdr;
                        $pt_sakitnsdr = $sakitnsdr * $pt->sakit_nsdr;
                        $pt_cuti = $cuti * $pt->cuti;



                        $this->m_gaji->insertGaji($kry_id, $gj_bulan, $gj_tahun, $gj_pokok, $gj_makan, $gj_kesehatan, $gj_disiplin, $gj_transport, $terlambat, $pt_terlambat, $half, $pt_half, $lembur, $gj_lembur, $alpa, $pt_alpa, $izin, $pt_izin, $sakit, $pt_sakit, $sakitnsdr, $pt_sakitnsdr, $cuti, $pt_cuti);
                    }

                }
                $this->template->load('p/headergaji','p/v_gaji');
                
            }
        }else{
            echo '<script language="javascript">';
            echo 'alert("Rekap gaji belum tersedia");';
            echo 'window.location= "'.base_url('c_pimpinan/gaji').'";';
            echo '</script>';
        }
        
    }

    function detailGaji(){
        $gj_id = $this->uri->segment(3);
        $data['gaji'] = $this->m_gaji->getbyid($gj_id)->row();
        $this->template->load('p/headergaji','p/v_detailgaji', $data);
    }

    function editGaji(){
        $gj_id = $this->uri->segment(3);
        $data['gaji'] = $this->m_gaji->getbyid($gj_id)->row();
        $this->template->load('p/headergaji','p/v_gajiupdate', $data);
    }

    function updateGaji(){
        $gj_id = $this->input->post('gj_id');
        $kry_id = $this->input->post('kry_id');
        $gj_bulan = $this->input->post('gj_bulan');
        $gj_tahun = $this->input->post('gj_tahun');
        $gj_pokok = $this->input->post('gj_pokok');
        $gj_makan = $this->input->post('gj_makan');
        $gj_kesehatan = $this->input->post('gj_kesehatan');
        $gj_disiplin = $this->input->post('gj_disiplin');
        $gj_transport = $this->input->post('gj_transport');
        $ttl_terlambat = $this->input->post('ttl_terlambat');
        $pt_terlambat = $this->input->post('pt_terlambat');
        $ttl_half = $this->input->post('ttl_half');
        $pt_half = $this->input->post('pt_half');
        $ttl_lembur = $this->input->post('ttl_lembur');
        $gj_lembur = $this->input->post('gj_lembur');
        $ttl_alpa = $this->input->post('ttl_alpa');
        $pt_alpa = $this->input->post('pt_alpa');
        $ttl_izin = $this->input->post('ttl_izin');
        $pt_izin = $this->input->post('pt_izin');
        $ttl_sakit = $this->input->post('ttl_sakit');
        $pt_sakit = $this->input->post('pt_sakit');
        $ttl_sakitnsdr = $this->input->post('ttl_sakitnsdr');
        $pt_sakitnsdr = $this->input->post('pt_sakitnsdr');
        $ttl_cuti = $this->input->post('ttl_cuti');
        $pt_cuti= $this->input->post('pt_cuti');
        $gj_bulan= $this->input->post('gj_bulan');
        $gj_tahun= $this->input->post('gj_tahun');

        $this->m_gaji->updateGaji($gj_id, $kry_id, $gj_bulan, $gj_tahun, $gj_pokok, $gj_makan, $gj_kesehatan, $gj_disiplin, $gj_transport, $ttl_terlambat, $pt_terlambat, $ttl_half, $pt_half, $ttl_lembur, $gj_lembur, $ttl_alpa, $pt_alpa, $ttl_izin, $pt_izin, $ttl_sakit, $pt_sakit, $ttl_sakitnsdr, $pt_sakitnsdr, $ttl_cuti, $pt_cuti);

        $data['gaji'] = $this->m_gaji->getGaji($gj_bulan,$gj_tahun);
        $this->template->load('p/headergaji','p/v_datagaji', $data);
    }



}
