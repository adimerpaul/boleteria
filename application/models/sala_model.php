<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sala_model extends CI_Model {

    public function listaSala()
    {
        $sala = $this->db->get('sala');
        return $sala->result_array();
    }

    public function store()
    {
        $sala= [
            'nroSala'=> $this->input->post('nroSala'),
            'nombreSala'=> $this->input->post('nombreSala'),
            'nroFila'=> $this->input->post('nroFila'),
            'nroColumna'=> $this->input->post('nroColumna'),
            'capacidad'=> $this->input->post('capacidad')
        ];
        $this->db->insert("sala",$sala);
        $idsala=$this->db->insert_id();
        $fila=$_POST['nroFila'];
        $columna=$_POST['nroColumna'];
        $letra = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
        for ($i=1;$i<=$fila;$i++){
            //echo $letra[$i-1];

            for ($j=1;$j<=$columna;$j++){
                //echo $letra[$i-1]." ".$j."<br>";
                if (isset($_POST[$letra[$i-1].$j])){
                    //echo $_POST[$letra[$i-1].$j]." ".$letra[$i-1]." ".$j."<br>";
                    $this->db->query("INSERT INTO asiento(fila,columna,letra,activo,idSala) VALUES('$i','$j','".$letra[$i-1]."','INACTIVO','$idsala')");
                }else{
                    $this->db->query("INSERT INTO asiento(fila,columna,letra,activo,idSala) VALUES('$i','$j','".$letra[$i-1]."','ACTIVO','$idsala')");
                }
            }
        }
    }
    public function update(){
        $sala= [
            'nroSala'=> $this->input->post('nroSala'),
            'nombreSala'=> $this->input->post('nombreSala'),
            'capacidad'=> $this->input->post('capacidad')
        ];
        $idsala=$this->input->post('idSala');
        $this->db->where('idSala', $idsala);
        $this->db->update("sala",$sala);
        $fila=$_POST['nroFila'];
        $columna=$_POST['nroColumna'];
        $letra = array("A", "B", "C", "D", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
        for ($i=1;$i<=$fila;$i++){
            for ($j=1;$j<=$columna;$j++){
                //echo $letra[$i-1]." ".$j."<br>";
                if (isset($_POST[$letra[$i-1].$j])){
                    //echo $_POST[$letra[$i-1].$j]." ".$letra[$i-1]." ".$j."<br>";
                    $this->db->query("UPDATE asiento SET activo='INACTIVO' WHERE idSala='$idsala' AND letra='".$letra[$i-1]."' AND columna='$j'");
                }
            }
        }

    }
    public function delete($idSala){
        $this->db->delete('asiento', array('idSala' => $idSala));
        $this->db->delete('sala', array('idSala' => $idSala));

    }
    public function manual(){
        $idsala=$this->input->post('idSala');
        $letra=$_POST['letra'];
        $numero=$_POST['numero'];
        $estado=$_POST['estado'];
        $this->db->query("UPDATE asiento SET activo='$estado' WHERE idSala='$idsala' AND letra='".$letra."' AND columna='$numero'");
        $this->db->query("UPDATE sala SET capacidad=(SELECT count(*) FROM asiento WHERE activo='ACTIVO' AND idSala=$idsala) WHERE idSala='$idsala'");

    }
}