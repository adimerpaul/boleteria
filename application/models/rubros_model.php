<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class rubros_model extends CI_Model {


    public function listaRubros()
    {
        $rubro = $this->db->get('rubro');
        return $rubro->result_array();
    }

    public function store()
    {

        if ($this->input->post('activo') == "on"  or null)
        $activo=1;
        else
        $activo=0;
        if ($this->input->post('rPadre')=='')
            $rpadre=null;
        else
            $rpadre=$this->input->post('rPadre');
        $rubro= [
            'nombreRubro'=> $this->input->post('nombre'),
            'descripcion'=> $this->input->post('desc'),
            'rubroPadre'=> $rpadre,
            'activo'=> $activo,
            'imagen'=>$this->input->post('icono'),
            'colorFondo'=>$this->input->post('coloricono')

        ];
        return $this->db->insert("rubro",$rubro);
    } 

    public function update()
    {
        $id=$this->input->post('idrubro');
        if ($this->input->post('activo') == "on"  or null)
        $activo="SI";
        else
        $activo="NO";
        if ($this->input->post('rPadre')=='')
            $rpadre=null;
        else
            $rpadre=$this->input->post('rPadre');
        $rubro= [
            'nombreRubro'=> $this->input->post('nombre'),
            'descripcion'=> $this->input->post('desc'),
            'rubroPadre'=> $rpadre,
            'activo'=> $activo,
            'imagen'=>$this->input->post('icono'),
            'colorFondo'=>$this->input->post('coloricono')

        ];

        $this->db->where('idRubro',$id);
        return $this->db->update('rubro',$rubro);
    }
    
    public function delete($idrubro){
        return $this->db->delete('rubro', array('idRubro' => $idrubro));
    }
}
