<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class boletos_model extends CI_Model {

    public function listaBoletos()
    {
        $this->db->join('usuario','usuario.idUsuario=boleto.idUsuario');
        $boleto = $this->db->get('boleto');
        return $boleto->result_array();
    }
}