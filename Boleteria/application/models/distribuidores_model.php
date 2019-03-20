<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class distribuidores_model extends CI_Model {

    public function listaDistribuidor()
    {
        $distribuidor = $this->db->get('distribuidor');
        return $distribuidor->result_array();
    }

    public function store()
    {
        
        $distribuidor= [
            'nombreDis'=> $this->input->post('nombre'),
            'direccionDis'=> $this->input->post('direccion'),
            'localidadDis'=> $this->input->post('localidad'),
            'nit'=> $this->input->post('nit'),
            'telefonoDis'=> $this->input->post('telefono'),
            'email'=> $this->input->post('email'),
            'responsable'=> $this->input->post('responsable')

        ];
        return $this->db->insert("distribuidor",$distribuidor);
    }

    public function delete($idDistrib){
        return $this->db->delete('distribuidor', array('idDistrib' => $idDistrib));
    }

    public function update()
    {
        $id=$this->input->post('iddistrib');
        $distribuidor= [
            'nombreDis'=> $this->input->post('nombre'),
            'direccionDis'=> $this->input->post('direccion'),
            'localidadDis'=> $this->input->post('localidad'),
            'nit'=> $this->input->post('nit'),
            'telefonoDis'=> $this->input->post('telefono'),
            'email'=> $this->input->post('email'),
            'responsable'=> $this->input->post('responsable')

        ];
        $this->db->where('idDistrib',$id);
        return $this->db->update('distribuidor',$distribuidor);
    }


}