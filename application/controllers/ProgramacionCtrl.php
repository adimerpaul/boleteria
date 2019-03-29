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
    WHEN s.idSala='1' THEN 'blue'
    WHEN s.idSala='2' THEN 'fuchsia'
    WHEN s.idSala='3' THEN 'red'
    WHEN s.idSala='4' THEN 'yellow'
    WHEN s.idSala='5' THEN 'lime'
    WHEN s.idSala='6' THEN 'aqua'
    WHEN s.idSala='7' THEN 'black'
    
END)as color,'description for Click for Google' as description ,  idFuncion as id, CONCAT(fecha,' ',horaInicio) `start` ,CONCAT(fecha,' ',horaFin) `end` , p.nombre  as `title` FROM funcion f INNER JOIN sala s ON s.idSala=f.idSala INNER JOIN pelicula p ON p.idPelicula=f.idPelicula");
        $arr = array();
        $t='[';
        foreach ($query->result() as $row){
            $arr[] = $row;
            //echo json_encode($row).",";
           }
        $t=$t."{'id': '1','start': '2019-03-28 10:00:00','end': '2019-03-28 13:00:00','title': 'AQUAMAN 3D DOBLADA'}";
        $t=$t.']';
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