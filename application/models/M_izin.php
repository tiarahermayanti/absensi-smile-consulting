<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_izin extends CI_model {

	function karyawan_izin($kry_id){
         $this->db->select('*');
        $this->db->from('tb_izin');
        $this->db->join('tb_izin_status','tb_izin_status.id_status_izin = tb_izin.id_izin_status'); 
        $this->db->join('tb_izin_jenis','tb_izin_jenis.id_izin_jenis = tb_izin.id_izin_jenis'); 
		$where = array('kry_id' => $kry_id);
        $this->db->order_by("izin_id", "desc");
        return $this->db->get();
	}

    function getall_izin(){
         $this->db->select('*');
        $this->db->from('tb_izin');
        $this->db->join('tb_karyawan','tb_karyawan.kry_id = tb_izin.kry_id'); 
        $this->db->join('tb_izin_status','tb_izin_status.id_status_izin = tb_izin.id_izin_status'); 
        $this->db->join('tb_izin_jenis','tb_izin_jenis.id_izin_jenis = tb_izin.id_izin_jenis'); 
        $this->db->order_by("izin_id", "desc");
        return $this->db->get();
    }

    function getJenisIzin(){
       return $this->db->get('tb_izin_jenis');
    }

    function getStatusIzin(){
       return $this->db->get('tb_izin_status');
    }

	function insert($kry_id, $izin_jenis, $izin_mulai, $izin_berakhir, $izin_tgl_pengajuan, $izin_ket, $izin_upload, $izin_status){
         $tambah = array(
                'kry_id' => $kry_id,
                'id_izin_jenis' => $izin_jenis,
                'izin_mulai' => $izin_mulai,
                'izin_berakhir' => $izin_berakhir,
                'izin_tgl_pengajuan' => $izin_tgl_pengajuan,
                'izin_ket' => $izin_ket,
                'izin_upload' => $izin_upload,
                'id_izin_status' => $izin_status );
        
    	$this->db->insert('tb_izin', $tambah);
    }

    function update($izin_id, $kry_id, $izin_jenis, $izin_mulai, $izin_berakhir, $izin_tgl_pengajuan, $izin_ket, $izin_upload, $izin_status){
         $tambah = array(
                'kry_id' => $kry_id,
                'id_izin_jenis' => $izin_jenis,
                'izin_mulai' => $izin_mulai,
                'izin_berakhir' => $izin_berakhir,
                'izin_tgl_pengajuan' => $izin_tgl_pengajuan,
                'izin_ket' => $izin_ket,
                'izin_upload' => $izin_upload,
                'id_izin_status' => $izin_status );

        $this->db->where('izin_id', $izin_id);
        $this->db->update('tb_izin', $tambah);
    }

    function updateStatus($izin_id, $izin_status){
         $tambah = array('id_izin_status' => $izin_status );

        $this->db->where('izin_id', $izin_id);
        $this->db->update('tb_izin', $tambah);
    }

    function delete($izin_id){
         $this->db->where('izin_id', $izin_id);
        $this->db->delete('tb_izin');
    }

    function get_byid($izin_id){
        $where = array('izin_id' => $izin_id);
        return $this->db->get_where('tb_izin', $where);
    }

    function deletebykry($kry_id){
         $this->db->where('kry_id', $kry_id);
        $this->db->delete('tb_izin');
    }

   
}

