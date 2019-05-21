<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReporteCandy extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('usuarios_model');
    }

    public function index()
    {
        if($this->session->userdata('login')==1){
            $user = $this->session->userdata('idUs');
            if (isset($_POST['fecha1']) ) 
            $data['fecha1']=$_POST['fecha1'];
            else
            $data['fecha1']=date('Y-m-d');
            $dato=$this->usuarios_model->validaIngreso($user);
            $this->load->view('templates/header', $dato);
            $this->load->view('reportefuncion',$data);
            $dato['js']="<script src='".base_url()."assets/js/reportefuncion.js'></script>";
            $this->load->view('templates/footer',$dato);
        }
        else redirect('');
    }
}