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
        $letra = array("A", "B", "C", "D", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
        for ($i=1;$i<=$fila;$i++){
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
            'nroFila'=> $this->input->post('nroFila'),
            'nroColumna'=> $this->input->post('nroColumna'),
            'capacidad'=> $this->input->post('capacidad'),
            'invert'=> $this->input->post('invert')

        ];
        $this->db->where('idSala', $this->input->post('idSala'));
        return $this->db->update("sala",$sala);
    }
    public function delete($idSala){
        return $this->db->delete('sala', array('idSala' => $idSala));
    }
}