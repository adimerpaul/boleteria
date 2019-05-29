<?php
/**
 * Created by PhpStorm.
 * User: Adimer
 * Date: 02/05/2019
 * Time: 9:26
 */
defined('BASEPATH') OR exit('No direct script access allowed');
include "tcpdf.php";
class ListadoCandyCtrl extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('usuarios_model');
        $this->load->model('cupon_model');
        $this->load->model('ventas_model');


    }

    public function index()
    {
        if($this->session->userdata('login')==1){

            $user = $this->session->userdata('idUs');
            $dato=$this->usuarios_model->validaIngreso($user);
            if( empty($_POST['fecini']) || empty($_POST['fecfin'])) 
                {
                    $venta['fecinicio'] = date('Y-m-d');
                    $venta['fecfinal']= date('Y-m-d'); }
           
            else {
            $venta['fecinicio'] = $_POST['fecini'];
            $venta['fecfinal']=$_POST['fecfin'];}
            $this->load->view('templates/header', $dato);
                $this->load->view('listadocandy',$venta);
                $dato2['js']="<script src='".base_url()."assets/js/listacandy.js'></script>";
                $this->load->view('templates/footer',$dato2);
        }
        else redirect('');

    }

    public function verdatoventa(){
        
        $idventa=$_POST['idventacandy'];

        $query=$this->db->query("SELECT * FROM ventacandy v, cliente c, usuario u
        WHERE v.idVentaCandy=$idventa and v.idCliente=c.idCliente and u.idUsuario=v.idUsuario
        ");
        $row=$query->row();
        $myObj=($query->result_array()[0]);
    
        echo json_encode($myObj); 

    }

    public function listaProductos(){
        $idventa=$_POST['idventacandy'];
        $query=$this->db->query("(SELECT nombreProd as nom,d.cantidad,precioVenta FROM detalle d, producto p
        WHERE idVentaCandy=$idventa and d.idProducto=p.idProducto and esCombo='NO') Union 
        (SELECT nombreCombo as nom,d.cantidad,precioVenta FROM detalle d, combo c
        WHERE idVentaCandy=$idventa and d.idCombo=c.idCombo and esCombo='SI')"
        );
        $row=$query->row();
        $myObj=($query->result_array());
    
        echo json_encode($myObj); 
    }

    public function devolucionCandy(){
        $idventa=$_POST['idventacandy'];
        $motivo=$_POST['motivo'];
        $total=$_POST['total'];
        $user = $this->session->userdata('idUs');
        $this->ventas_model->devolVentaCandy($idventa);
        $this->db->query("INSERT INTO devolucion (idVenta,idUsuario,monto,motivo,tipo) values ('$idventa','$user','$total','$motivo','CANDY')");
        echo $this->db->insert_id();
    }

    public function listaDevCandy(){
        if($this->session->userdata('login')==1){

            $user = $this->session->userdata('idUs');
            $dato=$this->usuarios_model->validaIngreso($user);
            $this->load->view('templates/header', $dato);
                $this->load->view('listadevCandy');
                $dato2['js']="<script></script>";
                $this->load->view('templates/footer',$dato2);
        }
        else redirect('');

    }
    
    public function imprimir($idcupon){
        $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $query=$this->db->query("SELECT * FROM cupon c INNER JOIN subcupon s ON c.idcupon=s.idcupon WHERE c.idcupon='$idcupon'");
        // remove default header/footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        // set font
        $pdf->SetFont('times', '', 12);

// add a page
        $pdf->AddPage();
        $html= '<table>';
        foreach($query->result() as $row){
            $html=$html. '<tr>
                    <td width="35"> Id='.$row->idsubcupon.'</td>
                    <td width="120" >Fecha= '.substr($row->fecha,0,10).'</td>
                </tr>';
        }
        $html=$html.'</table>';
        $pdf->writeHTML($html);
        $pdf->Output();
    }
}
