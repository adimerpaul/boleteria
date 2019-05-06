<div class="col-sm-11 col-md-10">
    <h3>Registrar Nuevo Distribuidor</h3>

<div class="card ">
  <div class="card-header text-white bg-success" >
    Informacion de Registro Distribuidor
  </div>
  <div class="card-body">
      <h3>INFORMACION DEL DISTRIBUIDOR</h3>
<hr />
  <form method="POST" action="<?php echo base_url();?>DistribuidorCtrl/store" >
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="nombre">Nombre:</label>   
      <input type="text" class="form-control" id="nombre" name="nombre" required>  
    </div>

  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="direccion">Direccion:</label>   
      <input type="text" class="form-control" id="direccion" name="direccion" required>  
    </div>
    <div class="form-group col-md-6">
      <label for="localidad">Localidad: </label>
      <input type="text" class="form-control" id="localidad" name="localidad" required>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="nit">NIT: </label>   
      <input type="text" class="form-control" id="nit" name="nit" required>  
    </div>
    <div class="form-group col-md-6">
      <label for="telefono">Telefono: </label>
      <input type="text" class="form-control" id="telefono" name="telefono">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="email">Email: </label>   
      <input type="text" class="form-control" id="email" name="email">  
    </div>
    <div class="form-group col-md-6">
      <label for="responsable">Responsable: </label>
      <input type="text" class="form-control" id="responsable" name="responsable">
    </div>
  </div>

  <input type="submit" class="btn btn-success" value="Registrar">
  <a type="button" class="btn btn-warning" href="<?php echo base_url();?>DistribuidorCtrl/distribuidorver">Cancelar</a>
</form>
  </div>
</div>

</div>

