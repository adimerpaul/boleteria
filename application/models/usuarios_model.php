<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuarios_model extends CI_Model {

    public function listarUsuario()
    {
        $usuario = $this->db->get('usuario');
        return $usuario->result_array();
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
       
        $respuesta=$this->usuarios_model->verificaHabilita($user,'Inicio');
        if($respuesta)
            $inicio=true;
        $respuesta=$this->usuarios_model->verificaHabilita($user,'Empresas');	
        if($respuesta)
            $empre=true;
        $respuesta=$this->usuarios_model->verificaHabilita($user,'RegistrarNuevaEmpresa');	
        if($respuesta)
            $nuevaemp=true;	
        $respuesta=$this->usuarios_model->verificaHabilita($user,'DatosDosificacion');	
        if($respuesta)
            $datosdosif=true;
        $data=['user'=>$user,'inicio'=>$inicio,'empre'=>$empre,'nuevaemp'=>$nuevaemp,'datosdosif'=>$datosdosif];
        return $data;
    }

    public function store(){
        $usuario= [
            'nombreUser'=> $this->input->post('nombre'),
            'user'=> $this->input->post('textuser'),
            'password'=> $this->input->post('pass')
            
        ];
        $this->db->insert("usuario",$usuario);
        return $this->db->insert_id();
    }

    public function regpermiso($idU,$idSeccion)
    {
        $permiso=[
            'idUsuario'=> $idU,
            'idSeccion'=>$idSeccion
        ];

        return $this->db->insert('permiso',$permiso);
    }

    public function existepermiso($id,$idsec,$activo){
        $this->db->where('idUsuario',$id);
        $this->db->where('idSeccion',$idsec);
        $permiso=['activo'=>$activo];
        return $this->db->update('permiso',$permiso);           
    }


    public function updateUS(){
        $id=$this->input->post('idusuario1');
        $usuario= [
            'nombreUser'=> $this->input->post('nombre')            
        ];
        $this->db->where('idUsuario',$id);
        return $this->db->update("usuario",$usuario);
        
    }

    public function updatepassword(){
        $id=$this->input->post('idusuario2');
        $usuario= [
            'password'=> $this->input->post('pass')            
        ];
        $this->db->where('idUsuario',$id);
        return $this->db->update("usuario",$usuario);
        
    }
}