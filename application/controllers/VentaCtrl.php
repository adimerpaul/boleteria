<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VentaCtrl extends CI_Controller {
    
	function __construct()
	{
		parent::__construct();
        $this->load->model('usuarios_model');
        //$this->load->model('tarifas_model');


	}

    public function index()
    {
        if($this->session->userdata('login')==1){
            
            $user = $this->session->userdata('idUs');

            $dato=$this->usuarios_model->validaIngreso($user);
                $this->load->view('templates/header', $dato);
                $this->load->view('panelventa');
                $dato['js']="<script></script>";    
                $this->load->view('templates/footer',$dato);
        }
        else redirect('');
    }


    public function listafuncion(){
        $fecha=$_POST['fecfuncion'];
        $query=$this->db->query("SELECT * FROM funcion WHERE fecha='$fecha'");
        $row=$query->row();
        
        $myObj=($query->result_array())[0];

        echo json_encode($myObj);
    }
}