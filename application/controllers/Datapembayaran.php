<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapembayaran extends AUTH_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Datapembayaran_model','DM');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataDatapembayaran'] 	= $this->DM->select_all();

		$data['page'] 		= "datapembayaran";
		$data['judul'] 		= "Data Datapembaran";
		$data['deskripsi'] 	= "Manage Data Datapembayaran";

		$data['modal_tambah_datapembayaran'] = show_my_modal('modals/modal_tambah_datapembayaran', 'tambah-datapembayaran', $data);

		$this->template->views('datapembayaran/home', $data);
	}

	public function tampil() {
		$data['dataDatapembayaran'] = $this->DM->select_all();
		$this->load->view('datapembayaran/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('Pembayaran_Id', 'pembayaran_id', 'trim|required');
		$this->form_validation->set_rules('Metode_Pembayaran', 'metode_pembayaran', 'trim|required');
		$this->form_validation->set_rules('Total_Pembyaran', 'total_pembayaran', 'trim|required');
        $this->form_validation->set_rules('Tanggal_Pembayaran', 'tanggal_pembayaran', 'trim|required');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->DM->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Datapembayaran Successfully Added', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Datapembayaran Failed Added', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;
		$id 				= trim($_POST['id']);
		$data['dataDatapembayaran'] 	= $this->DM->select_by_id($id);

		echo show_my_modal('modals/modal_update_datapembayaran', 'update-datapembayaran', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('Pembayaran_Id', 'pembayaran_id', 'trim|required');
		$this->form_validation->set_rules('Metode_Pembayaran', 'metode_pembayaran', 'trim|required');
		$this->form_validation->set_rules('Total_Pembayaran', 'total_pembayaran', 'trim|required');
        $this->form_validation->set_rules('Tanggal_Pembayaran', 'tanggal_pembayaran', 'trim|required');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->DM->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Datapembayaran Successfully  Update', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Datapembayaran Failed Update', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}
		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->DM->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Datapembayaran Successfully Delete', '20px');
		} else {
			echo show_err_msg('Data Datapembayaran Successfully Failed', '20px');
		}
	}

	
	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->DM->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "ID Pembayaran"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Metode pembayaran");
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', "Total pembayaran");
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', "Tanggal pembayaran");

		$rowCount = 2;
		foreach($data as $value){
            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->pembayaran_id); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->metode_pembayaran); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->total_pembayaran); 
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->tanggal_pembayaran);
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Datapembayaran.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Datapembayaran.xlsx', NULL);
	}

	public function import() {
		$this->form_validation->set_rules('excel', 'File', 'trim|required');

		if ($_FILES['excel']['name'] == '') {
			$this->session->set_flashdata('msg', 'File harus diisi');
		} else {
			$config['upload_path'] = './assets/excel/';
			$config['allowed_types'] = 'xls|xlsx';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('excel')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data = $this->upload->data();
				
				error_reporting(E_ALL);
				date_default_timezone_set('Asia/Jakarta');

				include './assets/phpexcel/Classes/PHPExcel/IOFactory.php';

				$inputFileName = './assets/excel/' .$data['file_name'];
				$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

				$index = 0;
				foreach ($sheetData as $key => $value) {
					if ($key != 1) {
						$check = $this->DM->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->DM->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Datapembayaran Successfully Import to database'));
						redirect('datapembayaran');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Datapembayaran failed import to database (Already update)', 'warning', 'fa-warning'));
					redirect('datapembayaran');
				}

			}
		}
	}
}

/* End of file Artikel.php */
/* Location: ./application/controllers/Artikel.php */