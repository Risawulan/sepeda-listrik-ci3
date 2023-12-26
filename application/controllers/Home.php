<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 class Home extends CI_Controller{


    public function __construct() {
        parent::__construct();
        $this->load->model('Produk_model');
    }

    public function index(){
        $this->load->view('template/header');
        $this->load->view('home');
        $this->load->view('template/footer');
    }

    public function login(){
        $this->load->view('template/header');
        $this->load->view('login');
        $this->load->view('template/footer');
       
    }

    public function about(){
        $this->load->view('template/header');
        $this->load->view('about');
        $this->load->view('template/footer');
    }

    public function tipe(){
        $data['sepeda'] = $this->Produk_model->get_sepeda();
        $this->load->view('template/header');
        $this->load->view('tipe',$data);
        $this->load->view('template/footer');
    }

    public function pengajuan(){
        $this->load->view('template/header');
        $this->load->view('pengajuansewa');
        $this->load->view('template/footer');
    }

    public function rute(){
        $this->load->view('template/header');
        $this->load->view('rute');
        $this->load->view('template/footer');
    }
 }