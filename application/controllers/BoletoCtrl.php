<?php defined('BASEPATH') OR exit('No direct script access allowed');

class BoletoCtrl extends CI_Controller {
    
	function __construct()
	{
		parent::__construct();
        $this->load->model('usuarios_model');
        $this->load->model('boletos_model');


    }

    public function index()
    {
        if($this->session->userdata('login')==1){
            
            $user = $this->session->userdata('idUs');

            $dato=$this->usuarios_model->validaIngreso($user);
            $boleto['boleto'] = $this->boletos_model->listaBoletos();
            $this->load->view('templates/header', $dato);
                $this->load->view('entradasvendidas',$boleto);
                $dato['js']="<script></script>";    
                $this->load->view('templates/footer',$dato);
        }
        else redirect('');
    }
}