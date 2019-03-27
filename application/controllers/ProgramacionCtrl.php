<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProgramacionCtrl extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('usuarios_model');
        $this->load->model('funcion_model');
    }

    public function index()
    {
        if($this->session->userdata('login')==1){
            $user = $this->session->userdata('idUs');
            $dato=$this->usuarios_model->validaIngreso($user);
            // $pelicula['pelicula'] = $this->peliculas_model->listaPeliculas();
            //$pelicula['distribuidor']=$this->peliculas_model->listaDistribuidores();
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
        $idpelicula=$_POST['idpelicula'];
        $query=$this->db->query("SELECT * FROM pelicula WHERE idPelicula='$idpelicula'");
        $row=$query->row();

        $myObj=($query->result_array())[0];

        echo json_encode($myObj);
    }

    public function update()
    {
        $this->peliculas_model->update();
        $this->peliculaver();
    }

    public function delete($idpelicula)
    {

        $this->peliculas_model->delete($idpelicula);
        $this->peliculaver();
    }

}