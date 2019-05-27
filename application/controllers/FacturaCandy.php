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
    
    
        $nombre_impresora = "POS";
    
    
        $connector = new WindowsPrintConnector($nombre_impresora);
        $printer = new Printer($connector);
    
        /* Initialize */
        $printer -> initialize();
    
        /* Text */
        // set some text to print
    
        $ca = "MULTI CINES PLAZA SRL.
    Av. Tacna y Jaen - Oruro -Bolvia
     Tel: 591-25281290
    ORURO - BOLIVIA
    -------------------------------
    FACTURA
    NIT: 329448023
    NRO FACTURA:$nrocomprobante
    NRO AUTORIZACION: $nroautorizacion
    -------------------------------
    ";
        $printer -> setJustification(Printer::JUSTIFY_CENTER);
        $printer->text($ca);   
    
        $printer -> setJustification(Printer::JUSTIFY_LEFT);
        $html = "Fecha: ".$fecha."
    Señor(es): $nombre $apellido
    NIT/CI: $ci ";
        $printer -> text($html."\n");
    
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
        $printer->text("  CANT          P.U            IMP.\n");
        $printer->text("  -------------------------------------"."\n");
        $total=0;
        foreach ($query1->result() as $row){
            $nombrep=$row->nombreProd;
            $precio=$row->precioVenta;
            $cantidad=$row->cant;
            $subtotal=$row->total;

            $printer->setJustification(Printer::JUSTIFY_LEFT);
            $printer->text( "  $nombrep \n");
            $printer->text( "  $cantidad         $precio         $subtotal   \n");
            $total=$total+$subtotal;
    
        }
        foreach ($query2->result() as $row){
            $nombrep=$row->nombreCombo;
            $precio=$row->precioVenta;
            $cantidad=$row->cant;
            $subtotal=$row->total;

            $printer->setJustification(Printer::JUSTIFY_LEFT);
            $printer->text( "  $nombrep \n");
            $printer->text( "  $cantidad         $precio         $subtotal   \n");
            $total=$total+$subtotal;    
        }

        $total=number_format($total,2);
        $d = explode('.',$total);
        $entero=$d[0];
        $decimal=$d[1];
        $printer->text("  -------------------------------------"."\n");
        $printer->setJustification(Printer::JUSTIFY_RIGHT);
        $printer->text("SUBTOTAL: $total Bs.\n");
        $printer->text("DESC:   0.00 Bs.\n");
        $printer->text("TOTAL: $total Bs.\n");
    
        $printer->setJustification(Printer::JUSTIFY_LEFT);
    
        $html="  SON: ".NumerosEnLetras::convertir($entero)." $decimal/100 Bs.
    ------------------------------------------
    Cod. de Control: $codigocontrol 
    Fecha Lim. de Emision: ". substr($fechahasta,0,10);
    
        $printer -> text($html."\n");
    
        $printer -> setJustification(Printer::JUSTIFY_CENTER);
        $testStr = $qr;
        $models = array(
            //Printer::QR_MODEL_1 => "QR Model 1",
            Printer::QR_MODEL_2 => "ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAIS. EL USO ILICITO DE ESTA SERA SANCIONADO DE ACUERDO A LEY"
            //Printer::QR_MICRO => "Micro QR code\n(not supported on all printers)"
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
          
        /* Pulse */
        //$printer -> pulse();
    
        /* Always close the printer! On some PrintConnectors, no actual
         * data is sent until the printer is closed. */
        $printer -> close();
        header("Location: ".base_url()."VentaCandyCtrl");
        //header();
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
    
            /* Text */
    //$printer -> text("Hello world\n");
    //$printer -> cut();
            // set some text to print
    /*
            $ca = "MULTI CINES PLAZA SRL.
    Av. Tacna y Jaen - Oruro -Bolvia
    SUCURSAL N: 0
    Tel: 591-25281290
    ORDEN CANCELADA
    ";
            $printer -> setJustification(Printer::JUSTIFY_CENTER);
            $printer->text($ca);
    
    
            $printer -> setJustification(Printer::JUSTIFY_LEFT);
            $html = "Fecha: ".date('d/m/Y')." Hora:". $hora."
    Señor(es): $nombre $apellido
    NIT/CI: $ci ";
    
            $html = "
    Fecha: ".$fechaVenta."
    Nombre Cliente: $nombre $apellido
    NIT Cliente: $ci ";
    
    
            $printer -> text($html."\n");
    
            $query=$this->db->query("SELECT b.idFuncion, p.nombre,p.formato,t.precio,COUNT(*) as cantidad,(select v2.idCupon FROM venta v2 WHERE v2.idVenta='$idventa') as idCupon
    FROM boleto b 
    INNER JOIN funcion f ON f.idFuncion=b.idFuncion 
    INNER JOIN tarifa t ON t.idTarifa=b.idTarifa 
    INNER JOIN pelicula p ON p.idPelicula=f.idPelicula 
    WHERE idVenta='$idventa'
    GROUP BY b.idFuncion,p.nombre,p.formato,t.precio");
    
            $printer->setJustification(Printer::JUSTIFY_LEFT);
            $printer->text("CANT    DESCRIPCION      P.U    IMP.\n");
            $printer->text("-----------------------------------"."\n");
            foreach ($query->result() as $row){
                $idcupon=$row->idCupon;
                $nombrepelicula=$row->nombre;
                $formato=$row->formato;
                $precio=$row->precio;
                $cantidad=$row->cantidad;
                echo $idcupon;
                if ($idcupon!=null){
                    $precio=0;
                    $subtotal=$cantidad*$precio;
                }else{
                    $subtotal=$cantidad*$precio;
                }
                if ($formato==1){
                    $for="3D";
                }else{
                    $for="2D";
                }
                $printer->setJustification(Printer::JUSTIFY_LEFT);
                $printer->text("$nombrepelicula \n");
                $printer->text( "    $cantidad  formato: $for         $precio     $subtotal   \n");
                $total=$total+$subtotal;
    
            }
            $total=number_format($total,2);
            $d = explode('.',$total);
            $entero=$d[0];
            $decimal=$d[1];
            $printer->text("-----------------------------------"."\n");
            $printer->setJustification(Printer::JUSTIFY_RIGHT);
            $printer->text("SUBTOTAL: $total Bs.\n");
            $printer->text("DESC:   0.00 Bs.\n");
            $printer->text("TOTAL: $total Bs.\n");
    
            $printer->setJustification(Printer::JUSTIFY_LEFT);
    
            $html="SON: ".NumerosEnLetras::convertir($entero)." $decimal/100 Bs.
    ------------------------------------------
    ";
    
            $printer -> text($html."\n");
            $printer->setJustification(Printer::JUSTIFY_LEFT);
      //      $printer->text($leyenda."\n");
            $printer->text("PUNTO: ".gethostname()." \n");
            $printer->text("USUARIO: $vendero \n");
            $printer->text("NUMERO: $idventa \n");
    
            $printer -> cut();
    */
            /*IMPRESION DE BOLETOS*/
            
            $query=$this->db->query("SELECT * FROM venta v 
    INNER JOIn usuario u ON v.idUsuario=u.idUsuario
    INNER JOIn boleto b ON b.idVenta=v.idVenta
    INNER JOIn funcion f ON f.idFuncion=b.idFuncion
    INNER JOIn pelicula p ON p.idPelicula=f.idPelicula
    INNER JOIn sala s ON s.idSala=f.idSala
    INNER JOIn tarifa t ON t.idTarifa=b.idTarifa
    INNER JOIn asiento a ON a.idAsiento=b.idAsiento
    WHERE v.idVenta='$idventa'");

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

            foreach ($query->result() as $row) {
    
                if ($row->formato == 1) {
                    $for = "3D";
                } else {
                    $for = "2D";
                }
    
                $printer->setJustification(Printer::JUSTIFY_CENTER);
                $printer -> selectPrintMode(Printer::MODE_DOUBLE_HEIGHT);
                $printer->text("\n"."MULTICINES" . "\n");
                $printer->text("PLAZA" . "\n");
                $printer -> selectPrintMode(Printer::MODE_FONT_B);
                $printer->text("NIT:329448023" . "\n");
                $printer->text("-----------------------------------" . "\n");
                $printer -> selectPrintMode(Printer::MODE_DOUBLE_HEIGHT);
                $printer->text($row->titulo . "\n");
                $printer->text($row->nombreSala . "\n");
                $printer->setJustification(Printer::JUSTIFY_LEFT);
                $printer -> selectPrintMode(Printer::MODE_DOUBLE_HEIGHT);
                $printer->text("Fecha:".$row->fechaFuncion ."Hora: ".substr( $row->horaFuncion,0,5) . "  Bs. $row->precio\n");
                
                $printer->text("Butaca:".$row->letra."-".$row->columna."\n");
                $printer->text("-----------------------------------" . "\n");
                $printer->text("Cod:".$row->numboc . "\n");
                $printer->text("Trans: ".$idventa."\n");
                $printer->text("Usuario: ".$row->user."\n");
                $printer -> cut();
                $html = '
    <b>Fecha:</b> ' . $row->fechaFuncion . '<br>
    <b>Hora:</b> ' . $row->horaFuncion . '     <b>Bs.:</b> ' . $row->precio . '.- <br>
    <b>Butaca:</b> ' . $row->letra . '-' . $row->columna . '
    ------------------------------------
    Cód.:' . $row->numboc . ' <br>
    Trans:' . $idventa . '<br>
    Usuario:' . $row->user . '<br>
    ';
    
                /*pdf->writeHTML($html, false, false, false, false, ''); //Salida PDF
                $pdf->Output('reporte.pdf', 'I'); */
    
    
            }
    
            /* Pulse */
            //$printer -> pulse();
    
            /* Always close the printer! On some PrintConnectors, no actual
             * data is sent until the printer is closed. */
            $printer -> close();
            header("Location: ".base_url()."VentaCtrl");
            //header();
        }
    
    
}