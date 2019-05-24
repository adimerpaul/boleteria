<div class="col-sm-11 col-md-10">
    <h3 class="page-title">
        Resumen de Ventas Candy <small> Analice las ventas desde aquí</small>
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="#"> <i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#"> <i class="fas fa-sign"></i> Resumen Ventas </a></li>
            <li class="breadcrumb-item active" aria-current="page"> <i class="fas fa-chart-area"></i> Ventas Candy</li>
        </ol>
    </nav>
    <div>
        <div class="col-sm-5">
            
                        <div type="text" class="form-control" id="fecha" value="<?=date('Y-m-d')?>">
                            <i class="fa fa-calendar"></i>
                            <span></span>
                            <i class="fa fa-caret-down"></i>
                        </div>
                    </div>
                    <br>
    </div>
    <div class="card ">
        <div class="card-header text-white bg-info" >
            <i class="fas fa-money-check"></i> Datos de Venta por Periodo
        </div>
        <div class="card-body">
            <h3>Informacion del Periodo </h3>
            <hr>
            
            <div class="row">
                <div class="col-md-6">
                <label for=""><b>Fecha Inicial: </b></label> <label for="" id="fecInicial"></label>
                </div>
                <div class="col-md-6">
                <label for=""><b>Fecha Final: </b></label> <label for="" id="fecFinal"> </label>
                </div>
            </div>
            <div class="row">
                 <div class='col-md-6'>
                 <label ><b>Total Combos: </b></label> <label  id='totalComb'></label>
                 </div>
                 <div class='col-md-6'>
                 <label><b>Total Productos: </b></label> <label id='totalProd'> </label>
                 </div>
                
            </div><br>
            <h3>Ventas Realizadas</h3>
            <hr>
            <table id="example" class="display" style="width:100%" id="tresumen">

                <thead class="table-success">
                <tr>
                    <th>fecha</th>
                    <th>Vendedor</th>
                    <th>Ventas del Dia</th>
                    <th>Total</th>
                    <th>Opcion</th>
                </tr>
                </thead>
                <tbody id="listav">

                </tbody>
            </table>

        </div>

    </div>
</div>

