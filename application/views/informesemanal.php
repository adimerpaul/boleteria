<div class="col-sm-11 col-md-10">
    <h3 class="page-title">
        Libro IVA <small> Analice el Libro de IVA desde aquí</small>
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href=""> <i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-file" ></i> Ver Libro IVA	</li>
        </ol>
    </nav>
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
                    <th>IMPORTE ICE/IEHD/     TASAS</th>
                </tr>
                </thead>
                <tbody>
                <?php
                /*$query=$this->db->query("SELECT * FROM venta v
INNER JOIN dosificacion d ON v.idDosif=d.idDosif
INNER JOIN cliente c ON c.idCliente=v.idCliente
WHERE MONTH(v.fechaVenta)='$mes' AND YEAR(v.fechaVenta)='$anio' AND v.tipoVEnta='FACTURA'
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
                    echo "<tr>
                            <td>$c</td>
                            <td>$row->fechaVenta</td>
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
                }*/
                ?>

                </tbody>
            </table>

        </div>

    </div>
</div>


<script !src="">
    document.addEventListener('DOMContentLoaded', function() {
        $('#iva').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    });
</script>

