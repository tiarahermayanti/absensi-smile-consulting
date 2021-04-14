<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gaji extends CI_model {

	 function deletebykry($kry_id){
         $this->db->where('kry_id', $kry_id);
        $this->db->delete('tb_gaji');
    }

    function getbyid($gj_id){
    	 $this->db->select('*');
        $this->db->from('tb_gaji');
        $this->db->join('tb_karyawan','tb_gaji.kry_id = tb_karyawan.kry_id'); 
         $this->db->where('gj_id', $gj_id);    
        return $this->db->get();
    }

    function getGaji($bulan,$tahun){
    	// $where = array('gj_bulan'=>$bulan,
    	// 				'gj_tahun'=>$tahun);
    	// return $this->db->get_where('tb_gaji', $where);

    	 $this->db->select('*');
        $this->db->from('tb_gaji');
        $this->db->join('tb_karyawan','tb_gaji.kry_id = tb_karyawan.kry_id'); 
         $this->db->where('gj_bulan', $bulan);    
        $this->db->where('gj_tahun', $tahun);    
        // $this->db->ORDER_BY('tb_gaji.gj_id', 'DESC');
        $this->db->ORDER_BY('tb_karyawan.kry_nama', 'ASC');
        return $this->db->get();
    }

    

    function insertGaji($kry_id, $gj_bulan, $gj_tahun, $gj_pokok, $gj_makan, $gj_kesehatan, $gj_disiplin, $gj_transport, $ttl_terlambat, $pt_terlambat, $ttl_half, $pt_half, $ttl_lembur, $gj_lembur, $ttl_alpa, $pt_alpa, $ttl_izin, $pt_izin, $ttl_sakit, $pt_sakit, $ttl_sakitnsdr, $pt_sakitnsdr, $ttl_cuti, $pt_cuti){
    	  $tambah = array(
                'kry_id' => $kry_id,
                'gj_bulan'=>$gj_bulan,
                'gj_tahun'=>$gj_tahun,
                'gj_pokok' => $gj_pokok,
                'gj_makan' => $gj_makan,
                'gj_kesehatan' => $gj_kesehatan,
                'gj_disiplin' => $gj_disiplin,
                'gj_transport' => $gj_transport,
                'ttl_terlambat' => $ttl_terlambat,
                'pt_terlambat' => $pt_terlambat,
                'ttl_half' => $ttl_half,
                'pt_half' => $pt_half,
                'ttl_lembur' => $ttl_lembur,
                'gj_lembur' => $gj_lembur,
                'ttl_alpa' => $ttl_alpa,
                'pt_alpa' => $pt_alpa,
                'ttl_izin' => $ttl_izin,
                'pt_izin' => $pt_izin,
                'ttl_sakit' => $ttl_sakit,
                'pt_sakit' => $pt_sakit,
                'ttl_sakitnsdr' => $ttl_sakitnsdr,
                'pt_sakitnsdr' => $pt_sakitnsdr,
                'ttl_cuti' => $ttl_cuti,
                'pt_cuti' => $pt_cuti);
        
        $this->db->insert('tb_gaji', $tambah);
    }

     function updateGaji($gj_id, $kry_id, $gj_bulan, $gj_tahun, $gj_pokok, $gj_makan, $gj_kesehatan, $gj_disiplin, $gj_transport, $ttl_terlambat, $pt_terlambat, $ttl_half, $pt_half, $ttl_lembur, $gj_lembur, $ttl_alpa, $pt_alpa, $ttl_izin, $pt_izin, $ttl_sakit, $pt_sakit, $ttl_sakitnsdr, $pt_sakitnsdr, $ttl_cuti, $pt_cuti){
    	  $tambah = array(
                'kry_id' => $kry_id,
                'gj_bulan'=>$gj_bulan,
                'gj_tahun'=>$gj_tahun,
                'gj_pokok' => $gj_pokok,
                'gj_makan' => $gj_makan,
                'gj_kesehatan' => $gj_kesehatan,
                'gj_disiplin' => $gj_disiplin,
                'gj_transport' => $gj_transport,
                'ttl_terlambat' => $ttl_terlambat,
                'pt_terlambat' => $pt_terlambat,
                'ttl_half' => $ttl_half,
                'pt_half' => $pt_half,
                'ttl_lembur' => $ttl_lembur,
                'gj_lembur' => $gj_lembur,
                'ttl_alpa' => $ttl_alpa,
                'pt_alpa' => $pt_alpa,
                'ttl_izin' => $ttl_izin,
                'pt_izin' => $pt_izin,
                'ttl_sakit' => $ttl_sakit,
                'pt_sakit' => $pt_sakit,
                'ttl_sakitnsdr' => $ttl_sakitnsdr,
                'pt_sakitnsdr' => $pt_sakitnsdr,
                'ttl_cuti' => $ttl_cuti,
                'pt_cuti' => $pt_cuti);
     
        
        $this->db->where('gj_id', $gj_id);
        $this->db->update('tb_gaji', $tambah);
    }


    function lastOfMonth($year, $month) {
		return date("Y-m-d", strtotime('-1 second', strtotime('+1 month',strtotime($month . '/01/' . $year. ' 00:00:00'))));
	}

     function getGajiKry($bulan,$tahun, $kry_id){

         $this->db->select('*');
        $this->db->from('tb_gaji');
        $this->db->join('tb_karyawan','tb_gaji.kry_id = tb_karyawan.kry_id'); 
         $this->db->where('gj_bulan', $bulan);    
        $this->db->where('gj_tahun', $tahun);
        $this->db->where('tb_gaji.kry_id', $kry_id);    
        $this->db->ORDER_BY('tb_karyawan.kry_nama', 'ASC');
        return $this->db->get();
    }
}
