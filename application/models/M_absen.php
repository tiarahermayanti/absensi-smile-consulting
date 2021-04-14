<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_absen extends CI_model {

    function absen_masuk($kry_id, $ab_tgl, $ab_masuk, $ab_trlmbt_msk, $ab_foto_msk, $ab_latlong_msk, $status_id){
         $tambah = array(
                'kry_id' => $kry_id,
                'ab_tgl' => $ab_tgl,
                'ab_masuk' => $ab_masuk,
                'ab_trlmbt_msk' => $ab_trlmbt_msk,
                'ab_ft_msk' => $ab_foto_msk,
                'ab_latlong_msk' => $ab_latlong_msk,
                'status_id' => $status_id );
        
    	$this->db->insert('tb_absen', $tambah);
    }

    function alasan_masuk($ab_id, $alasan_msk, $alasan_plg){
        $tambah = array(
                'ab_id' => $ab_id,
                'alasan_msk' => $alasan_msk,
                'alasan_plg' => $alasan_plg
                );
        
        $this->db->insert('tb_alasan', $tambah);
    }

    function update_alasan($ab_id, $alasan_plg){

        $tambah = array(
            'alasan_plg' => $alasan_plg );
       
        $where = array('ab_id' => $ab_id);
        $this->db->where($where);
        $this->db->update('tb_alasan', $tambah);
    }

     function cekAlasan($ab_id){
        $where = array('ab_id' => $ab_id);
        return $this->db->get_where('tb_alasan', $where);
    }

     function cek_masuk($kry_id,$ab_tgl){

         $where = array('kry_id' => $kry_id,
                        'ab_tgl' => $ab_tgl);
         
         return $this->db->get_where('tb_absen', $where);
    }

    function get_masuk($kry_id, $ab_tgl){
         $where = array('tb_absen.kry_id' => $kry_id,
                        'ab_tgl' => $ab_tgl);

         // $this->db->select('kry_id, ab_tgl, ab_masuk, ab_trlmbt_msk, ab_ft_msk, ab_latlong_msk');
         // return $this->db->get_where('tb_absen', $where);
        $this->db->select('ab_id, ab_tgl, ab_masuk, ab_trlmbt_msk, ab_ft_msk, ab_latlong_msk, kry_nama');
        $this->db->from('tb_absen');
        $this->db->join('tb_karyawan','tb_absen.kry_id = tb_karyawan.kry_id'); 
        $this->db->where($where);     
        return $this->db->get();
    }

    function get_ab_id($kry_id, $ab_tgl){
         $where = array('kry_id' => $kry_id,
                        'ab_tgl' => $ab_tgl);
        $this->db->select('ab_id');
        $this->db->from('tb_absen');
        $this->db->where($where);     
        return $this->db->get();
    }

    function insert_kegiatan($ab_id,$lap_deskripsi, $lap_foto1, $lap_foto2, $lap_foto3){
        

         $tambah = array(
                'ab_id' => $ab_id,
                'lap_deskripsi' => $lap_deskripsi,
                'lap_foto1' => $lap_foto1,
                'lap_foto2' => $lap_foto2,
                'lap_foto3' => $lap_foto3);
        
       $this->db->insert('tb_laporan', $tambah);
    }

    function cek_laporan($ab_id){
         $where = array('ab_id' => $ab_id);
        return $this->db->get_where('tb_laporan', $where);
    }



    function absen_pulang($ab_id, $ab_pulang, $ab_trlmbt_plg, $ab_ft_plg, $ab_latlong_plg,$ab_lembur, $status_id){
         $tambah = array(
                'ab_pulang' => $ab_pulang,
                'ab_trlmbt_plg' => $ab_trlmbt_plg,
                'ab_ft_plg' => $ab_ft_plg,
                'ab_latlong_plg' => $ab_latlong_plg,
                'ab_lembur' => $ab_lembur,
                'status_id' => $status_id );

        $where = array('ab_id' => $ab_id);
        $this->db->where($where);
        $this->db->update('tb_absen', $tambah);
    }

     function get_pulang($kry_id, $ab_tgl){
         $where = array('tb_absen.kry_id' => $kry_id,
                        'ab_tgl' => $ab_tgl);

        $this->db->select('kry_nama, ab_tgl, ab_id, ab_pulang, ab_trlmbt_plg, ab_ft_plg, ab_latlong_plg, ab_lembur');
        $this->db->from('tb_absen');
        $this->db->join('tb_karyawan','tb_absen.kry_id = tb_karyawan.kry_id'); 
        $this->db->where($where);     
        return $this->db->get();
    }

    function get_bytgl_kry($kry_id, $dari, $sampai){
        
        $this->db->select('*');
        $this->db->from('tb_absen');
        $this->db->join('tb_status','tb_absen.status_id = tb_status.status_id'); 
        $this->db->where('kry_id',$kry_id);
        $this->db->where('ab_tgl >=', $dari);    
        $this->db->where('ab_tgl <=', $sampai);   
        return $this->db->get();
    }

     function getabsen_bykry($kry_id, $dari, $sampai){
        
        $this->db->select('*');
        $this->db->from('tb_absen');
        $this->db->join('tb_status','tb_absen.status_id = tb_status.status_id'); 
         $this->db->where('ab_tgl >=', $dari);    
        $this->db->where('ab_tgl <=', $sampai);   
        $this->db->where('kry_id',$kry_id);    
        return $this->db->get();
    }

    function get_bykry($kry_id){
        $now = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('tb_absen');
        $this->db->join('tb_status','tb_absen.status_id = tb_status.status_id'); 
        $this->db->where('kry_id',$kry_id);  
        $this->db->where('ab_tgl', $now);
        return $this->db->get();
    }

     function getall_bytgl($dari, $sampai){
        
        $this->db->select('*');
        $this->db->from('tb_absen');
        $this->db->join('tb_status','tb_absen.status_id = tb_status.status_id'); 
        $this->db->join('tb_karyawan', 'tb_absen.kry_id = tb_karyawan.kry_id') ;
        $this->db->where('ab_tgl >=', $dari);    
        $this->db->where('ab_tgl <=', $sampai); 
        $this->db->GROUP_BY('tb_absen.kry_id'); 
        $this->db->ORDER_BY('kry_nama', 'asc');
        return $this->db->get();
    }

     function getall_now(){
        
        $bulan = date('Y-m-d');
        // $bulan = '2020-12-29';
        $this->db->select('*');
        $this->db->from('tb_absen');
        $this->db->join('tb_status','tb_absen.status_id = tb_status.status_id');
        $this->db->join('tb_karyawan', 'tb_absen.kry_id = tb_karyawan.kry_id') ;
        $this->db->where('ab_tgl', $bulan); 
        // $this->db->GROUP_BY('tb_absen.kry_id');  
        $this->db->ORDER_BY('kry_nama', 'asc');
        return $this->db->get();
    }
 
    function getallbystatus(){
        
        $bulan = date('Y-m-d');
        // $bulan = '2020-12-29';
        $this->db->select('tb_absen.status_id');
        $this->db->select('count(*) as total');
        $this->db->from('tb_absen');
        $this->db->join('tb_status','tb_absen.status_id = tb_status.status_id');
        // $this->db->join('tb_karyawan', 'tb_absen.kry_id = tb_karyawan.kry_id') ;
        $this->db->where('ab_tgl', $bulan); 
        $this->db->GROUP_BY('tb_absen.status_id');  
        return $this->db->get();
    }

    function get_byid($ab_id){
         $this->db->select('*');
        $this->db->from('tb_absen');
        $this->db->join('tb_karyawan','tb_absen.kry_id = tb_karyawan.kry_id'); 
        $this->db->join('tb_status','tb_absen.status_id = tb_status.status_id'); 
        $this->db->where(array('tb_absen.ab_id'=> $ab_id));    
        return $this->db->get();
    }

    function getdinas($kry_id, $dinas_tgl, $dinas_status){
        $where = array('kry_id' => $kry_id,
                        'dinas_tgl' => $dinas_tgl,
                        'dinas_status'=>$dinas_status);
        return $this->db->get_where('tb_dinas', $where);
    }

    function getdinas_byid($dinas_id){
        $where = array('dinas_id' => $dinas_id);
        return $this->db->get_where('tb_dinas', $where);
    }

    function get_absen_dinas($dinas_id){
          $where = array('dinas_id' => $dinas_id);
        return $this->db->get_where('tb_absen_dinas', $where);
    }

    function insert_absen_dinas($dinas_id,$ab_dinas_jam,$ab_dinas_foto){
        

         $tambah = array(
                'dinas_id' => $dinas_id,
                'ab_dinas_jam' => $ab_dinas_jam,
                'ab_dinas_foto' => $ab_dinas_foto);
        
       $this->db->insert('tb_absen_dinas', $tambah);
    }

    function get_detail_dinas($kry_id, $dinas_tgl){
        $this->db->select('*');
        $this->db->from('tb_absen_dinas');
        $this->db->join('tb_dinas','tb_dinas.dinas_id = tb_absen_dinas.dinas_id'); 
        $this->db->where(array('tb_dinas.kry_id'=> $kry_id,
                                'tb_dinas.dinas_tgl' => $dinas_tgl,
                                'tb_dinas.dinas_status' => 'dinas'));    
        return $this->db->get();
    }

    function update_dinas_kegiatan($ab_dinas_selesai, $ab_dinas_id, $dinas_lap, $lap_foto1, $lap_foto2, $lap_foto3){
        $tambah = array(
            'ab_dinas_selesai' => $ab_dinas_selesai,
            'dinas_lap' => $dinas_lap,
            'dinas_ft1' => $lap_foto1,
            'dinas_ft2' => $lap_foto2,
            'dinas_ft3' => $lap_foto3);
       
        $where = array('ab_dinas_id' => $ab_dinas_id);
        $this->db->where($where);
        $this->db->update('tb_absen_dinas', $tambah);
    }

    function get_page_rencana($dinas_id){
        $this->db->select('ab_dinas_id, ab_dinas_jam, ab_dinas_foto, dinas_tempat, dinas_tgl');
        $this->db->from('tb_absen_dinas');
        $this->db->join('tb_dinas','tb_dinas.dinas_id = tb_absen_dinas.dinas_id'); 
        $this->db->where(array('tb_absen_dinas.dinas_id'=> $dinas_id));    
        return $this->db->get();
    }

    function update_rencana($ab_dinas_id, $dinas_rencana){

        $tambah = array(
            'dinas_rencana' => $dinas_rencana );
       
        $where = array('ab_dinas_id' => $ab_dinas_id);
        $this->db->where($where);
        $this->db->update('tb_absen_dinas', $tambah);
    }

    function insert_absen_izin($kry_id, $ab_tgl, $status_id){
          $tambah = array(
                'kry_id' => $kry_id,
                'ab_tgl' => $ab_tgl,
                'status_id' => $status_id);
        
       $this->db->insert('tb_absen', $tambah);
    }
    
    function deletebykry_id($kry_id){
        $this->db->where('kry_id', $kry_id);
        $this->db->delete('tb_absen');
    }

    function deletealasan($ab_id){
         $this->db->where('ab_id', $ab_id);
        $this->db->delete('tb_alasan');
    }

    function deletelaporan($ab_id){
         $this->db->where('ab_id', $ab_id);
        $this->db->delete('tb_laporan');
    }

    function deletedinas($kry_id){
         $this->db->where('kry_id', $kry_id);
        $this->db->delete('tb_dinas');
    }

    function deleteabsendinas($dinas_id){
        $this->db->where('dinas_id', $dinas_id);
        $this->db->delete('tb_absen_dinas');
    }

    function getabid($kry_id){
        $this->db->select('ab_id');
        $this->db->from('tb_absen');
        $this->db->where('kry_id', $kry_id);     
        return $this->db->get();
    }

    function getdinasid($kry_id){
         $this->db->select('dinas_id');
        $this->db->from('tb_dinas');
        $this->db->where('kry_id', $kry_id);     
        return $this->db->get();
    }

    function getStatusAbsen(){
       return $this->db->get('tb_status');
    }

    function updateAbsen($ab_id,$ab_tgl, $ab_masuk, $ab_trlmbt_msk, $ab_pulang, $ab_trlmbt_plg, $ab_lembur, $status_id){
         $tambah = array(
                'ab_tgl' => $ab_tgl,
                'ab_masuk' => $ab_masuk,
                'ab_trlmbt_msk' => $ab_trlmbt_msk,
                'ab_pulang' => $ab_pulang,
                'ab_trlmbt_plg' => $ab_trlmbt_plg,
                'ab_lembur' => $ab_lembur,
                'status_id' => $status_id );

        $where = array('ab_id' => $ab_id);
        $this->db->where($where);
        $this->db->update('tb_absen', $tambah);
    
    }


    
}