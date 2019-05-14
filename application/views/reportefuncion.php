<div class="col-sm-11 col-md-10">
    <h3 class="page-title">
        Resumen de Ventas por Pelicula <small> Genera las cantidad vendido</small>
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href=""> <i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-file" ></i> Ver Resumen Venta	</li>
        </ol>
    </nav>
    <form action="<?=base_url()?>Reporte/index" method="post">
        <div class="row">
        <div class="col-sm-5">
            <input type="date" id="fecha1" name="fecha1" required value="<?php echo $fecha1;?>">                 
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
                    <th>Sala</th>
                    <th>Pelicula</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Recaudacion Cine(Total)</th>
                    <th>Espectadores</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query=$this->db->query("SELECT nombreDis,nroSala,concat(nombre,' ',(if(formato=1,'3D','2D'))) as titulo, fecha, horaInicio,
(SELECT count(*) from boleto b where b.idFuncion= f.idFuncion and devuelto ='NO' and idCupon is null) as espectador,
(SELECT sum(precio) from boleto b, tarifa t where b.idFuncion= f.idFuncion and devuelto ='NO' and idCupon is null and b.idTarifa = t.idTarifa ) as recaudado
from distribuidor d , pelicula p, Sala s, funcion f
where d.idDistrib=p.idDistrib
and f.idPelicula = p.idPelicula
and f.idSala = s.idSala
and fecha = '$fecha1'");
                foreach ($query->result() as $row){
                    echo "<tr>
                    <td>$row->nombreDis</td>
                    <td>$row->nroSala</td>
                    <td>$row->titulo</td>
                    <td>$row->fecha</td>
                    <td>$row->horaInicio</td>
                    <td>$row->recaudado</td>
                    <td>$row->espectador</td>
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
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    });
</script>