<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmpresaCtrl extends CI_Controller {
    
	function __construct()
	{
		parent::__construct();
        $this->load->model('usuarios_model');
        $this->load->model('empresas_model');


	}

    public function index()
    {
        if($this->session->userdata('login')==1){
            
            $user = $this->session->userdata('idUs');

            $dato=$this->usuarios_model->validaIngreso($user);
                $this->load->view('templates/header', $dato);
                $this->load->view('empresareg');
                $dato['js']="<script></script>";    
                $this->load->view('templates/footer',$dato);
        }
        else redirect('');
    }


    public function empresaver()
    {

        if($this->session->userdata('login')==1){
            
            $user = $this->session->userdata('idUs');

            $dato=$this->usuarios_model->validaIngreso($user);
            $empres['empresa'] = $this->empresas_model->listaEmpresa();
                $this->load->view('templates/header', $dato);
                $this->load->view('empresaver',$empres);
                $dato['js']="<script src='".base_url()."assets/js/empresa.js'></script>";    
                $this->load->view('templates/footer',$dato);
        }
        else redirect('');
    }

    public function store()
    {
        $this->empresas_model->store();
        $this->index();
    }

    public function empresamod($id)
    {
        
        $resultado = $this->empresas_model->getEmpresa($id);
        $user = $this->session->userdata('idUs');
        $dato=$this->usuarios_model->validaIngreso($user);
        
            $this->load->view('templates/header', $dato);
            $this->load->view('empresamod',$resultado[0]);
            $dato2['js']="<script src='".base_url()."assets/js/empresa.js'></script>";    
            $this->load->view('templates/footer',$dato);

    }

    
    public function empresadel($id)
    {

    }
    
    public function update()
    {
        $this->empresas_model->update();
        $this->empresaver();  
    }


    public function datos(){
        $idempresa=$_POST['idempresa'];
        $query=$this->db->query("SELECT * FROM empresa WHERE idEmpresa='$idempresa'");
        $row=$query->row();
        
        $myObj=($query->result_array())[0];

        echo json_encode($myObj);
    }

    public function delete($idempresa)
    {

        $this->empresas_model->delete($idempresa);
        $this->empresaver();
    }
}