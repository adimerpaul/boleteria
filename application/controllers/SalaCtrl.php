<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SalaCtrl extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('usuarios_model');
        $this->load->model('sala_model');


    }

    public function index()
    {
        if($this->session->userdata('login')==1){

            $user = $this->session->userdata('idUs');

            $dato=$this->usuarios_model->validaIngreso($user);
            $this->load->view('templates/header', $dato);
            $this->load->view('salareg');
            $dato['js']="<script src='".base_url()."assets/js/salareg.js'></script>";
            $this->load->view('templates/footer',$dato);
        }
        else redirect('');
    }

    public function salaver()
    {

        if($this->session->userdata('login')==1){

            $user = $this->session->userdata('idUs');

            $dato=$this->usuarios_model->validaIngreso($user);
            $distrib['sala'] = $this->sala_model->listaSala();
            $this->load->view('templates/header', $dato);
            $this->load->view('salaver',$distrib);
            $dato['js']="<script src='".base_url()."assets/js/sala.js'></script>";
            $this->load->view('templates/footer',$dato);
        }
        else redirect('');
    }

    public function store()
    {
        $this->sala_model->store();
        header("Location: ".base_url()."SalaCtrl");
       // echo $_POST['B1'];
    }

    public function datos(){
        $tabla=$_POST['tabla'];
        $where=$_POST['where'];
        $dato=$_POST['dato'];
        $query=$this->db->query("SELECT * FROM $tabla WHERE $where='$dato'");
        $myObj=($query->result_array())[0];
        echo json_encode($myObj);
    }
    public function update()
    {

        $this->sala_model->update();
        header("Location: ".base_url()."SalaCtrl/Salaver");
    }

    public function delete($idSala)
    {

        $this->sala_model->delete($idSala);
        header("Location: ".base_url()."SalaCtrl/Salaver");
    }

}
