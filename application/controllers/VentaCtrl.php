<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('tcpdf.php');
include "qrlib.php";
include "NumerosEnLetras.php";
require 'autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class VentaCtrl extends CI_Controller {
    
	function __construct()
	{
		parent::__construct();
        $this->load->model('usuarios_model');
        $this->load->model('temporal_model');

        $this->load->model('ventas_model'); // This loads the library
        $this->load->model('dosificaciones_model');
	}

    public function index()
    {
        if($this->session->userdata('login')==1){

            $user = $this->session->userdata('idUs');

            $temporal['temporal'] = $this->temporal_model->listaTemporal();
            $dato=$this->usuarios_model->validaIngreso($user);
                $this->load->view('templates/header', $dato);
                $this->load->view('panelventa',$temporal);
                $dato2['js']="<script src='".base_url()."assets/js/venta.js'></script>";
                $this->load->view('templates/footer',$dato2);
        }
        else redirect('');
    }

    public function horario(){
        $idpelicula=$_POST['idpel'];
        $fecha=$_POST['fecha1'];

        $consulta="SELECT p.idPelicula,nombre,formato, s.idSala, nroSala, f.idFuncion,time_format(horaInicio, '%H:%i') as horaIn,time_format(horaFin, '%H:%i') as horaF, serie,precio, capacidad FROM pelicula p inner join funcion f on p.idPelicula = f.idPelicula inner join sala s on s.idSala = f.idSala inner join tarifa t on t.idTarifa = f.idTarifa where fecha ='$fecha' and  p.idPelicula = ".$idpelicula;
        $query=$this->db->query($consulta);
        $row=$query->row();
        $myObj=($query->result_array());
        echo json_encode($myObj);
    }
    public function relleno(){
	    $query=$this->db->query("SELECT * FROM temporal WHERE idUser='".$_SESSION['idUs']."'");
        $t="";
	    foreach ($query->result() as $row){
	        $t=$t."<tr>
                            <th scope='row'>1</th>
                            <td>$row->fechaFuncion $row->horaFuncion</td>
                            <td>$row->titulo</td>
                            <td class='costo'>$row->costo</td>
                            <td><a class='btn btn-outline-danger btn-sm' href='".base_url()."VentaCtrl/deleteTemporal/$row->idTemporal'><i class='far fa-trash-alt'></i></a></td>                                                        
                        </tr>";
        }
        echo $t;
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

    public function boletoFuncion()
    {
        $idfuncion = $_POST['idfun'];
        $consulta="SELECT 
        (Select count(*) from boleto b1 where b1.idFuncion=$idfuncion and b1.devuelto='NO') as vendido,
        (Select count(*) from temporal where idFuncion=$idfuncion) as temp,
        (Select count(*) from boleto b1 where b1.idFuncion=$idfuncion and b1.devuelto='SI') as devuelto,
        (select capacidad from sala s, funcion f where idFuncion=$idfuncion and s.idSala = f.idSala) as ctotal 
        FROM dual";
                $query=$this->db->query($consulta);
                $row=$query->row();
                $myObj=($query->result_array());
                echo json_encode($myObj);

    }

    public function datosBoleto(){
        $idfuncion = $_POST['dato'];
        //$query=$this->db->query("SELECT * FROM boleto WHERE idFuncion="+$idfuncion);

        $consulta=" SELECT a.idAsiento,s.idSala,columna,fila,letra,activo, ";
        $consulta=$consulta."IF(((select count(*) from boleto b  where a.idAsiento = b.idAsiento and b.idFuncion= f.idFuncion) > 0 OR";
        $consulta=$consulta." (select count(*) from temporal tm where a.idAsiento = tm.idAsiento and tm.idFuncion= f.idFuncion) > 0), true, false) as asignado, f.nroFuncion ";
        $consulta=$consulta."FROM sala s, funcion f, asiento a ";
        $consulta=$consulta."where s.idSala = f.idSala and s.idSala = a.idSala and f.idFuncion = ".$idfuncion." ORDER BY fila,columna DESC";
        $consulta2="select count(*) from temporal b where a.idAsiento = b.idAsiento and b.idFuncion= f.idFuncion";
        $query=$this->db->query($consulta);
        $row=$query->row();
        $myObj=($query->result_array());
        echo json_encode($myObj);
    }

    public function insertTemporal(){
        $idAsiento=$_POST['idasiento'];
        $idfuncion=$_POST['idfuncion'];
        $numeroFuncion=$_POST['numerofuncion'];
        $numeroSala=$_POST['numerosala'];
        $serieTarifa=$_POST['serietarifa'];
        $codSala=$_POST['codigosala'];
        $fechaFuncion=$_POST['fechafun'];
        $idUser=$this->session->userdata('idUs');
        $precio=$_POST['precio'];
        $columna=$_POST["columna"];
        $fila=$_POST["fila"];
        $titulo=$_POST["titulo"];
        $horaFuncion=$_POST["horafun"];
        $insertar=" INSERT INTO temporal (idAsiento, idFuncion, numeroFuncion, numeroSala, serieTarifa, codSala, fechaFuncion, idUser, fila, columna, costo, titulo, horaFuncion) VALUES ";
        $insertar=$insertar." (".$idAsiento.",".$idfuncion.",".$numeroFuncion.",".$numeroSala.",'".$serieTarifa."',".$codSala.",'".$fechaFuncion."',".$idUser.",".$fila.",".$columna.",".$precio.",'".$titulo."','".$horaFuncion."')";
        $this->db->query($insertar);
    }

    public function deleteTemporal($id){
        $this->temporal_model->deleteTemp($id);
        header("Location: ".base_url()."VentaCtrl");
    }

    public function deleteTempAll(){
        $idUser=$this->session->userdata('idUs');
        $this->temporal_model->deleteAll($idUser);


     header("Location: ".base_url()."VentaCtrl");
    }

    public function registrarVenta(){
        $cinit=$_POST['cinit'];
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $email=$_POST['email'];
        $telefono=$_POST['telefono'];
        $cliente= [
            'cinit'=> $cinit,
            'nombreCl'=> $nombre,
            'apellidoCl'=> $apellido,
            'email'=> $email,
            'telefono'=> $telefono
        ];
        $this->db->insert("cliente",$cliente);
        echo $this->db->insert_id();
        //eturn "aaa";
    }

    public function verdatoventa(){
        
        $idventa=$_POST['idventa'];

        $query=$this->db->query("SELECT * FROM venta v, cliente c, usuario u
        WHERE idVenta=$idventa and v.idCliente=c.idCliente and u.idUsuario=v.idUsuario
        ");
        $row=$query->row();
        $myObj=($query->result_array()[0]);
    
        echo json_encode($myObj); 

    }

    public function cControl(){

        $nautorizacion=$_POST['numeroa'];
        $nroFact=$_POST["nroFact"];
        $cinit=$_POST["cinit"];
        $fecVenta=$_POST["fecha"];
        $monto=$_POST["total"];
        $kDosif=$_POST["llave"];

        //echo $nautorizacion.$nroFact.$cinit.$fecVenta.$monto.$kDosif;
       echo $this->ventas_model->generate($nautorizacion,$nroFact,$cinit,$fecVenta,$monto,$kDosif);  // This calls the creation of ajax methods
       //echo "aa";
    }

    public function regVenta(){
        $total=$_POST['total'];
        $codControl=$_POST['ccontrol'];
        $codqr=$_POST['codigoqr'];
        $tipo=$_POST['tipo'];
        $idu=$this->session->userdata('idUs');
        $idCl=$_POST['idCliente'];
        $idd=$_POST['iddosif'];
        $idcupon=$_POST['cupon'];
        if($idcupon!='')
        { $total=0;
          $cupon=$idcupon;}
        else {
            $cupon=null;
         }
        if($tipo=='FACTURA'){

            $this->dosificaciones_model->updatenfactura($idd);
       $query=$this->db->query("SELECT idDosif,nroFactura from dosificacion where tipo='BOLETERIA' AND activo=1 ORDER BY idDosif DESC");
        $row=$query->row();
        $nroComprobante=$row->nroFactura;
            $query="INSERT INTO venta(
                total,
                codigoControl,
                codigoQR,
                nroComprobante,
                tipoVenta,
                idUsuario,
                idCliente,
                idDosif) VALUES (
                    '$total',
                    '$codControl',
                    '$codqr',
                    '$nroComprobante',
                    '$tipo',
                    '$idu',
                    '$idCl',
                    '$idd')";
        $this->db->query($query);
       // $query.= ",'".$codControl."','".$codqr."',(SELECT nroFactura from dosificacion where tipo='BOLETERIA' AND activo=1)";

    }
        else{
            $query=$this->db->query("SELECT max(nroComprobante)+1 as numero from venta where tipoVenta='RECIBO'");
        $row=$query->row();
        $nroComprobante=$row->numero;
            $query="INSERT INTO venta(
                total,
                codigoControl,
                codigoQR,
                nroComprobante,
                tipoVenta,
                idUsuario,
                idCliente,
                idDosif) VALUES (
                    '$total',
                    '',
                    '',
                    '$nroComprobante',
                    '$tipo',
                    '$idu',
                    '$idCl',
                    '$idd')";
        $this->db->query($query);
        }
        $idVenta=$this->db->insert_id();


        $query=$this->db->query("SELECT * FROM `temporal` WHERE `idUser`='$idu'");
        // echo $idVenta;

        foreach($query->result() as $row){
            $numsala = $row->numeroSala;
            $codigosala = $row->codSala;
            $originalDate = $row->fechaFuncion;
            $fechafuncion = date("Ymd", strtotime($originalDate));
            $nfuncion = $row->numeroFuncion;
            $serietarifa = $row->serieTarifa;
            $query2=$this->db->query("SELECT count(*) + 1 as num FROM boleto WHERE idFuncion='$row->idFuncion'");
            $numboleto=$query2->row()->num;
            $numboc="$numsala$codigosala$fechafuncion$nfuncion$serietarifa-$numboleto";
            if($idcupon=='')
            $cupon=null;
            else $cupon=$idcupon;
            $this->db->query("INSERT INTO `boleto` (
             `numboc`,
              `numero`,
              `idFuncion`, 
              `idUsuario`, 
              `idAsiento`, 
              `numeroFuncion`, 
              `numeroSala`, 
              `serieTarifa`, 
              `codigoSala`, 
              `fechaFuncion`, 
              `horaFuncion`, 
              `fila`, 
              `columna`, 
              `costo`, 
              `titulo`, 
              `idVenta`,
              `idCupon`) VALUES (
                  '$numboc', 
                  '$numboleto',
                  '$row->idFuncion', 
                  '$idu', 
                  '$row->idAsiento', 
                  '$nfuncion', 
                  '$numsala', 
                  '$serietarifa', 
                  '$codigosala', 
                  '$originalDate', 
                  '$row->horaFuncion', 
                  '$row->fila', 
                  '$row->columna', 
                  '$row->costo', 
                  '$row->titulo', 
                  '$idVenta',
                  '$cupon');");
        };
        //header("Location inde.php");

        $idUser=$this->session->userdata('idUs');
        $this->temporal_model->deleteAll($idUser);
        echo $idVenta;

    }

    public function listaVenta(){
        if($this->session->userdata('login')==1){

            $user = $this->session->userdata('idUs');

            $dato=$this->usuarios_model->validaIngreso($user);
            $venta['venta'] = $this->ventas_model->listaventa();
            $this->load->view('templates/header', $dato);
                $this->load->view('listadoventa',$venta);
                $dato2['js']="<script src='".base_url()."assets/js/listaventa.js'></script>";
                $this->load->view('templates/footer',$dato2);
        }
        else redirect('');

    }
    
