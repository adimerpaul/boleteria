<?php
/**
 * Created by PhpStorm.
 * User: Adimer
 * Date: 02/05/2019
 * Time: 9:26
 */
defined('BASEPATH') OR exit('No direct script access allowed');
include "tcpdf.php";
class InformeSemanal extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('usuarios_model');
            }

    public function index()
    {
        if ($this->session->userdata('login') == 1) {

            $user = $this->session->userdata('idUs');

            $dato = $this->usuarios_model->validaIngreso($user);
            $this->load->view('templates/header', $dato);
            $this->load->view('informesemanal');
            $dato['js'] = "";
            $this->load->view('templates/footer', $dato);
        } else redirect('');
    }
}