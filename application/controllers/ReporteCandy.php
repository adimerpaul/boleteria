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

    public function masProducto(){
        $fecini=$_POST['fechaini'];
        $fecfin=$_POST['fechafin'];
        $query=$this->db->query("SELECT p.idProducto, nombreProd,sum(d.cantidad) as total, (precioVenta * sum(d.cantidad)) as totalventa
                from producto p,detalle d
                WHERE p.idProducto = d.idProducto and esCombo='NO' and date(fecha)>='$fecini' and date(fecha)<='$fecfin'
                group by p.idProducto order by total");
                         $row=$query->row();
                         $myObj=($query->result_array());
                         echo json_encode($myObj);  
    }

    public function masCombo(){
        $fecini=$_POST['fechaini'];
        $fecfin=$_POST['fechafin'];
        $query=$this->db->query("SELECT c.idCombo, nombreCombo,sum(d.cantidad) as total, (precioVenta * sum(d.cantidad)) as totalventa
                                    from combo c,detalle d
                                    WHERE c.idCombo = d.idCombo and esCombo='SI' and date(fecha)>='$fecini' and date(fecha)<='$fecfin'
                                    group by c.idCombo
                                    order by total");
                         $row=$query->row();
                         $myObj=($query->result_array());
                         echo json_encode($myObj);  
    }

    public function resumenCandy(){
        if($this->session->userdata('login')==1){

            $user = $this->session->userdata('idUs');

            $dato=$this->usuarios_model->validaIngreso($user);
            $this->load->view('templates/header', $dato);
            $this->load->view('resumenVentaCandy');
            $dato['js']="<script src='".base_url()."assets/js/resumenCandy.js'></script>";
            $this->load->view('templates/footer',$dato);
        }
        else redirect('');
    }

    public function listaVenta(){
        $fecha1=$_POST['fechaini'];
        $fecha2=$_POST['fechafin'];
        $query=$this->db->query("SELECT date(fechaVenta) as fecha,user,u.idUsuario,count(*) as total,sum(total) as totalventa 
                from ventacandy v,usuario u WHERE date(fechaVenta)>='$fecha1' and date(fechaVenta)<='$fecha2' and v.idUsuario=u.idUsuario
                GROUP by date(fechaVenta)");  
                                       $row=$query->row();
                         $myObj=($query->result_array());
                         echo json_encode($myObj);  
    }

    public function cantVenta(){
        $fecha1=$_POST['fechaini'];
        $fecha2=$_POST['fechafin'];
        $query=$this->db->query("SELECT 
        (select sum(cantidad) from detalle where date(fecha)>='".$fecha1."' and date(fecha)<='".$fecha2."' and esCombo='NO')as tprod, 
        (select sum(d.cantidad*precioVenta) from detalle d inner join producto p on d.idProducto= p.idProducto where date(fecha)>='".$fecha1."' and date(fecha)<='".$fecha2."' and esCombo='NO')as ventaprod, 
        (select sum(cantidad) from detalle where date(fecha)>='$fecha1' and date(fecha)<='$fecha2' and esCombo='SI') as tcomb,
        (select sum(d.cantidad*precioVenta) from detalle d inner join combo c on d.idCombo=c.idCombo where date(fecha)>='$fecha1' and date(fecha)<='$fecha2' and esCombo='SI') as ventacomb from dual");  
                                       $row=$query->row();
                         $myObj=($query->result_array());
                         echo json_encode($myObj);  
    }

    public function listadoDia($fecha){
        $datosdia['fecha']=$fecha;    

        if($this->session->userdata('login')==1){

            $user = $this->session->userdata('idUs');

            $dato=$this->usuarios_model->validaIngreso($user);
            $this->load->view('templates/header', $dato);
            $this->load->view('resumenCandyDia',$datosdia);
            $dato['js']="<script src='".base_url()."assets/js/resumenCandyDia.js'></script>";
            $this->load->view('templates/footer',$dato);
        }
        else redirect('');

    }

    public function datosVenta(){
        $idventa=$_POST['idventacandy'];
        $query=$this->db->query("SELECT date(fechaVenta) as fecha,time(fechaVenta)as hora,user, concat(nombreCl,' ',apellidoCl) as nombre
         from ventacandy v inner join usuario u on v.idUsuario=u.idUsuario 
        inner join cliente c on c.idCliente=v.idCliente
        where idVentaCandy='$idventa'");  
        $row=$query->row();
        $myObj=($query->result_array())[0];
        echo json_encode($myObj);  
        
    }

    public function detalleventa(){
        $idventa=$_POST['idventacandy'];
        $query=$this->db->query("SELECT nombreP,cantidad,pUnitario,(cantidad * pUnitario) as subtotal 
                                 from detalle d, ventacandy v where v.idVentaCandy=$idventa and v.idVentaCandy=d.idVentaCandy");  
                                       $row=$query->row();
                         $myObj=($query->result_array());
                         echo json_encode($myObj);  
    }
}