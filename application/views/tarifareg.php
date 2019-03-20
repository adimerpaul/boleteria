<div class="col-sm-11 col-md-10">
    <h3>Registrar Nueva Tarifa</h3>

<div class="card ">
  <div class="card-header text-white bg-success" >
    Informacion de Registro Tarifa
  </div>
  <div class="card-body">
      <h3>INFORMACION DE LA TARIFA</h3>
<hr />
    
  <form method="POST" action="<?php echo base_url();?>EmpresaCtrl/store" >
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="serie">Serie:</label>   
      <input type="text" class="form-control" id="serie" name="serie">  
    </div>
    <div class="form-group col-md-6">
      <label for="precio">Precio: </label>
      <input type="text" class="form-control" id="precio" name="precio  ">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="descrip">Descripcion:</label>   
      <input type="text" class="form-control" id="descrip" name="descrip">  
    </div>

  </div>
  <div class="form-row">
  <div class="form-group col-md-4">
      <label for="telefono">Mostrar en Tv:</label>   
      <input type="checkbox" class="" id="telefono" name="telefono">  
    </div>
    <div class="form-group col-md-4">
      <label for="telefono">Defecto:</label>   
      <input type="checkbox" class="" id="telefono" name="telefono">  
    </div>
    <div class="form-group col-md-4">
      <label for="telefono">Venta Web:</label>   
      <input type="checkbox" class="" id="telefono" name="telefono">  
    </div>
  </div>
  <div class="form-group">
    <label for="direccion">Direccion: </label>
    <input type="text" class="form-control" id="direccion" name="direccion">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="cinit">CI / NIT:</label>
      <input type="text" class="form-control" id="cinit" name="cinit">
    </div>
    <div class="form-group col-md-6">
      <label for="ingbruto">Ingresos Brutos: </label>
      <input type="text" id="ingbruto" class="form-control" name="ingbruto">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="afip">Agencia AFIP:</label>
      <input type="text" class="form-control" id="afip" name="afip">
    </div>
    <div class="form-group col-md-6">
      <label for="urldom">URL Dominio: </label>
      <input type="text" id="urldom" class="form-control" name="urldom">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="fideliza">Fidelizacion:</label>
      <select class="form-control" id="fideliza" name="fideliza">
        <option selected value="Ninguno">Ninguno</option> 
        <option value="Siempre">Siempre</option> 
        <option value="Opcional">Opcional</option> 
     </select>       
     </div>
  </div>
  <input type="submit" class="btn btn-success" value="Registrar">
  <a type="button" class="btn btn-warning" href="<?php echo base_url();?>EmpresaCtrl/empresaver">Cancelar</a>
</form>
  </div>
</div>


</div>
