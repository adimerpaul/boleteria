<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('tcpdf.php');
include "qrlib.php";
include "NumerosEnLetras.php";
require 'autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class VentaCandyCtrl extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('usuarios_model');
        $this->load->model('temporal_model');
        $this->load->model('boletos_model');

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
            $this->load->view('ventacandy',$temporal);
            $dato2['js']="<script src='".base_url()."assets/js/ventacandy.js'></script>";
            $this->load->view('templates/footer',$dato2);
        }
        else redirect('');
    }
    public function productos(){
        $id=$_POST['id'];
        $query=$this->db->query("SELECT * FROM producto WHERE idRubro='$id' AND activo='on'");
        echo json_encode($query->result_array());
    }
    public function datosproductos(){
        $id=$_POST['id'];
        $query=$this->db->query("SELECT * FROM producto WHERE idProducto='$id' AND activo='on'");
        echo json_encode($query->result_array());
    }
    public function datoscombo(){
        $id=$_POST['id'];
        $query=$this->db->query("SELECT * FROM combo WHERE idCombo='$id' AND activo='on'");
        echo json_encode($query->result_array());
    }
    public function combos(){
        $query=$this->db->query("SELECT * FROM combo WHERE activo='on'");
        echo json_encode($query->result_array());
    }
    public function productospreferencia(){
        $id=$_POST['id'];
        $query=$this->db->query("SELECT * FROM productopreferencia p 
INNER JOIN preferencia pr ON p.idPreferencia=pr.idPreferencia
WHERE p.idProducto='$id' AND pr.activa='on'");
        echo json_encode($query->result_array());
    }
    public function guardartemporal(){

        $idProducto=$_POST['idProducto'];
        $pUnitario=$_POST['pUnitario'];
        $tCantidad=$_POST['tCantidad'];
        $nombreP=$_POST['nombreP'];
        $idUsuario=$_SESSION['idUs'];
        $this->db->query("INSERT INTO detalletemporal SET
idProducto='$idProducto',
pUnitario='$pUnitario',
tCantidad='$tCantidad',
nombreP='$nombreP',
idUsuario='$idUsuario'
");
        echo 1;

    }

    public function datostemporal(){
        $query=$this->db->query("SELECT * FROM detalletemporal WHERE idUsuario='".$_SESSION['idUs']."'");
        $myObj=($query->result_array());
        echo json_encode($myObj);
    }
    public function eliminartemporal(){
        $id=$_POST['id'];
        $this->db->query("DELETE FROM detalletemporal WHERE idDtemporal='$id'");
        echo 1;
    }
    function eliminartemporalall(){
        $this->db->query("DELETE FROM detalletemporal WHERE idUsuario='".$_SESSION['idUs']."'");
        echo 1;
    }
    function combopreferencia(){
        $id=$_POST['id'];
        $query=$this->db->query("SELECT c.idCombo,p.idProducto,pre.idPreferencia,c.cantidad,p.nombreProd,pre.nombrePref 
FROM comboproducto c
INNER JOIN producto p ON p.idProducto=c.idProducto
INNER JOIN productopreferencia pr ON p.idProducto=pr.idProducto
INNER JOIN preferencia pre ON pre.idPreferencia=pr.idPreferencia
WHERE c.idCombo='$id'");
        echo json_encode($query->result_array());
    }
    function guardartemporalcombo(){
        $idCombo=$_POST['idCombo'];
        $pUnitario=$_POST['pUnitario'];
        $tCantidad=$_POST['tCantidad'];
        $nombreP=$_POST['nombreP'];
        $idUsuario=$_SESSION['idUs'];
        $esCombo='SI';
        $this->db->query("INSERT INTO detalletemporal SET
idCombo='$idCombo',
pUnitario='$pUnitario',
tCantidad='$tCantidad',
nombreP='$nombreP',
idUsuario='$idUsuario',
esCombo='$esCombo'
");
        echo 1;
    }
    function buscarcliente(){
        $ci=$_POST['ci'];
        $query=$this->db->query("SELECT * FROM cliente WHERE cinit='$ci'");
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

    public function sctualizarCliente()
    {
        $ci = $_POST['ci'];
        $nombres = strtoupper($_POST['nombres']);
        $apellidos = strtoupper($_POST['apellidos']);
        $query=$this->db->query("SELECT * FROM cliente WHERE cinit='$ci'");
        if ($query->num_rows()>=1){
            $this->db->query("UPDATE cliente SET 
nombreCl='$nombres',
apellidoCl='$apellidos'
WHERE  cinit='$ci'");
        }else{
            $this->db->query("INSERT INTO cliente SET cinit='$ci',nombreCl='$nombres',apellidoCl='$apellidos'");
        }
        $query=$this->db->query("SELECT * FROM cliente WHERE cinit='$ci'");
        $row=$query->row();
        $idcliente=$row->idCliente;
        echo $idcliente;

    }
    /**
     * @param String $authorizationNumber Numero de autorizacion
     * @param String $invoiceNumber Numero de factura
     * @param String $nitci Número de Identificación Tributaria o Carnet de Identidad
     * @param String $dateOfTransaction fecha de transaccion de la forma AAAAMMDD
     * @param String $transactionAmount Monto de la transacción
     * @param String $dosageKey Llave de dosificación
     */
        public function insertarVenta(){
        $idcliente=$_POST['idcliente'];

        $total=$_POST['total'];
        $tipoVenta=$_POST['tipoVenta'];
        $cinit=$_POST['cinit'];
        $cancelado=$_POST['cancelado'];
        $query=$this->db->query("SELECT * FROM dosificacion WHERE tipo='CANDY' AND activo='1'");
        $row=$query->row();
        $authorizationNumber=$row->nroAutorizacion;
        $iddosif=$row->idDosif;
        $nroFactIni=$row->nroFactIni;
        $llaveDosif=$row->llaveDosif;
        $nroFactura=$row->nroFactura;
            if ($cinit!=0){
                if ($nroFactura==0){
                    $this->db->query("UPDATE dosificacion SET nroFactura='$nroFactIni' WHERE idDosif='$iddosif' AND tipo='CANDY' AND activo='1'");
                }else{
                    $this->db->query("UPDATE dosificacion SET nroFactura=nroFactura+1 WHERE idDosif='$iddosif' AND tipo='CANDY' AND activo='1'");
                }
                $query=$this->db->query("SELECT * FROM dosificacion WHERE tipo='CANDY' AND activo='1'");
                $row=$query->row();
                $invoiceNumber=$row->nroFactura;
                $codigo=$this->ventas_model->generate($authorizationNumber, $invoiceNumber, $cinit, date('Ymd'), $total, $llaveDosif);

                $codqr= '329448023|'.$invoiceNumber.'|'.$authorizationNumber.'|'.date('Ymd').'|'.$total.'|'.$total.'|'.$codigo.'|'.$cinit.'|0|0|0|0.00';

            }
            else{
            $codigo='';
            $codqr='';
            $invoiceNumber='';
            }
            $this->db->query("INSERT INTO ventacandy SET
            total='$total',
            tipoVenta='$tipoVenta',
            codigoControl='$codigo',
            codigoQR='$codqr',
            idCliente='$idcliente',
            idDosif='$iddosif',
            idUsuario='".$_SESSION['idUs']."',
            nroComprobante='$invoiceNumber',
            cancelado=$cancelado
            ");
            if($this->db->affected_rows()==0){
                $this->dosificaciones_model->errorenfacturacandy($iddosif);
                $idventa=0;}
                else
        $idventa= $this->db->insert_id();
                if($idventa!=0){
        $query=$this->db->query("SELECT * FROM detalletemporal WHERE idUsuario='".$_SESSION['idUs']."'");
        foreach ($query->result() as $row){
            $idproducto=$row->idProducto;
            $pUnitario=$row->pUnitario;
            $tCantidad=$row->tCantidad;
            $nombreP=$row->nombreP;
            $idCombo=$row->idCombo;
            $esCombo=$row->esCombo;
            $this->db->query("INSERT INTO detalle SET 
idVentaCandy='$idventa',
idProducto='$idproducto',
idCombo='$idCombo',
esCombo='$esCombo',
cantidad='$tCantidad',
pUnitario='$pUnitario',
idUsuario='".$_SESSION['idUs']."',
nombreP='$nombreP'
");


        }

        $this->db->query("DELETE FROM detalletemporal WHERE idUsuario='".$_SESSION['idUs']."'");
    }
            echo $idventa;
            exit;
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
        $idtarifa=$_POST['idtarifa'];
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
        $insertar=" INSERT INTO temporal (idAsiento, idFuncion, numeroFuncion, numeroSala, serieTarifa, codSala, fechaFuncion, idUser, fila, columna, costo, titulo, horaFuncion, idTarifa) VALUES ";
        $insertar=$insertar." (".$idAsiento.",".$idfuncion.",".$numeroFuncion.",".$numeroSala.",'".$serieTarifa."',".$codSala.",'".$fechaFuncion."',".$idUser.",".$fila.",".$columna.",".$precio.",'".$titulo."','".$horaFuncion."','".$idtarifa."')";
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
        $cupon='null';
        $costo2=0;
        if(is_numeric($idcupon) && $idcupon != 0 && $idcupon !='')
        { $total=0;
            $cupon=$idcupon;

        }
        else $cupon='null';

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
                idDosif,
                idCupon) VALUES (
                    '$total',
                    '$codControl',
                    '$codqr',
                    '$nroComprobante',
                    '$tipo',
                    '$idu',
                    '$idCl',
                    '$idd',
                    $cupon)";
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
                idDosif,
                idCupon) VALUES (
                    '$total',
                    '',
                    '',
                    '$nroComprobante',
                    '$tipo',
                    '$idu',
                    '$idCl',
                    '$idd',
                    $cupon)";
            $this->db->query($query);
        }
        $idVenta=$this->db->insert_id();


        $query=$this->db->query("SELECT * FROM `temporal` WHERE `idUser`='$idu'");
        // echo $idVenta;


        foreach($query->result() as $row){
            if(is_numeric($idcupon) && $idcupon != 0 && $idcupon !='')
                $costo2=0;
            else $costo2=$row->costo;

            $numsala = $row->numeroSala;
            $codigosala = $row->codSala;
            $originalDate = $row->fechaFuncion;
            $fechafuncion = date("Ymd", strtotime($originalDate));
            $nfuncion = $row->numeroFuncion;
            $serietarifa = $row->serieTarifa;
            $query2=$this->db->query("SELECT count(*) + 1 as num FROM boleto WHERE idFuncion='$row->idFuncion'");
            $numboleto=$query2->row()->num;
            $numboc="$numsala$codigosala$fechafuncion$nfuncion$serietarifa-$numboleto";
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
              `idCupon`,
              `tipoCompra`,
              `idTarifa`) VALUES (
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
                  '$costo2', 
                  '$row->titulo', 
                  '$idVenta',
                  $cupon,
                  '$tipo',
                  '$row->idTarifa');");
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
            if( empty($_POST['fecini']) || empty($_POST['fecfin']))
            {
                $venta['fecinicio'] = date('Y-m-d');
                $venta['fecfinal']= date('Y-m-d'); }

            else {
                $venta['fecinicio'] = $_POST['fecini'];
                $venta['fecfinal']=$_POST['fecfin'];}
            $this->load->view('templates/header', $dato);
            $this->load->view('listadoventa',$venta);
            $dato2['js']="<script src='".base_url()."assets/js/listaventa.js'></script>";
            $this->load->view('templates/footer',$dato2);
        }
        else redirect('');

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
INNER JOIN tarifa t ON t.idTarifa=b.idTarifa 
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
INNER JOIn tarifa t ON t.idTarifa=b.idTarifa
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
            $printer -> selectPrintMode(Printer::MODE_DOUBLE_HEIGHT);
            $printer->text("Fecha:".$row->fechaFuncion ."Hora: ".substr( $row->horaFuncion,0,5) . "  Bs. $row->precio\n");

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
        $query=$this->db->query("SELECT * FROM boleto b, subcupon c WHERE b.idCupon=c.idsubcupon and c.idsubcupon='$idcupon'");
        $row=$query->row();
        $myObj=($query->result_array());

        echo json_encode($myObj);

    }

    public function validaCupon(){

        $idcupon=$_POST['idcupon'];
        $query=$this->db->query("SELECT * FROM  cupon c, subCupon s WHERE  c.idCupon=s.idcupon and s.idsubcupon='$idcupon' and date(fechaFin) >= CURDATE()");
        $row=$query->row();
        $myObj=($query->result_array());
        echo json_encode($myObj);

    }

    public function UpDosificacion(){
        $verifica=$this->db->query("SELECT * FROM dosificacion WHERE tipo='CANDY' and activo=1 and fechaHasta < curdate()");
        $row=$verifica->row();
        if ($verifica->num_rows() == 1){
            $verifica2=$this->db->query("SELECT * FROM dosificacion where tipo='CANDY' and activo=0 and fechaDesde <= curdate() and fechaHasta >= curdate()");
            if($verifica2->num_rows()==1){
                $this->db->query("UPDATE dosificacion set activo=0 where fechaHasta < curdate() and tipo='CANDY'");
                $this->db->query("UPDATE dosificacion set activo=1 where fechaDesde <= curdate() and fechaHasta >= curdate() and tipo='CANDY'");
                echo true; }
            else
                echo false;
            echo true;
        }
        else echo false;

    }

    public function verifDosifcacion(){
        $fecha=$_POST['fdosif'];
        $query=$this->db->query("SELECT * FROM dosificacion WHERE tipo='CANDY' and activo=1 and fechaHasta > '$fecha'");
        $row=$query->row();
        if ($query->num_rows() == 1) echo true;
        else echo false;
    }

}
