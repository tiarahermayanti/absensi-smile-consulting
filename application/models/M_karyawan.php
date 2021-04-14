<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_karyawan extends CI_model {

    function cek_login($table, $where){
        return $this->db->get_where($table, $where);
    }
 
   function getjumlah(){
        return $this->db->get('tb_karyawan')->num_rows();
   }

    function getBank(){
        return $this->db->get('tb_bank');
    }

    function cekKaryawan($kry_id){
         $where = array('kry_id' => $kry_id);
        return $this->db->get_where('tb_karyawan', $where);
    }

    function getKryAktif(){
         $where = array('kry_status' => 'aktif');
        return $this->db->get_where('tb_karyawan', $where);
    }


    function getKaryawan($kry_id){
    	
    	 // $where = array('kry_id' => $kry_id);
      //   return $this->db->get_where('tb_karyawan', $where);

        $this->db->select('*');
        $this->db->from('tb_karyawan');  
        $this->db->join('tb_bank','tb_bank.id_bank = tb_karyawan.id_bank');
        $this->db->where('kry_id', $kry_id);
        return $this->db->get();
    }

    function getuserby($kry_id){
        $where = array('kry_id' => $kry_id);
        return $this->db->get_where('tb_user', $where);
    }

    function getall(){
    	$this->db->select('*');
        $this->db->from('tb_karyawan');  
        $this->db->join('tb_bank','tb_bank.id_bank = tb_karyawan.id_bank');
        $this->db->where('kry_posisi !=', 'pimpinan');
        $this->db->order_by('kry_nama','asc');
        return $this->db->get();
    }

    function getbyAktif(){
        $this->db->select('*');
        $this->db->from('tb_karyawan');  
        $this->db->join('tb_bank','tb_bank.id_bank = tb_karyawan.id_bank');
        $this->db->where('kry_posisi !=', 'pimpinan');
        $this->db->where('kry_status', 'aktif');
        $this->db->order_by('kry_nama','asc');
        return $this->db->get();
    }

    function getbyNonaktif(){
        $this->db->select('*');
        $this->db->from('tb_karyawan');  
        $this->db->join('tb_bank','tb_bank.id_bank = tb_karyawan.id_bank');
        $this->db->where('kry_posisi !=', 'pimpinan');
        $this->db->where('kry_status', 'nonaktif');
        $this->db->order_by('kry_nama','asc');
        return $this->db->get();
    }

    function getnama(){
    	 $this->db->select('kry_id, kry_nama');
        $this->db->from('tb_karyawan');  
        $this->db->where('kry_posisi !=', 'pimpinan');
        return $this->db->get();
    }

    function cari($keyword) {

            $this->db->select('*');
            $this->db->from('tb_karyawan');
             $this->db->join('tb_bank','tb_bank.id_bank = tb_karyawan.id_bank');
            $this->db->like('kry_nama',$keyword);
            $this->db->or_like('kry_id',$keyword);
            $this->db->or_like('kry_status',$keyword);
            $this->db->where('kry_posisi !=', 'pimpinan');
            $this->db->order_by('kry_nama','asc');
            return $this->db->get();
    }

    function insertkry($kry_id, $kry_nik, $kry_nama, $kry_jk, $kry_posisi, $kry_email, $kry_tlp, $kry_alamat, $kry_cuti, $kry_cuti_sampai, $kry_cuti_sisa, $id_bank, $kry_rekening, $kry_an_rekening, $gj_pokok, $gj_makan, $gj_kesehatan, $gj_disiplin, $gj_transport, $kry_foto,$kry_ktp, $kry_kk, $kry_tgl, $kry_status){
        $tambah = array(
                'kry_id' => $kry_id,
                'kry_nik' => $kry_nik,
                'kry_nama' => $kry_nama,
                'kry_jk' => $kry_jk,
                'kry_posisi' => $kry_posisi,
                'kry_email' => $kry_email,
                'kry_tlp' => $kry_tlp,
                'kry_alamat' => $kry_alamat,
                'kry_cuti' => $kry_cuti,
                'kry_cuti_sampai' => $kry_cuti_sampai,
                'kry_cuti_sisa' => $kry_cuti_sisa,
                'id_bank' => $id_bank,
                'kry_rekening' => $kry_rekening,
                'kry_an_rekening' => $kry_an_rekening,
                'gj_pokok' => $gj_pokok,
                'gj_makan' => $gj_makan,
                'gj_kesehatan' => $gj_kesehatan,
                'gj_disiplin' => $gj_disiplin,
                'gj_transport' => $gj_transport,
                'kry_foto' => $kry_foto,
                'kry_ktp' => $kry_ktp,
                'kry_kk' => $kry_kk,
                'kry_tgl' => $kry_tgl,
                'kry_status' => $kry_status);
        
        $this->db->insert('tb_karyawan', $tambah);
    }

    function insertUser($kry_id, $password, $role, $kry_status){
        $tambah = array(
                'kry_id' => $kry_id,
                'password' => $password,
                'role' => $role,
                'kry_status' => $kry_status );
        
        $this->db->insert('tb_user', $tambah);
    }

    function updatekry($kry_id, $kry_nik, $kry_nama, $kry_jk, $kry_posisi, $kry_email, $kry_tlp, $kry_alamat, $kry_cuti, $kry_cuti_sampai, $kry_cuti_sisa, $id_bank, $kry_rekening, $kry_an_rekening, $gj_pokok, $gj_makan, $gj_kesehatan, $gj_disiplin, $gj_transport, $kry_foto,$kry_ktp, $kry_kk, $kry_status){
         $tambah = array(
                'kry_nik' => $kry_nik,
                'kry_nama' => $kry_nama,
                'kry_jk' => $kry_jk,
                'kry_posisi' => $kry_posisi,
                'kry_email' => $kry_email,
                'kry_tlp' => $kry_tlp,
                'kry_alamat' => $kry_alamat,
                'kry_cuti' => $kry_cuti,
                'kry_cuti_sampai' => $kry_cuti_sampai,
                'kry_cuti_sisa' => $kry_cuti_sisa,
                'id_bank' => $id_bank,
                'kry_rekening' => $kry_rekening,
                'kry_an_rekening' => $kry_an_rekening,
                'gj_pokok' => $gj_pokok,
                'gj_makan' => $gj_makan,
                'gj_kesehatan' => $gj_kesehatan,
                'gj_disiplin' => $gj_disiplin,
                'gj_transport' => $gj_transport,
                'kry_foto' => $kry_foto,
                'kry_ktp' => $kry_ktp,
                'kry_kk' => $kry_kk,
                'kry_status' => $kry_status);
        
        $this->db->where('kry_id', $kry_id);
        $this->db->update('tb_karyawan', $tambah);
    }

    function updateUser($kry_id, $password, $role, $kry_status){
        $tambah = array(
                'password' => $password,
                'role' => $role,
                'kry_status' => $kry_status );
        
        $this->db->where('kry_id', $kry_id);
        $this->db->update('tb_user', $tambah);
    }

     function statusKaryawan($kry_id, $kry_status){
        $tambah = array(
                'kry_status' => $kry_status);
        
        $this->db->where('kry_id', $kry_id);
        $this->db->update('tb_karyawan', $tambah);
    }

    function statusUser($kry_id, $kry_status){
        $tambah = array(
                'kry_status' => $kry_status);
        
        $this->db->where('kry_id', $kry_id);
        $this->db->update('tb_user', $tambah);
    }

    function hapusKaryawan($kry_id){
        $this->db->where('kry_id', $kry_id);
        $this->db->delete('tb_karyawan');
    }

    function hapusUser($kry_id){
        $this->db->where('kry_id', $kry_id);
        $this->db->delete('tb_user');
    }

     function get_sisacuti($kry_id){
         $this->db->select('kry_cuti_sisa');
        $this->db->from('tb_karyawan');
        $this->db->where('kry_id', $kry_id);
        return $this->db->get();
    }

     function update_sisacuti($kry_id, $kry_cuti_sisa){
         $tambah = array(
                'kry_cuti_sisa' => $kry_cuti_sisa);

        $this->db->where('kry_id', $kry_id);
        $this->db->update('tb_karyawan', $tambah);
    }


    
}