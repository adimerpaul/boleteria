<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReporteCtrl extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('usuarios_model');
        $this->load->model('venta_model');


    }

    public function index()
    {
        if($this->session->userdata('login')==1){

            $user = $this->session->userdata('idUs');

            $dato=$this->usuarios_model->validaIngreso($user);
            $this->load->view('templates/header', $dato);
            $this->load->view('salareg');
            $dato['js']="<script src='".base_url()."assets/js/salareg.js'></script>";
            $this->load->view('templates/footer',$dato);
        }
        else redirect('');
    }
}