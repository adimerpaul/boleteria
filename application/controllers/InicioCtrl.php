<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InicioCtrl extends CI_Controller {
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
            $this->load->view('templates/header',$dato);
            $this->load->view('inicio');
            $this->load->view('templates/footer');

        }
        else redirect('');
    }
}