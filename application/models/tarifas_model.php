<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tarifas_model extends CI_Model {
    public function store()
    {
        if ($this->input->post('tv') == "off" or null)
        $tv=0;
        else
        $tv=1;
        if ($this->input->post('defecto') == "off"  or null)
        $defecto=0;
        else
        $defecto=1;
        if ($this->input->post('web') == "off"  or null)
        $web=0;
        else
        $web=1;
        if ($this->input->post('activa') == "off"  or null)
        $activa=0;
        else
        $activa=1;
        
        $pelicula= [
            'codigoIncaa'=> $this->input->post('codinca'),
            'codUltracine'=> $this->input->post('codultra'),
            'nombre'=> $this->input->post('nom'),
            'duracion'=> $this->input->post('duracion'),
            'paisOrigen'=> $this->input->post('origen'),
            'genero'=> $this->input->post('genero'),            
            'clasificacion'=> $this->input->post('clasificacion'),            
            'acuerdoAgent'=> $acuerdo,
            'cartelera'=> $cartelara,
            'formato'=> $formato,
            'sipnosis'=>$this->input->post('sipnosis'),
            'urlTrailer'=> $this->input->post('url'),
            'idDistrib'=> $this->input->post('distribuidor')

        ];
        return $this->db->insert("pelicula",$pelicula);
    } 


}