<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioCtrl extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('usuarios_model');
		$this->load->model('temporal_model');


	}
	public function index()
	{
		$this->session->sess_destroy();
		$this->load->view('login');
	}
	
	public function verifica() 
    {	
		
		
    	$usr=$this->input->post('user');
		$con=$this->input->post('pass');
	
		$this->load->model('usuarios_model');
		$respuesta=$this->usuarios_model->verificalogin($usr,$con);

    	if ($respuesta) 
    	{ 
    		$datosusr = array(
    		'nombre' =>$respuesta[0]->nombreUser,
			'cuenta' =>$respuesta[0]->user,
			'fecha'=>$respuesta[0]->fechapass,
    		'idUs'=>$respuesta[0]->idUsuario,
    		'login'=>1
		  );
		  $this->usuarios_model->controlIngreso($respuesta[0]->idUsuario);
		  $this->session->set_userdata($datosusr);

		  $user = $this->session->userdata('idUs');
        	$this->temporal_model->deleteAll($user);
		  	$dato=$this->usuarios_model->validaIngreso($user);
			  $this->load->view('templates/header',$dato);
			  $this->load->view('inicio');
			  $dato2['js']="<script>
			  			  var fechap=moment();
			  var fecha2=moment('".$this->session->userdata('fecha')."').format('Y-MM-DD');
			  var dias=fechap.diff(fecha2,'days');
			  //alert(dias);
			  if(dias > 90) alert('Actualice su contraseña con el Administrador');
			  </script>";    
			  $this->load->view('templates/footer',$dato2);
		 }
		 else
    		redirect('');
	}

	public function salir()
    {
	    $this->session->sess_destroy();
	    redirect('');
	}
	
	public function usuarioreg()
	{
		if($this->session->userdata('login')==1){
            
            $user = $this->session->userdata('idUs');

            $dato=$this->usuarios_model->validaIngreso($user);
           
                $this->load->view('templates/header', $dato);
				$this->load->view('usuarioreg');
                $dato2['js']="<script src='".base_url()."assets/js/usuario.js'></script>";    
                $this->load->view('templates/footer',$dato2);
        }
        else redirect('');
	}


	public function usuariover()
	{
		if($this->session->userdata('login')==1){
            
            $user = $this->session->userdata('idUs');

            $dato=$this->usuarios_model->validaIngreso($user);
           
            $usuario['usuario'] = $this->usuarios_model->listarUsuario();
			$this->load->view('templates/header', $dato);
				$this->load->view('usuariover',$usuario);
                $dato2['js']="<script src='".base_url()."assets/js/usuario.js'></script>";    
                $this->load->view('templates/footer',$dato2);
        }
        else redirect('');
	}

    public function datos(){
        $user=$_POST['user1'];
		$query=$this->db->query("SELECT * FROM usuario WHERE user='$user'");
		if($query->num_rows() > 0 ){
        $row=$query->row();        
        $myObj=($query->result_array())[0];
		echo json_encode($myObj);}
		else
		echo '{"user":""}';
		
	}
	
    public function datoUser(){
        $idusuario=$_POST['idusuario'];
        $query=$this->db->query("SELECT * FROM usuario WHERE idUsuario='$idusuario'");
        $row=$query->row();
        $myObj=($query->result_array())[0];
        echo json_encode($myObj);
    }


	public function userpermiso(){
        $idusuario=$_POST['idusuario'];
		$query=$this->db->query("SELECT * FROM permiso WHERE idUsuario='$idusuario'");		        
        $myObj=($query->result_array());

        echo json_encode($myObj);
	}

	public function recuperaSeccion(){
        $query=$this->db->query("SELECT * FROM seccion");
        $row=$query->row();
        
        $myObj=($query->result_array());

        echo json_encode($myObj);
	}
	
	
	public function store(Type $var = null)
	{
	    $idU=$this->usuarios_model->store();

		$query=$this->db->query("SELECT * FROM seccion");
		foreach($query->result() as $row){
			if(isset($_POST['s'.$row->idSeccion])){
				
				$this->usuarios_model->regpermiso($idU,$row->idSeccion);
			}
			
		}

		$this->usuarioreg();
	}

	public function update()
	{
		$this->usuarios_model->updateUS();
		$idU=$this->input->post('idusuario1');	
		$this->eliminarPermiso($idU);
		$query=$this->db->query("SELECT * FROM seccion");
	
		foreach($query->result() as $row){
			if(isset($_POST['s'.$row->idSeccion])){
				$this->usuarios_model->regpermiso($idU,$row->idSeccion);
				echo $row->idSeccion;				}					
		}

		header("Location: ".base_url()."UsuarioCtrl/usuariover");
	}

	public function updatepass(){
		$this->usuarios_model->updatepassword();
        header("Location: ".base_url()."UsuarioCtrl/usuariover");
			
	}

	public function eliminarPermiso($idU){
		$this->db->where('idUsuario',$idU);
		return $this->db->delete('permiso');
	}
	
	public function validapass($idU){
		$this->db->where('idUsuario',$idU);
		$resultado=$this->db->get('usuario');
		return $resultado->result();
	} 

	public function delete($id){
		$this->usuarios_model->delete($id);
        header("Location: ".base_url()."UsuarioCtrl/usuariover");
	}

	public function backupbase(){
		$prefs = array(
			'format'        => 'zip',                       // gzip, zip, txt
			'filename'      => 'backupmulticine.sql',              // File name - NEEDED ONLY WITH ZIP FILES
				);
	
	//$this->dbutil->backup($prefs);
	// Load the DB utility class
	$this->load->dbutil();

// Backup your entire database and assign it to a variable
	$backup = $this->dbutil->backup($prefs);

// Load the file helper and write the file to your server
	$this->load->helper('file');
	write_file('/path/to/mybackup.gz', $backup);

// Load the download helper and send the file to your desktop
	$this->load->helper('download');
	force_download('mybackup.gz', $backup);
	}
}