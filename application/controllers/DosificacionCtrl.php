<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DosificacionCtrl extends CI_Controller {
    
	function __construct()
	{
		parent::__construct();
        $this->load->model('usuarios_model');
        $this->load->model('dosificaciones_model');
    }
    
    public function index()
    {
        if($this->session->userdata('login')==1){
            
            $user = $this->session->userdata('idUs');

            $dato=$this->usuarios_model->validaIngreso($user);
                $this->load->view('templates/header', $dato);
                $this->load->view('dosificacionreg');
                $dato['js']="<script></script>";    
                $this->load->view('templates/footer',$dato);
        }
        else redirect('');
    }

    public function store()
    {
        $this->dosificaciones_model->store();
        $this->dosificaciones_model->desactivar();
        $this->index();
    }

    public function dosificacionver()
    {
        if($this->session->userdata('login')==1){            
            $user = $this->session->userdata('idUs');
            $dato=$this->usuarios_model->validaIngreso($user);
            $dosif['dosif'] = $this->dosificaciones_model->listaDosificacion();
                $this->load->view('templates/header', $dato);
                $this->load->view('dosificacionver',$dosif);
                $dato2['js']="<script src='".base_url()."assets/js/dosificacion.js'></script>";    
                $this->load->view('templates/footer',$dato2);
        }
        else redirect('');
    }

    public function update()
    {
        $this->dosificaciones_model->update();
        $this->dosificaciones_model->desactivar();
        $this->dosificacionver();  
    }

    public function datos(){
        $iddosificacion=$_POST['idDosif'];
        $query=$this->db->query("SELECT * FROM dosificacion WHERE idDosif=".$iddosificacion);
        $row=$query->row();
        
        $myObj=($query->result_array())[0];

        echo json_encode($myObj);
    }

    public function delete($idDosif)
    {

        $this->dosificaciones_model->delete($idDosif);
        $this->dosificacionver();
    }

}