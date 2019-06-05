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
            'nombreDis'=> strtoupper($this->input->post('nombre')),
            'direccionDis'=> strtoupper($this->input->post('direccion')),
            'localidadDis'=> strtoupper($this->input->post('localidad')),
            'nit'=> $this->input->post('nit'),
            'telefonoDis'=> $this->input->post('telefono'),
            'email'=> $this->input->post('email'),
            'responsable'=> strtoupper($this->input->post('responsable'))

        ];
        return $this->db->insert("distribuidor",$distribuidor);
    }

    public function delete($idDistrib){
        return $this->db->delete('distribuidor', array('idDistrib' => $idDistrib));
    }

    public function update()
    {
        $id=$this->input->post('idDistrib');
        $distribuidor= [
            'nombreDis'=> strtoupper($this->input->post('nombre')),
            'direccionDis'=> strtoupper($this->input->post('direccion')),
            'localidadDis'=> strtoupper($this->input->post('localidad')),
            'nit'=> $this->input->post('nit'),
            'telefonoDis'=> $this->input->post('telefono'),
            'email'=> $this->input->post('email'),
            'responsable'=> ($this->input->post('responsable'))

        ];
        //$this->db->where('idDistrib',$id);
        //return $this->db->update('distribuidor',$distribuidor);
        $nombreDis=$_POST['nombre'];
        $direccionDis=$_POST['direccion'];
        $localidadDis=$_POST['localidad'];
        $nit=$_POST['nit'];
        $telefonoDis=$_POST['telefono'];
        $emailDis=$_POST['email'];
        $responsable=$_POST['responsable'];

        $this->db->query("UPDATE distribuidor SET 
nombreDis='$nombreDis',
direccionDis='$direccionDis',
localidadDis='$localidadDis',
nit='$nit',
telefonoDis='$telefonoDis',
email='$emailDis',
responsable='$responsable'
WHERE idDistrib='$id'
");

    }


}