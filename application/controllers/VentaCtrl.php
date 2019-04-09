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

    public function datos(){
        $tabla=$_POST['tabla'];
        $where=$_POST['where'];
        $dato=$_POST['dato'];
        $query=$this->db->query("SELECT * FROM $tabla WHERE $where='$dato'");
        $myObj=($query->result_array());
        echo json_encode($myObj);
    }
    
    public function datos2(){
        $tabla=$_POST['tabla'];
        $where=$_POST['where'];
        $dato=$_POST['dato'];
        $query=$this->db->query("SELECT * FROM $tabla WHERE $where='$dato' ORDER BY fila,columna DESC ");
        $myObj=($query->result_array());
        echo json_encode($myObj);
    }

    public function datosBoleto(){
        $idfuncion = $_POST['dato'];
        //$query=$this->db->query("SELECT * FROM boleto WHERE idFuncion="+$idfuncion);

        $consulta=" SELECT a.idAsiento,s.idSala,columna,fila,letra,activo,IF( (select count(*) from boleto b where a.idAsiento = b.idAsiento)>0, true, false) as asignado ";
        $consulta=$consulta."FROM sala s, funcion f, asiento a ";
        $consulta=$consulta."where s.idSala = f.idSala and s.idSala = a.idSala and f.idFuncion = ".$idfuncion." ORDER BY fila,columna DESC";
        $query=$this->db->query($consulta);
        $row=$query->row();            
        $myObj=($query->result_array());
        echo json_encode($myObj);
    }
}