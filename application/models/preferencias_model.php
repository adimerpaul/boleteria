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

        if(($this->input->post('activo'))=="on")
        $activo="on";
        else
        $activo="off";
        $preferencia= [
            'nombrePref'=> $this->input->post('nombre'),
            'descripcion'=> $this->input->post('desc'),
            'activa'=> $activo
        ];
        return $this->db->insert("preferencia",$preferencia);
    } 

    public function update()
    {
        $id=$this->input->post('idpref');

        if(($this->input->post('activoup'))=="on")
        $activo="on";
        else
        $activo="off";
        
        $preferencia= [
            'nombrePref'=> $this->input->post('nombreup'),
            'descripcion'=> $this->input->post('descup'),
            'activa'=> $activo
        ];

        $this->db->where('idPreferencia',$id);
        return $this->db->update('preferencia',$preferencia);
    }
    
    public function delete($idpreferencia){
        return $this->db->delete('preferencia', array('idPreferencia' => $idpreferencia));
    }
}
