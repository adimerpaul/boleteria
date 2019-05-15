<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imagen extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('usuarios_model');


	}
    public function index()
    {
        if($this->session->userdata('login')==1){
            $user = $this->session->userdata('idUs');
            $dato=$this->usuarios_model->validaIngreso($user);
            $this->load->view('templates/header',$dato);
            $this->load->view('imagenver');
            $dato['js']="";
            $this->load->view('templates/footer',$dato);
        }
        else redirect('');
    }

    public function eliminaImagen($nombre){
        unlink("'".base_url('assets/imagenes/').$nombre."'");
        header("Location: ".base_url()."Imagen");        
    }

    public function cargarArchivo(){
        $ruta=('assets/imagenes/');//ruta carpeta donde queremos copiar las imágenes 
        $uploadfile_temporal=$_FILES['fichero']['tmp_name']; 
        $uploadfile_nombre=$ruta.$_FILES['fichero']['name']; 
        
        if (is_uploaded_file($uploadfile_temporal)) 
        { 
            move_uploaded_file($uploadfile_temporal,$uploadfile_nombre); 
        } 
        else 
        { 
        echo "error"; 
        } 
        header("Location: ".base_url()."Imagen");        
        
    }
}