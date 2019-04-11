<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class temporal_model extends CI_Model {
    public function listaTemporal()
    {
        $user = $this->session->userdata('idUs');
    
        $this->db->where('idUser',$user);
        $temporal = $this->db->get('temporal');
        return $temporal->result_array();
    }

    public function deleteTemp($id)
    {
        $this->db->where('idTemporal',$id);
        return $this->db->delete('temporal');
        
    }

    
    public function deleteAll($idUser)
    {
        $this->db->where('idUser',$idUser);
        return $this->db->delete('temporal');
        
    }
}