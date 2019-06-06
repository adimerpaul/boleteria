<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tarifas_model extends CI_Model {
    public function listaTarifa()
    {
    
        $this->db->where('activo',1);
        $tarifa = $this->db->get('tarifa');
        return $tarifa->result_array();
    }

    public function listaTarifainact()
    {
    
        $this->db->where('activo',0);
        $tarifa = $this->db->get('tarifa');
        return $tarifa->result_array();
    }


    public function store()
    {
        if ($this->input->post('tv') == false )
        $tv=0;
        else
        $tv=1;
        if ($this->input->post('defecto') == false)
        $defecto=0;
        else
        $defecto=1;
        if ($this->input->post('web') == false)
        $web=0;
        else
        $web=1;
        if ($this->input->post('mostrarbol') == true )
        $bol=1;
        else
        $bol=0;
        if ($this->input->post('activa') == true)
        $activa=1;
        else
        $activa=0;
        if ($this->input->post('dosd')==true)
        $dos=1;
        else
        $dos=0;
        if ($this->input->post('tresd')==true)
        $tres=1;
        else
        $tres=0;
        if ($this->input->post('lunes')==true)
        $lunes=1;
        else
        $lunes=0;
        if ($this->input->post('martes')==true)
        $martes=1;
        else
        $martes=0;
        if ($this->input->post('miercoles')==true)
        $miercoles=1;
        else
        $miercoles=0;
        if ( $this->input->post('jueves')==true)
        $jueves=1;
        else
        $jueves=0;
        if ($this->input->post('viernes')==true)
        $viernes=1;
        else
        $viernes=0;
        if ( $this->input->post('sabado')==true)
        $sabado=1;
        else
        $sabado=0;
        if ($this->input->post('domingo')==true)
        $domingo=1;
        else
        $domingo=0;
        if ($this->input->post('festivo')==true)
        $diafestivo=1;
        else
        $diafestivo=0;
        if ($this->input->post('promo')==true)
        $promo='on';
        else
        $promo='off';
        $tarifa= [
            'serie'=>  strtoupper($this->input->post('serie')),
            'descripcion'=>  strtoupper($this->input->post('descrip')),
            'precio'=> $this->input->post('precio'),
            'tv'=> $tv,
            'defecto'=> $defecto,            
            'ventaWeb'=> $web,            
            'mostrarBol'=> $bol,
            'd2'=> $dos,
            'd3'=> $tres,
            'lunes'=> $lunes,
            'martes'=> $martes,
            'miercoles'=> $miercoles,
            'jueves'=> $jueves,
            'viernes'=> $viernes,
            'sabado'=> $sabado,
            'domingo'=> $domingo,
            'diafestivo'=> $diafestivo,
            'activo'=>$activa,
            'promo'=>$promo
            
        ];
        return $this->db->insert("tarifa",$tarifa);
    } 

    public function update()
    {
        if ($this->input->post('tv') == false )
        $tv=0;
        else
        $tv=1;
        if ($this->input->post('defecto') == false)
        $defecto=0;
        else
        $defecto=1;
        if ($this->input->post('web') == false)
        $web=0;
        else
        $web=1;
        if ($this->input->post('mostrarbol') == true )
        $bol=1;
        else
        $bol=0;
        if ($this->input->post('activa') == true)
        $activa=1;
        else
        $activa=0;
        if ($this->input->post('dosd')==true)
        $dos=1;
        else
        $dos=0;
        if ($this->input->post('tresd')==true)
        $tres=1;
        else
        $tres=0;
        if ($this->input->post('lunes')==true)
        $lunes=1;
        else
        $lunes=0;
        if ($this->input->post('martes')==true)
        $martes=1;
        else
        $martes=0;
        if ($this->input->post('miercoles')==true)
        $miercoles=1;
        else
        $miercoles=0;
        if ( $this->input->post('jueves')==true)
        $jueves=1;
        else
        $jueves=0;
        if ($this->input->post('viernes')==true)
        $viernes=1;
        else
        $viernes=0;
        if ( $this->input->post('sabado')==true)
        $sabado=1;
        else
        $sabado=0;
        if ($this->input->post('domingo')==true)
        $domingo=1;
        else
        $domingo=0;
        if ($this->input->post('festivo')==true)
        $diafestivo=1;
        else
        $diafestivo=0;
        if ($this->input->post('promo')==true)
        $promo='on';
        else
        $promo='off';
        $tarifa= [
            'serie'=>  strtoupper($this->input->post('serie')),
            'descripcion'=>  strtoupper($this->input->post('descrip')),
            'precio'=> $this->input->post('precio'),
            'tv'=> $tv,
            'defecto'=> $defecto,            
            'ventaWeb'=> $web,            
            'mostrarBol'=> $bol,
            'd2'=> $dos,
            'd3'=> $tres,
            'lunes'=> $lunes,
            'martes'=> $martes,
            'miercoles'=> $miercoles,
            'jueves'=> $jueves,
            'viernes'=> $viernes,
            'sabado'=> $sabado,
            'domingo'=> $domingo,
            'diafestivo'=> $diafestivo,
            'activo'=>$activa,
            'promo'=>$promo
            
        ];
        $this->db->where('idTarifa',$this->input->post('idtarifa'));
        return $this->db->update("tarifa",$tarifa);
    } 

    public function delete($idtarifa){
        return $this->db->delete('tarifa', array('idTarifa' => $idtarifa));
    }
}