<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class butacas_model extends CI_Model {

    public function listaButacas()
    {
        $this->db->where('activoBut',1);
        $butaca = $this->db->get('butaca');
        return $butaca->result_array();
    }

    public function listaButacasInac()
    {
        $this->db->where('ativoBut',0);
        $butaca = $this->db->get('butaca');
        return $butaca->result_array();
    }

    public function store()
    {
        
        $butaca= [
            'nombreBut'=> $this->input->post('nombre'),
            'descripcionBut'=> $this->input->post('descripcion'),
            'activoBut'=> $this->input->post('activo')
        ];
        return $this->db->insert("butaca",$butaca);
    }

    public function delete($idButaca){
        return $this->db->delete('butaca', array('idButaca' => $idButaca));
    }

    public function update()
    {
        $id=$this->input->post('idbutaca');
        $butaca= [
            'nombreBut'=> $this->input->post('nombre'),
            'descripcionBut'=> $this->input->post('descripcion'),
            'activoBut'=> $this->input->post('activo')
        ];
        $this->db->where('idButaca',$id);
        return $this->db->update('butaca',$butaca);
    }
}