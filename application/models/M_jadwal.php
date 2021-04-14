<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jadwal extends CI_model {

	
    function getJadwal(){
       return $this->db->get('tb_jadwal');
    }

   function getJadwalById($jdwl_id){
    $this->db->where('jdwl_id', $jdwl_id);
       return $this->db->get('tb_jadwal');
    }
    function getJam($hari){
        $this->db->where('jdwl_hari', $hari);
        return $this->db->get('tb_jadwal');
    }
 
       function getPotongan(){
        $this->db->where('id_pot', '1');
       return $this->db->get('tb_potongan_bonus');
    }


     function updatePotongan($id_pot, $terlambat, $hadir_setengah, $sakit_sdr, $sakit_nsdr,$izin, $cuti, $alpa, $lembur){
        $tambah = array(
                'terlambat' => $terlambat,
                'hadir_setengah' => $hadir_setengah,
                'sakit_sdr' => $sakit_sdr,
                'sakit_nsdr' => $sakit_nsdr,
                'izin' => $izin,
                'cuti' => $cuti,
                'alpa' => $alpa,
                'lembur' => $lembur );
        
        $this->db->where('id_pot', $id_pot);
        $this->db->update('tb_potongan_bonus', $tambah);
    }

     function updateJadwal($jdwl_id, $jdwl_hari, $jdwl_masuk, $jdwl_pulang, $jdwl_lembur, $jdwl_status){
        $tambah = array(
                'jdwl_hari' => $jdwl_hari,
                'jdwl_masuk' => $jdwl_masuk,
                'jdwl_pulang' => $jdwl_pulang,
                'jdwl_lembur' => $jdwl_lembur,
                'jdwl_status' => $jdwl_status);
        
        $this->db->where('jdwl_id', $jdwl_id);
        $this->db->update('tb_jadwal', $tambah);
    }

    function getDinasLuar(){
      $this->db->select('dinas_id, tb_dinas.kry_id, kry_nama, dinas_tgl, dinas_tempat, dinas_lat, dinas_long, dinas_status');
        $this->db->from('tb_dinas');  
        $this->db->join('tb_karyawan','tb_karyawan.kry_id = tb_dinas.kry_id');
        $this->db->order_by('dinas_id','desc');
        return $this->db->get();
    }

    function getDinasLuarById($dinas_id){
      $this->db->select('dinas_id, tb_dinas.kry_id, kry_nama, dinas_tgl, dinas_tempat, dinas_lat, dinas_long, dinas_status');
        $this->db->from('tb_dinas');  
        $this->db->join('tb_karyawan','tb_karyawan.kry_id = tb_dinas.kry_id');
        $this->db->where('tb_dinas.dinas_id', $dinas_id);
        return $this->db->get();
    }

    function insertDinasLuar($kry_id, $dinas_tgl, $dinas_tempat, $dinas_lat, $dinas_long, $dinas_status){
        $tambah = array(
                    'kry_id' => $kry_id,
                    'dinas_tgl' => $dinas_tgl,
                    'dinas_tempat' => $dinas_tempat,
                    'dinas_lat' => $dinas_lat,
                    'dinas_long' => $dinas_long,
                    'dinas_status' => $dinas_status
                    );

        $this->db->insert('tb_dinas', $tambah);
    }

    function updateDinasLuar($dinas_id,$kry_id, $dinas_tgl, $dinas_tempat, $dinas_lat, $dinas_long, $dinas_status){
        $tambah = array(
                    'kry_id' => $kry_id,
                    'dinas_tgl' => $dinas_tgl,
                    'dinas_tempat' => $dinas_tempat,
                    'dinas_lat' => $dinas_lat,
                    'dinas_long' => $dinas_long,
                    'dinas_status' => $dinas_status
                    );

        $this->db->where('dinas_id', $dinas_id);
        $this->db->update('tb_dinas', $tambah);
    }

    function deleteDinasLuar($dinas_id){
         $this->db->where('dinas_id', $dinas_id);
        $this->db->delete('tb_dinas');
    }
    

   
}

