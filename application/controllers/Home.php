<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Produk_model');
        $this->load->model('Transaksi_model');
 
    }

    public function index(){
        $data['username'] = $this->session->userdata('username');
        $this->load->view('template/header', $data);
        $this->load->view('home');
        $this->load->view('template/footer');
    }

    public function login(){
        $data['username'] = $this->session->userdata('username');
        $this->load->view('template/header', $data);
        $this->load->view('login');
        $this->load->view('template/footer');
    }

    public function register()
    {
        $data['username'] = $this->session->userdata('username');
        $this->load->view('template/header', $data);
        $this->load->view('register');
        $this->load->view('template/footer');
    }

    public function about(){
        $data['username'] = $this->session->userdata('username');
        $this->load->view('template/header', $data);
        $this->load->view('about');
        $this->load->view('template/footer');
    }

    public function tipe(){
        $data['username'] = $this->session->userdata('username');
        $data['sepeda'] = $this->Produk_model->get_sepeda();
        $this->load->view('template/header', $data);
        $this->load->view('tipe', $data);
        $this->load->view('template/footer');
    }

    public function pengajuan(){
        $data['username'] = $this->session->userdata('username');
        $this->load->view('template/header', $data);
        $this->load->view('pengajuansewa');
        $this->load->view('template/footer');
    }

    public function sewa($id = null)
    {
        $data['username'] = $this->session->userdata('username');
        $data['sepeda_id'] = $id; 
        $data['sepeda'] = $this->Produk_model->get_sepeda_by_id($id);
        $this->load->view('template/header', $data);
        $this->load->view('pengajuansewa', $data);
        $this->load->view('template/footer');
    }
    
    public function rute(){
        $data['username'] = $this->session->userdata('username');
        $this->load->view('template/header', $data);
        $this->load->view('rute');
        $this->load->view('template/footer');
    }

    
    public function simpan_pengajuan() {
        $nota = $this->input->post('nota');
        $waktu_sewa = $this->input->post('waktu_sewa');
        $waktu_kembali = $this->input->post('waktu_kembali');
        $total_harga = $this->input->post('total_harga');
        $nama = $this->input->post('nama');
        $nama_penanggung_jawab = $this->input->post('nama_penanggung_jawab');
        $this->Transaksi_model->simpan_data($nota, $waktu_sewa, $waktu_kembali, $total_harga, $nama, $nama_penanggung_jawab);
        redirect(base_url('Home/tampil_nota/' . $nota));
    }

    public function tampil_nota($nota)
    {
        $data['detail_nota'] = $this->Transaksi_model->get_detail_nota($nota);
        $this->load->view('nota', $data);
    }

}
