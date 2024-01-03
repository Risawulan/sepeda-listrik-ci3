<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Penyewaan extends AUTH_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Penyewaan_model','PM');
		// $this->load->model('User_model','UM');
		// $this->load->model('Dokter_model','DM');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		// $data['dataUser'] = $this->UM->select_all();
		// $data['dataDokter'] = $this->DM->select_all();
		$data['dataPenyewaan'] = $this->PM->select_all();
		$data['page'] 		= "penyewaan";
		$data['judul'] 		= "Data Penyewaan ";
		$data['deskripsi'] 	= "Manage Data Penyewaan";

		$data['modal_tambah_penyewaan'] = show_my_modal('modals/modal_tambah_penyewaan', 'tambah-penyewaan', $data);

		$this->template->views('penyewaan/home', $data);
	}

	public function tampil() {
		// $data['dataUser'] = $this->UM->select_all();
		// $data['dataDokter'] = $this->DM->select_all();
		$data['dataePenyewaan'] = $this->PM->select_all();
		$this->load->view('penyewaan/list_data', $data);
	}

	public function prosesTambah() {

		$this->form_validation->set_rules('tanggal_sewa', 'Tanggal_sewa', 'trim|required');
        $this->form_validation->set_rules('tanggal_kembali', 'Tanggal_kembali', 'trim|required');
		$this->form_validation->set_rules('harga_sewa', 'Harga_sewa', 'trim|required');
		$this->form_validation->set_rules('denda', 'Denda', 'trim|required');
        $this->form_validation->set_rules('jaminan', 'Jaminan', 'trim|required');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->PM->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Penyewaan Successfully Added', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Penyewaan Failed Added', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;
		$id 				=trim($_POST['id']);
		// $data['dataUser'] = $this->UM->select_all();
		// $data['dataDokter'] = $this->DM->select_all();
		$data['dataPenyewaan'] 	= $this->PM->select_by_id($id);

		echo show_my_modal('modals/modal_update_penyewaan', 'update-penyewaan', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('tanggal_sewa', 'Tanggal_sewa', 'trim|required');
        $this->form_validation->set_rules('tanggal_kembali', 'Tanggal_kembali', 'trim|required');
		$this->form_validation->set_rules('harga_sewa', 'Harga_sewa', 'trim|required');
		$this->form_validation->set_rules('denda', 'Denda', 'trim|required');
        $this->form_validation->set_rules('jaminan', 'Jaminan', 'trim|required');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) { 
			$result = $this->PM->update($data);
	    	if ($result > 0) {
				$out['status'] = '';
		 		$out['msg'] = show_succ_msg('Data Penyewaan Successfully Update', '20px');
		 	} else {
		 		$out['status'] = '';
				$out['msg'] = show_err_msg('Data penyewaan Failed Update', '20px');
		 	}
		 } else {
		 	$out['status'] = 'form';
		 	$out['msg'] = show_err_msg(validation_errors());
		 }
		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->PM->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Penyewaan Successfully Delete', '20px');
		} else {
			echo show_err_msg('Data Penyewaan Failed Delete', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['penyewaan'] = $this->PM->select_by_id($id);
		$data['jumlahPenyewaan'] = $this->PM->total_rows();

		echo show_my_modal('modals/modal_detail_penyewaan', 'detail-penyewaan', $data, 'lg');
	}


}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */