<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PeliculaCtrl extends CI_Controller {
    
	function __construct()
	{
		parent::__construct();
        $this->load->model('usuarios_model');
        $this->load->model('peliculas_model');
    }
    
    public function index()
    {
        if($this->session->userdata('login')==1){
            
            $user = $this->session->userdata('idUs');

            $dato=$this->usuarios_model->validaIngreso($user);
            $distribuidor['distribuidor']=$this->peliculas_model->listaDistribuidores();
                $this->load->view('templates/header', $dato);
                $this->load->view('peliculareg',$distribuidor);
                $dato['js']="<script></script>";    
                $this->load->view('templates/footer',$dato);
        }
        else redirect('');
    }

    public function store()
    {
        $this->peliculas_model->store();
        $this->index();
    }

    public function peliculaver()
    {

        if($this->session->userdata('login')==1){
            
            $user = $this->session->userdata('idUs');

            $dato=$this->usuarios_model->validaIngreso($user);
           
            $pelicula['pelicula'] = $this->peliculas_model->listaPeliculas();
            $pelicula['distribuidor']=$this->peliculas_model->listaDistribuidores();    
                $this->load->view('templates/header', $dato);
                $this->load->view('peliculaver',$pelicula);
                $dato2['js']="<script src='".base_url()."assets/js/pelicula.js'></script>";    
                $this->load->view('templates/footer',$dato2);
        }
        else redirect('');
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

}