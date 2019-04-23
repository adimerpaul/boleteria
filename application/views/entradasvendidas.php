<div class="col-sm-11 col-md-10">
    <h3>LISTADO DE VENTAS</h3>
    <br>
    <div class="card ">
    <div class="card-header text-white bg-warning" >
        BOLETOS
    </div>
    <div class="card-body">     <br>   
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>NumeroBOC</th>
                    <th>Devuelta</th>
                    <th>idVenta</th>
                    <th>Pelicula</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Tarifa</th>
                    <th>Fecha Reg</th>
                    <th>Butaca</th>
                    <th>Usuario</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>

        <?php foreach($boleto as $row): ?>
        <tr>
            <td><?php echo $row['numboc']; ?></td>
            <td><?php echo $row['devuelto']; ?></td>
            <td><?php echo $row['idVenta']; ?></td>
            <td><?php echo $row['titulo']; ?></td>
            <td><?php echo $row['fechaFuncion']; ?></td>
            <td><?php echo $row['horaFuncion']; ?></td>
            <td><?php echo $row['costo']; ?></td>
            <td><?php echo $row['fecha']; ?></td>
            <td><?php if($row['devolucion']=='No') 
            echo chr($row['fila']+64).'-'.$row['fila'] .'-'. $row['columna']; 
            else echo '-';?></td>
            <td><?php echo $row['nombreUser']; ?></td>
            <td>                
                    <a class="btn btn-outline-warning  btn-sm" data-toggle="modal" data-target="#exampleModal" data-idBoleto="" Modificar</a>
                   
            </td>
        </tr>
    <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="<?php echo base_url();?>ClienteCtrl/update" >
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="cinit">CI / NIT:</label>   
      <input type="text" class="form-control" id="cinit" name="cinit">  
      <input type="hidden" id="idcliente" name="idcliente">  
      <label id="cinit_error" class="control-label col-md-6 text-danger" style="display: block;"></label>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nombre">Nombre:</label>   
      <input type="text" class="form-control" id="nombre" name="nombre">  
    </div>
    <div class="form-group col-md-6">
      <label for="apellido">Apellido:</label>   
      <input type="text" class="form-control" id="apellido" name="apellido">  
    </div>
  </div>


  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="email">Email:</label>   
      <input type="text" class="form-control" id="email" name="email">  
    </div>
    <div class="form-group col-md-6">
      <label for="fechanac">Fecha de Nacimiento:</label>   
      <input type="date" class="form-control" id="fechanac" name="fechanac">  
    </div>
  </div>


  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="telef">Telefono:</label>   
      <input type="text" class="form-control" id="telef" name="telef">  
    </div>
    <div class="form-group col-md-6">
      <label for="direccion">Direccion:</label>   
      <input type="text" class="form-control" id="direccion" name="direccion">  
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="sexo">Sexo:</label>   
      <select class="form-control" id="sexo" name="sexo">  
        <option value="M">M</option>
        <option value="F">F</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="tarjeta">Codigo de Tarjeta:</label>   
      <input type="text" class="form-control" id="tarjeta" name="tarjeta">  
    </div>
  </div>

  <input type="submit" class="btn btn-success" value="Registrar">
  <a type="button" class="btn btn-warning" href="<?php echo base_url();?>ClienteCtrl/clientever">Cancelar</a>
</form>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
