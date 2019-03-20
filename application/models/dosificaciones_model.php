<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dosificaciones_model extends CI_Model {

    public function listaDosificacion()
    {
        $dosif = $this->db->get('dosificacion');
        return $dosif->result_array();
    }

    public function store()
    {
        
        $dosificacion= [
            'nroTramite'=> $this->input->post('tramite'),
            'nroAutorizacion'=> $this->input->post('autorizacion'),
            'nroFactIni'=> $this->input->post('inicial'),
            'llaveDosif'=> $this->input->post('llave'),
            'fechaDesde'=> $this->input->post('fechad'),
            'fechaHasta'=> $this->input->post('fechah'),
            'activo'=> 1,
            'leyenda'=> $this->input->post('leyenda')

        ];
        return $this->db->insert("dosificacion",$dosificacion);
    }

    public function desactivar()
    {
        $this->db->set('activo',0);
        $this->db->where('fechaHasta <',date('Y-m-d H:i:s'));
        return $this->db->update('dosificacion');

    }

    public function update()
    {
        $id=$this->input->post('idosif');
        $dosificacion= [
            'nroTramite'=> $this->input->post('tramite'),
            'nroAutorizacion'=> $this->input->post('autorizacion'),
            'nroFactIni'=> $this->input->post('inicial'),
            'llaveDosif'=> $this->input->post('llave'),
            'fechaDesde'=> $this->input->post('fechad'),
            'fechaHasta'=> $this->input->post('fechah'),
            'leyenda'=> $this->input->post('leyenda')

        ];
        $this->db->where('idDosificacion',$id);
        return $this->db->update('dosificacion',$dosificacion);
    }
}
