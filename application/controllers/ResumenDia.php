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
            $dato['js']="<script></script>";
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

    }

    public function imprimir(){
        /*

        $nombre_impresora = "POS";

        $connector = new WindowsPrintConnector($nombre_impresora);
        $printer = new Printer($connector);


        $printer -> initialize();
        $ca = "MULTI CINES PLAZA SRL.
Av. Tacna y Jaen - Oruro -Bolvia
 Tel: 591-25281290
ORURO - BOLIVIA
-------------------------------
";
        $printer -> setJustification(Printer::JUSTIFY_CENTER);
        $printer->text($ca);
        $printer -> setJustification(Printer::JUSTIFY_LEFT);
        $html = "Fecha: ".date('Y-m-d h:m:s');
        $printer -> text($html."\n");
        $printer->text("NUMERRO    HORA      CLIENTE    TOTAL.\n");
        $printer->text("-----------------------------------"."\n");
        $total=0;
        $query=$this->db->query("SELECT * FROM venta v INNER JOIN cliente c ON v.idcliente=c.idcliente
                WHERE date(fechaVenta)=date('".date('Y-m-d')."')");
        foreach ($query->result() as $row){
            $printer->text( "    $row->idVenta  ".substr($row->fechaVenta,10,10)."         $row->apellidoCl     $row->total   \n");
            $total=$total+$row->total;
        }
        $printer -> setJustification(Printer::JUSTIFY_RIGHT);
        $ca="El total es: $total";
        $printer->text($ca);
        $printer -> setJustification(Printer::JUSTIFY_CENTER);
        $ca="          ENTREGE CONFORME              RECIBI CONFORME";$printer -> cut();
        $printer->text($ca);
        $printer -> cut();
        $printer -> close();
        */
        $nombre_impresora = "POS";


        $connector = new WindowsPrintConnector($nombre_impresora);
        $printer = new Printer($connector);

        /* Initialize */
        $printer -> initialize();

        /* Text */
//$printer -> text("Hello world\n");
//$printer -> cut();
        // set some text to print

        $ca = "MULTI CINES PLAZA SRL.
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
        $html = "Fecha: ".date('Y-m-d h:m:s');
        $printer -> text($html."\n");
        $html = "Usuario: ".$_SESSION['nombre']."\n";
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
WHERE b.idUsuario='".$_SESSION['idUs']."'
AND  date(b.fecha)=date('".date('Y-m-d')."')
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

}