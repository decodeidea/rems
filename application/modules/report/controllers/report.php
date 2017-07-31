<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class Report extends DC_controller {

	function __construct() {
		parent::__construct();
		$this->check_login();
		if($this->router->fetch_method()=='index'){
			$method='';
		}else{
			$method=str_replace('_',' ',$this->router->fetch_method());
		}
		$this->controller_attr = array('controller' => 'report','controller_name' => 'Report','method'=>ucwords($method),'menu'=>$this->get_menu());

		$this->load->library("excel/PHPExcel");
	}
	
	 function index(){
		redirect('report/laporan_penjualan');
	}
	
	function laporan_penjualan(){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='laporan_penjualan';
        $data['page'] = $this->load->view('report/laporan_penjualan',$data,true);
		$this->load->view('layout_backend',$data);
	}
 
  function print_penjualan(){
    $data = $this->controller_attr;
        $tahun=$this->input->post('tahun');
        $tahun2=$this->input->post('tahun2');
        $penjualan_array=array(
          'date_created >='=>$tahun."  00:00:00",
           'date_created <='=>$tahun2."  23:59:59",
           'is_delete '=>0,
         );
        $query = select_where_array($this->tbl_kontrak,$penjualan_array);
       // echo  $this->db->last_query($query);
       //  die();
        $objPHPExcel = new PHPExcel();
            
            $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:O1');
            $objPHPExcel->getActiveSheet()->getStyle('A1:O1')->getAlignment()->setHorizontal('center'); 
            $objPHPExcel->getActiveSheet()->getStyle('A1:O1')->getFont()->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle('A1:O1')->getFont()->setSize(13);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1',"Data Penjualan ".$tahun."/".$tahun2);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A3','NO');
             $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B3','NO Kontrak');
             $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C3','Kontrak Type');
             $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D3','Unit');
             $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E3','Nama Customer');
             $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F3','Payment Scheme');
             $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G3','Price');
             $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H3','Sisa Hutang');
             $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I3','Status');
             $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J3','Sales/Marketing');
            $no_sheet=3;
            $no=0;
            foreach ($query->result() as $key) {

              $kontrak_unit=select_where($this->tbl_kontrak_unit,'kontrak_id',$key->id)->row();
              $kontrak_type=select_where($this->tbl_kontrak_type,'id',$key->kontrak_type_id)->row();
              $unit=select_where($this->tbl_unit,'id',$kontrak_unit->unit_id)->row();
               $customer=select_where($this->tbl_customer,'id',$key->customer_id)->row();
               $payment_scheme=select_where($this->tbl_payment_scheme,'id',$key->payment_scheme_id)->row();
               if($key->status==0){
                $status='Kontrak DIbatalkan';
               }else{$status='Masih Berlanjut';
               }
              $no++;
              $sales=select_where($this->tbl_user,'id',$key->sales_id)->row();
              $no_sheet++;
              $objPHPExcel->getActiveSheet()->getStyle('A'.$no_sheet.':J'.$no_sheet)->getAlignment()->setHorizontal('center'); 
              $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$no_sheet,$no);
              $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$no_sheet,$key->no_kontrak);
              $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$no_sheet,$kontrak_type->name);
              $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$no_sheet,$unit->name);
              $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$no_sheet,$customer->name);
              $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$no_sheet, $payment_scheme->title);
              $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$no_sheet,$key->price);
              $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$no_sheet,$key->sisa_hutang);
              $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$no_sheet,$status);
              $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.$no_sheet,$sales->username);
              
            }
            $BStyle = array(
                'borders' => array(
                'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
                  )
                )
            );
            $objPHPExcel->getActiveSheet()->getStyle('A3:J'.$no_sheet)->applyFromArray($BStyle);
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="Data Penjualan.xls"');
            $objWriter->save("php://output");
  }

  
}

