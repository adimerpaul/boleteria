<div class="col-sm-11 col-md-10">
    <h3>Registrar Nuevo Cliente</h3>

<div class="card ">
  <div class="card-header text-white bg-success" >
    Informacion de Registro Cliente
  </div>
  <div class="card-body">
      <h3>INFORMACION DEL CLIENTE</h3>
<hr />
    <div class="col-md-10">
  <form method="POST" action="<?php echo base_url();?>ClienteCtrl/store" >
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="cinit">CI / NIT:</label>   
      <input type="text" class="form-control" id="cinit" name="cinit" required>  
      <label id="cinit_error" class="control-label col-md-6 text-danger" style="display: block;"></label>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nombre">Nombre:</label>   
      <input type="text" class="form-control" id="nombre`" name="nombre" required>  
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

  <input id="btnCliente" type="submit" class="btn btn-success" value="Registrar">
  <a type="button" class="btn btn-warning" href="<?php echo base_url();?>ClienteCtrl/clientever">Cancelar</a>
</form>
  </div>
</div>

</div>
</div>
