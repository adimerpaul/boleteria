<?php
/**
 * Created by PhpStorm.
 * User: Adimer
 * Date: 02/05/2019
 * Time: 9:26
 */
defined('BASEPATH') OR exit('No direct script access allowed');
include "tcpdf.php";
class ComboCtrl extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('usuarios_model');
        $this->load->model('cupon_model');


    }

    public function index()
    {
        if ($this->session->userdata('login') == 1) {

            $user = $this->session->userdata('idUs');

            $dato = $this->usuarios_model->validaIngreso($user);
            $this->load->view('templates/header', $dato);
            $this->load->view('combo');
            $dato['js'] = "";
            $this->load->view('templates/footer', $dato);
        } else redirect('');
    }
    public  function store(){
        $nombre=$_POST['nombre'];
        $descripcion=$_POST['descripcion'];
        $precioCosto=$_POST['precioCosto'];
        $precioVenta=$_POST['precioVenta'];
        $imagen=$_POST['imagen'];
        $color=$_POST['color'];
        $utilidad=$precioVenta-$precioCosto-$precioVenta*0.13;

        $this->db->query("INSERT INTO combo(
nombreCombo,
descripcion,
precioCosto,
utilidad,
precioVenta,
imagen,
fondoColor) 
VALUES(
'$nombre',
'$descripcion',
'$precioCosto',
'$utilidad',
'$precioVenta',
'$imagen',
'$color'
)");
        $idcombo=$this->db->insert_id();

        $query=$this->db->query("SELECT * FROM producto WHERE activo='on'");
        foreach ($query->result() as $row){
            if (isset($_POST['p'.$row->idProducto])) {
                $cantidad=$_POST['c'.$row->idProducto];
                $this->db->query("INSERT INTO comboproducto(idCombo,idproducto,cantidad) VALUES('$idcombo','$row->idProducto','$cantidad')");
            }
        }

        header("Location: ".base_url()."ComboCtrl");
    }
    public  function update(){
        $nombre=$_POST['nombre'];
        $descripcion=$_POST['descripcion'];
        $precioCosto=$_POST['precioCosto'];
        $precioVenta=$_POST['precioVenta'];
        $imagen=$_POST['imagen'];
        $color=$_POST['color'];
        $idcombo=$_POST['idcombo'];
        if (isset($_POST['activo'])){
            $activo="on";
        }else{
            $activo="off";
        }
        $utilidad=$precioVenta-$precioCosto-$precioVenta*0.13;
        $this->db->query("UPDATE combo SET
nombreCombo='$nombre',
descripcion='$descripcion',
precioCosto='$precioCosto',
utilidad='$utilidad',
precioVenta='$precioVenta',
imagen='$imagen',
fondoColor='$color',
activo='$activo'
WHERE idCombo='$idcombo'
");
        $this->db->query("DELETE FROM comboproducto WHERE idCombo='$idcombo'");
        $query=$this->db->query("SELECT * FROM producto WHERE activo='on'");
        foreach ($query->result() as $row){
            if (isset($_POST['p'.$row->idProducto])) {
                $cantidad=$_POST['c'.$row->idProducto];
                $this->db->query("INSERT INTO comboproducto(idCombo,idproducto,cantidad) VALUES('$idcombo','$row->idProducto','$cantidad')");
            }
        }

        header("Location: ".base_url()."ComboCtrl");
    }
    public  function delete($idcupon){

        $this->db->query("DELETE FROM combo WHERE idCombo='$idcupon'");
        header("Location: ".base_url()."ComboCtrl");
    }
    public  function verificar(){
        $idcombo=$_POST['idcupon'];
        $query=$this->db->query("SELECT * FROM combo WHERE idCombo=$idcombo");
        $res=$query->result_array()[0];
        echo json_encode($res);
    }
    public  function datos(){
        $idcombo=$_POST['idcupon'];
        $query=$this->db->query("SELECT p.nombreProd,c.cantidad,p.idProducto FROM comboproducto c 
INNER JOIN producto p ON c.idProducto=p.idProducto
WHERE idCombo=$idcombo");
        $res=$query->result_array();
        echo json_encode($res);
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
