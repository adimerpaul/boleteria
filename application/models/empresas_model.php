<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class empresas_model extends CI_Model {

    public function listaEmpresa()
    {
        $empresas = $this->db->get('empresa');
        return $empresas->result_array();
    }

    public function store()
    {
        $empresa= [
            'codigo'=> $this->input->post('codigo'),
            'razonSocial'=> $this->input->post('razonsocial'),
            'nombreFant'=> $this->input->post('nomfant'),
            'nombreSuc'=> $this->input->post('nomSuc'),
            'telefono'=> $this->input->post('telefono'),
            'localidad'=> $this->input->post('localidad'),
            'direccion'=> $this->input->post('direccion'),
            'ci_nit'=> $this->input->post('cinit'),
            'agenciaAfip'=> $this->input->post('agenciaAfip'),
            'ingresoBruto'=>$this->input->post('ingBruto'),
            'urlDominio'=> $this->input->post('urlDominio'),
            'fidelizacion'=> $this->input->post('fideliza')

        ];
        return $this->db->insert("empresa",$empresa);
    }

    public function delete($id)
    {
        $this->db->delete('empresa',array('idEmpresa'=>$id));
    }

    public function getEmpresa($id)
    {
      
        $this->db->where('idEmpresa',$id);
        $res=$this->db->get('empresa');
        return $res->result_array();
    }
    public function update()
    {
        $id=$this->input->post('idemp');
        $empresa= [
            'codigo'=> $this->input->post('codigo'),
            'razonSocial'=> $this->input->post('razonsocial'),
            'nombreFant'=> $this->input->post('nomfant'),
            'nombreSuc'=> $this->input->post('nomSuc'),
            'telefono'=> $this->input->post('telefono'),
            'localidad'=> $this->input->post('localidad'),
            'direccion'=> $this->input->post('direccion'),
            'ci_nit'=> $this->input->post('cinit'),
            'agenciaAfip'=> $this->input->post('agenciaAfip'),
            'ingresoBruto'=>$this->input->post('ingBruto'),
            'urlDominio'=> $this->input->post('urlDominio'),
            'fidelizacion'=> $this->input->post('fideliza')

        ];
        $this->db->where('idEmpresa',$id);
        return $this->db->update('empresa',$empresa);
    }
}
