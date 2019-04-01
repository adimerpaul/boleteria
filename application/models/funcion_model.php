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
        $newDate = strtotime ( '+'.$duracion.' minutes' , strtotime ($hora) ) ;
        $horaFin = date ( 'Y-m-j H:i:s' , $newDate);
        $fecha=$_POST['fecha1'];
        $dias=$_POST['dias'];
        if (isset($_POST['subtitulada'])) {
            $subtitulada='on';
        }else{
            $subtitulada='off';
        }
        if (isset($_POST['numerada'])) {
            $numerada='on';
        }else{
            $numerada='off';
        }
        for ($i=0;$i<$dias;$i++){
            $funcion= [
                'fecha'=> $fecha,
                'horaInicio'=> $this->input->post('hora'),
                'idTarifa'=> $this->input->post('idTarifa'),
                'horaFin'=> $horaFin,
                'idUsuario'=> $_SESSION['idUs'],
                'idSala'=> $this->input->post('idsala'),
                'idPelicula'=> $this->input->post('idpelicula'),
                'subtitulada'=> $subtitulada,
                'numerada'=> $numerada
            ];
            //echo $fecha."<br>";
            $this->db->insert("funcion",$funcion);
            $fecha = strtotime ( '+1 day' , strtotime ($fecha) );
            $fecha = date ( 'Y-m-d' , $fecha);

        }


        //echo $this->session->userdata('nombre');
        //echo $_SESSION['idUs'];
    }
    function update(){
        $query=$this->db->query("SELECT * FROM pelicula WHERE idpelicula='".$_POST['idpelicula']."'");
        $row=$query->row();
        $duracion=$row->duracion;
        $hora=$_POST['hora'];
        $newDate = strtotime ( '+'.$duracion.' minutes' , strtotime ($hora) ) ;
        $horaFin = date ( 'Y-m-j H:i:s' , $newDate);
        if (isset($_POST['subtitulada'])) {
            $subtitulada='on';
        }else{
            $subtitulada='off';
        }
        if (isset($_POST['numerada'])) {
            $numerada='on';
        }else{
            $numerada='off';
        }
        $idfuncion=$_POST['idfuncion'];

        $funcion= [
            'horaInicio'=> $this->input->post('hora'),
            'idTarifa'=> $this->input->post('idTarifa'),
            'horaFin'=> $horaFin,
            'idUsuario'=> $_SESSION['idUs'],
            'idSala'=> $this->input->post('idsala'),
            'idPelicula'=> $this->input->post('idpelicula'),
            'subtitulada'=> $subtitulada,
            'numerada'=> $numerada
        ];
        $this->db->where('idFuncion',$idfuncion);
        return $this->db->update('funcion',$funcion);
        //exit;
    }
    function delete($idempresa){
        return $this->db->delete('funcion', array('idFuncion' => $idempresa));
    }

}