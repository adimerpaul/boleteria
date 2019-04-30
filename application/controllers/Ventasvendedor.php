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
        and date(fecha) >= '$fecini' and date(fecha) <= '$fecfin'
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
        where date(fecha) >= '$fecini' and date(fecha) <= '$fecfin' group by p.idPelicula"
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
         (select count(*) from boleto b1 inner join funcion f on b1.idFuncion= f.idFuncion where date(f.fecha)>= '$fecini' and date(f.fecha)<='$fecfin' and idPelicula in ".$peliculas." and devuelto='NO') as venta,
         (select sum(costo) from boleto b1 inner join funcion f on b1.idFuncion= f.idFuncion where date(f.fecha)>= '$fecini' and date(f.fecha)<='$fecfin' and idPelicula in ".$peliculas."  and devuelto='NO') as totalventa,
         (select count(*) from boleto b1 inner join funcion f on b1.idFuncion= f.idFuncion where date(f.fecha)>= '$fecini' and date(f.fecha)<='$fecfin' and idPelicula in ".$peliculas."  and devuelto='SI') as devuelto,
         (select sum(costo) from boleto b1 inner join funcion f on b1.idFuncion= f.idFuncion where date(f.fecha)>= '$fecini' and date(f.fecha)<='$fecfin' and idPelicula in ".$peliculas."  and devuelto='SI') as totaldev 
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
            $consulta.=" SELECT idPelicula, concat(nombre,' ',if(formato=1,'3D','2D')) as titulo, (select count(*) from boleto b where idFuncion in (select f.idFuncion from funcion f where date(f.fecha)>= '$fecini' and date(f.fecha)<='$fecfin' and f.idPelicula = ".$peliculas[$i].") and devuelto='NO') as total from pelicula where idPelicula = ".$peliculas[$i];
            if($i+1 < $n)  $consulta.=" UNION ";
        }
        $query=$this->db->query($consulta);
        $row=$query->row();
        $myObj=($query->result_array());
        echo json_encode($myObj);  
    }

    public function portarifa(){
        $fecini=$_POST['fechaini'];
        $fecfin=$_POST['fechafin'];
        $peliculas=$_POST['cadena'];
        $peliculas="(".$_POST['cadena'].")";

        $consulta="
        select serie,descripcion,precio,
        (select count(*) 
        from boleto b, funcion f2 
        where devuelto = 'NO' and b.idFuncion=f2.idFuncion and f2.idTarifa = t1.idTarifa and f2.idPelicula in ".$peliculas." and date(f2.fecha)>='$fecini' and date(f2.fecha)<='$fecfin'
        ) as total 
        from tarifa t1 where idTarifa in ( select t.idTarifa from funcion f,tarifa t where f.idPelicula in ".$peliculas." and t.idTarifa=f.idTarifa and date(f.fecha)>='$fecini' and date(f.fecha)<='$fecfin')";
        $query=$this->db->query($consulta);
        $row=$query->row();
        $myObj=($query->result_array());
        echo json_encode($myObj);  
    }

    public function porsemana(){
        $fecini=$_POST['fechaini'];
        $fecfin=$_POST['fechafin'];
        $peliculas=$_POST['cadena'];
        $peliculas="(".$_POST['cadena'].")";

        $consulta="SELECT p.idPelicula,concat(p.nombre,' ',if(p.formato=1,'3D','2D')) as titulo,(
            SELECT count(*)
            FROM boleto b1  
            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
            WHERE date(b1.fecha)>=date('$fecini') AND date(b1.fecha)<=date('$fecfin')
            AND WEEKDAY(date(b1.fecha))+1=3
            AND p1.idPelicula=p.idPelicula
            ) as jueves,(
            SELECT count(*)
            FROM boleto b1  
            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
            WHERE date(b1.fecha)>=date('$fecini') AND date(b1.fecha)<=date('$fecfin')
            AND WEEKDAY(date(b1.fecha))+1=4
            AND p1.idPelicula=p.idPelicula
            ) as viernes,(
            SELECT count(*)
            FROM boleto b1  
            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
            WHERE date(b1.fecha)>=date('$fecini') AND date(b1.fecha)<=date('$fecfin')
            AND WEEKDAY(date(b1.fecha))+1=5
            AND p1.idPelicula=p.idPelicula
            ) as sabado,(
            SELECT count(*)
            FROM boleto b1  
            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
            WHERE date(b1.fecha)>=date('$fecini') AND date(b1.fecha)<=date('$fecfin')
            AND WEEKDAY(date(b1.fecha))+1=6
            AND p1.idPelicula=p.idPelicula
            ) as domingo,
            (
            SELECT count(*)
            FROM boleto b1  
            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
            WHERE date(b1.fecha)>=date('$fecini') AND date(b1.fecha)<=date('$fecfin')
            AND WEEKDAY(date(b1.fecha))+1=0
            AND p1.idPelicula=p.idPelicula
            ) as lunes,
            (
            SELECT count(*)
            FROM boleto b1  
            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
            WHERE date(b1.fecha)>=date('$fecini') AND date(b1.fecha)<=date('$fecfin')
            AND WEEKDAY(date(b1.fecha))+1=1
            AND p1.idPelicula=p.idPelicula
            ) as martes,
            (
            SELECT count(*)
            FROM boleto b1  
            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
            WHERE date(b1.fecha)>=date('$fecini') AND date(b1.fecha)<=date('$fecfin')
            AND WEEKDAY(date(b1.fecha))+1=2
            AND p1.idPelicula=p.idPelicula
            ) as miercoles,
            count(*) as total
            FROM boleto b  
            INNER JOIN funcion f ON b.idFuncion=f.idFuncion
            INNER JOIN pelicula p ON p.idPelicula=f.idPelicula
            WHERE date(b.fecha)>=date('$fecini') AND date(b.fecha)<=date('$fecfin')
            and p.idPelicula in ".$peliculas." group by p.idPelicula";
            
            $query=$this->db->query($consulta);
            $row=$query->row();
            $myObj=($query->result_array());
            echo json_encode($myObj);  
        
    }

    public function diagrama(){
        $fecini=$_POST['fechaini'];
        $fecha=$fecini;
        $fecfin=$_POST['fechafin'];
        $peliculas=$_POST['cadena'];
        $peliculas="(".$_POST['cadena'].")";
        $i=0;
        $consulta="
        select p.idPelicula,concat(p.nombre,' ',if(p.formato=1,'3D','2D')) as titulo,t.idTarifa, concat(YEAR(f.fecha),'-',month(f.fecha)) as fec2,(
            select max(precio) from tarifa t1 , funcion f1,pelicula p1
        where t1.idTarifa=f1.idTarifa
        and f1.idPelicula = p1.idPelicula
        and p1.idPelicula= p.idPelicula
            and Month(f1.fecha)>=month('$fecini') and Month(f1.fecha)<=month('$fecfin')
        group by p1.idPelicula) as f1
        from tarifa t , funcion f,pelicula p
        where t.idTarifa=f.idTarifa
        and f.idPelicula = p.idPelicula
        and p.idPelicula in $peliculas
            and date(f.fecha)>=('$fecini') and date(f.fecha)<=('$fecfin')
            group by Month(f.fecha),p.idPelicula";
            $query=$this->db->query($consulta);
            $row=$query->row();
            $myObj=($query->result_array());
            echo json_encode($myObj);  

    }  

}