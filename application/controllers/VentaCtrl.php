<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('tcpdf.php');
include "qrlib.php";
include "NumerosEnLetras.php";
class VentaCtrl extends CI_Controller {
    
	function __construct()
	{
		parent::__construct();
        $this->load->model('usuarios_model');
        $this->load->model('temporal_model');

        $this->load->model('ventas_model'); // This loads the library
        $this->load->model('dosificaciones_model');
        $this->load->model('boletos_model');
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
        $this->index();
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
        
       
       // echo $idVenta;

        $query=$this->db->query("SELECT * FROM `temporal` WHERE `idUser`='$idu'");
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
              `idVenta`) VALUES (
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
                  '$idVenta');");
        };
        //header("Location inde.php");

        $idUser=$this->session->userdata('idUs');
        $this->temporal_model->deleteAll($idUser);
        echo "ok";
        
    } 

    public function listaVenta(){
        if($this->session->userdata('login')==1){
            
            $user = $this->session->userdata('idUs');

            $dato=$this->usuarios_model->validaIngreso($user);
            $venta['venta'] = $this->ventas_model->listaventa();
            $this->load->view('templates/header', $dato);
                $this->load->view('listadoventa',$venta);
                $dato['js']="<script src='".base_url()."assets/js/listaventa.js'></script>";    
                $this->load->view('templates/footer',$dato);
        }
        else redirect('');    
    }


    public function verdatoventa(){
        $idventa=$_POST['idventa'];
        $query=$this->db->query("SELECT * FROM venta v
        join cliente c on v.idCliente = c.idCliente
        join usuario u on v.idUsuario = v.idUsuario
        WHERE idVenta='$idventa'");
        $row=$query->row();
        
        $myObj=($query->result_array())[0];

        echo json_encode($myObj);
    }

    public function devolucion(){
        $idventa=$_POST['idventa'];
        $user = $this->session->userdata('idUs');
        $this->ventas_model->devolVenta($idventa);
        $this->boletos_model->devolBoleto($idventa);
        $this->db->query("INSERT INTO devolucion (idVenta,idUsuario) values ('$idventa','$user')");
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

    public function imprimirF(){



$pdf = new TCPDF(PDF_PAGE_ORIENTATION, 'mm', array(80, 300), true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFont('times', '', 8);

// add a page
$pdf->AddPage();
$total="189.52";
$d = explode('.',$total);
$entero=$d[0];
$decimal=$d[1];
// set some text to print
$ca = "MULTI CINES PLAZA SRL.
Av. Tacna y Jaen - Oruro -Bolvia
NIT: 329448023 Tel: 591-25281290
Nro Autorizacion: 332401800005322
Nro Factura:13723
";

$html = "<b>Fecha: </b>".date('d/m/Y')."<br>
<b>Nombre Cliente:</b> Adimer paucl chambi ajata adimer <br>
<b>NIT Cliente:</b> 7336199013 <br>
<b>Vendedor:</b> Juanito benabides alcachofa <br>
<table>
<tr>
<td><b>Cantidad</b></td>
<td><b>Pelicula</b></td>
<td><b>Precio</b></td>
<td><b>Subtotal</b></td>
</tr>
<tr>
<td>3</td>
<td>Luna nueva corazon de leon 3D</td>
<td>50</td>
<td>150</td>
</tr>
<tr>
<td>3</td>
<td>Luna nueva corazon de leon 3D</td>
<td>50</td>
<td>150</td>
</tr>
<tr>
<td>3</td>
<td>Luna nueva corazon de leon 3D</td>
<td>50</td>
<td>150</td>
</tr>
<tr>
<td></td>
<td></td>
<td><b>TOTAL</b></td>
<td>$total</td>
</tr>
</table>
SON: ".NumerosEnLetras::convertir($entero)." $decimal/100 Bs. <br>
<b>Cod. de Control:</b> 00-90-84-71-8C <br>
<b>Fecha Lim. de Emision:</b> 01/04/2019".'
<div align="center">
</div>
'."ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PASI. EL USO ILICITO DE ESTA SERA SANCIONADO DEACUREDO A LEY <br>
 Ley N 453: Tienes derecho a un contratoequitativo sin descriminacion
";

$pdf->Write(0, $ca, '', 0, 'C', true, 0, false, false, 0);
$pdf->writeHTML($html, true, 0, true, 0, '');

$pdf->Output();

    }
public function imprimirR(){

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, 'mm', array(80, 150), true, 'UTF-8', false);

    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->SetFont('times', '', 8);

// add a page
    $pdf->AddPage();
    $total="189.52";
    $d = explode('.',$total);
    $entero=$d[0];
    $decimal=$d[1];
// set some text to print
    $ca = "MULTI CINES PLAZA SRL.
Av. Tacna y Jaen - Oruro -Bolvia
NIT: 329448023 Tel: 591-25281290
RECIBO
";
    $html = "<b>Fecha: </b>".date('d/m/Y')."<br>
<b>Nombre Cliente:</b> SN <br>
<b>NIT Cliente:</b> 0 <br>
<b>Vendedor:</b> Juanito benabides alcachofa <br>
<table>
<tr>
<td><b>Cantidad</b></td>
<td><b>Pelicula</b></td>
<td><b>Precio</b></td>
<td><b>Subtotal</b></td>
</tr>
<tr>
<td>3</td>
<td>Luna nueva corazon de leon 3D</td>
<td>50</td>
<td>150</td>
</tr>
<tr>
<td></td>
<td></td>
<td><b>TOTAL</b></td>
<td>$total</td>
</tr>
</table>
SON: ".NumerosEnLetras::convertir($entero)." $decimal/100 Bs. <br>
";

    $pdf->writeHTML($html, true, false, true, false, '');

    $pdf->Output();

}
function imprimirB(){
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, 'mm', array(80, 100), true, 'UTF-8');

    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->SetFont('times', '', 8);
    $pdf->SetMargins(0, 0, 0,0);
    $pdf->AddPage();
    $html = '
<style>
.titulo { 
  font-size: 18px;
  margin: 0px;
  padding: 0px;
  border: 0px;
}
</style><div  align="center">
<small class="titulo">Multicines</small><br>
<small class="titulo">Plaza</small><br>
NIT: 329448023 <br>

---------------------------------------------------<br>

AQUAMAN 3D <br>
SALA 1 <br>

Fecha: 21/12/2018 <br>
Hora: 15:00     Bs.: 40.- <br>

Butaca: F-8 <br>

-------------------------------------------------- <br>

Código: <br>
Trans: <br>
Usuario: <br>

</div>';
    $pdf->writeHTML($html);
    $pdf->Output();

}
public function qr(){
    $filename = 'temp/qr.png';
    $errorCorrectionLevel = 'L';
    $matrixPointSize = 4;
    QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);
}
}