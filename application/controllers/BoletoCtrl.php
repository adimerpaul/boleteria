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
            if( empty($_POST['fechaboleto']) ) 
            {
                $boleto['fecha1']= date('Y-m-d'); }
       
        else {
            $boleto['fecha1']=$_POST['fechaboleto'];}
            $this->load->view('templates/header', $dato);
                $this->load->view('entradasvendidas',$boleto);
                $dato['js']="<script></script>";    
                $this->load->view('templates/footer',$dato);
        }
        else redirect('');
    }

    public function listaBoletos()
    {
        $idventa=$_POST['idventa'];
        $query=$this->db->query("SELECT * FROM boleto WHERE idVenta='$idventa'");
        $row=$query->row();
        
        $myObj=($query->result_array());

        echo json_encode($myObj);
    } 

    

}