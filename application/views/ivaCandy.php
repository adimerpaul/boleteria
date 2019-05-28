<div class="col-sm-11 col-md-10">
    <h3 class="page-title">
        Libro IVA CANDY <small> Analice el Libro de IVA Candy desde aquí</small>
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href=""> <i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-file" ></i> Ver Libro IVA CANDY	</li>
        </ol>
    </nav>
    <form action="<?=base_url()?>Iva/ivaCandy" method="post">
            <div class="form-group row">
                <label for="mes" class="col-sm-1 col-form-label">Mes:</label>
                <div class="col-sm-4">
                    <select name="mes" id="mes" class="form-control">
                        <option value="01">Enero</option >
                        <option value="02">Febrero</option>
                        <option value="03">Marzo</option>
                        <option value="04">Abril</option>
                        <option value="05">Mayo</option>
                        <option value="06">Junio</option>
                        <option value="07">Julio</option>
                        <option value="08">Agosto</option>
                        <option value="09">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                </div>
                <label for="anio" class="col-sm-1 col-form-label">Año:</label>
                <div class="col-sm-4">
                    <input type="text" value="<?=$anio?>" class="form-control">
                </div>
                <div class="col-sm-2">
                    <button type="submit" id="consultar" class="btn btn-success btn-block"> <i class="fas fa-check"></i> Consultar</button>
                </div>

            </div>
    </form>
    <div class="card ">
        <div class="card-header text-white bg-info" >
            <i class="fas fa-money-check"></i> Datos Iva Por Periodo
        </div>
        <div class="card-body">
            <table id="iva" class="display nowrap" style="width:100%">
                <thead>
                <tr>
                    <th>Nº</th>
                    <th>FECHA DE LA FACTURA</th>
                    <th>Nº DE LA FACTURA</th>
                    <th>Nº AUTORIZACION</th>
                    <th>ESTADO</th>
                    <th>NIT/CI CLIENTE</th>
                    <th>NOMBRE O RAZÓN SOCIAL</th>
                    <th>IMPORTE TOTAL DE VENTA</th>
                    <th>IMPORTE ICE/IEHD/TASAS</th>
                    <th>EXPORTACIONES OPERACIONES EXENTAS</th>
                    <th>VENTAS GRAVADAS A TASA CERO</th>
                    <th>SUB TOTAL</th>
                    <th>DESCUENTOS BONIFICACIONES Y REBAJAS OTORGADAS</th>
                    <th>IMPORTE BASE PARA DÉBITO FISCAL IVA</th>
                    <th>DÉBITO FISCAL IVA</th>
                    <th>CÓDIGO DE CONTROL</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query=$this->db->query("SELECT * FROM ventacandy v
INNER JOIN dosificacion d ON v.idDosif=d.idDosif
INNER JOIN cliente c ON c.idCliente=v.idCliente
WHERE MONTH(v.fechaVenta)='$mes' AND YEAR(v.fechaVenta)='$anio' AND v.tipoVenta='FACTURA' and d.tipo='CANDY'
ORDER BY v.fechaVenta");
                $c=0;
                foreach ($query->result() as $row){
                    $c++;
                    if ($row->estado=="ACTIVO")
                        $e="V";
                    else{
                        $e="A";
                    }
                    if ($row->cinit=="0")
                        $nom="ANULADO";
                    else{
                        $nom="$row->apellidoCl $row->nombreCl";
                    }
                    $fecha2=substr($row->fechaVenta,0,10);
                    echo "<tr>
                            <td>$c</td>
                            <td>$fecha2</td>
                            <td>$row->nroComprobante</td>
                            <td>$row->nroAutorizacion</td>
                            <td>$e</td>
                            <td>$row->cinit</td>
                            <td>$nom</td>
                            <td>$row->total</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>$row->total</td>
                            <td>0</td>
                            <td>$row->total</td>
                            <td>".number_format($row->total*0.13,2)."</td>
                            <td>$row->codigoControl</td>
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
        $('#mes').prop('value',  '<?=$mes?>');
        $('#iva').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    });
</script>

