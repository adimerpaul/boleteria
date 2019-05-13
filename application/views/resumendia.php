<div class="col-sm-11 col-md-10">
    <h3 class="page-title">
        Resumen de ventas del dia <small> Resumen de ventas dia</small>
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="#"> <i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#"> <i class="fas fa-sign"></i> Resumen </a></li>
            <li class="breadcrumb-item active" aria-current="page"> <i class="fas fa-chart-area"></i> Resumen del dia</li>
        </ol>
    </nav>
    <div class="card ">
        <div class="card-header text-white bg-info" >
            <i class="fas fa-money-check"></i> Ventas del dia
        </div>
        <div class="card-body">
            <table  class="table-bordered" style="width:100%">
                <thead class="table-success">
                <tr>
                    <th>Numero</th>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query=$this->db->query("SELECT * FROM venta v INNER JOIN cliente c ON v.idcliente=c.idcliente
                WHERE date(fechaVenta)=date('".date('Y-m-d')."')");
                foreach ($query->result() as $row){
                    echo "<tr> 
                                <td>$row->idVenta</td> 
                                <td>$row->fechaVenta</td>  
                                <td>$row->apellidoCl</td> 
                                <td>$row->total</td>
                            </tr>";
                }
                ?>
                </tbody>
            </table>
            <a href="<?=base_url()?>ResumenDia/imprimir" class="btn btn-success btn-block"> <i class="fas fa-print"></i> Imprimir ventas del dia</a>
        </div>

    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-ticket-alt"></i> Registrar cupon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?=base_url()?>CuponCtrl/store">
                    <div class="form-group row">
                        <label for="motivo" class="col-sm-2 col-form-label">Motivo</label>
                        <div class="col-sm-10">
                            <input type="text" name="motivo" required class="form-control" id="motivo" placeholder="Motivo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fechafin" class="col-sm-2 col-form-label">Fecha Fin</label>
                        <div class="col-sm-10">
                            <input type="date" name="fechafin" required value="<?=date('Y-m-d')?>" class="form-control" id="fechafin" placeholder="fechafin">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cantidad" class="col-sm-2 col-form-label">Cantidad</label>
                        <div class="col-sm-10">
                            <input type="number" name="cantidad" required value="1" class="form-control" id="fechafin" placeholder="cantidad">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-stop"></i> Cancelar</button>
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="detalle">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div id="contenedor">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-danger"> <i class="fa fa-times"></i> Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script !src="">
    window.onload=function (e) {
        $('#cupones').DataTable( {
            "order": [[ 0, "desc" ]]
        } );

        var eli=document.getElementsByClassName('eli');
        for (var i=0;i<eli.length;i++){
            eli[i].addEventListener('click',function (e) {
                if (!confirm("Seguro de eliminar?")){
                    e.preventDefault();
                }
            });

        }
        $('#detalle').on('show.bs.modal',function (e) {
                var button = $(e.relatedTarget);
                var idcupon = button.data('idcupon');
                $.ajax({
                    type:'POST',
                    data:'idcupon='+idcupon,
                    url:'CuponCtrl/verificar',
                    success:function (e) {
                        console.log(e);
                        $('#contenedor').html(e);
                    }
                });
            }
        )

    }
</script>