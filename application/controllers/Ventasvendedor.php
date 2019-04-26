<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventasvendedor extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('usuarios_model');
        $this->load->model('empresas_model');


    }

    public function index()
    {
        if ($this->session->userdata('login') == 1) {

            $user = $this->session->userdata('idUs');

            $dato = $this->usuarios_model->validaIngreso($user);
            $this->load->view('templates/header', $dato);
            $this->load->view('ventasvendedor');
            $dato['js'] = "<script src='".base_url()."assets/js/ventasvendedor.js'></script>";
            $this->load->view('templates/footer', $dato);
        } else redirect('');
    }

    public function resumenventas()
    {
        if ($this->session->userdata('login') == 1) {

            $user = $this->session->userdata('idUs');

            $dato = $this->usuarios_model->validaIngreso($user);
            $this->load->view('templates/header', $dato);
            $this->load->view('verresumenventas');
            $dato['js'] = "<script src='".base_url()."assets/js/resumenventas.js'></script>";
            $this->load->view('templates/footer', $dato);
        } else redirect('');
    }

    
    public function datosventa(){
        $idU=$_POST['iduser'];
        $fecini=$_POST['fechaini'];
        $fecfin=$_POST['fechafin'];
        $query=$this->db->query("SELECT *,
        (select count(*) from boleto b2 where b.idFuncion = b2.idFuncion and devuelto='NO') as vendido, 
        (select count(*) from boleto b2 where b.idFuncion = b2.idFuncion and devuelto='SI') as devuelto,
        (select sum(costo) from boleto b2 where b.idFuncion = b2.idFuncion and devuelto='NO') as total 
        FROM boleto b inner join usuario u on b.idUsuario = u.idUsuario  where u.idUsuario='$idU'
        and fecha >= '$fecini' and fecha <= '$fecfin'
        GROUP BY idFuncion ");
        $row=$query->row();
        $myObj=($query->result_array());
        echo json_encode($myObj);       
    }

    public function listaperiodo(){

        $fecini=$_POST['fechaini'];
        $fecfin=$_POST['fechafin'];
        $query=$this->db->query("SELECT * 
        from funcion f inner join pelicula p on f.idPelicula = p.idPelicula
        where fecha >= '$fecini' and fecha <= '$fecfin' group by p.idPelicula"
        );
        $row=$query->row();
        $myObj=($query->result_array());
        echo json_encode($myObj);          
    }

    public function totallistaperiodo(){
        $fecini=$_POST['fechaini'];
        $fecfin=$_POST['fechafin'];
        $peliculas="(".$_POST['cadena'].")";
        $query=$this->db->query("SELECT 
         (select count(*) from boleto b1 inner join funcion f on b1.idFuncion= f.idFuncion where f.fecha>= '$fecini' and f.fecha<='$fecfin' and idPelicula in ".$peliculas." and devuelto='NO') as venta,
         (select sum(costo) from boleto b1 inner join funcion f on b1.idFuncion= f.idFuncion where f.fecha>= '$fecini' and f.fecha<='$fecfin' and idPelicula in ".$peliculas."  and devuelto='NO') as totalventa,
         (select count(*) from boleto b1 inner join funcion f on b1.idFuncion= f.idFuncion where f.fecha>= '$fecini' and f.fecha<='$fecfin' and idPelicula in ".$peliculas."  and devuelto='SI') as devuelto,
         (select sum(costo) from boleto b1 inner join funcion f on b1.idFuncion= f.idFuncion where f.fecha>= '$fecini' and f.fecha<='$fecfin' and idPelicula in ".$peliculas."  and devuelto='SI') as totaldev 
         from dual");
                 $row=$query->row();
                 $myObj=($query->result_array());
                 echo json_encode($myObj);  
    }

    public function porpelicula(){
        $fecini=$_POST['fechaini'];
        $fecfin=$_POST['fechafin'];
        $peliculas=$_POST['cadena'];
        $peliculas=explode(",", $_POST['cadena']);;
        $n=count($peliculas);
        echo $n;
        $consulta="";
        for($i=0;$i<$n;$i++){
            $consulta.=" SELECT idPelicula, concat(nombre,' ',if(formato=1,'3D','2D')) as titulo, (select count(*) from boleto b where idFuncion in (select f.idFuncion from funcion f where f.fecha>= '$fecini' and f.fecha<='$fecfin' and f.idPelicula = ".$peliculas[$i].") and devuelto='NO') as total from pelicula where idPelicula = ".$peliculas[$i];
            if($i+1 < $n)  $consulta.=" UNION ";
        }
        $query=$this->db->query($consulta);
        $row=$query->row();
        $myObj=($query->result_array());
        echo json_encode($myObj);  
    }

    public function portarifa(){
        
    }

}