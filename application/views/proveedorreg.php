<div class="col-sm-11 col-md-10">
    <h3>Registrar Nuevo Proveedor</h3>

<div class="card ">
  <div class="card-header text-white bg-success" >
    Informacion de Registro Proveedor
  </div>
  <div class="card-body">
      <h3>INFORMACION DEL PROVEEDOR</h3>
<hr />
 
  <form method="POST" action="<?php echo base_url();?>ProveedorCtrl/store" >

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="razonsocial">Razon Social : </label>
      <input type="text" class="form-control" id="razonsocial" name="razonsocial" required>
    </div>

    <div class="form-group col-md-6">
      <label for="nit">NIT  : </label>
      <input type="text" class="form-control" id="nit" name="nit" >
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="telefono">telefono :</label>
      <input type="text" class="form-control" id="telefono" name="telefono" required>  
    </div>
    <div class="form-group col-md-6">
      <label for="email">Email : </label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-12">
      <label for="direccion">Direccion :</label>
      <input type="text" class="form-control" id="direccion" name="direccion" required>  
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="activo">Activo : </label><br>
      <input class="form-control" id="activo" name="activo" type="checkbox" data-toggle="toggle" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger" checked>
    </div>
  </div>

  <input type="submit" class="btn btn-success" value="Registrar">
</form>
  </div>


</div>
</div>
