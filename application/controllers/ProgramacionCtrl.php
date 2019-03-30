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
FROM funcion f INNER JOIN sala s ON s.idSala=f.idSala INNER JOIN pelicula p ON p.idPelicula=f.idPelicula");
        $arr = array();
        foreach ($query->result() as $row){
            $arr[] = $row;
           }
        echo json_encode($arr);
        exit;

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