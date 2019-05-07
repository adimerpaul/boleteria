<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class boletos_model extends CI_Model {

    public function listaBoletos()
    {
        
        $this->db->join('usuario','usuario.idUsuario=boleto.idUsuario');
        $boleto = $this->db->get('boleto');
        return $boleto->result_array();
    }

    public function devolBoleto($id){
        $this->db->set('idAsiento',NULL);
        $this->db->set('devuelto','SI');
        $this->db->where('idVenta',$id);
        $this->db->update('boleto');
        return true;
    }
}