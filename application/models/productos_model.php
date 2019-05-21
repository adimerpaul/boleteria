<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class productos_model extends CI_Model {

    public function listaProducto()
    {
        $producto = $this->db->get('producto');
        return $producto->result_array();
    }

    public function store()
    {

        if ($this->input->post('activo') == "on"  or null)
        $activo="SI";
        else
        $activo="NO";
        $producto= [
            'nombreProd'=> $this->input->post('nombre'),
            'descripcion'=> $this->input->post('desc'),
            'precioCosto'=> $this->input->post('pcosto'),            
            'precioVenta'=> $this->input->post('pventa'),            
            'utilidad'=> $this->input->post('utl'),
            'activo'=> $activo,
            'imagen'=>$this->input->post('icono'),
            'colorFondo'=> $this->input->post('coloricono'),
            'cantidad'=> $this->input->post('cantidad'),
            'idRubro'=> $this->input->post('idrubro')

        ];
        $this->db->insert("producto",$producto);
        $idpr=$this->db->insert_id();
        $pref=$this->input->post('pref');
        for($i=0;$i<count($pref);$i++)
        {   
            $dato=[
                'idProducto'=>$idpr,
                'idPreferencia'=>$pref[$i]
            ];
            $this->db->insert("productopreferencia",$dato);
        }
        return true;
    } 

    public function update()
    {
        $id=$this->input->post('idproducto');

        if ($this->input->post('upactivo') == "on"  or null)
        $activo="SI";
        else
        $activo="NO";
        $producto= [
            'nombreProd'=> $this->input->post('upnombre'),
            'descripcion'=> $this->input->post('updesc'),
            'precioCosto'=> $this->input->post('uppcosto'),            
            'precioVenta'=> $this->input->post('uppventa'),            
            'utilidad'=> $this->input->post('uputl'),
            'activo'=> $activo,
            'imagen'=>$this->input->post('upicono'),
            'colorFondo'=> $this->input->post('upcoloricono'),
            'cantidad'=> $this->input->post('upcantidad')

        ];
        $this->db->where('idProducto',$id);
        $this->db->update('producto',$producto);
        $pref=$this->input->post('uppref');
        $this->eliminaPref($id);       
        for($i=0;$i<count($pref);$i++)
        {   
            $dato=[
                'idProducto'=>$id,
                'idPreferencia'=>$pref[$i]
            ];
            $this->db->insert("productopreferencia",$dato);
        }
        return true;
    }
    
    public function delete($idproducto){
        return $this->db->delete('producto', array('idProducto' => $idproducto));
    }

    public function eliminaPref($id){
        $this->db->where('idProducto',$id);
        return $this->db->delete('productopreferencia');
    }
}
