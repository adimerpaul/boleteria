<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iva extends CI_Controller {

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
            if (isset($_POST['mes'])){
                $data['mes']=$_POST['mes'];
            }else{
                $data['mes']=date('m');
            }
            if (isset($_POST['anio'])){
                $data['anio']=$_POST['anio'];
            }else{
                $data['anio']=date('Y');
            }
            $this->load->view('templates/header', $dato);
            $this->load->view('iva',$data);
            $dato['js']="";
            $this->load->view('templates/footer',$dato);
        }
        else redirect('');
    }

    public function ivaCandy()
    {
        if($this->session->userdata('login')==1){

            $user = $this->session->userdata('idUs');
            $dato=$this->usuarios_model->validaIngreso($user);
            if (isset($_POST['mes'])){
                $data['mes']=$_POST['mes'];
            }else{
                $data['mes']=date('m');
            }
            if (isset($_POST['anio'])){
                $data['anio']=$_POST['anio'];
            }else{
                $data['anio']=date('Y');
            }
            $this->load->view('templates/header', $dato);
            $this->load->view('ivaCandy',$data);
            $dato['js']="";
            $this->load->view('templates/footer',$dato);
        }
        else redirect('');
    } 
    
    public function store()
    {
        $this->peliculas_model->store();
        $this->index();
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