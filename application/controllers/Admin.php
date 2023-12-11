<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 class Admin extends CI_Controller{
    public function index(){
        $this->load->view('admin/template_admin/header');
        $this->load->view('admin/index');
        $this->load->view('admin/template_admin/footer');
    }
    public function login(){
        $this->load->view('admin/template_admin/header');
        $this->load->view('admin/login');
        $this->load->view('admin/template_admin/footer');
    }
    public function data_penyewa(){
        $this->load->view('admin/template_admin/header');
        $this->load->view('admin/data_penyewa');
        $this->load->view('admin/template_admin/footer');
    }
    public function data_sepeda(){
        $this->load->view('admin/template_admin/header');
        $this->load->view('admin/data_sepeda');
        $this->load->view('admin/template_admin/footer');
    }
 }