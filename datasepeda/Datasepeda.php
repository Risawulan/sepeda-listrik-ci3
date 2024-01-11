<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Datasepeda extends AUTH_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Datasepeda_model','SM');
	}


    public function index()
    {
        $data['userdata']     = $this->userdata;
        $data['dataDatasepeda']     = $this->SM->select_all();

        $data['page']         = "datasepeda";
        $data['judul']         = "Data Datasepeda";
        $data['deskripsi']     = "Manage Data Datasepeda";

        $data['modal_tambah_datasepeda'] = show_my_modal('modals/modal_tambah_datasepeda', 'tambah-datasepeda', $data);

        $this->template->views('datasepeda/home', $data);
    }

    public function tampil()
    {
        $this->session->set_flashdata('msg', '');
        $data['dataDatasepeda'] = $this->SM->select_all();
        $this->load->view('datasepeda/list_data', $data);
    }

	public function prosesTambah() {
        $this->form_validation->set_rules('Merk', 'merk', 'trim|required');
        $this->form_validation->set_rules('Model', 'model', 'trim|required');
        $this->form_validation->set_rules('Harga', 'harga', 'trim|required');
        $this->form_validation->set_rules('Stok', 'stok', 'trim|required');
		$data 	= $this->input->post();
        $out = array(); // Initialize the $out variable
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/img/';
            $config['allowed_types'] = 'jpg|png';
    
            $this->load->library('upload', $config);
    
            if (!$this->upload->do_upload('gambar')) {
                $error = array('error' => $this->upload->display_errors());
                $out['status'] = 'form';
                $out['msg'] = show_err_msg($error['error']); // Set error message
            } else {
                $data_foto = $this->upload->data();
                $data['gambar'] = $data_gambar['file_name'];
    
                $result = $this->SM->insert($data);
                if ($result > 0) {
                    $out['status'] = '';
                    $out['msg'] = show_succ_msg('Data Datasepeda Successfully Added', '20px');
                } else {
                    $out['status'] = 'form';
                    $out['msg'] = show_err_msg('Data Datasepeda Failed to Add', '20px');
                }
            }
        } else {
            $out['status'] = 'form';
            $out['msg'] = show_err_msg(validation_errors()); // Set validation error message
        }
    
        echo json_encode($out);
    }


    public function update()
    {
        $data['userdata']     = $this->userdata;
        $id                 = trim($_POST['id']);
        $data['dataDatasepeda']     = $this->SM->select_by_id($id);
        

        echo show_my_modal('modals/modal_update_datasepeda', 'update-datasepeda', $data);
    }

    public function prosesUpdate()
    {
        $this->form_validation->set_rules('Merk', 'merk', 'trim|required');
        $this->form_validation->set_rules('Model', 'model', 'trim|required');
        $this->form_validation->set_rules('Harga', 'harga', 'trim|required');
        $this->form_validation->set_rules('Stok', 'stok', 'trim|required');
        

        $data = $this->input->post();

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/img/';
            $config['allowed_types'] = 'jpg|png';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data_foto = $this->upload->data();
                $data['gambar'] = $data_gambar['file_name'];
            }

            $result = $this->SM->update($data);
            if ($result > 0) {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Data Datasepeda Successfully Update', '20px');
            } else {
                $out['status'] = 'form';
                //         $out['msg'] = show_err_msg(validation_errors());
            }
        }
        echo json_encode($out);
    }


    public function delete()
    {
        // ...
        $id = $_POST['id'];
        // Hapus gambar
        $gambar = $this->SM->delete($id);
        if ($gambar > 0) {
            echo show_succ_msg('Data Datasepeda Successfully Delete', '20px');
        } else {
            echo show_err_msg('Data Datasepeda Successfully Failed', '20px');
        }
    }

    // ...


    public function export()
    {
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'ID sepeda');
        $activeWorksheet->setCellValue('B1', 'Merk');
        $activeWorksheet->setCellValue('C1', 'Model');
        $activeWorksheet->setCellValue('D1', 'Harga');
        $activeWorksheet->setCellValue('E1', 'Stok');
        $data = $this->SM->select_all();
        $rowCount = 2;
        foreach ($data as $value) {
            $activeWorksheet->setCellValue('A' . $rowCount, $value->sepeda_id);
            $activeWorksheet->setCellValue('B' . $rowCount, $value->merk);
            $activeWorksheet->setCellValue('C' . $rowCount, $value->model);
            $activeWorksheet->setCellValue('D' . $rowCount, $value->harga);
            $activeWorksheet->setCellValue('E' . $rowCount, $value->stok);
            $rowCount++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save('./assets/excel/data_datadokter.xlsx');
        redirect(base_url() . 'datasepeda');
    }

    public function import()
    {
        $this->form_validation->set_rules('excel', 'File', 'trim|required');

        if ($_FILES['excel']['name'] == '') {
            $this->session->set_flashdata('msg', 'File harus diisi');
        } else {
            $config['upload_path'] = './assets/excel/';
            $config['allowed_types'] = 'xls|xlsx';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('excel')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = $this->upload->data();

                error_reporting(E_ALL);
                date_default_timezone_set('Asia/Jakarta');

                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

                $inputFileName = './assets/excel/' . $data['file_name'];
                $spreadsheet = $reader->load($inputFileName);
                $sheetData = $spreadsheet->getActiveSheet()->toArray();

                $index = 0;
                $resultData = [];
                $duplicateEntries = [];
                for ($i = 1; $i < count($sheetData); $i++) {
                    $check = $this->SM->check_nama($sheetData[$i][1]);
                    if ($check != 1) {
                        $resultData[$index]['ID Sepeda'] = $sheetData[$i][0];
                        $resultData[$index]['Merk'] = $sheetData[$i][1];
                        $resultData[$index]['Model'] = $sheetData[$i][2];
                        $resultData[$index]['Harga'] = $sheetData[$i][3];
                        $resultData[$index]['stok'] = $sheetData[$i][4];
                    } else {
                        $duplicateEntries[] = $sheetData[$i][1]; // Menyimpan entri duplikat
                    }
                    $index++;
                }

                unlink('./assets/excel/' . $data['file_name']);

                if (count($duplicateEntries) > 0) {
                    $errorMsg = 'Data dengan Nama: ' . implode(', ', $duplicateEntries) . ' sudah ada dalam database';
                    $this->session->set_flashdata('msg', show_err_msg($errorMsg, '20px'));
                    redirect('datasepeda');
                } elseif (count($resultData) != 0) {
                    // Insert non-duplicate entries into the database
                    $insertedRows = $this->SM->insert_batch($resultData);

                    if ($insertedRows > 0) {
                        $this->session->set_flashdata('msg', show_succ_msg('Data Datasepeda Successfully Import to database'));
                        redirect('datasepeda');
                    } else {
                        $this->session->set_flashdata('msg', show_err_msg('Failed to insert data into the database'));
                        redirect('datasepeda');
                    }
                } else {
                    $this->session->set_flashdata('msg', show_msg('Data Datasepeda failed import to database (Already update)', 'warning', 'fa-warning'));
                    redirect('datasepeda');
                }
            }
        }
    }
}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */