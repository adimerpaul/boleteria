<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class festivos_model extends CI_Model {

    public function listaFestivo()
    {
        $this->db->where('activo',1);
        $festivo = $this->db->get('dia_festivo');
        return $festivo->result_array();
    }


    
    public function listaFestivoinact()
    {
        $this->db->where('activo',0);
        $festivo = $this->db->get('dia_festivo');
        return $festivo->result_array();
    }

    public function store()
    {   $act=0;
        if($this->input->post('activo')=='on'or null)
        $act=1;
        $festivo= [
            'fecha'=> $this->input->post('fecha'),
            'descripcion'=> $this->input->post('descripcion'),
            'activo'=>$act
            
        ];
        return $this->db->insert("dia_festivo",$festivo);
    }

    public function delete($idFestivo){
        return $this->db->delete('dia_festivo', array('idFestivo' => $idFestivo));
    }

    public function update()
    {
        $id=$this->input->post('idfestivo');

            $act=0;
            if($this->input->post('activo')=='on'or null)
            $act=1;
            $festivo= [
                'fecha'=> $this->input->post('fecha'),
                'descripcion'=> $this->input->post('descripcion'),
                'activo'=>$act

        ];
        $this->db->where('idFestivo',$id);
        return $this->db->update('dia_festivo',$festivo);
    }
}
