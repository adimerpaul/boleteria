
<div class="col-sm-11 col-md-10">
    <h3 class="page-title">
        Resumen de Ventas Boleteria <small> Genera las cantidad vendido</small>
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href=""> <i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-file" ></i> Ver Resumen Venta	</li>
        </ol>
    </nav>
    <form action="<?=base_url()?>Reporte/informeBoleteria" method="post">
        <div class="row">
        <div class="col-sm-8">
        <label for="">Seleccione una Fecha</label>
            <input type="date" id="fecha1" name="fecha1" required value="<?php echo $fecha1;?>">    <br><br>            
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
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand" href="#"> datos de Venta</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
 
        </nav>
            <table id="reporte" class="table nowrap" style="width:100%">
                <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Titulo</th>
                    <th>Sala</th>
                    <th>Hora</th>
                    <th>Precio</th>
                    <th>Entradas</th>
                    <th>Bs</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $tent=0;
                $tbs=0;
                $query=$this->db->query("SELECT f.idFuncion,date(b.fechaFuncion) as fec,
                concat(nombre,' ',if(formato=1,'3D','2D')) as titulo,
                 concat('SALA ',nroSala) as nsala, horaInicio,f.fecha as ff, serie,
                  (select max(precio) from tarifa t1, boleto b1 where t1.idTarifa=b1.idTarifa 
                    and b1.idFuncion=f.idFuncion) as tprecio,
                   (select count(*) from boleto b1 where b1.idFuncion=f.idFuncion and b1.devuelto='NO' and b1.idCupon is null) as cant, (select sum(precio) from boleto b1, tarifa t1 
                   where b1.idTarifa=t1.idTarifa
                  and b1.idFuncion=f.idFuncion and b1.devuelto='NO' and b1.idCupon is null) as total
                FROM funcion f, pelicula p, tarifa t, boleto b, sala s
                WHERE f.idPelicula=p.idPelicula
                and f.idFuncion=b.idFuncion
                and f.idSala=s.idSala
                and b.idTarifa=t.idTarifa
                and date(b.fechaFuncion)='$fecha1' 
                group by b.idFuncion order by nsala asc,horaInicio asc");
                foreach ($query->result() as $row){
                    $tent=$tent+$row->cant;
                    $tbs=$tbs+$row->total;
                    echo "<tr>
                    <td>$row->fec</td>
                    <td>$row->titulo</td>
                    <td>$row->nsala</td>
                    <td>$row->horaInicio</td>
                    <td>$row->tprecio</td>
                    <td>$row->cant</td>                    
                    <td>$row->total</td>
                    </tr>";
                }
                echo "<tr>
                <td><b>TOTAL:</b></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><b>$tent</b></td>                    
                <td><b>$tbs</b></td>
                </tr>";
                ?>
                </tbody>
            </table>

        </div>

    </div>
</div>

