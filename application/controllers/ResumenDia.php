<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('tcpdf.php');
include "qrlib.php";
include "NumerosEnLetras.php";
require 'autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class ResumenDia extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('usuarios_model');
    }

    public function index()
    {
        if($this->session->userdata('login')==1){

            $user = $this->session->userdata('idUs');

            $dato=$this->usuarios_model->validaIngreso($user);
            $this->load->view('templates/header', $dato);
            $this->load->view('resumendia');
            $dato['js']="<script src='".base_url()."assets/js/resumendia.js'></script>";
            $this->load->view('templates/footer',$dato);
        }
        else redirect('');
    }

    public function diacandy()
    {
        if($this->session->userdata('login')==1){

            $user = $this->session->userdata('idUs');

            $dato=$this->usuarios_model->validaIngreso($user);
            $this->load->view('templates/header', $dato);
            $this->load->view('resumendiacandy');
            $dato['js']="<script src='".base_url()."assets/js/resumendiacandy.js'></script>";
            $this->load->view('templates/footer',$dato);
        }
        else redirect('');
    }

    public function reportediaCandy(){
        $fecha1=$_POST['fecha'];
        $id=$_POST['id'];
        $query=$this->db->query("SELECT * FROM ventacandy v 
        INNER JOIN cliente c ON v.idCliente=c.idCliente
        INNER JOIN usuario u ON u.idUsuario=v.idUsuario
            WHERE u.idUsuario='$id'
            AND date(fechaVenta)='$fecha1'");
            $row=$query->row();
                         $myObj=($query->result_array());
                         echo json_encode($myObj);  
    
    }

    public function reportedia(){
        $fecha1=$_POST['fecha'];
        $id=$_POST['id'];        
        $query=$this->db->query("SELECT * FROM venta v 
        INNER JOIN cliente c ON v.idCliente=c.idCliente
        INNER JOIN usuario u ON u.idUsuario=v.idUsuario
            WHERE u.idUsuario='$id'
            AND date(fechaVenta)='$fecha1'");
            $row=$query->row();
                         $myObj=($query->result_array());
                         echo json_encode($myObj);  
    
    }

    public function detallePelicula(){
        $fecha1=$_POST['fecha'];
        $id=$_POST['id'];        
        $query=$this->db->query("SELECT p.idPelicula,p.nombre ,p.formato,COUNT(*) 'cantidadb',SUM(b.costo) as total
        FROM pelicula p 
        INNER JOIN funcion f ON f.idPelicula=p.idPelicula
        INNER JOIN boleto b ON b.idFuncion=f.idFuncion
        INNER JOIN tarifa t ON b.idTarifa=t.idTarifa
        INNER JOIN usuario u ON u.idUsuario=b.idUsuario
        WHERE b.idUsuario='$id'
        AND  date(b.fecha)='$fecha1'
        GROUP BY p.idPelicula,p.nombre,p.formato");
            $row=$query->row();
                         $myObj=($query->result_array());
                         echo json_encode($myObj);  
    
    }

    public function detalleProducto(){
        $fecha1=$_POST['fecha'];
        $id=$_POST['id'];        
        $query=$this->db->query("SELECT p.idProducto,nombreProd,precioVenta,sum(d.cantidad) as cant,precioVenta,(sum(d.cantidad)*precioVenta) as total  
        from detalle d, producto p, ventacandy v
        where d.idProducto=p.idProducto
        and v.idVentaCandy=d.idVentaCandy
        and v.estado='ACTIVO'
        and esCombo='NO'
        and d.idUsuario='$id'
            and date(fecha)='$fecha1' group by p.idProducto,nombreProd ");
            $row=$query->row();
                         $myObj=($query->result_array());
                         echo json_encode($myObj);  
    
    }

    public function total(){
        $fecha1=$_POST['fecha'];
        $id=$_POST['id'];        
        
        $query=$this->db->query("SELECT (select sum(total) from ventacandy 
        WHERE date(fechaVenta)='$fecha1' and idUsuario='$id'
        and tipoVenta='FACTURA') AS tfactura,
        (select sum(total) from ventacandy 
        WHERE date(fechaVenta)='$fecha1' and idUsuario='$id'
        and tipoVenta='RECIBO') as trecibo
        from dual ");
            $row=$query->row();
                         $myObj=($query->result_array())[0];
                         echo json_encode($myObj);  
    
    }

    public function totalBol(){
        $fecha1=$_POST['fecha'];
        $id=$_POST['id'];      
        
        $query=$this->db->query("SELECT (select sum(total) from venta 
        WHERE date(fechaVenta)='$fecha1' and idUsuario='$id'
        and tipoVenta='FACTURA') AS tfactura,
        (select sum(total) from venta 
        WHERE date(fechaVenta)='$fecha1' and idUsuario='$id'
        and tipoVenta='RECIBO') as trecibo
        from dual ");
            $row=$query->row();
                         $myObj=($query->result_array())[0];
                         echo json_encode($myObj);  
    
    }

    public function detalleCombo(){
        $fecha1=$_POST['fecha'];
        $id=$_POST['id'];        
        $query=$this->db->query("SELECT c.idCombo,nombreCombo,precioVenta,sum(d.cantidad) as cant, (sum(cantidad)*c.precioVenta) as total
        from detalle d, combo c, ventacandy v
        where d.idCombo=c.idCombo
        and v.idVentaCandy=d.idVentaCandy 
        and v.estado='ACTIVO'
        and esCombo='SI'
        and date(fecha)='$fecha1'
        and d.idUsuario='$id'
        group by idCombo,nombreCombo");
            $row=$query->row();
                         $myObj=($query->result_array());
                         echo json_encode($myObj);  
    
    }

    public function imprimirDia(){
        $fecha1=$_POST['fecha'];
        $id=$_POST['id'];
        

        $nombre_impresora = "POS";


        $connector = new WindowsPrintConnector($nombre_impresora);
        $printer = new Printer($connector);

        /* Initialize */
        $printer -> initialize();

        /* Text */
//$printer -> text("Hello world\n");
//$printer -> cut();
        // set some text to print

        $ca = "MULTISALAS S.R.L.
Av. Tacna y Jaen - Oruro -Bolivia
Tel: 591-25281290
ORURO - BOLIVIA
-------------------------------
";
        //$printer -> setJustification(Printer::JUSTIFY_CENTER);
       // $printer->text($ca);
        $printer -> setJustification(Printer::JUSTIFY_CENTER);
        $printer->text($ca);
        $printer -> setJustification(Printer::JUSTIFY_LEFT);
        $html = "Fecha: ".date('Y-m-d H:m:s');
        $printer -> text($html."\n");
        $query01=$this->db->query("SELECT * from usuario where idUsuario =$id");
        $nomuser=$query01->result()[0]->nombreUser;
        $html = "Usuario: ".$nomuser."\n";
        $printer -> text($html."\n");
        $printer->text("Pelicula             CANTIDAD        TOTAL.\n");
        $printer->text("-----------------------------------"."\n");
        $total=0;
        $query=$this->db->query("SELECT p.idPelicula,p.nombre,COUNT(*) 'cantidadb',SUM(b.costo) as total
FROM pelicula p 
INNER JOIN funcion f ON f.idPelicula=p.idPelicula
INNER JOIN boleto b ON b.idFuncion=f.idFuncion
INNER JOIN tarifa t ON b.idTarifa=t.idTarifa
INNER JOIN usuario u ON u.idUsuario=b.idUsuario
WHERE b.idUsuario='$id'
AND  date(b.fecha)='$fecha1'
GROUP BY p.idPelicula,p.nombre
                ");
        foreach ($query->result() as $row){
            $printer->text( "$row->nombre           $row->cantidadb     $row->total   \n");
            $total=$total+$row->total;
        }
        $printer -> setJustification(Printer::JUSTIFY_RIGHT);
        $ca = "\nTOTAL: $total\n";
        $printer->text($ca);
        $printer -> setJustification(Printer::JUSTIFY_CENTER);
        $ca = "\n\n\nENTREGE CONFORME              RECIBI CONFORME\n";
        $printer->text($ca);
        $printer -> cut();
        $printer -> close();
        header("Location: ".base_url()."ResumenDia");
    }


public function pruebaImpresion(){
        $fecha1=$_POST['fecha'];
        $id=$_POST['id'];
        $cadena='';
        $cadena .= "
        <style>
        .margen{padding: 0px 15px 0px 15px;}
        .textoimp{ font-size: small; text-align: center;} 
        .textor{ font-size: small; text-align: right;} 
        .textmed{ font-size: small; text-align: left;}
        table{border: 1px solid #000; text-align:left; align:center; } 
        th,td{font-size: x-small;}
        hr{border: 1px dashed ;}</style>
        <div class='textoimp margen'>
        <span>MULTISALAS S.R.L.</span><br>
        <span>Av. Tacna y Jaen - Oruro -Bolivia</span><br>
        <span>Tel: 591-25281290</span><br>
        <span>ORURO - BOLIVIA</span><br>
        <span>TOTAL VENTA BOLETOS</span><br>
        <hr>
        ";
        
        $cadena.="<div class='textmed'>Fecha: ".date('Y-m-d H:m:s')."<br>";
                $query01=$this->db->query("SELECT * from usuario where idUsuario =$id");
                $nomuser=$query01->result()[0]->nombreUser;

        $cadena.="Usuario:$nomuser<br>
                 <hr><br></div>
                 <center>
                 <table class='table'>
                 <thead>
                 <tr>
                <th>PELICULA</th> <th>CANTIDAD</th><th>TOTAL</th></tr>
                </thead><tbody>";
                $total=0;
                $query=$this->db->query("SELECT p.idPelicula,concat(p.nombre,' ',(if(formato=1,'3D','2D'))) as nomb,COUNT(*) 'cantidadb',SUM(b.costo) as total
        FROM pelicula p 
        INNER JOIN funcion f ON f.idPelicula=p.idPelicula
        INNER JOIN boleto b ON b.idFuncion=f.idFuncion
        INNER JOIN tarifa t ON b.idTarifa=t.idTarifa
        INNER JOIN usuario u ON u.idUsuario=b.idUsuario
        WHERE b.idUsuario='$id'
        AND  date(b.fecha)='$fecha1'
        GROUP BY p.idPelicula,p.nombre
                        ");
                foreach ($query->result() as $row){
                    $cadena.="<tr><td>".$row->nomb."</td><td>".$row->cantidadb."</td><td>".$row->total."</td></tr>";
                    $total=$total+$row->total;
                }
                $cadena.="</tbody></table></center>";
                $cadena.= "<br><div class='textor'>TOTAL: $total Bolivianos</div><br>";
                $cadena.= "<br><br><br><span style='font-size: x-small;'>ENTREGE CONFORME &nbsp; &nbsp; &nbsp; &nbsp;  RECIBI CONFORME<span></div>";
        echo $cadena;

} 

public function pruebaRecImpresion(){
    $fecha1=$_POST['fecha'];
    $id=$_POST['id'];
    $cadena='';
    $cadena .= "
    <style>
    .margen{padding: 0px 15px 0px 15px;}
    .textoimp{ font-size: small; text-align: center;} 
    .textor{ font-size: small; text-align: right;} 
    .textmed{ font-size: small; text-align: left;}
    table{border: 1px solid #000; text-align:left; align:center; } 
    th,td{font-size: x-small;}
    hr{border: 1px dashed ;}</style>
    <div class='textoimp margen'>
    <span>MULTISALAS S.R.L.</span><br>
    <span>Av. Tacna y Jaen - Oruro -Bolivia</span><br>
    <span>Tel: 591-25281290</span><br>
    <span>ORURO - BOLIVIA</span><br>
    <span>TOTAL RECIBO BOLETOS</span><br>
    <hr>
    ";
    
    $cadena.="<div class='textmed'>Fecha: ".date('Y-m-d H:m:s')."<br>";
            $query01=$this->db->query("SELECT * from usuario where idUsuario =$id");
            $nomuser=$query01->result()[0]->nombreUser;

    $cadena.="Usuario:$nomuser<br>
             <hr><br></div>
             <center>
             <table class='table'>
             <thead>
             <tr>
            <th>PELICULA</th> <th>CANTIDAD</th><th>TOTAL</th></tr>
            </thead><tbody>";
            $total=0;
            $query=$this->db->query("SELECT p.idPelicula,concat(p.nombre,' ',(if(formato=1,'3D','2D'))) as nomb,COUNT(*) 'cantidadb',SUM(b.costo) as total
    FROM pelicula p 
    INNER JOIN funcion f ON f.idPelicula=p.idPelicula
    INNER JOIN boleto b ON b.idFuncion=f.idFuncion
    INNER JOIN tarifa t ON b.idTarifa=t.idTarifa
    INNER JOIN usuario u ON u.idUsuario=b.idUsuario
    WHERE b.idUsuario='$id'
    AND  date(b.fecha)='$fecha1'
    and tipoCompra='RECIBO'
    GROUP BY p.idPelicula,p.nombre
                    ");
            foreach ($query->result() as $row){
                $cadena.="<tr><td>".$row->nomb."</td><td>".$row->cantidadb."</td><td>".$row->total."</td></tr>";
                $total=$total+$row->total;
            }
            $cadena.="</tbody></table></center>";
            $cadena.= "<br><div class='textor'>TOTAL: $total Bolivianos</div><br>";
            $cadena.= "<br><br><br><span style='font-size: x-small;'>ENTREGE CONFORME &nbsp; &nbsp; &nbsp; &nbsp;  RECIBI CONFORME<span></div>";
    echo $cadena;

} 
public function pruebaFactImpresion(){
    $fecha1=$_POST['fecha'];
    $id=$_POST['id'];
    $cadena='';
    $cadena .= "
    <style>
    .margen{padding: 0px 15px 0px 15px;}
    .textoimp{ font-size: small; text-align: center;} 
    .textor{ font-size: small; text-align: right;} 
    .textmed{ font-size: small; text-align: left;}
    table{border: 1px solid #000; text-align:left; align:center; } 
    th,td{font-size: x-small;}
    hr{border: 1px dashed ;}</style>
    <div class='textoimp margen'>
    <span>MULTISALAS S.R.L.</span><br>
    <span>Av. Tacna y Jaen - Oruro -Bolivia</span><br>
    <span>Tel: 591-25281290</span><br>
    <span>ORURO - BOLIVIA</span><br>
    <span>TOTAL FACTURA BOLETOS</span><br>
    <hr>
    ";
    
    $cadena.="<div class='textmed'>Fecha: ".date('Y-m-d H:m:s')."<br>";
            $query01=$this->db->query("SELECT * from usuario where idUsuario =$id");
            $nomuser=$query01->result()[0]->nombreUser;

    $cadena.="Usuario:$nomuser<br>
             <hr><br></div>
             <center>
             <table class='table'>
             <thead>
             <tr>
            <th>PELICULA</th> <th>CANTIDAD</th><th>TOTAL</th></tr>
            </thead><tbody>";
            $total=0;
            $query=$this->db->query("SELECT p.idPelicula,concat(p.nombre,' ',(if(formato=1,'3D','2D'))) as nomb,COUNT(*) 'cantidadb',SUM(b.costo) as total
    FROM pelicula p 
    INNER JOIN funcion f ON f.idPelicula=p.idPelicula
    INNER JOIN boleto b ON b.idFuncion=f.idFuncion
    INNER JOIN tarifa t ON b.idTarifa=t.idTarifa
    INNER JOIN usuario u ON u.idUsuario=b.idUsuario
    WHERE b.idUsuario='$id'
    AND  date(b.fecha)='$fecha1'
    and tipoCompra='FACTURA'
    GROUP BY p.idPelicula,p.nombre
                    ");
            foreach ($query->result() as $row){
                $cadena.="<tr><td>".$row->nomb."</td><td>".$row->cantidadb."</td><td>".$row->total."</td></tr>";
                $total=$total+$row->total;
            }
            $cadena.="</tbody></table></center>";
            $cadena.= "<br><div class='textor'>TOTAL: $total Bolivianos</div><br>";
            $cadena.= "<br><br><br><span style='font-size: x-small;'>ENTREGE CONFORME &nbsp; &nbsp; &nbsp; &nbsp;  RECIBI CONFORME<span></div>";
    echo $cadena;

} 

public function todopruebaImpresion(){
    $fecha1=$_POST['fecha'];
    $cadena='';
    $cadena .= "
    <style>    .margen{padding: 0px 15px 0px 15px;}
    .textoimp{ font-size: small; text-align: center;} 
    .textor{ font-size: small; text-align: right;} 
    .textmed{ font-size: small; text-align: left;}
    table{border: 1px solid #000; text-align:left; align:center; } 
    th,td{font-size: x-small;}
    hr{border: 1px dashed ;}</style>
    <div class='textoimp margen'>
    <span>MULTISALAS S.R.L.</span><br>
    <span>Av. Tacna y Jaen - Oruro -Bolivia</span><br>
    <span>Tel: 591-25281290</span><br>
    <span>ORURO - BOLIVIA</span><br>
    <span>TOTAL VENTA BOLETOS</span><br>
    <hr>
    ";
    
    $cadena.="<div class='textmed'>Fecha: ".date('Y-m-d H:m:s')."<br>";

    $cadena.="
             <hr><br></div>
             <center>
             <table class='table'>
             <thead>
             <tr>
            <th>PELICULA</th> <th>CANTIDAD</th><th>TOTAL</th></tr>
            </thead><tbody>";
            $total=0;
            $query=$this->db->query("SELECT p.idPelicula,concat(p.nombre,' ',(if(formato=1,'3D','2D'))) as nomb,COUNT(*) 'cantidadb',SUM(b.costo) as total
    FROM pelicula p 
    INNER JOIN funcion f ON f.idPelicula=p.idPelicula
    INNER JOIN boleto b ON b.idFuncion=f.idFuncion
    INNER JOIN tarifa t ON b.idTarifa=t.idTarifa
    INNER JOIN usuario u ON u.idUsuario=b.idUsuario
    AND  date(b.fecha)='$fecha1'
    GROUP BY p.idPelicula,p.nombre
                    ");
            foreach ($query->result() as $row){
                $cadena.="<tr><td>".$row->nomb."</td><td>".$row->cantidadb."</td><td>".$row->total."</td></tr>";
                $total=$total+$row->total;
            }
            $cadena.="</tbody></table></center>";
            $cadena.= "<br><div class='textor'>TOTAL: $total Bolivianos</div><br>";
            $cadena.= "<br><br><br><span style='font-size: x-small;'>ENTREGE CONFORME &nbsp; &nbsp; &nbsp; &nbsp;  RECIBI CONFORME<span></div>";
    echo $cadena;

} 

public function todopruebaRecImpresion(){
$fecha1=$_POST['fecha'];
$cadena='';
$cadena .= "
<style>
.margen{padding: 0px 15px 0px 15px;}
.textoimp{ font-size: small; text-align: center;} 
.textor{ font-size: small; text-align: right;} 
.textmed{ font-size: small; text-align: left;}
table{border: 1px solid #000; text-align:left; align:center; } 
th,td{font-size: x-small;}
hr{border: 1px dashed ;}</style>
<div class='textoimp margen'>
<span>MULTISALAS S.R.L.</span><br>
<span>Av. Tacna y Jaen - Oruro -Bolivia</span><br>
<span>Tel: 591-25281290</span><br>
<span>ORURO - BOLIVIA</span><br>
<span>TOTAL RECIBO BOLETOS</span><br>
<hr>
";

$cadena.="<div class='textmed'>Fecha: ".date('Y-m-d H:m:s')."<br>";

$cadena.="
         <hr><br></div>
         <center>
         <table class='table'>
         <thead>
         <tr>
        <th>PELICULA</th> <th>CANTIDAD</th><th>TOTAL</th></tr>
        </thead><tbody>";
        $total=0;
        $query=$this->db->query("SELECT p.idPelicula,concat(p.nombre,' ',(if(formato=1,'3D','2D'))) as nomb,COUNT(*) 'cantidadb',SUM(b.costo) as total
FROM pelicula p 
INNER JOIN funcion f ON f.idPelicula=p.idPelicula
INNER JOIN boleto b ON b.idFuncion=f.idFuncion
INNER JOIN tarifa t ON b.idTarifa=t.idTarifa
INNER JOIN usuario u ON u.idUsuario=b.idUsuario
AND  date(b.fecha)='$fecha1'
and tipoCompra='RECIBO'
GROUP BY p.idPelicula,p.nombre
                ");
        foreach ($query->result() as $row){
            $cadena.="<tr><td>".$row->nomb."</td><td>".$row->cantidadb."</td><td>".$row->total."</td></tr>";
            $total=$total+$row->total;
        }
        $cadena.="</tbody></table></center>";
        $cadena.= "<br><div class='textor'>TOTAL: $total Bolivianos</div><br>";
        $cadena.= "<br><br><br><span style='font-size: x-small;'>ENTREGE CONFORME &nbsp; &nbsp; &nbsp; &nbsp;  RECIBI CONFORME<span></div>";
echo $cadena;

} 
public function todopruebaFactImpresion(){
$fecha1=$_POST['fecha'];
$cadena='';
$cadena .= "
<style>
.margen{padding: 0px 15px 0px 15px;}
.textoimp{ font-size: small; text-align: center;} 
.textor{ font-size: small; text-align: right;} 
.textmed{ font-size: small; text-align: left;}
table{border: 1px solid #000; text-align:left; align:center; } 
th,td{font-size: x-small;}
hr{border: 1px dashed ;}</style>
<div class='textoimp margen'>
<span>MULTISALAS S.R.L.</span><br>
<span>Av. Tacna y Jaen - Oruro -Bolivia</span><br>
<span>Tel: 591-25281290</span><br>
<span>ORURO - BOLIVIA</span><br>
<span>TOTAL FACTURA BOLETOS</span><br>
<hr>
";

$cadena.="<div class='textmed'>Fecha: ".date('Y-m-d H:m:s')."<br>";

$cadena.="
         <hr><br></div>
         <center>
         <table class='table'>
         <thead>
         <tr>
        <th>PELICULA</th> <th>CANTIDAD</th><th>TOTAL</th></tr>
        </thead><tbody>";
        $total=0;
        $query=$this->db->query("SELECT p.idPelicula,concat(p.nombre,' ',(if(formato=1,'3D','2D'))) as nomb,COUNT(*) 'cantidadb',SUM(b.costo) as total
FROM pelicula p 
INNER JOIN funcion f ON f.idPelicula=p.idPelicula
INNER JOIN boleto b ON b.idFuncion=f.idFuncion
INNER JOIN tarifa t ON b.idTarifa=t.idTarifa
INNER JOIN usuario u ON u.idUsuario=b.idUsuario
AND  date(b.fecha)='$fecha1'
and tipoCompra='FACTURA'
GROUP BY p.idPelicula,p.nombre
                ");
        foreach ($query->result() as $row){
            $cadena.="<tr><td>".$row->nomb."</td><td>".$row->cantidadb."</td><td>".$row->total."</td></tr>";
            $total=$total+$row->total;
        }
        $cadena.="</tbody></table></center>";
        $cadena.= "<br><div class='textor'>TOTAL: $total Bolivianos</div><br>";
        $cadena.= "<br><br><br><span style='font-size: x-small;'>ENTREGE CONFORME &nbsp; &nbsp; &nbsp; &nbsp;  RECIBI CONFORME<span></div>";
echo $cadena;

}

public function imprimirCandy(){
    $fecha1=$_POST['fecha'];
    $id=$_POST['id'];
        
    $nombre_impresora = "POS";


    $connector = new WindowsPrintConnector($nombre_impresora);
    $printer = new Printer($connector);

    /* Initialize */
    $printer -> initialize();

    /* Text */
//$printer -> text("Hello world\n");
//$printer -> cut();
    // set some text to print

    $ca = "MULTISALAS S.R.L.
Av. Tacna y Jaen - Oruro -Bolivia
Tel: 591-25281290
ORURO - BOLIVIA
-------------------------------
";
    //$printer -> setJustification(Printer::JUSTIFY_CENTER);
   // $printer->text($ca);
    $printer -> setJustification(Printer::JUSTIFY_CENTER);
    $printer->text($ca);
    $printer -> setJustification(Printer::JUSTIFY_LEFT);
    $html = "Fecha: ".date('Y-m-d H:m:s');
    $printer -> text($html."\n");
    $query01=$this->db->query("SELECT * from usuario where idUsuario =$id");
    $nomuser=$query01->result()[0]->nombreUser;
    $html = "Usuario: ".$nomuser."\n";
    $printer -> text($html."\n");
    $printer->text("DESCRIPCION      CANTIDAD       P.U.    TOTAL.\n");
    $printer->text("------------------------------------------------"."\n");
    $total=0;
    $query2=$this->db->query("SELECT c.idCombo,nombreCombo,precioVenta,sum(d.cantidad) as cant, (sum(cantidad)*c.precioVenta) as total
    from detalle d, combo c, ventacandy v
    where d.idCombo=c.idCombo
    and v.idVentaCandy=d.idVentaCandy
    and v.estado ='ACTIVO'
    and esCombo='SI'
    and date(fecha)='$fecha1'
    and d.idUsuario='$id'
    group by idCombo,nombreCombo ORDER BY nombreCombo asc");
    foreach ($query2->result() as $row){
        //$printer->text( " $row->nombreCombo  $row->cant    $row->precioVenta    $row->total  \n");
        $left = str_pad("$row->nombreCombo", 25) ;
		$left1 = str_pad("$row->cant", 5) ;
		$left2 = str_pad("$row->precioVenta", 7, ' ', STR_PAD_LEFT) ;
        $right = str_pad("$row->total", 7, ' ', STR_PAD_LEFT);
        $printer->text("$left$left1$left2$right\n");
        $total=$total+$row->total;
    }
    $query=$this->db->query("SELECT p.idProducto,nombreProd,sum(d.cantidad) as cant,precioVenta,(sum(d.cantidad)*precioVenta) as total  
    from detalle d, producto p, ventacandy v
    where d.idProducto=p.idProducto
    and v.idVentaCandy=d.idVentaCandy    
    and v.estado ='ACTIVO'
    and esCombo='NO'
    and d.idUsuario='$id'
        and date(fecha)='$fecha1' group by p.idProducto,nombreProd
        order by nombreProd ");
            
    foreach ($query->result() as $row){
        
        //$printer->text( " $row->nombreProd($row->nombrePref)  $row->cant  $row->precioVenta  $row->total \n");
        $left = str_pad("$row->nombreProd", 25) ;
		$left1 = str_pad("$row->cant", 5) ;
		$left2 = str_pad("$row->precioVenta", 7, ' ', STR_PAD_LEFT) ;
        $right = str_pad("$row->total", 7, ' ', STR_PAD_LEFT);
        $printer->text("$left$left1$left2$right\n");
        $total=$total+$row->total;
    }

    $total=number_format($total,2);
    $d = explode('.',$total);
    $entero=$d[0];
    $decimal=$d[1];
    $printer->text("------------------------------------------------"."\n");
    $printer -> setJustification(Printer::JUSTIFY_RIGHT);
    $ca = "\nTOTAL: $total\n";
    $printer->text($ca);
    $printer->setJustification(Printer::JUSTIFY_LEFT);    
    $html="  SON: ".NumerosEnLetras::convertir($entero)."$decimal/100 Bs.";

    $printer -> text($html."\n");
    $printer -> setJustification(Printer::JUSTIFY_CENTER);
    $ca = "\n\n\nENTREGE CONFORME              RECIBI CONFORME\n";
    $printer->text($ca);
    $printer -> cut();
    $printer -> close();
    header("Location: ".base_url()."ResumenDia/diacandy");
    }


    public function pruebaCandy(){ 
        $fecha1=$_POST['fecha']; 
        $id=$_POST['id']; 
             
        $cadena="<style>
        .margen{padding: 0px 15px 0px 15px;}        
        .textoimp{ font-size: small; text-align: center;}  
        .textor{ font-size: small; text-align: right;}  
        .textmed{ font-size: small; text-align: left;} 
        table{border: 1px solid #000; text-align:left; align:center; }  
        th,td{font-size: x-small;} 
        hr{border: 1px dashed ;}</style> 
        <div class='textoimp margen'> 
        <span>MULTISALAS S.R.L.</span><br> 
        <span>Av. Tacna y Jaen - Oruro -Bolivia</span><br> 
        <span>Tel: 591-25281290</span><br> 
        <span>ORURO - BOLIVIA</span><br> 
        <span>TOTAL VENTA</span><br> 
        <hr> 
        "; 
         
        $cadena.="<div class='textmed'>Fecha: ".date('Y-m-d H:m:s')."<br>"; 
                $query01=$this->db->query("SELECT * from usuario where idUsuario =$id"); 
                $nomuser=$query01->result()[0]->nombreUser; 
 
        $cadena.="Usuario:$nomuser<br> 
                 <hr><br></div> 
                 <center> 
                 <table class='table'> 
                 <thead> 
                 <tr> 
                <th>DESCRIPCION</th> <th>CANTIDAD</th><th>P.U.</th><th>TOTAL</th></tr> 
                </thead><tbody>"; 
        $total=0; 
        $query2=$this->db->query("SELECT c.idCombo,nombreCombo,precioVenta,sum(d.cantidad) as cant, (sum(cantidad)*c.precioVenta) as total 
        from detalle d, combo c, ventacandy v 
        where d.idCombo=c.idCombo 
        and v.idVentaCandy=d.idVentaCandy 
        and v.estado ='ACTIVO' 
        and esCombo='SI' 
        and date(fecha)='$fecha1' 
        and d.idUsuario='$id' 
        group by idCombo,nombreCombo ORDER BY nombreCombo asc"); 
         
        foreach ($query2->result() as $row){ 
            //$printer->text( " $row->nombreCombo  $row->cant    $row->precioVenta    $row->total  \n"); 
            $cadena.="<tr><td>$row->nombreCombo</td><td>$row->cant</td><td>$row->precioVenta</td><td>$row->total</td></tr>";  
            $total=$total+$row->total; 
        } 
        $query=$this->db->query("SELECT p.idProducto,nombreProd,sum(d.cantidad) as cant,precioVenta,(sum(d.cantidad)*precioVenta) as total   
        from detalle d, producto p, ventacandy v 
        where d.idProducto=p.idProducto 
        and v.idVentaCandy=d.idVentaCandy     
        and v.estado ='ACTIVO' 
        and esCombo='NO' 
        and d.idUsuario='$id' 
            and date(fecha)='$fecha1' group by p.idProducto,nombreProd 
            order by nombreProd "); 
                 
        foreach ($query->result() as $row){ 
             
            $cadena.="<tr><td>$row->nombreProd</td><td>$row->cant</td><td>$row->precioVenta</td><td>$row->total</td></tr>";  
            $total=$total+$row->total; 
        } 
        $cadena.="</tbody></table></center>"; 
     
        $total=number_format($total,2); 
        $d = explode('.',$total); 
        $entero=$d[0]; 
        $decimal=$d[1]; 
        $cadena.="<hr>"; 
        $cadena.="<br><div class='textor'>TOTAL: $total Bolivianos</div><br>"; 
        $cadena.="  SON: ".NumerosEnLetras::convertir($entero)."$decimal/100 Bolivianos<br>"; 
     
        $cadena.= "<br><br><br><span style='font-size: x-small;'>ENTREGE CONFORME &nbsp; &nbsp; &nbsp; &nbsp;  RECIBI CONFORME<span></div>"; 
        echo $cadena; 
    }

    public function pruebaRecCandy(){ 
        $fecha1=$_POST['fecha']; 
        $id=$_POST['id']; 
             
        $cadena="<style>
        .margen{padding: 0px 15px 0px 15px;}        
        .textoimp{ font-size: small; text-align: center;}  
        .textor{ font-size: small; text-align: right;}  
        .textmed{ font-size: small; text-align: left;} 
        table{border: 1px solid #000; text-align:left; align:center; }  
        th,td{font-size: x-small;} 
        hr{border: 1px dashed ;}</style> 
        <div class='textoimp margen'> 
        <span>MULTISALAS S.R.L.</span><br> 
        <span>Av. Tacna y Jaen - Oruro -Bolivia</span><br> 
        <span>Tel: 591-25281290</span><br> 
        <span>ORURO - BOLIVIA</span><br> 
        <span>RECIBO</span><br> 
        <hr> 
        "; 
         
        $cadena.="<div class='textmed'>Fecha: ".date('Y-m-d H:m:s')."<br>"; 
                $query01=$this->db->query("SELECT * from usuario where idUsuario =$id"); 
                $nomuser=$query01->result()[0]->nombreUser; 
 
        $cadena.="Usuario:$nomuser<br> 
                 <hr><br></div> 
                 <center> 
                 <table class='table'> 
                 <thead> 
                 <tr> 
                <th>DESCRIPCION</th> <th>CANTIDAD</th><th>P.U.</th><th>TOTAL</th></tr> 
                </thead><tbody>"; 
        $total=0; 
        $query2=$this->db->query("SELECT c.idCombo,nombreCombo,precioVenta,sum(d.cantidad) as cant, (sum(cantidad)*c.precioVenta) as total 
        from detalle d, combo c, ventacandy v 
        where d.idCombo=c.idCombo 
        and v.idVentaCandy=d.idVentaCandy 
        and v.estado ='ACTIVO' 
        and esCombo='SI' 
        and tipoVenta='RECIBO' 
        and date(fecha)='$fecha1' 
        and d.idUsuario='$id' 
        group by idCombo,nombreCombo ORDER BY nombreCombo asc"); 
         
        foreach ($query2->result() as $row){ 
            //$printer->text( " $row->nombreCombo  $row->cant    $row->precioVenta    $row->total  \n"); 
            $cadena.="<tr><td>$row->nombreCombo</td><td>$row->cant</td><td>$row->precioVenta</td><td>$row->total</td></tr>";  
            $total=$total+$row->total; 
        } 
        $query=$this->db->query("SELECT p.idProducto,nombreProd,sum(d.cantidad) as cant,precioVenta,(sum(d.cantidad)*precioVenta) as total   
        from detalle d, producto p, ventacandy v 
        where d.idProducto=p.idProducto 
        and v.idVentaCandy=d.idVentaCandy     
        and v.estado ='ACTIVO' 
        and esCombo='NO' 
        and tipoVenta='RECIBO' 
        and d.idUsuario='$id' 
            and date(fecha)='$fecha1' group by p.idProducto,nombreProd 
            order by nombreProd "); 
                 
        foreach ($query->result() as $row){ 
             
            $cadena.="<tr><td>$row->nombreProd</td><td>$row->cant</td><td>$row->precioVenta</td><td>$row->total</td></tr>";  
            $total=$total+$row->total; 
        } 
        $cadena.="</tbody></table></center>"; 
     
        $total=number_format($total,2); 
        $d = explode('.',$total); 
        $entero=$d[0]; 
        $decimal=$d[1]; 
        $cadena.="<hr>"; 
        $cadena.="<br><div class='textor'>TOTAL: $total Bolivianos</div><br>"; 
        $cadena.="  SON: ".NumerosEnLetras::convertir($entero)."$decimal/100 Bolivianos<br>"; 
     
        $cadena.= "<br><br><br><span style='font-size: x-small;'>ENTREGE CONFORME &nbsp; &nbsp; &nbsp; &nbsp;  RECIBI CONFORME<span></div>"; 
        echo $cadena; 
    }

    public function pruebaFactCandy(){ 
        $fecha1=$_POST['fecha']; 
        $id=$_POST['id']; 
             
        $cadena="<style>
        .margen{padding: 0px 15px 0px 15px;}        
        .textoimp{ font-size: small; text-align: center;}  
        .textor{ font-size: small; text-align: right;}  
        .textmed{ font-size: small; text-align: left;} 
        table{border: 1px solid #000; text-align:left; align:center; }  
        th,td{font-size: x-small;} 
        hr{border: 1px dashed ;}</style> 
        <div class='textoimp margen'> 
        <span>MULTISALAS S.R.L.</span><br> 
        <span>Av. Tacna y Jaen - Oruro -Bolivia</span><br> 
        <span>Tel: 591-25281290</span><br> 
        <span>ORURO - BOLIVIA</span><br> 
        <span>FACTURA</span><br> 
        <hr> 
        "; 
         
        $cadena.="<div class='textmed'>Fecha: ".date('Y-m-d H:m:s')."<br>"; 
                $query01=$this->db->query("SELECT * from usuario where idUsuario =$id"); 
                $nomuser=$query01->result()[0]->nombreUser; 
 
        $cadena.="Usuario:$nomuser<br> 
                 <hr><br></div> 
                 <center> 
                 <table class='table'> 
                 <thead> 
                 <tr> 
                <th>DESCRIPCION</th> <th>CANTIDAD</th><th>P.U.</th><th>TOTAL</th></tr> 
                </thead><tbody>"; 
        $total=0; 
        $query2=$this->db->query("SELECT c.idCombo,nombreCombo,precioVenta,sum(d.cantidad) as cant, (sum(cantidad)*c.precioVenta) as total 
        from detalle d, combo c, ventacandy v 
        where d.idCombo=c.idCombo 
        and v.idVentaCandy=d.idVentaCandy 
        and v.estado ='ACTIVO' 
        and esCombo='SI'
        and tipoVenta='FACTURA' 
        and date(fecha)='$fecha1' 
        and d.idUsuario='$id' 
        group by idCombo,nombreCombo ORDER BY nombreCombo asc"); 
         
        foreach ($query2->result() as $row){ 
            //$printer->text( " $row->nombreCombo  $row->cant    $row->precioVenta    $row->total  \n"); 
            $cadena.="<tr><td>$row->nombreCombo</td><td>$row->cant</td><td>$row->precioVenta</td><td>$row->total</td></tr>";  
            $total=$total+$row->total; 
        } 
        $query=$this->db->query("SELECT p.idProducto,nombreProd,sum(d.cantidad) as cant,precioVenta,(sum(d.cantidad)*precioVenta) as total   
        from detalle d, producto p, ventacandy v 
        where d.idProducto=p.idProducto 
        and v.idVentaCandy=d.idVentaCandy     
        and v.estado ='ACTIVO' 
        and esCombo='NO' 
        and tipoVenta='FACTURA' 
        and d.idUsuario='$id' 
            and date(fecha)='$fecha1' group by p.idProducto,nombreProd 
            order by nombreProd "); 
                 
        foreach ($query->result() as $row){ 
             
            $cadena.="<tr><td>$row->nombreProd</td><td>$row->cant</td><td>$row->precioVenta</td><td>$row->total</td></tr>";  
            $total=$total+$row->total; 
        } 
        $cadena.="</tbody></table></center>"; 
     
        $total=number_format($total,2); 
        $d = explode('.',$total); 
        $entero=$d[0]; 
        $decimal=$d[1]; 
        $cadena.="<hr>"; 
        $cadena.="<br><div class='textor'>TOTAL: $total Bolivianos</div><br>"; 
        $cadena.="  SON: ".NumerosEnLetras::convertir($entero)."$decimal/100 Bolivianos<br>"; 
     
        $cadena.= "<br><br><br><span style='font-size: x-small;'>ENTREGE CONFORME &nbsp; &nbsp; &nbsp; &nbsp;  RECIBI CONFORME<span></div>"; 
        echo $cadena; 
    } 

    public function todopruebaCandy(){ 
        $fecha1=$_POST['fecha']; 
             
        $cadena="<style>
        .margen{padding: 0px 15px 0px 15px;}
        .textoimp{ font-size: small; text-align: center;}  
        .textor{ font-size: small; text-align: right;}  
        .textmed{ font-size: small; text-align: left;} 
        table{border: 1px solid #000; text-align:left; align:center; }  
        th,td{font-size: x-small;} 
        hr{border: 1px dashed ;}</style> 
        <div class='textoimp margen'> 
        <span>MULTISALAS S.R.L.</span><br> 
        <span>Av. Tacna y Jaen - Oruro -Bolivia</span><br> 
        <span>Tel: 591-25281290</span><br> 
        <span>ORURO - BOLIVIA</span><br> 
        <span>TOTAL VENTA</span><br> 
        <hr> 
        "; 
         
        $cadena.="<div class='textmed'>Fecha: ".date('Y-m-d H:m:s')."<br>"; 
 
        $cadena.="
                 <hr><br></div> 
                 <center> 
                 <table class='table'> 
                 <thead> 
                 <tr> 
                <th>DESCRIPCION</th> <th>CANTIDAD</th><th>P.U.</th><th>TOTAL</th></tr> 
                </thead><tbody>"; 
        $total=0; 
        $query2=$this->db->query("SELECT c.idCombo,nombreCombo,precioVenta,sum(d.cantidad) as cant, (sum(cantidad)*c.precioVenta) as total 
        from detalle d, combo c, ventacandy v 
        where d.idCombo=c.idCombo 
        and v.idVentaCandy=d.idVentaCandy 
        and v.estado ='ACTIVO' 
        and esCombo='SI' 
        and date(fecha)='$fecha1' 
        group by idCombo,nombreCombo ORDER BY nombreCombo asc"); 
         
        foreach ($query2->result() as $row){ 
            //$printer->text( " $row->nombreCombo  $row->cant    $row->precioVenta    $row->total  \n"); 
            $cadena.="<tr><td>$row->nombreCombo</td><td>$row->cant</td><td>$row->precioVenta</td><td>$row->total</td></tr>";  
            $total=$total+$row->total; 
        } 
        $query=$this->db->query("SELECT p.idProducto,nombreProd,sum(d.cantidad) as cant,precioVenta,(sum(d.cantidad)*precioVenta) as total   
        from detalle d, producto p, ventacandy v 
        where d.idProducto=p.idProducto 
        and v.idVentaCandy=d.idVentaCandy     
        and v.estado ='ACTIVO' 
        and esCombo='NO' 
            and date(fecha)='$fecha1' group by p.idProducto,nombreProd 
            order by nombreProd "); 
                 
        foreach ($query->result() as $row){ 
             
            $cadena.="<tr><td>$row->nombreProd</td><td>$row->cant</td><td>$row->precioVenta</td><td>$row->total</td></tr>";  
            $total=$total+$row->total; 
        } 
        $cadena.="</tbody></table></center>"; 
     
        $total=number_format($total,2); 
        $d = explode('.',$total); 
        $entero=$d[0]; 
        $decimal=$d[1]; 
        $cadena.="<hr>"; 
        $cadena.="<br><div class='textor'>TOTAL: $total Bolivianos</div><br>"; 
        $cadena.="  SON: ".NumerosEnLetras::convertir($entero)."$decimal/100 Bolivianos<br>"; 
     
        $cadena.= "<br><br><br><span style='font-size: x-small;'>ENTREGE CONFORME &nbsp; &nbsp; &nbsp; &nbsp;  RECIBI CONFORME<span></div>"; 
        echo $cadena; 
    }

    public function todopruebaRecCandy(){ 
        $fecha1=$_POST['fecha']; 
             
        $cadena="<style>
        .margen{padding: 0px 15px 0px 15px;}
        .textoimp{ font-size: small; text-align: center;}  
        .textor{ font-size: small; text-align: right;}  
        .textmed{ font-size: small; text-align: left;} 
        table{border: 1px solid #000; text-align:left; align:center; }  
        th,td{font-size: x-small;} 
        hr{border: 1px dashed ;}</style> 
        <div class='textoimp margen'> 
        <span>MULTISALAS S.R.L.</span><br> 
        <span>Av. Tacna y Jaen - Oruro -Bolivia</span><br> 
        <span>Tel: 591-25281290</span><br> 
        <span>ORURO - BOLIVIA</span><br> 
        <span>RECIBO</span><br> 
        <hr> 
        "; 
         
        $cadena.="<div class='textmed'>Fecha: ".date('Y-m-d H:m:s')."<br>"; 
 
        $cadena.="
                 <hr><br></div> 
                 <center> 
                 <table class='table'> 
                 <thead> 
                 <tr> 
                <th>DESCRIPCION</th> <th>CANTIDAD</th><th>P.U.</th><th>TOTAL</th></tr> 
                </thead><tbody>"; 
        $total=0; 
        $query2=$this->db->query("SELECT c.idCombo,nombreCombo,precioVenta,sum(d.cantidad) as cant, (sum(cantidad)*c.precioVenta) as total 
        from detalle d, combo c, ventacandy v 
        where d.idCombo=c.idCombo 
        and v.idVentaCandy=d.idVentaCandy 
        and v.estado ='ACTIVO' 
        and esCombo='SI' 
        and tipoVenta='RECIBO' 
        and date(fecha)='$fecha1' 
        group by idCombo,nombreCombo ORDER BY nombreCombo asc"); 
         
        foreach ($query2->result() as $row){ 
            //$printer->text( " $row->nombreCombo  $row->cant    $row->precioVenta    $row->total  \n"); 
            $cadena.="<tr><td>$row->nombreCombo</td><td>$row->cant</td><td>$row->precioVenta</td><td>$row->total</td></tr>";  
            $total=$total+$row->total; 
        } 
        $query=$this->db->query("SELECT p.idProducto,nombreProd,sum(d.cantidad) as cant,precioVenta,(sum(d.cantidad)*precioVenta) as total   
        from detalle d, producto p, ventacandy v 
        where d.idProducto=p.idProducto 
        and v.idVentaCandy=d.idVentaCandy     
        and v.estado ='ACTIVO' 
        and esCombo='NO' 
        and tipoVenta='RECIBO' 
            and date(fecha)='$fecha1' group by p.idProducto,nombreProd 
            order by nombreProd "); 
                 
        foreach ($query->result() as $row){ 
             
            $cadena.="<tr><td>$row->nombreProd</td><td>$row->cant</td><td>$row->precioVenta</td><td>$row->total</td></tr>";  
            $total=$total+$row->total; 
        } 
        $cadena.="</tbody></table></center>"; 
     
        $total=number_format($total,2); 
        $d = explode('.',$total); 
        $entero=$d[0]; 
        $decimal=$d[1]; 
        $cadena.="<hr>"; 
        $cadena.="<br><div class='textor'>TOTAL: $total Bolivianos</div><br>"; 
        $cadena.="  SON: ".NumerosEnLetras::convertir($entero)."$decimal/100 Bolivianos.<br>"; 
     
        $cadena.= "<br><br><br><span style='font-size: x-small;'>ENTREGE CONFORME &nbsp; &nbsp; &nbsp; &nbsp;  RECIBI CONFORME<span></div>"; 
        echo $cadena; 
    }

    public function todopruebaFactCandy(){ 
        $fecha1=$_POST['fecha']; 
             
        $cadena="<style>
        .margen{padding: 0px 15px 0px 15px;}
        .textoimp{ font-size: small; text-align: center;}  
        .textor{ font-size: small; text-align: right;}  
        .textmed{ font-size: small; text-align: left;} 
        table{border: 1px solid #000; text-align:left; align:center; }  
        th,td{font-size: x-small;} 
        hr{border: 1px dashed ;}</style> 
        <div class='textoimp margen'> 
        <span>MULTISALAS S.R.L.</span><br> 
        <span>Av. Tacna y Jaen - Oruro -Bolivia</span><br> 
        <span>Tel: 591-25281290</span><br> 
        <span>ORURO - BOLIVIA</span><br> 
        <span>FACTURA</span><br> 
        <hr> 
        "; 
         
        $cadena.="<div class='textmed'>Fecha: ".date('Y-m-d H:m:s')."<br>"; 
 
        $cadena.=" 
                 <hr><br></div> 
                 <center> 
                 <table class='table'> 
                 <thead> 
                 <tr> 
                <th>DESCRIPCION</th> <th>CANTIDAD</th><th>P.U.</th><th>TOTAL</th></tr> 
                </thead><tbody>"; 
        $total=0; 
        $query2=$this->db->query("SELECT c.idCombo,nombreCombo,precioVenta,sum(d.cantidad) as cant, (sum(cantidad)*c.precioVenta) as total 
        from detalle d, combo c, ventacandy v 
        where d.idCombo=c.idCombo 
        and v.idVentaCandy=d.idVentaCandy 
        and v.estado ='ACTIVO' 
        and esCombo='SI'
        and tipoVenta='FACTURA' 
        and date(fecha)='$fecha1' 
        group by idCombo,nombreCombo ORDER BY nombreCombo asc"); 
         
        foreach ($query2->result() as $row){ 
            //$printer->text( " $row->nombreCombo  $row->cant    $row->precioVenta    $row->total  \n"); 
            $cadena.="<tr><td>$row->nombreCombo</td><td>$row->cant</td><td>$row->precioVenta</td><td>$row->total</td></tr>";  
            $total=$total+$row->total; 
        } 
        $query=$this->db->query("SELECT p.idProducto,nombreProd,sum(d.cantidad) as cant,precioVenta,(sum(d.cantidad)*precioVenta) as total   
        from detalle d, producto p, ventacandy v 
        where d.idProducto=p.idProducto 
        and v.idVentaCandy=d.idVentaCandy     
        and v.estado ='ACTIVO' 
        and esCombo='NO' 
        and tipoVenta='FACTURA' 
            and date(fecha)='$fecha1' group by p.idProducto,nombreProd 
            order by nombreProd "); 
                 
        foreach ($query->result() as $row){ 
             
            $cadena.="<tr><td>$row->nombreProd</td><td>$row->cant</td><td>$row->precioVenta</td><td>$row->total</td></tr>";  
            $total=$total+$row->total; 
        } 
        $cadena.="</tbody></table></center>"; 
     
        $total=number_format($total,2); 
        $d = explode('.',$total); 
        $entero=$d[0]; 
        $decimal=$d[1]; 
        $cadena.="<hr>"; 
        $cadena.="<br><div class='textor'>TOTAL: $total Bolivianos</div><br>"; 
        $cadena.="  SON: ".NumerosEnLetras::convertir($entero)."$decimal/100 Bolivianos<br>"; 
     
        $cadena.= "<br><br><br><span style='font-size: x-small;'>ENTREGE CONFORME &nbsp; &nbsp; &nbsp; &nbsp;  RECIBI CONFORME<span></div>"; 
        echo $cadena; 
    } 
}