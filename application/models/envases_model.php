<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class envases_model extends CI_Model {

    public function listaEnvase()
    {
        $consumible = $this->db->get('consumible');
        return $consumible->result_array();
    }

    public function store()
    {
        $consumible= [
            'nombreEnv'=> $this->input->post('cinit'),
            'descripcion'=> $this->input->post('nombre'),
            'precioCosto'=> $this->input->post('apellido'),
            'activo'=> $this->input->post('email'),
            'stockActual'=> $this->input->post('fechanac'),
            'stockRec'=> $this->input->post('telef')
        ];
        $this->db->insert("consumible",$consumible);
        $id=$this->db->insert_id();
        foreach ($this->input->post('proveedor') as $idproveedor) {
            $this->db->insert("proveedor_envase");
        }
        return true;
    }
    


    public function delete($idCliente){
        return $this->db->delete('cliente', array('idCliente' => $idCliente));
    }

    public function update()
    {

        $id=$this->input->post('idcliente');
        $cliente= [
            'cinit'=> $this->input->post('cinit'),
            'nombreCl'=> $this->input->post('nombre'),
            'apellidoCl'=> $this->input->post('apellido'),
            'email'=> $this->input->post('email'),
            'fechaNac'=> $this->input->post('fechanac'),
            'telefono'=> $this->input->post('telef'),
            'direccion'=> $this->input->post('direccion'),
            'sexo'=> $this->input->post('sexo')
        ];
        $this->db->where('idCliente',$id);
        return $this->db->update('cliente',$cliente);
    }
}