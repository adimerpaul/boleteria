<div class="col-sm-11 col-md-10">
    <h3>Registrar Nueva Empresa</h3>

<div class="card ">
  <div class="card-header text-white bg-success" >
    Informacion de Registro Empresa
  </div>
  <div class="card-body">
      <h3>INFORMACION DE LA EMPRESA</h3>
<hr />
    <div class="col-md-10">
  <form method="POST" action="<?php echo base_url();?>EmpresaCtrl/store" >
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="codigo">Codigo:</label>   
      <input type="text" class="form-control" id="codigo" name="codigo">  
    </div>
    <div class="form-group col-md-6">
      <label for="razonsocial">Razon Social: </label>
      <input type="text" class="form-control" id="razonsocial" name="razonsocial">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="nomfant">Nombre Fantasia:</label>   
      <input type="text" class="form-control" id="nomfant" name="nomfant">  
    </div>
    <div class="form-group col-md-6">
      <label for="nomsuc">Nombre Sucursal: </label>
      <input type="text" class="form-control" id="nomsuc" name="nomsuc">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="telefono">Telefono:</label>   
      <input type="text" class="form-control" id="telefono" name="telefono">  
    </div>
    <div class="form-group col-md-6">
      <label for="localidad">Localidad: </label>
      <input type="text" class="form-control" id="localidad" name="localidad">
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
</div>
