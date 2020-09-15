<?php
class Ventarapida extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('usuarios_model');
        $this->load->model('temporal_model');
        $this->load->model('boletos_model');

        $this->load->model('ventas_model'); // This loads the library
        $this->load->model('dosificaciones_model');
    }

    public function index()
    {
        if($this->session->userdata('login')==1){
            $user = $this->session->userdata('idUs');
            $temporal['temporal'] = $this->temporal_model->listaTemporal();
            $dato=$this->usuarios_model->validaIngreso($user);
            $this->load->view('templates/header', $dato);
            $this->load->view('ventarapida',$temporal);
            $dato2['js']="";
            $this->load->view('templates/footer',$dato2);
        }
        else redirect('');
    }
    public function verificardosificacion(){
        $query=$this->db->query("SELECT * FROM dosificacion WHERE tipo='BOLETERIA' AND activo=1");
        echo json_encode($query->result_array());
    }
}
