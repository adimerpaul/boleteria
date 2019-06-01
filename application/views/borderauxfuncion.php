
<div class="col-sm-11 col-md-10">
    <h3 class="page-title">
        Resumen de Ventas por Funcion <small> Genera las cantidad vendido</small>
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href=""> <i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-file" ></i> Ver Resumen Venta	</li>
        </ol>
    </nav>
    <form action="<?=base_url()?>Reporte/porfuncion" method="post">
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
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand" href="#">Exportar datos</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
 
        </nav>
            <table id="reporte" class="table" style="width:100%">
                <thead>
                <tr>
                <th>Fecha</th>
                <th>Titulo</th>
                <th>Sala</th>
                <th>Hora</th>
                <th>Serie</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query=$this->db->query("SELECT f.idFuncion,date(b.fecha) as fec,concat(nombre,' ',if(formato=1,'3D','2D')) as titulo,
                 concat('SALA ',nroSala) as nsala, horaInicio, serie, precio, count(*) as cant, (precio*count(*)) as total
                FROM funcion f, pelicula p, tarifa t, boleto b, sala s,venta v
                WHERE f.idPelicula=p.idPelicula
                and f.idFuncion=b.idFuncion
                and f.idSala=s.idSala
                and b.idTarifa=t.idTarifa
                and v.idVenta=b.idVenta
                and v.tipoVenta='FACTURA'
                and devuelto = 'NO'
                and date(b.fecha)>='$fecha1' and date(b.fecha)<='$fecha2'
                group by f.idFuncion,serie,precio order by fec");
                foreach ($query->result() as $row){
                    echo "<tr>
                    <td>$row->fec</td>
                    <td>$row->titulo</td>
                    <td>$row->nsala</td>
                    <td>$row->horaInicio</td>
                    <td>$row->serie</td>
                    <td>$row->precio</td>
                    <td>$row->cant</td>
                    <td>$row->total</td>
                    </tr>";
                }
                ?>
                </tbody>
            </table>

        </div>

    </div>
</div>


