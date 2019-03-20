<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ButacaCtrl extends CI_Controller {
    
	function __construct()
	{
		parent::__construct();
        $this->load->model('usuarios_model');
        $this->load->model('butacas_model');


    }

    public function index()
    {
        if($this->session->userdata('login')==1){
            
            $user = $this->session->userdata('idUs');

            $dato=$this->usuarios_model->validaIngreso($user);
                $this->load->view('templates/header', $dato);
                $this->load->view('butacareg');
                $dato['js']="<script></script>";    
                $this->load->view('templates/footer',$dato);
        }
        else redirect('');
    }

    public function butacaver()
    {

        if($this->session->userdata('login')==1){
            
            $user = $this->session->userdata('idUs');

            $dato=$this->usuarios_model->validaIngreso($user);
            $butaca['butaca'] = $this->butacas_model->listaButacas();
                $this->load->view('templates/header', $dato);
                $this->load->view('butacaver',$butaca);
                $dato['js']="<script src='".base_url()."assets/js/distribuidor.js'></script>";    
                $this->load->view('templates/footer',$dato);
        }
        else redirect('');
    }

    public function store()
    {
        $this->butacas_model->store();
        $this->index();
    } 

    public function update()
    {
        $this->butacas_model->update();
        $this->butacaver();
    }

    public function delete($idButaca)
    {

        $this->butacas_model->delete($idButaca);
        $this->butacaver();
    }
    
}