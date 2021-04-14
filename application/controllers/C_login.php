<?php

class C_login extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model("m_karyawan");
    }
    
    function index(){
        $this->load->view('login');
    }
    
     function aksi_login(){
        $id = htmlspecialchars($this->input->post('id',TRUE),ENT_QUOTES);
        $password = htmlspecialchars(md5($this->input->post('pass')),ENT_QUOTES);
        
        $where = array('kry_id' => $id,
                        'password' => $password,
                        'kry_status' => 'aktif');
        
        $cek = $this->m_karyawan->cek_login("tb_user", $where);
        
        if($cek->num_rows() == 0){
            echo '<script language="javascript">';
            echo 'alert("Email atau kata sandi salah");';
             echo 'window.location= "'.base_url('index.php/c_login').'";';
            echo '</script>';
            
        } else {
             
            $datakry = $this->m_karyawan->getKaryawan($id);
            foreach ($datakry->result() as $key) {
                $nama = $key->kry_nama;
                $foto = $key->kry_foto;
            }
            foreach ($cek->result() as $login){
            $data_session = array(
                'status' => "login",
                'kry_id' => $login->kry_id,
                'role' => $login->role,
                'nama' => $nama,
                'foto' => $foto
            );

                $this->session->set_userdata($data_session);
           
            }

            if($this->session->userdata('role') == "pimpinan"){
                redirect("c_pimpinan");
            } elseif ($this->session->userdata('role') == "karyawan") {
                redirect("c_karyawan");
            } else{
                 echo '<script language="javascript">';
                 echo 'alert("Tidak Memiliki Akses");';
                 echo 'window.location= "'.base_url('index.php/c_login').'";';
                echo '</script>';
            }
            
        }
    }
    
    function logout(){
        $this->session->sess_destroy();
        redirect("c_login");
    }
}
