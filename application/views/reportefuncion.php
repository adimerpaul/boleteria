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
    <div class="col-sm-5">
        <div type="text" class="form-control" id="fecha" value="<?=date('Y-m-d')?>">
                            <i class="fa fa-calendar"></i>
                            <span></span>
                            <i class="fa fa-caret-down"></i>
        </div>
    </div>
                    <br>
    <div class="card ">
        <div class="card-header text-white bg-info" >
            <i class="fas fa-money-check"></i> Datos Por Periodo
        </div>
        <div class="card-body">
            <table id="reporte" class="display nowrap" style="width:100%">
                <thead>
                <tr>
                    <th>Nº</th>
                    <th>titulo</th>
                    <th>formato</th>
                    <th>fecha</th>
                    <th>Hora</th>
                    <th>Cantidad</th>
                    <th>Monto</th>
                </tr>
                </thead>
                <tbody>

    

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
                'copy', 'excel', 'pdf', 'print'
            ]
        } );
    });
</script>

