<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuarios_model extends CI_Model {
	public function insertar($nom,$usu,$con,$fot,$rol)
	{
	 $data= array(
	 	'nombre'=>$nom,
	 	'usuario'=>$usu,
	 	'contra'=>$con,
	 	'foto'=>$fot,
	 	'rol'=>$rol
	 );
	 $this->db->insert('usuarios',$data);
	}
	public function verificalogin($usu,$con)
	{
		$this->db->where('user',$usu);
		$this->db->where('password',$con);
		$resultado=$this->db->get('usuario');
		if ($resultado->num_rows()>0)
			return $resultado->result();
		else return false;
    }
    
    public function verificaHabilita($id,$sec)
    {
        $this->db->select('idPermiso');

        $this->db->from('seccion');

        $this->db->where('permiso.idUsuario',$id);
        $this->db->where('nombreSec',$sec);

        $this->db->where('permiso.idSeccion = seccion.idSeccion');        
        $resultado=$this->db->get('permiso');

        if($resultado->num_rows()>0)
            return true;
        else
            return false;

    }

    function validaIngreso($user){
        $inicio=false;
		$empre=false;
        $nuevaemp=false;
        $veremp=false;
        $datosdosif=false;
       
        $respuesta=$this->usuarios_model->verificaHabilita($user,'inicio');
        if($respuesta)
            $inicio=true;
        $respuesta=$this->usuarios_model->verificaHabilita($user,'empresas');	
        if($respuesta)
            $empre=true;
        $respuesta=$this->usuarios_model->verificaHabilita($user,'registrarnuevaempresa');	
        if($respuesta)
            $nuevaemp=true;	
        $respuesta=$this->usuarios_model->verificaHabilita($user,'datosdosificacion');	
        if($respuesta)
            $datosdosif=true;
        $data=['user'=>$user,'inicio'=>$inicio,'empre'=>$empre,'nuevaemp'=>$nuevaemp,'datosdosif'=>$datosdosif];
        return $data;
}
	
}