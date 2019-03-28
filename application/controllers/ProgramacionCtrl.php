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

        header('Content-Type: application/json');

        $query=$this->db->query("SELECT 'eventos' as classNames,idFuncion as id, CONCAT(fecha,' ',horaInicio) `start` ,CONCAT(fecha,' ',horaFin) `end` , p.nombre as `title` FROM funcion f INNER JOIN sala s ON s.idSala=f.idSala INNER JOIN pelicula p ON p.idPelicula=f.idPelicula");
        //foreach($query->result() as $rows)
        //{
            //$row=$rows->row();
           // $events[] = $row;
        //}
        echo json_encode($query->result_array());
        exit;

        /*
         * $idempresa=$_POST['idempresa'];
        $query=$this->db->query("SELECT * FROM empresa WHERE idEmpresa='$idempresa'");
        $row=$query->row();

        $myObj=($query->result_array())[0];

        echo json_encode($myObj);*/
        /*

        $idpelicula=$_POST['idpelicula'];
        $query=$this->db->query("SELECT * FROM pelicula WHERE idPelicula='$idpelicula'");
        $row=$query->row();

        $myObj=($query->result_array())[0];

        echo json_encode($myObj);*/
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