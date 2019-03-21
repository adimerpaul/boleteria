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
			  $dato2['js']="<script src=''></script>";    
			  $this->load->view('templates/footer',$dato2);
		 }
		 else
    		redirect('');
	}
	public function salir()
    {
	    $this->session->sess_destroy();
	    redirect('');
	}
	
	public function usuarioreg()
	{
		if($this->session->userdata('login')==1){
            
            $user = $this->session->userdata('idUs');

            $dato=$this->usuarios_model->validaIngreso($user);
           
                $this->load->view('templates/header', $dato);
				$this->load->view('usuarioreg');
                $dato2['js']="<script src='".base_url()."assets/js/usuario.js'></script>";    
                $this->load->view('templates/footer',$dato2);
        }
        else redirect('');
	}

    public function datos(){
        $user=$_POST['user1'];
		$query=$this->db->query("SELECT * FROM usuario WHERE user='$user'");
		if($query->num_rows() > 0 ){
        $row=$query->row();        
        $myObj=($query->result_array())[0];
		echo json_encode($myObj);}
		else
		echo '{"user":""}';
		
    }


	public function recuperaSeccion(){
        $query=$this->db->query("SELECT * FROM seccion");
        $row=$query->row();
        
        $myObj=($query->result_array());

        echo json_encode($myObj);
    }	

	
}