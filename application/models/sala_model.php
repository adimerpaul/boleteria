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
            'capacidad'=> $this->input->post('capacidad'),
            'invert'=> $this->input->post('invert')

        ];
        return $this->db->insert("sala",$sala);
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