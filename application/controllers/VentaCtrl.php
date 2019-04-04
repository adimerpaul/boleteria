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
                $dato2['js']="<script src='".base_url()."assets/js/venta.js'></script>";    
                $this->load->view('templates/footer',$dato2);
        }
        else redirect('');
    }

    public function horario(){
        $idpelicula=$_POST['idpel'];
        $fecha=$_POST['fecha1'];
        
        $consulta="SELECT p.idPelicula,nombre,formato, s.idSala, nroSala, f.idFuncion,time_format(horaInicio, '%H:%i') as horaIn,time_format(horaFin, '%H:%i') as horaF, serie,precio FROM pelicula p inner join funcion f on p.idPelicula = f.idPelicula inner join sala s on s.idSala = f.idSala inner join tarifa t on t.idTarifa = f.idTarifa where fecha ='$fecha' and  p.idPelicula = ".$idpelicula;
       $query=$this->db->query($consulta);
        $row=$query->row();        
        $myObj=($query->result_array());
        echo json_encode($myObj);
    }
    
    public function listafuncion(){
        $fecha=$_POST['fecha1'];
        $consulta="SELECT DISTINCT p.idPelicula,nombre,formato from pelicula p inner join funcion f on p.idPelicula = f.idPelicula where fecha ='$fecha' and activa='ACTIVADO'" ;

        $query=$this->db->query($consulta);
        $row=$query->row();        
        $myObj=($query->result_array());
        echo json_encode($myObj);
    }

}