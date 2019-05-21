<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductoCtrl extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('usuarios_model');
        $this->load->model('productos_model');

    }

    public function index()
    {
        if($this->session->userdata('login')==1){
            $user = $this->session->userdata('idUs');
            $dato=$this->usuarios_model->validaIngreso($user);
            $producto['producto']=$this->productos_model->listaProducto();
            $this->load->view('templates/header', $dato);

            $this->load->view('productover',$producto);

            $dato2['js']="<script src='".base_url()."assets/js/producto.js'></script>";

            $this->load->view('templates/footer',$dato2);
        }
        else redirect('');
    }

    public function productoreg()
    {
        if($this->session->userdata('login')==1){
            $user = $this->session->userdata('idUs');
            $dato=$this->usuarios_model->validaIngreso($user);

            $this->load->view('templates/header', $dato);

            $this->load->view('productoreg');
            $dato2['js']="<script src='".base_url()."assets/js/producto.js'></script>";

            $this->load->view('templates/footer',$dato2);
        }
        else redirect('');
    }


    public function store()
    {
        $this->productos_model->store();
        header('Location: '.base_url().'ProductoCtrl');
    }



    public function update()
    {   
        $this->productos_model->update();
        header("Location: ".base_url()."ProductoCtrl");
    }


    public function delete($idproducto)
    {

        $this->productos_model->delete($idproducto);
        header("Location: ".base_url()."ProductoCtrl");
    }

    public function datos(){
        $idproducto=$_POST['idproducto'];
        $query=$this->db->query("SELECT * FROM producto WHERE idProducto='$idproducto'");
        $row=$query->row();
        
        $myObj=($query->result_array())[0];

        echo json_encode($myObj);
    }

    public function datoPref(){
        $idproducto=$_POST['idproducto'];
        $query=$this->db->query("SELECT * FROM productopreferencia WHERE idProducto='$idproducto'");
        $row=$query->row();
        
        $myObj=($query->result_array());

        echo json_encode($myObj);
    }

}