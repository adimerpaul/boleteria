<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClienteCtrl extends CI_Controller {
    
	function __construct()
	{
		parent::__construct();
        $this->load->model('usuarios_model');
        $this->load->model('clientes_model');


    }

    public function index()
    {
        if($this->session->userdata('login')==1){
            
            $user = $this->session->userdata('idUs');

            $dato=$this->usuarios_model->validaIngreso($user);
                $this->load->view('templates/header', $dato);
                $this->load->view('clientereg');
                $dato['js']="<script src='".base_url()."assets/js/cliente.js'></script>";    
                $this->load->view('templates/footer',$dato);
        }
        else redirect('');
    }

    public function clientever()
    {

        if($this->session->userdata('login')==1){
            
            $user = $this->session->userdata('idUs');

            $dato=$this->usuarios_model->validaIngreso($user);
            $cliente['cliente'] = $this->clientes_model->listaClientes();
                $this->load->view('templates/header', $dato);
                $this->load->view('clientever',$cliente);
                $dato['js']="<script src='".base_url()."assets/js/cliente.js'></script>";    
                $this->load->view('templates/footer',$dato);
        }
        else redirect('');
    }


    public function store()
    {
        $this->clientes_model->store();
        $this->index();
    } 

    public function update()
    {
        $this->clientes_model->update();
        header("Location: ".base_url()."ClienteCtrl/clientever");
    }

    public function delete($idCliente)
    {

        $this->clientes_model->delete($idCliente);
        header("Location: ".base_url()."ClienteCtrl/clientever");
    }

    public function datos(){
        $idcliente=$_POST['idcliente'];
        $query=$this->db->query("SELECT * FROM cliente WHERE idCliente='$idcliente'");
        $row=$query->row();
        
        $myObj=($query->result_array())[0];

        echo json_encode($myObj);
    }
    
    public function datocliente(){
        $cinit=$_POST['cinit'];
		$query=$this->db->query("SELECT * FROM cliente WHERE cinit='$cinit'");
		if($query->num_rows() > 0 ){
        $row=$query->row();        
        $myObj=($query->result_array())[0];
		echo json_encode($myObj);}
		else
		echo '{"cinit":""}';
		
	}
}