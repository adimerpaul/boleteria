<?php
/**
 * Created by PhpStorm.
 * User: Adimer
 * Date: 26/03/2019
 * Time: 10:06
 */

class funcion_model extends CI_Model{
    public function store()
    {
        $query=$this->db->query("SELECT * FROM pelicula WHERE idpelicula='".$_POST['idpelicula']."'");
        $row=$query->row();
        $duracion=$row->duracion;
        $hora=$_POST['hora'];
        $newDate = strtotime ( '+'.$duracion.' minute' , strtotime ($hora) ) ;
        $horaFin = date ( 'Y-m-j H:i:s' , $newDate);

        $funcion= [
            'fechaInicio'=> $this->input->post('fecha1'),
            'fechaFin'=> $this->input->post('fecha2'),
            'horaInicio'=> $this->input->post('hora'),
            'horaFin'=> $horaFin,
            'idUsuario'=> $_SESSION['idUs'],
            'idSala'=> $this->input->post('idsala'),
            'idPelicula'=> $this->input->post('idpelicula'),
        ];

        return $this->db->insert("funcion",$funcion);


        //echo $this->session->userdata('nombre');
        //echo $_SESSION['idUs'];
    }

}