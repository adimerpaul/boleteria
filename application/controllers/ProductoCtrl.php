<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductoCtrl extends CI_Controller {

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

            $this->load->view('productover');

            $dato2['js']="<script src='".base_url()."assets/js/producto.js'></script>";

            $this->load->view('templates/footer',$dato2);
        }
        else redirect('');
    }

    public function productoreg()
    {
        if($this->session->userdata('login')==1){
            $user = $this->session->userdata('idUs');
            $dato=$this->usuarios_model->validaIngreso($user);

            $this->load->view('templates/header', $dato);

            $this->load->view('productoreg');

            $dato2['js']="<script src=''></script>";

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



}