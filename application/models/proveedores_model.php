<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class proveedores_model extends CI_Model {


    public function listaProveedor()
    {
        $proveedor = $this->db->get('proveedor');
        return $proveedor->result_array();
    }

    public function store()
    {

        if ($this->input->post('activo') == "on"  or null)
        $activo=1;
        else
        $activo=0;

        $proveedor= [
            'razonSocial'=> $this->input->post('razonsocial'),
            'nitProv'=> $this->input->post('nit'),
            'email'=> $this->input->post('email'),
            'telefono'=> $this->input->post('telefono'),            
            'activo'=> $activo,
            'direccion'=>$this->input->post('direccion')

        ];
        return $this->db->insert("proveedor",$proveedor);
    } 

    public function update()
    {
        $id=$this->input->post('idproveedor');

        if(($this->input->post('activo'))=="on")
        $activo=1;
        else
        $activo=0;
        
        $proveedor= [
            'razonSocial'=> $this->input->post('razonsocial'),
            'nitProv'=> $this->input->post('nit'),
            'email'=> $this->input->post('email'),
            'telefono'=> $this->input->post('telefono'),            
            'activo'=> $activo,
            'direccion'=>$this->input->post('direccion')
        ];

        $this->db->where('idProveedor',$id);
        return $this->db->update('proveedor',$proveedor);
    }
    
    public function delete($idproveedor){
        return $this->db->delete('proveedor', array('idProveedor' => $idproveedor));
    }
}
