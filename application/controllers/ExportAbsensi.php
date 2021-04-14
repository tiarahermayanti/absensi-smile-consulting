<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExportAbsensi extends CI_Controller {
 
	function __construct() {
        parent::__construct();
        
        if($this->session->userdata('status') != "login" || $this->session->userdata('role') != "pimpinan"){
            redirect("c_login");
        }

        $this->load->model("m_absen");
        $this->load->model("m_izin");
        $this->load->model("m_karyawan");

        date_default_timezone_set('Asia/Jakarta');
    }

	public function index()
	{
		 include APPPATH.'third_party/PHPExcel/PHPExcel.php';

          $kry_id = $this->uri->segment(3);
          $dari = $this->uri->segment(4);
          $sampai = $this->uri->segment(5);

          if($dari == $sampai){
            $jangka = indonesian_date($dari);
          }else{
            $jangka = indonesian_date($dari) ." - ". indonesian_date($sampai);
          }

          // $data['karyawan'] = $this->m_karyawan->getnama();
          $data['absen'] = $this->m_absen->get_bytgl_kry($kry_id, $dari, $sampai);
          $kry = $this->m_karyawan->getKaryawan($kry_id);
          foreach ($kry->result() as $k) {
            $nama = $k->kry_nama;
          }
          
          
          $excel = new PHPExcel();
          $excel->getProperties()->setCreator('My Notes Code')
                       ->setLastModifiedBy('My Notes Code')
                       ->setTitle("Data Absensi Karyawan")
                       ->setSubject("Karyawan")
                       ->setDescription("Laporan Data Absensi Karyawan")
                       ->setKeywords("Data Absensi Karyawan");
          $style_col = array(
            'font' => array('bold' => true), // 
            'alignment' => array(
              'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 
              'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER 
            ),
            'borders' => array(
              'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
              'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
              'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
              'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
            )
          );
          $style_row = array(
            'alignment' => array(
              'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 
              'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER 
            ),
            'borders' => array(
              'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
              'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
              'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
              'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
            )
          );
          $excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN ABSENSI " . strtoupper($jangka));
          $excel->getActiveSheet()->mergeCells('A1:H1'); 
          $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); 
          $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
          $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

          $excel->setActiveSheetIndex(0)->setCellValue('A2', "NAMA KARYAWAN : " . strtoupper($nama));
          $excel->getActiveSheet()->mergeCells('A2:H2'); 
          $excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); 
          $excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(15);
          $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

          $excel->setActiveSheetIndex(0)->setCellValue('A3', "No"); 
          $excel->setActiveSheetIndex(0)->setCellValue('B3', "Tanggal");
          $excel->setActiveSheetIndex(0)->setCellValue('C3', "Jam Masuk");
          $excel->setActiveSheetIndex(0)->setCellValue('D3', "Terlambat Masuk");
          $excel->setActiveSheetIndex(0)->setCellValue('E3', "Jam Pulang"); 
          $excel->setActiveSheetIndex(0)->setCellValue('F3', "Terlmabat Pulang");
          $excel->setActiveSheetIndex(0)->setCellValue('G3', "Lembur"); 
          $excel->setActiveSheetIndex(0)->setCellValue('H3', "Kehadiran"); 
        

          $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);


           $no = 1; 
          $numrow = 4;

          foreach ($data['absen']->result()  as $data) {

            $ttlterlambat = $data->ab_trlmbt_msk;
             if($ttlterlambat == 0){
                $trlmbt_msk = "0 Jam 0 Menit";
            } else{
                $jam    =floor($ttlterlambat / (60 * 60));
                $menit   =floor(($ttlterlambat - $jam * (60 * 60))/60);
               $trlmbt_msk = $jam . " Jam " . $menit . " Menit ";
            }

            $ttlpulang = $data->ab_trlmbt_plg;
             if($ttlpulang == 0){
                $trlmbt_plg = "0 Jam 0 Menit";
            } else{
                $jam    =floor($ttlpulang / (60 * 60));
                $menit   =floor(($ttlpulang - $jam * (60 * 60))/60);
               $trlmbt_plg = $jam . " Jam " . $menit . " Menit ";
            }

            $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->ab_tgl);
            $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->ab_masuk);
            $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $trlmbt_msk);
            $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->ab_pulang);
            $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $trlmbt_plg);
            $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->ab_lembur);
            $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->status_id);


            $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);

            $no++; 
            $numrow++; 

        } 
 
           
          $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
          $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); 
          $excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
          $excel->getActiveSheet()->getColumnDimension('D')->setWidth(18); 
          $excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
          $excel->getActiveSheet()->getColumnDimension('F')->setWidth(18); 
          $excel->getActiveSheet()->getColumnDimension('G')->setWidth(15); 
          $excel->getActiveSheet()->getColumnDimension('H')->setWidth(15); 


          $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
          $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
         
          $excel->getActiveSheet(0)->setTitle("Laporan Absensi");
          $excel->setActiveSheetIndex(0);
         
          header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
          header('Content-Disposition: attachment; filename="LaporanAbsen.xlsx"'); 
          header('Cache-Control: max-age=0');
          $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
          $write->save('php://output');
	}


  public function today(){
     include APPPATH.'third_party/PHPExcel/PHPExcel.php';

       
          $data['absen'] = $this->m_absen->getall_now();               
          $hari = indonesian_date(date('l, d F Y'));
          
          $excel = new PHPExcel();
          $excel->getProperties()->setCreator('My Notes Code')
                       ->setLastModifiedBy('My Notes Code')
                       ->setTitle("Data Absensi Karyawan")
                       ->setSubject("Karyawan")
                       ->setDescription("Laporan Data Absensi Karyawan")
                       ->setKeywords("Data Absensi Karyawan");
          $style_col = array(
            'font' => array('bold' => true), // 
            'alignment' => array(
              'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 
              'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER 
            ),
            'borders' => array(
              'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
              'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
              'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
              'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
            )
          );
          $style_row = array(
            'alignment' => array(
              'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 
              'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER 
            ),
            'borders' => array(
              'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
              'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
              'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
              'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
            )
          );
          $excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN ABSENSI " . strtoupper($hari));
          $excel->getActiveSheet()->mergeCells('A1:H1'); 
          $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); 
          $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
          $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

        

          $excel->setActiveSheetIndex(0)->setCellValue('A3', "No"); 
          $excel->setActiveSheetIndex(0)->setCellValue('B3', "Tanggal");
          $excel->setActiveSheetIndex(0)->setCellValue('C3', "Jam Masuk");
          $excel->setActiveSheetIndex(0)->setCellValue('D3', "Terlambat Masuk");
          $excel->setActiveSheetIndex(0)->setCellValue('E3', "Jam Pulang"); 
          $excel->setActiveSheetIndex(0)->setCellValue('F3', "Terlmabat Pulang");
          $excel->setActiveSheetIndex(0)->setCellValue('G3', "Lembur"); 
          $excel->setActiveSheetIndex(0)->setCellValue('H3', "Kehadiran"); 
        

          $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);


           $no = 1; 
          $numrow = 4;

          foreach ($data['absen']->result()  as $data) {

            $ttlterlambat = $data->ab_trlmbt_msk;
             if($ttlterlambat == 0){
                $trlmbt_msk = "0 Jam 0 Menit";
            } else{
                $jam    =floor($ttlterlambat / (60 * 60));
                $menit   =floor(($ttlterlambat - $jam * (60 * 60))/60);
               $trlmbt_msk = $jam . " Jam " . $menit . " Menit ";
            }

            $ttlpulang = $data->ab_trlmbt_plg;
             if($ttlpulang == 0){
                $trlmbt_plg = "0 Jam 0 Menit";
            } else{
                $jam    =floor($ttlpulang / (60 * 60));
                $menit   =floor(($ttlpulang - $jam * (60 * 60))/60);
               $trlmbt_plg = $jam . " Jam " . $menit . " Menit ";
            }

            $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->ab_tgl);
            $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->ab_masuk);
            $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $trlmbt_msk);
            $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->ab_pulang);
            $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $trlmbt_plg);
            $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->ab_lembur);
            $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->status_id);


            $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);

            $no++; 
            $numrow++; 

        } 
 
           
          $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
          $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); 
          $excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
          $excel->getActiveSheet()->getColumnDimension('D')->setWidth(18); 
          $excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
          $excel->getActiveSheet()->getColumnDimension('F')->setWidth(18); 
          $excel->getActiveSheet()->getColumnDimension('G')->setWidth(15); 
          $excel->getActiveSheet()->getColumnDimension('H')->setWidth(15); 


          $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
          $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
         
          $excel->getActiveSheet(0)->setTitle("Laporan Data Karyawan");
          $excel->setActiveSheetIndex(0);
         
          header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
          header('Content-Disposition: attachment; filename="LaporanAbsen.xlsx"'); 
          header('Cache-Control: max-age=0');
          $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
          $write->save('php://output');
  }


  public function all(){
     include APPPATH.'third_party/PHPExcel/PHPExcel.php';

          $dari = $this->uri->segment(3);
          $sampai = $this->uri->segment(4);

          if($dari == $sampai){
            $jangka = indonesian_date($dari);
          }else{
            $jangka = indonesian_date($dari) ." - ". indonesian_date($sampai);
          }

         $data['absen'] = $this->m_absen->getall_bytgl($dari, $sampai);
          
          
          
          $excel = new PHPExcel();
          $excel->getProperties()->setCreator('My Notes Code')
                       ->setLastModifiedBy('My Notes Code')
                       ->setTitle("Data Absensi Karyawan")
                       ->setSubject("Karyawan")
                       ->setDescription("Laporan Data Absensi Karyawan")
                       ->setKeywords("Data Absensi Karyawan");
          $style_col = array(
            'font' => array('bold' => true), // 
            'alignment' => array(
              'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 
              'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER 
            ),
            'borders' => array(
              'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
              'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
              'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
              'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
            )
          );
          $style_row = array(
            'alignment' => array(
              'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 
              'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER 
            ),
            'borders' => array(
              'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
              'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
              'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
              'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
            )
          );
          $excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN ABSENSI " . strtoupper($jangka));
          $excel->getActiveSheet()->mergeCells('A1:M1'); 
          $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); 
          $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
          $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

          // $excel->setActiveSheetIndex(0)->setCellValue('A2', "NAMA KARYAWAN : " . strtoupper($nama));
          // $excel->getActiveSheet()->mergeCells('A2:H2'); 
          // $excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); 
          // $excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(15);
          // $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

          $excel->setActiveSheetIndex(0)->setCellValue('A3', "No"); 
          $excel->setActiveSheetIndex(0)->setCellValue('B3', "Nama");
          $excel->setActiveSheetIndex(0)->setCellValue('C3', "HP");
          $excel->setActiveSheetIndex(0)->setCellValue('D3', "H1/2");
          $excel->setActiveSheetIndex(0)->setCellValue('E3', "TM"); 
          $excel->setActiveSheetIndex(0)->setCellValue('F3', "PT");
          $excel->setActiveSheetIndex(0)->setCellValue('G3', "L"); 
          $excel->setActiveSheetIndex(0)->setCellValue('H3', "TAP"); 
          $excel->setActiveSheetIndex(0)->setCellValue('I3', "S S.Dr"); 
          $excel->setActiveSheetIndex(0)->setCellValue('J3', "S NS.Dr");
          $excel->setActiveSheetIndex(0)->setCellValue('K3', "C"); 
          $excel->setActiveSheetIndex(0)->setCellValue('L3', "I"); 
          $excel->setActiveSheetIndex(0)->setCellValue('M3', "A"); 
        
        

          $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
        

           $no = 1; 
          $numrow = 4;

          foreach ($data['absen']->result() as $a) {
             $data['rekap'] = $this->m_absen->get_bytgl_kry($a->kry_id, $dari, $sampai)->result();
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

                 foreach ($data['rekap'] as $x) {
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

                      if($x->ab_trlmbt_msk != "0"){
                           $terlambat = $terlambat + 1;
                           $ttlterlambat = $ttlterlambat + $x->ab_trlmbt_msk;
                       }
                       
                      $jamtm    =floor($ttlterlambat / (60 * 60));
                      $menittm   =floor(($ttlterlambat - $jamtm * (60 * 60))/60);
                      $tm = $jamtm . " jam " . $menittm . " menit ";

                      if($x->ab_trlmbt_plg != "0"){
                          $plglama = $plglama + 1;
                          $totalplglama = $totalplglama + $x->ab_trlmbt_plg; 
                      }

                      $jampt =floor($totalplglama / (60 * 60));
                      $menitpt   =floor(($totalplglama - $jampt * (60 * 60))/60);
                      $pt = $jampt . " jam " . $menitpt . " menit ";

                      if($x->ab_lembur != "0"){
                          $lembur = $lembur + 1;
                          $ttllembur = $ttllembur + $x->ab_lembur;
                      }
                                
                      $jaml    =floor($ttllembur / (60 * 60));
                      $menitl   =floor(($ttllembur - $jaml * (60 * 60))/60);
                      $l = $jaml . " jam " . $menitl . " menit ";

                }


            $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $a->kry_nama);
            $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $hadir);
            $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $half);
            $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $terlambat. ' kali ('. $tm.')');
            $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow,$plglama. ' kali ('. $pt.')');
            $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $lembur. ' kali ('. $l .')');
            $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $tidakabsen);
            $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $sakit);
            $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $sakitnsdr);
            $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $cuti);
            $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $izin);
            $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $alpa);
           


            $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
         
            $no++; 
            $numrow++; 

        } 
 
           
          $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
          $excel->getActiveSheet()->getColumnDimension('B')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
          $excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); 
          $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
          $excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('G')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
          $excel->getActiveSheet()->getColumnDimension('I')->setWidth(15); 
          $excel->getActiveSheet()->getColumnDimension('J')->setWidth(15); 
          $excel->getActiveSheet()->getColumnDimension('K')->setWidth(15); 
          $excel->getActiveSheet()->getColumnDimension('L')->setWidth(15); 
          $excel->getActiveSheet()->getColumnDimension('M')->setWidth(15); 
         


          $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
          $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
         
          $excel->getActiveSheet(0)->setTitle("Laporan Absensi");
          $excel->setActiveSheetIndex(0);
         
          header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
          header('Content-Disposition: attachment; filename="LaporanAbsen.xlsx"'); 
          header('Cache-Control: max-age=0');
          $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
          $write->save('php://output');
  }
}


