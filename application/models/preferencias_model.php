<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class preferencias_model extends CI_Model {


    public function listaPreferencia()
    {
        $preferencia = $this->db->get('preferencia');
        return $preferencia->result_array();
    }

    public function store()
    {

        if ($this->input->post('activo') == "on"  or null)
        $activo=1;
        else
        $activo=0;

        $preferencia= [
            'nombrePref'=> $this->input->post('nombre'),
            'descripcion'=> $this->input->post('desc'),
            'activo'=> $activo
        ];
        return $this->db->insert("preferencia",$preferencia);
    } 

    public function update()
    {
        $id=$this->input->post('idpreferencia');

        if(($this->input->post('activo'))=="on")
        $activo=1;
        else
        $activo=0;
        
        $preferencia= [
            'nombrePref'=> $this->input->post('nombre'),
            'descripcion'=> $this->input->post('desc'),
            'activo'=> $activo
        ];

        $this->db->where('idPreferencia',$id);
        return $this->db->update('preferencia',$preferencia);
    }
    
    public function delete($idpreferencia){
        return $this->db->delete('preferencia', array('idPreferencia' => $idpreferencia));
    }
}
