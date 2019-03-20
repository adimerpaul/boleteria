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
        $this->db->where('activoBut',0);
        $butaca = $this->db->get('butaca');
        return $butaca->result_array();
    }

    public function store()
    {
        $act=0;
        if($this->input->post('activo')=='on'or null)
        $act=1;
        $butaca= [
            'nombreBut'=> $this->input->post('nombre'),
            'descripcionBut'=> $this->input->post('descripcion'),
            'activoBut'=>$act
        ];
        return $this->db->insert("butaca",$butaca);
    }

    public function delete($idButaca){
        return $this->db->delete('butaca', array('idButaca' => $idButaca));
    }

    public function update()
    {
        $act=0;
        if($this->input->post('activo')=='on'or null)
        $act=1;
        $id=$this->input->post('idbutaca');
        $butaca= [
            'nombreBut'=> $this->input->post('nombre'),
            'descripcionBut'=> $this->input->post('descripcion'),
            'activoBut'=>$act
        ];
        $this->db->where('idButaca',$id);
        return $this->db->update('butaca',$butaca);
    }
}