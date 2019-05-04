<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('usuarios_model');


    }

    public function index()
    {
        if($this->session->userdata('login')==1){

            $user = $this->session->userdata('idUs');

            $dato=$this->usuarios_model->validaIngreso($user);
            $this->load->view('templates/header', $dato);
            $this->load->view('reportefuncion');
            $dato['js']="<script src='".base_url()."assets/js/reportefuncion.js'></script>";
            $this->load->view('templates/footer',$dato);
        }
        else redirect('');
    }

    public function funcion(){
        
    }
}