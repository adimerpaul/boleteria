<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioCtrl extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('usuarios_model');


	}
	public function index()
	{
		$this->session->sess_destroy();
		$this->load->view('login');
	}
	
	public function verifica() 
    {	
		
		
    	$usr=$this->input->post('user');
		$con=$this->input->post('pass');
	
		$this->load->model('usuarios_model');
		$respuesta=$this->usuarios_model->verificalogin($usr,$con);

    	if ($respuesta) 
    	{ 
    		$datosusr = array(
    		'nombre' =>$respuesta[0]->nombreUser,
    		'cuenta' =>$respuesta[0]->user,
    		'idUs'=>$respuesta[0]->idUsuario,
    		'login'=>1
		  );
		  
		  $this->session->set_userdata($datosusr);
		  $user = $this->session->userdata('idUs');

		  	$dato=$this->usuarios_model->validaIngreso($user);
			  $this->load->view('templates/header',$dato);
			  $this->load->view('inicio');
			  $this->load->view('templates/footer');
		 }
		 else
    		redirect('');
	}
	public function salir()
    {
	    $this->session->sess_destroy();
	    redirect('');
	}
	


		

	
}