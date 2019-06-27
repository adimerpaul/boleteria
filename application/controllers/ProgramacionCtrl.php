<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProgramacionCtrl extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('usuarios_model');
        $this->load->model('funcion_model');
    }

    public function index($idsala="")
    {
        if($this->session->userdata('login')==1){
            $user = $this->session->userdata('idUs');
            $dato=$this->usuarios_model->validaIngreso($user);

            $this->load->view('templates/header', $dato);

            $this->load->view('programacionver');

            $dato2['js']="<script src='".base_url()."assets/js/programacion.js'></script>";

            $this->load->view('templates/footer',$dato2);
        }
        else redirect('');
    }

    public function store()
    {
        $this->funcion_model->store();
        //$this->index();
        header('Location: '.base_url().'ProgramacionCtrl');
    }

    public function datos(){

        //header('Content-Type: application/json');

        $query=$this->db->query("SELECT (CASE
    WHEN s.nroSala='1' THEN '#01579b'
    WHEN s.nroSala='2' THEN '#006064'
    WHEN s.nroSala='3' THEN '#1b5e20'
    WHEN s.nroSala='4' THEN '#ff5722'
    WHEN s.nroSala='5' THEN '#795548'
    WHEN s.nroSala='6' THEN '#e65100'
    WHEN s.nroSala='7' THEN '#827717'
    
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
FROM funcion f INNER JOIN sala s ON s.idSala=f.idSala INNER JOIN pelicula p ON p.idPelicula=f.idPelicula
AND fecha>=date_add(NOW(), INTERVAL -1 DAY)");
        $arr = array();
        foreach ($query->result() as $row){
            $arr[] = $row;
           }
        echo json_encode($arr);
        exit;

    }
    public function dato($idsala){

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
    public function update()
    {   $idfuncion=$_POST['idfuncion'];
        $this->funcion_model->update();
        $query=$this->db->query("DELETE FROM funciontarifa WHERE idFUncion=$idfuncion");
        $query=$this->db->query("SELECT * FROM tarifa WHERE activo=1");
        foreach ($query->result() as $row){
            if (isset($_POST['t'.$row->idTarifa])){
                //echo $_POST['t'.$row->idTarifa]."<br>";
                $this->db->query("INSERT INTO funciontarifa SET idTarifa='$row->idTarifa',idFuncion='$idfuncion'");
            }
        }
        //exit;
        header("Location: ".base_url()."ProgramacionCtrl");
    }
    public function verificar()
    {
        $idsala=$_POST['idsala'];
        //$query=$this->db->query("SELECT * FROM funcion WHERE idSala='$idsala' ORDER BY idfuncion DESC ");
        //return json_encode($query->result_array());
        $fecha=$_POST['fecha'];
        $horainicio=$_POST['horainicio'];
        $horafin=$_POST['horafin'];
        $query=$this->db->query("
        SELECT * FROM funcion 
WHERE fecha=date('$fecha') 
AND idSala='$idsala'
AND ((time('$horainicio')>=horaInicio AND time('$horainicio')<=ADDTIME(horaFin, '00:05:00'))
OR (time('$horafin')>=ADDTIME(horaInicio, '-00:05:00') AND time('$horafin')<=horaFin))
");
        if ($query->num_rows()>=1){
            echo "Sala ocupado";
        }else{
            echo "Sala libre";
        }
    }

    public function boletovendido()
    {
        $idfuncion=$_POST['idf'];
        $query=$this->db->query("
        SELECT * FROM boleto 
        WHERE idFuncion = $idfuncion
        ");
        if ($query->num_rows()>=1){
            echo true;
        }else{
            echo false;
        }
    }

    public function delete($idfuncion)
    {

        $this->funcion_model->delete($idfuncion);
        header("Location: ".base_url()."ProgramacionCtrl");
    }
    public function cantidadtarifa(){
        $idfuncion=$_POST['idfunction'];
        $query=$this->db->query("SELECT * FROM funciontarifa f INNER JOIN tarifa t ON f.idTarifa=t.idTarifa WHERE idFuncion=$idfuncion");
        $cantida=$query->num_rows();
        foreach ($query->result() as $row){
                echo "<h3>$row->serie $row->precio Bs.</h3>";
        }

    }
    function verifi(){
        $idfuncion=$_POST['idfuncion'];
        //$idfuncion=120;

        $query=$this->db->query("SELECT * FROM funciontarifa WHERE idFuncion=$idfuncion");
        $dato=[];
        foreach ($query->result() as $row){
            $dato[]=$row->idTarifa;
        }
        $query=$this->db->query("SELECT * FROM tarifa WHERE activo=1");
        foreach ($query->result() as $row){
            if (in_array($row->idTarifa,$dato)){
                echo "<input type='checkbox' checked name='t$row->idTarifa'> $row->serie  $row->precio Bs.<br>";
            }else{
                echo "<input type='checkbox' name='t$row->idTarifa'> $row->serie  $row->precio Bs.<br>";
            }
        }
    }


}