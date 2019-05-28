<div class="col-sm-11 col-md-10">
    <h3 class="page-title">
        Resumen de ventas del dia Candy<small> Resumen de ventas dia Candy</small>
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="#"> <i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#"> <i class="fas fa-sign"></i> Resumen </a></li>
            <li class="breadcrumb-item active" aria-current="page"> <i class="fas fa-chart-area"></i> Resumen del dia Candy</li>
        </ol>
    </nav>
    <div class="card ">
        <div class="card-header text-white bg-info" >
            <i class="fas fa-money-check"></i> Ventas del dia Candy
        </div>
        <div class="card-body">
            <label for="">Fecha de Caja:</label>
            <input type="date" name="fechacandy" id="fechacandy" value="<?php echo date('Y-m-d');?>">
            <br>
            <h3>Ventas por factura</h3>
            <table  class="table-bordered" style="width:100%">
                <thead class="table-success">
                <tr>
                    <th>Numero</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Cliente</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody id="rfactura">
       

                </tbody>
            </table><br>
            <h3>Ventas por Producto y Combo</h3>
            <table  class="table-bordered" style="width:100%">
                <thead class="table-success">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>cantidad</th>
                    <th>PUnitario</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody id="rdetalle">


                </tbody>
            </table> <br>
            <div class="row">
                <b><label for="">Total Recibo: </label></b>
                <label for="" id="totalrecibo"></label>
            </div>
            <div class="row">
                <b><label for="">Total Factura: </label></b>
                <label for="" id="totalfactura"></label>
            </div>
            <br>
            <a class="btn btn-success btn-block" id="imprimirCandy"> <i class="fas fa-print"></i> Imprimir ventas del dia</a>
        </div>

    </div>
</div>




