<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dosificaciones_model extends CI_Model {

    public function listaDosificacion()
    {   
        $this->db->where('tipo','BOLETERIA');
        $dosif = $this->db->get('dosificacion');
        return $dosif->result_array();
    }

    public function store()
    {
        

        $dosificacion= [
            'nroTramite'=> $this->input->post('tramite'),
            'nroAutorizacion'=> $this->input->post('autorizacion'),
            'nroFactIni'=> $this->input->post('inicial'),
            'nroFactura'=> intval($this->input->post('inicial')) - 1,
            'llaveDosif'=> $this->input->post('llave'),
            'fechaDesde'=> $this->input->post('fechad'),
            'fechaHasta'=> $this->input->post('fechah'),
            'activo'=> 0,
            'leyenda'=> $this->input->post('leyenda'),
            'tipo'=>'BOLETERIA'

        ];
        return $this->db->insert("dosificacion",$dosificacion);
    }

    public function desactivar()
    {
        $this->db->set('activo',0);
        $this->db->where('fechaHasta <',date('Y-m-d'));
        $this->db->where('tipo','BOLETERIA');
        return $this->db->update('dosificacion');

    }

    public function update()
    {
        $id=$this->input->post('idosif');
        if(($this->input->post('activo'))=="on")
        $estado=1;
        else
        $estado=0;
        $dosificacion= [
            'nroTramite'=> $this->input->post('tramite'),
            'nroAutorizacion'=> $this->input->post('autorizacion'),
            'nroFactIni'=> $this->input->post('inicial'),
            'llaveDosif'=> $this->input->post('llave'),
            'fechaDesde'=> $this->input->post('fechad'),
            'fechaHasta'=> $this->input->post('fechah'),
            'leyenda'=> $this->input->post('leyenda'),
            'activo'=> $estado

        ];
        $this->db->where('idDosif',$id);
        return $this->db->update('dosificacion',$dosificacion);
    }
    
    public function delete($idDosif){
        return $this->db->delete('dosificacion', array('idDosif' => $idDosif));
    }

    public function updatenfactura($id){
        $this->db->query("UPDATE dosificacion set nroFactura= nroFactura + 1 where tipo='BOLETERIA' AND activo=1 AND idDosif='$id'");
    }
}
