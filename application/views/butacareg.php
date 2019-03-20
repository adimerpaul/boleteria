<div class="col-sm-11 col-md-10">
    <h3>Registrar Nueva Butaca</h3>

<div class="card ">
  <div class="card-header text-white bg-success" >
    Informacion de Registro Butaca
  </div>
  <div class="card-body">
      <h3>INFORMACION DE LA BUTACA</h3>
<hr />
    <div class="col-md-10">
  <form method="POST" action="<?php echo base_url();?>ButacaCtrl/store" >
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nombre">Nombre Butaca:</label>   
      <input type="text" class="form-control" id="nombre" name="nombre">  
    </div>
    <div class="form-group col-md-6">
      <label for="descripcion">Detalle: </label>
      <textarea class="form-control" rows="5" cols="" id="descripcion" name="descripcion"></textarea>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="activo">Activo:</label>   
      <input id="activo" name="activo" type="checkbox" checked data-on-color="warning" data-on="activo">
    </div>

  </div>

  <input type="submit" class="btn btn-success" value="Registrar">
  <a type="button" class="btn btn-warning" href="<?php echo base_url();?>ButacaCtrl/butacaver">Cancelar</a>
</form>
  </div>
</div>

</div>
</div>
