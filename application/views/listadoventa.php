<div class="col-sm-11 col-md-10">
    <h3>LISTADO DE VENTAS</h3>
    <br>
    <div class="card ">
    <div class="card-header text-white bg-warning" >
        Ventas Mercado Pago
    </div>
    <div class="card-body">     <br>   
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nro Comprobante</th>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Usuario</th>
                    <th>Total</th>
                    <th>Tipo</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>

        <?php foreach($venta as $row): ?>
        <tr>
            <td><?php echo $row['idVenta']; ?></td>
            <td><?php echo $row['nroComprobante']; ?></td>
            <td><?php echo $row['fechaVenta']; ?></td>
            <td><?php echo $row['nombreCl'].' '.$row['apellidoCl']; ?></td>
            <td><?php echo $row['nombreUser']; ?></td>
            <td><?php echo $row['total']; ?></td>
            <td><?php echo $row['tipoVenta']; ?></td>
            <td>                
                    <a class="btn btn-outline-warning  btn-sm" data-toggle="modal" data-target="#exampleModal" data-idventa="<?php echo $row['idVenta']?>">Ver Detalle</a>
                   
            </td>
        </tr>
    <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalle de la Venta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h4>INFORMACION DE LA VENTA</h4>
          <hr>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label >Id Venta: </label>   
      <label  id="idVenta"></label> 
      <input type="hidden" id="idVen">     
    </div>
    <div class="form-group col-md-4">
      <label >Nro Comprobante: </label>   
      <label  id="nroComp"></label>      
    </div>
    <div class="form-group col-md-4">
      <label >Total Venta: </label>   
      <label  id="totalVenta"></label>      
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label >Fecha: </label>   
      <label  id="fechaVenta"></label>      
    </div>
    <div class="form-group col-md-4">
      <label >Cliente: </label>   
      <label  id="nombre"></label>      
    </div>    
  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label >Vendedor: </label>   
      <label  id="nombreUser"></label>      
    </div>
    <div class="form-group col-md-4">
      <label >Codigo de Control: </label>   
      <label id="codControl"></label>      
    </div>
    <div class="form-group col-md-4">
      <label >Tipo: </label>   
      <label id="tipoventa"></label>      
    </div>
  </div>
    <hr>
    <h4>Entradas</h4>
    <hr>
    <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Fecha Reg</th>
                    <th>Cod Entrada</th>
                    <th>Pelicula</th>
                    <th>Fecha Funcion</th>
                    <th>Hora Funcion</th>
                    <th>Tarifa/Precio</th>
                    <th>Butaca</th>
                </tr>
            </thead>
            <tbody id="tabbody">

            </tbody>
        </table>
        <hr>
        <input type="button" class="btn btn-success" value="Impresion" id="btnImpresion">
        <input type="button" class="btn btn-danger" value="Devolucion" id="btnDevolver">
        <a type="button" class="btn btn-warning" href="<?php echo base_url();?>VentaCtrl/listaventa">Cancelar</a>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

