<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PreferenciaCtrl extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('usuarios_model');
        $this->load->model('preferencias_model');
    }

    public function index()
    {
        if($this->session->userdata('login')==1){
            $user = $this->session->userdata('idUs');
            $dato=$this->usuarios_model->validaIngreso($user);

            $this->load->view('templates/header', $dato);
            $this->load->view('preferenciaver');
            $dato2['js']="<script src='".base_url()."assets/js/preferncia.js'></script>";

            $this->load->view('templates/footer',$dato2);
        }
        else redirect('');
    }

    public function preferenciareg()
    {
        if($this->session->userdata('login')==1){
            $user = $this->session->userdata('idUs');
            $dato=$this->usuarios_model->validaIngreso($user);

            $this->load->view('templates/header', $dato);
            $this->load->view('preferenciareg');
            $dato2['js']="<script src=''></script>";


            $this->load->view('templates/footer',$dato2);
        }
        else redirect('');
    }


    public function store()
    {
        $this->funcion_model->store();
        //$this->index();
        header('Location: '.base_url().'PreferenciaCtrl');
    }



    public function update(){
        $this->preferencias_model->update();
        header("Location: ".base_url()."PreferenciaCtrl");
    }

/*
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


*/
}