public function imprimirF($idventa){
        $fecha=date('d/m/Y');
        $total=0;
        $hora=date("H:i:s");
        $query=$this->db->query("SELECT * FROM venta v 
INNER JOIn cliente c ON v.idCliente=c.idCliente 
INNER JOIn usuario u ON v.idUsuario=u.idUsuario
INNER JOIn dosificacion d ON d.idDosif=v.idDosif
WHERE idVenta='$idventa'");
        $row=$query->row();
        $nombre=$row->nombreCl;

        $apellido=$row->apellidoCl;
        $ci=$row->cinit;
        $nrocomprobante=$row->nroComprobante;

        $nroautorizacion=$row->nroAutorizacion;
        $vendero=$row->nombreUser;
        $codigocontrol=$row->codigoControl;
        $fechahasta=$row->fechaHasta;
        $leyenda=$row->leyenda;
        $qr=$row->codigoQR;
        $query=$this->db->query("SELECT b.idFuncion, p.nombre,p.formato,t.precio,COUNT(*) as cantidad 
FROM boleto b 
INNER JOIN funcion f ON f.idFuncion=b.idFuncion 
INNER JOIN tarifa t ON t.idTarifa=f.idTarifa 
INNER JOIN pelicula p ON p.idPelicula=f.idPelicula 
WHERE idVenta='$idventa'
GROUP BY b.idFuncion,p.nombre,p.formato,t.precio");
        $tabla="<table>
            <tr>".'
                <td width="15%"><b>Cant.</b></td>
                <td width="47%"><b>Pelicula</b></td>
                <td width="19%"><b>Precio</b></td>
                <td width="19%"><b>Subt.</b></td>
                '."
            </tr>
            ";
        foreach ($query->result() as $row){
            $nombrepelicula=$row->nombre;
            $formato=$row->formato;
            $precio=$row->precio;
            $cantidad=$row->cantidad;
            $subtotal=$cantidad*$precio;
            if ($formato==1){
                $for="3D";
            }else{
                $for="2D";
            }
            $tabla=$tabla."
    <tr>
<td>$cantidad</td>
<td>$nombrepelicula  $for</td>".
                '<td align="right">'.$precio.'</td>'.
                '<td align="right">'.$subtotal.'</td>'."
</tr>";
            $total=$total+$subtotal;
            $total=number_format($total,2);
        }


        $tabla=$tabla."<tr>
<td></td>
<td></td>
<td><b>Total</b></td>".
            '<td align="right">'.$total.'</td>'."
</tr>
<tr>
<td></td>
<td></td>
<td><b>Desc.</b></td>".
            '<td align="right">'.'0.00'.'</td>'."
</tr>
<tr>
<td></td>
<td></td>
<td><b>Pagar:</b></td>".
            '<td align="right">'.$total.'</td>'."
</tr>
</table>";


        $filename = 'temp/qr.png';
        $errorCorrectionLevel = 'L';
        $matrixPointSize = 4;
        QRcode::png($qr, $filename, $errorCorrectionLevel, $matrixPointSize, 2);




$pdf = new TCPDF(PDF_PAGE_ORIENTATION, 'mm', array(80, 250), true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFont('times', '', 10);
        $pdf->SetMargins(10, 0, 10,0);
// add a page
$pdf->AddPage();
$d = explode('.',$total);
$entero=$d[0];
$decimal=$d[1];
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

$html = "<b>Fecha: </b>".date('d/m/Y')." <b>Hora</b> $hora<br>
<b>Señor(es):</b> $nombre $apellido <br>
<b>NIT/CI:</b> $ci <br>
$tabla
SON: ".NumerosEnLetras::convertir($entero)." $decimal/100 Bs. <br>
------------------------------------------------
<b>Cod. de Control:</b> $codigocontrol <br>
<b>Fecha Lim. de Emision:</b> ". substr($fechahasta,0,10).'
<div align="center">
<img src="temp/qr.png" width="80" alt="">
</div>
'.'<div align="center">ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAIS. EL USO ILICITO DE ESTA SERA SANCIONADO DE ACUERDO A LEY</div> <br>'."
$leyenda <br>
<b>PUNTO:</b> ".gethostname()." <br>
<b>USUARIO:</b> $vendero <br>
<b>NUMERO:</b> $idventa <br>
";

$pdf->Write(0, $ca, '', 0, 'C', true, 0, false, false, 0);
$pdf->writeHTML($html, true, 0, true, 0, '');


        $query=$this->db->query("SELECT * FROM venta v 
INNER JOIn usuario u ON v.idUsuario=u.idUsuario
INNER JOIn boleto b ON b.idVenta=v.idVenta
INNER JOIn funcion f ON f.idFuncion=b.idFuncion
INNER JOIn pelicula p ON p.idPelicula=f.idPelicula
INNER JOIn sala s ON s.idSala=f.idSala
INNER JOIn tarifa t ON t.idTarifa=f.idTarifa
INNER JOIn asiento a ON a.idAsiento=b.idAsiento
WHERE v.idVenta='$idventa'");
foreach ($query->result() as $row){
    $pdf->SetFont('times', '', 11);
    $pdf->SetMargins(12, 0, 12,0);
    $pdf->AddPage();
    if ($row->formato==1){
        $for="3D";
    }else{
        $for="2D";
    }
    $html = '
<style>
.titulo { 
  font-size: 18px;
  margin: 0px;
  padding: 0px;
  border: 0px;
}
</style>
<div  align="center">
<small class="titulo">MULTICINES</small><br>
<small class="titulo">PLAZA</small><br>
NIT: 329448023 
-----------------------------
<small class="titulo">
'.$row->titulo.' <br>
'.$row->nombreSala.'
</small>
</div>
<b>Fecha:</b> '.$row->fechaFuncion.'<br>
<b>Hora:</b> '.$row->horaFuncion.'     <b>Bs.:</b> '.$row->precio.'.- <br>
<b>Butaca:</b> '.$row->letra.'-'.$row->columna.'
------------------------------------
Cód.:'.$row->numboc.' <br>
Trans:'.$idventa.'<br>
Usuario:'.$row->nombreUser.'<br>
';
    $pdf->writeHTML($html);

}




//$pdf->Output();
$pdf->Output('example_002.pdf', 'I'); 
//$pdf->Output('PDF/'.$nombre_archivo.'.pdf', 'F');


    }

public function printF($idventa){

    $fecha=date('d/m/Y');
    $total=0;
    $hora=date("H:i:s");
    $query=$this->db->query("SELECT * FROM venta v 
INNER JOIn cliente c ON v.idCliente=c.idCliente 
INNER JOIn usuario u ON v.idUsuario=u.idUsuario
INNER JOIn dosificacion d ON d.idDosif=v.idDosif
WHERE idVenta='$idventa'");
    $row=$query->row();
    $nombre=$row->nombreCl;

    $apellido=$row->apellidoCl;
    $ci=$row->cinit;
    $nrocomprobante=$row->nroComprobante;

    $nroautorizacion=$row->nroAutorizacion;
    $vendero=$row->nombreUser;
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
//$printer -> text("Hello world\n");
//$printer -> cut();
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

    $query=$this->db->query("SELECT b.idFuncion, p.nombre,p.formato,t.precio,COUNT(*) as cantidad 
FROM boleto b 
INNER JOIN funcion f ON f.idFuncion=b.idFuncion 
INNER JOIN tarifa t ON t.idTarifa=f.idTarifa 
INNER JOIN pelicula p ON p.idPelicula=f.idPelicula 
WHERE idVenta='$idventa'
GROUP BY b.idFuncion,p.nombre,p.formato,t.precio");
    $printer->setJustification(Printer::JUSTIFY_LEFT);
    $printer->text("CANT    DESCRIPCION      P.U    IMP.\n");
    $printer->text("-----------------------------------"."\n");
    foreach ($query->result() as $row){
        $nombrepelicula=$row->nombre;
        $formato=$row->formato;
        $precio=$row->precio;
        $cantidad=$row->cantidad;
        $subtotal=$cantidad*$precio;
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

$query=$this->db->query("SELECT * FROM venta v 
INNER JOIn usuario u ON v.idUsuario=u.idUsuario
INNER JOIn boleto b ON b.idVenta=v.idVenta
INNER JOIn funcion f ON f.idFuncion=b.idFuncion
INNER JOIn pelicula p ON p.idPelicula=f.idPelicula
INNER JOIn sala s ON s.idSala=f.idSala
INNER JOIn tarifa t ON t.idTarifa=f.idTarifa
INNER JOIn asiento a ON a.idAsiento=b.idAsiento
WHERE v.idVenta='$idventa'");
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
        $printer -> selectPrintMode(Printer::MODE_FONT_B);
        $printer->text("Fecha:".$row->fechaFuncion . "\n");
        $printer->text("Hora: ".substr( $row->horaFuncion,0,5) . "  Bs. $row->precio\n");
        $printer->text("Butaca:".$row->letra."-".$row->columna."\n");
        $printer->text("-----------------------------------" . "\n");
        $printer->text("Cod:".$row->numboc . "\n");
        $printer->text("Trans: ".$idventa."\n");
        $printer->text("Usuario: ".$row->nombreUser."\n");
        $printer -> cut();
        $html = '
<b>Fecha:</b> ' . $row->fechaFuncion . '<br>
<b>Hora:</b> ' . $row->horaFuncion . '     <b>Bs.:</b> ' . $row->precio . '.- <br>
<b>Butaca:</b> ' . $row->letra . '-' . $row->columna . '
------------------------------------
Cód.:' . $row->numboc . ' <br>
Trans:' . $idventa . '<br>
Usuario:' . $row->nombreUser . '<br>
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

public function imprimirR($idventa){
	$fecha=date('d/m/Y');
	$total=0;
	$hora=date("H:i:s");
    $query=$this->db->query("SELECT * FROM venta v 
INNER JOIn cliente c ON v.idCliente=c.idCliente 
INNER JOIn usuario u ON v.idUsuario=u.idUsuario
WHERE idVenta='$idventa'");
    $row=$query->row();
    $nombre=$row->nombreCl;
    $apellido=$row->apellidoCl;
    $ci=$row->cinit;
    $vendero=$row->nombreUser;
    $query=$this->db->query("SELECT b.idFuncion, p.nombre,p.formato,t.precio,COUNT(*) as cantidad 
FROM boleto b 
INNER JOIN funcion f ON f.idFuncion=b.idFuncion 
INNER JOIN tarifa t ON t.idTarifa=f.idTarifa 
INNER JOIN pelicula p ON p.idPelicula=f.idPelicula 
WHERE idVenta='$idventa'
GROUP BY b.idFuncion,p.nombre,p.formato,t.precio");
    $tabla="<table>
            <tr>".'
                <td width="12%"><b>Cant.</b></td>
                <td width="50%"><b>Pelicula</b></td>
                <td width="20%"><b>Precio</b></td>
                <td width="18%"><b>Subtotal</b></td>
                '."
            </tr>
            ";
    foreach ($query->result() as $row){
    $nombrepelicula=$row->nombre;
    $formato=$row->formato;
    $precio=$row->precio;
    $cantidad=$row->cantidad;
    $subtotal=$cantidad*$precio;
    if ($formato==1){
        $for="3D";
    }else{
        $for="2D";
    }
    $tabla=$tabla."
    <tr>
<td>$cantidad</td>
<td>$nombrepelicula  $for</td>".
'<td align="right">'.$precio.'</td>'.
'<td align="right">'.$subtotal.'</td>'."
</tr>";
    $total=$total+$subtotal;
    $total=number_format($total,2);
    }


    $tabla=$tabla."<tr>
<td></td>
<td></td>
<td><b>Total</b></td>".
        '<td align="right">'.$total.'</td>'."
</tr>
<tr>
<td></td>
<td></td>
<td><b>Desc.</b></td>".
        '<td align="right">'.'0.00'.'</td>'."
</tr>
<tr>
<td></td>
<td></td>
<td><b>a Pagar:</b></td>".
        '<td align="right">'.$total.'</td>'."
</tr>
</table>";

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, 'mm', array(80, 150), true, 'UTF-8', false);

    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->SetFont('times', '', 8);
    $pdf->SetMargins(5, 0, 5,0);

// add a page
    $pdf->AddPage();
    $d = explode('.',$total);
    $entero=$d[0];
    $decimal=$d[1];
// set some text to print
    $ca = "MULTI CINES PLAZA SRL.
Av. Tacna y Jaen - Oruro -Bolvia
SUCURSAL N: 0
Tel: 591-25281290
";


$html = "
".'<h3 align="center">ORDEN CANCELADA</h3>'."
<b>Fecha: </b>".date('d/m/Y')."<br>
<b>Nombre Cliente:</b> $nombre $apellido <br>
<b>NIT Cliente:</b> $ci <br>
$tabla
SON: ".NumerosEnLetras::convertir($entero)." $decimal/100 Bs. <br>
<b>Vendedor:</b> $vendero <br>
Hora: $hora
";

    $pdf->Write(0, $ca, '', 0, 'C', true, 0, false, false, 0);
    $pdf->writeHTML($html, true, false, true, false, '');

    $pdf->Output();

}
    public function printR($idventa){

        $fecha=date('d/m/Y');
        $total=0;
        $hora=date("H:i:s");
        $query=$this->db->query("SELECT * FROM venta v 
INNER JOIn cliente c ON v.idCliente=c.idCliente 
INNER JOIn usuario u ON v.idUsuario=u.idUsuario
INNER JOIn dosificacion d ON d.idDosif=v.idDosif
WHERE idVenta='$idventa'");
        $row=$query->row();
        $nombre=$row->nombreCl;
        $fechaVenta=$row->fechaVenta;

        $apellido=$row->apellidoCl;
        $ci=$row->cinit;
        $nrocomprobante=$row->nroComprobante;

        $nroautorizacion=$row->nroAutorizacion;
        $vendero=$row->nombreUser;
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
/*$tabla
SON: ".NumerosEnLetras::convertir($entero)." $decimal/100 Bs. <br>
<b>Vendedor:</b> $vendero <br>
Hora: $hora
";*/


        $printer -> text($html."\n");

        $query=$this->db->query("SELECT b.idFuncion, p.nombre,p.formato,t.precio,COUNT(*) as cantidad 
FROM boleto b 
INNER JOIN funcion f ON f.idFuncion=b.idFuncion 
INNER JOIN tarifa t ON t.idTarifa=f.idTarifa 
INNER JOIN pelicula p ON p.idPelicula=f.idPelicula 
WHERE idVenta='$idventa'
GROUP BY b.idFuncion,p.nombre,p.formato,t.precio");
        $printer->setJustification(Printer::JUSTIFY_LEFT);
        $printer->text("CANT    DESCRIPCION      P.U    IMP.\n");
        $printer->text("-----------------------------------"."\n");
        foreach ($query->result() as $row){
            $nombrepelicula=$row->nombre;
            $formato=$row->formato;
            $precio=$row->precio;
            $cantidad=$row->cantidad;
            $subtotal=$cantidad*$precio;
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
/*
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
*/
        $printer->setJustification(Printer::JUSTIFY_LEFT);
  //      $printer->text($leyenda."\n");
        $printer->text("PUNTO: ".gethostname()." \n");
        $printer->text("USUARIO: $vendero \n");
        $printer->text("NUMERO: $idventa \n");

        $printer -> cut();
        /*IMPRESION DE BOLETOS*/
        $query=$this->db->query("SELECT * FROM venta v 
INNER JOIn usuario u ON v.idUsuario=u.idUsuario
INNER JOIn boleto b ON b.idVenta=v.idVenta
INNER JOIn funcion f ON f.idFuncion=b.idFuncion
INNER JOIn pelicula p ON p.idPelicula=f.idPelicula
INNER JOIn sala s ON s.idSala=f.idSala
INNER JOIn tarifa t ON t.idTarifa=f.idTarifa
INNER JOIn asiento a ON a.idAsiento=b.idAsiento
WHERE v.idVenta='$idventa'");
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
            $printer -> selectPrintMode(Printer::MODE_FONT_B);
            $printer->text("Fecha:".$row->fechaFuncion . "\n");
            $printer->text("Hora: ".substr( $row->horaFuncion,0,5) . "  Bs. $row->precio\n");
            $printer->text("Butaca:".$row->letra."-".$row->columna."\n");
            $printer->text("-----------------------------------" . "\n");
            $printer->text("Cod:".$row->numboc . "\n");
            $printer->text("Trans: ".$idventa."\n");
            $printer->text("Usuario: ".$row->nombreUser."\n");
            $printer -> cut();
            $html = '
<b>Fecha:</b> ' . $row->fechaFuncion . '<br>
<b>Hora:</b> ' . $row->horaFuncion . '     <b>Bs.:</b> ' . $row->precio . '.- <br>
<b>Butaca:</b> ' . $row->letra . '-' . $row->columna . '
------------------------------------
Cód.:' . $row->numboc . ' <br>
Trans:' . $idventa . '<br>
Usuario:' . $row->nombreUser . '<br>
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

function imprimirB(){
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, 'mm', array(80, 110), true, 'UTF-8');
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->SetFont('times', '', 13);
    $pdf->SetMargins(12, 0, 12,0);
    $pdf->AddPage();
    $html = '
<style>
.titulo { 
  font-size: 18px;
  margin: 0px;
  padding: 0px;
  border: 0px;
}
</style>
<div  align="center">
<small class="titulo">MULTICINES</small><br>
<small class="titulo">PLAZA</small><br>
NIT: 329448023 
-----------------------------
<small class="titulo">
AQUAMAN 3D <br>
SALA 1
</small>
</div>
<b>Fecha:</b> '.date('d/m/Y').'<br>
<b>Hora:</b> 15:00     <b>Bs.:</b> 40.- <br>
<b>Butaca:</b> F-8
------------------------------------
Código <br>
Trans: <br>
Usuario: <br>
';
    $pdf->writeHTML($html);
    $pdf->Output();
//<?php echo gethostname();//
}
public function qr(){
    $filename = 'temp/qr.png';
    $errorCorrectionLevel = 'L';
    $matrixPointSize = 4;
    QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);
}

public function devolucion(){
    $idventa=$_POST['idventa'];
    $user = $this->session->userdata('idUs');
    $this->ventas_model->devolVenta($idventa);
    $this->boletos_model->devolBoleto($idventa);
    $this->db->query("INSERT INTO devolucion (idVenta,idUsuario) values ('$idventa','$user')");
    echo $this->db->insert_id();
}

public function devolucionfuncion($id){
    
    $user = $this->session->userdata('idUs');
    //$this->ventas_model->devolVenta($idventa);
    //$this->boletos_model->devolBoleto($idventa);
    //$this->db->query("INSERT INTO devolucion (idVenta,idUsuario) values ('$idventa','$user')");
    echo $this->db->insert_id();
}

public function listaBoletos(){
    $idventa=$_POST['idventa'];
    $query=$this->db->query("SELECT * FROM boleto
    WHERE idVenta='$idventa'");
    $row=$query->row();
    $myObj=($query->result_array());

    echo json_encode($myObj); 
}

public function paneldevol($id="")
{
    if($this->session->userdata('login')==1){
        $user = $this->session->userdata('idUs');
        $dato=$this->usuarios_model->validaIngreso($user);
        $this->load->view('templates/header', $dato);

        $this->load->view('paneldevolucion');

        $dato2['js']="<script src='".base_url()."assets/js/progdevolucion.js'></script>";

        $this->load->view('templates/footer',$dato2);
    }
    else redirect('');
}
public function programacion1(){

    //header('Content-Type: application/json');

    $query=$this->db->query("SELECT (CASE
WHEN s.idSala='1' THEN '#01579b'
WHEN s.idSala='2' THEN '#006064'
WHEN s.idSala='3' THEN '#1b5e20'
WHEN s.idSala='4' THEN '#ff5722'
WHEN s.idSala='5' THEN '#795548'
WHEN s.idSala='6' THEN '#e65100'
WHEN s.idSala='7' THEN '#827717'

END)as 'color'
,  idFuncion as id
, CONCAT(fecha,' ',horaInicio) as 'start' 
,CONCAT(fecha,' ',horaFin) as 'end'
, CONCAT(p.nombre)  as 'title' 
, s.idSala
, p.idPelicula
,fecha 
,horaInicio
,subtitulada
,numerada
,idTarifa
,nroSala
,nroFuncion
,nombre
,formato
,(SELECT count(*) from boleto b where b.idFuncion = f.idFuncion and devuelto = 'NO') as vendido
,(SELECT count(*) from boleto b where b.idFuncion = f.idFuncion and devuelto = 'SI') as devuelto
FROM funcion f INNER JOIN sala s ON s.idSala=f.idSala INNER JOIN pelicula p ON p.idPelicula=f.idPelicula

AND fecha>=date_add(NOW(), INTERVAL -1 DAY)");
    $arr = array();
    foreach ($query->result() as $row){
        $arr[] = $row;
       }
    echo json_encode($arr);
    exit;

}
public function programacion2($idsala){

    //header('Content-Type: application/json');

    $query=$this->db->query("SELECT (CASE
WHEN s.idSala='1' THEN '#01579b'
WHEN s.idSala='2' THEN '#006064'
WHEN s.idSala='3' THEN '#1b5e20'
WHEN s.idSala='4' THEN '#ff5722'
WHEN s.idSala='5' THEN '#795548'
WHEN s.idSala='6' THEN '#e65100'
WHEN s.idSala='7' THEN '#827717'

END)as 'color'
,  idFuncion as id
, CONCAT(fecha,' ',horaInicio) as 'start' 
,CONCAT(fecha,' ',horaFin) as 'end'
, CONCAT(p.nombre)  as 'title' 
, s.idSala
, p.idPelicula
,fecha 
,horaInicio
,subtitulada
,numerada
,idTarifa 
,nroSala
,nroFuncion
,nombre
,formato
,(SELECT count(*) from boleto b where b.idFuncion = f.idFuncion and devuelto = 'NO') as vendido
,(SELECT count(*) from boleto b where b.idFuncion = f.idFuncion and devuelto = 'SI') as devuelto
FROM funcion f INNER JOIN sala s ON s.idSala=f.idSala INNER JOIN pelicula p ON p.idPelicula=f.idPelicula
WHERE
s.idSala='$idsala'");
    $arr = array();
    foreach ($query->result() as $row){
        $arr[] = $row;
    }
    echo json_encode($arr);
    exit;

}

public function validaCuponreg(){
          
    $idcupon=$_POST['idcupon'];
    $query=$this->db->query("SELECT * FROM boleto b, cupon c WHERE b.idCupon=c.idCupon and c.idCupon='$idcupon'");
    $row=$query->row();
    $myObj=($query->result_array());

    echo json_encode($myObj); 

}

public function validaCupon(){
          
    $idcupon=$_POST['idcupon'];
    $query=$this->db->query("SELECT * FROM  cupon c WHERE  c.idCupon='$idcupon' and date(fechaFin) > CURDATE()");
    $row=$query->row();
    $myObj=($query->result_array());

    echo json_encode($myObj); 

}
}