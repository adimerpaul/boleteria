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



    public function resumenventa()
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

    public function resumenboleto()
    {
        if ($this->session->userdata('login') == 1) {

            $user = $this->session->userdata('idUs');

            $dato = $this->usuarios_model->validaIngreso($user);
            $this->load->view('templates/header', $dato);
            $this->load->view('verresumenboleto');
            $dato['js'] = "<script src='".base_url()."assets/js/resumenboletos.js'></script>";
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
        (select sum(precio) from boleto b2,tarifa t where b.idFuncion = b2.idFuncion and b.idTarifa=t.idTarifa and devuelto='NO') as total 
        FROM boleto b inner join usuario u on b.idUsuario = u.idUsuario  where u.idUsuario='$idU'
        and date(fecha) >= '$fecini' and date(fecha) <= '$fecfin' and idCupon is null
        GROUP BY idFuncion ");
        $row=$query->row();
        $myObj=($query->result_array());
        echo json_encode($myObj);       
    }

    public function listaperiodo(){

        $fecini=$_POST['fechaini'];
        $fecfin=$_POST['fechafin'];
        $query=$this->db->query("SELECT * 
        from funcion f, pelicula p,boleto b where f.idPelicula = p.idPelicula
        and b.idFuncion = f.idFuncion and devuelto='NO' and tipoCompra ='FACTURA'
        and date(b.fecha) >= '$fecini' and date(b.fecha) <= '$fecfin' group by p.idPelicula"
        );
        $row=$query->row();
        $myObj=($query->result_array());
        echo json_encode($myObj);          
    }

    public function listaperiodo2(){

        $fecini=$_POST['fechaini'];
        $fecfin=$_POST['fechafin'];
        $query=$this->db->query("SELECT * 
        from funcion f, pelicula p,boleto b where f.idPelicula = p.idPelicula
        and b.idFuncion = f.idFuncion and devuelto='NO' and tipoCompra ='FACTURA' 
        and date(f.fecha) >= '$fecini' and date(f.fecha) <= '$fecfin' group by p.idPelicula"
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
         (select count(*) from boleto b1 inner join funcion f on b1.idFuncion= f.idFuncion where date(b1.fecha)>= '$fecini' and date(b1.fecha)<='$fecfin' and idPelicula in ".$peliculas." and devuelto='NO') as venta,
         (select sum(precio) from boleto b1 inner join funcion f on b1.idFuncion= f.idFuncion inner join tarifa t on b1.idTarifa=t.idTarifa where date(b1.fecha)>= '$fecini' and date(b1.fecha)<='$fecfin' and idPelicula in ".$peliculas."  and devuelto='NO' and b1.idCupon is null) as totalventa,
         (select count(*) from boleto b1 inner join funcion f on b1.idFuncion= f.idFuncion where date(b1.fecha)>= '$fecini' and date(b1.fecha)<='$fecfin' and idPelicula in ".$peliculas."  and devuelto='SI') as devuelto,
         (select sum(precio) from boleto b1 inner join funcion f on b1.idFuncion= f.idFuncion inner join tarifa t on b1.idTarifa=t.idTarifa where date(b1.fecha)>= '$fecini' and date(b1.fecha)<='$fecfin' and idPelicula in ".$peliculas."  and devuelto='SI' and  b1.idCupon is null) as totaldev 
         from dual");
                 $row=$query->row();
                 $myObj=($query->result_array());
                 echo json_encode($myObj);  
    }

    public function totallistaperiodo2(){
        $fecini=$_POST['fechaini'];
        $fecfin=$_POST['fechafin'];
        $peliculas="(".$_POST['cadena'].")";
        $query=$this->db->query("SELECT 
         (select count(*) from boleto b1 inner join funcion f on b1.idFuncion= f.idFuncion where  idPelicula in ".$peliculas." and devuelto='NO') as venta,
         (select sum(precio) from boleto b1 inner join funcion f on b1.idFuncion= f.idFuncion inner join tarifa t on b1.idTarifa=t.idTarifa where idPelicula in ".$peliculas."  and devuelto='NO' and b1.idCupon is  null) as totalventa,
         (select count(*) from boleto b1 inner join funcion f on b1.idFuncion= f.idFuncion where  idPelicula in ".$peliculas."  and devuelto='SI') as devuelto,
         (select sum(precio) from boleto b1 inner join funcion f on b1.idFuncion= f.idFuncion inner join tarifa t on b1.idTarifa=t.idTarifa where  idPelicula in ".$peliculas."  and devuelto='SI' and b1.idCupon is  null) as totaldev 
         from dual");
                 $row=$query->row();
                 $myObj=($query->result_array());
                 echo json_encode($myObj);  
    }

    public function porpelicula(){
        $fecini=$_POST['fechaini'];
        $fecfin=$_POST['fechafin'];
        $peliculas=$_POST['cadena'];
        $peliculas="(".$_POST['cadena'].")";
        $consulta="SELECT p.idPelicula, concat(nombre,' ',if(formato=1,'3D','2D')) as titulo,(SELECT count(*) 
             from boleto b,funcion f 
             where b.idFuncion = f.idFuncion and devuelto='NO' and tipoCompra ='FACTURA'
             and date(b.fecha)>= '$fecini' and date(b.fecha)<='$fecfin' 
            and devuelto='NO' and p.idPelicula=f.idPelicula ) as total
            from pelicula p            
            where p.idPelicula in $peliculas";   
      
        $query=$this->db->query($consulta);
        $row=$query->row();
        $myObj=($query->result_array());
        echo json_encode($myObj);  
    }

    public function porpelicula2(){
        $fecini=$_POST['fechaini'];
        $fecfin=$_POST['fechafin'];
        $peliculas=$_POST['cadena'];
        $peliculas="(".$_POST['cadena'].")";
        $consulta="SELECT p.idPelicula, concat(nombre,' ',if(formato=1,'3D','2D')) as titulo,(SELECT count(*) 
             from boleto b,funcion f 
             where b.idFuncion = f.idFuncion and devuelto='NO' and tipoCompra ='FACTURA'
            and devuelto='NO' and p.idPelicula=f.idPelicula 
             and date(f.fecha)>= '$fecini' and date(f.fecha)<='$fecfin' 
            ) as total
            from pelicula p            
            where p.idPelicula in $peliculas";   
      
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

        $consulta="SELECT serie,descripcion,precio,
        (select count(*) 
        from boleto b, funcion f2 
        where devuelto = 'NO' and b.idFuncion=f2.idFuncion 
        and b.idTarifa = t1.idTarifa  and tipoCompra ='FACTURA'
        and f2.idPelicula in ".$peliculas." 
        and date(b.fecha)>='$fecini' and date(b.fecha)<='$fecfin'
        ) as total 
        from tarifa t1 
        where idTarifa in ( select t.idTarifa from funcion f,tarifa t,funciontarifa ft where f.idPelicula in ".$peliculas." and t.idTarifa=ft.idTarifa and f.idFuncion=ft.idFuncion )";
        $query=$this->db->query($consulta);
        $row=$query->row();
        $myObj=($query->result_array());
        echo json_encode($myObj);  
    }

    public function portarifa2(){
        $fecini=$_POST['fechaini'];
        $fecfin=$_POST['fechafin'];
        $peliculas=$_POST['cadena'];
        $peliculas="(".$_POST['cadena'].")";

        $consulta="SELECT serie,descripcion,precio,
        (select count(*) 
        from boleto b, funcion f2 
        where devuelto = 'NO' and tipoCompra ='FACTURA'
        and b.idFuncion=f2.idFuncion 
        and b.idTarifa = t1.idTarifa
         and f2.idPelicula in ".$peliculas."
        ) as total 
        from tarifa t1
         where idTarifa in ( select t.idTarifa from funcion f,tarifa t,funciontarifa ft 
              where f.idPelicula in ".$peliculas." and t.idTarifa=ft.idTarifa and f.idFuncion=ft.idFuncion )";
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
            AND WEEKDAY(date(b1.fecha))+1=4
            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO' 
            ) as jueves,(
            SELECT count(*)
            FROM boleto b1  
            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
            WHERE date(b1.fecha)>=date('$fecini') AND date(b1.fecha)<=date('$fecfin')
            AND WEEKDAY(date(b1.fecha))+1=5
            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO' 
            ) as viernes,(
            SELECT count(*)
            FROM boleto b1  
            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
            WHERE date(b1.fecha)>=date('$fecini') AND date(b1.fecha)<=date('$fecfin')
            AND WEEKDAY(date(b1.fecha))+1=6
            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO' 
            ) as sabado,(
            SELECT count(*)
            FROM boleto b1  
            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
            WHERE date(b1.fecha)>=date('$fecini') AND date(b1.fecha)<=date('$fecfin')
            AND WEEKDAY(date(b1.fecha))+1=7
            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO' 
            ) as domingo,
            (
            SELECT count(*)
            FROM boleto b1  
            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
            WHERE date(b1.fecha)>=date('$fecini') AND date(b1.fecha)<=date('$fecfin')
            AND WEEKDAY(date(b1.fecha))+1=1
            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO' 
            ) as lunes,
            (
            SELECT count(*)
            FROM boleto b1  
            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
            WHERE date(b1.fecha)>=date('$fecini') AND date(b1.fecha)<=date('$fecfin')
            AND WEEKDAY(date(b1.fecha))+1=2
            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO' 
            ) as martes,
            (
            SELECT count(*)
            FROM boleto b1  
            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
            WHERE date(b1.fecha)>=date('$fecini') AND date(b1.fecha)<=date('$fecfin')
            AND WEEKDAY(date(b1.fecha))+1=3
            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO' 
            ) as miercoles,
            (SELECT sum(precio)
             FROM boleto b1  
             INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
             INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
             inner join tarifa t on t.idTarifa = b1.idTarifa
             WHERE date(b1.fecha)>=date('$fecini') AND date(b1.fecha)<=date('$fecfin') and b1.devuelto='NO'
             AND p1.idPelicula=p.idPelicula and b1.idCupon is null 
             ) as ingreso,
            count(*) as total            
            FROM boleto b  
            INNER JOIN funcion f ON b.idFuncion=f.idFuncion
            INNER JOIN pelicula p ON p.idPelicula=f.idPelicula
            WHERE date(b.fecha)>=date('$fecini') AND date(b.fecha)<=date('$fecfin') and b.devuelto='NO'
            and p.idPelicula in ".$peliculas." group by p.idPelicula ";
            
            $query=$this->db->query($consulta);
            $row=$query->row();
            $myObj=($query->result_array());
            echo json_encode($myObj);  
        
    }

    public function porsemana2(){
        $fecini=$_POST['fechaini'];
        $fecfin=$_POST['fechafin'];
        $peliculas=$_POST['cadena'];
        $peliculas="(".$_POST['cadena'].")";

        $consulta="SELECT p.idPelicula,concat(p.nombre,' ',if(p.formato=1,'3D','2D')) as titulo,(
            SELECT count(*)
            FROM boleto b1  
            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
            WHERE WEEKDAY(date(b1.fechaFuncion))+1=4
            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO' 
            ) as jueves,(
            SELECT count(*)
            FROM boleto b1  
            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
            WHERE WEEKDAY(date(b1.fechaFuncion))+1=5
            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO' 
            ) as viernes,(
            SELECT count(*)
            FROM boleto b1  
            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
            WHERE WEEKDAY(date(b1.fechaFuncion))+1=6
            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO' 
            ) as sabado,(
            SELECT count(*)
            FROM boleto b1  
            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
            WHERE WEEKDAY(date(b1.fechaFuncion))+1=7
            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO' 
            ) as domingo,
            (
            SELECT count(*)
            FROM boleto b1  
            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
            WHERE WEEKDAY(date(b1.fechaFuncion))+1=1
            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO' 
            ) as lunes,
            (
            SELECT count(*)
            FROM boleto b1  
            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
            WHERE WEEKDAY(date(b1.fechaFuncion))+1=2
            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO' 
            ) as martes,
            (
            SELECT count(*)
            FROM boleto b1  
            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
            WHERE WEEKDAY(date(b1.fechaFuncion))+1=3
            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO' 
            ) as miercoles,
            (SELECT sum(precio)
             FROM boleto b1  
             INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
             INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
             inner join tarifa t on t.idTarifa = b1.idTarifa
             and date(b1.fechaFuncion)>=date('$fecini') AND date(b1.fechaFuncion)<=date('$fecfin')
             WHERE p1.idPelicula=p.idPelicula and  b1.tipoCompra='FACTURA' and b1.devuelto='NO'
             ) as ingresoF,
             (SELECT sum(precio)
             FROM boleto b1  
             INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
             INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
             inner join tarifa t on t.idTarifa = b1.idTarifa
             WHERE p1.idPelicula=p.idPelicula and  b1.tipoCompra='RECIBO' and b1.devuelto='NO'
             and date(b1.fechaFuncion)>=date('$fecini') AND date(b1.fechaFuncion)<=date('$fecfin')
             ) as ingresoR,
             (SELECT count(*)
             FROM boleto b1  
             INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
             INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
             inner join tarifa t on t.idTarifa = b1.idTarifa
             WHERE p1.idPelicula=p.idPelicula and  b1.tipoCompra='FACTURA' and b1.devuelto='NO'
             and date(b1.fechaFuncion)>=date('$fecini') AND date(b1.fechaFuncion)<=date('$fecfin')
             ) as totalF,
             (SELECT count(*)
             FROM boleto b1  
             INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
             INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
             inner join tarifa t on t.idTarifa = b1.idTarifa
             WHERE p1.idPelicula=p.idPelicula and  b1.tipoCompra='RECIBO' and b1.devuelto='NO'
             and date(b1.fechaFuncion)>=date('$fecini') AND date(b1.fechaFuncion)<=date('$fecfin')
             ) as totalR,
            count(*) as total            
            FROM boleto b  
            INNER JOIN funcion f ON b.idFuncion=f.idFuncion
            INNER JOIN pelicula p ON p.idPelicula=f.idPelicula
            WHERE date(b.fecha)>=date('$fecini') AND date(b.fecha)<=date('$fecfin') and b.devuelto='NO'
            and p.idPelicula in ".$peliculas." group by p.idPelicula ";
            
            $query=$this->db->query($consulta);
            $row=$query->row();
            $myObj=($query->result_array());
            echo json_encode($myObj);  
        
    }


    public function diagrama(){
        $fecini=$_POST['fechaini'];
        $fecha=$fecini;
        $fecfin=$_POST['fechafin'];
        $fechainicial = new DateTime($fecini);
        $fechafinal = new DateTime($fecfin);
        $diferencia = $fechainicial->diff($fechafinal);
        $meses = ( $diferencia->y * 12 ) + $diferencia->m + 1;

        $peliculas="(".$_POST['cadena'].")";
        $i=0;
        
        $consulta="SELECT p.idPelicula,concat(p.nombre,' ',if(p.formato=1,'3D','2D')) as titulo,t.idTarifa ";
        for($i=0;$i<=$meses;$i++){
        $consulta.=",(
            select max(precio) from tarifa t1 , funcion f1,funciontarifa ft1,pelicula p1
        where t1.idTarifa=ft1.idTarifa and f1.idFuncion=ft1.idFuncion
        and f1.idPelicula = p1.idPelicula
        and p1.idPelicula= p.idPelicula
            and Month(f1.fecha)=Month('$fecha')
        group by p1.idPelicula) as m".$i;
        $fec=date('Y-m-j', strtotime ('+1 month', strtotime($fecha)));
        $fecha=$fec;
        }
        $consulta.=" from tarifa t , funcion f,funciontarifa ft,pelicula p
        where t.idTarifa=ft.idTarifa and f.idFuncion= ft.idFuncion
        and f.idPelicula = p.idPelicula
        and p.idPelicula in $peliculas
            group by p.idPelicula";
        
            $query=$this->db->query($consulta);
            $row=$query->row();
            $myObj=($query->result_array());
            echo json_encode($myObj);  

    }  

    public function diagrama2(){
        $fecini=$_POST['fechaini'];
        $fecha=$fecini;
        $fecfin=$_POST['fechafin'];
        $fechainicial = new DateTime($fecini);
        $fechafinal = new DateTime($fecfin);
        $diferencia = $fechainicial->diff($fechafinal);
        $meses = ( $diferencia->y * 12 ) + $diferencia->m + 1;

        $peliculas="(".$_POST['cadena'].")";
        $i=0;
        
        $consulta="SELECT p.idPelicula,concat(p.nombre,' ',if(p.formato=1,'3D','2D')) as titulo,t.idTarifa ";
        for($i=0;$i<$meses;$i++){
        $consulta.=",( 
            select max(precio) from tarifa t1 , funcion f1,funciontarifa ft1,pelicula p1 
            where t1.idTarifa=ft1.idTarifa and f1.idFuncion=ft1.idFuncion
        and p1.idPelicula = p.idPelicula 
        and f1.idPelicula = p1.idPelicula 
            and Month(f1.fecha)=Month('$fecha') 
        group by p1.idPelicula) as m".$i;
        $fec=date('Y-m-j', strtotime ('+1 month', strtotime($fecha)));
        $fecha=$fec;
        }
        $consulta.=" from tarifa t , funcion f,funciontarifa ft,pelicula p 
        where t.idTarifa=ft.idTarifa and f.idFuncion=ft.idFuncion
        and f.idPelicula = p.idPelicula 
        and p.idPelicula in $peliculas  
            group by p.idPelicula";
            $query=$this->db->query($consulta);
            $row=$query->row();
            $myObj=($query->result_array());
            echo json_encode($myObj);  

    }  

}