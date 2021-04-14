<?php

class ExportKaryawan extends CI_Controller {
    
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
    

     public function index(){
          include APPPATH.'third_party/PHPExcel/PHPExcel.php';
          $tgl = date('d-m-Y');
          $bulan = indonesian_date($tgl, 'F Y');
          
          $excel = new PHPExcel();
          $excel->getProperties()->setCreator('My Notes Code')
                       ->setLastModifiedBy('My Notes Code')
                       ->setTitle("Data Karyawan")
                       ->setSubject("Karyawan")
                       ->setDescription("Laporan Data Karyawan")
                       ->setKeywords("Data Karyawan");
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
          $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA KARYAWAN " . strtoupper($bulan));
          $excel->getActiveSheet()->mergeCells('A1:V1'); 
          $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); 
          $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
          $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

          $excel->setActiveSheetIndex(0)->setCellValue('A3', "No"); 
          $excel->setActiveSheetIndex(0)->setCellValue('B3', "ID karyawan");
          $excel->setActiveSheetIndex(0)->setCellValue('C3', "NIK");
          $excel->setActiveSheetIndex(0)->setCellValue('D3', "Nama Lengkap");
          $excel->setActiveSheetIndex(0)->setCellValue('E3', "Jenis Kelamin"); 
          $excel->setActiveSheetIndex(0)->setCellValue('F3', "Posisi");
          $excel->setActiveSheetIndex(0)->setCellValue('G3', "Email"); 
          $excel->setActiveSheetIndex(0)->setCellValue('H3', "Telepon"); 
          $excel->setActiveSheetIndex(0)->setCellValue('I3', "Alamat"); 
          $excel->setActiveSheetIndex(0)->setCellValue('J3', "Jatah Cuti");
          $excel->setActiveSheetIndex(0)->setCellValue('K3', "Cuti Berlaku"); 
          $excel->setActiveSheetIndex(0)->setCellValue('L3', "Sisa Cuti"); 
          $excel->setActiveSheetIndex(0)->setCellValue('M3', "Bank"); 
          $excel->setActiveSheetIndex(0)->setCellValue('N3', "Nomor Rekening");
          $excel->setActiveSheetIndex(0)->setCellValue('O3', "An"); 
          $excel->setActiveSheetIndex(0)->setCellValue('P3', "Gaji Pokok"); 
          $excel->setActiveSheetIndex(0)->setCellValue('Q3', "Tunjangan Makan"); 
          $excel->setActiveSheetIndex(0)->setCellValue('R3', "Tunjangan Kesehatan"); 
          $excel->setActiveSheetIndex(0)->setCellValue('S3', "Kedisiplinan"); 
          $excel->setActiveSheetIndex(0)->setCellValue('T3', "Transportasi");
          $excel->setActiveSheetIndex(0)->setCellValue('U3', "Total Gaji");  
          $excel->setActiveSheetIndex(0)->setCellValue('V3', "Status"); 

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
          $excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('S3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('T3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('U3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('V3')->applyFromArray($style_col);




          $kry = $this->m_karyawan->getall();
          $no = 1; 
          $numrow = 4; 
          foreach($kry->result() as $data){
            $gaji = $data->gj_pokok + $data->gj_makan + $data->gj_kesehatan +$data->gj_disiplin + $data->gj_transport;

             if($data->kry_status == "aktif"){
              $status = "Aktif";
            } elseif ($data->kry_status == "nonaktif") {
              $status = "Non Aktif";
            }

            $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->kry_id);
            $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->kry_nik);
            $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->kry_nama);
            $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->kry_jk);
            $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->kry_posisi);
            $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->kry_email);
            $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->kry_tlp);
            $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->kry_alamat);
            $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->kry_cuti);
            $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->kry_cuti_sampai);
            $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->kry_cuti_sisa);
            $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->nama_bank);
            $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->kry_rekening);
            $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->kry_an_rekening);
            $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->gj_pokok);
            $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data->gj_makan);
            $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->gj_kesehatan);
            $excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data->gj_disiplin);
            $excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data->gj_transport);
            $excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $gaji);
            $excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $status);


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
            $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('V'.$numrow)->applyFromArray($style_row);
 
            $no++; 
            $numrow++; 
          }

          $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
          $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); 
          $excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
          $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
          $excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('G')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('H')->setWidth(30); 
          $excel->getActiveSheet()->getColumnDimension('I')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('J')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('K')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('L')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('M')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('N')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('P')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('R')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('S')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
          $excel->getActiveSheet()->getColumnDimension('U')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);  



          $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
          $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
         
          $excel->getActiveSheet(0)->setTitle("Laporan Data Karyawan");
          $excel->setActiveSheetIndex(0);
         
          header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
          header('Content-Disposition: attachment; filename="DataKaryawan.xlsx"'); 
          header('Cache-Control: max-age=0');
          $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
          $write->save('php://output');
        }



    public function getbyAktif(){
           include APPPATH.'third_party/PHPExcel/PHPExcel.php';
          $tgl = date('d-m-Y');
          $bulan = indonesian_date($tgl, 'F Y');
          
          $excel = new PHPExcel();
          $excel->getProperties()->setCreator('My Notes Code')
                       ->setLastModifiedBy('My Notes Code')
                       ->setTitle("Data Karyawan")
                       ->setSubject("Karyawan")
                       ->setDescription("Laporan Data Karyawan")
                       ->setKeywords("Data Karyawan");
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
          $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA KARYAWAN " . strtoupper($bulan));
          $excel->getActiveSheet()->mergeCells('A1:V1'); 
          $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); 
          $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
          $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

          $excel->setActiveSheetIndex(0)->setCellValue('A3', "No"); 
          $excel->setActiveSheetIndex(0)->setCellValue('B3', "ID karyawan");
          $excel->setActiveSheetIndex(0)->setCellValue('C3', "NIK");
          $excel->setActiveSheetIndex(0)->setCellValue('D3', "Nama Lengkap");
          $excel->setActiveSheetIndex(0)->setCellValue('E3', "Jenis Kelamin"); 
          $excel->setActiveSheetIndex(0)->setCellValue('F3', "Posisi");
          $excel->setActiveSheetIndex(0)->setCellValue('G3', "Email"); 
          $excel->setActiveSheetIndex(0)->setCellValue('H3', "Telepon"); 
          $excel->setActiveSheetIndex(0)->setCellValue('I3', "Alamat"); 
          $excel->setActiveSheetIndex(0)->setCellValue('J3', "Jatah Cuti");
          $excel->setActiveSheetIndex(0)->setCellValue('K3', "Cuti Berlaku"); 
          $excel->setActiveSheetIndex(0)->setCellValue('L3', "Sisa Cuti"); 
          $excel->setActiveSheetIndex(0)->setCellValue('M3', "Bank"); 
          $excel->setActiveSheetIndex(0)->setCellValue('N3', "Nomor Rekening");
          $excel->setActiveSheetIndex(0)->setCellValue('O3', "An"); 
          $excel->setActiveSheetIndex(0)->setCellValue('P3', "Gaji Pokok"); 
          $excel->setActiveSheetIndex(0)->setCellValue('Q3', "Tunjangan Makan"); 
          $excel->setActiveSheetIndex(0)->setCellValue('R3', "Tunjangan Kesehatan"); 
          $excel->setActiveSheetIndex(0)->setCellValue('S3', "Kedisiplinan"); 
          $excel->setActiveSheetIndex(0)->setCellValue('T3', "Transportasi");
          $excel->setActiveSheetIndex(0)->setCellValue('U3', "Total Gaji");  
          $excel->setActiveSheetIndex(0)->setCellValue('V3', "Status"); 

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
          $excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('S3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('T3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('U3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('V3')->applyFromArray($style_col);




          $kry = $this->m_karyawan->getbyAktif();
          $no = 1; 
          $numrow = 4; 
          foreach($kry->result() as $data){
            $gaji = $data->gj_pokok + $data->gj_makan + $data->gj_kesehatan +$data->gj_disiplin + $data->gj_transport;

            if($data->kry_status == "aktif"){
              $status = "Aktif";
            } elseif ($data->kry_status == "nonaktif") {
              $status = "Non Aktif";
            }

            $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->kry_id);
            $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->kry_nik);
            $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->kry_nama);
            $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->kry_jk);
            $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->kry_posisi);
            $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->kry_email);
            $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->kry_tlp);
            $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->kry_alamat);
            $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->kry_cuti);
            $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->kry_cuti_sampai);
            $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->kry_cuti_sisa);
            $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->nama_bank);
            $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->kry_rekening);
            $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->kry_an_rekening);
            $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->gj_pokok);
            $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data->gj_makan);
            $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->gj_kesehatan);
            $excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data->gj_disiplin);
            $excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data->gj_transport);
            $excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $gaji);
            $excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $status);


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
            $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('V'.$numrow)->applyFromArray($style_row);
 
            $no++; 
            $numrow++; 
          }

          $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
          $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); 
          $excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
          $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
          $excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('G')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('H')->setWidth(30); 
          $excel->getActiveSheet()->getColumnDimension('I')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('J')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('K')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('L')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('M')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('N')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('P')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('R')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('S')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
          $excel->getActiveSheet()->getColumnDimension('U')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);  



          $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
          $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
         
          $excel->getActiveSheet(0)->setTitle("Laporan Data Karyawan");
          $excel->setActiveSheetIndex(0);
         
          header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
          header('Content-Disposition: attachment; filename="DataKaryawan.xlsx"'); 
          header('Cache-Control: max-age=0');
          $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
          $write->save('php://output');
        }


     public function getbyNonaktif(){
         include APPPATH.'third_party/PHPExcel/PHPExcel.php';
          $tgl = date('d-m-Y');
          $bulan = indonesian_date($tgl, 'F Y');
          
          $excel = new PHPExcel();
          $excel->getProperties()->setCreator('My Notes Code')
                       ->setLastModifiedBy('My Notes Code')
                       ->setTitle("Data Karyawan")
                       ->setSubject("Karyawan")
                       ->setDescription("Laporan Data Karyawan")
                       ->setKeywords("Data Karyawan");
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
          $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA KARYAWAN " . strtoupper($bulan));
          $excel->getActiveSheet()->mergeCells('A1:V1'); 
          $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); 
          $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
          $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

          $excel->setActiveSheetIndex(0)->setCellValue('A3', "No"); 
          $excel->setActiveSheetIndex(0)->setCellValue('B3', "ID karyawan");
          $excel->setActiveSheetIndex(0)->setCellValue('C3', "NIK");
          $excel->setActiveSheetIndex(0)->setCellValue('D3', "Nama Lengkap");
          $excel->setActiveSheetIndex(0)->setCellValue('E3', "Jenis Kelamin"); 
          $excel->setActiveSheetIndex(0)->setCellValue('F3', "Posisi");
          $excel->setActiveSheetIndex(0)->setCellValue('G3', "Email"); 
          $excel->setActiveSheetIndex(0)->setCellValue('H3', "Telepon"); 
          $excel->setActiveSheetIndex(0)->setCellValue('I3', "Alamat"); 
          $excel->setActiveSheetIndex(0)->setCellValue('J3', "Jatah Cuti");
          $excel->setActiveSheetIndex(0)->setCellValue('K3', "Cuti Berlaku"); 
          $excel->setActiveSheetIndex(0)->setCellValue('L3', "Sisa Cuti"); 
          $excel->setActiveSheetIndex(0)->setCellValue('M3', "Bank"); 
          $excel->setActiveSheetIndex(0)->setCellValue('N3', "Nomor Rekening");
          $excel->setActiveSheetIndex(0)->setCellValue('O3', "An"); 
          $excel->setActiveSheetIndex(0)->setCellValue('P3', "Gaji Pokok"); 
          $excel->setActiveSheetIndex(0)->setCellValue('Q3', "Tunjangan Makan"); 
          $excel->setActiveSheetIndex(0)->setCellValue('R3', "Tunjangan Kesehatan"); 
          $excel->setActiveSheetIndex(0)->setCellValue('S3', "Kedisiplinan"); 
          $excel->setActiveSheetIndex(0)->setCellValue('T3', "Transportasi");
          $excel->setActiveSheetIndex(0)->setCellValue('U3', "Total Gaji");  
          $excel->setActiveSheetIndex(0)->setCellValue('V3', "Status"); 

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
          $excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('S3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('T3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('U3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('V3')->applyFromArray($style_col);




          $kry = $this->m_karyawan->getbyNonaktif();
          $no = 1; 
          $numrow = 4; 
          foreach($kry->result() as $data){
            $gaji = $data->gj_pokok + $data->gj_makan + $data->gj_kesehatan +$data->gj_disiplin + $data->gj_transport;

            if($data->kry_status == "aktif"){
              $status = "Aktif";
            } elseif ($data->kry_status == "nonaktif") {
              $status = "Non Aktif";
            }

            $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->kry_id);
            $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->kry_nik);
            $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->kry_nama);
            $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->kry_jk);
            $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->kry_posisi);
            $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->kry_email);
            $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->kry_tlp);
            $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->kry_alamat);
            $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->kry_cuti);
            $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->kry_cuti_sampai);
            $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->kry_cuti_sisa);
            $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->nama_bank);
            $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->kry_rekening);
            $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->kry_an_rekening);
            $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->gj_pokok);
            $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data->gj_makan);
            $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->gj_kesehatan);
            $excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data->gj_disiplin);
            $excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data->gj_transport);
            $excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $gaji);
            $excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $status);


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
            $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('V'.$numrow)->applyFromArray($style_row);
 
            $no++; 
            $numrow++; 
          }

          $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
          $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); 
          $excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
          $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
          $excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('G')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('H')->setWidth(30); 
          $excel->getActiveSheet()->getColumnDimension('I')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('J')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('K')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('L')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('M')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('N')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('P')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('R')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('S')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
          $excel->getActiveSheet()->getColumnDimension('U')->setWidth(20); 
          $excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);  



          $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
          $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
         
          $excel->getActiveSheet(0)->setTitle("Laporan Data Karyawan");
          $excel->setActiveSheetIndex(0);
         
          header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
          header('Content-Disposition: attachment; filename="DataKaryawan.xlsx"'); 
          header('Cache-Control: max-age=0');
          $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
          $write->save('php://output');
        }

   
}