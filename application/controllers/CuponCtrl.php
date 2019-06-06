<?php
/**
 * Created by PhpStorm.
 * User: Adimer
 * Date: 02/05/2019
 * Time: 9:26
 */
defined('BASEPATH') OR exit('No direct script access allowed');
include "tcpdf.php";
class CuponCtrl extends CI_Controller{
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
            $this->load->view('cupon');
            $dato['js'] = "";
            $this->load->view('templates/footer', $dato);
        } else redirect('');
    }
    public  function store(){
        $fechafin=$_POST['fechafin'];
        $motivo= strtoupper($_POST['motivo']);

        $this->db->query("INSERT INTO cupon(fechafin,motivo,idusuario) VALUES('$fechafin','$motivo','".$_SESSION['idUs']."')");
        $idcupon=$this->db->insert_id();
        $cantidad=$_POST['cantidad'];
        for ($i=0;$i<$cantidad;$i++){
            $this->db->query("INSERT INTO subcupon(idcupon) VALUES('$idcupon')");
        }

        //exit;
        header("Location: ".base_url()."CuponCtrl");
    }
    public  function delete($idcupon){

        $this->db->query("DELETE FROM cupon WHERE idcupon='$idcupon'");
        header("Location: ".base_url()."CuponCtrl");
    }
    public  function verificar(){
        $idcupon=$_POST['idcupon'];
        $query=$this->db->query("SELECT * FROM cupon c INNER JOIN subcupon s ON c.idcupon=s.idcupon WHERE c.idcupon='$idcupon'");
        echo "<table class='table'>
            <thead class='thead-dark'>
                <tr>
                    <th scope='col'>Id</th>
                    <th scope='col'>Fecha</th>
                    <th scope='col'>Estado</th>
                </tr>                        
            </thead>";
        foreach($query->result() as $row){
            echo "<tr>
                    <td >$row->idsubcupon</td>
                    <td >$row->fecha</td>
                    <td >$row->estado</td>
                </tr>";
        }
        echo "</table>";
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
                    <td width="50"> Id='.$row->idsubcupon.'</td>
                    <td width="120" >Fecha= '.substr($row->fecha,0,10).'</td>
                </tr><tr><td></td><td></td></tr>';
        }
        $html=$html.'</table>';
        $pdf->writeHTML($html);
        $pdf->Output();
    }
}