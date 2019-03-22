<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FestivoCtrl extends CI_Controller {
    
	function __construct()
	{
		parent::__construct();
        $this->load->model('usuarios_model');
        $this->load->model('festivos_model');


	}

    public function index()
    {
        if($this->session->userdata('login')==1){
            
            $user = $this->session->userdata('idUs');

            $dato=$this->usuarios_model->validaIngreso($user);
                $this->load->view('templates/header', $dato);
                $this->load->view('festivoreg');
                $dato['js']="<script></script>";    
                $this->load->view('templates/footer',$dato);
        }
        else redirect('');
    }


    public function festivover()
    {

        if($this->session->userdata('login')==1){
            
            $user = $this->session->userdata('idUs');

            $dato=$this->usuarios_model->validaIngreso($user);
            $festivo['festivo'] = $this->festivos_model->listaFestivo();
                $this->load->view('templates/header', $dato);
                $this->load->view('festivover',$festivo);
                $dato['js']="<script src='".base_url()."assets/js/festivo.js'></script>";    
                $this->load->view('templates/footer',$dato);
        }
        else redirect('');
    }

    public function festivoverinact()
    {

        if($this->session->userdata('login')==1){
            
            $user = $this->session->userdata('idUs');

            $dato=$this->usuarios_model->validaIngreso($user);
            $festivo['festivo'] = $this->festivos_model->listaFestivoinact();
                $this->load->view('templates/header', $dato);
                $this->load->view('festivover',$festivo);
                $dato['js']="<script src='".base_url()."assets/js/festivo.js'></script>";    
                $this->load->view('templates/footer',$dato);
        }
        else redirect('');
    }

    public function store()
    {
        $this->festivos_model->store();
        $this->index();
    }


    public function update()
    {
        $this->festivos_model->update();
        $this->festivover();  
    }


    public function datos(){
        $idfestivo=$_POST['idFestivo'];
        $query=$this->db->query("SELECT * FROM dia_festivo WHERE idFestivo='$idfestivo'");
        $row=$query->row();
        
        $myObj=($query->result_array())[0];

        echo json_encode($myObj);
    }

    public function delete($idfestivo)
    {

        $this->festivos_model->delete($idfestivo);
        $this->festivover();
    }
}