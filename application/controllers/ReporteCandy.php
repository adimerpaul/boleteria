<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReporteCandy extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('usuarios_model');
    }

    public function index()
    {
        if($this->session->userdata('login')==1){

            $user = $this->session->userdata('idUs');
            if (isset($_POST['fecha1']) || isset($_POST['fecha2'])) 
            {$data['fecha1']=$_POST['fecha1'];
            $data['fecha2']=$_POST['fecha2'];}
            else{
                $data['fecha1']=date('Y-m-d');
                $data['fecha2']=date('Y-m-d');}
            $dato=$this->usuarios_model->validaIngreso($user);
            $this->load->view('templates/header', $dato);
            $this->load->view('ventaProducto',$data);
            $dato['js']="<script src='".base_url()."assets/js/productovendido.js'></script>";
            $this->load->view('templates/footer',$dato);
        }
        else redirect('');
    }

    public function totalperiodo(){
        $fecini=$_POST['fechaini'];
        $fecfin=$_POST['fechafin'];
        $query=$this->db->query("SELECT (select sum(cantidad) from detalle where esCombo='NO' and date(fecha)>='$fecini' and date(fecha)<='$fecfin') as totalprod,
            (select sum(cantidad) from detalle where esCombo='SI' and date(fecha)>='$fecini' and date(fecha)<='$fecfin') as totalcomb,
            (select sum(pUnitario*cantidad) from detalle WHERE date(fecha)>='$fecini' and date(fecha)<='$fecfin') as totalventa
            from dual");
         $row=$query->row();
         $myObj=($query->result_array());
         echo json_encode($myObj);  
    }
}