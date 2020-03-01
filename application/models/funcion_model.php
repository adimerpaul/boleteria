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
        $idsala=$this->input->post('idsala');

            $idTarifa=$this->input->post('idTarifa');
        for ($i=0;$i<$dias;$i++){
            $query=$this->db->query("SELECT count(*) as total FROM `funcion` WHERE `fecha`='$fecha' AND idSala='$idsala'");
            $row=$query->row();
            $nrofuncion=$row->total+1;
            $funcion= [
                'fecha'=> $fecha,
                'horaInicio'=> $this->input->post('hora'),
                'horaFin'=> $horaFin,
                'idUsuario'=> $_SESSION['idUs'],
                'idSala'=> $idsala,
                'idPelicula'=> $this->input->post('idpelicula'),
                'subtitulada'=> $subtitulada,
                'nroFuncion'=> $nrofuncion,
                'numerada'=> $numerada
            ];
            //echo $fecha."<br>";
            $this->db->insert("funcion",$funcion);
            $idFuncion=$this->db->insert_id();
            $this->db->query("INSERT INTO  funciontarifa (idFuncion, idTarifa) VALUES ('$idFuncion', '$idTarifa');");

            
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
        if (isset($_POST['activa2'])) {
            $activa='ACTIVADO';
        }else{
            $activa='INACTIVA';
        }
        if (isset($_POST['numerada'])) {
            $numerada='on';
        }else{
            $numerada='off';
        }
        $idfuncion=$_POST['idfuncion'];

        $funcion= [
            'horaInicio'=> $this->input->post('hora'),
            'horaFin'=> $horaFin,
            'idUsuario'=> $_SESSION['idUs'],
            'idSala'=> $this->input->post('idsala'),
            'idPelicula'=> $this->input->post('idpelicula'),
            'subtitulada'=> $subtitulada,
            'activa'=>$activa,
            'numerada'=> $numerada
        ];
        $this->db->where('idFuncion',$idfuncion);
        return $this->db->update('funcion',$funcion);
        //exit;
    }
    function delete($idempresa){
        $funcion= [
            'activa'=> 'INACTIVA'
        ];
        $this->db->where('idFuncion',$idempresa);
        return $this->db->update('funcion',$funcion);
    }


}