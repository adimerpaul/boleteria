<div class="col-sm-11 col-md-10">
    <h3 class="page-title">
        Resumen de la Semana <small> Genera las cantidad vendido</small>
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href=""> <i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-file" ></i> Ver Resumen Venta	</li>
        </ol>
    </nav>
    <form action="<?=base_url()?>Reporte/semanadistrib" method="post">
    <div class="row">
        <div class="col-sm-8">
        <label for="">Seleccione un a Fecha</label>
            <input type="date" id="fecha" name="fecha" required value="<?php echo date('Y-m-d');?>">    <br><br>            
            Inicio: <input type="date" id="fecha1" name="fecha1" required value="<?php echo $fecha1;?>" readonly> 
            Fin: <input type="date" id="fecha2" name="fecha2" required value="<?php echo $fecha2;?>" readonly >                 
        </div>
        <div class="col-sm-3">
            <button type="submit" id="consulta" class="btn btn-success btn-block"> <i class="fas fa-check"></i> Consultar</button>
        </div>
        </div>

    </form>        <br>
    <div class="card ">
        <div class="card-header text-white bg-info" >
            <i class="fas fa-money-check"></i> Datos Por Periodo
        </div>
        <div class="card-body">
            <table id="reporte" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>Distribuidor</th>
                    <th>Titulo</th>
                    <th>Nsemana</th>
                    <th>Nfuncion</th>
                    <th>Precio</th>
                    <th>Jueves</th>
                    <th>TotalJueves</th>
                    <th>Viernes</th>
                    <th>TotalViernes</th>
                    <th>Sabado</th>
                    <th>TotalSabado</th>
                    <th>Domingo</th>
                    <th>TotalDomingo</th>
                    <th>Lunes</th>
                    <th>TotalLunes</th>
                    <th>Martes</th>
                    <th>TotalMartes</th>
                    <th>Miercoles</th>
                    <th>TotalMiercoles</th>
                    <th>Cantidad</th>
                    <th>Total</th>

                </tr>
                </thead>
                <tbody>
                <?php
                
                    $consulta="select p.idPelicula,nombreDis,concat(nombre,' ',if(formato=1,'3D','2D')) as titulo, 
                (select cast(if(DATEDIFF('$fecha2',min(f0.fecha))/7<1,1,DATEDIFF('$fecha2',min(f0.fecha))/7) as int )from funcion f0 where f0.idPelicula=p.idPelicula) as nsemana,
                (SELECT COUNT(*) from funcion f1 where f1.idPelicula=p.idPelicula and date(f1.fecha)>='$fecha1' and (f1.fecha)<='$fecha2') as nfuncion,
                (select max(precio) from funcion f2, funciontarifa ft2, tarifa t2 
                 where f2.idFuncion=ft2.idFuncion and ft2.idTarifa=t2.idTarifa and f2.idPelicula=p.idPelicula) as Mprecio,
                 count(*) as cantidad, 
                 sum(costo) total ";
                 for($i=1;$i<=7;$i++){
                 $consulta.=", (select count(*) from boleto b6, funcion f6,venta v6 
                 where b6.idFuncion=f6.idFuncion and f6.idPelicula=p.idPelicula
                 and v6.idVenta=b6.idVenta and b6.devuelto='NO' and v6.tipoVenta='FACTURA'
                 and WEEKDAY(date(b6.fecha))+1=$i and date(b6.fecha)>='$fecha1' and (b6.fecha)<='$fecha2') as d$i,
                 (select if(sum(costo)>0,sum(costo),0) 
                 from boleto b6, funcion f6 ,venta v6
                 where b6.idFuncion=f6.idFuncion and f6.idPelicula=p.idPelicula
                 and v6.idVenta=b6.idVenta and b6.devuelto='NO' and v6.tipoVenta='FACTURA'
                 and WEEKDAY(date(b6.fecha))+1=$i and date(b6.fecha)>='$fecha1' and (b6.fecha)<='$fecha2') as total$i ";
                 }
                 $consulta.="from funcion f,pelicula p, boleto b, distribuidor d
                where f.idPelicula=p.idPelicula
                and f.idFuncion = b.idFuncion
                and d.idDistrib=p.idDistrib
                and b.idCupon is null and b.tipoCompra='FACTURA'
                and date(b.fecha)>='$fecha1' and (b.fecha)<='$fecha2'
                group by p.idPelicula";
                $query=$this->db->query($consulta);
                foreach ($query->result() as $row){
                    echo "<tr>
                    <td>$row->nombreDis</td>
                    <td>$row->titulo</td>
                    <td>$row->nsemana</td>
                    <td>$row->nfuncion</td>
                    <td>$row->Mprecio</td>
                    <td>$row->d4</td>
                    <td>$row->total4</td>
                    <td>$row->d5</td>
                    <td>$row->total5</td>
                    <td>$row->d6</td>
                    <td>$row->total6</td>
                    <td>$row->d7</td>
                    <td>$row->total7</td>
                    <td>$row->d1</td>
                    <td>$row->total1</td>
                    <td>$row->d2</td>
                    <td>$row->total2</td>
                    <td>$row->d3</td>
                    <td>$row->total3</td>
                    <td>$row->cantidad</td>
                    <td>$row->total</td>
                    </tr>";
                }
                ?>
                </tbody>
            </table>

        </div>

    </div>
</div>

<script !src="">
    document.addEventListener('DOMContentLoaded', function() {
        $('#reporte').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'pdf'
            ]
        } );
    });
</script>