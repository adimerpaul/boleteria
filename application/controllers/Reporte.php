<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('usuarios_model');


    }

    public function index()
    {
        if($this->session->userdata('login')==1){
            $user = $this->session->userdata('idUs');
            if (isset($_POST['fecha1']) ) 
            $data['fecha1']=$_POST['fecha1'];
            else
            $data['fecha1']=date('Y-m-d');
            $dato=$this->usuarios_model->validaIngreso($user);
            $this->load->view('templates/header', $dato);
            $this->load->view('reportefuncion',$data);
            $dato['js']="<script src='".base_url()."assets/js/reportefuncion.js'></script>";
            $this->load->view('templates/footer',$dato);
        }
        else redirect('');
    }

    public function repsemana(){
        if($this->session->userdata('login')==1){

            $user = $this->session->userdata('idUs');
            if (isset($_POST['fecha1']) || isset($_POST['fecha2'])) 
            {$data['fecha1']=$_POST['fecha1'];
            $data['fecha2']=$_POST['fecha2'];}
            else{
                $data['fecha1']=date('Y-m-d');
                $data['fecha2']=date('Y-m-d');}
            $dato=$this->usuarios_model->validaIngreso($user);
            $this->load->view('templates/header', $dato);
            $this->load->view('reportesemana',$data);
            $dato['js']="<script src='".base_url()."assets/js/reportesemana.js'></script>";
            $this->load->view('templates/footer',$dato);
        }
        else redirect('');
    }

    public function bordistribuidor(){
        if($this->session->userdata('login')==1){

            $user = $this->session->userdata('idUs');
            if (isset($_POST['fecha1'])  || isset($_POST['fecha2'])  || isset($_POST['pelicula'])) {
                $data['fecha1']=$_POST['fecha1'];
                $data['fecha2']=$_POST['fecha2'];
                $data['pelicula']=$_POST['pelicula'];
            }
            else
                {
                $data['fecha1']=date('Y-m-d');
               
                $data['fecha2']=date("Y-m-d",strtotime(date("Y-m-d")."+ 7 days"));
                $data['pelicula']=null;
            }
            $dato=$this->usuarios_model->validaIngreso($user);
            $this->load->view('templates/header', $dato);
            $this->load->view('borderauxdistribuidor',$data);
            $dato['js']="<script src='".base_url()."assets/js/reportedistribuidor.js'></script>";
            $this->load->view('templates/footer',$dato);
        }
        else redirect('');
    }

    public function porfuncion(){
        if($this->session->userdata('login')==1){

            $user = $this->session->userdata('idUs');
            if (isset($_POST['fecha1'])  || isset($_POST['fecha2'])  || isset($_POST['pelicula'])) {
                $data['fecha1']=$_POST['fecha1'];
                $data['fecha2']=$_POST['fecha2'];
            }
            else
                {
                $data['fecha1']=date('Y-m-d');               
                $data['fecha2']=date("Y-m-d",strtotime(date("Y-m-d")."+ 7 days"));
            }
            $dato=$this->usuarios_model->validaIngreso($user);
            $this->load->view('templates/header', $dato);
            $this->load->view('borderauxfuncion',$data);
            $dato['js']="<script src='".base_url()."assets/js/reportedistribuidor.js'></script>";
            $this->load->view('templates/footer',$dato);
        }
        else redirect('');
    }
    
    public function semanadistrib(){
        if($this->session->userdata('login')==1){

            $user = $this->session->userdata('idUs');
            if (isset($_POST['fecha1'])  || isset($_POST['fecha2']) ) {
                $data['fecha1']=$_POST['fecha1'];
                $data['fecha2']=$_POST['fecha2'];
            }
            else
                {
                $data['fecha1']=date('Y-m-d');               
                $data['fecha2']=date("Y-m-d",strtotime(date("Y-m-d")."+ 7 days"));
            }
            $dato=$this->usuarios_model->validaIngreso($user);
            $this->load->view('templates/header', $dato);
            $this->load->view('reportedistribuidor',$data);
            $dato['js']="<script src='".base_url()."assets/js/reportesemana.js'></script>";
            $this->load->view('templates/footer',$dato);
        }
        else redirect('');
    }
}

