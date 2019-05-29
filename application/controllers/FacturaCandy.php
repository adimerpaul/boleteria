<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('tcpdf.php');
include "qrlib.php";
include "NumerosEnLetras.php";
require 'autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class FacturaCandy extends CI_Controller {
    
	function __construct()
	{
		parent::__construct();
        $this->load->model('usuarios_model');
        $this->load->model('temporal_model');
        $this->load->model('boletos_model');

        $this->load->model('ventas_model'); // This loads the library
        $this->load->model('dosificaciones_model');
    }


    public function printF($idventa){

        $fecha=date('d/m/Y');
        $total=0;
        $hora=date("H:i:s");
        $query=$this->db->query("SELECT * FROM ventacandy v 
    INNER JOIn cliente c ON v.idCliente=c.idCliente 
    INNER JOIn usuario u ON v.idUsuario=u.idUsuario
    INNER JOIn dosificacion d ON d.idDosif=v.idDosif
    WHERE idVentaCandy='$idventa'");
        $row=$query->row();
        $nombre=$row->nombreCl;
        $tipoVenta=$row->tipoVenta;
    
        $apellido=$row->apellidoCl;
        $ci=$row->cinit;
        $nrocomprobante=$row->nroComprobante;
    
        $nroautorizacion=$row->nroAutorizacion;
        $vendero=$row->user;
        $codigocontrol=$row->codigoControl;
        $fechahasta=$row->fechaHasta;
        $leyenda=$row->leyenda;
        $fecha=$row->fechaVenta;
        $qr=$row->codigoQR;

        if ($tipoVenta=="FACTURA"){
    
        $nombre_impresora = "POS";
       
    $connector = new WindowsPrintConnector($nombre_impresora);
    $printer = new Printer($connector);
    
        $printer -> initialize();
        $ca = "MULTICINES PLAZA S.R.L.
    SUCURSAL 2        
    Av. Tacna y Jaen - Oruro -Bolvia
     Tel: 591-25281290
    ORURO - BOLIVIA
    -------------------------------
    FACTURA
    NIT: 329448023
    NRO FACTURA:$nrocomprobante
    NRO AUTORIZACION: $nroautorizacion
    ------------------------------------------------    
    ";
        $printer -> setJustification(Printer::JUSTIFY_CENTER);
        $printer->text($ca);   
    
        $printer -> setJustification(Printer::JUSTIFY_LEFT);
        $printer->text("Fecha: ".$fecha."\n");
        $printer->text("Señor(es): $nombre $apellido\n");
        $printer->text("NIT/CI: $ci\n");
    //$html = "Fecha: ".$fecha."
    //Señor(es): $nombre $apellido
    //NIT/CI: $ci";
        $printer -> setJustification(Printer::JUSTIFY_LEFT);
        //$printer -> text($html."\n");
    
        $query1=$this->db->query("SELECT p.idProducto, nombreProd ,sum(d.cantidad) as cant, precioVenta, (sum(d.cantidad) * precioVenta) as total
    FROM detalle d
    INNER JOIN ventacandy v ON d.idVentaCandy=v.idVentaCandy
    INNER JOIN producto p on d.idProducto=p.idProducto
    WHERE v.idVentaCandy='$idventa' and esCombo='NO'
    GROUP BY p.idProducto,nombreProd");

    $query2=$this->db->query("SELECT c.idCombo, nombreCombo ,sum(d.cantidad) as cant, precioVenta, (sum(d.cantidad) * precioVenta) as total
        FROM detalle d
        INNER JOIN ventacandy v ON d.idVentaCandy=v.idVentaCandy
        INNER JOIN combo c on d.idCombo=c.idCombo
        WHERE v.idVentaCandy='$idventa' and esCombo='SI'
        GROUP BY c.idCombo,nombreCombo");
    
        $printer->setJustification(Printer::JUSTIFY_LEFT);
        $printer->text("DESC        CANT         P.U           IMP. \n");
        $printer->text("------------------------------------------------"."\n");
        $total=0;
        foreach ($query1->result() as $row){
            $nombrep=$row->nombreProd;
            $precio=$row->precioVenta;
            $cantidad=$row->cant;
            $subtotal=$row->total;

            $printer->setJustification(Printer::JUSTIFY_LEFT);
            $left = str_pad("$nombrep ", 25) ;
            $left1 = str_pad("$row->cant", 5) ;
            $left2 = str_pad("$precio", 7, ' ', STR_PAD_LEFT) ;
            $right = str_pad("$subtotal", 7, ' ', STR_PAD_LEFT);
            $printer->text("$left$left1$left2$right\n");
            $total=$total+$subtotal;
    
        }
        foreach ($query2->result() as $row){
            $nombrep=$row->nombreCombo;
            $precio=$row->precioVenta;
            $cantidad=$row->cant;
            $subtotal=$row->total;

            $printer->setJustification(Printer::JUSTIFY_LEFT);
            $left = str_pad("$nombrep ", 25) ;
            $left1 = str_pad("$row->cant", 5) ;
            $left2 = str_pad("$precio", 7, ' ', STR_PAD_LEFT) ;
            $right = str_pad("$subtotal", 7, ' ', STR_PAD_LEFT);
            $printer->text("$left$left1$left2$right\n");
            $total=$total+$subtotal;    
        }

        $total=number_format($total,2);
        $d = explode('.',$total);
        $entero=$d[0];
        $decimal=$d[1];
        $printer->text("------------------------------------------------"."\n");
        
        $printer->setJustification(Printer::JUSTIFY_RIGHT);
        $printer->text("SUBTOTAL: $total Bs.\n");
        $printer->text("DESC:   0.00 Bs.\n");
        $printer->text("TOTAL: $total Bs.\n");
    
        $printer->setJustification(Printer::JUSTIFY_LEFT);
    
        $html="  SON: ".NumerosEnLetras::convertir($entero)."$decimal/100 Bs.
        ------------------------------------------------
    Cod. de Control: $codigocontrol 
    Fecha Lim. de Emision: ". substr($fechahasta,0,10);
    
        $printer -> text($html."\n");
    
        $printer -> setJustification(Printer::JUSTIFY_CENTER);
        $testStr = $qr;
        $models = array(
            Printer::QR_MODEL_2 => "ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAIS. EL USO ILICITO DE ESTA SERA SANCIONADO DE ACUERDO A LEY"
        );
        foreach ($models as $model => $name) {
            $printer -> qrCode($testStr, Printer::QR_ECLEVEL_L, 4, $model);
            $printer -> text("$name\n");
            $printer -> feed();
        }
        $printer->setJustification(Printer::JUSTIFY_LEFT);
        $printer->text($leyenda."\n");
        $printer->text("PUNTO: ".gethostname()." \n");
        $printer->text("USUARIO: $vendero \n");
        $printer->text("NUMERO: $idventa \n");
    
        $printer -> cut();    
          
        $printer -> close();
        }
        $this->printR($idventa);
    }
    
    public function printR($idventa){
    
            $fecha=date('d/m/Y');
            $total=0;
            $hora=date("H:i:s");
            $query=$this->db->query("SELECT * FROM ventacandy v 
    INNER JOIn cliente c ON v.idCliente=c.idCliente 
    INNER JOIn usuario u ON v.idUsuario=u.idUsuario
    INNER JOIn dosificacion d ON d.idDosif=v.idDosif
    WHERE idVentaCandy='$idventa'");
            $row=$query->row();
            $nombre=$row->nombreCl;
            $fechaVenta=$row->fechaVenta;
    
            $apellido=$row->apellidoCl;
            $ci=$row->cinit;
            $nrocomprobante=$row->nroComprobante;
    
            $nroautorizacion=$row->nroAutorizacion;
            $vendero=$row->user;
            $codigocontrol=$row->codigoControl;
            $fechahasta=$row->fechaHasta;
            $leyenda=$row->leyenda;
            $qr=$row->codigoQR;
    
    
            $nombre_impresora = "POS";
    
    
            $connector = new WindowsPrintConnector($nombre_impresora);
            $printer = new Printer($connector);
    
            /* Initialize */
            $printer -> initialize();
    
            $ca = "MULTICINES PLAZA SRL.
            Av. Tacna y Jaen - Oruro -Bolvia
            Tel: 591-25281290
            ORURO - BOLIVIA
            -------------------------------
            ";
                //$printer -> setJustification(Printer::JUSTIFY_CENTER);
               // $printer->text($ca);
                $printer -> setJustification(Printer::JUSTIFY_CENTER);
                $printer->text($ca);
                $printer -> setJustification(Printer::JUSTIFY_LEFT);
                $html = "Fecha: ".date("Y-m-d H:i:s ");
                $printer -> text($html."\n");
                $html = "Usuario: ".$_SESSION['nombre']."\n";
                $printer -> text($html."\n");
                $printer->text("DESCRIPCION      CANTIDAD       P.U.    TOTAL.\n");
                $printer->text("------------------------------------------------"."\n");
                $total=0;
                $query2=$this->db->query("SELECT c.idCombo,nombreCombo,precioVenta,sum(d.cantidad) as cant, (sum(cantidad)*c.precioVenta) as total
                from detalle d, combo c
                where d.idCombo=c.idCombo
                and esCombo='SI' and d.idVentaCandy='$idventa'
                and idUsuario='".$_SESSION['idUs']."'
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
                from detalle d, producto p
                where d.idProducto=p.idProducto
                and esCombo='NO' and d.idVentaCandy='$idventa'
                and idUsuario='".$_SESSION['idUs']."'
                     group by p.idProducto,nombreProd 
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
    
            $printer -> cut();
    
            /* Always close the printer! On some PrintConnectors, no actual
             * data is sent until the printer is closed. */
            $printer -> close();
            header("Location: ".base_url()."VentaCandyCtrl");
        }
 
}